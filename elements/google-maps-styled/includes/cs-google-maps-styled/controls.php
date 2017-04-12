<?php

/**
 * Element Controls
 */

return array(
	
	'elements' => array(
		'type'    => 'sortable',
		'options' => array(
			'element' => 'cs-google-maps-styled-marker',
			'newTitle' => __( 'Marker %s', 'cs-powerpack' ),
			'floor'   => 1,
			'title_field' => 'heading'
		),
		'context' => 'content',
		'suggest' => array(
	   	array( 'heading' => __( 'Marker 1', 'cs-powerpack' ) ),
		)
	),
	
	'google_api_key' => array(
		'type' => 'text',
		'ui'   => array(
			'title'   => __( 'Google API Key', 'cs-powerpack' ),
			'tooltip' => __( 'https://developers.google.com/maps/documentation/geocoding/get-api-key', 'cs-powerpack' ),
		),
	),
	
	'map_latitude' => array(
		'type' => 'text',
		'ui'   => array(
			'title'   => __( 'Map Latitude (center)', 'cs-powerpack' ),
		),
	),
	
	'map_longitude' => array(
		'type' => 'text',
		'ui'   => array(
			'title'   => __( 'Map Longitude (center)', 'cs-powerpack' ),
		),
	),
	
	'map_zoom' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Zoom (0 - 20)', 'cs-powerpack' ),
		),
	),
	
	'map_zoom_control' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Zoom Control', 'cs-powerpack' ),
		),
	),
	
	'map_zoom_lock' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Disable Zoom Until Click', 'cs-powerpack' ),
		),
	),
	
	'map_draggable' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Draggable', 'cs-powerpack' ),
		),
	),
	
	'map_height' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Map Height (include units)', 'cs-powerpack' ),
		),
	),
	
	'map_style_json' => array(
		'type' => 'textarea',
		'context' => 'content',
		'ui'   => array(
			'title'   => __( 'Map Style JSON', 'cs-powerpack' ),
			'tooltip' => __( 'https://mapstyle.withgoogle.com/', 'cs-powerpack' ),
		),
	),

);
