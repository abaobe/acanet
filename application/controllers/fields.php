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
        }
        
        
        // Validation Functions
        function validate_availability(){
           // In case of global, name must be unique
           // in case of those under Institutions, only one name under an institute. 
           return true;
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
                   $this->form_validation->set_rules('short_description', 'Short Description', 'required|max_length[500]');
                   $this->form_validation->set_message('validate_availability', 'This Name or Short Name is Unavailable!');
//                   if($option == "modify"){
//                       $this->form_validation->set_rules('institution_id','Institution Id', 'required');
//                       $this->form_validation->set_rules('status','Status ', 'required');
//                   }
                   if($this->form_validation->run()){
                       // Success. insert into db
                       $this->load->model('Field');
                       // Create Object
//                       if($option == "modify"){
//                           // validate permissions -- TBD
//                           $this->Institution->institution_id = $this->input->post('institution_id');
//                           if(!$this->Institution->Load()){
//                               $this->page->showMessage("The institution was not found for modifying");
//                               return;
//                           }
//                       }
                       $this->Institution->name = $this->input->post('name');
                       $this->Institution->short_name = $this->input->post('sname');
                       $this->Institution->institution_id = $this->input->post('instituion_id');
                       $this->Institution->short_description = $this->input->post('short_description');
                       $this->Institution->location = $this->input->post('location');
//                       if($option == "modify"){
//                           $this->Institution->status = $this->input->post('status');
//                           $this->Institution->Update();
//                           $this->page->showMessage("Institution Updated!");
//                           return;
//                       }
//                       $this->Institution->status = "pending";
//                       $this->Institution->Insert();    //  Insert Into DB
//                       if($this->Institution->institution_id){
//                           // Insert it into user_inst
//                           $this->load->model('User_inst');
//                           // Prepare Object
//                           $this->User_inst->username = $uname;
//                           $this->User_inst->institution_id = $this->Institution->institution_id;
//                           $this->User_inst->role = "owner";
//                           $this->User_inst->Insert();  // Create
//                           $this->page->showMessage("Successfully created community! ID is: " . $this->Institution->institution_id);
//                       }else{
//                           $this->page->showMessage("Error! Instituion name/short name alredy taken.");
//                       }
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
           
           // Get all institution list
           
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
        
    }

?>
