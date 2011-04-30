
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Community extends CI_Controller {

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
              $this->page->set(array('jquery-ui-1.8.12.custom'),'css');
              $this->page->set(array('timepicker-addon'),'css');
              $this->page->set(array('community','jquery-ui-1.8.12.custom.min'),'js');
              $this->page->set(array('community','jquery-ui-timepicker-addon'),'js');
              //set js
              //get js

              $this->page->nav1 = array(
                  "Home" => base_url(),
                  "Login" => site_url('login'),
                  "Registration" => site_url('register')
              );



              $this->page->breadcrumbs = array(
                  "Home" => base_url(),
                  "Community" => site_url("community")
              );

              $left_sidebar[0] = array('Actions','sidebars/community_tab_action');
              $left_sidebar[1] = array('Information','sidebars/community_tab_info');


              $main_content[0] = array("Community", "community");
              $right_sidebar[0] =  array("Events", "sidebars/events");
              $right_sidebar[1] =  array("News", "sidebars/news");


              $this->page->loadViews($left_sidebar,$main_content,$right_sidebar);

          }
          function GetByType()
          {             
             $this->type = $this->input->post('type');

             $this->db->select("name,community_id");
             $query = $this->db->get_where('community',array('type'=>$this->type,'community_id >'=>0));
             $this->load->view($this->page->theme.'ajax_request/community_load_list.php',
                     array("allCommunity"=>$query->result_array()));             
          }

   }

?>