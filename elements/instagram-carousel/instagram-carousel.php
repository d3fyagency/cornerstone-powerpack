<?php
	
$element_path = '/elements/instagram-carousel/';
if (!defined('CS_INSTAGRAMCAROUSEL_PATH')) define('CS_INSTAGRAMCAROUSEL_PATH', D3FY_CSPP_PATH.$element_path);
if (!defined('CS_INSTAGRAMCAROUSEL_URL')) define('CS_INSTAGRAMCAROUSEL_URL', D3FY_CSPP_URL.$element_path);

// register element
if (!function_exists('cs_instagramcarousel_register_elements')) {
	require_once(CS_INSTAGRAMCAROUSEL_PATH.'includes/classes/cs-instagram-carousel-manager.php');
	function cs_instagramcarousel_register_elements() {
		cornerstone_remove_element('cs-instagram-carousel');
		cornerstone_register_element('CS_Instagram_Carousel', 'cs-instagram-carousel', CS_INSTAGRAMCAROUSEL_PATH.'includes/cs-instagram-carousel');
	}
}
add_action('cornerstone_register_elements', 'cs_instagramcarousel_register_elements');

// enqueue scripts and styles
if (!function_exists('cs_instagramcarousel_enqueue')) {
	function cs_instagramcarousel_enqueue() {
	  $v = '0.1.6';
	  $v = time();
		wp_enqueue_style(
			'cs-instagramcarousel-styles', 
			CS_INSTAGRAMCAROUSEL_URL.'assets/styles/cs-instagramcarousel.css', 
			array(), $v
		);
	}
}
add_action('wp_enqueue_scripts', 'cs_instagramcarousel_enqueue');

// register element icon
if (!function_exists('cs_instagramcarousel_icon_map')) {
	function cs_instagramcarousel_icon_map( $icon_map ) {
		$icon_map['cs-imageslider'] = CS_INSTAGRAMCAROUSEL_URL . 'assets/svg/icons.svg';
		return $icon_map;
	}
}
add_filter('cornerstone_icon_map', 'cs_instagramcarousel_icon_map');
