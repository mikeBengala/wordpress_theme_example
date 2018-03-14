<?php
get_header();

//store custom post by 'youtube_video' key, if there is one
$youtube_video = get_post_custom_values('youtube_video', get_the_ID());

if($youtube_video){
    //setting youtube_video url as a globalscope var, so it can be acessible in template file
    set_query_var('video_url', $youtube_video[0]);
    get_template_part( 'pages_templates/youtube_video');
}
else if(has_post_thumbnail()){
    get_template_part( 'pages_templates/with_thumbnail');
}
else{
    get_template_part( 'pages_templates/simple');
}
get_footer();
?>
