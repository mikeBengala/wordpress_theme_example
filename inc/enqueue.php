<?php
if (!is_admin()) {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_script( 'aapi_script', get_template_directory_uri() . '/script.js', array(), false, false );
}

//hook recaptcha to <head> on page-contact
function google_recaptcha() {
    wp_register_script('google_recaptcha', 'https://www.google.com/recaptcha/api.js', array (), false, false);
    wp_enqueue_script( 'google_recaptcha' );
}
add_action("wp_enqueue_scripts", "google_recaptcha");
?>
