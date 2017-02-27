<?php

/**
 * Element Controls
 */

return array(

	// content image
	'image' => array(
		'type'    => 'image',
		'ui' => array(
			'title'   => __( 'Upload an Image', 'cs-image-overlay' ),
			'tooltip' => __( 'Select your image.' , 'cs-image-overlay' )
		),
		'context' => 'content',
	),

	// heading text
	'heading' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Heading &amp; Content', 'cs-image-overlay' ),
			'tooltip' => __( 'Title for overlay', 'cs-image-overlay' ),
		),
		'context' => 'content',
    'suggest' => __( 'Heading', 'cs-image-overlay' ),
	),

	// content overlay text
	'text_content' => array(
		'type'    => 'textarea',
		'ui' => array(
			'tooltip' => __( 'Add some text for the overlay', 'cs-image-overlay' ),
		),
		'context' => 'content',
	),

	// align text
	'text_align' => array(
		'type' => 'choose',
		'ui' => array(
			'title' => __( 'Content Text Align', 'cs-image-overlay' ),
			'tooltip' => __( 'Set a text alignment, or deselect to inherit from parent elements.', 'cs-image-overlay' ),
		),
		'options' => array(
			'columns' => '3',
			'offValue' => '',
			'choices' => array(
				array( 'value' => 'l', 'icon' => fa_entity( 'align-left' ),    'tooltip' => __( 'Left', 'cs-image-overlay' ) ),
				array( 'value' => 'c', 'icon' => fa_entity( 'align-center' ),  'tooltip' => __( 'Center', 'cs-image-overlay' ) ),
				array( 'value' => 'r', 'icon' => fa_entity( 'align-right' ),   'tooltip' => __( 'Right', 'cs-image-overlay' ) )
			)
		)
	),

	// content overlay text color
	'text_content_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Text Color', 'cs-image-overlay' )
		)
	),

	'url'=>array(
		'type' => 'text',
		'ui' => array(
			'title' => __( 'Link Url','cs-image-overlay' ) ,
			'tooltip' => __( 'Link to the Image' , 'cs-image-overlay' )
		),
		'suggest' => __( '', 'cs-image-overlay' ),
	),
	'new_tab' => array(
		'type' => 'toggle',
		'ui' => array(
			'title' => __( 'Open Link in new Tab', 'cs-image-overlay' ),
			'tooltip' => __( 'Select On if you want to open Link in new Tab.', 'cs-image-overlay' ),
		),
	),
	
	// animation effect
	'animation_effect' => array(
    'type' => 'select',
    'ui' => array(
        'title' => __('Animation Effect', 'cs-image-overlay'),
        'tooltip' => __('Select a special animation effect.', 'cs-image-overlay'),
    ),
    'options' => array(
        'choices' => array(
            array('value' => 'default', 'label' => __('Default', 'cs-image-overlay')),
            array('value' => 'apollo', 'label' => __('Apollo', 'cs-image-overlay')),
            array('value' => 'bubba', 'label' => __('Bubba', 'cs-image-overlay')),
            array('value' => 'sadie', 'label' => __('Sadie', 'cs-image-overlay')),
            array('value' => 'sarah', 'label' => __('Sarah', 'cs-image-overlay')),
        ),
    ),
    'suggest' => 'medium',
  ),

	// gradient colors
	'gradient_color_start' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Gradient Start Color', 'cs-image-overlay' )
		)
	),
	'gradient_color_end' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Gradient End Color', 'cs-image-overlay' )
		)
	),
	'gradient_color_hover_start' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Gradient Hover Start Color', 'cs-image-overlay' )
		)
	),
	'gradient_color_hover_end' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Gradient Hover End Color', 'cs-image-overlay' )
		)
	),

	// gradient color orientation
	'gradient_orientation' => array(
		'type' => 'choose',
		'ui' => array(
			'title' => __( 'Gradient Direction', 'cs-image-overlay' ),
      'tooltip' => __( 'Choose to display the heading vertically or horizonatally', 'cs-image-overlay' ),
      'divider' => true
		),
		'options' => array(
			'divider' => true,
      'columns' => '2',
      'choices' => array(
        array( 'value' => 'gradient-vertical',   'tooltip' => __( 'Vertical', 'cs-image-overlay' ),   'icon' => fa_entity( 'arrows-v' ) ),
        array( 'value' => 'gradient-horizontal', 'tooltip' => __( 'Horizontal', 'cs-image-overlay' ), 'icon' => fa_entity( 'arrows-h' ) ),
      )
    )
  ),

);
