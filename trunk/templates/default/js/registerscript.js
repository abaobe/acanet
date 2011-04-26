/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){

    $("#contact_institution").change(function(){
        //alert($("#contact_institution").val())
       // alert(site_url() + "/inst_field/index/" +$("#contact_institution").val())
       $("#contact_field").load(site_url() + "/inst_field/index/" +$("#contact_institution").val() ,function(){
         //  alert("load is successful")
       })
    })
//alert(base_url());
//alert(site_url());
});


