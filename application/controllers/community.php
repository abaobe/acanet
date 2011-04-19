
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class community extends CI_Controller {

           function __construct()
           {
                   parent::__construct();
           }
           function index(){
               $this->LoadCommunityView();
           }
           function LoadCommunityView()
           {
              $this->page->title = "Community";

              $this->page->nav1 = array(
                  "Home" => base_url(),
                  "Login" => site_url('login'),
                  "Registration" => site_url('register')
              );



              $this->page->breadcrumbs = array(
                  "Home" => base_url(),
                  "Community" => site_url("community")
              );




              $this->page->loadViews(
                    array(
                        array('Dummy 1', "sidebars/dummyList"),
                        array('Dummy 2', "sidebars/dummyList")
                    ),
                    array(
                        array("Community", "community")
                    ),
                    array(                        
                        array("Events", "sidebars/events"),
                        array("News", "sidebars/news")
                    ));

          }

   }

?>
 