
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class register extends CI_Controller {
           private $institution_list;
           private $register_data;
           function __construct()
           {
                   parent::__construct();
                   //$this->load->model(institution);
                  $this->institution_list = null;
                 // $this->page->set("registerscript","js");
           }
           function index(){
               $this->FormValidation();
               if ($this->form_validation->run() == FALSE)
		{
                        
			$this->LoadRegistrationView();
		}
		else
		{       $this->register_data = $_POST;
			$this->StoreData();
		}
              
           }
           function LoadRegistrationView()
           {
              $this->page->title = "Registration";
              //$this->page->content = array('BUET','DU','MEDICAL');
             
              $this->GetInstitutionList();
              $this->page->nav1 = array(
                  "Home" => base_url(),
                  "Login" => site_url('login'),
              );

              $this->page->breadcrumbs = array(
                  "Home" => base_url(),
                  "Registration" => site_url('register')
              );



              $this->page->loadViews(
                    null,
                    array(
                        array("Registration", "forms/registration",array('inst_list'=>$this->institution_list))
                    ),

                  null);
           }
           function GetInstitutionList()
           {
              if($this->institution_list == null){
              
                  $this->load->model('Institution');
                  $this->institution_list = $this->Institution->GetInstitutionList();
              }
              
           }

           function FormValidation()
           {
               $this->form_validation->set_rules('contact_firstname','Firstname','required|min_length[3]|max_length[10]');
               $this->form_validation->set_rules('contact_lastname','Lastname','required|min_length[3]|max_length[10]');
               $this->form_validation->set_rules('contact_password','Password','required|min_length[6]|max_length[15]|matches[contact_repassword]');
               $this->form_validation->set_rules('contact_repassword','Re Enter Password','required|min_length[6]|max_length[15]');
               $this->form_validation->set_rules('contact_institution','Institution','callback_CheckInstitution');
               $this->form_validation->set_rules('contact_field','Field','callback_CheckField');
               $this->form_validation->set_rules('contact_address','Address','required|min_length[6]|max_length[100]');
               $this->form_validation->set_rules('contact_phone','Phone','callback_CheckPhone');
               $this->form_validation->set_rules('contact_email','Email','callback_CheckMail');
               //$this->form_validation->set_rules('contact_url','URL','required');
           }


           function CheckInstitution($inst)
           {
               $this->form_validation->set_message('CheckInstitution', 'The %s field must be present in Database');
               $this->GetInstitutionList();
              // echo $inst;
               
               foreach($this->institution_list as $key=>$val)
               {
                  // echo $val. " " . $inst . "\n";
                   if(trim($val) == trim($inst) )
                        return true;
                  
               }
              
               return false;

           }
           function CheckField($field)
           {
               
               return true;
           }
   
         
           function CheckAddress($address)
           {
                
                     return true;
           }
           function CheckMail($mail)
           {
                $this->form_validation->set_message('CheckMail', 'The %s field is not valid');
               
                return true;
           }
           function CheckPhone($phone)
           {
                $this->form_validation->set_message('CheckPhone', 'The %s field should be a number from 6 to 15 digit');
                return true;
           }
           function SendVerificationEmail()
           {
               
              $this->load->view('verify',array('data' => $this->register_data));

              
           }

           function StoreData()
           {
               $this->load->model('User');
               $this->User->InsertUser($this->register_data);
               $this->load->model('user');
               $this->User-> GetUserVerifiactionData($this->register_data['contact_username']);
               //$this->SendVerificationEmail();
           }
           function Register()
           {

             

           }
   }
?>