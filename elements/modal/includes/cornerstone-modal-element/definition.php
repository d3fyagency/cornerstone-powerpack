<?php

/**
 * Definition: Cornerstone Modal
 */

class CSL_Modal {
    public static $handle = '__x__';

	public function ui() {
		return array(
			'title' => __( 'Modal', self::$handle )
		);
	}
}