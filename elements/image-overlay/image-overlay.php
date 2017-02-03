<?php

/*
Plugin Name: Image Overlay for Cornerstone
Description: Displays an image with gradient and content overlays
Author: D3FY Development
Author URI: https://d3fy.com
Version: 0.1.1
*/

define( 'CS_IMAGEOVERLAY_PATH', plugin_dir_path( __FILE__ ) );
define( 'CS_IMAGEOVERLAY_URL', plugin_dir_url( __FILE__ ) );

add_action( 'wp_enqueue_scripts', 'cs_imageoverlay_enqueue' );
add_action( 'cornerstone_register_elements', 'cs_imageoverlay_register_elements' );
add_filter( 'cornerstone_icon_map', 'cs_imageoverlay_icon_map' );

function cs_imageoverlay_register_elements() {

	cornerstone_register_element( 'CS_Image_Overlay', 'cs-image-overlay', CS_IMAGEOVERLAY_PATH . 'includes/cs-image-overlay' );

}

function cs_imageoverlay_enqueue() {
	wp_enqueue_style( 'cs_imageoverlay-styles', CS_IMAGEOVERLAY_URL . '/assets/styles/cs-imageoverlay.css', array(), '0.1.0' );
}

function cs_imageoverlay_icon_map( $icon_map ) {
	$icon_map['cs-image-overlay'] = CS_IMAGEOVERLAY_URL . '/assets/svg/icons.svg';
	return $icon_map;
}

/**
 * Construct cross-browser gradient styles
 * @param  string $start Hex/hsl gradient start value
 * @param  string $end   Hex/hsl gradient end value
 * @param  string $end   Gradient direction - vertical/horizontal
 * @return string        concatenated string of vendor prefixed gradients
 */
function cs_build_gradient ( $start, $end, $orientation ) {

	// set a default fallback
	$gradient_color = sprintf('background: %s;', $start );

	$prefixes = array('-webkit-linear-gradient','-o-linear-gradient','-moz-linear-gradient','linear-gradient');
	$prefix_directions = array('left','right','right','to right');

	foreach ( $prefixes as $key => $prefix ) {

			if ( 'gradient-horizontal' == $orientation) {
				$gradient_color .= sprintf('background: %s( %s, %s, %s );', $prefix, $prefix_directions[ $key ], $start, $end );
			} else {
				$gradient_color .= sprintf('background: %s( %s, %s );', $prefix, $start, $end );
			}
	}

	return $gradient_color;

}
