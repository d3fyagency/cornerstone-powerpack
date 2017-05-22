<?php

/**
 * Element Controls
 */

return array(
  
  'elements' => array(
		'type'    => 'sortable',
		'options' => array(
			'element' => 'color-accordion-item',
			'newTitle' => __( 'Accordion Item %s', 'cornerstone' ),
			'floor'   => 1,
			'title_field' => 'title'
		),
		'context' => 'content',
		'suggest' => array(
	   	array( 'title' => __( 'Accordion Item 1', 'cornerstone' ) ),
			array( 'title' => __( 'Accordion Item 2', 'cornerstone' ) ),
		)
	),
	
	'link_items' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Link Items (Requires ID)', 'cornerstone' ),
			'tooltip' => __( 'This will make opening one item close the others.', 'cornerstone' ),
		),
	),
  
);