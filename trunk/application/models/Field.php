<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

 class Field extends CI_Model {

       function __construct()
       {
           // Call the Model constructor
           parent::__construct();
       }

       function GetFieldByInst($instid)
       {
           $this->db->select('short_name');
           $this->db->where('institution_id',$instid);
           $query = $this->db->get('field');
           $list = $query->result_array();
           $result = array();
           foreach($list as $element)
           {    if($element['short_name'] != null)
                    array_push($result, $element['short_name']);
           }
           return $result;
           return $list;
       }
   }

?>
 