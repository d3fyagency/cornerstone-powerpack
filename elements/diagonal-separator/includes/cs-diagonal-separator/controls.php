<?php

/**
 * Element Controls
 */

return array(

	'color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Color (of shape)', 'cs-powerpack' )
		)
	),
	
	'height' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Height (in pixels)', 'cs-powerpack' ),
		),
	),
	
	'valign' => array(
		'type'    => 'select',
		'ui'      => array(
			'title'   => __( 'Vertical Align', 'cs-powerpack' ),
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'top',
					'label' => __( 'Straight Edge at Top', 'cs-powerpack' )
				),
				array(
					'value' => 'bottom',
					'label' => __( 'Straight Edge at Bottom', 'cs-powerpack' )
				),
			)
		)
	),
	
	'slope' => array(
		'type'    => 'select',
		'ui'      => array(
			'title'   => __( 'Slope', 'cs-powerpack' ),
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'up',
					'label' => __( 'Slope Up (from left)', 'cs-powerpack' )
				),
				array(
					'value' => 'down',
					'label' => __( 'Slope Down (from left)', 'cs-powerpack' )
				),
				array(
					'value' => 'point',
					'label' => __( 'Mountain / Point', 'cs-powerpack' )
				),
				array(
					'value' => 'dip',
					'label' => __( 'Valley / Dip', 'cs-powerpack' )
				),
			)
		)
	),
	
	'overlap' => array(
		'type'    => 'select',
		'ui'      => array(
			'title'   => __( 'Overlap', 'cs-powerpack' ),
		),
		'options' => array(
			'choices' => array(
				array(
					'value' => 'none',
					'label' => __( 'None', 'cs-powerpack' )
				),
				array(
					'value' => 'above',
					'label' => __( 'Overlap Element Above', 'cs-powerpack' )
				),
				array(
					'value' => 'below',
					'label' => __( 'Overlap Element Below', 'cs-powerpack' )
				),
			)
		)
	),
	
	'zindex' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'CSS Z-Index', 'cs-powerpack' ),
		),
	),

);
