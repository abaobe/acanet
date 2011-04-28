
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
//          //$name GetByType
//          //Ajax Request Function
//          function GetByType(){
//
//             $type = $this->input->post('type');
//             $this->load->model("Model_community",'community');
//             echo $this->community->GetByType($type);
//          }
          function test(){
             //$this->load->view($this->page->theme.'forms/login');
             echo '<option>asfasdf</option>';
             

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
 