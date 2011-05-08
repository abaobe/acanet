<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

   class Model_community extends CI_Model {

       var $community_id ="";
       var $name = "";
       var $type = "";
       var $short_description = "";

       function __construct()
       {
           // Call the Model constructor
           parent::__construct();
       }
       function get_community_by_type($type,$limit=null){
           $this->db->select('*');
           $query = $this->db->get_where('community',  array('type' => $type, 'community_id !=' => 0), $limit);
           return $query->result_array();
       }
       function get_post_by_name($name,$limit=null){
           $query_str = "SELECT post_id,title,description,publisher_name,date_time FROM post NATURAL JOIN post_community NATURAL JOIN community WHERE community.name = '$name'";
           $query = $this->db->query($query_str);
           return $query->result_array();
       }
       function get_news_by_name($name,$limit=null){
           $query_str = "SELECT news.news_id,news.heading,news.content,news.type,news.publiser_name,news.date_time
                        FROM (news JOIN news_community ON news.news_id = news_community.news_id)
                            JOIN community on news_community.community_id = community.community_id
                        WHERE community.name = '$name'";
           $query = $this->db->query($query_str);
           return $query->result_array();
       }
       function get_event_by_name($name,$limit=null){
           $query_str = "SELECT event.event_id, event.title, event.description, event.start_date_time, event.end_date_time, event.publisher_name
                        FROM (event JOIN event_community ON event.event_id = event_community.event_id)
                            JOIN community on event_community.community_id = community.community_id
                        WHERE community.name = '$name'";
           $query = $this->db->query($query_str);
           //print_r($query->result_array());
           return $query->result_array();
       }
       function Get($id=null)
       {

       }
       function Insert(){
           // other tasks needed, i.e udpate the community_user table with owners etc.
           $this->db->insert("community", $this);
           $this->community_id = $this->db->insert_id();
       }
       function Update($id)
       {

       }
       

   }

?>
 