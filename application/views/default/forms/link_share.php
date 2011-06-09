<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!--LINK SHARE-->
<div class="contactform">
<?php echo form_open('make_link', array('id' => 'linkShareForm')); ?>
    <fieldset><legend>&nbsp;SHARE LINK&nbsp;</legend>
        <p><label for="contact_title" class="left error post-status"></label>
        </p>
        <p><label for="contact_link" class="left">Link:</label>
            <input type="text" name="contact_link" id="contact_link" class="field" value="" tabindex="4" />
        </p>
        <p><label for="contact_link_desc" class="left">Description:</label>
            <textarea name="contact_link_desc" id="contact_link_desc" cols="45" rows="10"tabindex="5"></textarea>
        </p>
        <p><label for="Type" class="left">Type:</label>
            <select name="contact-link-community-type"  class="combo select-community-type">
                <option>Institution</option>
                <option>Field</option>
                <option>Course</option>
                <option>Subject</option>
                <option>Groups</option>
            </select>
        </p>
        <p><label for="Communities" class="left">Community: </label>
            <select name="contact-link-community-id" class="combo select-community-id">
                <option>Select Type</option>
            </select>
        </p>
        <p><input type="hidden" name="publisherName" class="link-share-publisher-name" value="<?= $username ?>" />
          <input type="button"  name="submit" id="linkShareButton" class="button" value="Submit" tabindex="6" />
        </p>
    </fieldset>
</form>
</div>
<!--END OF LINK SHARE-->
