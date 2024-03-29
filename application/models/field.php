<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Field extends CI_Model {
    
    
    var $field_id = "";
    var $institution_id = "";
    var $name = "";
    var $short_name = "";
    var $community_id = "";
    var $short_description = "";
    var $status = "";
    
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
    function Insert(){
           $this->db->insert('field',$this);
           $this->field_id = $this->db->insert_id();
       }

       function Update(){
           $this->db->where(array('field_id' => $this->field_id));
           $this->db->update('field', $this);
       }

       function IsAvailable(){
           // given a name  checks if they are available
           // Ignoring Short Names -- they need not to be unique
           $this->db->where(array(
               "name" => $this->name, "institution_id" => $this->institution_id
           ));
           if($this->db->count_all_results('field') > 0)
               return false;
           else
               return true;
       }
       
       function Load(){
           // Gets a single row from DB. Also returns true for successful load.
           $this->db->where(array(
               'field_id' => $this->field_id
           ));
           if($this->db->count_all_results('field') > 0){
               $query = $this->db->get_where('field',array(
                   'field_id' => $this->field_id
               ) );
               foreach($query->result() as $row){
                   $this->field_id = $row->field_id;
                   $this->institution_id = $row->institution_id;
                   $this->name = $row->name;
                   $this->short_name = $row->short_name;
                   $this->short_description = $row->short_description;
                   $this->status = $row->status;
                   $this->community_id = $row->community_id;
               }
               return true;
           }
           return false;
       }
    
    function GetInstitute_id(){
        if($this->Load()){
            return $this->institution_id;
        }
        return false;
    }   
    
    function GetAll(){
           $query = $this->db->get('field');
           return $query->result();
    }
    function GetByUsername($username){
            $query = $this->db->query(
                    "select * from field where field_id in
                (select field_id from user_field where username='$username')");
           return $query->result();
    }
    function GetAllPublic(){
            $this->db->where("institution_id",0);
            $query = $this->db->get('field');
           return $query->result();
    }
       
    function GetAllApproved(){
        $query = $this->db->get_where('field', array(
           'status =' => 'approved'
        ));
        return $query->result();
    }   
    
    function GetField_idByCommunity_id($communityId){
        $this->db->select('field_id');
        $query = $this->db->get_where('field', array(
            'community_id' => $communityId
        ));
        foreach($query->result() as $row){
            return $row->field_id;  //  just the first row.
        }
    }
    
    function GetFieldByInst($instid) {
        // Not Shafiul's
        $this->db->select('field_id,short_name');
        $this->db->where('institution_id', $instid);
        $query = $this->db->get('field');
        $list = $query->result_array();
        return $list;
    }

    function GetCommunityId($field_id) {
        // Not Shafiul's
        $this->db->select('community_id');
        $this->db->where('field_id', $field_id);
        $query = $this->db->get('field');
        $list = $query->result_array();
        $result = $list[0]['community_id'];
        return $result;
    }

}

?>
 