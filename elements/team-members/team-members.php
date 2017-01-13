<?php
/*
Plugin Name: Cornerstone Library: Team Members
Plugin URI:  http://cornerstonelibrary.com/
Description: Adds a new element to Cornerstone - a team member promo box which shows the bio in a lightbox when clicked on. Learn more at <a href="//cornerstonelibrary.com" target="_blank">CornerstoneLibrary.com</a>.
Version:     2.0
Author:      BigWilliam
Author URI:  http://bigwilliam.com
Author Email: hello@bigwilliam.com
Text Domain: __x__
*/


/* Prevent direct access */
if ( ! defined( 'WPINC' ) ) die;

/* Paths */
define( 'CSL_TEAMMEMBER_PATH', plugin_dir_path( __FILE__ ) );
define( 'CSL_TEAMMEMBER_URL', plugin_dir_url( __FILE__ ) );


/* Add element to Cornerstone */
add_action( 'cornerstone_register_elements', 'csl_teammember_register_elements' );

/* Add Icon Map */
add_filter( 'cornerstone_icon_map', 'csl_teammember_icon_map');

/* scripts */
add_action( 'wp_enqueue_scripts', 'csl_teammember_scripts');



/*
 * => FUNCTIONS
 * ---------------------------------------------------------------------------*/

function csl_teammember_scripts() {
  wp_enqueue_script( 'csl-teammember-script', CSL_TEAMMEMBER_URL . 'assets/js/csl_teammember.js', array('jquery'), null, true );
  wp_enqueue_style( 'csl-teammember-style', CSL_TEAMMEMBER_URL . 'assets/css/csl_teammember.css', array(), '1.0' );
}

function csl_teammember_register_elements() {
	cornerstone_register_element( 'CSL_Team_Member', 'csl-team-member', CSL_TEAMMEMBER_PATH . 'includes/csl-team-member' );
}

function csl_teammember_icon_map() {
	$icon_map['default'] = CSL_TEAMMEMBER_URL . 'assets/svg/icons.svg';
	return $icon_map;
}



