<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Inst_user extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function Insert($username, $inst_id) {
        $data = array('username' => $username, 'institution_id' => $inst_id);
        $this->db->insert('user_institution', $data);
    }

}

?>
