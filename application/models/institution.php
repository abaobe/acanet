<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 class Institution extends CI_Model {

       var $institution_id = "";
       var $name ="";
       var $short_name = "";
       var $campuses = "";
       var $short_description = "";
       var $location  = "";
       var $community_id = "";
       var $status = "";

       function getInstitution_id(){
           return $this->institution_id;
       }

       function __construct()
       {
           // Call the Model constructor
           parent::__construct();
       }

       function Insert(){
           // Get a community
           $this->load->model("Community");
           // Create Instance
           $this->Community->name = $this->name;
           $this->Community->type = "institution";
           $this->Community->short_description = $this->short_description;
           $this->Community->Insert();  //  Created
           $this->community_id = $this->Community->community_id;
           $this->db->insert('institution',$this);
           $this->institution_id = $this->db->insert_id();
       }

       function Update(){
           $this->db->where(array('institution_id' => $this->institution_id));
           $this->db->update('institution', $this);
       }

       function IsAvailable(){
           // given a name & sname checks if they are available
           $this->db->or_where(array(
               "name" => $this->name, "short_name" => $this->short_name
           ));
           if($this->db->count_all_results('institution') > 0)
               return false;
           else
               return true;
       }
       
       function GetInstitutionList()
       {
           // Created by Oly for his own purpose
           $this->db->select('short_name');
           $query = $this->db->get('institution');
           $list = $query->result_array();
           $result = array();
           foreach($list as $element)
           {    if($element['short_name'] != null)
                    array_push($result, $element['short_name']);
           }
           return $result;
       }

       function GetAll(){
           $query = $this->db->get('institution');
           return $query->result();
       }
       function GetAllApproved(){
           $query = $this->db->get_where('institution', array(
               'status' => 'approved'
           ));
           return $query->result();
       }

       function GetInstitutionIdByShortname($name)
       {
           // Created by Oly for his own purpose
           $this->db->select('institution_id');
           $this->db->where('short_name',$name);
           $query = $this->db->get('institution');
           $list = $query->result_array();
           $result = array();
           foreach($list as $element)
           {    if($element['institution_id'] != null)
                    array_push($result, $element['institution_id']);
           }
           return $result;


       }

       function Load(){
           // Gets a single row from DB.
           $this->db->where(array(
               'institution_id' => $this->institution_id
           ));
           if($this->db->count_all_results('institution') > 0){
               $query = $this->db->get_where('institution',array(
                   'institution_id' => $this->institution_id
               ) );
               foreach($query->result() as $row){
                   $this->institution_id = $row->institution_id;
                   $this->name = $row->name;
                   $this->short_name = $row->short_name;
                   $this->short_description = $row->short_description;
                   $this->campuses = $row->campuses;
                   $this->location = $row->location;
                   $this->status = $row->status;
               }
               return true;
           }
           return false;
       }

       function IsValid(){
           //  DEPRECATED!! USE Load()
           // checks if the institution ID provided exists. further, you may need to
           // check also the status so that it is not pending
           $this->db->where(array(
               'institution_id' => $this->institution_id
           ));
           if($this->db->count_all_results('institution') > 0)
               return true;
           else
               return false;
       }
 }