
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
              //$this->load->model('institution','Institutions');
              //$instiutionList = $this->Institutions->GetInstitutionList();
//              $order = array('date_time'=>'desc');
//              $allPosts = $this->userPost->Get(null,$order);
              $username = 'ibrahim';

              $this->page->set(array('home','curvycorners'),'js');
              $this->page->set(array('home'),'css');
              
              //print_r($allPosts);

              $this->page->loadViews(
                    array(
                        array('Communities', "sidebars/communities"),
                        array('Fields', "sidebars/fields")
                    ),
                    array(
                        array("Home", "home",array("username"=>$username))
                    ),
                    array(                        
                        array("Events", "sidebars/events"),
                        array("News", "sidebars/news")
                    ));

          }
          
          function GetRecentPosts(){
            $username = $this->input->post('username');
            $oldPostsId = $this->input->post('postsId');
            
            $this->load->model('Model_post','userPost');
            $order = array('date_time'=>'desc');
            $allPosts = $this->userPost->Get(null,$order);
            //echo json_encode($allPosts,JSON_FORCE_OBJECT);               
          }
          function PrintRecentPosts()
          {

            $this->load->model('model_post');
             
            $username = $this->input->post('username');
            //$oldPostsId = $this->input->post('postsId');
            //$oldPostsId = json_decode($oldPostsId);
            
            $order = array('date_time'=>'desc');
            
            //$this->db->select('*');
            //$query = $this->db->get_where('post');
            //$allPosts = $query->result_array();
            $allPosts = $this->model_post->Get(null,$order);
            
            $this->load->view($this->page->theme.'recent_posts.php',array('allPosts'=>$allPosts));
               
          }
       
   }

?>
 