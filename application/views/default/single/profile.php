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
print_r($user_data);
echo gettype($form_open);


?>
<h1 class="block">Presonal Informations</h1>
<div class="column1-unit" style="min-height: 260px;">
    <div id = "Username">
        <div id="Username_short" class="short">
            Username : <?php echo $user_data['username'] ?><br/>
            <button id="Username_button">Change</button>
        </div>
        <div id="Username_long" class="long">

        </div>


    </div>

    <div id = "Name">
        <div id="Name_short" <?php if ($form_open != "2") echo "class=\"short\""; else echo "class=\"long\"";?>>
            Name : <?php echo $user_data['name'] ?><br/>
            <?php if($user_data['self'] == 1){ ?>
            <button id="Name_button">Change</button>
            <?php }?>


        </div>
        <div id="Name_long" <?php if ($form_open != "2") echo "class=\"long\""; else echo "class=\"short\"";?>>
            <?php
             echo urldecode($message);
             echo form_open('profile_change/ChangeName');
            ?>
             Your Name:<?php echo $user_data['name']; ?><br/>
             Preferred Name :<input type="text" name="changed_name" />
             <input type="submit" value="Submit" />
             </form>
         </div>


     </div>

     <div id = "Address">
         <div id="Address_short" class="short">
             Address : <?php echo $user_data['address'] ?><br/>
             <button id="Address_button">Change</button>
         </div>
         <div id="Address_long" class="long">Address
         </div>


     </div>

     <div id = "Contact_number">
         <div id="Contact_number_short" class="short">
             Name : <?php echo $user_data['contact_number'] ?><br/>
             <button id="Contact_number_button">Change</button>
         </div>
         <div id="Contact_number_long" class="long">Contact_number
         </div>


     </div>
     <div id = "Mail_address">
         <div id="Mail_address_short" class="short">
             Name : <?php echo $user_data['mail_address'] ?><br/>
            <button id="Mail_address_button">Change</button>
        </div>
        <div id="Mail_address_long" class="long">Mail_address
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

