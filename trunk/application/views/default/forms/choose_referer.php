<?php
    if(!isset($id)){
        echo "First choose the ID of the institutiuon";
        exit();
    }
?>


<div class="column1-unit">
   <div class="contactform">

      <?php
      //print_r($inst_list);
      
      echo validation_errors();
      echo form_open('institute/join/ref_chosen', '', array('institution_id' => $id)); ?>
      <fieldset><legend>&nbsp;Choose A Referer&nbsp;</legend>

         
         <p><label for="referer" class="left">Referer Username</label>
            <input type="text" name="referer" id="referer" class="field" value="<?php echo set_value('referer'); ?>" tabindex="1" /></p>
         
         
      </fieldset>
      <br />
      <div align="center">
        <input type="submit" value="Request Approval!" />
        <br />
      </div>
      </form>
   </div>
</div>
<hr class="clear-contentunit" />