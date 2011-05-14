<div id="jq_action_form_hide"><a href="#" ><p class="right" style="margin: 0;">hide</p></a></div>

<!--MAKE POST-->
<div class="column1-unit" id ="jq_makePost">
   <div class="contactform">
       <form method="post" action="<?php echo site_url("make_post") ?>">
         <fieldset><legend>&nbsp;MAKE A POST&nbsp;</legend>
            <p><label for="contact_title" class="left">Title:</label>
               <input type="text" name="title" id="contact_title" class="field" value="" tabindex="4" /></p>
            <p><label for="contact_message" class="left">Message:</label>
               <textarea name="description" id="contact_message" cols="45" rows="10"tabindex="5"></textarea></p>
               <?php  form_hidden('cId',"$communityId"); ?>
               <?php  form_hidden('publisherName',"$userName"); ?>
            <p><input type="submit" name="submit" id="submit" class="button" value="Submit" tabindex="6" /></p>
         </fieldset>
      </form>
   </div>
</div>
<!--END OF MAKE POST-->


<!--LINK SHARE-->
<div class="column1-unit" id ="jq_linkShare">
   <div class="contactform">
      <?echo form_open('')?>
         <fieldset><legend>&nbsp;SHARE LINK&nbsp;</legend>
            <p><label for="contact_link" class="left">Link:</label>
               <input type="text" name="contact_link" id="contact_link" class="field" value="" tabindex="4" /></p>
            <p><label for="contact_link_name" class="left">Name:</label>
               <input type="text" name="contact_link_name" id="contact_link_name" class="field" value="" tabindex="4" /></p>
            <p><label for="contact_link_desc" class="left">Description:</label>
               <textarea name="contact_link_desc" id="contact_link_desc" cols="45" rows="10"tabindex="5"></textarea></p>
            <p><input type="submit" name="submit" id="submit" class="button" value="Submit" tabindex="6" /></p>
         </fieldset>
      <?php echo form_close()?>
   </div>
</div>
<!--END OF LINK SHARE-->

<!--CREATE EVENT-->
<div class="column1-unit" id ="jq_createEvent">
   <div class="contactform">
      <form method="post" action="index.html">
         <fieldset><legend>&nbsp;CREATE EVENT&nbsp;</legend>
            <p><label for="contact_event_name" class="left">Event Name:</label>
               <input type="text" name="contact_event_name" id="contact_event_name" class="field" value="" tabindex="4" /></p>
            <p><label for="contact_event_start_date2" class="left">Start date:</label>
               <input type="text" name="contact_event_start_date" id="contact_event_start_date" class="field" value="" tabindex="4" readonly='true' /></p>
            <p><label for="contact_event_end_date" class="left">End date:</label>
               <input type="text" name="contact_event_end_date" id="contact_event_end_date" class="field" value="" tabindex="4" /></p>
            <p><label for="contact_event_desc" class="left">Description:</label>
               <textarea name="contact_event_desc" id="contact_event_desc" cols="45" rows="10"tabindex="5"></textarea></p>
            <p><input type="submit" name="submit" id="submit" class="button" value="Submit" tabindex="6" /></p>
         </fieldset>
      </form>
   </div>
</div>
<!--END OF CREATE EVENT-->


<!--CREATE NEWS-->
<div class="column1-unit" id ="jq_createNews">
   <div class="contactform">
      <form method="post" action="index.html">
         <fieldset><legend>&nbsp;CREATE NEWS&nbsp;</legend>
            <p><label for="contact_event_name" class="left">Title:</label>
               <input type="text" name="contact_news_name" id="contact_news_name" class="field" value="" tabindex="4" /></p>
            <p><label for="contact_news_desc" class="left">Description:</label>
               <textarea name="contact_news_desc" id="contact_news_desc" cols="45" rows="10"tabindex="5"></textarea></p>
            <p><input type="submit" name="submit" id="submit" class="button" value="Submit" tabindex="6" /></p>
         </fieldset>
      </form>
   </div>
</div>
<!--END OF CREATE NEWS-->
