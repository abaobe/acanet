
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class login extends CI_Controller {

           function __construct()
           {
                   parent::__construct();
           }
           function index(){
              $this->LoadLoginView();
           }
           function LoadLoginView()
           {
//             echo "<pre>";
//             print_r($this->page->nav2);
//             echo "<pre>";
             $this->page->title = "Welcome to AcaNet";

              $this->page->nav1 = array(
                  "Home" => base_url(),                  
                  "Registration" => site_url('register')
              );

              $this->page->nav2[] = array(
                                    array("Field",site_url('field')),                                    
                                    array('Computer Science'=>site_url('field/cse'))
                                 );



              $this->page->breadcrumbs = array(
                  "Home" => base_url(),
                  "Login" => site_url('login')
              );

            $this->page->loadViews(
                    null,
                    array(
                        array("Log in please!", "forms/login")
                    ),
                    null);
           }
           function DoLogin(){

           }
           function ReloadLoginView()
           {

           }
   }

?>
 