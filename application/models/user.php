<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 class User extends CI_Model {
       
       function __construct()
       {
           // Call the Model constructor
           parent::__construct();
       }


       function InsertUser($data)
       {
           //print_r($data);

           $store=array(
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
           $this->db->insert('user',$store);
           //echo "data inserted";
       }

       function GetUserVerifiactionData($user_id)
       {
           $this->db->select('verification_data');
           $this->db->where('username',$user_id);
           $query = $this->db->get('user');
           $data = $query->result_array();
           //print_r($data);
           $result = $data[0]['verification_data'];
           echo $result;
       }
       function Add()
       {

       }
       function Get($id=null)
       {

       }
       function Update($id)
       {

       }
       
   }

?>
 