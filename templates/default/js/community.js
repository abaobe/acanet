/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){

//=========Date Picker for Event==================

//$("#contact_event_start_date").datepicker();
//$("#contact_event_end_date").datepicker();

$('#contact_event_start_date,#contact_event_end_date').datetimepicker({
	showSecond: true,
	timeFormat: 'hh:mm:ss',
        dateFormat: 'dd-mm-yy',
	stepHour: 2,
	stepMinute: 10,
	stepSecond: 10
});




//========ACTION TABS=============================
    function hideAll(){
        $("#jq_makePost").hide();
        $("#jq_linkShare").hide();
        $("#jq_createEvent").hide();
        $("#jq_createNews").hide();
        $("#jq_action_form_hide").hide();
    }
    hideAll();
    
   $("#jq_action_form_hide").click(function(){
        hideAll();
        $(this).hide();
   });

   $("#jq_tab_post").click(function(){
       hideAll();
        $("#jq_makePost").show();
        $("#jq_action_form_hide").show();
   });

   $("#jq_tab_link").click(function(){
       hideAll();
        $("#jq_linkShare").show();
        $("#jq_action_form_hide").show();
   });

   $("#jq_tab_event").click(function(){
       hideAll();
        $("#jq_createEvent").show();
        $("#jq_action_form_hide").show();
   });

   $("#jq_tab_news").click(function(){
       hideAll();
        $("#jq_createNews").show();
        $("#jq_action_form_hide").show();
   });
   

});


