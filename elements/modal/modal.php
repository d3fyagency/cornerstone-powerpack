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

define( 'CS_MODAL_PATH', plugin_dir_path( __FILE__ ) );
define( 'CS_MODAL_URL', plugin_dir_url( __FILE__ ) );

add_action( 'wp_enqueue_scripts', 'csl_modal_enqeue' );

/* Add Icon Map */
add_filter( 'cornerstone_icon_map', 'csl_modal_icon_map');

/* Add element to Cornerstone */
add_action( 'cornerstone_register_elements', 'csl_register_elements' );

/*
 * => Enqueue Scripts
 * ---------------------------------------------------------------------------*/

function csl_modal_enqeue() {
	wp_enqueue_style( 'vex', plugins_url('/assets/css/vex.css', __FILE__ ), array(), '1.0' );
	wp_enqueue_style( 'vex-theme-default', plugins_url('/assets/css/vex-theme-default.css', __FILE__ ), array('vex'), '1.0' );
	wp_enqueue_style( 'vex-theme-bottom-right-corner', plugins_url('/assets/css/vex-theme-bottom-right-corner.css', __FILE__ ), array('vex'), '1.0' );
	wp_enqueue_style( 'vex-theme-flat-attack', plugins_url('/assets/css/vex-theme-flat-attack.css', __FILE__ ), array('vex'), '1.0' );
	wp_enqueue_style( 'vex-theme-os', plugins_url('/assets/css/vex-theme-os.css', __FILE__ ), array('vex'), '1.0' );
	wp_enqueue_style( 'vex-theme-plain', plugins_url('/assets/css/vex-theme-plain.css', __FILE__ ), array('vex'), '1.0' );
	wp_enqueue_style( 'vex-theme-top', plugins_url('/assets/css/vex-theme-top.css', __FILE__ ), array('vex'), '1.0' );
	wp_enqueue_style( 'vex-theme-wireframe', plugins_url('/assets/css/vex-theme-wireframe.css', __FILE__ ), array('vex'), '1.0' );
	wp_enqueue_script( 'vex', plugins_url('/assets/js/vex.min.js', __FILE__ ), array(), null, false );
	wp_enqueue_script( 'vex-combine', plugins_url('/assets/js/vex.combined.min.js', __FILE__ ), array('vex'), null, false );
}

function csl_modal_icon_map() {
	$icon_map['cs-modal'] = CS_MODAL_URL . '/assets/svg/icons.svg';

	return $icon_map;
}

function csl_register_elements() {
	cornerstone_register_element(
		'CSL_Modal', 
		'cs-modal', 
		CS_MODAL_PATH . 'includes/cornerstone-modal-element'
	);
}
