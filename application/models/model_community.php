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

       function __construct()
       {
           // Call the Model constructor
           parent::__construct();
       }
       function GetByType($type,$limit=null){
           $this->db->select('*');
           $query = $this->db->get_where('community',  array('type' => $type, 'community_id !=' => 0), $limit);
           return $query->result();
       }
       function Get($id=null)
       {

       }
       function Insert(){
           // other tasks needed, i.e udpate the community_user table with owners etc.
           $this->db->insert("community", $this);
           $this->community_id = $this->db->insert_id();
       }
       function Update($id)
       {

       }
       

   }

?>
 