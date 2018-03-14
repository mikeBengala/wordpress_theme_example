<section data-page="parceiros" class="parceiros_archive grid-100 grid-parent">
    <div class="grid-container">

        <?php //archive title------------------------>?>
        <h2>Parcerias</h2>
        <?php //end archive title-------------------->?>

        <?php //post loop wrap----------------------->?>
        <?php foreach(get_posts_by_posttype($posttype) as $post){?>
            <div class="grid-100 grid-parent parceiros_archive_post fade_in before">
                <div class="parceiros_archive_thumbnail grid-25">
                    <img src="<?=($post->thumbnail) ? $post->thumbnail : get_template_directory_uri().'/img/thumbnail_servicos.jpg'?>">
                </div>
                <div class="parceiros_archive_caption grid-75">
                    <h3><?=$post->title?></h3>
                    <div class="parceiros_archive_content">
                        <?=$post->the_content?>
                    </div>
                </div>
                <?php edit_post_link('Editar isto', '', '', $post->id, 'edit_button'); ?>
            </div>
        <?php }?>
        <?php //end loop wrap------------------------>?>

    </div>
</section>
