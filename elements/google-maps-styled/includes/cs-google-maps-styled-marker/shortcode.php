<?php

/**
 * Shortcode definition
 */

$ElementAdmin = CSGoogleMapStyledManager::getInstance();
$map_count = $ElementAdmin->getCurrentElementCount();
$marker_count = $ElementAdmin->getNewElementItemCount();

$js_params = array(
  'lat'        => ( $marker_latitude    != '' )	? (float) $marker_latitude : 0,
  'lng'        => ( $marker_longitude   != '' ) ? (float) $marker_longitude : 0,
  'markerInfo' => ( $marker_text  			!= '' )	? cs_decode_shortcode_attribute( $marker_text ) : '',
  'startOpen'	 => ( 'true' 							== $marker_open ),
  'title'			 => ( $heading						!= '' ) ? cs_decode_shortcode_attribute( $heading ) : '',
);

if ( is_numeric( $marker_image ) ) {
  $image_info         = wp_get_attachment_image_src( $marker_image, 'full' );
  $js_params['image'] = $image_info[0];
} else if ( $marker_image != '' ) {
  $js_params['image'] = $marker_image;
}

$ElementAdmin->addElementItem( $js_params, $marker_count );
