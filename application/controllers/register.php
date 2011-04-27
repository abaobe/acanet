
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class register extends CI_Controller {

    private $institution_list;
    private $register_data;

    function __construct() {
        parent::__construct();
        //$this->load->model(institution);
        $this->institution_list = null;
        // $this->page->set("registerscript","js");
    }

    function index() {
        $this->FormValidation();
        if ($this->form_validation->run() == FALSE) {
            $this->LoadRegistrationView();
        } else {
            $this->register_data = $_POST;
            $this->StoreData();
        }
    }

    function LoadRegistrationView() {
        $this->page->title = "Registration";
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
                    array("Registration", "forms/registration", array('inst_list' => $this->institution_list))
                ),
                null);
    }

    function GetInstitutionList() {
        if ($this->institution_list == null) {
            $this->load->model('Institution');
            $this->institution_list = $this->Institution->GetInstitutionList();
        }
    }

    function FormValidation() {

        //rules for register form validation
        $this->form_validation->set_rules('contact_firstname', 'Firstname', 'required|min_length[3]|max_length[10]');
        $this->form_validation->set_rules('contact_lastname', 'Lastname', 'required|min_length[3]|max_length[10]');
        $this->form_validation->set_rules('contact_username', 'Username', 'callback_CheckUsername');
        $this->form_validation->set_rules('contact_password', 'Password', 'required|min_length[6]|max_length[15]|matches[contact_repassword]');
        $this->form_validation->set_rules('contact_repassword', 'Re Enter Password', 'required|min_length[6]|max_length[15]');
        $this->form_validation->set_rules('contact_institution', 'Institution', 'callback_CheckInstitution');
        $this->form_validation->set_rules('contact_field', 'Field', 'callback_CheckField');
        $this->form_validation->set_rules('contact_address', 'Address', 'required|min_length[6]|max_length[100]');
        $this->form_validation->set_rules('contact_phone', 'Phone', 'callback_CheckPhone');
        $this->form_validation->set_rules('contact_email', 'Email', 'callback_CheckMail');
    }
    function CheckUsername($username)
    {
        $this->load->model('User');
        if(!$this->User->IsUsernameValid($username)){
            $this->form_validation->set_message('CheckUsername', 'The %s is used already please try another username');
            return false;
        }
        return true;

    }
    function CheckInstitution($inst) {
        $this->form_validation->set_message('CheckInstitution', 'The %s field must be present in Database');
        $this->GetInstitutionList();
        // echo $inst;

        foreach ($this->institution_list as $aInst) {
           
            if (trim($aInst['institution_id']) == trim($inst))
                return true;
        }

        return false;
    }

    function CheckField($field) {
        $this->form_validation->set_message('CheckField', 'The %s field is not valid');
        //field checking will be added here
        return true;
    }

    function CheckAddress($address) {
        $this->form_validation->set_message('CheckAddress', 'The %s field is not valid');
        //address checking will be added here
        return true;
    }

    function CheckMail($mail) {
        $this->form_validation->set_message('CheckMail', 'The %s field is not valid');
        //Mail checking will be added here
        return true;
    }

    function CheckPhone($phone) {
        $this->form_validation->set_message('CheckPhone', 'The %s field should be a number from 6 to 15 digit');
        //Phone checking will be added here
        return true;
    }

    function SendVerificationEmail($username, $param, $mail_id) {
        $params = array('username' => $username, 'param' => $param);
        $this->load->view('mail_dummy', $params);
        //=========================================================================
        //this portion will be activated after the project is launched in a server
        //we cannot provide mail service in localhost
        /* $this->load->helper('email');
          $message = "click on the below link for email verification </br>
          "."<a href='" .site_url."/verifyuser/index.php/".$param .">".$param."</a>";
          send_email("$mail_id","Academic_network_email_verification",message);
         */
        //==========================================================================
    }

    function StoreData() {
        $this->load->model('User');
        $this->load->model('Inst_user');
        $this->load->model('Field_user');
        $this->load->model('Field');
        $this->load->model('Institution');
        $this->load->model('User_community');
        
        $this->User->InsertUser($this->register_data);
        $param = $this->User->GetUserVerifiactionData($this->register_data['contact_username']);
       
        $this->Inst_user->Insert($this->register_data['contact_username'], $this->register_data['contact_institution']);
        $this->Field_user->Insert($this->register_data['contact_username'], $this->register_data['contact_field']);
        $this->User_community->Insert($this->register_data['contact_username'], $this->Institution->GetCommunityId($this->register_data['contact_institution']));
        $this->User_community->Insert($this->register_data['contact_username'], $this->Field->GetCommunityId($this->register_data['contact_field']));
        $this->SendVerificationEmail($this->register_data['contact_username'], $param, $this->register_data['contact_email']);
    }

}

?>