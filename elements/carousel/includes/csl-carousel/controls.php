<?php

/**
 * Element Controls: CSL Carousel
 */

return array(

	// Max Items

	'max_visible_items' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Max visible items', 'cs-powerpack' ),
			'tooltip' => __( 'Carousel will automatically show less items to fit smaller screens. Limit the max amount here.', 'cs-powerpack' ),
		),
    'suggest' => __( '3', 'cs-powerpack' ),
	),

	// Slide by number of items

	'slide_by' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Slide to no. of items', 'cs-powerpack' ),
			'tooltip' => __( 'Carousel will move based on what is specified here.', 'cs-powerpack' ),
		),
		'suggest' => __( '3', 'cs-powerpack' ),
	),
	
	// Make Responsive

	'make_responsive' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Responsive', 'cs-powerpack' ),
			'tooltip' => __( 'Make max visible and slide by controls responsive (best guess)', 'cs-powerpack' ),
		)
	),

	// Auto Play

	'auto_play' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Auto Play', 'cs-powerpack' ),
			'tooltip' => __( 'Will automatically play the carousel', 'cs-powerpack' ),
		)
	),
	
	// Auto Play Speed
	
	'auto_play_speed' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Auto Play Speed (seconds)', 'cs-powerpack' ),
			'tooltip' => __( 'Will automatically play the carousel item at this speed (in seconds, minimum speed of 1 second)', 'cs-powerpack' ),
		),
		'suggest' => __( '5', 'cs-powerpack' ),
	),

	// Loop (instead of rewind)

	'loop' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Loop', 'cs-powerpack' ),
			'tooltip' => __( 'Instead of rewinding at the end, simulate eternal looping.', 'cs-powerpack' ),
		)
	),

	// Auto Vertial Align

	'auto_valign' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Automatically Center Items?', 'cs-powerpack' ),
			'tooltip' => __( 'Will auto center vertically and horizontally', 'cs-powerpack' ),
		)
	),

	// Pause on Hover

	'pause_hover' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Pause on Hover?', 'cs-powerpack' ),
			'tooltip' => __( 'Will pause the carousel when the user hovers their mouse over it.', 'cs-powerpack' ),
		)
	),

	// Pagination Type

	'pagination_type' => array(
		'type' => 'select',
		'ui'   => array(
			'title' => __( 'Navigation & Pagination', 'cs-powerpack' ),
      'tooltip' => __( 'Select the pagination style.', 'cs-powerpack' ),
		),
		'options' => array(
			'choices' => array(
        array( 'value' => 'none',        'label' => __( 'None', 'cs-powerpack' ) ),
        // array( 'value' => 'dots',        'label' => __( 'Dots Only', 'cs-powerpack' ) ),
        // array( 'value' => 'dots_nav',    'label' => __( 'Dots and Prev/Next', 'cs-powerpack' ) ),
        // array( 'value' => 'numbers',     'label' => __( 'Numbers Only', 'cs-powerpack' ) ),
        // array( 'value' => 'numbers_nav', 'label' => __( 'Numbers and Prev/Next', 'cs-powerpack' ) ),
        array( 'value' => 'prev_next',   'label' => __( 'Prev/Next Only', 'cs-powerpack' ) )
      ),
		),
	),

	

	// Carousel Items

	'elements' => array(
		'type' => 'sortable',
		'options' => array(
			'element' => 'csl-carousel-item',
			'newTitle' => __('Carousel Item %s', 'cs-powerpack'),
			'floor' => 2,
			'capacity' => 100,
			'title_field' => 'heading'
		),
		'context' => 'content',
		'suggest' => array(
			array( 'heading' => __('Carousel Item 1', 'cs-powerpack') ),
			array( 'heading' => __('Carousel Item 2', 'cs-powerpack') ),
			array( 'heading' => __('Carousel Item 3', 'cs-powerpack') ),
		)
	)

);