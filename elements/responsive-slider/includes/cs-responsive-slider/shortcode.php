<?php

/**
 * Shortcode definition
 */

$SliderAdmin = CSResponsiveSliderManager::getInstance();
$count = $SliderAdmin->getNewSliderCount();
$css_prefix = '#cs-content .cs-responsive-slider ';

// set container classes, include main CS element positioning classes
$classes = array( 'x-flexslider-shortcode-container', 'cs-responsive-slider' );
if ( $class ) $classes[] = $class;
if ( $prev_next_nav_position ) $classes[] = 'prevnextnav-' . $prev_next_nav_position;
if ( $control_nav_position ) $classes[] = 'controlnav-' . $control_nav_position;
if ( $control_nav_theme ) $classes[] = 'controltheme-' . $control_nav_theme;
if ( $slider_style != 'fullheight' ) $slider_style = 'scaled';
$classes[] = 'cs-responsive-slider-'.$slider_style;
$SliderAdmin->setSliderParam( 'slider_style', $slider_style );
$attr_container = cs_atts( array(
	'class'	=> esc_attr( implode( ' ', $classes ) ),
) );

// set main slider attributes
$attr_slider = cs_atts( array(
	'id'		=> $id,
	'class'	=> 'x-flexslider loading x-flexslider-shortcode x-flexslider-shortcode-' . $count,
	'style'	=> $style,
) );
$attr_data = cs_generate_data_attributes( 'slider', array(
	'animation'       => $slider_transition,
	'slideTime'       => $slider_time,
	'slideSpeed'      => $slider_speed,
	'controlNav'      => ( $control_nav ) ? true : false,
	'prevNextNav'     => ( $prev_next_nav ) ? true : false,
	'slideshow'       => true,
	'touch'           => true,
	'pauseOnHover'    => true,
	'fadeFirstSlide'  => false,
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

<div <?php echo $attr_container; ?> >
	<div <?php echo trim( $attr_slider . ' ' . $attr_data ); ?> >
		<ul class="x-slides">
			<?php echo do_shortcode( $content ); ?>
		</ul>
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