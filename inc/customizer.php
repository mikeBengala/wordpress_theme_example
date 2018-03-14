<?php
//adding setting for footer text
add_action('customize_register', 'theme_footer_customizer');

function theme_footer_customizer($wp_customize) {
    //adding section in wordpress customizer
    $wp_customize->add_section('footer_extras_section', array(
        'title'          => 'Contactos no rodapé'
    ));

    //adding setting for footer text
    $wp_customize->add_setting('address_setting', array(
        'default'        => 'Escrever endereço aqui',
    ));

    $wp_customize->add_control('address_setting', array(
        'label'   => 'Morada',
        'section' => 'footer_extras_section',
        'type'    => 'textarea',
    ));

	//adding setting for footer text
    $wp_customize->add_setting('address_maps_setting', array(
        'default'        => 'Colar endereço google maps aqui',
		'type' => 'theme_mod'
    ));

    $wp_customize->add_control('address_maps_setting', array(
        'label'   => 'Hiperligação google maps',
        'section' => 'footer_extras_section',
        'type'    => 'textarea',
    ));

	//adding setting for footer text
    $wp_customize->add_setting('phone_setting', array(
        'default'        => 'Escrever número de telefone aqui',
		'type' => 'theme_mod'
    ));

    $wp_customize->add_control('phone_setting', array(
        'label'   => 'Telefone/Telemóvel (um por linha)',
        'section' => 'footer_extras_section',
        'type'    => 'textarea',
    ));

	//adding setting for footer text
    $wp_customize->add_setting('email_setting', array(
        'default'        => 'Escrever email aqui',
		'type' => 'theme_mod'
    ));

    $wp_customize->add_control('email_setting', array(
        'label'   => 'Email (um por linha)',
        'section' => 'footer_extras_section',
        'type'    => 'textarea',
    ));


    // texto da homepage
    $wp_customize->add_section('homepage_texts', array(
        'title'          => 'Textos da página Inicial'
    ));


    $wp_customize->add_setting('map_title', array(
        'default'        => 'A aapi promove a concretização de iniciativas de internacionalização dos seus associados',
    ));
    $wp_customize->add_control('map_title', array(
        'label'   => 'Título do Mapa',
        'section' => 'homepage_texts',
        'type'    => 'text',
    ));


    $wp_customize->add_setting('map_caption', array(
        'default'        => 'Descubra neste mapa casos de sucesso pelo mundo fora',
    ));
    $wp_customize->add_control('map_caption', array(
        'label'   => 'Descrição do Mapa',
        'section' => 'homepage_texts',
        'type'    => 'text',
    ));


    $wp_customize->add_setting('newsletter_title', array(
        'default'        => 'Subscreva<br /> a nossa Newsletter',
    ));
    $wp_customize->add_control('newsletter_title', array(
        'label'   => 'Título da secção - subscreva a newsletter',
        'section' => 'homepage_texts',
        'type'    => 'text',
    ));


    $wp_customize->add_setting('newsletter_caption', array(
        'default'        => 'Beneficie de uma janela para o Mundo',
    ));
    $wp_customize->add_control('newsletter_caption', array(
        'label'   => 'Descrição da secção - subscreva a newsletter',
        'section' => 'homepage_texts',
        'type'    => 'text',
    ));
}
?>
