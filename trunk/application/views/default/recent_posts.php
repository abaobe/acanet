<div class="post-post-reply-wrapper">
   <?php
    $len="";
    $i=0;
    foreach ($allPosts as $aPost):
    $class = !($i%2)? "odd" : "even";
    $i++;
   ?>
         <div class="posts <?=$class?> rounded" postId="<?=$aPost->post_id ?>">
             <div class="post-title"><?= ucfirst($aPost->title) ?></div>
            <div class="post-datetime"><?=  date_format(date_create($aPost->date_time), 'l, d F Y \a\t H:i'); ?>
                        </div>
            
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
                | Reply's: <a href="#">73
                            </a> 
                | <a href="#">Reply</a>    
                
                
            </p>
        </div>

<div class="post-reply-wrapper">
        <?php  for($i=0;$i<rand()%5;$i++): ?>
   <div class="posts-reply">            
                 <div class="post-description">
                    <?php
                        $len = strlen($aPost->description);
                        if($len >80)
                            echo substr($aPost->description,0,80);
                        else
                            echo $aPost->description;
                    ?>
                </div>

                <div class="post-datetime"><?=  date_format(date_create($aPost->date_time), 'l, d F Y \a\t H:i'); ?>,
                        by <a href="#"><?=$aPost->publisher_name ?></a></div>

                <a class="readMore" href="javascript:void(0)">
                <?php
                    if($len>80)
                        echo "Read more &raquo;";
                ?>
                </a>
        </div>
    
    <?php  endfor; ?>        
        <div class="post-reply-input-div" class="contactform">
            <hr>            
                <textarea class="field post-reply-input .shadow" type="text" name="post-reply-input"  postId="<?=$aPost->post_id ?>" rows="2" cols="30"></textarea>            
        </div>    </div>

      <?php endforeach; ?>
</div>