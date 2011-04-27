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

   // Validation Functions
   function validate_availability(){
       $this->load->model('Institution');
       return $this->Institution->isAvailable(
               $this->input->post('name'),
               $this->input->post('sname')
               );
   }
   // View Creators
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

       $this->page->title = "Create New Institution";
       $this->defaultBreadcrumb['Create New Instituion'] = "";
       $this->page->breadcrumbs = $this->defaultBreadcrumb;

       if(isset ($mode)){
           if($mode == "process"){
               // Process Submitted request
               $this->form_validation->set_rules('name', 'Name', 'required|max_length[100]|callback_validate_availability');
               $this->form_validation->set_rules('sname', 'Short Name', 'required|max_length[100]');
               $this->form_validation->set_rules('location', 'Location', 'required|max_length[100]');
               $this->form_validation->set_rules('campuses', 'Campuses', 'required|max_length[500]');
               $this->form_validation->set_rules('short_description', 'Short Description', 'required|max_length[500]');
               $this->form_validation->set_message('validate_availability', 'This Name or Short Name is Unavailable!');

               if($this->form_validation->run()){
                   // Success. insert into db
                   $this->load->model('Institution');
                   $institution_id = $this->Institution->Create(
                           $this->input->post('name'),
                           $this->input->post('sname'),
                           $this->input->post('campuses'),
                           $this->input->post('short_description'),
                           $this->input->post('location')
                           );
                   if($institution_id)
                       $this->page->showMessage("Successfully created community! ID is: $institution_id");
                   else
                       $this->page->showMessage("Error! Instituion name/short name alredy taken.");
                   return;
               }
           }
       }

       
       $this->page->loadViews(
               array(
                   array("Institutions", "sidebars/inst_common")
               ),
               array(
                   array("Create New Instituion", "forms/createInst")
               ),
               null);
   }

   function join($mode = "", $id = ""){
       // Join an Institution
       $this->page->title = "Join An Institution";
       $this->defaultBreadcrumb['Join An Institution'] = "";
       $this->page->breadcrumbs = $this->defaultBreadcrumb;

       if(isset($mode)){
           if($mode == "id_chosen"){
               if(!isset($id)){
                   $this->page->showMessage("Error: Must Choose An ID");
                   return;
               }
               
           }else if($mode == "ref_chosen"){
               $this->form_validation->set_rules('id', 'Institute ID', 'required|');
               $this->form_validation->set_rules('referer', 'Referer Username', 'required|max_length[100]');

               if($this->form_validation->run()){
                   // success!
               }
           }
           $this->defaultBreadcrumb['Join An Institution'] = site_url('institute/join');
           $this->defaultBreadcrumb['Choose Referer'] = "";
           $this->page->breadcrumbs = $this->defaultBreadcrumb;
           $this->page->loadViews(
                array(
                   array("Institutions", "sidebars/inst_common")
                ),
                array(
                   array("Choose A Referer", "forms/choose_referer", array("id" => $id)),
                ),
                null);
           return;
       }

       // Load  Models
       $this->load->model('Institution');
       $instList = $this->Institution->getAll();

       $this->page->loadViews(
            array(
               array("Institutions", "sidebars/inst_common")
            ),
            array(
               array("Join An Instituion", "institution/join", array("list" => $instList)),
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