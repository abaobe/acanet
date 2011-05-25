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

    

    function Insert(){

        $this->db->insert('user_institution', $this);
    }

    function Load(){
        if($this->IsAvailable())
            return false;
        $this->db->where(array(
            'username' => $this->username,
            'institution_id' => $this->institution_id)
                );
        $query = $this->db->get('user_institution');
        foreach($query->result() as $row){
            $this->role = $row->role;
            $this->referer = $row->referer;
        }
        return true;
    }

    function IsAvailable(){
        $this->db->where(array(
            'username' => $this->username,
            'institution_id' => $this->institution_id
        ));
        if($this->db->count_all_results('user_institution') > 0)
            return false;
        else
            return true;
    }

    function Update(){
        $this->db->where(array(
            'username' => $this->username,
            'institution_id' => $this->institution_id
        ));
        $this->db->update('user_institution', $this);
    }

    function GetPendingMembers(){
    }
    
    function ValidateMembership(){
        // validates if given user is member of a given institute,
        // also returns false if pending/banned etc.
        if($this->Load()){
            switch($this->role){
                case 'pending':
                    return false;
                case 'banned' :
                    return false;
                default:
                    return true;
                        
            }
        }
        return false;    
    }
    
    function GetRole(){
        // Returns role, else False if failed to load
        if($this->Load()){
            return $this->role;
        }
        return false;
    }

}

?>
