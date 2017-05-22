<?php

/**
 * Element Controls
 */

return array(
  
  'title' => array(
		'type'    => 'title',
		'suggest' => __( 'Accordion Item', 'cornerstone' ),
	),
	
	'title_extra' => array(
		'type' => 'textarea',
		'ui'   => array(
			'title'   => __( 'Extra Title Content', 'cornerstone' ),
			'tooltip' => __( 'Extra content that will show up next to the title', 'cornerstone' ),
		),
	),
	
	'accordion_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Color of this item', 'cornerstone' ),
			'tooltip' => __( 'Specify the color and background color of your graphic.' ),
		),
	),
	
	'content' => array(
		'type'    => 'editor',
		'context' => 'content',
		'ui' => array(
			'title'   => __( 'Content', 'cornerstone' ),
			'tooltip' => __( 'Include your desired content for your Accordion Item here.' ),
		),
	),
	
	'open' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Starts Open', 'cornerstone' ),
			'tooltip' => __( 'If the Accordion Items are linked, only one can start open.' ),
		),
	),
  
);