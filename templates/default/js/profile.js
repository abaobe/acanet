

$(document).ready(function(){
  // alert("ready");
   $(".long").slideUp(1);
   $("#Username_button").click(function(){
      $("#Username_short").slideToggle("slow");
          $("#Username_long").slideToggle("slow");
     
    });
   $("#Name_button").click(function(){
         $("#Name_short").slideToggle("slow",function(){
            $("#Name_long").slideToggle("slow");
       });
   });
   $("#Address_button").click(function(){
         $("#Address_short").slideToggle("slow",function(){
            $("#Address_long").slideToggle("slow");
       });
   });
   $("#Contact_number_button").click(function(){
         $("#Contact_number_short").slideToggle("slow",function(){
            $("#Contact_number_long").slideToggle("slow");
       });
   });
   $("#Mail_address_button").click(function(){
         $("#Mail_address_short").slideToggle("slow",function(){
            $("#Mail_address_long").slideToggle("slow");
       });
   });

});