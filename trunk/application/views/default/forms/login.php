<div class="loginform">
                            <?php  echo form_open('member/login'); ?>
                                <p><input type="hidden" name="rememberme" value="0" /></p>

                                <fieldset>
                                    <p><label for="username_2" class="top">User:</label><br />
                                        <input type="text" name="username_2" id="username_2" tabindex="1" class="field" onkeypress="return webLoginEnter(document.loginfrm.password);" value="" /></p>
                                    <p><label for="password_2" class="top">Password:</label><br />
                                        <input type="password" name="password_2" id="password_2" tabindex="2" class="field" onkeypress="return webLoginEnter(document.loginfrm.cmdweblogin);" value="" /></p>
                                    <p><input type="checkbox" name="checkbox" id="checkbox_2" class="checkbox" tabindex="3" size="1" value="" onclick="webLoginCheckRemember()" /><label for="checkbox_1" class="right">Remember me</label></p>
                                    <p><input type="submit" name="cmdweblogin" class="button" value="LOGIN"  /></p>

                                    <p><a href="#" onclick="webLoginShowForm(2);return false;" id="forgotpsswd_2">Password forgotten?</a></p>
                                </fieldset>
                            </form>
                        </div>