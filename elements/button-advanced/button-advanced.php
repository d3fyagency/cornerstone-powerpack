<?php

/*
Plugin Name: Cornerstone Library: Button Advance
Plugin URI:
Description:
Author: Janzen Zarzoso
Author URI: <janzen.zarzoso@gmail.com>
Version: 0.1.1
*/


if ( ! defined( 'WPINC' ) ) die;

define( 'CSL_BUTTON_PATH', plugin_dir_path( __FILE__ ) );
define( 'CSL_BUTTON_URL', plugin_dir_url( __FILE__ ) );

add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style( 'csl-button-advance', CSL_BUTTON_URL . '/assets/styles/csl-button-advance.css', array(), '0.1.1' );
});

add_action( 'cornerstone_register_elements', function() {
	cornerstone_register_element( 'CSL_Button', 'csl-button', CSL_BUTTON_PATH . "/elements/csl-button" );
});

add_filter( 'cornerstone_icon_map', function ($icon_map) {
	$icon_map['csl-button'] = CSL_BUTTON_URL . '/assets/svg/icons.svg';
	return $icon_map;
});
