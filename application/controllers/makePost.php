
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class makePost extends CI_Controller {

           function __construct()
           {
                   parent::__construct();
           }
           function index()
           {
              $description = $this->input->post('description');
              $cId = $this->input->post('cId');
              $publisherName = $this->input->post('publisherName');
              
              $this->load->model('Model_post','post');            
              $postId = $this->post->Add($description,$publisherName);              
              $this->post->SetPostCommunityRelation($postId,$cId);
              
           }
           
           function ProcessPost($description)
           {
               return $description;
           }
   }

?>
 