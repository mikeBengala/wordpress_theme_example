<?php get_header();?>
<section data-page="homepage">

    <?php //Home map------------------------------------------->?>
    <div class="grid-100 grid-parent the_map_wrap" style="background-image: url(<?=get_template_directory_uri()?>/img/pat-03.png);">
        <div class="map_zoom_wrap grid-parent the_map_wrap">
            <div class="map_inner_wrap">
                <img class="map" src="<?=get_template_directory_uri()?>/img/map.png">
                <?php get_the_map_locations();?>
            </div>
        </div>
        <div class="map_controls">
            <span class="icon-more"></span>
            <hr>
            <span class="icon-less"></span>
        </div>
    </div>
    <?php //end Home map--------------------------------------->?>

    <?php //Home map poppup------------------------------------>?>
    <div class="pais_popup_wrap grid-100 grid-parent">
        <div class="grid-50 window_height popup_background" style="background-image:url('<?=get_template_directory_uri()?>/img/no_thumbnail.jpg');">
        </div>
        <div class="grid-50 window_height popup_content" id="scrollable">
            <div class="popup_inner_content">
                <h3 class="grid-100 grid-parent float-left"><?php _e("aapi em:", "aapi");?><?php //the_post_title?> <span></span></h3>
                <hr>
                <div class="popup_text grid-100 grid-parent float-left">
                    <?php //the_post_content ?>
                    <p>
                    </p>
                </div>
                <p class="close_popup float-left"><span class="icon-prev"></span> <?php _e("Voltar para Mapa", "aapi");?></p>
            </div>
        </div>
    </div>
    <?php //end Home map poppup-------------------------------->?>

    <?php //Welcome poppup------------------------------------->?>
    <div class="welcome_popup_wrap grid-100 grid-parent mobile-grid-100" style="background-image: url('<?=get_template_directory_uri()?>/img/clouds.png');">
        <div class="clouds_wrap">
            <?php /*<img class="clouds" src="<?=get_template_directory_uri()?>/img/clouds.png">*/?>
        </div>
        <div class="inner_welcome_wrap grid-100 mobile-grid-100">
        <h4>
            <?=custom_get_theme_mod("map_title", "A aapi promove a concretização de iniciativas de internacionalização dos seus associados");?>
        </h4>
        <p>
            <?=custom_get_theme_mod("map_caption", "Descubra neste mapa casos de sucesso pelo mundo fora");?>
        </p>
        <button class="view_map absolute-center"><span><?php _e("EXPLORAR MAPA", "aapi");?></span><i class="icon-map-point-b"></i></button>
        </div>
    </div>
    <?php //end Welcome poppup--------------------------------->?>

    <?php //newsletter parallax-------------------------------->?>
    <div class="parallax newsletter grid-100 grid-parent" style="background-image:url(<?=get_template_directory_uri()?>/img/home_parallax.jpg)">
        <div class="grid-50 parallax_content">
            <img class="fade_in before newsletter_illustration" alt="" src="<?=get_template_directory_uri()?>/img/newsletter_illustration.png" />
        </div>
        <div class="grid-50 parallax_content">
            <h2><?=custom_get_theme_mod("newsletter_title", "Subscreva<br />a nossa Newsletter")?></h2>
            <p><?=custom_get_theme_mod("newsletter_caption", "Beneficie de uma janela para o Mundo")?></p>
            <?php echo do_shortcode('
                [newsletter_form button_label="Subscrever" class="newsletter_form"]
                    [newsletter_field name="first_name" label="O seu Nome:"]
                    [newsletter_field name="email" label="O seu email:"]
                [/newsletter_form]
            ')?>
        </div>
    </div>
    <?php //end newsletter parallax---------------------------->?>

    <?php //owl-carousel agenda-------------------------------->?>
    <div class="agenda">
        <div class="owl-carousel owl-carousel-1 owl-theme grid-100 grid-parent">
            <?php foreach(get_posts_by_posttype('agenda', 'categoria_agenda') as $event){?>
                <div class="the_event" style="background-image:url(<?=$event->thumbnail?>);">
                    <a href="<?=$event->href?>">
                        <div class="inner_event_wrap">
                            <small><?=$event->cat?></small>
                            <h3><?=$event->title?></h3>
                            <p><?=$event->content?></p>
                        </div>
                    </a>
                </div>
            <?php }?>
        </div>
    </div>
    <?php //end owl-carousel agenda---------------------------->?>

    <?php //owl-carousel associados---------------------------->?>
    <div class="associados grid-100 grid-parent">
        <div class="grid-70 prefix-15 sufix-15">
            <div class="owl-carousel owl-carousel-2 owl-theme grid-container">
                <?php foreach(get_posts_by_posttype('associados') as $event){?>
                    <div class="associado_wrap"><img src="<?=$event->thumbnail?>" alt="" /></div>
                <?php }?>
            </div>
        </div>
    </div>
    <?php //end owl-carousel associados------------------------>?>

    <?php //news loop------------------------------------------>?>
    <div class="news grid-100 grid-parent">
        <div class="grid-container grid-100 grid-parent news_header">
            <div class="grid-50">
                <h4>Notícias Recentes</h4>
            </div>
            <div class="grid-50">
                <a class="more_news" href="<?=get_site_url()?>/category/noticias/"><span>Mais notícias</span><i class="icon-next"></i></a>
            </div>
            <hr>
        </div>
        <div class="grid-container grid-parent news-loop-wrap">
            <?php foreach(get_posts_by_posttype('post', false, 4) as $post){?>
                <div class="grid-25 tablet-grid-50 mobile-grid-100">
                    <a href="<?=$post->href?>">
                        <img src="<?= ($post->thumbnail==false) ? get_template_directory_uri() . '/img/no_thumbnail_315_177.jpg' : $post->thumbnail?>" alt="" />
                        <div class="caption grid-100">
                            <div class="caption_inner_wrap">
                                <small><?=$post->day?></small>
                                <p><?=$post->title?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php }?>
        </div>
    </div>
    <?php //end news loop-------------------------------------->?>

</section>
<?php //Welcome video poppup------------------------------->?>
<div class="welcome_video_popup_wrap grid-100 grid-parent mobile-grid-100">
    <div class="inner_welcome_wrap grid-100 mobile-grid-100 absolute_center">
        <iframe width="100%" height="315" src="<?=get_one_posts_content_by_posttype('video_destaque')?>" frameborder="0" allowfullscreen></iframe>
        <button class="view_site"><span>EXPLORAR SITE</span><i class="icon-next"></i></button>
    </div>
</div>
<?php //end Welcome video poppup--------------------------->?>
<?php get_footer();?>
