
<!--Testing-->
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
</script>
<p>Date: <input type="text" id="datepicker"></p>
<!--end testing-->



<div id="jq_action_form_hide"><a href="#" ><p class="right" style="margin: 0;">hide</p></a></div>

<!--MAKE POST-->
<div class="column1-unit" id ="jq_makePost">
   <div class="contactform">
      <form method="post" action="index.html">
         <fieldset><legend>&nbsp;MAKE A POST&nbsp;</legend>
            <p><label for="contact_title" class="left">Title:</label>
               <input type="text" name="contact_title" id="contact_title" class="field" value="" tabindex="4" /></p>
            <p><label for="contact_message" class="left">Message:</label>
               <textarea name="contact_message" id="contact_message" cols="45" rows="10"tabindex="5"></textarea></p>
            <p><input type="submit" name="submit" id="submit" class="button" value="Submit" tabindex="6" /></p>
         </fieldset>
      </form>
   </div>
</div>
<!--END OF MAKE POST-->


<!--LINK SHARE-->
<div class="column1-unit" id ="jq_linkShare">
   <div class="contactform">
      <form method="post" action="index.html">
         <fieldset><legend>&nbsp;SHARE LINK&nbsp;</legend>
            <p><label for="contact_link" class="left">Link:</label>
               <input type="text" name="contact_link" id="contact_link" class="field" value="" tabindex="4" /></p>
            <p><label for="contact_link_name" class="left">Name:</label>
               <input type="text" name="contact_link_name" id="contact_link_name" class="field" value="" tabindex="4" /></p>
            <p><label for="contact_link_desc" class="left">Description:</label>
               <textarea name="contact_link_desc" id="contact_link_desc" cols="45" rows="10"tabindex="5"></textarea></p>
            <p><input type="submit" name="submit" id="submit" class="button" value="Submit" tabindex="6" /></p>
         </fieldset>
      </form>
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
            <p><label for="contact_event_name" class="left">Date:</label>
               <input type="text" name="contact_event_name" id="contact_event_name" class="field" value="" tabindex="4" /></p>
            <p><label for="contact_event_desc" class="left">Description:</label>
               <textarea name="contact_event_desc" id="contact_link_desc" cols="45" rows="10"tabindex="5"></textarea></p>
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

<!-- Pagetitle -->
<!-- <h1 class="pagetitle">Page Title</h1>-->

<!-- Content unit - One column -->
<h1 class="block">Recent Posts</h1>
<div class="column1-unit">
   <h1>Here comes the title</h1>
   <h3>Monday, 20 November 2006 at 20:30 GMT, by <a href="#">SiteAdmin </a></h3>
   <p>Lorem ipsum dolor sit amet, consectetuer <a href="#">adipiscing elit</a>, sed diam nonummy nibh euismod tincidunt ut laoreet dolore <a href="#">magna aliquam</a> erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis. <a href="#">Read more &raquo;</a></p>
   <p class="details">| Posted by <a href="#">SiteAdmin </a> | Categories: <a href="#">General</a> | Comments: <a href="#">73</a> |</p>
</div>
<hr class="clear-contentunit" />
<div class="column1-unit">
   <h1>Here comes Another title</h1>
   <h3>Monday, 20 November 2006 at 20:30 GMT, by <a href="#">SiteAdmin </a></h3>
   <p>Lorem ipsum dolor sit amet, consectetuer <a href="#">adipiscing elit</a>, sed diam nonummy nibh euismod tincidunt ut laoreet dolore <a href="#">magna aliquam</a> erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis. <a href="#">Read more &raquo;</a></p>
   <p class="details">| Posted by <a href="#">SiteAdmin </a> | Categories: <a href="#">General</a> | Comments: <a href="#">73</a> |</p>
</div>
<hr class="clear-contentunit" />

<!-- Content unit - Two columns -->