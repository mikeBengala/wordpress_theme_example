<?php
get_header();
if(has_post_thumbnail()){
    get_template_part( 'pages_templates/with_thumbnail');
}
else{
    get_template_part( 'pages_templates/simple');
}

//if current posttype is serviços, add form---------------->
$posttype = get_post_type();
if($posttype == 'servicos'){
    get_template_part( 'pages_templates/contact_form' );
}
//end if current posttype is serviços, add form------------>
get_footer();
?>
