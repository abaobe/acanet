
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class register extends CI_Controller {

           function __construct()
           {
                   parent::__construct();
           }
           function index(){
              $this->LoadRegistrationView();
           }
           function LoadRegistrationView()
           {
              $this->page->title = "Registration";

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
                        array("Registration", "forms/registration")
                    ),
                  null);
           }
           function SendVerificationEmail()
           {
              
           }
           function Register()
           {

           }
   }

?>
 