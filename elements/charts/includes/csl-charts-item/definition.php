<?php

/**
 * Element Definition: "Responsive Slider"
 */

class CSL_Charts_Item {

	public function ui() {
		return array(
			'title'       => __( 'Charts Item', 'csl-charts-item' )
		);
	}

	public function flags() {
		return array(
			'child' => true
		);
	}
}
