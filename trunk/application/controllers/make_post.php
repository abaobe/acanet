
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Make_post extends CI_Controller {

           function __construct()
           {
                   parent::__construct();
           }
           function index()
           {
              $description = $this->input->post('description');
              $cId = $this->input->post('cId');
              $publisherName = $this->input->post('publisherName');
              
               $this->load->model('Model_user');
              $loggedInUser = $this->Model_user->GetLoggedInUsername();
              if($loggedInUser ===false || $loggedInUser != $publisherName)
                  redirect('login');
                  
              $title = $this->input->post('title');              
              $this->load->model('Model_post','post');            
              $postId = $this->post->Add($title,$description,$publisherName);
              $this->post->SetPostCommunityRelation($postId,$cId);

                //Redirect
                $redirect = $this->input->post('redirect');
                if(isset($redirect)){
                    redirect($redirect);
                }
              
           }
           
           function ProcessPost($description)
           {               
               return strip_tags($description);
           }
   }

?>
 