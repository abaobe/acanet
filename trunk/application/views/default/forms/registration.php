<div class="contactform">
                            <?php echo form_open('member/registration'); ?>
                                <fieldset><legend>&nbsp;CONTACT DETAILS&nbsp;</legend>

                                    <p><label for="contact_title" class="left">Title:</label>
                                        <select name="contact_title" id="contact_title" class="combo">
                                            <option value="choose"> Select... </option>
                                            <option value="mrs"> Mrs. </option>
                                            <option value="mr"> Mr. </option>

                                            <option value="dr"> Dr. </option></select></p>
                                    <p><label for="contact_firstname" class="left">First name:</label>
                                        <input type="text" name="contact_firstname" id="contact_firstname" class="field" value="" tabindex="1" /></p>
                                    <p><label for="contact_familyname" class="left">Family name:</label>
                                        <input type="text" name="contact_familyname" id="contact_familyname" class="field" value="" tabindex="1" /></p>
                                    <p><label for="contact_street" class="left">Street:</label>

                                        <input type="text" name="contact_street" id="contact_street" class="field" value="" tabindex="1" /></p>
                                    <p><label for="contact_postalcode" class="left">Postal code:</label>
                                        <input type="text" name="contact_postalcode" id="contact_postalcode" class="field" value="" tabindex="1" /></p>
                                    <p><label for="contact_city" class="left">City:</label>
                                        <input type="text" name="contact_city" id="contact_city" class="field" value="" tabindex="1" /></p>
                                    <p><label for="contact_country" class="left">Country:</label>
                                        <select name="contact_country" id="contact_country" class="combo">

                                            <option value="choose"> Select... </option>
                                            <option value="Sweden"> Sweden </option>
                                            <option value="United States"> United States </option>
                                            <option value="China"> China </option></select></p>
                                    <p><label for="contact_phone" class="left">Phone:</label>

                                        <input type="text" name="contact_phone" id="contact_phone" class="field" value="" tabindex="2" /></p>
                                    <p><label for="contact_email" class="left">Email:</label>
                                        <input type="text" name="contact_email" id="contact_email" class="field" value="" tabindex="2" /></p>
                                    <p><label for="contact_url" class="left">Website:</label>
                                        <input type="text" name="contact_url" id="contact_url" class="field" value="" tabindex="3" /></p>
                                    <p><input type="submit" name="submit" id="submit" class="button" value="Submit" tabindex="6" /></p>
                                </fieldset>

                            </form>
                        </div>