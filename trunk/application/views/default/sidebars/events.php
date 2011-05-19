
<?php foreach ($event as $row): ?>
    <div id= 'event-<?= $row->event_id ?>' class="events" style="padding:4px;margin: 4px">
        <h2 class="rounded"><a href=#><?= ucfirst($row->title) ?></a></h2>
        <br/>
        <div class="rounded" style="background-color:antiquewhite;color:black;margin:5px;padding:5px;font-family:verdana,arial,sans-serif">
            <?= $row->description ?>
        </div>
        <br/>        
        <span style="font-size:8pt">Duration :</span>
        <br/>
        <span style="color:darkgreen;">
            <?=
               $this->util->FormatMySqlDateTime($row->start_date_time)
            ?>
        </span>        
        <br/>
        <span style="font-size:8pt">To</span>
        <br/>
        <span style="color:darkgoldenrod;">
           <?= 
              $this->util->FormatMySqlDateTime($row->end_date_time)
           ?>
        </span>
        
       
    </div>
    


<?php endforeach; ?> 