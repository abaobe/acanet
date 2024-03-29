<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

   class Model_community extends CI_Model {

       var $community_id ="";
       var $name = "";
       var $type = "";
       var $short_description = "";
       var $updated_date = "";

       function __construct()
       {
           // Call the Model constructor
           parent::__construct();
       }
       function GetById($id){
           $this->db->select('*');
           $query = $this->db->get_where('community', array('community_id =' => $id, 'community_id !=' => 0));
           return $query->result();
       }
       function GetByType($type,$limit=null){
           $this->db->select('*');
           $query = $this->db->get_where('community',  array('type' => $type, 'community_id !=' => 0), $limit);
           return $query->result();
       }
       function GetByName($name){
           $query_str = "SELECT * FROM `community` WHERE `name` = '$name'";
           $query = $this->db->query($query_str);
           return $query->result();
       }
       function Get($id=null)
       {

       }
       function Insert($name,$type,$short_description){
           $this->db->set('name',$name);
           $this->db->set('type',$type);
           $this->db->set('short_description',$short_description);
           $this->db->set('updated_date',"now()",false);
           $this->db->insert("community");
           $this->community_id = $this->db->insert_id();
           return $this->community_id;
       }
       function DirectInsert(){
           $this->db->insert("community", $this);
           $this->community_id = $this->db->insert_id();
           return $this->community_id;
       }

       function Update($id)
       {
       }

       function GetFieldId($community_id){
           $this->db->select('field_id');
           $query = $this->db->get_where('field', array('community_id =' => $community_id, 'community_id !=' => 0));
           return $query->result();
       }
       function GetInstId($community_id){
           $this->db->select('institution_id');
           $query = $this->db->get_where('institution', array('community_id =' => $community_id, 'community_id !=' => 0));
           return $query->result();
       }
       

   }

?>
 