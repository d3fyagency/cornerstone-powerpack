<?php

$handle = 'cs-powerpack';

return array(
	'modalcontent' => array(
		'type'    => 'editor',
        'context' => 'content',
        'expandable' => false,
		'ui' => array(
		    'title' => __( 'Modal Content', $handle ),
			'tooltip' => __( 'Content that will display in modal popup.', $handle ),
		)
	),

	'display_on' => array(
		'type'    => 'select',
        'context' => 'content',
		'ui' => array(
	    	'title' => __( 'Display Modal On', $handle ),
			'tooltip' => __( 'When should the popup be initiated.', $handle ),
		),
		'options' => array(
	        'choices' => array(
	            array( 'value' => 'button',  'label' => __( 'Button', $handle ) ),
	            array( 'value' => 'element', 'label' => __( 'Element Click', $handle ) ),
	            array( 'value' => 'load', 'label' => __( 'Page Load', $handle ) )
	        )
		)
	),

	'button_size' => array(
		'type'    => 'select',
        'context' => 'content',
        'suggest' => __( 'Click Me', $handle ),
		'ui' => array(
	    	'title' => __( 'Button Size', $handle ),
			'tooltip' => __( 'How big of a button would you like?', $handle ),
		),
		'options' => array(
	        'choices' => array(
	            array( 'value' => 'default',  'label' => __( 'Theme Default', $handle ) ),
	            array( 'value' => 'x-btn-small', 'label' => __( 'Small', $handle ) ),
	            array( 'value' => 'x-btn-medium', 'label' => __( 'Medium', $handle ) ),
	            array( 'value' => 'x-btn-large', 'label' => __( 'Large', $handle ) ),
	        ),
        ),
        'condition' => array(
            'display_on' => 'button'
        )
	),

	'button_text' => array(
		'type'    => 'text',
        'context' => 'content',
        'suggest' => __( 'Click Me', $handle ),
		'ui' => array(
	    	'title' => __( 'Button Text', $handle ),
			'tooltip' => __( 'Provide a title for this button', $handle ),
		),
        'condition' => array(
            'display_on' => 'button'
        )
	),

	'theme' => array(
		'type'    => 'select',
        'context' => 'content',
		'ui' => array(
	    	'title' => __( 'Pop Up Theme', $handle ),
			'tooltip' => __( 'What theme should be used.', $handle ),
		),
		'options' => array(
	        'choices' => array(
	            array( 'value' => 'default',  'label' => __( 'Default', $handle ) ),
	            array( 'value' => 'os', 'label' => __( 'OS', $handle ) ),
	            array( 'value' => 'plain', 'label' => __( 'Plain', $handle ) ),
	            array( 'value' => 'wireframe', 'label' => __( 'Wireframe', $handle ) ),
	            array( 'value' => 'flat-attack', 'label' => __( 'Flat Attack', $handle ) ),
	            array( 'value' => 'top', 'label' => __( 'Top', $handle ) ),
	            array( 'value' => 'bottom-right-corner', 'label' => __( 'Bottom Right Corner', $handle ) )
        	)
        )
	),

	'identifier' => array(
		'type'    => 'text',
        'context' => 'content',
        'suggest' => __( '#my-popup or .my-popup' , $handle),
		'ui' => array(
	    	'title' => __( 'Element Identifier', $handle ),
			'tooltip' => __( 'Enter the ID or Class of the page element that will trigger the modal.
								Ex. #my-popup or .my-popup', $handle ),
		),
        'condition' => array(
            'display_on' => 'element'
        )
	),

	'delay' => array(
		'type'    => 'number',
        'context' => 'content',
        'suggest' => __( '2', $handle ),
		'ui' => array(
	    	'title' => __( 'Delay', $handle ),
			'tooltip' => __( 'Time delay before modal popup on page load (in seconds).', $handle ),
		),
        'condition' => array(
            'display_on' => 'load'
        )
	)
);
