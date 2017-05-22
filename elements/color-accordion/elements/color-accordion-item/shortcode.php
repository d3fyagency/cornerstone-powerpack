<?php

/**
 * Shortcode definition
 */

$ElementAdmin = CSColorAccordionManager::getInstance();
$element_count = (integer) $ElementAdmin->getCurrentElementCount();
$item_count = (integer) $ElementAdmin->getNewElementItemCount();
$count = $element_count . '-' . $item_count;
$parent_id = $ElementAdmin->getElementParam('parent_id', '');
$link_items = $ElementAdmin->getElementParam('link_items', '');

// print('<pre>parent_id: '); var_dump($parent_id); print('</pre>');
// print('<pre>link_items: '); var_dump($link_items); print('</pre>');

$id        = ( $id        != ''     ) ? 'id="' . esc_attr( $id ) . '"' : '';
$class     = ( $class     != ''     ) ? 'class="x-accordion-group ' . esc_attr( $class ) . '"' : 'class="x-accordion-group"';
$style     = ( $style     != ''     ) ? 'style="' . $style . '"' : '';
$parent_id = ( $parent_id != ''     ) ? 'data-parent="#' . $parent_id . '"' : '';
if ( !$link_items ) $parent_id = '';
$title     = ( $title     != ''     ) ? $title : '';
$open      = ( $open      == 'true' ) ? 'collapse in' : 'collapse';
$color     = ( $accordion_color  != ''     ) ? 'style="background-color: ' . $accordion_color . ';"' : 'style="background-color:#002a5b;"';
$title_extra = ( $title_extra != '' ) ? $title_extra : '';

if ( $open == 'collapse in' ) {

  $output = "<div {$id} {$class} {$style}>"
            . '<div class="x-accordion-heading">'
              . "<a class=\"x-accordion-toggle\" {$color} data-toggle=\"collapse\" {$parent_id} href=\"#collapse-{$count}\"><span class=\"adv-title\">{$title}</span> <span class=\"extra-title\">{$title_extra}</span></a>"
            . '</div>'
            . "<div id=\"collapse-{$count}\" class=\"accordion-body {$open}\">"
              . '<div class="x-accordion-inner">'
                . do_shortcode( $content )
              . '</div>'
            . '</div>'
          . '</div>';

} else {

  $output = "<div {$id} {$class} {$style}>"
            . '<div class="x-accordion-heading">'
              . "<a class=\"x-accordion-toggle collapsed\" {$color} data-toggle=\"collapse\" {$parent_id} href=\"#collapse-{$count}\"><span class=\"adv-title\">{$title}</span> <span class=\"extra-title\">{$title_extra}</span></a>"
            . '</div>'
            . "<div id=\"collapse-{$count}\" class=\"accordion-body {$open}\">"
              . '<div class="x-accordion-inner">'
                . do_shortcode( $content )
              . '</div>'
            . '</div>'
          . '</div>';

}

echo $output;