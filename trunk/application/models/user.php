<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function InsertUser($data) {
        $store = array(
            'username' => $data['contact_username'],
            'password' => md5($data['contact_password']),
            'name' => $data['contact_firstname'] . " " . $data['contact_lastname'],
            'address' => $data['contact_address'],
            'contact_number' => $data['contact_phone'],
            'mail_address' => $data['contact_email'],
            'type' => 'subscriber',
            'status' => 'pending',
            'verification_data' => 'abcdef'
        );
        $this->db->insert('user', $store);

    }

    function GetUserVerifiactionData($user_id) {
        $this->db->select('verification_data');
        $this->db->where('username', $user_id);
        $query = $this->db->get('user');
        $data = $query->result_array();
        $result = $data[0]['verification_data'];
        return $result;
    }

    function CheckParamAndSetValue($username, $param) {
        $array = array('username' => $username, 'verification_data' => $param);
        $this->db->where($array);
        $query = $this->db->get('user');
        if ($query->num_rows() == 1) {
            $temp = $query->result_array();
            $data = array('status' => 'activated');
            $this->db->where('username', $username);
            $this->db->update('user', $data);
            return true;
        }

        return false;
    }

    function GetUserDataById($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('user');
        $list = $query->result_array();

        foreach ($list as $aQuery) {
            $result = $aQuery;
        }
        return $result;
    }

    function Add() {

    }

    function Get($id=null) {

    }

    function Update($id) {
        
    }

}

?>
 