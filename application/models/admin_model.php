<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin_model extends CI_Model {

    public function validate($aUserName, $aPassword, $type) {
        return $this->db->get_where('sc_user', array('sc_use_user_name' => $aUserName, 'sc_use_password' => $aPassword, 'sc_use_type' => $type))->row();
    }

    public function validate_username($FUserName, $type) {
        if ($type == 'user')
            return $this->db->get_where('users', array('username' => $FUserName))->row();
        else if ($type == 'admin')
            return $this->db->get_where('admin', array('username' => $FUserName, 'type' => $type))->row();
    }

    public function insert($tablename, $data) {

        $this->db->insert($tablename, $data);
        return $this->db->insert_id();
    }

    public function update($tablename, $data, $where) {
        $this->db->where($where);
        $this->db->update($tablename, $data);
    }

    public function allRecords($tablename) {
        return $this->db->get($tablename)->result();
    }

    public function allRecords_where($tablename, $data) {
        return $this->db->get_where($tablename, $data)->result();
    }

    public function singleRecord_where($tablename, $data) {
        return $this->db->get_where($tablename, $data)->row();
    }

    //To bring the table field names
    public function table_field_names($tablename, $data) {
        return $this->db->select('COLUMN_NAME')->get_where($tablename, $data)->result();
    }

    //To delete the entry in the table
    public function delete_row($table_name, $where) {
        $this->db->delete($table_name, $where);
        return $this->db->affected_rows();
    }

    //To Bring the selected class students list
    public function class_student_list($where) {
        $query = $this->db->select("sc_stu_id, sc_stu_name, sc_stu_initial_name, sc_stu_user_id, sc_stu_photo_url")
                ->from('sc_student as su')
                ->join('sc_class_students as cs', 'cs.sc_student_id=su.sc_stu_id', 'left')
                ->where($where)
                ->get()->result();
        return $query;
    }

    //Get the student & login related details
    public function selected_student($where) {
        $query = $this->db->select("sc_stu_id, sc_sch_id, sc_stu_name,sc_stu_initial_name,
                    sc_stu_parent_name, sc_stu_phone1,  sc_stu_phone2,  sc_stu_address,
                    sc_blood_group, sc_stu_photo_url,sc_use_user_name, sc_use_password, 
                    sc_created_date")
                ->from('sc_student as su')
                ->join('sc_user as us', 'us.sc_use_id=su.sc_stu_user_id', 'left')
                ->where($where)
                ->get()->row();
        return $query;
    }

    //Bring the Main class & there subjects list
    public function class_subject_list($where) {
  
        $query = $this->db->select("cl.sc_cls_id,cl.sc_cls_name , su.sc_sub_name, su.sc_sub_id")
                ->from('sc_class as cl')
                ->join('sc_class_subjects as cs', 'cs.sc_class_id=cl.sc_cls_id', 'left')
                ->join('sc_subject as su', 'su.sc_sub_id=cs.sc_subject_id', 'left')
                ->where($where)->order_by("cl.sc_cls_id", "asc")
                ->get()->result();
        return $query;
    }
    //Bring the Main class & there exams list
    public function class_exam_list($class_id) {
        $where = array('cl.sc_cls_id' => $class_id);
        $query = $this->db->select("cl.sc_cls_id,cl.sc_cls_name , ex.sc_exa_name, ex.sc_exa_id")
                ->from('sc_class as cl')
                ->join('sc_class_exams as ce', 'ce.sc_class_id=cl.sc_cls_id', 'left')
                ->join('sc_exam as ex', 'ex.sc_exa_id=ce.sc_exam_id', 'left')
                ->where($where)->order_by("cl.sc_cls_id", "asc")
                ->get()->result();
        return $query;
    }

    //To Bring the all class section list
    public function class_section_list($where) {
         $query = $this->db->select("sc_cls_id,  sc_cls_name, sc_cls_main_class")
                ->from('sc_class as cl')
                ->where($where)
                ->get()->result();
        return $query;
    }
    
   
    /*To get the selected student remarks
     * @$limt number of records for peage
     * @$offset starting point of records
     */
    public function student_remarks($where,  $limit = NULL, $offset = NULL){
    
        $limit_query="->limit($limit,$offset)";
        if($limit == NULL && $offset == NULL ){
             $limit_query="";
        }
        $query = $this->db->select("sc_rem_description,sc_rem_created_date ")
                ->from('sc_remarks')
                ->where($where)->order_by("sc_rem_created_date", "desc");
        if($limit !== NULL && $offset !== NULL ){
             $query->limit($limit,$offset);
        }
        $query=$query->get()->result(); 
        return $query;
        
    }
    /*To get the selected student Payments
     * @$limt number of records for peage
     * @$offset starting point 
    */
    public function student_paymnets($where,  $limit = NULL, $offset = NULL){
        $limit_query="->limit($limit,$offset)";
        if($limit == NULL && $offset == NULL ){
             $limit_query="";
        }
        $query = $this->db->select("sc_pay_description, sc_pay_mode, sc_pay_name,sc_pay_amount, sc_pay_created_date")
                ->from('sc_payment')
                ->where($where)->order_by("sc_pay_created_date", "desc");
        if($limit !== NULL && $offset !== NULL ){
             $query->limit($limit,$offset);
        }
        $query=$query->get()->result(); 
        return $query;
    }
    /*To get the selected student attendance
     * @$limt number of records for peage
     * @$offset starting point 
    */
    public function student_attendance($where,  $limit = NULL, $offset = NULL){
        $limit_query="->limit($limit,$offset)";
        if($limit == NULL && $offset == NULL ){
             $limit_query="";
        }
        $query = $this->db->select("sw.sc_wor_month,sw.sc_wor_no_of_days ,"
            . " sc_att_attendend_days, sc_att_created_on")
                ->from('sc_attendence sa')
                 ->join('sc_working_days as sw', 'sw.sc_wor_id=sa.sc_att_month_id', 'left')
                ->where($where)->order_by("sc_att_created_on", "desc");
        if($limit !== NULL && $offset !== NULL ){
             $query->limit($limit,$offset);
        }
        $query=$query->get()->result(); 
        return $query;
    }
    /*To get the selected student results
     * @$limt number of records for peage
     * @$offset starting point 
    */
    public function student_results($where,  $limit = NULL, $offset = NULL){
        $limit_query="->limit($limit,$offset)";
        if($limit == NULL && $offset == NULL ){
             $limit_query="";
        }
        $query = $this->db->select("exam.sc_exa_name,sub.sc_sub_name,sc_mak_marks,"
            . "sc_mak_subject_id, sc_mak_exam_id, sc_mar_created_on")
                ->from('sc_marks mar')
                ->join('sc_subject as sub', 'sub.sc_sub_id=mar.sc_mak_student_id', 'left')
                ->join('sc_exam as exam', 'exam.sc_exa_id=mar.sc_mak_exam_id', 'left')
                ->where($where)->order_by("sc_mar_created_on", "desc");
        if($limit !== NULL && $offset !== NULL ){
             $query->limit($limit,$offset);
        }
        $query=$query->get()->result(); 
        return $query;
    }
    

}
