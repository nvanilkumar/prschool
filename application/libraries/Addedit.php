<?php

/**
 * The class will contain the add & edit 
 *  operations related to form data 
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Addedit {

    private $ci;
    public $table_name;
    public $field_name;
    public $field_value;

    public function __construct() {
        $this->ci = & get_instance();
    }

    //set the class data
    public function setData($table_name, $field_name, $field_value) {
        $this->table_name = $table_name;
        $this->field_name = $field_name;
        $this->field_value = $field_value;
    }

    /**
     * Brings the passed table name filed names to 
     *
     *  @param   $table_name pass the table name
     */
    public function table_filed_list() {
        //echo 'test';
        $where['TABLE_NAME'] = $this->table_name;

        $field_names = $this->ci->admin_model
            ->allRecords_where('INFORMATION_SCHEMA.COLUMNS', $where);
        foreach ($field_names as $record) {
            $field_array[] = $record->COLUMN_NAME;
        }
        return $field_array;
    }

    /**
     * Populates the field names with post/get value array as a return
     *
     *  @param   $field_array 
     *  @return  
     */
    public function fields_values_list($field_array, $p_data) {
        foreach ($p_data as $key => $val) {
            if (in_array($key, $field_array)) {
                $field_list[$key] = $val;
            }
        }
        return $field_list;
    }

    /**
     * To insert the data
     *
     * @param   $table_name 
     * @param   $field_name  edit field name
     * @param   $field_value edited field value
     * @return   after insert returns insert id & after update it returns sucess message
     */
    public function custom_add_edit_options($p_data) {
        //Bring the table filed names array
        $field_array = $this->table_filed_list($this->table_name);
        //prepare data array with given field names
        $fields_value_list = $this->fields_values_list($field_array, $p_data);
        $type = $p_data['type'];
        if ($type == 'Add') {
            return $this->ci->admin_model->insert($this->table_name, $fields_value_list);
        } else if ($type == 'Edit') {
            $where = array($this->field_name => $this->field_value);
            $this->ci->admin_model->update($this->table_name, $fields_value_list, $where);
            return 'sucess';
        } else {
            return 'Wrong operation name';
        }
    }

}
