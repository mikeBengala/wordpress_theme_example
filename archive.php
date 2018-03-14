<?php
get_header();

//this returns a array with the current archive infos
$queryed_object = get_queried_object();
$post_type_name = $queryed_object->name;
set_query_var('posttype', $post_type_name);
switch ($post_type_name) {
    case 'agenda':
        get_template_part( 'archives/agenda');
        break;
    case 'associados':
        get_template_part( 'archives/associados');
        break;
    case 'servicos':
        get_template_part( 'archives/servicos' );
        break;
    case 'parceiros':
        get_template_part( 'archives/parceiros' );
        break;
}
get_footer();
?>
