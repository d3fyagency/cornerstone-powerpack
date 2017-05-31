<?php

/**
 * Definition: Cornerstone Login Form
 */

class CSL_Login_Form {
    public static $handle = '__x__';

	public function ui() {
		return array(
			'title' => __( 'LoginForm', self::$handle )
		);
	}
}
