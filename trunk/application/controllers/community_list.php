<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Community_list extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_community');
    }

    function index($community_type=null) {
        if(isset($community_type)){
            $this->LoadCommunityListView($community_type);
        }
        else{
            $this->LoadCommunityListViewAll();
        }
    }

    function LoadCommunityListViewAll() {
        $this->page->title = "List of Communities By Type";
        
        $data['query1_result'] = $this->Model_community->GetByType('institution',5);
        $data['query2_result'] = $this->Model_community->GetByType('field',5);
        $data['query3_result'] = $this->Model_community->GetByType('subject',5);
        $data['query4_result'] = $this->Model_community->GetByType('course',5);

        $main_content[0] = array("Community List", "community_list_view_all",$data);


        $this->page->loadViews(null, $main_content, null);
    }

    function LoadCommunityListView($community_type) {

        switch($community_type){case 'institution': case 'field': case 'subject': case 'course': break; default: echo '<h1>bad community type<h1>';return;break;}
        $this->page->title = "List of Communities of type : $community_type";

        $data['query_result'] = $this->Model_community->GetByType($community_type);
        $data['type'] = $community_type;

        $main_content[0] = array("Community List", "community_list_view",$data);

        $this->page->loadViews(null, $main_content, null);
    }

 

    function GetByType() {
        $this->type = $this->input->post('type');

        $this->db->select("name,community_id");
        $query = $this->db->get_where('community', array('type' => $this->type, 'community_id >' => 0));
        $this->load->view($this->page->theme . 'ajax_request/community_load_list.php',
                array("allCommunity" => $query->result_array()));
    }

}

?>