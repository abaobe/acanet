
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Make_post extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $cId = $this->input->post('cId');
        $title = $this->input->post('title');
        $desc = $this->input->post('desc');
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');


        $this->load->model('Model_news', 'news');
        $postId = $this->news->Add($title, $desc, $start_time,$end_time);
        $this->news->SetNewsCommunityRelation($postId, $cId);
    }

    function ProcessEvent($description) {
        return $description;
    }

}

?>
 