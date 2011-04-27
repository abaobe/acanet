<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Field extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function GetFieldByInst($instid) {
        $this->db->select('field_id,short_name');
        $this->db->where('institution_id', $instid);
        $query = $this->db->get('field');
        $list = $query->result_array();
        return $list;
    }

    function GetCommunityId($field_id) {
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