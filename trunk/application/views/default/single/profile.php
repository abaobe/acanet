  <!-- B.1 MAIN CONTENT -->

        <!-- Pagetitle -->        
        <!-- Content unit - One column -->
        <?php //print_r($user_data);
        ?>
        <h1 class="block">Presonal Informations</h1>
        <div class="column1-unit" style="min-height: 260px;">
            <div id="uname" class="hidden">
                <table>
                    <tr ><th scope="row" style="width:100px;">Name</th>
                         <td> <?php echo $user_data['name'] ; ?> </td>
                    </tr>
                    <tr><th scope="row" style="width:100px;">Changed Name</th>
                         <td> <input id="in_name" type="text" />  </td>
                    </tr>
                    <tr>
                        <th scope="row" style="width:100px;"> <button id="cname_button">Change</button> </th>
                        <td id="error_name"></td>
                            
                    </tr>
                </table>


            </div>
          <table id="fulltable">
            <?php
                if($user_data['self'])
                {
                    echo "<tr ><th scope=\"row\" style=\"width:100px;\">Username</th>
                    <td>".$user_data['username']."</td>
                    <td style=\"width:70px;\">
                    <button id=\"uname_button\">Change</button></td></tr>";

                }


            ?>
            <tr ><th scope="row" style="width:100px;">Name</th><td id="changed_name"><?php echo $user_data['name'] ; ?> </td><td style="width:70px;">
            <?php if($user_data['self']) echo "<button id=\"name_button\">Change</button></td>";?></tr>
            <tr ><th scope="row">Field</th><td><?php echo "shantonu give me the field" ?></td><td>
            <?php if($user_data['self']) echo "<button id=\"field_button\">Change</button></td>";?></tr>
            <tr ><th scope="row">Institute</th><td><?php echo "shantonu give me the institution" ; ?></td><td>
            <?php if($user_data['self']) echo "<button id=\"institute_button\">Change</button></td>";?></tr>
            <tr ><th scope="row">Address</th><td><?php echo $user_data['address'] ; ?></td><td>
            <?php if($user_data['self']) echo "<button id=\"address_button\">Change</button></td>";?></tr>
            <tr ><th scope="row">Email Address</th><td><?php echo $user_data['mail_address'] ; ?></td><td>
            <?php if($user_data['self']) echo "<button id=\"email_button\">Change</button></td>";?></tr>
             <tr ><th scope="row">Contact Number</th><td><?php echo $user_data['contact_number'] ; ?></td><td>
            <?php if($user_data['self']) echo "<button id=\"number_button\">Change</button></td>";?></tr>

          </table>
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

      