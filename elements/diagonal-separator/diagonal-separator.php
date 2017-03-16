<?php
  
$element_path = '/elements/diagonal-separator/';
if (!defined('CS_DIAGONALSEP_PATH')) define('CS_DIAGONALSEP_PATH', D3FY_CSPP_PATH.$element_path);
if (!defined('CS_DIAGONALSEP_URL')) define('CS_DIAGONALSEP_URL', D3FY_CSPP_URL.$element_path);

add_action('wp_enqueue_scripts', 'cs_diagonalsep_enqueue');
add_action('cornerstone_register_elements', 'cs_diagonalsep_register_elements', 100);
add_filter('cornerstone_icon_map', 'cs_diagonalsep_icon_map');

// print('<pre>path: '.CS_DIAGONALSEP_PATH.'includes/cs-diagonal-separator</pre>'); die();

if ( !function_exists( 'cs_diagonalsep_register_elements' ) ) {
	function cs_diagonalsep_register_elements() {
		require_once(CS_DIAGONALSEP_PATH.'includes/classes/cs-diagonalsep-manager.php');
		cornerstone_remove_element('cs-diagonal-separator');
		cornerstone_register_element('CS_Diagonal_Separators', 'cs-diagonal-separator', CS_DIAGONALSEP_PATH.'includes/cs-diagonal-separator');
	}
}

if ( !function_exists( 'cs_diagonalsep_enqueue' ) ) {
	function cs_diagonalsep_enqueue() {
	  $v = '0.1.5';
		wp_enqueue_style( 'cs-diagonalsep-styles', CS_DIAGONALSEP_URL . 'assets/styles/cs-diagonalsep.css', array(), $v );
	}
}

if ( !function_exists( 'cs_diagonalsep_icon_map' ) ) {
	function cs_diagonalsep_icon_map( $icon_map ) {
		$icon_map['section-dividers-icon'] = CS_DIAGONALSEP_URL . 'assets/svg/section-dividers-icon.svg';
		return $icon_map;
	}
}