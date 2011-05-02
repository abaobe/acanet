   <?php foreach ($allPosts as $aPost): ?>
         <div class="posts" postId="<?=$aPost['post_id']?>">
            <h1><?=$aPost['title']?></h1>
            <h3><?=  date_format(date_create($aPost['date_time']), 'l, d F Y \a\t H:i'); ?>,
                        by <a href="#"><?=$aPost['publisher_name'] ?></a></h3>
            <p><?=$aPost['description'] ?> <a href="#">Read more &raquo;</a></p>
            <p class="details">| Posted by <a href="#"><?=$aPost['publisher_name'] ?> </a> | Community: <a href="#">General</a> | Comments: <a href="#">73</a> |</p>
        </div>

      <?php endforeach; ?>