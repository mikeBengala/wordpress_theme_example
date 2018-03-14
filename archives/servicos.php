<section data-page="servicos" class="servicos_archive grid-100 grid-parent">
    <div class="grid-container">

        <?php //the_archive title------------------------------------------>?>
        <h2>Serviços</h2>
        <?php //end the_archive title-------------------------------------->?>

        <?php //post loop wrap--------------------------------------------->?>
        <div class="servicos_archive_post_loop_wrap grid-100 grid-parent">
            <?php foreach(get_posts_by_posttype($posttype) as $post){?>
                <?php //var_dump($post);?>
                <div class="grid-33 servicos_archive_post"><a href="<?=$post->href?>">
                    <div class="servicos_archive_thumbnail" style="background-image: url(<?=($post->thumbnail) ? $post->thumbnail : get_template_directory_uri().'/img/thumbnail_servicos.jpg'?>);">
                    </div>
                    <div class="servicos_archive_caption">
                        <h3><?=$post->title?></h3>
                    </div>
                </a></div>
            <?php }?>
        </div>
        <?php //end post loop wrap----------------------------------------->?>
    </div>
</section>
