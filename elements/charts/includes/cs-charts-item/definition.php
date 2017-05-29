<?php

/**
 * Element Definition: "Responsive Slider"
 */

class CS_Charts_Item {

	public function ui() {
		return array(
			'title'       => __( 'Charts Item', 'cs-charts-item' )
		);
	}

	public function flags() {
		return array(
			'child' => true
		);
	}
}
