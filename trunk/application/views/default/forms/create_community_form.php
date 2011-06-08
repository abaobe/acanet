<div class="column1-unit">

      <?php
          echo validation_errors();
          echo form_open('createCommunity/process');

          // generate table
          $this->table->clear();
          $data = array();

          $data[0] = array("Name", form_input("name", set_value("name")));
          $data[1] = array("Type", form_input("stype", set_value("stype")));
          $data[2] = array("Short Description", form_textarea(array(
              "name" => "short_description", "value" => set_value("short_description"), "cols" => "22", "rows" => "4"
          )));
          echo $this->table->generate($data);

      ?>
      <br />
      <div align ="center">
          <input type="submit" value="Create New Institution!" />
      </div>
</div>
<hr class="clear-contentunit" />