<?php

/**
 * Element Controls: Team Member
 */

return array(
	// Name

	'name' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Name', 'cs-powerpack' ),
			'tooltip' => __( 'Enter team member\'s name.', 'cs-powerpack' ),
		)
	),

	// Title

	'job_title' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Job Title', 'cs-powerpack' ),
			'tooltip' => __( 'Enter team member\'s job title.', 'cs-powerpack' ),
		)
	),

	//Layout

	'layout' => array(
		'type' => 'select',
		'ui' => array(
			'title' => __('Layout', 'cs-powerpack'),
			'tooltip' => __('The layout for this team member\'s box', 'cs-powerpack')
		),
		'options' => array(
			'choices' => array(
				array('value' => 'no-popup', 'label' => __('No Popup', 'cs-powerpack')),
				array('value' => 'details-slideup', 'label' => __('Details Slideup', 'cs-powerpack')),
				array('value' => 'flip-card', 'label' => __('Flip Card', 'cs-powerpack')),
				array('value' => 'x-theme-style', 'label' => __('X-theme Style', 'cs-powerpack')),
				array('value' => 'default', 'label' => __('Default', 'cs-powerpack')),
			)
		),
		'suggest' => 'default'
	),

	// Box width

	'box_width' => array(
		'condition' => array('layout' => 'flip-card'),
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Flipcard Box Width', 'cs-powerpack' ),
			'tooltip' => __( 'Enter the width of the box (e.g. 300px or 100%). Only works with flip-card layout.', 'cs-powerpack' ),
		)
	),

	// Box height

	'box_height' => array(
		'condition' => array('layout' => 'flip-card'),
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Flipcard Box Height', 'cs-powerpack' ),
			'tooltip' => __( 'Enter the height of the box (e.g. 300px or 100%). Only works with flip-card layout.', 'cs-powerpack' ),
		)
	),

	// Back Background Color
	'flipcard_back_color' => array(
		'condition' => array('layout' => 'flip-card'),
		'type'    => 'color',
		'ui' => array(
			'title'   => __( 'Flipcard Back Background', 'cs-powerpack' ),
			'tooltip' => __( 'Choose a background color for the flipcard\'s back.', 'cs-powerpack' ),
		)
	),

	// Color

	'highlight_color' => array(
		'type'    => 'color',
		'ui' => array(
			'title'   => __( 'Highlight Color', 'cs-powerpack' ),
			'tooltip' => __( 'Choose a highlight color.', 'cs-powerpack' ),
		)
	),

	// name font size

	'name_font_size' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Name Font Size', 'cs-powerpack' ),
			'tooltip' => __( 'Set the font size of the team member\'s name (e.g. 12px or 1em).', 'cs-powerpack' ),
		)
	),

	// title font size

	'title_font_size' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Title Font Size', 'cs-powerpack' ),
			'tooltip' => __( 'Set the font size of the team member\'s title (e.g. 12px or 1em).', 'cs-powerpack' ),
		)
	),

	// description font size

	'desc_font_size' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Description Font Size', 'cs-powerpack' ),
			'tooltip' => __( 'Set the font size of the team member\'s description text (e.g. 12px or 1em).', 'cs-powerpack' ),
		)
	),

	// description font size

	'social_logo_font_size' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Social Logo Font Size', 'cs-powerpack' ),
			'tooltip' => __( 'Set the font size of each of the team member\'s social network logo (e.g. 12px or 1em).', 'cs-powerpack' ),
		)
	),

	// description font size

	'social_logo_color' => array(
		'type'    => 'color',
		'ui' => array(
			'title'   => __( 'Social Logo Color', 'cs-powerpack' ),
			'tooltip' => __( 'Set the color of each of the team member\'s social network logo', 'cs-powerpack' ),
		)
	),

	// Image

	'member_image' => array(
		'type'    => 'image',
		'ui' => array(
			'title'   => __( 'Team Member Image', 'cs-powerpack' ),
			'tooltip' => __( 'Choose an image.', 'cs-powerpack' ),
		)
	),

	// View Profile custom text

	'custom_open_text' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __( 'Alternate \'View Profile\' text', 'cs-powerpack' ),
			'tooltip' => __( 'Default will be \'View Profile\'.', 'cs-powerpack' ),
		)

	),

	// Content

	'member_content' => array(
		'type' => 'editor',
		'context' => 'content',
	),

	// Social - Facebook

	'social_facebook' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __( 'Facebook Profile URL', 'cs-powerpack' ),
		)
	),

	// Social - Twitter

	'social_twitter' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __( 'Twitter Profile URL', 'cs-powerpack' ),
		)
	),

	// Social - LinkedIn

	'social_linkedin' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __( 'LinkedIn Profile URL', 'cs-powerpack' ),
		)
	),

	// Social - Google+

	'social_gplus' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __( 'Google+ Profile URL', 'cs-powerpack' ),
		)
	),

	// Social - Instagram

	'social_instagram' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __( 'Instagram Profile URL', 'cs-powerpack' ),
		)
	),

	// Social - Pinterest

	'social_pinterest' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __( 'Pinterest Profile URL', 'cs-powerpack' ),
		)
	),

	// Social - YouTube

	'social_youtube' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __( 'YouTube Channel URL', 'cs-powerpack' ),
		)
	),

);
