<?php

/**
 * Element Definition: "Google Map - Styled - Marker"
 */

class CS_Google_Maps_Styled_Marker {

	public function ui() {
		return array(
      'title'       => __( 'Google Map - Styled - Marker', 'cs-powerpack' ),
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
