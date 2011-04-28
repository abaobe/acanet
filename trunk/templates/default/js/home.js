/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){

   

   $("#recent-post-load-div .posts").live("mouseover",function(){
         $(this).css("background-color","#EA3");
   }).live("mouseout",function(){
         $(this).css("background-color","");
   });

   LoadCommunities();
   LoadRecentPosts();

   $("#make-post-community-type").change(function(){         
        LoadCommunities();         
   });

   $("#makePostForm").submit(function(){
      var actionUrl = $(this).attr("action");
      var publisherName = $("#make-post-publisher-name").val();
      var postBody = $("#post-body").val();
      var communityId = $("#make-post-community-id").val();

      $("#make-post-form-container p,input,select,textarea").attr("disabled","disabled");
      $("#make-post-form-container").animate({opacity: 0.4}, 1500 );

      $.ajax({
         url: actionUrl,
         type: "POST",
         data: ({
                  description : postBody,
                  cId: communityId,
                  publisherName : publisherName
               }),
         success: function(msg){
            $("#make-post-form-container p,input,select,textarea").removeAttr('disabled');
            $("#make-post-form-container").animate({opacity: 1}, 1500 );
            LoadRecentPosts();
         }
      })

      return false;
   });


   function LoadCommunities()
   {
        var type = $("#make-post-community-type").val();
         $("#make-post-community-id").attr("disabled","disabled");
         $("#make-post-community-id").html("<option>Loading...</option>");
//         var actionUrl = site_url()+"/community/GetByType/"+type.toLowerCase();
//         $.ajax({
//            url:actionUrl,
//            type:"POST",
//            success : function(data){
//               alert(data);
//               $("#make-post-community-id").html(data);
//          //     $("#make-post-community-id").attr("disabled","");
//            }
//         });         
         $("#make-post-community-id").load(site_url()+"/community/GetByType",{"type":type});
         $("#make-post-community-id").attr("disabled","");
   }
   
   function LoadRecentPosts(){

      $("#recent-post-load-div").animate({opacity: 0.4}, 1500 );
      $("#recent-post-load-div").attr("disabled","disabled");
      $.ajax({
         url : site_url()+"/home/PrintRecentPosts/",
         type : "POST",
         data : ({
                    username : ""
               }),
         success : function(data){
            //alert(data);
            $("#recent-post-load-div").attr("disabled","");
            $("#recent-post-load-div").animate({opacity: 1}, 1500 );
            $("#recent-post-load-div").html(data);
            $("#recent-post-load-div").slideDown('slow');
         }
      })
      //$("#recent-post-load-div").load(,{username:""});
      
   }
});