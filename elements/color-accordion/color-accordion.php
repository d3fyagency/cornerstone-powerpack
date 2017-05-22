<?php if ( ! defined( 'WPINC' ) ) die;

$element_path = '/elements/color-accordion/';
if (!defined('CSL_COLORACCORDION_PATH')) define('CSL_COLORACCORDION_PATH', D3FY_CSPP_PATH.$element_path);
if (!defined('CSL_COLORACCORDION_URL')) define('CSL_COLORACCORDION_URL', D3FY_CSPP_URL.$element_path);

require_once( CSL_COLORACCORDION_PATH . '/includes/classes/color-accordion-manager.php' );

add_action( 'wp_enqueue_scripts', function() {
  $v = '20170521';
	wp_enqueue_style( 'csl-color-accordion', CSL_COLORACCORDION_URL . '/assets/css/custom.css', array(), $v );
});

add_action( 'cornerstone_register_elements', function() {
  cornerstone_remove_element( 'color-accordion' );
  cornerstone_remove_element( 'color-accordion-item' );
	cornerstone_register_element( 'CSL_Color_Accordion', 'color-accordion', CSL_COLORACCORDION_PATH . "/elements/color-accordion" );
	cornerstone_register_element( 'CSL_Color_Accordion_Item', 'color-accordion-item', CSL_COLORACCORDION_PATH . "/elements/color-accordion-item" );
}, 100);

add_filter( 'cornerstone_icon_map', function ($icon_map) {
	$icon_map['color-accordion'] = CSL_COLORACCORDION_URL . '/assets/svg/icons.svg';
	return $icon_map;
});
