<?php
// get theme mod with fallback iff string is empty
function custom_get_theme_mod($mod, $fallback){
	$_this_mod = get_theme_mod($mod, $fallback);
	if ($_this_mod == ""){
	    $_this_mod = $fallback;
	}
	return $_this_mod;
}

//this function returns all the registered locations as a 'paises' post type in the aapi_paises pluggin
function get_the_map_locations(){
	wp_reset_query();
	$paises = get_posts( array ( 'post_type' => 'paises', 'posts_per_page'=> -1 ) );
	if ( $paises ) {
		foreach ( $paises as $pais ) {
			$pais_coordinates = get_post_meta( $pais->ID, 'coordinates_post_class', true );
			$pais_coordinates_arr = explode("/", $pais_coordinates, 2);
			$name = get_the_title( $pais->ID );
			$left = $pais_coordinates_arr[0];
			$top = $pais_coordinates_arr[1];
			echo '<div style="top:'. $top .'%; left:'. $left .'%;" class="location" id="post_id_'.$pais->ID.'"><span class="icon-map-point-a"></span><p>'. $name .'</p></div>';
		}
	}
}

//response to ajax request with post id
function get_single_post() {
    // The $_REQUEST contains all the data sent via ajax
    if ( isset($_REQUEST) ) {
		//$id is equal to submited number by ajax
        $id = $_REQUEST['id'];

		//$content_post holds requested by id post in a array
		$content_post = get_post($id);

		//this holds the main content from the array
		$content = $content_post->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);

		//this holds the post title from the array
		$title = $content_post->post_title;

		$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id( $id ), 'paises');

		$response = array(
			title => $title,
			content => $content,
			thumbnail => $thumbnail[0]
		);

		echo json_encode($response);
		//echo var_dump($content_post);
    }
    // Always die in functions echoing ajax content
	die();
}
add_action( 'wp_ajax_get_single_post', 'get_single_post' );
add_action('wp_ajax_nopriv_get_single_post', 'get_single_post' );

//get posts by posttype
function get_posts_by_posttype($type = 'post', $taxonomy = false, $posts_per_page = -1){
	$the_posts = get_posts( array ( 'post_type' => $type , 'posts_per_page'=> $posts_per_page ) );
	$response_arr = array();

	if ( $the_posts ) {
		foreach($the_posts as $post){
			$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), $type);
			$href = get_permalink( $post->ID);
			$date = $post->post_date;
			$date = explode(" ", $date);
			$day = $date[0];
			$hour = $date[1];
			if($taxonomy){
				$cat = get_the_terms( $post->ID , $taxonomy );
			}
			$result = (object) array(
					'id' => $post->ID,
					'title' => $post->post_title,
					'content' => $post->post_content,
					'the_content' => apply_filters('the_content',$post->post_content),
					'thumbnail' => $thumbnail[0],
					'href' => $href,
					'cat' => $cat[0]->name,
					'day' => $day,
					'hour' => $hour
			);
			array_push($response_arr, $result);
		}
		return $response_arr;
	}
}

//get one bost by posttype
function get_one_posts_content_by_posttype($type = 'post'){
	$the_posts = get_posts( array ( 'post_type' => $type , 'posts_per_page'=> 1 ) );

	if ( $the_posts ) {

		foreach($the_posts as $post){
			$content = $post->post_content;
		}
		return $content;
	}
}

//get partners and partners cats
function get_partners(){
	$the_posts = get_posts( array ( 'post_type' => 'associados' , 'posts_per_page'=> -1 ) );
	$response_arr = array();

	if ( $the_posts ) {

		//gather all the partners
		foreach($the_posts as $post){
			$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), $type);

			$regiao_terms = get_the_terms($post->ID, 'regiao_associados' );
			$regiao_name = array();
			$regiao_slug = array();
			foreach ($regiao_terms as $term){
				array_push($regiao_slug,$term->slug);
			}

			$sector_terms = get_the_terms($post->ID, 'sector_associados' );
			$sector_name = array();
			$sector_slug = array();
			foreach ($sector_terms as $sector){
				array_push($sector_slug,$sector->slug);
			}
			$partners = (object) array(
					'id' => $post->ID,
					'title' => $post->post_title,
					'thumbnail' => $thumbnail[0],
					'regiao_slugs' => implode(' ', $regiao_slug),
					'sector_slugs' => implode(' ', $sector_slug)
			);
			array_push($response_arr, $partners);
		}

		//gather all the 'regiao_associados' categories
		$regioes = gather_terms_name_slugs('regiao_associados');

		//gather all the 'regiao_associados' categories
		$sector = gather_terms_name_slugs('sector_associados');

		//the returned array
		return (object) array(
			'associados' => $response_arr,
			'regioes' => $regioes,
			'sectores' => $sector
		);
	}
}
function gather_terms_name_slugs($taxonomy_name){
	$terms = get_terms($taxonomy_name);
	$name = array();
	$slug = array();
	foreach ($terms as $term){
		array_push($name , $term->name);
		array_push($slug , $term->slug);
	}
	$response = array_combine( $name , $slug );
	return $response;
}
?>
