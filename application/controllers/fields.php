<?php

/* * ***** ****** ****** ****** ****** ******
 *
 * Author       :   Shafiul Azam
 *              :   ishafiul@gmail.com
 *              :   Project Manager
 * Page         :
 * Description  :   
 * Last Updated :
 *
 * ****** ****** ****** ****** ****** ***** */



    class Fields extends CI_Controller{
        
        
        public $defaultBreadCrumb;
        
        function __construct(){
            parent::__construct();
            $this->defaultBreadcrumb = array(
            "Home" => base_url(),
            "Fields" => site_url("fields"));
            // Load User Model
            $this->load->model('model_user','User');
            $this->load->model('Field');
            $this->load->model('User_field');
        }
        
        
        // Validation Functions
        function validate_availability(){
           // In case of global, name must be unique
           // in case of those under Institutions, only one name under an institute. 
           return $this->Field->IsAvailable();
        }
        
        function validate_referer(){
            if(!empty($this->input->post('referer'))){
                return $this->User->IsUsernameValid('referer');
            }
            return false;
        }
        
        
        function index(){
            // view public fields here.
        }
        
        
        function create($mode="", $option = ""){

           $this->page->title = "Create New Field";
           $this->defaultBreadcrumb['Create New Field'] = "";
           $this->page->breadcrumbs = $this->defaultBreadcrumb;
           $uname = $this->User->Authenticate();
           if(!$uname)
               return;
           if(!empty ($mode)){
               if($mode == "process"){
                   // Process Submitted request
                   $this->form_validation->set_rules('name', 'Name', 'required|max_length[100]|callback_validate_availability');
                   $this->form_validation->set_rules('short_name', 'Short Name', 'required|max_length[100]');
                   $this->form_validation->set_rules('institution_id', 'Institution ID', 'required|integer');
                   
                   // Prepare the model
                   $this->Field->name = $this->input->post('name');
                   $this->Field->short_name = $this->input->post('short_name');
                   $this->Field->institution_id = (int) ($this->input->post('institution_id') );
                   
                   $this->form_validation->set_rules('short_description', 'Short Description', 'required|max_length[500]');
                   $this->form_validation->set_message('validate_availability', 'This Name is Unavailable!');
//                   if($option == "modify"){
//                       $this->form_validation->set_rules('institution_id','Institution Id', 'required');
//                       $this->form_validation->set_rules('status','Status ', 'required');
//                   }
                   if($this->form_validation->run()){
                       // Success. insert into db
//                       if($option == "modify"){
//                           // validate permissions -- TBD
//                           $this->Institution->institution_id = $this->input->post('institution_id');
//                           if(!$this->Institution->Load()){
//                               $this->page->showMessage("The institution was not found for modifying");
//                               return;
//                           }
//                       }
                       $this->Field->short_description = $this->input->post('short_description');
                       
//                       if($option == "modify"){
//                           $this->Institution->status = $this->input->post('status');
//                           $this->Institution->Update();
//                           $this->page->showMessage("Institution Updated!");
//                           return;
//                       }
                       $this->Field->status = "pending";
                       // Get a community
                       $this->load->model("model_community","Community");
                       // Create Instance
                       $this->Community->name = "Community for " . $this->Field->name;
                       $this->Community->type = "institution";
                       $this->Community->short_description = $this->Field->short_description;
                       $this->Community->Insert();  //  Created
                       
                       if(!$this->Community->community_id){
                           $this->page->showMesssage("Failed to create community!");
                           return;
                       }
                       
                       $this->Field->community_id = $this->Community->community_id;
                       
                       $this->Field->Insert();    //  Insert Into DB
                       if($this->Field->field_id){
                           // Insert it into user_field
                           // Prepare Object
                           $this->User_field->username = $uname;
                           $this->User_field->field_id = $this->Field->field_id;
                           $this->User_field->role = "owner";
                           $this->User_field->Insert();  // Create
                           $this->page->showMessage("Successfully created Field! ID is: " . $this->Field->field_id);
                       }else{
                           $this->page->showMessage("Error! Instituion name/short name alredy taken.");
                       }
                       return;
                   }else{
                       // Not validated
//                       if($option == "modify"){
//                           redirect('institute/modify/id_chosen/' . $this->input->post('institution_id'));
//                           return;
//                       }
                   }
               }
           }
           
           // Get all institution list to send to sidebars
           
           $this->load->model('Institution');
           $institutes = $this->Institution->GetAll();
           // Prepare data to send
           $data = array();
           $data['0'] = "Under No Institution (Global)";
           foreach($institutes as $i){
               $data[$i->institution_id] = $i->name;
           }

           $this->page->loadViews(
                   array(
                       array("Fields", "sidebars/field_common"),
                       array("Administration", "sidebars/field_admin")
                   ),
                   array(
                       array("Create New Field", "forms/createField", array("institutes" => $data))
                   ),
                   null);
       }
       
       
       function join($mode = "", $id = ""){
           // Join an Institution
           $this->page->title = "Join A Field";
           $this->defaultBreadcrumb['Join A Field'] = "";
           $this->page->breadcrumbs = $this->defaultBreadcrumb;
           $uname = $this->User->Authenticate();
           if(!$uname)
               return;

           if(!empty($mode)){
               if($mode == "id_chosen"){
                   if(!isset($id)){
                       $this->page->showMessage("Error: Must Choose A Field First!");
                       return;
                   }

               }else if($mode == "ref_chosen"){
                   $this->form_validation->set_rules('field_id', 'Field ID', 'required');
                   $this->form_validation->set_rules('referer', 'Referer Username', 'required|max_length[20]');

                   if($this->form_validation->run()){
                       // success! Check if Field exists
                       $id = $this->input->post('field_id');
    //                   $this->load->model('Institution');
                       $this->Field->field_id = $id;
                       if(!$this->Field->Load()){
                           $this->page->showMessage("Field ID " . $this->Field->field_id . " was not found!");
                           return;
                       }
                       if($this->Field->status != "approved"){
                           $this->page->showMessage("This Field is not approved yet.");
                           return;
                       }
                       // Future implementation: check if the referer valid
                       $this->load->model('User_field');
                       $this->User_field->username = $uname;
                       $this->User_field->field_id = $id;
                       $this->User_field->referer = $this->input->post('referer');
                       $this->User_field->role = "pending";
                       if($this->User_field->IsAvailable()){
                           $this->User_field->Insert();
                           $this->page->showMessage("You are successfully applied for the Field.");
                       }else{
                           $this->page->showMessage("You have already applied for the field!");
                       }
                       return;
                   }
               }
               $this->defaultBreadcrumb['Join A Field'] = site_url('fields/join');
               $this->defaultBreadcrumb['Choose Referer'] = "";
               $this->page->breadcrumbs = $this->defaultBreadcrumb;
               $this->page->loadViews(
                    array(
                       array("Fields", "sidebars/field_common"),
                       array("Administration", "sidebars/field_admin")
                    ),
                    array(
                       array("Choose A Referer", "forms/choose_referer", array("id" => $id)),
                    ),
                    null);
               return;
           }

           // Load  Models
           $fieldList = $this->Field->GetAllApproved();

           $this->page->loadViews(
                array(
                   array("Fields", "sidebars/field_common"),
                   array("Administration", "sidebars/field_admin")
                ),
                array(
                   array("Join A Field", "field/listAll", array("list" => $fieldList)),
                ),
                null);
       }
        
    }

?>
