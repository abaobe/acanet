<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!--LINK SHARE-->
<div class="column1-unit" id ="jq_linkShare">
   <div class="contactform">
       <?php  echo form_open('link_share',array('id'=>'linkShareForm')); ?>
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
