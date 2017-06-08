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

define( 'CS_WOOCOMMERCE_PRODUCT_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'CS_WOOCOMMERCE_PRODUCT_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

/* Add element to Cornerstone */
add_action( 'cornerstone_register_elements', 'cspp_register_woocommerce_product_elements', 100 );

if ( !function_exists( 'cspp_register_woocommerce_product_elements' ) ) {
	function cspp_register_woocommerce_product_elements() {
		cornerstone_remove_element( 'cs-woocommerce-product' );
		cornerstone_register_element(
			'CSL_Woocommerce_Product',
			'cs-woocommerce-product',
			CS_WOOCOMMERCE_PRODUCT_PATH . '/includes/csl-woocommerce-product'
		);
	}
}
