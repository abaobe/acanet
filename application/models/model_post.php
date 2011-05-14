<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 class Model_post extends CI_Model {

       
       function __construct()
       {
           // Call the Model constructor
           parent::__construct();
       }
       //@order is given as associative array .ex. array('title'=>'ASC','date'=>'DESC');
       function Get($id=null,$order="",$start=0,$limit=10)
       {
         $this->db->select('*');
         $query = "";
         if($id!=null){         
           $query = $this->db->get_where('post',array('post_id'=>$id),1);           
         }
         else{
            if($order!="" && is_array($order))
            {
               foreach($order as $key=>$val)
               {
                  $this->db->order_by($key,$val);
               }
            }

            $query = $this->db->get('post',$limit,$start);
         }         
         return  $query->result_array();
        
       }
       function Add($title,$description,$publisherName)
       {
           $this->db->set('title',$title);
           $this->db->set('description',$description);
           $this->db->set('publisher_name',$publisherName);
           $this->db->set('date_time',"now()",false);
           $result = $this->db->insert('post');
           return $this->db->insert_id();
       }
       function SetPostCommunityRelation($postId,$cId)
       {
           $this->db->set('post_id',$postId);
           $this->db->set('community_id',$cId);
           return $result = $this->db->insert('post_community');
       }
       function GetByUser($username){           
           $this->db->select('*');
           $query = $this->db->get_where('post',array('publisher_name'=>$username));
           return  $query->result_array();           
       }
       function GetByCommunityName($community_name)
       {
           $query_str = "SELECT post_id,title,description,publisher_name,date_time FROM post NATURAL JOIN post_community NATURAL JOIN community WHERE community.name = '$community_name'";
           $query = $this->db->query($query_str);
           return $query->result();
       }
   }

?>