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
  'color_scheme' => array(
    'type'    => 'select',
    'ui'      => array(
      'title'   => __( 'Color Scheme', 'csl-charts' ),
    ),
    'options' => array(
      'choices' => array(
        array( 'value' => 'd3.schemeCategory20',   'label' => __( 'Default', 'csl-charts' ) ),
        array( 'value' => 'd3.schemeCategory10',   'label' => __( 'Scheme Category A', 'csl-charts' ) ),
        array( 'value' => 'd3.schemeCategory20b',   'label' => __( 'Scheme Category B', 'csl-charts' ) ),
        array( 'value' => 'd3.schemeCategory20c',   'label' => __( 'Scheme Category C', 'csl-charts' ) ),
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
