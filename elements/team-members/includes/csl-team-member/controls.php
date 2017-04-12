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

	// Color

	'highlight_color' => array(
		'type'    => 'color',
		'ui' => array(
			'title'   => __( 'Highlight Color', 'cs-powerpack' ),
			'tooltip' => __( 'Choose a highlight color.', 'cs-powerpack' ),
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
	)

);