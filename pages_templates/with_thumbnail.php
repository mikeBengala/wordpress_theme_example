<section data-page="page" class="with_thumbnail master_height grid-100 grid-parent">
    <?php if(have_posts()){while(have_posts()){the_post();?>

        <?php //Page content----------------------------->?>
        <div class="grid-40 prefix-5 suffix-5 grid-parent master_height">
            <div class="page_content_wrap grid-100">
                <h2 class="page_title"><?php the_title();?></h2>
                <div class="page_content"><?php the_content();?></div>
            </div>
        </div>
        <?php //end Page content------------------------->?>

        <?php //Page ilustration------------------------->?>
        <div class="grid-50 page_thumbnail_ilustration copy_master_height">
            <div class="blur copy_master_height" style="background-image:url(<?php echo get_the_post_thumbnail_url()?>);">
            </div>
            <?php the_post_thumbnail();?>
        </div>
        <?php //Page ilustration------------------------->?>

    <?php }}?>
</section>
