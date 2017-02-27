<?php

/**
 * Element Controls
 */

return array(
	
	'heading' => array(
		'type'    => 'title',
		'suggest' => __( 'Map Marker', 'cs-powerpack' ),
	),
	
	'marker_latitude' => array(
		'type' => 'text',
		'ui'   => array(
			'title'   => __( 'Marker Latitude (center)', 'cs-powerpack' ),
		),
	),
	
	'marker_longitude' => array(
		'type' => 'text',
		'ui'   => array(
			'title'   => __( 'Marker Longitude (center)', 'cs-powerpack' ),
		),
	),
	
	'marker_text' => array(
		'type' => 'text',
		'ui'   => array(
			'title'   => __( 'Marker Text', 'cs-powerpack' ),
			'tooltip' => __( 'https://developers.google.com/maps/documentation/geocoding/get-api-key', 'cs-powerpack' ),
		),
	),
	
	'marker_open' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Start Open', 'cs-powerpack' ),
		),
	),
	
	'marker_image' => array(
		'type' => 'image',
		'ui'   => array(
			'title'   => __( 'Marker Icon/Image', 'cs-powerpack' ),
		)
	),

);