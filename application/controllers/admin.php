<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    protected $school_id;

    public function __construct() {
        parent::__construct();
        $this->view_dir = strtolower(__CLASS__) . '/';
        $this->load->library('addedit');
        $this->load->helper('string');
        //this need to change after login integration needto get from user table
        $this->school_id = 1;
        $this->fiscal_year = 1;
    }

    public function index() {
        //print_r($this->session->userdata('username'));e();
        if (!$this->session->userdata('username'))
            $this->load->view($this->view_dir . 'index');
        else
            redirect("admin/list_details/class");
    }

    public function login() {
        $UserName = $_POST['UserName'];
        $sPassword = $this->input->post('Password');//Encrypt::encryptData($this->input->post('Password'));
        $logintype = $this->input->post('LoginType');
        $type = isset($_POST['Type']) ? $_POST['Type'] : '0';
        $aUser = $this->admin_model->validate($UserName, $sPassword, $logintype);

        if (!$aUser)
            @$sMessage = "incorrect";
        else if ($aUser->type == "admin") {
                $newdata = array(
                    'logged_in' => true,
                    'username' => $aUser->sc_use_user_name,
                    'useremail' => $aUser->sc_use_email,
                    'usertype' => $aUser->sc_use_type,
                    'user_id' => $aUser->sc_use_id,
                    'refresh' => true
                );
                if ($_POST['Remember'] == "remember") {
                    setcookie("auname", $_POST['UserName']);
                    setcookie("apassword", $_POST['Password']);
                } else {
                    $expire = time() - 300;
                    setcookie("auname", $_POST['UserName'], $expire);
                    setcookie("apassword", $_POST['Password'], $expire);
                }
                $sMessage = $aUser->type;
            
            $this->session->set_userdata($newdata);
        }
        echo @$sMessage;
        exit;
    }

    //Admin Logout
    public function logout() {
        $newdata = array(
            'logged_in' => "",
            'username' => "",
            'useremail' => "",
            'usertype' => "",
            'user_id' => "",
            'refresh' => ""
        );
        $this->session->unset_userdata($newdata);
        redirect('admin/index');
    }

    //To view the selected table information
    public function list_details($table_name) {

        switch ($table_name) {
            case 'class':
                $table_name = 'sc_class';
                $where = array('cl.sc_cls_main_class' => 0,
                    'cl.sc_sch_id' => $this->school_id
                );
                $html_file_name = 'class_list_view';
                $sec_where = array('sc_cls_main_class !=' => 0,
                    'sc_sch_id' => $this->school_id
                );

                $data['lists'] = $this->admin_model->class_subject_list($where);
                $data['section_lists'] = $this->admin_model->class_section_list($sec_where);
                break;
            case 'section':
                $table_name = 'sc_class';
                $where = array('cl.sc_cls_main_class !=' => 0,
                    'cl.sc_sch_id' => $this->school_id
                );
                $html_file_name = 'class_list_view';
                $data['lists'] = $this->admin_model->class_subject_list($where);
                break;
            case 'subjects':
                $table_name = 'sc_subject';
                $where = array('sc_sch_id' => $this->school_id
                );
                $html_file_name = 'exam_subject_list_view';
                $data['lists'] = $this->admin_model->allRecords_where($table_name, $where);
                break;
            case 'exams':
                $table_name = 'sc_exam';
                $where = array('sc_sch_id' => $this->school_id
                );
                $html_file_name = 'exam_subject_list_view';
                $data['lists'] = $this->admin_model->allRecords_where($table_name, $where);
                break;

            default: $table_name = 'sc_class';
                $html_file_name = 'class_list_view';
        }


        $data['menu_content'] = $this->load->view('school_menu', '', TRUE);
        $data['content'] = $this->load->view($this->view_dir . $html_file_name, $data, TRUE);
//e($this->db->last_query());
        $this->load->view('school_template', $data);
    }

    /**
     * To make the insert & update operations on particular table 
     */
    public function opertions($table_name, $field_value = NULL) {

        if (!strlen($table_name) > 0) {
            redirect('admin/index');
        }

        //select the table 
        switch ($table_name) {
            case 'class':
                $table_name = 'sc_class';
                $field_name = 'sc_cls_id';
                $html_file_name = 'class_details';
                break;
            case 'subjects':
                $table_name = 'sc_subject';
                $field_name = 'sc_sub_id';
                $html_file_name = 'exam_subject_details';
                break;

            case 'exams':
                $table_name = 'sc_exam';
                $field_name = 'sc_exa_id';
                $html_file_name = 'exam_subject_details';
                break;
            case 'section':
                $table_name = 'sc_class';
                $field_name = 'sc_cls_id';
                $html_file_name = 'class_details';
                break;

            case 'student':
                $table_name = 'sc_student';
                $field_name = 'sc_stu_id';
                $html_file_name = 'student_view';
                break;
            default: $table_name = 'customer';
                $html_file_name = 'customer_view';
        }
//e($_POST);
        //To perform the add & edit operations
        if ($this->input->post('submit')) {
            $post_data = $_POST;
            $post_data['sc_sch_id'] = $this->school_id;
            $this->addedit->setData($table_name, $field_name, $field_value);
            $data['message'] = $this->addedit->custom_add_edit_options($post_data);
            $data['edit_message'] = "set";
        }

        if (isset($field_value)) {
            $where = array($field_name => $field_value);
            $data['details'] = $this->admin_model->singleRecord_where($table_name, $where);
            $data['form_type'] = 'Edit';
        } else {
            $data['form_type'] = 'Add';
            $data['edit_message'] = "";
        }
        $data['menu_content'] = $this->load->view('school_menu', '', TRUE);
        $data['content'] = $this->load->view($this->view_dir . $html_file_name, $data, TRUE);
        $this->load->view('school_template', $data);
    }

    public function set_class_subject($type) {

        switch ($type) {
            case 'subjects':
                $table_name = 'sc_subject';
                $where = array('sc_sch_id' => $this->school_id);
                $data['lists'] = $this->admin_model->allRecords_where($table_name, $where);
                $data['content'] = $this->load->view($this->view_dir . "set_class_subject", $data, TRUE);
                break;
            case 'exams':
                $table_name = 'sc_exam';
                $where = array('sc_sch_id' => $this->school_id);
                $data['lists'] = $this->admin_model->allRecords_where($table_name, $where);
                $data['content'] = $this->load->view($this->view_dir . "set_class_exam", $data, TRUE);
                break;
           
            default: $table_name = 'customer';
        }


         $data['menu_content'] = $this->load->view('school_menu','', TRUE);
        //$data['menu_content'] = "";
            
        $this->load->view('school_template', $data);
    }

    //To Add & Edit the student
    public function student_operations($student_id = NULL) {
        if ($this->input->post('submit')) {

            $user_data = array('sc_use_user_name' => $this->input->post('sc_use_user_name'),
                'sc_use_email' => $this->input->post('sc_use_email')
            );

            $student_data = array('sc_stu_name' => $this->input->post('sc_stu_name'),
                'sc_stu_initial_name' => $this->input->post('sc_stu_initial_name'),
                'sc_stu_parent_name' => $this->input->post('sc_stu_parent_name'),
                'sc_stu_phone1' => $this->input->post('sc_stu_phone1'),
                'sc_stu_phone2' => $this->input->post('sc_stu_phone2'),
                'sc_stu_address' => $this->input->post('sc_stu_address'),
                'sc_blood_group' => $this->input->post('sc_blood_group'));
            
            $type = $this->input->post('type');

            $path = FCPATH . 'store/student_images';
            $config = array('allowed_types' => 'jpg|jpeg|gif|png',
                'upload_path' => $path);
            $this->load->library('upload', $config);

            if ($type == 'Add') {
                //insert user details
                $user_data['sc_use_password'] = random_string('alnum', 6);
                $user_data['sc_use_type'] = 'student';
                $user_data['sc_sch_id'] = $this->school_id;
                $user_id = $this->admin_model->insert('sc_user', $user_data);

                //insert student details
                $student_data['sc_created_date'] = current_date_time;
                $student_data['sc_stu_user_id'] = $user_id;

                if (!$this->upload->do_upload('photo')) {
                    $data['errors'] = $this->upload->display_errors(); // this isn't working
                } else {
                    $photo = $this->upload->data();
                }

                $student_data['sc_stu_photo_url'] = $photo['file_name'];
                $this->admin_model->insert('sc_student', $student_data);
            } else {
                //user table
                $u_where = array('sc_use_id' => $this->input->post('sc_stu_user_id'));
                $this->admin_model->update('sc_user', $user_data, $u_where);
                //student table
                if ($_FILES['photo']["error"] > 0) {
                    $student_data['sc_stu_photo_url'] = $this->input->post('sc_stu_photo_url');
                } else {
                    unlink($path . '/' . $this->input->post('sc_stu_photo_url'));
                    $this->upload->do_upload('photo');
                    $photo = $this->upload->data();
                    $student_data['sc_stu_photo_url'] = $photo['file_name'];
                }
                $su_where = array('sc_stu_id' => $student_id);
                $this->admin_model->update('sc_student', $student_data, $su_where);
                $data['status_message'] = 'sucess';
            }
        }
        if (isset($student_id)) {
            $where = array('sc_stu_id' => $student_id);
            $data['details'] = $this->admin_model->singleRecord_where('sc_student', $where);

            $user_where = array('sc_use_id' => $data['details']->sc_stu_user_id);
            $data['user_details'] = $this->admin_model
                ->singleRecord_where('sc_user', $user_where);
            $data['form_type'] = 'Edit';
        } else {
            $data['form_type'] = 'Add';
        }

        $data['menu_content'] = $this->load->view('school_menu', '', TRUE);
        //$data['menu_content'] = "";
        $data['content'] = $this->load->view($this->view_dir . "set_student", $data, TRUE);
        $this->load->view('school_template', $data);
    }

    public function test() {//e(1);
//        $class_id=$this->input->post("class_id");     
//        $class_id=1;     
//        $where = array('sc_class_id' => $class_id);
//        $data['details'] = $this->admin_model->class_student_list( $where);
//        d($this->db->last_query());exit;
        //$data['menu_content'] = $this->load->view('school_menu', '', TRUE);
        $month_where = array('sc_wor_fis_id' => $this->fiscal_year,
            'sc_sch_id' => $this->school_id
        );
        $data['month_details'] = $this->admin_model
            ->allRecords_where('sc_working_days', $month_where);
        $data['menu_content'] = "";
        $data['menu_content'] = $this->load->view('school_menu', '', TRUE);
        $data['content'] = $this->load->view($this->view_dir . 'student_operations', $data, TRUE);
        //e($data);
        $this->load->view('school_template', $data);
        //$this->load->view('new', $data);
    }

    public function field_list() {

        if ($this->input->post('submit')) {

            $post_data = $_POST;
            print_r($post_data[sc_cls_name]);

//            $field_array = table_filed_list('sc_class'); //Bring the table filed names array
//            $fields_value_list = fields_values_list($field_array); //prepare data array with given field names
//            //add extra columns
//            $fields_value_list['c']='test';e($fields_value_list);
//            $this->admin_model->insert('sc_class', $fields_value_list);
            echo $this->db->last_query();
            e($field_list);
        }
        $this->load->view('new');
    }

}
