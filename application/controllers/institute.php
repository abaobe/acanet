<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Institute extends CI_Controller {


    public $defaultBreadcrumb;

   //put your code here

    function __construct(){
        parent::__construct();
        $this->defaultBreadcrumb = array(
        "Home" => base_url(),
        "Institution" => site_url("Institution"));
    }

   function index() {
      $this->page->title = "Institution Page";
      $this->page->loadViews(
              array(
                   array("Institutions", "sidebars/inst_common")
               ),
              null,
              null);
      
   }

   function create($mode=""){

       if(isset ($mode)){
           if($mode == "process"){
               // Process Submitted request
               $this->form_validation->set_rules('name', 'Name', 'required|max_length[100]');
               $this->form_validation->set_rules('sname', 'Short Name', 'required|max_length[100]');
               $this->form_validation->set_rules('location', 'Location', 'required|max_length[100]');
               $this->form_validation->set_rules('campuses', 'Campuses', 'required|max_length[500]');
               $this->form_validation->set_rules('short_description', 'Short Description', 'required|max_length[500]');
               if($this->form_validation->run()){
                   // Success.
                   $this->page->showMessage("Success!");
                   return;
               }
           }
       }

       $this->load->model('Institution');
       $a = $this->Institution->GetInstitutionList();
       $this->page->title = "Create New Institution";
       $this->defaultBreadcrumb['Create New Instituion'] = "";
       $this->page->breadcrumbs = $this->defaultBreadcrumb;
       $this->page->loadViews(
               array(
                   array("Institutions", "sidebars/inst_common")
               ),
               array(
                   array("Create New Instituion", "forms/createInst")
               ),
               null);
   }

   function sample() {
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
