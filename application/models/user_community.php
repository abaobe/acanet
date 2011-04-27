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

    function Insert($username, $community_id,$role="subscriber") {
        $data = array('username' => $username, 'community_id' => $community_id,'role'=>$role);
        $this->db->insert('user_community', $data);
    }

}

?>
