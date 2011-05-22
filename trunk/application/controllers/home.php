
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class home extends CI_Controller {

           var $currentUsername = '';
           var $isPublicView = true;
           function __construct()
           {
                   parent::__construct();
                   $isPublicView = true;
           }
           function index(){
               $this->LoadHomeView();
           }
           function LoadHomeView()
           {
              $this->load->model('Model_news');        
              $this->load->model('Model_event');
              $this->load->model('Model_user');
              $this->load->library('util');
              
              $this->currentUsername = $this->Model_user->GetLoggedInUsername();
              if($this->currentUsername!==false)
                 $this->isPublicView=false;

              
              $this->page->title = "Home";
              
              $this->page->breadcrumbs = array(
                  "Home" => base_url()
              );    
              
              $nav1 = array();
              
              if($this->isPublicView){                
                $nav1["Login"]=site_url('login');
                $nav1["Registration"] = site_url('register');
              }
              else{                
                $nav1[$this->currentUsername]=site_url('profile');                
                $nav1["Logout"]=site_url('logout');                
              }
              
              
              $this->page->nav1 = $nav1;
                      
              //$this->load->model('Model_post','userPost');
              //$this->load->model('institution','Institutions');
              //$instiutionList = $this->Institutions->GetInstitutionList();
//              $order = array('date_time'=>'desc');
//              $allPosts = $this->userPost->Get(null,$order);
              $this->page->set(array('jquery-ui-1.8.12.custom'), 'css');
              $this->page->set(array('timepicker-addon'), 'css');
              $this->page->set(array('community', 'jquery-ui-1.8.12.custom.min'), 'js');
              $this->page->set(array('community', 'jquery-ui-timepicker-addon'), 'js');

              $this->page->set(array('home','curvycorners'),'js');
              $this->page->set(array('home'),'css');
              
              //print_r($allPosts);
              $order = array('date_time'=>'desc');
              
              
              
              /***********************************LEFT SIDEBAR START*******************************/
              /*Sifat community copy */
              
              $left_sidebar = array();
              
              if(!$this->isPublicView)
                $left_sidebar[] = array('Actions', 'sidebars/community_tab_action');              
              $left_sidebar[] = array('Communities', "sidebars/communities");
              $left_sidebar[] =array('Fields', "sidebars/fields");
              
            
              /***********************************LEFT SIDEBAR END*******************************/
              
              
              
              /***********************************MAIN CONTENT START*****************************/

              

               $main_content = array();
               $main_content[0] =  array("Home", "home",array("username"=>$this->currentUsername));

               //$allPosts = $this->GetRecentPosts();
               //$main_content[1] =  array(null, "recent_posts",array("allPosts"=>$allPosts));
               
              /***********************************MAIN CONTENT END*******************************/
              
              
              /***********************************RIGHT SIDEBAR START*******************************/
              //$data =array();
              $news  = $this->Model_news->Get(null,$order,0,5,true);
              $event = $this->Model_event->Get(null,array('start_date_time'=>'desc'),0,5,true);
              
              //$this->util->FreshPrint($event);
              
              /*Sifat community copy */
              $right_sidebar = array();  
              $right_sidebar[0] = array("Events", "sidebars/events",array("event"=>$event));
              $right_sidebar[1] = array("News", "sidebars/news",array("news"=>$news));
              
              /***********************************RIGHT SIDEBAR END*******************************/


              $this->page->loadViews(
                    $left_sidebar,
                    $main_content,
                    $right_sidebar
                    );

          }
          
          function GetRecentPosts(){
            $username = $this->input->post('username');
            $oldPostsId = $this->input->post('postsId');
            
            $this->load->model('Model_post','userPost');
            $order = array('date_time'=>'desc');
            $allPosts = $this->userPost->Get(null,$order,0,10,true);
            return $allPosts;
            //echo json_encode($allPosts,JSON_FORCE_OBJECT);               
          }
          
          function PrintRecentPosts()
          {


            $this->load->model('model_post');
            $this->load->model('Model_user');
            
            $username = $this->input->post('username');
            if($username != ""){
                $this->currentUsername = $this->Model_user->GetLoggedInUsername();
                if($this->currentUsername!==false)
                    $this->isPublicView=false;
            }            

            //$oldPostsId = $this->input->post('postsId');
            //$oldPostsId = json_decode($oldPostsId);
            
            $order = array('date_time'=>'desc');
            
            //$this->db->select('*');
            //$query = $this->db->get_where('post');
            //$allPosts = $query->result_array();
            $where = array();
            if(!$this->isPublicView)
               $where = array("publisher_name"=>$username);

            
            $start = 0;
            $limit = 10;

            $allPosts = $this->model_post->Get(null,$order,$start,$limit,true,$where);
            
            $this->load->view($this->page->theme.'recent_posts.php',array('allPosts'=>$allPosts));
               
          }
       
   }

?>
 