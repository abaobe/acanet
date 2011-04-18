<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Institution extends CI_Controller {

   //put your code here

   function index() {
      $this->LoadInstitutionView();
      
   }

   function LoadInstitutionView() {
      $this->page->title = "Institution Page";

      $this->page->nav1 = array(
          "Home" => base_url(),
          "Login" => site_url('login'),
          "Registration" => site_url('register')
      );



      $this->page->breadcrumbs = array(
          "Home" => base_url(),
          "Institution" => site_url("Institution")
      );




     
      $this->page->loadViews(
              null,
              array(
                  array("Institution Name: BUET", "single/institution")
              ),
              null);
   }

}

?>
