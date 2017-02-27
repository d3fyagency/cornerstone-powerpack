<?php
  
$element_path = '/elements/google-maps-styled/';
if (!defined('CS_GOOGEMAPSSTYLED_PATH')) define('CS_GOOGEMAPSSTYLED_PATH', D3FY_CSPP_PATH.$element_path);
if (!defined('CS_GOOGEMAPSSTYLED_URL')) define('CS_GOOGEMAPSSTYLED_URL', D3FY_CSPP_URL.$element_path);

add_action('wp_enqueue_scripts', 'cs_googlemapsstyled_enqueue');
add_action('cornerstone_register_elements', 'cs_googlemapsstyled_register_elements', 100);
add_filter('cornerstone_icon_map', 'cs_googlemapsstyled_icon_map');

function cs_googlemapsstyled_register_elements() {
	require_once(CS_GOOGEMAPSSTYLED_PATH.'includes/classes/cs-google-maps-styled-manager.php');
	cornerstone_remove_element('cs-google-maps-styled');
	cornerstone_register_element(
		'CS_Google_Maps_Styled', 
		'cs-google-maps-styled', 
		CS_GOOGEMAPSSTYLED_PATH.'includes/cs-google-maps-styled'
	);
	cornerstone_remove_element('cs-google-maps-styled-marker');
	cornerstone_register_element(
		'CS_Google_Maps_Styled_Marker', 
		'cs-google-maps-styled-marker', 
		CS_GOOGEMAPSSTYLED_PATH.'includes/cs-google-maps-styled-marker'
	);
}

function cs_googlemapsstyled_enqueue() {
  $v = '1.0.2';
  // $v = time();
	wp_enqueue_style(
		'cspp-googlemapsstyled-styles', 
		CS_GOOGEMAPSSTYLED_URL . 'assets/styles/cs-googlemapsstyled.css', 
		array(), $v 
	);
}

function cs_googlemapsstyled_icon_map( $icon_map ) {
	$icon_map['google-maps-styled-icon'] = CS_GOOGEMAPSSTYLED_URL . 'assets/svg/google-maps-styled-icon.svg';
	return $icon_map;
}
