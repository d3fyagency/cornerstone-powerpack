<?php

/**
 * Element Controls: Simple Contact Form
 */

return array(
  'send_email_notification' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Send Email Notification', csl18n() ),
			'tooltip' => __( 'Enable sending of e-mail notification to the admin', csl18n() ),
		)
	),
  'email_admin' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Send Email Notification', csl18n() ),
			'tooltip' => __( 'Enable sending of e-mail notification to the admin', csl18n() ),
		)
	),
);
