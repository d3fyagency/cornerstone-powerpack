<?php

/**
 * Element Controls
 */

return array(
	'chart_style' => array(
		'type'    => 'select',
		'ui'      => array(
			'title'   => __( 'Chart Style', 'cs-charts' ),
		),
		'context' => 'content',
		'options' => array(
			'choices' => array(
				array( 'value' => 'pie',   'label' => __( 'Pie', 'cs-charts' ) ),
				array( 'value' => 'donut',   'label' => __( 'Donut', 'cs-charts' ) ),
				array( 'value' => 'bar',  'label' => __( 'Bar', 'cs-charts' ) ),
			)
		)
	),
	'elements' => array(
		'type'    => 'sortable',
		'options' => array(
			'element' => 'cs-charts-item',
			'newTitle' => __( 'Item %s', 'cs-charts' ),
			'floor'   => 1,
			'capacity' => 5,
			'title_field' => 'heading'
		),
		'suggest' => array(
			array( 'heading' => __( 'Item 1', 'cs-charts' ) ),
			array( 'heading' => __( 'Item 2', 'cs-charts' ) ),
		)
	),
);
