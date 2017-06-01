<?php
/*
Plugin Name: Cornerstone Library: Recent Posts Extended
Plugin URI:  http://cornerstonelibrary.com/
Description: Shows recent posts. Allows all public post types.
Version:     0.1
Author:      William Cobb
Author URI:  http://bigwilliam.com
Author Email: hello@bigwilliam.com
Text Domain: __x__
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
 * => Enqueue Scripts
 * ---------------------------------------------------------------------------*/
function csl_recent_posts_scripts() {
	wp_enqueue_script( 'csl-recent-posts-script', plugins_url( '/assets/js/custom.js', __FILE__ ), array( 'jquery' ), null, true );
	wp_enqueue_style( 'csl-recent-posts-css', plugins_url( '/assets/css/custom.css', __FILE__ ), array(), '0.1' );
}
add_action( 'wp_enqueue_scripts', 'csl_recent_posts_scripts', 100 );


/*
 * => Load Shortcodes
 * ---------------------------------------------------------------------------*/
require_once('includes/cs-posts-advanced/shortcodes/recent-posts-extended.php');

/*
 * => ADD CUSTOM ELEMENTS TO CORNERSTONE
 * ---------------------------------------------------------------------------*/
function csl_recent_posts_extended() {
	require_once( 'includes/cs-posts-advanced/elements/recent-posts-extended.php' );
  cornerstone_add_element( 'CSL_Recent_Posts_Extended' );
}
add_action( 'cornerstone_load_elements', 'csl_recent_posts_extended' );
