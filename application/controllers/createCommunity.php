
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class createCommunity extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->LoadCreateCommunityView();
    }

    function LoadCreateCommunityView() {
        $main_content[0] = array("Create Community", "forms/create_community_form", null);
        $this->page->loadViews(null, $main_content, null);
    }

    function Process() {
        $this->load->model("Model_user");
        $username = $this->Model_user->GetLoggedInUsername();
        $this->load->model("Model_community");
        $this->load->model("User_community");
        $name = $this->input->post('name');
        $type = $this->input->post('stype');
        $desc = $this->input->post('short_description');
        $community_insert_id = $this->Model_community->Insert($name, $type, $desc);
        $this->User_community->Insert($username, $community_insert_id, "admin");
        redirect(site_url("community/index/".$community_insert_id));
    }

    function AddModerators() {
        
    }

}

?>
 