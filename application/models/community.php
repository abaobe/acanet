<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

   class Community extends CI_Model {

       var $community_id ="";
       var $name = "";
       var $type = "";
       var $short_description = "";

       function __construct()
       {
           // Call the Model constructor
           parent::__construct();
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