<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index(){
            $this->page->set(array('css/layout_setup.css', 'css/layout_text.css'),'css');
            $this->page->title = "Welcome to AcaNet";

            $this->page->loadAllViews();
//            $this->load->view('sdfsd');
	}

        function registration(){
            

            $this->page->set(array('css/layout_setup.css', 'css/layout_text.css'),'css');
            $this->page->title = "Registration";

            $this->load->view('default/header');
            $this->load->view('default/left_sidebar');
            $this->load->view('default/content');
            $this->load->view('default/right_sidebar',array("html"=>"default/loginView"));
            $this->load->view('default/footer');
            
            // Generate Contents
//            $html = $this->page->contentFormat("Registration", $this->forms->registration());
//            // Generate RightSidebar
//            $this->load->library('right_sidebar');
//            $rSidebarHtml = $this->right_sidebar->login()
//                           .$this->right_sidebar->login2();
//
//
////            $rSideBarHtml = "hello";
//            $this->page->loadAllViews(null, null,
//                    array('file' => 'default/content', 'arr' => array('html' => $html)),
//                array('file' => 'default/right_sidebar', 'arr' => array('html' => $rSidebarHtml)));
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */