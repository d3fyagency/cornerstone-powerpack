<?php

/**
 * Element Controls
 */

return array(
    'content' => array(
        'type' => 'text',
        'ui' => array(
            'title' => __('Text', 'csl-button'),
            'tooltip' => __('Enter your text.', 'csl-button'),
        ),
        'context' => 'content',
        'suggest' => __('Click Me!', 'csl-button'),
    ),

    'href' => array(
        'type' => 'text',
        'ui' => array(
            'title' => __('Link', 'csl-button'),
            'tooltip' => __('Link button to.', 'csl-button'),
        ),
        'suggest' => __('#', 'csl-button'),
    ),
    'new_window' => array(
        'type' => 'toggle',
        'ui' => array(
            'title' => __('Open link in new window', csl18n()),
            'tooltip' => __('Will open the link in a new tab/window.', csl18n()),
        )
    ),

    'font_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Font Color', 'csl-button'),
        ),
        'suggest' => __('#ffffff', 'csl-button'),
    ),
    'font_hover_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Font Hover Color', 'csl-button'),
        ),
        'suggest' => __('#00a94e', 'csl-button'),
    ),

    'border_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Border Color', 'csl-button'),
        ),
        'suggest' => __('#00a94e', 'csl-button'),
    ),
    'border_hover_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Border Hover Color', 'csl-button'),
        ),
        'suggest' => __('#00a94e', 'csl-button'),
    ),

    'background_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Background Color', 'csl-button'),
        ),
        'suggest' => __('#ffffff', 'csl-button'),
    ),
    'background_hover_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Background Hover Color', 'csl-button'),
        ),
        'suggest' => __('#00a94e', 'csl-button'),
    ),

    'border_radius' => array(
        'type' => 'number',
        'ui' => array(
            'title' => __('Border Radius', 'csl-button'),
            'tooltip' => __('This is in px', 'csl-button'),
        ),
        'suggest' => __('0', 'csl-button'),
    ),

    'block' => array(
        'type' => 'toggle',
        'ui' => array(
            'title' => __('Block', 'csl-button'),
            'tooltip' => __('Select to make your button go fullwidth.', 'csl-button'),
        ),
        'suggest' => false,
    ),

    'size' => array(
        'type' => 'select',
        'ui' => array(
            'title' => __('Size', 'csl-button'),
            'tooltip' => __('Button size.', 'csl-button'),
        ),
        'options' => array(
            'choices' => array(
                array('value' => 'small', 'label' => __('Small', 'csl-button')),
                array('value' => 'medium', 'label' => __('Medium', 'csl-button')),
                array('value' => 'large', 'label' => __('Large', 'csl-button')),
            )
        ),
        'suggest' => 'medium',
    ),

    'icon_toggle' => array(
        'type' => 'toggle',
        'ui' => array(
            'title' => __('Enable Icon', 'csl-button'),
            'tooltip' => __('Select if you would like to add an icon to your button.', 'csl-button'),
        ),
        'suggest' => false,
    ),

    'icon_placement' => array(
        'type' => 'select',
        'condition' => array('icon_toggle' => true),
        'ui' => array(
            'title' => __('Icon Placement', 'csl-button'),
            'tooltip' => __('Place the icon before or after the button text, or even override the button text.',
                'csl-button'),
        ),
        'options' => array(
            'choices' => array(
                array('value' => 'notext', 'label' => __('Icon Only', 'cornerstone')),
                array('value' => 'before', 'label' => __('Before', 'cornerstone')),
                array('value' => 'after', 'label' => __('After', 'cornerstone'))
            )
        ),
        'suggest' => 'before',
    ),

    'icon_type' => array(
        'type' => 'icon-choose',
        'condition' => array('icon_toggle' => true),
        'ui' => array(
            'title' => __('Icon', 'csl-button'),
            'tooltip' => __('Icon to be displayed inside your button.', 'csl-button'),
        ),
        'condition' => array( 'icon_toggle' => true ),
        'suggest' => 'lightbulb-o',
    ),
);