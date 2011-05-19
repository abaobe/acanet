   <?php 
    $len="";
    $i=0;
    foreach ($allPosts as $aPost):
    $class = !($i%2)? "odd" : "even";
    $i++;
   ?>
         <div class="posts <?=$class?> rounded" postId="<?=$aPost->post_id ?>">
            <h1><?=$aPost->title ?></h1>
            <h3><?=  date_format(date_create($aPost->date_time), 'l, d F Y \a\t H:i'); ?>,
                        by <a href="#"><?=$aPost->publisher_name ?></a></h3>
            <br/>
            <p>
                <div class="post-description">
                    <?php
                        $len = strlen($aPost->description);
                        if($len >80)
                            echo substr($aPost->description,0,80);
                        else
                            echo $aPost->description;
                    ?>                                    
                </div>
                <a class="readMore" href="javascript:void(0)">
                <?php
                    if($len>80)
                        echo "Read more &raquo;";
                ?>
                </a>
                
                
            </p>
            <br/>
            <p class="details">
                
                
                | Community:<a title="<?=  $aPost->name ?>" href="<?= site_url("community")."/index/$aPost->name" ?>">
                                <?php
                                    if(strlen($aPost->name)>50)
                                        echo substr($aPost->name,0,50)."...";
                                    else
                                        echo $aPost->name; 
                                 ?>
                            </a> 
                <br/>
                <br/>
                | Posted by <a href="<?= site_url("profile")."/index/$aPost->publisher_name" ?>"><?=$aPost->publisher_name ?> 
                            </a>                 
                | Comments: <a href="#">73
                            </a> 
                | <a href="#">Reply</a>    
                
                
            </p>
        </div>

      <?php endforeach; ?>