<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Institution extends CI_Controller {
    //put your code here

    function index(){
        $this->page->title = "Institution Page";
        $this->page->loadViews(
                    null,
                    array(
                        array("Institution Name: BUET", "single/institution")
                    ),
                    null);
    }
}
?>
