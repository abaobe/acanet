         <?php  echo form_open('make_post',array('id'=>'makePostForm')); ?>
            <fieldset><legend>&nbsp;MAKE A POST&nbsp;</legend>
               
<!--               <p><label for="contact_subject" class="left">Subject:</label>-->
<!--                  <input type="text" name="contact_subject" id="contact_subject" class="field" value="" tabindex="4" /></p>-->
<!--               <p><label for="contact_urgency" class="left">Please reply:</label>
                  <select name="contact_urgency" id="contact_urgency" class="combo">
                     <option value="today"> Latest today </option>
                     <option value="tomorrow"> Latest tomorrow </option>
                     <option value="threedays"> Latest in 3 days </option>
                     <option value="week"> Latest in a week </option>
                     <option value="month"> Latest in a month </option></select></p>-->
               <p>
                  <label for="Message" class="left">Message:</label>
                  <textarea name="contact_message" id="post-body" cols="45" rows="10"></textarea></p>
               <p><label for="Type" class="left">Type:</label>
                  <select name="make-post-community-type" id="make-post-community-type" class="combo">                     
                     <option>Institution</option>
                     <option>Field</option>
                     <option>Course</option>
                     <option>Subject</option>
                  </select>
               </p>
               <p><label for="Communities" class="left">Community:</label>
                  <select name="make-post-community-id" id="make-post-community-id" class="combo">
                     <option>Select Type</option>
                  </select></p>
               <p><input type="hidden" name="publisherName" id="make-post-publisher-name" value="<?=$username ?>" />
                  <input type="submit" name="submit" id="makePostButton" class="button" value="Post" tabindex="6" /></p>
            </fieldset>
         </form>