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

       function Add($publisherName,$heading,$content,$type)
       {
           $this->db->set('publisher_name',$publisherName);
           $this->db->set('heading',$heading);
           $this->db->set('content',$content);
           $this->db->set('type',$type);
           
           $this->db->set('date_time',"now()",false);
           $result = $this->db->insert('news');
           return $this->db->insert_id();
       }
       function SetNewsCommunityRelation($newsId,$cId)
       {
           $this->db->set('news_id',$contentId);
           $this->db->set('community_id',$cId);
           return $result = $this->db->insert('news_community');
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