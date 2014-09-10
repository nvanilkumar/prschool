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
       // print_r($this->session->userdata); e();
        if (!$this->session->userdata('username'))
            $this->load->view($this->view_dir . 'index');
        else
            redirect("admin/list_details/class");
    }

    public function login() {
        $UserName = $_POST['UserName'];
        $sPassword = $this->input->post('Password');//Encrypt::encryptData($this->input->post('Password'));
       // $logintype = $this->input->post('LoginType');
        $type = $this->input->post('LoginType');
        $aUser = $this->admin_model->validate($UserName, $sPassword, $type);
        if (!$aUser)
            @$sMessage = "incorrect";
        else if ($type == "admin") {
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
                $sMessage = "Success";
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
               
                $table_name = 'sc_section';
                $html_file_name = 'section_list_view';
                $data['lists'] = $this->admin_model->allRecords($table_name);
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


        $data['menu_content'] = $this->load->view('main_menu', '', TRUE);
        $data['content'] = $this->load->view($this->view_dir . $html_file_name, $data, TRUE);
//e($this->db->last_query());
        $this->load->view('main_template', $data);
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
                //To Bring the subjects
                $subject_table_name = 'sc_subject';
                $subject_where = array('sc_sch_id' => $this->school_id);
                $data['subjects_lists'] = $this->admin_model->allRecords_where($subject_table_name, $subject_where);
                //To Bring the sections
                $section_table_name = 'sc_section';
                $data['section_lists'] = $this->admin_model->allRecords($section_table_name);
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
                $table_name = 'sc_section';
                $field_name = 'sc_sec_id';
                $html_file_name = 'section_add_edit';
                break;

            case 'student':
                $table_name = 'sc_student';
                $field_name = 'sc_stu_id';
                $html_file_name = 'student_view';
                break;
            default: $table_name = 'customer';
                $html_file_name = 'customer_view';
        }
        //To perform the add & edit operations
        if ($this->input->post('submit')) {
            $post_data = $_POST;
            $post_data['sc_sch_id'] = $this->school_id; 
            $this->addedit->setData($table_name, $field_name, $field_value);
            $data['message'] = $this->addedit->custom_add_edit_options($post_data);
            $insert_id= $data['message'];
            if($table_name === "sc_class"){
                
                if(isset($field_value)){
                    $section_where = array('sc_cls_main_class' => $field_value);
                    $selected_coulumn_name="sc_cls_id";
                    $section_list=$this->admin_model->signle_colum('sc_class',$selected_coulumn_name,$section_where);

                    $this->remove_cross_entry($field_value,$section_list);
                    $insert_id=$field_value;
                }
                
                $this->assign_sections_class($insert_id, $data['section_lists'], $field_value);
            }
            $data['edit_message'] = "set";
        }

        if (isset($field_value)) {
            
            $where = array($field_name => $field_value);
            $data['details'] = $this->admin_model->singleRecord_where($table_name, $where);
            $data['form_type'] = 'Edit';
             if($table_name === "sc_class"){
                //Bring the selected sections 
                $section_table_name = 'sc_cls_sec';
                $section_where = array('sc_class_id' => $field_value);
                $selected_coulumn_name="sc_sec_id";
                $data['selected_section_ids'] = $this->admin_model->signle_colum($section_table_name,$selected_coulumn_name,$section_where);
                //Bring the selected subjects
                $subject_table_name = 'sc_class_subjects';
                $subject_where = array('sc_class_id' => $field_value);
                $subject_coulumn_name="sc_subject_id";
                $data['selected_subject_ids'] = $this->admin_model->signle_colum($subject_table_name,$subject_coulumn_name,$subject_where);
                
            }
        } else {
            $data['form_type'] = 'Add';
            $data['edit_message'] = "";
        }
        $data['menu_content'] = $this->load->view('main_menu', '', TRUE);
        $data['content'] = $this->load->view($this->view_dir . $html_file_name, $data, TRUE);
        $this->load->view('main_template', $data);
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
           
            default: $table_name = 'none';
        }

         $data['menu_content'] = $this->load->view('main_menu','', TRUE);
         $this->load->view('main_template', $data);
    }

    //To Add & Edit the student
    public function student_add($student_id = NULL) {
        $type='';
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
                'sc_blood_group' => $this->input->post('sc_blood_group'),
                'sc_fiscalyear_id'=>$this->fiscal_year
                );
            $class_id=$this->input->post("class_value");
            $type = (@$this->input->post('type'))?$this->input->post('type'):'';

            $path = FCPATH . 'store/student_images';
            $config = array('allowed_types' => 'jpg|jpeg|gif|png',
                'upload_path' => $path);
            $this->load->library('upload', $config);

            if ($type == 'Add') {
                //insert user details
                $photo=array();
                $user_data['sc_use_password'] = random_string('alnum', 6);
                $user_data['sc_use_type'] = 'student';
                $user_data['sc_sch_id'] = $this->school_id;
                $user_id = $this->admin_model->insert('sc_user', $user_data);

                //insert student details
                $student_data['sc_created_date'] = current_date_time;
                $student_data['sc_stu_user_id'] = $user_id;
                
                

                if (!$this->upload->do_upload('photo')) {
                    $data['errors'] = "";//$this->upload->display_errors(); // this isn't working
                } else {
                    $photo = $this->upload->data();
                }

                $student_data['sc_stu_photo_url'] = (@$photo['file_name'])?@$photo['file_name']:'';
                $student_insert_id=$this->admin_model->insert('sc_student', $student_data);
                //echo $this->db->last_query();exit;
                //insert into class-student
                $class_student_data=array("sc_class_id"=>$class_id, 
                                           "sc_student_id"=>$student_insert_id,
                                             "sc_fiscalyear_id" =>$this->fiscal_year);
                $this->admin_model->insert('sc_class_students', $class_student_data);
            
            } else {
                //user table
                $u_where = array('sc_use_id' => $this->input->post('sc_stu_user_id'));
                $this->admin_model->update('sc_user', $user_data, $u_where);
                
                //update class-student entry
                $class_student_update_where=array("sc_student_id"=>$this->input->post('sc_stu_id'));
                $class_student_update_data=array("sc_class_id"=>$class_id );
                $this->admin_model->update('sc_class_students', $class_student_update_data,
                    $class_student_update_where);
               
                //student table
                if ($_FILES['photo']["error"] > 0) {
                    $student_data['sc_stu_photo_url'] = $this->input->post('sc_stu_photo_url');
                } else {
                    $file=$path . '/' . @$this->input->post('sc_stu_photo_url');
                    if(is_file(@$file))
                    {
                        unlink($file);
                    }
                    
                    $this->upload->do_upload('photo');
                    @$photo = $this->upload->data();
                    $student_data['sc_stu_photo_url'] = @$photo['file_name'];
                }
                $su_where = array('sc_stu_id' => $student_id);
                $this->admin_model->update('sc_student', $student_data, $su_where);
                $data['status_message'] = 'sucess';
            }
        }
        if ($student_id) {
            
            $where = array('sc_stu_id' => $student_id);
            $data['details'] = $this->admin_model->singleRecord_where('sc_student', $where);
           // echo $this->db->last_query();
            $class_where = array('sc_student_id' => $student_id);
            $data['class_details'] = $this->admin_model->student_class($class_where);
            $user_where = array('sc_use_id' => $data['details']->sc_stu_user_id);
            $data['user_details'] = $this->admin_model
                ->singleRecord_where('sc_user', $user_where);
            $data['form_type'] = 'Edit'; 
        } else {
            
            $data['form_type'] = 'Add';
        }

        $data['menu_content'] = $this->load->view('main_menu', '', TRUE); 
        $data['content'] = $this->load->view($this->view_dir . "set_student", $data, TRUE); 
        $this->load->view('main_template', $data);
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
    
    //To view the selected student details
    public function selected_student($student_id){
        
        if ($this->input->post('submit')) {
            
            $class_id=$this->input->post("class_value");
            $where = array("sc_cls_id" => $class_id);
            $data['class_details'] = $this->admin_model->singleRecord_where("sc_class", $where);
            
            $type=$this->input->post('student_type');
            $student_id=$this->input->post('student_list');
            $remarks_where = array('sc_rem_student_id' => $student_id);
            $data["remarks"]=$this->admin_model->student_remarks($remarks_where);
            
        }
        $month_where = array('sc_wor_fis_id' => $this->fiscal_year,
            'sc_sch_id' => $this->school_id
        );
        $data['month_details'] = $this->admin_model
            ->allRecords_where('sc_working_days', $month_where);
        $st_where = array('sc_stu_id' => $student_id);
        $data["student_details"]=$this->admin_model->selected_student($st_where);
        $remarks_where = array('sc_rem_student_id' => $student_id);
        $data["remarks"]=$this->admin_model->student_remarks($remarks_where);
        $data['menu_content'] = $this->load->view('main_menu', '', TRUE);
        $data['content'] = $this->load->view($this->view_dir . 'student_details_view', $data, TRUE);
        $this->load->view('main_template', $data);
        
    }
    
    //To edit the student remarks details
    public function edit_student_remarks($remarks_id){
        
        if(!$remarks_id){
          redirect("admin");   
        }
       $remarks_where = array('sc_rem_id' => $remarks_id); 
       if ($this->input->post('submit')) {
            $remarks_data = array('sc_rem_description' => $this->input->post('sc_rem_description'));
            $data["remarks"]=$this->admin_model->update("sc_remarks",$remarks_data,$remarks_where);
          $data['edit_message'] = "set";  
        }
        
        $data["remarks"]=$this->admin_model->singleRecord_where("sc_remarks",$remarks_where);
        $data['menu_content'] = $this->load->view('school_menu', '', TRUE);
        $data['content'] = $this->load->view($this->view_dir . 'edit_student_remarks', $data, TRUE);
        $this->load->view('school_template', $data);
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
    
    public function subject_add(){
        $data['menu_content'] = $this->load->view('main_menu', '', TRUE);
        $data['content'] = $this->load->view($this->view_dir . 'subject_add', $data, TRUE);
        $this->load->view('main_template', $data);
        
    }
    
    //$option_type --set for edit /other wise new entry
    
    
    public function assign_sections_class($class_id, $section_list, $option_type ) {
        $section_ids = $this->input->post('section_list');
        $section_table_name = 'sc_class';
        $class_section_table_name = 'sc_cls_sec';
        foreach ($section_ids as $section_id) {
            //add class_section
            $class_section_data = array('sc_class_id' => $class_id,
                'sc_sec_id' => $section_id);
            $this->admin_model->insert($class_section_table_name, $class_section_data);
            //add entry in  class table
            $section_name = $this->section_name($section_list, $section_id);
            $section_data = array('sc_cls_name' => $section_name,
                'sc_cls_main_class' => $class_id,
                'sc_sch_id' => $this->school_id );
            $class_ids[]=$this->admin_model->insert($section_table_name, $section_data);
        }
        $class_ids[]=$class_id;
        $this->assign_subjects_to_section($class_ids);
    }
    //Assign subjects to section & class
    public function assign_subjects_to_section($section_ids) {
        $subject_ids = $this->input->post('subject_list');
        foreach($section_ids as $class_id){
            foreach ($subject_ids as $value) {
                $subject_id = $value;
                $table_name = 'sc_class_subjects';
                $data = array('sc_class_id' => $class_id,
                    'sc_subject_id' => $subject_id,
                    'sc_fiscalyear_id' => $this->fiscal_year
                );
                $this->admin_model->insert($table_name, $data);

            }
            
        }

    }

    //Returns the sections name by sending the selected section
    public function section_name($section_list, $section_id) {
        foreach ($section_list as $section) {
            if ($section->sc_sec_id == $section_id)
                return $section->sc_sec_name;
        }
    }
    
    //To remove the cross table entries of class_section, class_subject, class table
    public function remove_cross_entry($class_id,$section_list){
        //Remove the subjects related to class and its sections
        foreach ($section_list as $section) {
            $section_where=array("sc_class_id" =>$section->sc_cls_id );
            $this->admin_model->delete_row("sc_class_subjects", $section_where);
        }
        $where=array("sc_class_id" =>$class_id );
        $this->admin_model->delete_row("sc_class_subjects", $where);
        
        //Remove class_section table
        $class_section_where=array("sc_class_id" =>$class_id );
        $this->admin_model->delete_row("sc_cls_sec", $class_section_where);
        
        //Remove section related to the class
        $class_where=array("sc_cls_main_class" =>$class_id );
        $this->admin_model->delete_row("sc_class", $class_where);
    }
    
    //Add Student details
    public function student_list(){
        if ($this->input->post('submit')) {
            $class_id=$this->input->post('class_value');
            //student list
            $where = array('sc_class_id' => $class_id);
            $data["lists"]=$this->admin_model->class_student_list($where);
            //class details
            $class_where = array('sc_cls_id' => $class_id);
            $data['class_details'] = $this->admin_model->singleRecord_where("sc_class",$class_where);
            
        }
        $data['menu_content'] = $this->load->view('main_menu', '', TRUE);
        $data['content'] = $this->load->view($this->view_dir . 'student_list', $data, TRUE);
        $this->load->view('main_template', $data);
    }
    public function student_details_add($student_id){
        $month_where = array('sc_wor_fis_id' => $this->fiscal_year,
            'sc_sch_id' => $this->school_id
        );
        $data['month_details'] = $this->admin_model
            ->allRecords_where('sc_working_days', $month_where);
        $st_where = array('sc_stu_id' => $student_id);
        $data["student_details"]=$this->admin_model->selected_student($st_where);
        $data['menu_content'] = $this->load->view('main_menu', '', TRUE);
        $data['content'] = $this->load->view($this->view_dir . 'student_details_add', $data, TRUE);
        $this->load->view('main_template', $data);
    }
    
    public function check($student_id){
        $month_where = array('sc_wor_fis_id' => $this->fiscal_year,
            'sc_sch_id' => $this->school_id
        );
        $data['month_details'] = $this->admin_model
            ->allRecords_where('sc_working_days', $month_where);
        $st_where = array('sc_stu_id' => $student_id);
        $data["student_details"]=$this->admin_model->selected_student($st_where);
        $data['menu_content'] = "";//$this->load->view('main_menu', '', TRUE);
        $data['content'] = $this->load->view($this->view_dir . 'check', $data, TRUE);
        $this->load->view('template', $data);
        
    }

}
