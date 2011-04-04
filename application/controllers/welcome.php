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
	}

        function registration(){
            

            $this->page->set(array('css/layout_setup.css', 'css/layout_text.css'),'css');
            $this->page->title = "Registration";

            // Generate Contents
            $html = $this->page->contentFormat("Registration", $this->forms->registration());
            // Generate RightSidebar
            $this->load->library('right_sidebar');
            $rSidebarHtml = $this->right_sidebar->login();
//            $rSideBarHtml = "hello";
            $this->page->loadAllViews(null, null,
                    array('file' => 'default/content', 'arr' => array('html' => $html)),
                array('file' => 'default/right_sidebar', 'arr' => array('html' => $rSidebarHtml)));
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */