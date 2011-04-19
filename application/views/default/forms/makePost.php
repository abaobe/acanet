         <?php  echo form_open('makePost'); ?>
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
               <p><label for="contact_message" class="left">Message:</label>
                  <textarea name="contact_message" id="contact_message" cols="45" rows="10"tabindex="5"></textarea></p>
               <p><label for="contact_title" class="left">Community:</label>
                  <select name="contact_title" id="contact_title" class="combo">
                     <option value="mrs"> CSE </option>
                     <option value="mr"> EEE </option>
                     <option value="dr"> MEDICAL </option></select></p>
               <p><input type="submit" name="submit" id="submit" class="button" value="Send message" tabindex="6" /></p>
            </fieldset>
         </form>