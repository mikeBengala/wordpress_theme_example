<?php get_header();?>
<div class="category grid-100 grid-parent">

    <?php //Category Title---------------------------------------->?>
    <div class="grid-container">
        <h2 class="single_post_title"><?=single_cat_title()?></h2>
    </div>
    <?php //end Category title------------------------------------>?>

    <?php //Category loop wrap------------------------------------>?>
    <div class="loop_wrap grid-container">
        <?php $count = 1;?>
        <?php if(have_posts()){while(have_posts()){the_post();?>

            <?php //The loop-------------------------------------->?>
            <a href="<?php the_permalink()?>" class="grid-33 post">
                <?= (has_post_thumbnail()) ? the_post_thumbnail() : '<img class="attachment-post-thumbnail size-post-thumbnail wp-post-image" src="' . get_template_directory_uri() . '/img/no_thumbnail_315_177.jpg">' ?>
                <div class="caption grid-100">
                    <div class="caption_inner_wrap">
                        <small><?= get_the_date('j \d\e F \d\e Y'); ?></small>
                        <h3><?php the_title();?></h3>
                    </div>
                </div>
            </a>
            <?php if($count %3 == 0){?>
                <div class="line_break"></div>
            <?php }?>
            <?php $count++;?>
            <?php //end The loop---------------------------------->?>

        <?php }}?>
    </div>
    <?php //end Category loop wrap-------------------------------->?>

</div>
<?php get_footer();?>
