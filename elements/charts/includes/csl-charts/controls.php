<?php

/**
 * Element Controls
 */

return array(
  'chart_style' => array(
    'type'    => 'select',
    'ui'      => array(
      'title'   => __( 'Chart Style', 'csl-charts' ),
    ),
    'context' => 'content',
    'options' => array(
      'choices' => array(
        array( 'value' => 'pie',   'label' => __( 'Pie', 'csl-charts' ) ),
        array( 'value' => 'donut',   'label' => __( 'Donut', 'csl-charts' ) ),
        array( 'value' => 'bar',  'label' => __( 'Bar', 'csl-charts' ) ),
      )
    )
  ),
  'elements' => array(
    'type'    => 'sortable',
    'options' => array(
      'element' => 'csl-charts-item',
      'newTitle' => __( 'Item %s', 'csl-charts' ),
      'floor'   => 1,
      'capacity' => 5,
      'title_field' => 'heading'
    ),
    'suggest' => array(
      array( 'heading' => __( 'Item 1', 'csl-charts' ) ),
      array( 'heading' => __( 'Item 2', 'csl-charts' ) ),
    )
  ),
  'width' => array(
    'type'    => 'text',
    'ui'  => array(
      'title' => __('Width', 'csl-charts')
    ),
    'suggest' => '600'
  ),
  'height' => array(
    'type'    => 'text',
    'ui'  => array(
      'title' => __('Height', 'csl-charts')
    ),
    'suggest' => '600'
  ),
);
