<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

   class Community extends CI_Model {

       var $community_id ="";
       var $name = "";
       var $type = "";

       function __construct()
       {
           // Call the Model constructor
           parent::__construct();
       }
       function Get($id=null)
       {

       }
       function Create($name, $type)
       {
            // Create a community
           $this->name = $name;
           $this->type = $type;
           // other tasks needed, i.e udpate the community_user table with owners etc.
           $this->db->insert("community", $this);
           $this->community_id = $this->db->insert_id();
           return $this->community_id;
       }
       function Update($id)
       {

       }
   }

?>
 