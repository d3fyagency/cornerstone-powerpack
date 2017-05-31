<?php

$handle = 'cs-powerpack';

return array(
	'enable_remember' => array(
		'type' => 'toggle',
		'ui' => array(
			'title' => __( 'Allow Remember Login', 'cs-login-form' ),
			'tooltip' => __( 'Enable saving of user credentials.', 'cs-login-form' ),
		),
	),
	'label_username' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __( 'Username Input Label', 'cs-login-form' ),
			'tooltip' => __( 'The text label for the username input.', 'cs-login-form' ),
		),
	),

	'label_password' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __( 'Password Input Label', 'cs-login-form' ),
			'tooltip' => __( 'The text label for the password input.', 'cs-login-form' ),
		),
	),

	'label_remember' => array(
		'type' => 'text',
		'condition' => array('enable_remember' => true),
		'ui' => array(
			'title' => __( 'Remember Checkbox Label', 'cs-login-form' ),
			'tooltip' => __( 'The text label for the "Remember" input.', 'cs-login-form' ),
		),
	),

	'label_log_in' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __( 'Login Button Label', 'cs-login-form' ),
			'tooltip' => __( 'The text label for the submit button.', 'cs-login-form' ),
		),
	),
);
