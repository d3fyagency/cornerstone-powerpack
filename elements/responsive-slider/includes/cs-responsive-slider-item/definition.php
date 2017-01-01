<?php

/**
 * Element Definition: "Responsive Slider Item"
 */

class CS_Responsive_Slider_Item {

	public function ui() {
		return array(
			'title' => __( 'Responsive Slider Item', 'cs-responsive-slider' )
		);
	}

	public function flags() {
		return array(
      	'child' => true
		);
	}

	public function update_build_shortcode_atts( $atts, $parent ) {
		if ( ! is_null( $parent ) ) {
			$atts['linked'] = $parent['linked'];
		}
		return $atts;
	}

}
