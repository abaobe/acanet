<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class User_inst extends CI_Model {

    var $username;
    var $institution_id;
    var $role;
    var $referer;

    function __construct() {
        parent::__construct();
    }

    

    function Create(){

        $this->db->insert('user_institution', $this);
    }

    function Load(){
        $this->db->where(array(
            'username' => $this->username,
            'institution_id' => $this->institution_id)
                );
        $query = $this->db->get('user_institution');
        foreach($query->result() as $row){
            $this->role = $row->role;
            $this->referer = $row->referer;
        }
    }

    function update(){
        $this->db->where(array(
            'username' => $this->username,
            'institution_id' => $this->institution_id
        ));
        $this->db->update('user_institution', $this);
    }

}

?>
