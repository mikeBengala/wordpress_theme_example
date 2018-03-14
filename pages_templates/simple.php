<section data-page="page" class="simple">

    <?php //Page simple illustration----------------->?>
    <div class="grid-25 grid-parent">
        <img class="page_illustration grid-100 grid-parent" alt="AAPI simple Logo" src="<?=get_template_directory_uri()?>/img/page_illustration.png">
    </div>
    <?php //end Page simple illustration------------->?>

    <?php //Page content----------------------------->?>
    <div class="grid-55 prefix-5 sufix-5 page_content_wrap">
        <?php if(have_posts()){while(have_posts()){the_post();?>
            <h2 class="page_title"><?php the_title();?></h2>
            <div class="page_content"><?php the_content();?></div>
        <?php }}?>
    </div>
    <?php //end Page content------------------------->?>

</section>
