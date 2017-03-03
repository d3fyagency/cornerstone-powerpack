<?php

/**
 * Element Controls
 */

return array(

	'heading' => array(
		'type'    => 'title',
		'suggest' => __( 'Sortable Item', 'cs-responsive-slider' ),
	),

	'slider_image' => array(
		'type' => 'image',
		'ui'   => array(
			'title'   => __( 'Main Slider Image / Background', 'cs-responsive-slider' ),
			'tooltip' => __( 'Select your background image.', 'cs-responsive-slider' ),
		)
	),

	'slider_image_alt' => array(
		'type' => 'text',
		'ui'   => array(
			'title'   => __( 'Add image alt text', 'cs-responsive-slider' ),
			'tooltip' => __( 'Add alternative text for screen readers', 'cs-responsive-slider' ),
			'divider' => 1,
		),
	),
	
	/*------------------------------------------------------------------*/
	
	'content' => array(
		'type'    => 'editor',
		'context' => 'content',
	),
	
	'content_show_min' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Hide Content Block Above if Viewport Smaller Than (in pixels):', 'cs-responsive-slider' ),
			'tooltip' => __( 'Hide content block if viewport is smaller than X (in pixels).', 'cs-responsive-slider' ),
		),
	),
	
	'overlay_bg_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Content Overlay Background Color', 'my-extension' )
		)
	),
	
	'overlay_padding' => array(
		'type'    => 'select',
		'ui'      => array(
			'title'   => __( 'Content Overlay Padding (all sides)', 'cs-responsive-slider' ),
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'none',
					'label' => __( 'None (no padding)', 'cs-responsive-slider' )
				),
				array(
					'value' => 'small',
					'label' => __( 'Small Padding', 'cs-responsive-slider' )
				),
				array(
					'value' => 'medium',
					'label' => __( 'Medium Padding', 'cs-responsive-slider' )
				),
				array(
					'value' => 'large',
					'label' => __( 'Large Padding', 'cs-responsive-slider' )
				),
				array(
					'value' => 'xlarge',
					'label' => __( 'X-Large Padding', 'cs-responsive-slider' )
				),
			)
		)
	),
	
	'overlay_text_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Content Overlay Text Color', 'my-extension' )
		)
	),
	
	'overlay_text_size' => array(
		'type'    => 'select',
		'ui'      => array(
			'title'   => __( 'Base Overlay Text Size', 'cs-responsive-slider' ),
			'tooltip' => __( 'Base text size, responds to viewport size', 'cs-responsive-slider' ),
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'xsmall',
					'label' => __( 'X-Small', 'cs-responsive-slider' )
				),
				array(
					'value' => 'small',
					'label' => __( 'Small', 'cs-responsive-slider' )
				),
				array(
					'value' => 'medium-small',
					'label' => __( 'Medium-Small', 'cs-responsive-slider' )
				),
				array(
					'value' => 'medium',
					'label' => __( 'Medium', 'cs-responsive-slider' )
				),
				array(
					'value' => 'medium-large',
					'label' => __( 'Medium Large', 'cs-responsive-slider' )
				),
				array(
					'value' => 'large',
					'label' => __( 'Large', 'cs-responsive-slider' )
				),
				array(
					'value' => 'xlarge',
					'label' => __( 'X-Large', 'cs-responsive-slider' )
				),
			)
		)
	),
	
	'overlay_lineheight' => array(
		'type'    => 'select',
		'ui'      => array(
			'title'   => __( 'Base Overlay Line Height', 'cs-responsive-slider' ),
			'tooltip' => __( 'Base text size, responds to viewport size', 'cs-responsive-slider' ),
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'xtight',
					'label' => __( 'X-Tight (.85em)', 'cs-responsive-slider' )
				),
				array(
					'value' => 'tight',
					'label' => __( 'Tight (1em)', 'cs-responsive-slider' )
				),
				array(
					'value' => 'regular',
					'label' => __( 'Regular (1.15em)', 'cs-responsive-slider' )
				),
				array(
					'value' => 'loose',
					'label' => __( 'Loose (1.25em)', 'cs-responsive-slider' )
				),
				array(
					'value' => 'xloose',
					'label' => __( 'Huge (1.5em)', 'cs-responsive-slider' )
				),
			)
		)
	),
	
	'overlay_text_align' => array(
		'type'    => 'select',
		'ui'      => array(
			'title'   => __( 'Overlay Content Alignment', 'cs-responsive-slider' ),
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'center',
					'label' => __( 'center', 'cs-responsive-slider' )
				),
				array(
					'value' => 'left',
					'label' => __( 'left', 'cs-responsive-slider' )
				),
				array(
					'value' => 'right',
					'label' => __( 'right', 'cs-responsive-slider' )
				),
			)
		)
	),
	
	'overlay_width' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Overlay Width (percent)', 'cs-responsive-slider' ),
			'tooltip' => __( 'Overlay width, in percentage of slide width.', 'cs-responsive-slider' ),
		),
	),
	
	'overlay_offset_x' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Overlay Horizontal Offset (percent)', 'cs-responsive-slider' ),
			'tooltip' => __( 'Horizontal Offset of text layer, in percentage of slide width.', 'cs-responsive-slider' ),
		),
	),
	
	'overlay_offset_x_from' => array(
		'type'    => 'select',
		'ui'      => array(
			'title'   => __( 'Horizontal Offset From', 'cs-responsive-slider' ),
			'tooltip' => __( 'From which side should the horizontal offset be calculated?', 'cs-responsive-slider' ),
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'right',
					'label' => __( 'Right Edge', 'cs-responsive-slider' )
				),
				array(
					'value' => 'left',
					'label' => __( 'Left Edge', 'cs-responsive-slider' )
				),
			)
		)
	),
	
	'overlay_offset_y' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Overlay Vertical Offset (percent)', 'cs-responsive-slider' ),
			'tooltip' => __( 'Vertical Offset of text layer, in percentage of slide width.', 'cs-responsive-slider' ),
		),
	),
	
	'overlay_offset_y_from' => array(
		'type'    => 'select',
		'ui'      => array(
			'title'   => __( 'Vertical Offset From', 'cs-responsive-slider' ),
			'tooltip' => __( 'From which edge should the vertical offset be calculated?', 'cs-responsive-slider' ),
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'top',
					'label' => __( 'Top Edge', 'cs-responsive-slider' )
				),
				array(
					'value' => 'bottom',
					'label' => __( 'Bottom Edge', 'cs-responsive-slider' )
				),
			),
		),
	),
	
	'content_btm_padding' => array(
		'type'    => 'select',
		'ui'      => array(
			'title'   => __( 'Text Content Block Bottom Padding', 'cs-responsive-slider' ),
			'divider' => 1,
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'none',
					'label' => __( 'None (no padding)', 'cs-responsive-slider' )
				),
				array(
					'value' => 'small',
					'label' => __( 'Small Padding', 'cs-responsive-slider' )
				),
				array(
					'value' => 'medium',
					'label' => __( 'Medium Padding', 'cs-responsive-slider' )
				),
				array(
					'value' => 'large',
					'label' => __( 'Large Padding', 'cs-responsive-slider' )
				),
				array(
					'value' => 'xlarge',
					'label' => __( 'X-Large Padding', 'cs-responsive-slider' )
				),
			)
		)
	),
	
	/*------------------------------------------------------------------*/
	
	'logo_include' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Include Logo/Image Above Content?', 'cs-responsive-slider' ),
		),
	),
	
	'logo_image' => array(
		'type' => 'image',
		'condition' => array( 'logo_include' => true ),
		'ui'   => array(
			'title'   => __( 'Logo / Image File', 'cs-responsive-slider' ),
			'tooltip' => __( 'Select your logo image.', 'cs-responsive-slider' ),
		)
	),

	'logo_image_alt' => array(
		'type' => 'text',
		'condition' => array( 'logo_include' => true ),
		'ui'   => array(
			'title'   => __( 'Logo / Image Alt Text', 'cs-responsive-slider' ),
			'tooltip' => __( 'Add alternative text for screen readers', 'cs-responsive-slider' ),
		),
	),
	
	'logo_max_width' => array(
		'type'    => 'number',
		'condition' => array( 'logo_include' => true ),
		'ui' => array(
			'title'   => __( 'Logo / Image Max Width (percent)', 'cs-responsive-slider' ),
			'tooltip' => __( 'Logo / Image max width (percentage of text overlay block width)', 'cs-responsive-slider' ),
		),
	),
	
	'logo_btm_padding' => array(
		'type'    => 'select',
		'condition' => array( 'logo_include' => true ),
		'ui'      => array(
			'title'   => __( 'Logo Block Bottom Padding', 'cs-responsive-slider' ),
			'divider' => 1,
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'none',
					'label' => __( 'None (no padding)', 'cs-responsive-slider' )
				),
				array(
					'value' => 'small',
					'label' => __( 'Small Padding', 'cs-responsive-slider' )
				),
				array(
					'value' => 'medium',
					'label' => __( 'Medium Padding', 'cs-responsive-slider' )
				),
				array(
					'value' => 'large',
					'label' => __( 'Large Padding', 'cs-responsive-slider' )
				),
				array(
					'value' => 'xlarge',
					'label' => __( 'X-Large Padding', 'cs-responsive-slider' )
				),
			)
		)
	),
	
	/*------------------------------------------------------------------*/
	
	'header_include' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Include Header Text Above Content?', 'cs-responsive-slider' ),
		),
	),
	
	'header_text' => array(
		'type' => 'text',
		'condition' => array( 'header_include' => true ),
		'ui'   => array(
			'title'   => __( 'Headline Text', 'cs-responsive-slider' ),
			'tooltip' => __( 'Header Text - above normal text content', 'cs-responsive-slider' ),
		),
	),
	
	'header_btm_padding' => array(
		'type'    => 'select',
		'condition' => array( 'header_include' => true ),
		'ui'      => array(
			'title'   => __( 'Header Block Bottom Padding', 'cs-responsive-slider' ),
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'none',
					'label' => __( 'None (no padding)', 'cs-responsive-slider' )
				),
				array(
					'value' => 'small',
					'label' => __( 'Small Padding', 'cs-responsive-slider' )
				),
				array(
					'value' => 'medium',
					'label' => __( 'Medium Padding', 'cs-responsive-slider' )
				),
				array(
					'value' => 'large',
					'label' => __( 'Large Padding', 'cs-responsive-slider' )
				),
				array(
					'value' => 'xlarge',
					'label' => __( 'X-Large Padding', 'cs-responsive-slider' )
				),
			)
		)
	),
	
	'header_text_color' => array(
	 	'type' => 'color',
	 	'condition' => array( 'header_include' => true ),
	 	'ui' => array(
			'title'   => __( 'Headline Text Color', 'my-extension' )
		)
	),
	
	'header_text_size' => array(
		'type'    => 'select',
		'condition' => array( 'header_include' => true ),
		'ui'      => array(
			'title'   => __( 'Headline Text Size', 'cs-responsive-slider' ),
			'tooltip' => __( 'Headline text size, relative to base text size', 'cs-responsive-slider' ),
			'divider' => 1,
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'small',
					'label' => __( 'Small', 'cs-responsive-slider' )
				),
				array(
					'value' => 'medium-small',
					'label' => __( 'Medium-Small', 'cs-responsive-slider' )
				),
				array(
					'value' => 'medium',
					'label' => __( 'Medium', 'cs-responsive-slider' )
				),
				array(
					'value' => 'medium-large',
					'label' => __( 'Medium Large', 'cs-responsive-slider' )
				),
				array(
					'value' => 'large',
					'label' => __( 'Large', 'cs-responsive-slider' )
				),
				array(
					'value' => 'xlarge',
					'label' => __( 'X-Large', 'cs-responsive-slider' )
				),
			)
		)
	),
	
	/*------------------------------------------------------------------*/
	
	'btn_include' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Include Link Button Below Content?', 'cs-responsive-slider' ),
		),
	),
	
	'btn_link_url' => array(
		'type'    => 'text',
		'condition' => array( 'btn_include' => true ),
		'ui'      => array(
			'title'   => __( 'Button Link URL', 'cs-responsive-slider' ),
			'tooltip' => __( 'Link to the Image', 'cs-responsive-slider' )
		),
	),
	
	'btn_text' => array(
		'type' => 'text',
		'condition' => array( 'btn_include' => true ),
		'ui'   => array(
			'title'   => __( 'Button Link Text', 'cs-responsive-slider' ),
			'tooltip' => __( 'Add text for slide button', 'cs-responsive-slider' ),
		),
	),
	
	'btn_class' => array(
		'type'    => 'text',
		'condition' => array( 'btn_include' => true ),
		'ui'      => array(
			'title'   => __( 'Button CSS Class', 'cs-responsive-slider' ),
			'tooltip' => __( 'CSS Class from theme used to style button', 'cs-responsive-slider' )
		),
	),
	
	'btn_btm_padding' => array(
		'type'    => 'select',
		'condition' => array( 'btn_include' => true ),
		'ui'      => array(
			'title'   => __( 'Button Block Bottom Padding', 'cs-responsive-slider' ),
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'none',
					'label' => __( 'None (no padding)', 'cs-responsive-slider' )
				),
				array(
					'value' => 'small',
					'label' => __( 'Small Padding', 'cs-responsive-slider' )
				),
				array(
					'value' => 'medium',
					'label' => __( 'Medium Padding', 'cs-responsive-slider' )
				),
				array(
					'value' => 'large',
					'label' => __( 'Large Padding', 'cs-responsive-slider' )
				),
				array(
					'value' => 'xlarge',
					'label' => __( 'X-Large Padding', 'cs-responsive-slider' )
				),
			)
		)
	),
	
	'btn_target_new' => array(
		'type' => 'toggle',
		'condition' => array( 'btn_include' => true ),
		'ui'   => array(
			'title'   => __( 'Open Link in new Tab', 'cs-image-overlay' ),
			'tooltip' => __( 'Select On if you want to open Link in new Tab.', 'cs-image-overlay' ),
		),
	),

);
