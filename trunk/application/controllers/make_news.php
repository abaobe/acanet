
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Make_post extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $cId = $this->input->post('cId');
        $heading = $this->input->post('heading');
        $content = $this->input->post('content');
        $publisherName = $this->input->post('publisherName');


        $this->load->model('Model_news', 'news');
        $postId = $this->news->Add($heading, $content, $publisherName);
        $this->news->SetNewsCommunityRelation($postId, $cId);
    }

    function ProcessNews($description) {
        return $description;
    }

}

?>
 