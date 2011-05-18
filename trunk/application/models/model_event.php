<?php


 class Model_event extends CI_Model {


       function __construct()
       {
           // Call the Model constructor
           parent::__construct();
       }



       function Add($title,$description,$start_time,$end_time,$publisherName)
       {
           $this->db->set('title',$title);
           $this->db->set('description',$description);
           $this->db->set('start_date_time',$start_time);
           $this->db->set('end_date_time',$end_time);
           $this->db->set('publisher_name',$publisherName);
           $result = $this->db->insert('event');
           return $this->db->insert_id();
       }
       function SetEventCommunityRelation($eventId,$cId)
       {
           $this->db->set('event_id',$eventId);
           $this->db->set('community_id',$cId);
           return $result = $this->db->insert('event_community');
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
