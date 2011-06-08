<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Community extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    }

    function index($community_id) {
        if (!isset($community_id)) {
            redirect("community_list");
        }
        $this->load->model('Model_user');
	$username = $this->Model_user->Authenticate();
        if($username==false){
            return;
        }
	$this->load->model('Field');
        $this->load->model('Institution');
	$this->load->model('User_field');
        $this->load->model('User_inst');
        $this->load->model('Model_community');
        
        $community = $this->Model_community->GetById($community_id);
        if ($community == null) {
            redirect(site_url("/community_list"));
        }
        $community = $community[0];

        if($community->type == "institution"){
            $this->User_inst->username = $username;
            $this->User_inst->institution_id = $this->Institution->GetField_idByCommunity_id($community_id);
            $role = $this->User_inst->GetRole();
        }else if($community->type == "field"){
            $this->User_field->username = $username;
            $this->User_field->field_id = $this->Field->GetField_idByCommunity_id($community_id);
            $role = $this->User_field->GetRole();
        }
        else{
            $this->LoadCommunityView($community_id);
            return;
            
        }

        if($role){
            switch($role){
                case 'owner': case 'member': break;
                case 'pending':
                    $this->page->showMessage("Your Request to join this community is pending.");
                    break;
                case 'banned':
                    $this->page->showMessage("Sorry! You have been banned form this community.");
                    break;
            }
        }else{
            $url = site_url('/institute/join/id_chosen/' . $community_id);
            $this->page->showMessage("You need permission to get access to this community.<br/>
                Get <a href='$url'>refferal</a> for access to this community.");
            return;
        }


        $this->LoadCommunityView($community_id);
    }

    function LoadCommunityView($community_id) {

        // Loading models-----------------------
        $this->load->model('Model_community');
        $this->load->model('Model_news');
        $this->load->model('Model_post');
        $this->load->model('Model_event');
        $this->load->model('Model_user');
        $this->load->model('Model_content');
        //--------------------------------------
        //===============Get community basic info from ID===========


        $community = $this->Model_community->GetById($community_id);
        if ($community == null) {
            redirect(site_url("/community_list"));
        }
        $community = $community[0];

        //-js and css--------------------------
        $this->page->title = $community->name;
        $this->page->set(array('community',
            'jquery-ui-1.8.12.custom',
            'timepicker-addon',
            'fullcalendar/fullcalendar',
            'fullcalendar/fullcalendar.print'), 'css');
        $this->page->set(array('community',
            'jquery-ui-1.8.12.custom.min',
            'jquery-ui-timepicker-addon',
            'fullcalendar/fullcalendar.min'), 'js');
        //------------------------------------
        //-----init variables needed for the page----------------------
        $this->load->library('util');
        $this->page->nav1 = array(
            "Home" => base_url(),
            "Login" => site_url('login'),
            "Registration" => site_url('register')
        );



        $this->page->breadcrumbs = array(
            "Home" => base_url(),
            "Community" => site_url("community")
        );

        $left_sidebar[0] = array('Actions', 'sidebars/community_tab_action');
        $left_sidebar[1] = array('Information', 'sidebars/community_tab_info');



        //--------Loading main content--------------------------------------------
        $data = null;
        $data['communityId'] = $community_id;

        $data['userName'] = $this->Model_user->GetLoggedInUsername();

        $data['communityName'] = $community->name;


        //========testing=======
        $this->load->model('Model_user');
        $data['members'] = $this->Model_user->GetByCommunityId($community_id, array('user.username', 'user.name'));
        $data['admins'] = $this->Model_user->GetByCommunityId($community_id, array('user.username', 'user.name'), true);
        //$data['post'] = $this->Model_post->GetByCommunityId($community_id);
        $data['post'] = $this->GetRecentPosts($community_id);
        $data['news'] = $this->Model_news->GetByCommunityId($community_id);
        $data['event'] = $this->Model_event->GetByCommunityId($community_id);
        $data['community_id'] = $community_id;
        //======================        
        $main_content[0] = array("Community: $community->name", "forms/community_form_view", $data);
        //-------------------------------------------------------------------------------
        //-----------Loading right side bar--------------------------------------
        $data = null;
        //$data['post'] = $this->Model_post->GetByCommunityId($community_id);        
        $data['news'] = $this->Model_news->GetByCommunityId($community_id);
        $data['event'] = $this->Model_event->GetByCommunityId($community_id);
        $data['content'] = $this->Model_content->GetByCommunityId($community_id);
        $data['communityInfo'] = $this->Model_community->GetById($community_id);
        $data['communityInfo'] = $data['communityInfo'][0];
        $main_content[1] = array(null, "community_view", $data);



        $right_sidebar[0] = array("Events", "sidebars/events", $data);
        $right_sidebar[1] = array("News", "sidebars/news", $data);
        //--------------------------------------------------------------------
        //-----Load the views-----------------------------------------------
        $this->page->loadViews($left_sidebar, $main_content, $right_sidebar);
        //------------------------------------------------------------------
    }

    function GetRecentPosts($community_id) {
        $this->load->model('Model_post');
        //$allPosts = $this->model_post->Get(null, $order, $start, $limit, true, $where);
        $allPosts = $this->Model_post->GetByCommunityId($community_id);
        $count = count($allPosts);        
        $order = array('date_time' => 'inc');
        for ($i = 0; $i < $count; $i++) {
            $where = "post.post_id in (select reply_id from post_reply where community_id = ".$community_id." AND post_reply.post_id =".$allPosts[$i]->post_id.")";
            
            $allPosts[$i]->replyies = $this->Model_post->Get(null, $order, 0, 50, true, $where);
        }
        //print_r($allPosts);
        return $allPosts;
        //$this->load->view($this->page->theme.'recent_posts.php',array('allPosts'=>$allPosts));
    }

    function GetMembers() {
        $community_name = $this->input->post('community_name');

        $this->load->model('Model_user');
        $data['members'] = $this->Model_user->GetByCommunityName($community_name);
    }

    //============================================
    // Needed by ibrahims module
    //============================================
    function GetByType() {
        $type = $this->input->post('type');
        $allCommunity = $this->Model_community->GetByType($type);
        $this->load->view($this->page->theme . 'ajax_request/community_load_list.php',
                array("allCommunity" => $allCommunity));
    }

}

?>