         <?php  echo form_open('make_post',array('id'=>'makePostForm')); ?>
            <fieldset><legend>&nbsp;MAKE A POST&nbsp;</legend>
               
               <p><label for="contact_title" class="left">Title:</label>
                  <input type="text" name="make-post-title" id="make-post-title" class="field" value="" tabindex="1" /></p>
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