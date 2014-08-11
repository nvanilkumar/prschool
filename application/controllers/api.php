<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  
 *
 * This is  a rest full controller for student related details
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Anil Kumar M
 */
require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->view_dir = strtolower(__CLASS__) . '/';

        $this->load->helper('string');
        //this need to change after login integration needto get from user table
        $this->school_id = 1;
        $this->fiscal_year = 1;
    }

    /*
     * To Perform the login operations 
     * @return the user id & schoolid
     */

    public function student_login_get() {
        $UserName = $this->get('UserName');
        $sPassword = $this->get('Password');

        if (!$UserName || !$sPassword) {
            $this->response(NULL, 400);
        }

        $logintype = 'student';

        $aUser = $this->admin_model->validate($UserName, $sPassword, $logintype);

        if (!$aUser) {
             $data['status']="Incorrect";
        } else {
            $student_where = array(
                'sc_use_id' => $aUser->sc_use_id);
            $student_details = $this->admin_model->selected_student($student_where);
            
             $data['status']="Successed";
            
            $data['login-id']=$student_details->sc_sch_id . "-" . $student_details->sc_stu_id;
            $data['sc_stu_name']=$student_details->sc_stu_name;
            $data['sc_stu_initial_name']=$student_details->sc_stu_initial_name;
            $data['sc_stu_parent_name']=$student_details->sc_stu_parent_name;
            $data['sc_stu_phone1']=$student_details->sc_stu_phone1;
            $data['sc_stu_phone2']=$student_details->sc_stu_phone2;
            $data['sc_stu_address']=$student_details->sc_stu_address;
            $data['sc_blood_group']=$student_details->sc_blood_group;
            $data['sc_stu_photo_url']=$student_details->sc_stu_photo_url;
            $data['sc_use_user_name']=$student_details->sc_use_user_name;
            $data['sc_use_password']=$student_details->sc_use_password;
            $data['sc_created_date']=$student_details->sc_created_date;
            
        }
        $this->response($data, 200);
    }

    public function student_details_get() {
        $request_type = $this->get("type");
        $student_details_type = array("remarks", "attendence", "payments");
        $student_key = $this->get("student_key");
        //valid student
        if ($student_key && (in_array($request_type, $student_details_type))) {
            $page_number = ($this->get("page_number")) ? $this->get("page_number") : 1;
            $records_per_page = ($this->get("records_per_page")) ? $this->get("records_per_page") : 1;
            $limit = '';

            $student_keys = explode("-", $this->get("student_key"));
            $student_id = $student_keys[1];
            $student_school_id = $student_keys[0];
            $student_where = array(
                'sc_stu_id' => $student_id,
                'sc_sch_id' => $student_school_id);

            $student_details = $this->admin_model->selected_student($student_where);  
            if ($student_details) {//valid type
                $offset = (($page_number - 1) * $records_per_page);
                $limit = $records_per_page;

                $data=$this->studnets_details_list($request_type,$student_id,$limit,$offset);

            
                $data["page_number"] = $page_number;
                $data["records_per_page"] = $records_per_page;
               
            } else {
                $data["status"] = "Invalid student details";
            }
        } else {
            $data["status"] = "Invalid parms";
        }
        $this->response($data, 200); 
    }

    public function results_get() {
        $student_key = $this->get("student_key");
        //valid student
        if ($student_key) {
            $student_keys = explode("-", $this->get("student_key"));
            $student_id = $student_keys[1];
            $student_school_id = $student_keys[0];
            $student_where = array(
                'sc_stu_id' => $student_id,
                'sc_sch_id' => $student_school_id);

            $student_details = $this->admin_model->selected_student($student_where); 
            $page_number = ($this->get("page_number")) ? $this->get("page_number") : 1;
            $records_per_page = ($this->get("records_per_page")) ? $this->get("records_per_page") : 1;
            $limit = '';
            if ($student_details) {
                //valid type

                $offset = (($page_number - 1) * $records_per_page);
                $limit = $records_per_page;
                
                $results_where = array('sc_mak_student_id' => $student_id);
                $results = $this->admin_model->student_results($results_where);
                $results=$this->append_max_marks_subject($student_id, $results);
                $data["results"]=$results;
                $data["total_records"]=count($this->admin_model->student_results($results_where));
                $data["page_number"] = $page_number;
                $data["records_per_page"] = $records_per_page;
            } else {
                $data["status"] = "Invalid details";
            }
        } else {
            $data["status"] = "Invalid parms";
        }
        $this->response($data, 200);
    }
    
    public function studnets_details_list($type,$student_id,$limit,$offset){
        $data=array(); 
        switch($type){
            case "remarks":
                $remarks_where = array('sc_rem_student_id' => $student_id);
                $data["remarks"]=$this->admin_model->student_remarks($remarks_where,$limit,$offset);
                $data["total_records"]=count($this->admin_model->student_remarks($remarks_where));    
            
            break;
            case "attendence":
                $attendence_where = array('sc_att_student_id' => $student_id);
                $data["attendance"] = $this->admin_model->student_attendance($attendence_where, $limit, $offset);
                $data["total_records"]=count($this->admin_model->student_attendance($attendence_where));    
            break;
            case "payments":
                $payments_where = array('sc_pay_student_id' => $student_id);
                $data["payments"]=$this->admin_model->student_paymnets($payments_where,$limit,$offset);    
                $data["total_records"]=count($this->admin_model->student_paymnets($payments_where));    
                break;
            default:
            echo "Invalid student detail type";
        }
        return $data;
    }
    
    public function append_max_marks_subject($student_id, $results){
        $previeous_exam_id=0;
        $subject_max_marks=array();
        foreach($results as $key =>$value){
            if($previeous_exam_id != $value->sc_mak_exam_id)
            {
                //Bring student class id
                $class_student_where=array("sc_student_id"=>$student_id);
                $class_details=$this->admin_model->singleRecord_where("sc_class_students", $class_student_where);
            
                $max_marks_where=array("sc_class_id" => $class_details->sc_class_id,
                                    "sc_exam_id" => $value->sc_mak_exam_id );
                $subject_max_marks=$this->admin_model->allRecords_where("sc_class_exam_subject",$max_marks_where);
            
            } 
            foreach($subject_max_marks as $subject_marks){
//                d($value->sc_mak_exam_id );
//                e($subject_marks->sc_exam_id );
                if($subject_marks->sc_exam_id == $value->sc_mak_exam_id 
                    && $subject_marks->sc_subject_id  == $value->sc_mak_subject_id){
                   // e($results[$key]);
                    $results[$key]->max_marks=$subject_marks->sc_subj_max_marks;
                }
            }
            
        }
        
        return $results;
    }

  

}
