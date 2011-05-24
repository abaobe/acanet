/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){

    //=========Date Time Picker for Event Form==================

    $('#event_start_date,#event_end_date').datetimepicker({
        showSecond: true,
        timeFormat: 'hh:mm:ss',
        dateFormat: 'yy-mm-dd',
        stepHour: 2,
        stepMinute: 10,
        stepSecond: 10
    });




    //========ACTION TABS=============================

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



    //=============INFO TABS===========================

    var info_tab = [];
    info_tab[1] = "#post_detail";
    info_tab[2] = "#news_detail";
    info_tab[3] = "#event_detail";
    info_tab[4] = "#content_detail";
    info_tab[5] = "#members_detail";
    info_tab[6] = "#admins_detail";
    info_tab[7] = "#about_detail";

    var info_loaded = [];
    info_loaded[1] = true;
    info_loaded[2] = false;
    info_loaded[3] = false;
    info_loaded[4] = false;
    info_loaded[5] = true;
    info_loaded[6] = true;
    info_loaded[7] = true;


    var info_tab_no = 1;
    var info_loading = false;

    function init(){
        for ( var i = 2 ; i < 8 ; i++){
            $(info_tab[i]).css({opacity: 0.0}).hide();
        }         
    }
    init();

    function hide_n_show(new_info_tab_no)
    {
        if(new_info_tab_no == info_tab_no) return;
        if(info_loading) return;

        if(info_loaded[new_info_tab_no]){
            $(info_tab[info_tab_no]).animate({opacity: 0.0},500).hide(1,function(){
                $(info_tab[new_info_tab_no]).show(1).animate({opacity: 1.0},500);
            });
        }
        else{
            $(info_tab[info_tab_no]).animate({opacity: 0.4},500);
            //$.load(url, data, callback)
        }


        info_tab_no = new_info_tab_no;         //make tab = new tab        
    }

    //1
    $("#jq_tab_show_post").click(function(){
        hide_n_show(1);        
    });
    
    //2
    $("#jq_tab_show_news").click(function(){
        hide_n_show(2);
    });

    //3
    $("#jq_tab_show_event").click(function(){
        hide_n_show(3);
    });

    //4
    $("#jq_tab_show_contents").click(function(){
        hide_n_show(4);
    });

    //5
    $("#jq_tab_show_members").click(function(){
        hide_n_show(5);
    });

    //6
    $("#jq_tab_show_admins").click(function(){
        hide_n_show(6);
    });

    //7
    $("#jq_tab_show_about").click(function(){
        hide_n_show(7);
    });
    
});