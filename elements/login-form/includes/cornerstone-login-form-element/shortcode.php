<?php
$args = array(
  'echo'           => true,
	'remember'       => $enable_remember,
	'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
	'form_id'        => $id,
	'id_username'    => $id . '_username',
	'id_password'    => $id . '_password',
	'id_remember'    => $id . '_remember',
	'id_submit'      => $id . '_submit',
	'label_username' => __( $label_username ),
	'label_password' => __( $label_password ),
	'label_remember' => __( $label_remember ),
	'label_log_in'   => __( $label_log_in ),
	'value_username' => '',
	'value_remember' => false
);
?>

<div class="cspp-login-form">
  <?php wp_login_form($args); ?>
</div>
