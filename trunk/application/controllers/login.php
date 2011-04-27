
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller {

   
    private $login_data;

    function __construct() {
        parent::__construct();
        $this->login_data = null;
    }

    function index() {
        //$this->load->library('form_validation');
        
        if (isset($_POST['cmdweblogin'])) {
            //$this->FormValidation();
            if ($this->FormValidation() == false) {
                $this->LoadLoginView("invalid username/password");
            } else {
                $this->login_data = $_POST;
                $this->DoLogin();
            }
        } else {

            $this->LoadLoginView("");
        }
    }

    function LoadLoginView($message) {
//             echo "<pre>";
//             print_r($this->page->nav2);
//             echo "<pre>";
        $this->page->title = "Welcome to AcaNet";

        $this->page->nav1 = array(
            "Home" => base_url(),
            "Registration" => site_url('register')
        );

        $this->page->nav2[] = array(
            array("Field", site_url('field')),
            array('Computer Science' => site_url('field/cse'))
        );



        $this->page->breadcrumbs = array(
            "Home" => base_url(),
            "Login" => site_url('login')
        );

        $this->page->loadViews(
                null,
                array(
                    array("Log in please!", "forms/login",array('post'=> $_POST,'message'=>$message))
                ),
                null);
    }

    function FormValidation() {


        $username = $_POST['username_2'];
        $password = $_POST['password_2'];
        if ($username === null || $password === null) {
            $_POST['username_2'] = $username;
            $_POST['password_2'] = $password;
            $_POST['message']="invalid username/password";
            return false;
        } else {
            $this->load->model('User');
            if ($this->User->CheckUsernamePassword($username, $password)) {
                $data = array('username' => $username);

                $this->session->set_userdata($data);
                return true;
            }
            $_POST['username_2'] = $username;
            $_POST['password_2'] = $password;
            $_POST['message']="invalid username/password";
            return false;
        }
    }
    function GetLoggedInUsername()
    {
        return $this->session->userdata('username');
    }

    function DoLogin() {
       // echo "Valid";
       // echo $this->session->userdata('username');
       // echo $this->session->userdata('password');
         if($this->input->cookie('ci_session'))
         {
            // $this->load->helper('cookie');
            // $this->input->delete_cookie('ci_session');
             echo $this->GetLoggedInUsername();
             $this->load->view('home.php');
         }
       // print_r($register_data);
    }

    function ReloadLoginView() {
        
    }

}

?>
 