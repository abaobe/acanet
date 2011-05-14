<?php


 class Model_event extends CI_Model {


       function __construct()
       {
           // Call the Model constructor
           parent::__construct();
       }

       function GetByCommunityName($communityName)
       {
           $query_str = "SELECT event.event_id, event.title, event.description, event.start_date_time, event.end_date_time, event.publisher_name
                        FROM (event JOIN event_community ON event.event_id = event_community.event_id)
                            JOIN community on event_community.community_id = community.community_id
                        WHERE community.name = '$communityName'";
           $query = $this->db->query($query_str);
           //print_r($query->result_array());
           return $query->result();
       }
 }

?>
