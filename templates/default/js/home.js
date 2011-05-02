/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){

//var js = '{"0":{"post_id":"6","description":"World Notice","publisher_name":"ibrahim",\
//      "date_time":"2011-05-01 20:51:21"},"1":{"post_id":"5","description":"\
//Hello World\n","publisher_name":"ibrahim","date_time":"2011-05-01 20:49:13"}\
//      ,"2":{"post_id":"4","description":"ajkljflkaj","publisher_name":"ibrahim","\
//date_time":"2011-05-01 20:46:23"}}//';
//
//alert(eval(js));
    

   function post(id,cId,publisherName,desc){
      this.id = id;
      this.cId = cId;
      this.publisherName = publisherName;
      this.desc = desc;
   }
   
   var allRecentPosts = new Array();

   $("#recent-post-load-div .posts")
     .live("mouseover",function(){
         $(this).css("background-color","#F0F5ED");
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
      var title = $("#make-post-title").val();
      alert(title);

      $("#make-post-form-container p,input,select,textarea").attr("disabled","disabled");
      $("#make-post-form-container").animate({opacity: 0.4});

      $.ajax({
         url: actionUrl,
         type: "POST",
         data: ({
                  description : postBody,
                  cId: communityId,
                  publisherName : publisherName,
                  title : title
               }),
         success: function(msg){
            $("#make-post-form-container p,input,select,textarea").removeAttr('disabled');
            $("#make-post-form-container").animate({opacity: 1});
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
         $("#make-post-community-id").load(site_url()+"/community/GetByType",{"type":type});
         $("#make-post-community-id").attr("disabled","");
   }
   function UpdateRecentPostsView(){
      
   }
   function UpdateRecentPostList(data){
      $(data).filter('div.posts').each(function(){
         allRecentPosts.push($(this).attr("postId"));
      });
      //console.log(allRecentPosts);
   }
   function LoadRecentPosts(){

      $("#recent-post-load-div").attr("opacity","0.4");
      $("#recent-post-load-div").attr("disabled","disabled");
      //var postIds = GetJsonString(allRecentPosts);
      $.ajax({
         url : site_url()+"/home/PrintRecentPosts",
         type : "POST",
         data : ({
                    username : "ibrahim"
                    //postIds : postIds
               }),         
         success : function(data){
            //alert(eval(data));
            //allRecentPosts
            $("#recent-post-load-div").attr("disabled","");
            $("#recent-post-load-div").attr("opacity","1");
            $("#recent-post-load-div").html(data);
            $("#recent-post-load-div").slideDown('slow');
            //UpdateRecentPostList(data);
         }
      })
      //$("#recent-post-load-div").load(,{username:""});
   }
   
   function GetJsonString(data)
   {
         return  JSON.stringify(data, function (key, value) {
             if (typeof value === 'number' && !isFinite(value)) {
                 return String(value);
             }
             return value;
         });
   }
});