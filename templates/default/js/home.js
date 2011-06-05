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
            $(this).css("background-color","#F2F2F2");
   }).live("mouseout",function(){       
         $(this).css("background-color","");
   }).live("click",function(){
        
   });
   

   LoadCommunities();
   LoadRecentPosts();

   $("#make-post-community-type").change(function(){         
        LoadCommunities();         
   });
   
   $(".replySubmitButtonDiv").live("click",function(){
       
       var div = $(this).parent().find(".post-reply-input");
       var desc = $(div).val();
       var postId = $(div).attr("postId");
       var cId = $(div).attr("cId");
       SaveReply(desc,cId,postId);
   });
   
   function SaveReply(description,cId,postId)  //postId parentId
   {
        url = $("#makePostForm").attr("action");
        var username = $("#loggedUsername").val();
        $.ajax({
         url: url,
         type: "POST",
         data: ({
                  description : description,
                  cId: cId,
                  publisherName : username,                  
                  type : 'reply',
                  postId : postId
               }),
         success: function(msg){
            LoadRecentPosts();
         }
      })
        
    }

   $("#makePostForm").submit(function(){
      var actionUrl = $(this).attr("action");
      var publisherName = $("#make-post-publisher-name").val();
      var postBody = $("#post-body").val();
      var communityId = $("#make-post-community-id").val();
      var title = $("#make-post-title").val();
      //alert(title);

      $("#make-post-form-container p,input,select,textarea").attr("disabled","disabled");
      $("#make-post-form-container").animate({opacity: 0.4});

      $.ajax({
         url: actionUrl,
         type: "POST",
         data: ({
                  description : postBody,
                  cId: communityId,
                  publisherName : publisherName,
                  title : title,
                  type : 'post'
               }),
         success: function(msg){
            $("#make-post-form-container p,input,select,textarea").removeAttr('disabled');
            $("#make-post-form-container").animate({opacity: 1});
            $("#make-post-form-container :input :not(#makePostButton) ").val("");
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
      //",
      var username = $("#loggedUsername").val();
      
      $.ajax({
         url : site_url()+"/home/PrintRecentPosts",
         type : "POST",
         data : ({
                    username : username
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

   $(".show-post-reply").live("click",function(){
       var postId = $(this).attr("postId");
       if($(this).html()=="Reply"){        
        $("#post-reply-wrapper-"+postId).slideDown();
        $(this).html("Hide replies");
       }else{         
        $("#post-reply-wrapper-"+postId).slideUp();
        $(this).html("Reply");
       }

   });
   
   $("textarea").autoResize({
        // On resize:
        onResize : function() {
            $(this).css({opacity:0.8});
        },
        // After resize:
        animateCallback : function() {
            $(this).css({opacity:1});
        },
        limit : 1000,
        // Quite slow animation:
        animateDuration : 300,
        // More extra space:
        extraSpace : 30
    });
    
    
   var alreadyInit =  false;
   $(".post-reply-input-div textarea").live("keypress",function(event){       
        if(!alreadyInit){
            $(".post-reply-input-div textarea").autoResize({
                // On resize:
                onResize : function() {
                    $(this).css({opacity:0.8});
                },
                // After resize:
                animateCallback : function() {
                    $(this).css({opacity:1});
                },
                limit : 1000,
                // Quite slow animation:
                animateDuration : 300,
                // More extra space:
                extraSpace : 30
            });
            alreadyInit = true;
        }
//        if(!event.ctrlKey && event.which === 13 ){            
//            e.preventDefault();
//            return false;
//        }
//        else if( event.ctrlKey && event.which === 13) {
//            event.initEvent(13,false,false);
//            return true;
//        } 
//        return true;        
   });
    
    
   

   function GetJsonString(data)
   {
         return  JSON.stringify(data, function (key, value) {
             if (typeof value === 'number' && !isFinite(value)) {
                 return String(value);
             }
             return value;
         });
   }
   
   
   
    //*****************SIFAT COMUNITY COPY START****************//
    //========ACTION TABS=============================
    
      //=========Date Time Picker for Event Form==================

    $('#event_start_date,#event_end_date').datetimepicker({
        showSecond: true,
        timeFormat: 'hh:mm:ss',
        dateFormat: 'yy-mm-dd',
        stepHour: 2,
        stepMinute: 10,
        stepSecond: 10
    });


    var init_done = false;
    var tab_no = 0;

    var actiontab = [];
    actiontab[1] = "#jq_makePost";
    actiontab[2] = "#jq_linkShare";
    actiontab[3] = "#jq_createEvent";
    actiontab[4] = "#jq_createNews";
    function hideAll(new_tab_no){
        if(tab_no == new_tab_no) return;
        if(init_done){
            $(actiontab[tab_no]).slideUp("fast");
            $("#jq_action_form_hide").hide();
        }else{

            for ( var i = 1 ; i < 5 ; i++){
                $(actiontab[i]).hide();
            }
            $("#jq_action_form_hide").hide();
            init_done = true;
        }
    }
    
    //hide button
    hideAll(-1);

   
    $("#jq_action_form_hide").click(function(){
        $(actiontab[tab_no]).slideUp("fast");
        $(this).hide();
    });

    $("#jq_tab_post").click(function(){
        hideAll(1);
        $("#jq_makePost").slideDown("fast");
        $("#jq_action_form_hide").show();
        tab_no = 1;
    });

    $("#jq_tab_link").click(function(){
        hideAll(2);
        $("#jq_linkShare").slideDown("fast");
        $("#jq_action_form_hide").show();
        tab_no = 2;
    });

    $("#jq_tab_event").click(function(){
        hideAll(3);
        $("#jq_createEvent").slideDown("fast");
        $("#jq_action_form_hide").show();
        tab_no = 3;
    });

    $("#jq_tab_news").click(function(){
        hideAll(4);
        $("#jq_createNews").slideDown("fast");
        $("#jq_action_form_hide").show();
        tab_no = 4;
    });

   //*****************SIFAT COMUNITY COPY END****************//
   
   /*
    * 
      $(".dsf").fancybox({
                        'type'          :   'iframe',
			'transitionIn'  :   'elastic',
			'transitionOut' :   'elastic',
			'speedIn'       :   600,
			'speedOut'      :   200,
			'overlayShow'   :   true,
			'height'        :   500,
			'width'         :   820,
			'showCloseButton':  true
    });
    */
   
});