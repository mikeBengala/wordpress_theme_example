<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<title><?php wp_title(); ?></title>
<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$custom_logo_id_image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
$custom_logo_id_image = $custom_logo_id_image[0];
 ?>
<?php wp_head();?>
<?php get_template_part( "parts/header_style" );?>
<script type="text/javascript">
        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>
</head>
<body <?php body_class(); ?>>
<div class="all-that grid-100 grid-parent">
<header class="grid-100 grid-parent">
    <div class="grid-20 logo grid-parent tablet-grid-30 mobile-grid-50">
        <a href="<?=get_site_url()?>">
            <img src="<?=$custom_logo_id_image?>" alt="logo">
        </a>
    </div>
    <h1 class="grid-60 tablet-grid-40 hide-on-mobile">
        <?php echo get_bloginfo("description");?>
    </h1>
    <div class="grid-20 grid-parent tablet-grid-30 mobile-grid-50">
        <div class="menuToggle"><span><?php _e("MENU", "aapi")?></span><i class="icon-menuToggle"></i></div>
    </div>
</header>
<div class="the_menu_wrap grid-100 grid-parent document-height">
    <div class="inner_menu_wrap">
        <div class="inner_menu_wrap_2">
            <div class="menu_close grid-100">
                <p><i class="icon-close"></i><span><?php _e("FECHAR", "aapi")?></span></p>
                <img src="<?=get_template_directory_uri()?>/img/logo_simple.png" alt="AAPI">
            </div>
            <div class="menu-wrap grid-100 grid-parent">
                <?php wp_nav_menu();?>
            </div>
        </div>
    </div>
</div>
