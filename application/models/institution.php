<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Institution extends CI_Model {

    var $institution_id = "";
    var $name = "";
    var $short_name = "";
    var $campuses = "";
    var $short_description = "";
    var $location = "";
    var $community_id = "";

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function Create($name, $sname, $campuses, $short_description, $location) {
        $this->name = $name;
        $this->short_name = $sname;
        $this->campuses = $campuses;
        $this->short_description = $short_description;
        $this->location = $location;

        // Ge a community
        $this->load->model("Community");
        $this->community_id = $this->Community->Create($name, "institution");

        $this->db->insert('institution', $this);
        $this->institution_id = $this->db->insert_id();
        return $this->institution_id;
    }

    function isAvailable($name, $sname) {
        // given a name & sname checks if they are available
        $this->db->where(array(
            "name" => $name, "short_name" => $sname
        ));
        if ($this->db->count_all_results('institution') > 0)
            return false;
        else
            return true;
    }

    function GetInstitutionList() {
        $this->db->where('institution_id !=', 0);
        $this->db->select('institution_id,short_name');
        $query = $this->db->get('institution');

        $list = $query->result_array();

        return $list;
    }

    function getAll() {
        $query = $this->db->get('institution');
        return $query->result();
    }

    function GetInstitutionIdByShortname($name) {
        $this->db->select('institution_id');
        $this->db->where('short_name', $name);
        $query = $this->db->get('institution');
        $list = $query->result_array();
        $result = array();
        foreach ($list as $element) {
            if ($element['institution_id'] != null)
                array_push($result, $element['institution_id']);
        }
        return $result;
    }

    function GetCommunityId($inst_id) {
        $this->db->select('community_id');
        $this->db->where('institution_id', $inst_id);
        $query = $this->db->get('institution');
        $list = $query->result_array();
        $result = $list[0]['community_id'];
        return $result;
    }

}