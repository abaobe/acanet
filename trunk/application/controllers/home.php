
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class home extends CI_Controller {

           function __construct()
           {
                   parent::__construct();
           }
           function index(){
               $this->LoadHomeView();
           }
           function LoadHomeView()
           {
              $this->page->title = "Home";

              $this->page->nav1 = array(
                  "Home" => base_url(),
                  "Login" => site_url('login'),
                  "Registration" => site_url('register')
              );



              $this->page->breadcrumbs = array(
                  "Home" => base_url()
              );




              $this->page->loadViews(
                    array(
                        array('Communities', "sidebars/communities"),
                        array('Fields', "sidebars/fields")
                    ),
                    array(
                        array("Home", "home")
                    ),
                    array(                        
                        array("Events", "sidebars/events"),
                        array("News", "sidebars/news")
                    ));

          }

   }

?>
 