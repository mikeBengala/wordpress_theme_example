<?php
//this template has a timeline left/right kind os display
//$post_position refers to the first post position, change to right if you want the first post aligned to the right.
$post_position = 'left';
?>

<section data-page="agenda" class="agenda_archive grid-100 grid-parent">
    <div class="grid-container grid-parent">

        <?php //título-------------------------------->?>
        <h2>Ações</h2>
        <?php //end título---------------------------->?>

        <?php //post loop wrap------------------------>?>
        <div class="grid-100 event_loop_wrap">

            <?php foreach(get_posts_by_posttype('agenda', 'categoria_agenda') as $post){?>

                <?php switch($post_position){case 'left':?>

                    <?php //left case------------------------->?>
                    <div class="grid-50 suffix-50 grid-parent left event_block">
                            <div class="fade_in">
                                <div class="event_caption grid-90 grid-parent">
                                    <div class="grid-100 event_caption_content">
                                        <a href="<?=$post->href?>">
                                            <p class="the_cat"><?=$post->cat?></p>
                                            <h3><?=$post->title?></h3>
                                            <p class="the_excerpt"><?=substr($post->content, 0, 20)?>...</p>
                                        </a>
                                    </div>
                                    <a href="<?=$post->href?>"><img class="agenda_thumbnail" src="<?=$post->thumbnail?>" alt=""></a>
                                </div>
                                <div class="grid-10 grid-parent line"></div>
                            </div>
                        </div>
                    <?php //end left case--------------------->?>


                <?php $post_position = 'right'; break; case 'right':?>

                    <?php //right case------------------------>?>
                    <div class="grid-50 prefix-50 grid-parent right event_block">
                            <div class="fade_in">
                                <div class="grid-10 grid-parent line"></div>
                                <div class="event_caption grid-90 grid-parent">
                                    <div class="grid-100  event_caption_content">
                                        <a href="<?=$post->href?>">
                                            <p class="the_cat"><?=$post->cat?></p>
                                            <h3><?=$post->title?></h3>
                                            <p class="the_excerpt"><?=substr($post->content, 0, 20)?>...</p>
                                        </a>
                                    </div>
                                    <a href="<?=$post->href?>"><img class="agenda_thumbnail" src="<?=$post->thumbnail?>" alt=""></a>
                                </div>
                            </div>
                        </div>
                    <?php //end right case-------------------->?>

                <?php $post_position = 'left'; break;?><?php }?>

            <?php }?>

        </div>
        <?php //end post loop wrap-------------------->?>

    </div>
</section>
