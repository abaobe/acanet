<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 class Institution extends CI_Model {

       function __construct()
       {
           // Call the Model constructor
           parent::__construct();
       }
       
       function GetInstitutionList()
       {
           $this->db->select('short_name');
           $query = $this->db->get('institution');
           $list = $query->result_array();
           $result = array();
           foreach($list as $element)
           {    if($element['short_name'] != null)
                    array_push($result, $element['short_name']);
           }
           return $result;
       }

       function GetInstitutionIdByShortname($name)
       {
           $this->db->select('institution_id');
           $this->db->where('short_name',$name);
           $query = $this->db->get('institution');
           $list = $query->result_array();
           $result = array();
           foreach($list as $element)
           {    if($element['institution_id'] != null)
                    array_push($result, $element['institution_id']);
           }
           return $result;


       }
 }