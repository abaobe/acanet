<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 class Model_News extends CI_Model {

       function __construct()
       {
           // Call the Model constructor
           parent::__construct();
       }
       function Get($id=null)
       {

       }
       function GetByCommunityName($community_name)
       {
           $query_str = "SELECT news.news_id,news.heading,news.content,news.type,news.publiser_name,news.date_time
                        FROM (news JOIN news_community ON news.news_id = news_community.news_id)
                            JOIN community on news_community.community_id = community.community_id
                        WHERE community.name = '$community_name'";
           $query = $this->db->query($query_str);
           return $query->result();
       }
   }

?>
 