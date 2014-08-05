<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
 */
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
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
            @$sMessage = "incorrect";
        } else {
            $student_where = array(
                'sc_use_id' => $aUser->sc_use_id);
            $student_details = $this->admin_model->selected_student($student_where);
            $student_id = $student_details->sc_sch_id . "-" . $student_details->sc_stu_id;
            $sMessage = $student_id;
        }
        $this->response(@$sMessage, 200);
    }
    
    public function student_details_get(){
        $request_type=$this->get("type");
        $student_key=$this->get("student_key");
        //valid student
        if($student_key)
        {
            $student_keys=explode("-", $this->get("student_key"));
            $student_id=$student_keys[1];
            $student_school_id=$student_keys[0];
            $student_where = array(
                'sc_stu_id' =>$student_id,
                'sc_sch_id' => $student_school_id);
            
           $student_details = $this->admin_model->selected_student($student_where);//e($student_details);
           if($student_details){
               //valid type
               $remarks_where = array( 'sc_rem_student_id' => $student_id);
               $data["remarks"]=$this->admin_model->student_remarks($remarks_where);
               
           }else{
             $data["status"]="Invalid details";
           }
        }else{
            $data["status"]="Invalid parms";
           
        }
        $this->response($data, 200);  
        
        
    }
        

    function user_get() {
        // echo 'test';exit;
        if (!$this->get('id')) {
            $this->response(NULL, 400);
        }

        // $user = $this->some_model->getSomething( $this->get('id') );
        $users = array(
            1 => array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com', 'fact' => 'Loves swimming'),
            2 => array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com', 'fact' => 'Has a huge face'),
            3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => 'Is a Scott!', array('hobbies' => array('fartings', 'bikes'))),
        );

        $user = @$users[$this->get('id')];

        if ($user) {
            $this->response($user, 200); // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'User could not be found'), 404);
        }
    }

    function user_post() {
        //$this->some_model->updateUser( $this->get('id') );
        //echo 'test';exit;
        $message = array('id' => $this->get('id'), 'name' => $this->post('name'), 'email' => $this->post('email'), 'message' => 'ADDED!');

        $this->response($message, 200); // 200 being the HTTP response code
    }

    function user_delete() {
        //$this->some_model->deletesomething( $this->get('id') );
        $message = array('id' => $this->get('id'), 'message' => 'DELETED!');

        $this->response($message, 200); // 200 being the HTTP response code
    }

    function users_get() {
        //$users = $this->some_model->getSomething( $this->get('limit') );
        $users = array(
            array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com'),
            array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com'),
            3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => array('hobbies' => array('fartings', 'bikes'))),
        );

        if ($users) {
            $this->response($users, 200); // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
    }

    public function send_post() {
        var_dump($this->request->body);
    }

    public function send_put() {
        var_dump($this->put('foo'));
    }

}
