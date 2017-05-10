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

define( 'CS_MODAL_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'CS_MODAL_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

add_action( 'wp_enqueue_scripts', 'cspp_modal_enqeue' );

/* Add Icon Map */
add_filter( 'cornerstone_icon_map', 'cspp_modal_icon_map');

/* Add element to Cornerstone */
add_action( 'cornerstone_register_elements', 'cspp_register_elements', 100 );

/*
 * => Enqueue Scripts
 * ---------------------------------------------------------------------------*/

if ( !function_exists( 'cspp_modal_enqeue' ) ) {
	function cspp_modal_enqeue() {
  	$v = '1.1.3';
  	// $v = time();
  	wp_enqueue_script( 'cspp-lity', D3FY_CSPP_URL.'/lib/cspplity/lity.min.js', array( 'jquery' ), $v );
  	wp_enqueue_style( 'cspp-lity-csmodal', CS_MODAL_URL.'/assets/css/csmodal.css', array(), $v );
	}
}

if ( !function_exists( 'cspp_modal_icon_map' ) ) {
	function cspp_modal_icon_map() {
		$icon_map['cs-modal'] = CS_MODAL_URL . '/assets/svg/icons.svg';
		return $icon_map;
	}
}

if ( !function_exists( 'cspp_register_elements' ) ) {
	function cspp_register_elements() {
		cornerstone_remove_element( 'cs-modal' );
		cornerstone_remove_element( 'cornerstone-modal' );
		cornerstone_register_element(
			'CSL_Modal', 
			'cs-modal', 
			CS_MODAL_PATH . '/includes/cornerstone-modal-element'
		);
	}
}