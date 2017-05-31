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

define( 'CS_LOGIN_FORM_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'CS_LOGIN_FORM_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

add_action( 'wp_enqueue_scripts', 'cspp_login_form_enqeue' );

/* Add element to Cornerstone */
add_action( 'cornerstone_register_elements', 'cspp_register_login_form_elements', 100 );

/*
 * => Enqueue Scripts
 * ---------------------------------------------------------------------------*/

if ( !function_exists( 'cspp_login_form_enqeue' ) ) {
	function cspp_login_form_enqeue() {
  	// $v = '1.1.3';
  	$v = time();
  	wp_enqueue_script( 'cspp-login-form', CS_LOGIN_FORM_URL.'/assets/js/login-form.js', array( 'jquery' ), $v );
  	wp_enqueue_style( 'cspp-login-form-css', CS_LOGIN_FORM_URL.'/assets/css/csloginform.css', array(), $v );
	}
}

if ( !function_exists( 'cspp_register_login_form_elements' ) ) {
	function cspp_register_login_form_elements() {
		cornerstone_remove_element( 'cs-login-form' );
		cornerstone_register_element(
			'CSL_Login_Form',
			'cs-login-form',
			CS_LOGIN_FORM_PATH . '/includes/cornerstone-login-form-element'
		);
	}
}
