<?php

/**
 * Definition: Cornerstone Modal
 */

class CSL_Woocommerce_Product {
  public static $handle = '__x__';

	public function ui() {
		return array(
			'title' => __( 'Woocommerce Product', self::$handle )
		);
	}
}
