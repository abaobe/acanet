<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Profile_change extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function ChangeName() {
        $this->form_validation->set_rules('changed_name', 'name', 'required');
        if ($this->form_validation->run() == FALSE) {
          
        } else {
            $this->load->model('model_user', 'User');
            $username = $this->User->Authenticate();
            if ($username) {  // echo $username;
                $data = array('name' => $this->input->post('changed_name'));
                $this->User->update($username, $data);
                redirect('profile/index/'.$username);
            }
        }
    }

    function ChangeAddress($address) {
        $address = rawurldecode($address);
        $this->load->model('model_user', 'User');
        $username = $this->User->Authenticate();
        if ($username) {  // echo $username;
            $data = array('address' => $address);
            $this->User->update($username, $data);
        }
    }

}

?>
