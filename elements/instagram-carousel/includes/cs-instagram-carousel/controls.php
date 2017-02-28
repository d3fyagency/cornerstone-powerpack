<?php

/**
 * Element Controls
 */

return array(

	'instagram_key' => array(
		'type' => 'text',
		'ui'   => array(
			'title'   => __( 'Instagram Account', 'cs-powerpack' ),
		),
	),
	
	'columns_desktop' => array(
    'type' => 'select',
    'ui' => array(
        'title' => __('Columns (desktop)', 'cs-powerpack'),
    ),
    'options' => array(
        'choices' => array(
            array('value' => '1', 'label' => __('1', 'cs-powerpack')),
            array('value' => '2', 'label' => __('2', 'cs-powerpack')),
            array('value' => '3', 'label' => __('3', 'cs-powerpack')),
            array('value' => '4', 'label' => __('4', 'cs-powerpack')),
            array('value' => '5', 'label' => __('5', 'cs-powerpack')),
            array('value' => '6', 'label' => __('6', 'cs-powerpack')),
            array('value' => '7', 'label' => __('7', 'cs-powerpack')),
            array('value' => '8', 'label' => __('8', 'cs-powerpack')),
            array('value' => '9', 'label' => __('9', 'cs-powerpack')),
            array('value' => '10', 'label' => __('10', 'cs-powerpack')),
            array('value' => '11', 'label' => __('11', 'cs-powerpack')),
            array('value' => '12', 'label' => __('12', 'cs-powerpack')),
        ),
    ),
    'suggest' => '6',
  ),
  
  'minwidth_desktop' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Minimum Width for Desktop (px)', 'cs-instagram-carousel' ),
		),
	),
  
  'columns_mobile' => array(
    'type' => 'select',
    'ui' => array(
        'title' => __('Columns (mobile)', 'cs-powerpack'),
    ),
    'options' => array(
        'choices' => array(
            array('value' => '1', 'label' => __('1', 'cs-powerpack')),
            array('value' => '2', 'label' => __('2', 'cs-powerpack')),
            array('value' => '3', 'label' => __('3', 'cs-powerpack')),
            array('value' => '4', 'label' => __('4', 'cs-powerpack')),
            array('value' => '5', 'label' => __('5', 'cs-powerpack')),
            array('value' => '6', 'label' => __('6', 'cs-powerpack')),
        ),
    ),
    'suggest' => '3',
  ),
  
  'rows_mobile' => array(
    'type' => 'select',
    'condition' => array('carousel' => false),
    'ui' => array(
        'title' => __('Rows (mobile - ignored if carousel enabled)', 'cs-powerpack'),
    ),
    'options' => array(
        'choices' => array(
            array('value' => '1', 'label' => __('1', 'cs-powerpack')),
            array('value' => '2', 'label' => __('2', 'cs-powerpack')),
            array('value' => '3', 'label' => __('3', 'cs-powerpack')),
        ),
    ),
    'suggest' => '6',
  ),
  
  'carousel' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Enable Scrolling Carousel', 'cs-powerpack' ),
		),
	),

	'carousel_time' => array(
		'type'    => 'number',
		'condition' => array('carousel' => true),
		'ui' => array(
			'title'   => __( 'Slide Duration (1000 = 1 sec.)', 'cs-instagram-carousel' ),
			'tooltip' => __( 'The amount of time in milliseconds each slide should remain visible before transitioning to the next one.', 'cs-instagram-carousel' ),
		),
	),
	
	'carousel_speed' => array(
		'type'    => 'number',
		'condition' => array('carousel' => true),
		'ui' => array(
			'title'   => __( 'Animation Speed (1000 = 1 sec.)', 'cs-instagram-carousel' ),
			'tooltip' => __( 'The amount of time in milliseconds the transition between each slide should take.', 'cs-instagram-carousel' ),
		),
	),

);
