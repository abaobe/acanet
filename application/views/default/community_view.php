

<!-- Pagetitle -->
<!-- <h1 class="pagetitle">Page Title</h1>-->

<!-- Content unit - One column -->
<h1 class="block">Recent Posts</h1>

<?php foreach($post as $row): ?>
<div class="column1-unit">
   <h1><?=$row->title?></h1>
   <h3><?=$row->date_time?>, by <a href="#"><?=$row->publisher_name?> </a></h3>
   <p><?=$row->description?></p>
   <p class="details"><a href="#">Details</a> | Comments: <a href="#">73</a> </p>
</div>
<hr class="clear-contentunit" />
<?php endforeach;?>

<!-- Content unit - Two columns -->