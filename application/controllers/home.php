
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class home extends CI_Controller {

           var $currentUsername = 'ibrahim';
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

              $this->load->model('Model_post','userPost');

              $userPosts = $this->userPost->GetByUser($this->currentUsername);


              $this->page->loadViews(
                    array(
                        array('Communities', "sidebars/communities"),
                        array('Fields', "sidebars/fields")
                    ),
                    array(
                        array("Home", "home",array("userPosts"=>$userPosts))
                    ),
                    array(                        
                        array("Events", "sidebars/events"),
                        array("News", "sidebars/news")
                    ));

          }

   }

?>
 