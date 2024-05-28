<?php
/*
Plugin Name: News
Version: 1.0
Description: News Plugin
Author: James Munyan
*/

// Load the plugin's text domain
function jm_news_init() {
	load_plugin_textdomain('jmunyan-news', false, dirname(plugin_basename(__FILE__)) . '/translation');
}
add_action('plugins_loaded', 'jm_news_init');



/* -------------------------------------- */

// News Posttype
add_action( 'init', 'jm_news_create_posttype' );
	function jm_news_create_posttype() {
    register_post_type('news',
    	array(
	    	'labels' => array('name' => __('News', 'jmunyan-news'),
	    	'singular_name' => __('News', 'jmunyan-news')),
	    	'public' => true,
	    	'publicly_queryable' => true,
	    	'menu_icon' => 'dashicons-calendar-alt',
	    	'taxonomies' => array('category'),
	    	'has_archive' => true,
	    	'supports' => array(
	    		'title',
	    		'editor',
	    		'excerpt',
	    		'thumbnail',
	    		'comments'
	    	),
	    	'show_in_rest' => true,
	    	'rewrite' => array('slug' => 'news'),
    	)
    );
	}

function jm_news_function() {
	jm_news_create_posttype();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'jm_news_function' );


/* -------------------------------------- */

add_action( 'init', 'create_jm_news_hierarchical_taxonomy', 0 );

function create_jm_news_hierarchical_taxonomy() {



// Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Tags', 'taxonomy general name' ),
        'singular_name'     => _x( 'Tags', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Genres' ),
        'all_items'         => __( 'All Tags' ),
        'parent_item'       => __( 'Parent Tags' ),
        'parent_item_colon' => __( 'Parent Tags:' ),
        'edit_item'         => __( 'Edit Tags' ),
        'update_item'       => __( 'Update Tags' ),
        'add_new_item'      => __( 'Add New Tags' ),
        'new_item_name'     => __( 'New Tags Name' ),
        'menu_name'         => __( 'Tags' ),
    );

    $args = array(
        'hierarchical'      => false,
        'public'       => true,
      	'show_in_rest' => true,
      	'label'        => 'News Tags',
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'news-tag' ),
    );

    register_taxonomy( 'newstags', array( 'news' ), $args );




}


/* -------------------------------------- */

// Images
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	add_image_size('news_plugin_small', 700, 700, true);
}

/* -------------------------------------- */

// Change author
function jm_news_allowAuthorEditing() {
  add_post_type_support( 'news', 'author' );
}
add_action('init','jm_news_allowAuthorEditing');

/* -------------------------------------- */

// Files
require_once ('files/functions.php');
require_once ('files/shortcode.php');


/* -------------------------------------- */

// CSS file
add_action('wp_enqueue_scripts', 'jm_news_register_plugin_styles');
  function jm_news_register_plugin_styles() {
    wp_register_style('news', plugins_url('/css/news.css',__FILE__));
    wp_enqueue_style('news');
  }

/* -------------------------------------- */
