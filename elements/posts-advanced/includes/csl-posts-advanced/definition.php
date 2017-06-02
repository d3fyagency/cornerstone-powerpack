<?php

/**
 * Definition: Cornerstone Modal
 */

class CSL_Posts_Advanced {
  public static $handle = '__x__';

	public function ui() {
		return array(
			'title' => __( 'Recent Posts Extended', self::$handle )
		);
	}
}
