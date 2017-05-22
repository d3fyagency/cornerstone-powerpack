<?php

/**
 * Shortcode definition
 */

$ElementAdmin = CSColorAccordionManager::getInstance();
$count = $ElementAdmin->getNewElementCount();
if ( !$id ) $id = 'cspp-color-accordion-'.$count;
$ElementAdmin->setElementParam('parent_id', $id);
$ElementAdmin->setElementParam('link_items', $link_items);

$id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
$class = ( $class != '' ) ? 'class="x-accordion color ' . esc_attr( $class ) . '"' : 'class="x-accordion color"';
$style = ( $style != '' ) ? 'style="' . $style . '"' : '';

$output = "<div {$id} {$class} {$style}>" . do_shortcode( $content ) . "</div>";

echo $output;