   <?php 
    $i=0;
    foreach ($allPosts as $aPost):
    $class = !($i%2)? "odd" : "even";
    $i++;
   ?>
         <div class="posts <?=$class?> rounded" postId="<?=$aPost['post_id']?>">
            <h1><?=$aPost['title']?></h1>
            <h3><?=  date_format(date_create($aPost['date_time']), 'l, d F Y \a\t H:i'); ?>,
                        by <a href="#"><?=$aPost['publisher_name'] ?></a></h3>
            <p><spna class="post-description"><?=$aPost['description'] ?></span> <a href="#">Read more &raquo;</a></p>
            <p class="details">| Posted by <a href="#"><?=$aPost['publisher_name'] ?> </a> | Community: <a href="#">General</a> | Comments: <a href="#">73</a> |</p>
        </div>

      <?php endforeach; ?>