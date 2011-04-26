<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Inst_field extends CI_Controller{
   // public $CI;

    function  __construct()
    {
       parent::__construct();
       //$this->CI = & get_instance();
    }
    function index()
    {
       $this->load->model('Institution');
       $inst_ids = $this->Institution->GetInstitutionIdByShortname($_GET['name']);
      // print_r($inst_ids);
       $this->load->model('Field');
       $list = array();
       foreach($inst_ids as $aInst)
       {
            $temp = $this->Field->GetFieldByInst($aInst);
            foreach($temp as $aTemp)
            array_push($list,$aTemp);
       }

       //print_r ($list);
      // echo "hello";

       foreach( $list as $element)
       {
           echo $element;
       }

    }
}
?>


