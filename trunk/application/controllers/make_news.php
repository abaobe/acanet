
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Make_news extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $cId = $this->input->post('cId');
        $publisherName = $this->input->post('publisherName');
        $heading = $this->input->post('news_title');
        $content = $this->input->post('news_desc');
        $type = $this->input->post('news_type');


        $this->load->model('Model_news');
        $newsId = $this->Model_news->Add($publisherName,$heading,$content,$type);
        $this->Model_news->SetNewsCommunityRelation($newsId, $cId);


        //Redirect
        if(isset ($this->input->post('redirect'))){
            redirect($this->input->post('redirect'));
        }

    }

    function ProcessNews($description) {
        return $description;
    }

}

?>
 