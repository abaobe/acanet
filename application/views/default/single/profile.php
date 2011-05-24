<!-- B.1 MAIN CONTENT -->

<!-- Pagetitle -->        
<!-- Content unit - One column -->
<?php
//function CheckForm($form_id, $default, $inverted) {
//    global $form_open;
//    if ($form_open != $form_id)
//        echo "class=\"$default\"";
//    else
//        echo "class=\"$inverted\"";
//}
//print_r($user_data);
//echo gettype($form_open);


?>
<h1 class="block">Presonal Informations</h1>
<div class="column1-unit" style="min-height: 260px;">
    <!--   <div id = "Username">
        <div id="Username_short" class="short">
            Username : <?php echo $user_data['username'] ?><br/>
            <button id="Username_button">Change</button>
        </div>
        <div id="Username_long" class="long">

        </div>


    </div>
    -->
   

    <div id = "Name">
        <div id="Name_short" <?php if ($form_open != "2") echo "class=\"short\""; else echo "class=\"long\"";?>>
            Name : <?php echo $user_data['name'] ?><br/>
            <?php if($user_data['self'] == 1){ ?>
            <a id="Name_button" href="#">Change</a>
            <?php }?>


        </div>
        <div id="Name_long" <?php if ($form_open != "2") echo "class=\"long\""; else echo "class=\"short\"";?>>
            <?php
             if($form_open == "2")
             echo urldecode($message);
             echo form_open('profile_change/ChangeName');
            ?>
             Your Name : <?php echo $user_data['name']; ?> <br/> <a id="Name_button1" href="#">Cancel</a><br/>

             Preferred Name :<input type="text" name="changed_name" />
             <input type="submit" value="Submit" />
             
             </form>
         </div>


     </div>

     <div id = "Address">
         <div id="Address_short" <?php if ($form_open != "3") echo "class=\"short\""; else echo "class=\"long\"";?>>
             Address : <?php echo $user_data['address'] ?><br/>
              <?php if($user_data['self'] == 1){ ?>
             <a id="Address_button" href="#">Change</a>
             <?php }?>
         </div>
          <div id="Address_long" <?php if ($form_open != "3") echo "class=\"long\""; else echo "class=\"short\"";?>>
            <?php
            if($form_open == "3")
             echo urldecode($message);
             echo form_open('profile_change/ChangeAddress');
            ?>
             Your Address : <?php echo $user_data['address']; ?> <br/> <a id="Address_button1" href="#">Cancel</a><br/>

             Preferred Address :<input type="text" name="changed_address" />
             <input type="submit" value="Submit" />

             </form>
         </div>


     </div>

     <div id = "Contact_number">
         <div id="Contact_number_short" <?php if ($form_open != "4") echo "class=\"short\""; else echo "class=\"long\"";?>>
             Contact Number : <?php echo $user_data['contact_number'] ?><br/>
             <?php if($user_data['self'] == 1){ ?>
             <a id="Contact_number_button" href="#">Change</a>
             <?php }?>
         </div>
         <div id="Contact_number_long" <?php if ($form_open != "4") echo "class=\"long\""; else echo "class=\"short\"";?>>
         <?php
            if($form_open == "4")
             echo urldecode($message);
             echo form_open('profile_change/ChangeNumber');
            ?>
             Your Contact Number: <?php echo $user_data['contact_number']; ?> <br/> <a id="Contact_number_button1" href="#">Cancel</a><br/>

             Preferred Address :<input type="text" name="changed_number" />
             <input type="submit" value="Submit" />

             </form>
         </div>


     </div>
     <div id = "Mail_address">
         <div id="Mail_address_short"  <?php if ($form_open != "5") echo "class=\"short\""; else echo "class=\"long\"";?>>
            Mail Address : <?php echo $user_data['mail_address'] ?><br/>
            <?php if($user_data['self'] == 1){ ?>
             <a id="Mail_address_button" href="#">Change</a>
             <?php }?>
        </div>
        <div id="Mail_address_long" <?php if ($form_open != "5") echo "class=\"long\""; else echo "class=\"short\"";?>>
        <?php
            if($form_open == "4")
             echo urldecode($message);
             echo form_open('profile_change/ChangeMailAddress');
             ?>
             Your Mail Address : <?php echo $user_data['mail_address']; ?> <br/> <a id="Mail_address_button1" href="#">Cancel</a><br/>

             Preferred Mail Address :<input type="text" name="changed_mail_address" />
             <input type="submit" value="Submit" />

             </form>
           
        </div>


    </div>
    <hr class="clear-contentunit" />

    <h1 class="block">Privacy Settings</h1>
    <div class="column1-unit">
        <table>
            <tr><td>Receive Email Notifiction</td><td style="width:30px;"><input type="checkbox"/></td></tr>
            <tr><td>Computer Science</td><td><input type="checkbox"/></td></tr>
            <tr><td>BUET</td><td><input type="checkbox"/></td></tr>
            <tr><td>Sher-e-bangla Hall,Polashi,Dhaka-1000</td><td><input type="checkbox"/></td></tr>
        </table>
    </div>
    <hr class="clear-contentunit" />

