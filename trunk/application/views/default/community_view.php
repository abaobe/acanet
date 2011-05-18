



<!-- Content unit - One column -->

<div id="post_detail">
    <h1 class="block">Recent Posts</h1>

    <?php foreach ($post as $row): ?>
        <div class="column1-unit">
            <h1><?= $row->title ?></h1>
            <h3><?= $row->date_time ?>, by <a href="#"><?= $row->publisher_name ?> </a></h3>
            <p><?= $row->description ?></p>
            <p class="details"><a href="#">Details</a> | Comments: <a href="#">73</a> </p>
        </div>
        <hr class="clear-contentunit" />
    <?php endforeach; ?>
</div>


<div id="news_detail">
    
</div>


<div id="event_detail">

</div>

<div id="content_detail">

</div>


<div id="members_detail">

</div>


<div id="admins_detail">

</div>


<div id="about_detail">
        <h1 class="block">About this community</h1>
        <div class="column1-unit">
            <br/>
            <p> <?php echo $communityInfo->short_description; ?> </p>
        </div>
        
</div>