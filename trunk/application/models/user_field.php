<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class User_inst extends CI_Model {

    var $username;
    var $field_id;
    var $role;

    function __construct() {
        parent::__construct();
    }

    

    function Insert(){

        $this->db->insert('user_field', $this);
    }

    function Load(){
        $this->db->where(array(
            'username' => $this->username,
            'field_id' => $this->field_id)
                );
        $query = $this->db->get('user_field');
        foreach($query->result() as $row){
            $this->role = $row->role;
        }
    }

    function IsAvailable(){
        $this->db->where(array(
            'username' => $this->username,
            'field_id' => $this->field_id
        ));
        if($this->db->count_all_results('user_field') > 0)
            return false;
        else
            return true;
    }

    function Update(){
        $this->db->where(array(
            'username' => $this->username,
            'field_id' => $this->field_id
        ));
        $this->db->update('user_field', $this);
    }

    function GetPendingMembers(){
    }

}

?>
