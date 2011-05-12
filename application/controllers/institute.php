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
        "Institution" => site_url("institute"));
        // Load User Model
        $this->load->model('model_user','User');
    }

   // Validation Functions
   function validate_availability(){
       $this->load->model('Institution');
       return $this->Institution->IsAvailable(
               $this->input->post('name'),
               $this->input->post('sname')
               );
   }
   // View Creators
   function index() {
      redirect('institute/join');
   }

   function create($mode="", $option = ""){

       $this->page->title = "Create New Institution";
       $this->defaultBreadcrumb['Create New Instituion'] = "";
       $this->page->breadcrumbs = $this->defaultBreadcrumb;
       $uname = $this->User->Authenticate();
       if(!$uname)
           return;
       if(!empty ($mode)){
           if($mode == "process"){
               // Process Submitted request
               $this->form_validation->set_rules('name', 'Name', 'required|max_length[100]|callback_validate_availability');
               $this->form_validation->set_rules('sname', 'Short Name', 'required|max_length[100]');
               $this->form_validation->set_rules('location', 'Location', 'required|max_length[100]');
               $this->form_validation->set_rules('campuses', 'Campuses', 'required|max_length[500]');
               $this->form_validation->set_rules('short_description', 'Short Description', 'required|max_length[500]');
               $this->form_validation->set_message('validate_availability', 'This Name or Short Name is Unavailable!');
               if($option == "modify"){
                   $this->form_validation->set_rules('institution_id','Institution Id', 'required');
                   $this->form_validation->set_rules('status','Status ', 'required');
               }
               if($this->form_validation->run()){
                   // Success. insert into db
                   $this->load->model('Institution');
                   // Create Object
                   if($option == "modify"){
                       // validate permissions -- TBD
                       $this->Institution->institution_id = $this->input->post('institution_id');
                       if(!$this->Institution->Load()){
                           $this->page->showMessage("The institution was not found for modifying");
                           return;
                       }
                   }
                   $this->Institution->name = $this->input->post('name');
                   $this->Institution->short_name = $this->input->post('sname');
                   $this->Institution->campuses = $this->input->post('campuses');
                   $this->Institution->short_description = $this->input->post('short_description');
                   $this->Institution->location = $this->input->post('location');
                   if($option == "modify"){
                       $this->Institution->status = $this->input->post('status');
                       $this->Institution->Update();
                       $this->page->showMessage("Institution Updated!");
                       return;
                   }
                   $this->Institution->status = "pending";
                   $this->Institution->Insert();    //  Insert Into DB
                   if($this->Institution->institution_id){
                       // Insert it into user_inst
                       $this->load->model('User_inst');
                       // Prepare Object
                       $this->User_inst->username = $uname;
                       $this->User_inst->institution_id = $this->Institution->institution_id;
                       $this->User_inst->role = "owner";
                       $this->User_inst->Insert();  // Create
                       $this->page->showMessage("Successfully created community! ID is: " . $this->Institution->institution_id);
                   }else{
                       $this->page->showMessage("Error! Instituion name/short name alredy taken.");
                   }
                   return;
               }else{
                   // Not validated
                   if($option == "modify"){
                       redirect('institute/modify/id_chosen/' . $this->input->post('institution_id'));
                       return;
                   }
               }
           }
       }

       
       $this->page->loadViews(
               array(
                   array("Institutions", "sidebars/inst_common"),
                   array("Administration", "sidebars/inst_admin")
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
       $uname = $this->User->Authenticate();
       if(!$uname)
           return;

       if(!empty($mode)){
           if($mode == "id_chosen"){
               if(!isset($id)){
                   $this->page->showMessage("Error: Must Choose An ID");
                   return;
               }
               
           }else if($mode == "ref_chosen"){
               $this->form_validation->set_rules('institution_id', 'Institute ID', 'required');
               $this->form_validation->set_rules('referer', 'Referer Username', 'required|max_length[100]');

               if($this->form_validation->run()){
                   // success! Check if institute exists
                   $id = $this->input->post('institution_id');
                   $this->load->model('Institution');
                   $this->Institution->institution_id = $id;
                   if(!$this->Institution->Load()){
                       $this->page->showMessage("Institution ID " . $this->Institution->institution_id . " was not found!");
                       return;
                   }
                   if($this->Institution->status != "approved"){
                       $this->page->showMessage("This institution is not approved yet.");
                       return;
                   }
                   // Future implementation: check if the referer valid
                   $this->load->model('User_inst');
                   $this->User_inst->username = $uname;
                   $this->User_inst->institution_id = $id;
                   $this->User_inst->referer = $this->input->post('referer');
                   $this->User_inst->role = "pending";
                   if($this->User_inst->IsAvailable()){
                       $this->User_inst->Insert();
                       $this->page->showMessage("You are successfully applied for the Institution.");
                   }else{
                       $this->page->showMessage("You have already applied for the institution!");
                   }
                   return;
               }
           }
           $this->defaultBreadcrumb['Join An Institution'] = site_url('institute/join');
           $this->defaultBreadcrumb['Choose Referer'] = "";
           $this->page->breadcrumbs = $this->defaultBreadcrumb;
           $this->page->loadViews(
                array(
                   array("Institutions", "sidebars/inst_common"),
                   array("Administration", "sidebars/inst_admin")
                ),
                array(
                   array("Choose A Referer", "forms/choose_referer", array("id" => $id)),
                ),
                null);
           return;
       }

       // Load  Models
       $this->load->model('Institution');
       $instList = $this->Institution->GetAllApproved();

       $this->page->loadViews(
            array(
               array("Institutions", "sidebars/inst_common"),
               array("Administration", "sidebars/inst_admin")
            ),
            array(
               array("Join An Instituion", "institution/listAll", array("list" => $instList)),
            ),
            null);
   }

   function modify($mode = "", $id = ""){
       // Modify an Institution
       $this->page->title = "Modify An Institution";
       $this->defaultBreadcrumb['Modify An Institution'] = "";
       $this->page->breadcrumbs = $this->defaultBreadcrumb;
       $uname = $this->User->Authenticate();
       if(!$uname)
           return;
       if(!empty($mode)){
           if($mode == "id_chosen"){
               if(empty($id)){
                   $this->page->showMessage("Error: Must Choose An ID");
                   return;
               }
               // Check permission here. dummy validated...
               // get the institution
               $this->load->model('Institution');

               $this->Institution->institution_id = $id;

               
               if(!$this->Institution->Load()){
                   $this->page->showMessage("Could not load Institution " .  $this->Institution->institution_id);
                   return;
               }

               // All Validated. do something here.
               $this->defaultBreadcrumb['Modify An Institution'] = site_url('institute/modify');
               $this->defaultBreadcrumb['Edit'] = "";
               $this->page->breadcrumbs = $this->defaultBreadcrumb;
               $this->page->loadViews(
                    array(
                       array("Institutions", "sidebars/inst_common"),
                       array("Administration", "sidebars/inst_admin")
                    ),
                    array(
                       array("Edit Institution", "forms/modifyInst", array("instData" => $this->Institution)),
                    ),
                    null);
               return;

           }
       }

       // Load  Models
       $this->load->model('Institution');
       $instList = $this->Institution->GetAll();

       $this->page->loadViews(
            array(
               array("Institutions", "sidebars/inst_common"),
                array("Administration", "sidebars/inst_admin")
            ),
            array(
               array("Modify An Institution", "institution/listAll", array("list" => $instList, "action" => "modify")),
            ),
            null);
   }

   function view($institution_id,$option="") {

       // validations not required since this is general view
       
      $this->load->model('Institution');
      $this->Institution->institution_id = $institution_id;
      if(!$this->Institution->Load()){
          $this->page->showMessage("The Institution you specified was not found");
          return;
      }



      if($option == "community"){
          // Load this page's community. Here we may need validation if the user joined this community
          $this->defaultBreadcrumb[$this->Institution->short_name] = site_url('institute/view/' . $this->Institution->institution_id);
          $this->defaultBreadcrumb["Community"] = "";
          $this->page->breadcrumbs = $this->defaultBreadcrumb;
          $this->page->title = "Official Community Page For " . $this->Institution->name . " ";

          $this->page->showMessage("Load community: " . $this->Institution->community_id);
          return;
      }

      $this->defaultBreadcrumb[$this->Institution->short_name] = "";
      $this->page->breadcrumbs = $this->defaultBreadcrumb;
      $this->page->title = $this->Institution->name . " | Institution";

      $this->page->loadViews(
              null,
              array(
                  array($this->Institution->name, "institution/view", array("instData" => $this->Institution))
              ),
              null);
   }

}

?>
