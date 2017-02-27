<?php

/**
 * Shortcode definition
 */

$randnum = rand(0, 5000);
$button_id = "csl-button-" . $randnum;

$transparent_defaults = array('border_main_color', 'border_hover_color', 'background_color');
foreach ($transparent_defaults as $var) if (!$$var) $$var = 'transparent';

$class .= "csl-button " . $button_id;
?>
<style type="text/css">
    a.<?php echo $button_id; ?> {
        border: 2px solid <?php echo $border_main_color; ?>;
        border-radius: <?php echo $border_radius; ?>px;
        color: <?php echo $font_color; ?>;
        background-color: <?php echo $background_color; ?>;
        <?php echo $block === true ? 'display: block;' : ''; ?> 
        <?php
            switch($size) {
                case 'small':
                    echo 'padding: 5px;';
                    break;
                case 'large':
                    echo 'padding: 20px;';
                    break;
                case 'medium':
                default:
                    echo 'padding: 10px;';
                    break;
            }
        ?>
    }

    a.<?php echo $button_id; ?>:hover {
        color: <?php echo $font_hover_color; ?>;
        border-color: <?php echo $border_hover_color; ?>;
        background-color: <?php echo $background_hover_color; ?>;
    }
</style>

<a <?php echo cs_atts(array('id' => $id, 'class' => $class, 'style' => $style)); ?>
    href="<?php echo $href; ?>"
<?php echo ($new_window === true) ? 'target="_blank"' : ''; ?> "
>
<?php
    if ($icon_toggle === true) {
        $icon_markup = "[x_icon type=\"{$icon_type}\"]";

        if ( $icon_placement == 'notext' ) {
            $icon_only = 'true';
            $content = $icon_markup;
        } elseif ( $icon_placement == 'before' ) {
            $content = $icon_markup . " " . $content;
        } elseif ( $icon_placement == 'after' ) {
            $content .= " " . $icon_markup;
        }
    }

echo $content;
?>
</a>
