<?php

/**
 * Element Definition
 */

class CS_Image_Overlay {

	public function ui() {
		return array(
      'title'       => __( 'Image Overlay', 'cs-image-overlay' ),
      'autofocus' => array(
    		'heading' => 'h4.image-overlay-heading',
    		'content' => '.cs-image-overlay'
    	),
    	'icon_group' => 'cs-image-overlay'
    );
	}

	public function update_build_shortcode_atts( $atts ) {

		// This allows us to manipulate attributes that will be assigned to the shortcode
		// Here we will inject a background-color into the style attribute which is
		// already present for inline user styles
		if ( !isset( $atts['style'] ) ) {
			$atts['style'] = '';
		}


		if ( isset( $atts['background_color'] ) ) {
			$atts['style'] .= ' background-color: ' . $atts['background_color'] . ';';
			unset( $atts['background_color'] );
		}

		return $atts;

	}


}
