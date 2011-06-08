<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 *
 */

class User_community extends CI_Model {

    function __construct() {
        parent::__construct();
    }
   function GetByUserName($name)
   {
       $query_str = "SELECT DISTINCT * FROM `user_community`
       JOIN community ON user_community.community_id = community.community_id
       WHERE `username` = '$name'";
       $query = $this->db->query($query_str);
       return $query->result();
   }

    function Insert($username, $community_id,$role="subscriber") {
        $data = array('username' => $username, 'community_id' => $community_id,'role'=>$role);
        $this->db->insert('user_community', $data);
    }

}

?>
