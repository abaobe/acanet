<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Verifyuser extends CI_Controller{
    function  __construct() {
        parent::__construct();
    }

    function index($username,$param)
    {
        $this->load->model('User');
        if($this->User->CheckParamAndSetValue($username,$param))
        {
            $this->load->view('home');
        }
        else{
            $this->load->view('error');

        }
    }
}

?>
