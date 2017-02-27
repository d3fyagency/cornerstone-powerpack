<?php

/**
 * Element Definition
 */
class CSL_Button
{

    public function ui()
    {
        return array(
            'title' => __('Button Advance', '__x__'),
            'autofocus' => array(
                'content'   => 'div.csl-button'
            ),
//            'icon_group'=> 'csl-button'
        );
    }

//    public function update_build_shortcode_atts($atts)
//    {
//
//        // This allows us to manipulate attributes that will be assigned to the shortcode
//        // Here we will inject a background-color into the style attribute which is
//        // already present for inline user styles
//        if (!isset($atts['style'])) {
//            $atts['style'] = '';
//        }
//
//        return $atts;
//
//    }


}