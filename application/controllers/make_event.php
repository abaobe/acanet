
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Make_event extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $cId = $this->input->post('cId');
        $publisherName = $this->input->post('publisherName');
        $title = $this->input->post('event_name');
        $description = $this->input->post('event_desc');
        $start_time = $this->input->post('event_start_date');
        $end_time = $this->input->post('event_end_date');


        $this->load->model('Model_event');
        $eventId = $this->Model_event->Add($title, $description, $start_time, $end_time, $publisherName);
        $this->Model_event->SetEventCommunityRelation($eventId, $cId);

//Redirect
        $redirect = $this->input->post('redirect');
        if (isset($redirect)) {
            redirect($redirect);
        }
    }

    function ProcessEvent($description) {
        return $description;
    }

}

?>
 