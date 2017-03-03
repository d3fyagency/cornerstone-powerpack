<?php

/**
 * Shortcode definition
 */

$SliderAdmin = CSResponsiveSliderManager::getInstance();
$count = $SliderAdmin->getNewSliderCount();
$css_prefix = '#cs-content .cs-responsive-slider ';

// set container attributes, include main CS element positioning classes
$classes = array( 'cs-responsive-slider', 'cs-responsive-slider-loading', 'cs-responsive-slider-' . $count );
if ( $class ) $classes[] = $class;
if ( $prev_next_nav_position ) $classes[] = 'prevnextnav-' . $prev_next_nav_position;
if ( $control_nav_position ) $classes[] = 'controlnav-' . $control_nav_position;
if ( $control_nav_theme ) $classes[] = 'controltheme-' . $control_nav_theme;
if ( $slider_style != 'fullheight' ) $slider_style = 'scaled';
$classes[] = 'cs-responsive-slider-'.$slider_style;
$SliderAdmin->setSliderParam( 'slider_style', $slider_style );
$attr_container = cs_atts( array(
	'id'		=> $id,
	'class'	=> esc_attr( implode( ' ', $classes ) ),
	'style'	=> $style,
) );

// set slider data attributes
if ( $slider_transition == 'slide' ) $slider_transition = 'scrollHorz';
$attr_slider = cs_atts( array(
	'class'								=> 'cs-responsive-slider-slideshow min-slide-height cs-responsive-slider-items',
	'data-cycle-timeout'	=> $slider_time,
	'data-cycle-speed'		=> $slider_speed,
	'data-cycle-fx'				=> $slider_transition,
) );

// set minimum viewport width for nav controls
if ( intval( $slider_nav_min ) > 0 ) {
	$SliderAdmin->addCSSRule( 
		$css_prefix . '.flex-control-nav, ' . $css_prefix . '.flex-direction-nav',
		'display: none;'
	);
	$SliderAdmin->addCSSRule( 
		$css_prefix . '.flex-control-nav, ' . $css_prefix . '.flex-direction-nav',
		'display: block;',
		'min-width: ' . intval( $slider_nav_min ) . 'px'
	);
}

ob_start();

?>

<div <?php echo $attr_container; ?>>
	<div <?php echo $attr_slider; ?> 
		data-cycle-slides="> div.slide" 
		data-cycle-log=false 
		data-cycle-auto-height=0
    data-cycle-pager-template="<a href=#></a>"
	>
		<?php echo do_shortcode($content); ?>
		<?php if ( $prev_next_nav ): ?>
    <a href="#" class="cycle-prev"><i class="csppicon csppicon-chevron-left"></i></a>
		<a href="#" class="cycle-next"><i class="csppicon csppicon-chevron-right"></i></a>
    <?php endif; ?>
    <?php if ( $control_nav ): ?>
    <div class="cycle-pager"></div>
    <?php endif; ?>
	</div>
</div>

<?php

$output = ob_get_contents();
ob_end_clean();

$css = $SliderAdmin->getSliderCSS();
if ($css) :

?>

<style media="screen">
<?php echo wp_filter_nohtml_kses( $css ); ?>

</style>

<?php

endif;
echo $output;