<?php foreach($news as $row): ?>
<h3><a href=#><?=$row['heading']?></a></h3>
                        <p><?=$row['content']?></p>
                        <h3><?=$row['date_time']?><br/> By <?=$row['publiser_name']?></h3>


<?php endforeach;?>