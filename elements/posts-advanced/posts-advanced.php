<?php
/*
Plugin Name: Cornerstone Modal
Plugin URI:  http://cornerstonelibrary.com
Description: A modal popup box for Cornerstone
Version:     0.3
Author:      D3fy Development Group
Author URI:  https://www.d3fy.com
Author Email: https://www.d3fy.com/#contact
Text Domain: __x__
*/

define( 'CS_POSTS_ADVANCED_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'CS_POSTS_ADVANCED_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

/* Add element to Cornerstone */
add_action( 'cornerstone_register_elements', 'cspp_register_posts_advanced_elements', 100 );

if ( !function_exists( 'cspp_register_posts_advanced_elements' ) ) {
	function cspp_register_posts_advanced_elements() {
		cornerstone_remove_element( 'cs-posts-advanced' );
		cornerstone_register_element(
			'CSL_Posts_Advanced',
			'cs-posts-advanced', 
			CS_POSTS_ADVANCED_PATH . '/includes/csl-posts-advanced'
		);
	}
}
