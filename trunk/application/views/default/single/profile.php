  <!-- B.1 MAIN CONTENT -->

        <!-- Pagetitle -->        
        <!-- Content unit - One column -->
        <?php //print_r($user_data);
        ?>
        <h1 class="block">Presonal Informations</h1>
        <div class="column1-unit">
          <table>
            <?php
                if($user_data['self'])
                {
                    echo "<tr><th scope=\"row\" style=\"width:100px;\">Username</th>
                    <td>".$user_data['username']."</td>
                    <td style=\"width:70px;\">
                    <a href=\"#\">Change</a></td></tr>";

                }


            ?>
            <tr><th scope="row" style="width:100px;">Name</th><td><?php echo $user_data['name'] ; ?> </td><td style="width:70px;">
            <?php if($user_data['self']) echo "<a href=\"#\">Change</a></td>";?></tr>
            
            <tr><th scope="row">Field</th><td><?php echo "shantonu give me the field" ?></td><td>
            <?php if($user_data['self']) echo "<a href=\"#\">Change</a></td>";?></tr>
            <tr><th scope="row">Institute</th><td><?php echo "shantonu give me the institution" ; ?></td><td>
            <?php if($user_data['self']) echo "<a href=\"#\">Change</a></td>";?></tr>
            <tr><th scope="row">Address</th><td><?php echo $user_data['address'] ; ?></td><td>
            <?php if($user_data['self']) echo "<a href=\"#\">Change</a></td>";?></tr>
            <tr><th scope="row">Email Address</th><td><?php echo $user_data['mail_address'] ; ?></td><td>
            <?php if($user_data['self']) echo "<a href=\"#\">Change</a></td>";?></tr>
             <tr><th scope="row">Contact Number</th><td><?php echo $user_data['contact_number'] ; ?></td><td>
            <?php if($user_data['self']) echo "<a href=\"#\">Change</a></td>";?></tr>

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

      