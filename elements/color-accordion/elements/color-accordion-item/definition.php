<?php

/**
 * Element Definition: "Color Accordion Item"
 */

class CSL_Color_Accordion_Item {

	public function ui() {
		return array(
			'title' => __( 'Color Accordion Item', 'cornerstone' )
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
