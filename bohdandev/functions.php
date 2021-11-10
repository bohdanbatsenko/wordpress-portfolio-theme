<?php
 add_action('wp_enqueue_scripts', 'bohdandev_scripts'); // можно использовать этот хук он более поздний
function bohdandev_scripts() {
	wp_enqueue_style( 'bohdandev_styles', get_template_directory_uri() . '/style.css' );

	//wp_enqueue_style( 'fancybox_styles', get_template_directory_uri() . '/dist/libs/fancybox/dist/fancybox.css' );
	//wp_register_style( 'devwp_styles', get_template_directory_uri() . '/main.css' );
	wp_enqueue_style( 'bohdandev_styles-custom', get_template_directory_uri() . '/dist/css/main.min.css' );

	//wp_enqueue_script( 'mark', get_template_directory_uri() . '/editor/mark.js', array(), '1.0.0', true  );
	wp_dequeue_style( 'wp-block-library' );
	//wp_dequeue_script( 'wp-embed' );


	//wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/dist/libs/fancybox/dist/fancybox.umd.js', array(), '1.0.0', true );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/dist/js/scripts.min.js', array(), '1.0.0', true );
}

//https://www.geekpress.fr/desactiver-rest-api-xml-rpc-wordpress/
add_filter( 'xmlrpc_enabled', '__return_false' );
remove_action( 'wp_head', 'rsd_link' );


add_action('after_setup_theme', function(){
  register_nav_menus( array(
    'header' => __( 'Primary Menu', 'crea' ),
    'foot_menu' => __( 'Footer menu', 'crea' ), 
  ) );
});

// https://kinsta.com/knowledgebase/disable-emojis-wordpress/
/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
 }
 add_action( 'init', 'disable_emojis' );
 
 /**
	* Filter function used to remove the tinymce emoji plugin.
	* 
	* @param array $plugins 
	* @return array Difference betwen the two arrays
	*/

 
 /**
	* Remove emoji CDN hostname from DNS prefetching hints.
	*
	* @param array $urls URLs to print for resource hints.
	* @param string $relation_type The relation type the URLs are printed for.
	* @return array Difference betwen the two arrays.
	*/
 function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
	/** This filter is documented in wp-includes/formatting.php */
	$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
 
 $urls = array_diff( $urls, array( $emoji_svg_url ) );
	}
 
 return $urls;
 }


add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5' );
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo' );

//add_filter('acf/settings/row_index_offset', '__return_zero');

add_image_size('preview', 100, 100, true );
add_image_size('illustration', 500, 500, true );
add_image_size('illustration_big', 1000, 800, true );
add_image_size('illustration_small', 500, 400, true );
add_image_size('casestudy_thumbnail', 1000, 650, true );
add_image_size('casestudy_tall', 486, 616, true );
add_image_size('casestudy_full', 1920, null );
add_image_size('large', 1280, null );
//add_image_size('large', 500, null );

function case_study_setup_post_type() {
	$args = array(
			'supports' => ['excerpt', 'title', 'thumbnail'],
			'public'    => true,
			'has_archive'    => true,
			'pages'                 => true,
			'label'     => __( 'case-study', 'textdomain' ),
			'menu_icon' => 'dashicons-welcome-learn-more',
			'menu_position' => 6,
	);
	register_post_type( 'case-study', $args );
}
add_action( 'init', 'case_study_setup_post_type' );

function illustration_setup_post_type() {
	$args = array(
			'supports' => [ 'title', 'thumbnail'],
			'public'    => true,
			"query_var" => true,
			'pages'                 => true,
			'has_archive'    => true,
			'label'     => __( 'illustration', 'textdomain' ),
			'menu_icon' => 'dashicons-admin-customizer',
			'menu_position' => 7,
			//'publicly_queryable' => false,
	);
	register_post_type( 'illustration', $args );
}
add_action( 'init', 'illustration_setup_post_type' );



add_action( 'init', 'addMarkButton' );
function addMarkButton() {
	add_filter('mce_external_plugins', function($plugins) {
		$plugins['mark'] = get_stylesheet_directory_uri() . '/editor/mark.js';
		return $plugins;
	});
	add_filter( 'mce_buttons', function ($buttons) {
		$buttons[] = 'mark';
		return $buttons;
	});
}



// // хук для регистрации
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'case-study-type', [ 'case-study' ], [ 
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'case-study-type',
			'singular_name'     => 'case-study',
			'search_items'      => 'Search Genres',
			'all_items'         => 'All Study',
			'view_item '        => 'View Study',
			'parent_item'       => 'Parent Study',
			'parent_item_colon' => 'Parent Study:',
			'edit_item'         => 'Edit Study',
			'update_item'       => 'Update Study',
			'add_new_item'      => 'Add New Study',
			'new_item_name'     => 'New Genre Name',
			'menu_name'         => 'Type of study',
		],
		'has_archive'    => true,
		'description'           => '', // описание таксономии
		'public'                => true,

	] );

}


// archive pagination
// function my_pre_get_posts( $query ) {
// 	if ( ! is_admin() && $query->is_main_query() &&
// 			is_post_type_archive( 'articles' )
// 	) {
// 			$query->set( 'offset_start', 9 );
// 			$query->set( 'posts_per_page', 18 );
// 	}

// 	if ( $offset = $query->get( 'offset_start' ) ) {
// 			$per_page = absint( $query->get( 'posts_per_page' ) );
// 			$per_page = $per_page ? $per_page : max( 1, get_option( 'posts_per_page' ) );

// 			$paged = max( 1, get_query_var( 'paged' ) );
// 			$query->set( 'offset', ( $paged - 1 ) * $per_page + $offset );
// 	}
// }
// add_action( 'pre_get_posts', 'my_pre_get_posts' );

// function my_found_posts( $found_posts, $query ) {
// 	if ( $offset = $query->get( 'offset_start' ) ) {
// 			$found_posts = max( 0, $found_posts - $offset );
// 	}

// 	return $found_posts;
// }
// add_filter( 'found_posts', 'my_found_posts', 10, 2 );



// add_action( 'pre_get_posts' ,'wpse222471_query_post_type_portofolio', 1, 1 );
// function wpse222471_query_post_type_portofolio( $query )
// {
//     if ( ! is_admin() && is_post_type_archive( 'illustration' ) && $query->is_main_query() )
//     {
//         $query->set( 'posts_per_page', 4 ); //set query arg ( key, value )
//     }
// }


// add_action('pre_get_posts', 'archive_paginations');
//   function archive_paginations($query){
//   	 if ( !is_admin() && $query->is_archive() && $query->is_main_query() ) {
//   	 	global $wp_query;
//   		$cat = $wp_query->get_queried_object();
//            $query->set( 'post_type', array( 'illustration', 'post' ) );
//            $query->set( 'posts_per_page', '4' );
           
//            $query->set( 'cat', $cat->slug );
  
//       }
//       return $query;
//   }


//https://wordpress.stackexchange.com/questions/158532/how-to-make-blog-pages-show-at-most-setting-not-affect-custom-queries
function set_my_pagination( $query )
{
    if ( is_admin() || !$query->is_main_query() )
        return;

    if ( is_home() )
    {
        $query->set( 'posts_per_page', 5 );
        return;
    }
    if ( is_post_type_archive( 'illustration' ) )
    {
        $query->set( 'posts_per_page', 2 );
        return;
    }

}
add_action( 'pre_get_posts', 'set_my_pagination', 1 );