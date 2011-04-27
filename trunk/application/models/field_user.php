<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Field_user extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function Insert($username, $field_id) {
        $data = array('username' => $username, 'field_id' => $field_id);
        $this->db->insert('user_field', $data);
    }

}

?>
