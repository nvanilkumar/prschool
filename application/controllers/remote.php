<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class remote extends Acl_Controller {

    private $module, $class, $view_dir;

    public function __construct() {
        parent::__construct();
        // module //
        $this->module = '';
        // class //
        $this->class = strtolower(__CLASS__);
        // view directory //
        $this->view_dir = $this->module . '/' . $this->class . '/';
        $this->load->model('login_model');
        $this->fiscal_year = 1;
        $this->load->library('addedit');
    }

    public function check_userid() {
        $old_email = ($this->input->post('old_email')) ? $this->input->post('old_email') : '';
        $get_result = $this->login_model->check_userid($this->input->post('username'), $old_email);
        echo ($get_result) ? 'true' : 'false';
        exit;
    }

    public function check_username() {
        $get_result = $this->login_model->check_username($this->input->post('username'));
        echo ($get_result) ? 'true' : 'false';
        exit;
    }

    public function forget_password() {
        $Email = $_POST['Femail'];
        $user_details = $this->login_model->forget_password($Email);
        if (count($user_details) == 0)
            echo @$sMessage = "incorrect";
        else {
            echo @$sMessage = "correct";
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            $data['pwd'] = implode($pass);

            $to = $user_details->email;
            $subject = "Forgot Password";
            $message = $this->load->view($this->view_dir . 'forget_password', $data, TRUE);

            $from = 'Login Project';
            $headers = 'Content-type: text/html;' . "\n";
            $headers .= 'From:' . $from . "\n";
            mail($to, $subject, $message, $headers);
            $user_data = array(
                'password' => Encrypt::encryptData($data['pwd']),
            );
            $this->login_model->change_password($user_details->id, $user_data);
        }
        exit;
    }

    public function change_user_status() {
        $status = $this->input->post('user_status');
        $user_id = $this->input->post('user_id');
        $this->login_model->change_user_status($user_id, $status);
    }

    //To bring the all the class details 
    public function get_class_list() {
        $main_class_id = $this->input->post('sc_cls_main_class');
        $data = array('sc_cls_main_class' => $main_class_id);
        echo(json_encode($this->admin_model->allRecords_where('sc_class', $data)));
        exit;
    }

    //To assign subjects/marks/ students to the class
    public function set_object_class() {
        $type = $this->input->post('type');
        $option_type = $this->input->post('option_type'); //1 for insert 0 for delete
        switch ($type) {
            case 'subjects':
                $table_name = 'sc_class_subjects';
                $data = array('sc_class_id' => $this->input->post('class_id'),
                    'sc_subject_id' => $this->input->post('object_id'));
                break;
            case 'exams':
                $table_name = 'sc_class_exams';
                $class_id = $this->input->post('class_id');
                $exam_id = $this->input->post('exam_id');
                $data = array('sc_class_id' => $class_id,
                    'sc_exam_id' => $exam_id );
               // parse_str($_POST['subjects'], $subjects);
                $subjects=$_POST['subjects'];
                $this->set_max_marks_subjects($class_id, $exam_id, $subjects);
                break;
            case 'student':
                $table_name = 'sc_class_students';
                $data = array('sc_class_id' => $this->input->post('class_id'),
                    'sc_student_id' => $this->input->post('object_id'));
                break;
            default: $table_name = 'customer';
        }
        $data['sc_fiscalyear_id'] = $this->fiscal_year;
        if ($option_type === "1") {//Insert option
            //check the entry before insert 
            $records_count = $this->admin_model->singleRecord_where($table_name, $data);
            if (count($records_count) == 0) {
                $status = $this->admin_model->insert($table_name, $data);
            } else {
                $status = 'record exist in db';
            }
        } else if ($option_type === "0") {//delete option
            $status = $this->admin_model->delete_row($table_name, $data);
        }
        echo $status;
        exit;
    }

    //To assign subjects/marks/ students to the class
    public function get_class_object_list() {
        $type = $this->input->post('type');
        switch ($type) {
            case 'subjects':
                $table_name = 'sc_class_subjects';
                $data = array('sc_class_id' => $this->input->post('class_id'));
                $object_list = $this->admin_model->allRecords_where($table_name, $data);
                break;
            case 'exams':
                $table_name = 'sc_class_exams';
                $data = array('sc_class_id' => $this->input->post('class_id'));
                $object_list = $this->admin_model->allRecords_where($table_name, $data);
                break;
            case 'class_subjects':
                $object_list = $this->class_subject_list('sc_class_students', $this->input->post('class_id'));
                break;
            case 'class_exams':
                $object_list = $this->admin_model->class_exam_list( $this->input->post('class_id'));

                // d($this->db->last_query());e($object_list);

                break;
            default: $table_name = 'customer';
        }
        $data['sc_fiscalyear_id'] = $this->fiscal_year;
        echo (json_encode($object_list));
        exit;
    }

    //To Bring the selected class student list
    public function class_student_list() {
        $class_id = $this->input->post("class_id");
        //$class_id=1;     
        $where = array('sc_class_id' => $class_id);
        echo (json_encode($this->admin_model->class_student_list($where)));
        exit;
    }

    //To add the attende info
    public function add_attendance() {
        $at_data = array('sc_att_student_id' => $this->input->post('student_id'),
            'sc_att_month_id' => $this->input->post('month_id'),
            'sc_att_attendend_days' => $this->input->post('attended_days'),
            'sc_att_created_on' => current_date_time,
            'sc_fiscalyear_id' => $this->fiscal_year
        );
        $insert_id = $this->admin_model->insert('sc_attendence', $at_data);
        echo $insert_id;
        exit;
    }

    //To Bring the seelected student information
    public function singel_student() {
        $student_id = $this->input->post('student_id');
        $st_where = array('sc_stu_id' => $student_id);
        echo (json_encode($this->admin_model
                ->selected_student($st_where)));
        exit;
    }

    //To add Marks to particular exam
    public function add_marks() {
        $table_name = 'sc_marks';
        $class_id = $this->input->post('class_id');
        $subject_list = $this->class_subject_list('sc_class_students', $class_id);
        //parse_str(urldecode($_POST['subjects']), $subjects); 
        $subjects=$_POST['subjects'];

        $data = array('sc_mak_student_id' =>  $this->input->post('student_id'),
                    'sc_mak_exam_id' => $this->subject_value($subjects, "exams_list"),
                    'sc_mar_created_on' =>current_date_time,
                    'sc_fiscalyear_id' => $this->fiscal_year ); 
            
        foreach ($subject_list as $subject) {
            $data['sc_mak_marks']=$this->subject_value($subjects, $subject->sc_sub_name);
            $data['sc_mak_subject_id']=$subject->sc_sub_id;
            $this->admin_model->insert($table_name, $data);
        }
            
        echo "sucess";
        exit;
    }

    //To add remarks to the student
    public function add_remarks() {
        $remarks_data = array('sc_rem_student_id' => $this->input->post('sc_rem_student_id'),
            'sc_rem_description' => $this->input->post('sc_rem_description'),
            'sc_rem_created_date' => current_date_time,
            'sc_rem_created_by' => 'admin',
            'sc_fiscalyear_id' => $this->fiscal_year
        );
        $insert_id = $this->admin_model->insert('sc_remarks', $remarks_data);
        echo $insert_id;
        exit;
    }

    //To pay the fees
    public function student_pay_entry() {
        $field_name = '';
        $field_value = '';
        $table_name = 'sc_payment';
        $post_data = $_POST;
        $post_data['type'] = 'Add';
        $post_data['sc_pay_created_date'] = current_date_time;
        $post_data['sc_fiscalyear_id'] = $this->fiscal_year;
        $this->addedit->setData($table_name, $field_name, $field_value);
        $message = $this->addedit->custom_add_edit_options($post_data);
        echo $this->db->last_query();
        echo $message;
        exit;
    }

    public function class_subject_list($table_name, $class_id) {
        $table_name = 'sc_class_students';
        $data = array('cl.sc_cls_id' => $class_id);
        return $this->admin_model->class_subject_list($data);
    }

    /*
     * @$class id
     * @$exam id 
     * @$subject containg subjects list
     */
    public function set_max_marks_subjects($class_id, $exam_id, $subjects) {
        $table_name = 'sc_class_exam_subject';
        //bring the subject list
        $subject_list = $this->class_subject_list('sc_class_students', $class_id);
        foreach ($subject_list as $subject) {
            $data = array('sc_class_id' => $class_id,
                'sc_exam_id' => $exam_id,
                'sc_subject_id' => $subject->sc_sub_id,
                'sc_subj_max_marks' => $this->subject_value($subjects, $subject->sc_sub_name));
            $records_count = $this->admin_model->singleRecord_where($table_name, $data);
            if (count($records_count) == 0) {
                 $status = $this->admin_model->insert($table_name, $data);
            } else {
                $status = 'record exist in db';
            }
            
        }
    }
    
    //returns the subject value in post data
    public function subject_value($subjects, $subject_name){
        foreach($subjects as $v){
            if($subject_name == $v['name'] )
                return $v['value'];
                
            }
    }

}
