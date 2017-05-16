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