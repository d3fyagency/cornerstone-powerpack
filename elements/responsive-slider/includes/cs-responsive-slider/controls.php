<?php

/**
 * Element Controls
 */

return array(

	'elements' => array(
		'type'    => 'sortable',
		'options' => array(
			'element' => 'cs-responsive-slider-item',
			'newTitle' => __( 'Slide %s', 'cs-powerpack' ),
			'floor'   => 1,
			'title_field' => 'heading'
		),
		'context' => 'content',
		'suggest' => array(
			array( 'heading' => __( 'First Slide', 'cs-powerpack' ) ),
			array( 'heading' => __( 'Second Slide', 'cs-powerpack' ) ),
		)
	),
	
	'slider_style' => array(
		'type'    => 'select',
		'ui'      => array(
			'title'   => __( 'Slider Template Style', 'cs-responsive-slider' ),
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'scaled',
					'label' => __( 'Default - Scaled Images and Text', 'cs-responsive-slider' )
				),
				array(
					'value' => 'fullheight',
					'label' => __( 'Full Height - 100% Height, Auto Text', 'cs-responsive-slider' )
				),
			)
		),
	),

	'slider_time' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Slide Duration (1000 = 1 sec.)', 'cs-responsive-slider' ),
			'tooltip' => __( 'The amount of time in milliseconds each slide should remain visible before transitioning to the next one.', 'cs-responsive-slider' ),
		),
	),
	
	'slider_transition' => array(
		'type'    => 'select',
		'ui'      => array(
			'title'   => __( 'Transition Effect', 'cs-responsive-slider' ),
			'tooltip' => __( 'The animation transition effect to use when changing slides.', 'cs-responsive-slider' ),
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'fade',
					'label' => __( 'Fade', 'cs-responsive-slider' )
				),
				array(
					'value' => 'slide',
					'label' => __( 'Scroll - Horizontal', 'cs-responsive-slider' )
				),
			)
		),
	),
	
	'slider_speed' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Animation Speed (1000 = 1 sec.)', 'cs-responsive-slider' ),
			'tooltip' => __( 'The amount of time in milliseconds the transition between each slide should take.', 'cs-responsive-slider' ),
		),
	),

	'prev_next_nav' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Prev/Next Navigation', 'cs-responsive-slider' ),
			'tooltip' => __( 'Select to enable the prev/next navigation, which displays two arrows for you to cycle through the slides in your slider.', 'cs-responsive-slider' ),
		),
	),
	
	'prev_next_nav_position' => array(
		'type'    => 'select',
		'ui'      => array(
			'title'   => __( 'Prev/Next Navigation Position', 'cs-responsive-slider' ),
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'top-right',
					'label' => __( 'Top Right', 'cs-responsive-slider' )
				),
				array(
					'value' => 'btm-right',
					'label' => __( 'Bottom Right', 'cs-responsive-slider' )
				),
				array(
					'value' => 'top-left',
					'label' => __( 'Top Left', 'cs-responsive-slider' )
				),
				array(
					'value' => 'btm-left',
					'label' => __( 'Bottom Left', 'cs-responsive-slider' )
				),
				array(
					'value' => 'split-middle',
					'label' => __( 'Split Horizontal, Middle Vertical', 'cs-responsive-slider' )
				),
			)
		),
	),

	'control_nav' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Control Navigation', 'cs-responsive-slider' ),
			'tooltip' => __( 'Select to enable the control navigation, which displays how many slides you have in your slider.', 'cs-responsive-slider' ),
		),
	),
	
	'control_nav_theme' => array(
		'type'    => 'select',
		'ui'      => array(
			'title'   => __( 'Control Navigation Theme/Color', 'cs-responsive-slider' ),
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'dark',
					'label' => __( 'Dark (black buttons)', 'cs-responsive-slider' )
				),
				array(
					'value' => 'light',
					'label' => __( 'Light (white buttons)', 'cs-responsive-slider' )
				),
			)
		),
	),
	
	'control_nav_position' => array(
		'type'    => 'select',
		'ui'      => array(
			'title'   => __( 'Control Navigation Position', 'cs-responsive-slider' ),
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'top-right',
					'label' => __( 'Top Right', 'cs-responsive-slider' )
				),
				array(
					'value' => 'btm-right',
					'label' => __( 'Bottom Right', 'cs-responsive-slider' )
				),
				array(
					'value' => 'top-left',
					'label' => __( 'Top Left', 'cs-responsive-slider' )
				),
				array(
					'value' => 'btm-left',
					'label' => __( 'Bottom Left', 'cs-responsive-slider' )
				),
				array(
					'value' => 'top-center',
					'label' => __( 'Top Center', 'cs-responsive-slider' )
				),
				array(
					'value' => 'btm-center',
					'label' => __( 'Bottom Center', 'cs-responsive-slider' )
				),
			)
		),
	),
	
	'slider_nav_min' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Hide Navigation Controls if Viewport is Smaller Than (in pixels):', 'cs-responsive-slider' ),
		),
	),

);
