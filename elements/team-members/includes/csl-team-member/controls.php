<?php

/**
 * Element Controls: Team Member
 */

return array(

	// Name

	'name' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Name', csl18n() ),
			'tooltip' => __( 'Enter team member\'s name.', csl18n() ),
		)
	),

	// Title

	'job_title' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Job Title', csl18n() ),
			'tooltip' => __( 'Enter team member\'s job title.', csl18n() ),
		)
	),

	// Color

	'highlight_color' => array(
		'type'    => 'color',
		'ui' => array(
			'title'   => __( 'Highlight Color', csl18n() ),
			'tooltip' => __( 'Choose a highlight color.', csl18n() ),
		)
	),

	// Image

	'member_image' => array(
		'type'    => 'image',
		'ui' => array(
			'title'   => __( 'Team Member Image', csl18n() ),
			'tooltip' => __( 'Choose an image.', csl18n() ),
		)
	),

	// View Profile custom text

	'custom_open_text' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __( 'Alternate \'View Profile\' text', csl18n() ),
			'tooltip' => __( 'Default will be \'View Profile\'.', csl18n() ),
		)

	),

	// Content

	'member_content' => array(
		'type' => 'editor',
		'context' => 'content',
	)

);