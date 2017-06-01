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
add_action( 'cornerstone_register_elements', 'cspp_teammember_register_elements', 100 );

/* Add Icon Map */
add_filter( 'cornerstone_icon_map', 'cspp_teammember_icon_map');

/* scripts */
add_action( 'wp_enqueue_scripts', 'cspp_teammember_scripts');



/*
 * => FUNCTIONS
 * ---------------------------------------------------------------------------*/

if (!function_exists('cspp_teammember_scripts')) {
	function cspp_teammember_scripts() {
  	$v = 20170515;
  	// $v = time();

	  wp_enqueue_script( 'csl-teammember-script', CSL_TEAMMEMBER_URL . 'assets/js/csl_teammember.js?' . time(), array('jquery'), $v, true );
	  wp_enqueue_style( 'csl-teammember-style', CSL_TEAMMEMBER_URL . 'assets/css/csl_teammember.css?' . time(), array(), $v );
	  wp_enqueue_style( 'cspp-icons', D3FY_CSPP_URL.'/lib/csppicons/style.css', array(), $v, 'all' );
	}
}

if (!function_exists('cspp_teammember_register_elements')) {
	function cspp_teammember_register_elements() {
		cornerstone_remove_element( 'csl-team-member' );
		cornerstone_register_element( 'CSL_Team_Member', 'csl-team-member', CSL_TEAMMEMBER_PATH . 'includes/csl-team-member' );
	}
}

if (!function_exists('cspp_teammember_icon_map')) {
	function cspp_teammember_icon_map() {
		$icon_map['default'] = CSL_TEAMMEMBER_URL . 'assets/svg/icons.svg';
		return $icon_map;
	}
}
