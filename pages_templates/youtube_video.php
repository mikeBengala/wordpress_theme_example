<section data-page="page" class="youtube">

<?php if(have_posts()){while(have_posts()){the_post();?>

    <?php //youtube_page_header---------------------------------------------->?>
    <div class="grid-100 grid-parent youtube_page_header">

        <?php //post_title--------------------------------------------------->?>
        <div class="grid-40 prefix-10 mobile-grid-100 mobile-prefix-0 tablet-grid-90 tablet-prefix-5">
            <h2 class="page_title"><?php the_title();?></h2>
        </div>
        <?php //end post_title----------------------------------------------->?>

        <?php //youtube_video wrap------------------------------------------->?>
        <div class="youtube_video_wrap fade_in before grid-45 suffix-5 mobile-grid-100 mobile-prefix-0 mobile-suffix-0 tablet-grid-80 tablet-prefix-10 tablet-suffix-10">
            <img class="youtube_screen" src="<?=get_template_directory_uri()?>/img/youtube_wrap.png" alt="" >
            <iframe src="<?= $video_url?>" frameborder="0" allowfullscreen></iframe>
        </div>
        <?php //end youtube_video wrap--------------------------------------->?>

    </div>
    <?php //end youtube_page_header------------------------------------------>?>

    <?php //youtube_page_content--------------------------------------------->?>
    <div class="youtube_page_content grid-parent grid-100">
        <div class="grid-40 prefix-10  mobile-grid-100 mobile-prefix-0 tablet-grid-90 tablet-prefix-5">
            <div class="page_content"><?php the_content();?></div>
        </div>
    </div>
    <?php //end youtube_page_content----------------------------------------->?>

<?php }}?>

</section>
