
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Make_link extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
//        $this->load->library('util');
//        $this->util->FreshPrint($_POST);
        $description = $this->input->post('content_link_desc');
        //echo 'working' . $description;
        $cId = $this->input->post('cId');
        $publisherName = $this->input->post('publisherName');
        $content_link = $this->input->post('content_link');

        $this->load->model('Model_content');
        $contentId = $this->Model_content->Add($description, $publisherName, $content_link, 'link');
        $this->Model_content->SetContentCommunityRelation($contentId, $cId);

        //Redirect
        $redirect = $this->input->post('redirect');
        if (isset($redirect)) {
            redirect($redirect);
        }
    }

    function ProcessPost($description) {
        return $description;
    }

}
?>
 
