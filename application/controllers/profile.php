
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class profile extends CI_Controller {

    private $user_data;
    private $form_open;
    private $message;
    function __construct() {
        parent::__construct();
    }

    function index($user_id,$form_id = NULL,$message = NULL) {
        $this->load->model('model_user', 'User');
        $this->form_open = $form_id;
        if(isset($form_id))
        {
            $this->form_open = $form_id;
        }
        else {
            $this->form_open = NULL;
        }
        if(isset ($message))
           $this->message = $message;
        else
            $this->message = NULL;
        if ($this->User->Authenticate() != false) {
            $this->user_data = array();

            $this->user_data = $this->User->GetUserDataById($user_id);
            if ($this->User->GetLoggedInUsername() == $user_id)
                $this->user_data['self'] = true;
            else
                $this->user_data['self'] = false;
            // print_r($this->user_data);

            $this->LoadProfileView();
        }
    }
    
    function LoadProfileView() {
//             echo "<pre>";
//             print_r($this->page->nav2);
//             echo "<pre>";
        $this->page->title = "Profile";
        $this->page->set(array('profile'),'js');
        $this->page->set(array('profile'),'css');
        $this->page->nav1 = array(
            "Home" => base_url(),
            "logout" => site_url('logout')
        );

        $this->page->nav2[] = array(
            array("Field", site_url('field')),
            array('Computer Science' => site_url('field/cse'))
        );



        $this->page->breadcrumbs = array(
            "Home" => base_url(),
            "Profile" => site_url('profile')
        );
        $this->load->library('util');        
        $this->user_data['privacy'] = $this->util->Value2BitArray($this->user_data['privacy'],4);
        //$this->util->FreshPrint($this->user_data['privacy']);
        $this->page->loadViews(
                null,
                array(
                    array("Profile", "single/profile", array('user_data' => $this->user_data,'form_open' => $this->form_open,'message'=>$this->message))
                ), null);
    }

     


}

?>
 