
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class profile extends CI_Controller {

           function __construct()
           {
                   parent::__construct();
           }
           function index(){
              $this->LoadProfileView();
           }
           function LoadProfileView()
           {
//             echo "<pre>";
//             print_r($this->page->nav2);
//             echo "<pre>";
             $this->page->title = "Profile";

              $this->page->nav1 = array(
                  "Home" => base_url(),
                  "logout" => site_url('logout')
              );

              $this->page->nav2[] = array(
                                    array("Field",site_url('field')),
                                    array('Computer Science'=>site_url('field/cse'))
                                 );



              $this->page->breadcrumbs = array(
                  "Home" => base_url(),
                  "Profile" => site_url('profile')
              );

            $this->page->loadViews(
                    null,
                    array(
                        array("Profile", "single/profile")
                    ),
                    null);
           }
           
   }

?>
 