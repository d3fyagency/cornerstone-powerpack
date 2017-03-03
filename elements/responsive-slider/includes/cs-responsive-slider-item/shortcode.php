<?php

/**
 * Shortcode definition
 */

$SliderAdmin = CSResponsiveSliderManager::getInstance();
$slider_count = $SliderAdmin->getCurrentSliderCount();
$item_count = $SliderAdmin->getNewSliderItemCount();

global $csRespSliderStyles;
$item_styles = array();

$wrap_id = 'cs-responsive-slider-item-' . $slider_count . '-' . $item_count;
$item_class = 'slider-item-' . $item_count;
$css_prefix = '#cs-content .cs-responsive-slider .cs-responsive-slider-item #' . $wrap_id . ' ';
$has_overlay = ( $slider_image || $header_text || $content || $btn_link_url ) ? true : false;
$slider_style = $SliderAdmin->getSliderParam( 'slider_style' );

if ( $slider_style == 'fullheight' ) {
  $slider_bg_image = $slider_image;
} else $slider_bg_image = null;

if ( $slider_bg_image ) $SliderAdmin->addCSSRule( 
  trim($css_prefix),
  'background-image: url(' . esc_url($slider_bg_image) . '); min-height: 100px;'
);

if ( $has_overlay ) {
	
	// overlay background
	if ( $overlay_bg_color ) $SliderAdmin->addCSSRule( 
		$css_prefix . '.slider-overlay',
		'background-color: ' . $overlay_bg_color
	);
	
	// overlay text color
	if ( $overlay_text_color ) $SliderAdmin->addCSSRule( 
		$css_prefix . '.slider-overlay',
		'color: ' . $overlay_text_color
	);
	
	// overlay text align
	if ( $overlay_text_align ) $SliderAdmin->addCSSRule( 
		$css_prefix . '.slider-overlay',
		'text-align: ' . $overlay_text_align
	);
	if ( 'center' == $overlay_text_align ) {
		$SliderAdmin->addCSSRule( 
			$css_prefix . '.slider-overlay .logo-image img',
			'margin-right: auto; margin-left: auto;'
		);
	} else if ( 'left' == $overlay_text_align ) {
		$SliderAdmin->addCSSRule( 
			$css_prefix . '.slider-overlay .logo-image img',
			'margin-right: auto; margin-left: 0;'
		);
	} else if ( 'right' == $overlay_text_align ) {
		$SliderAdmin->addCSSRule( 
			$css_prefix . '.slider-overlay .logo-image img',
			'margin-right: 0; margin-left: auto;'
		);
	}
	
	// overlay width
	if ( $overlay_width ) $SliderAdmin->addCSSRule( 
		$css_prefix . '.slider-overlay',
		'width: ' . intval( $overlay_width ) . '%'
	);
	
	// overlay horizontal offset
	if ( $overlay_offset_x_from == 'right' ) {
		$overlay_offset_x_reset = 'left: auto; ';
	} else {
		$overlay_offset_x_reset = 'right: auto; ';
		$overlay_offset_x_from = 'left';
	}
	$SliderAdmin->addCSSRule(
		$css_prefix . '.slider-overlay',
		$overlay_offset_x_reset . $overlay_offset_x_from . ': ' . intval( $overlay_offset_x ) . '%'
	);
	
	// overlay vertical offset
	if ( $overlay_offset_y_from == 'bottom' ) {
		$overlay_offset_y_reset = 'top: auto; ';
	} else {
		$overlay_offset_y_reset = 'bottom: auto; ';
		$overlay_offset_y_from = 'top';
	}
	$SliderAdmin->addCSSRule(
		$css_prefix . '.slider-overlay',
		$overlay_offset_y_reset . $overlay_offset_y_from . ': ' . intval( $overlay_offset_y ) . '%'
	);
	$SliderAdmin->addCSSRule(
		$css_prefix . '.slider-overlay',
		'max-height: ' . ( 100 - intval( $overlay_offset_y ) ) . '%'
	);
	
	// logo max width (percentage of overlay)
	if ( $logo_max_width ) $SliderAdmin->addCSSRule( 
		$css_prefix . '.slider-overlay .logo-image img',
		'max-width: ' . intval($logo_max_width) . '%; height: auto'
	);
	
	// header color
	if ( $header_text_color ) $SliderAdmin->addCSSRule( 
		$css_prefix . '.slider-overlay .slider-header h2',
		'color: ' . $header_text_color
	);
	
	// set minimum viewport size for content block in overlay
	if ( intval( $content_show_min ) > 0 ) {
		$SliderAdmin->addCSSRule( 
			$css_prefix . '.slider-overlay .slider-content',
			'display: none;'
		);
		$SliderAdmin->addCSSRule( 
			$css_prefix . '.slider-overlay .slider-content',
			'display: block;',
			'min-width: ' . intval( $content_show_min ) . 'px'
		);
	}
}

?>

<div <?php echo cs_atts( array(
	'id'		=> $id,
	'class'	=> 'cs-responsive-slider-item slide ' . $item_class,
	'style'	=> $style,
) ); ?>>
	
	<div id="<?php echo esc_attr( $wrap_id ); ?>" class="slider-item-wrap">
		
		<?php if ( $slider_image ): ?>
		<div class="slider-image">
			<img src="<?php echo esc_url( $slider_image ); ?>" alt="<?php echo esc_attr( $slider_image_alt ); ?>" />
		</div>
		<?php endif; ?>
		
		<?php if ( $has_overlay ) : ?>
		<div class="<?php echo esc_attr( 
			'slider-overlay padding-' . $overlay_padding . ' text-' . $overlay_text_size . ' lineheight-'.$overlay_lineheight
			); ?>">
	
			<?php if ( $logo_include && $logo_image ) : ?>
			<div class="logo-image padding-btm-<?php echo esc_attr( $logo_btm_padding ); ?>">
				<img src="<?php echo esc_url( $logo_image ); ?>" alt="<?php echo esc_attr( $logo_image_alt ); ?>" />
			</div>
			<?php endif; ?>
			
			<?php if ( $header_include && $header_text ) : ?>
			<div class="<?php echo esc_attr( 
				'slider-header padding-btm-' . $header_btm_padding . ' header-' . $header_text_size 
				); ?>">
				<h2><?php echo esc_html( $header_text ); ?></h2>
			</div>
			<?php endif; ?>
			
			<?php if ( $content ) : ?>
			<div class="slider-content padding-btm-<?php echo esc_attr( $content_btm_padding ); ?>">
				<?php echo $content; ?>
			</div>
			<?php endif; ?>
			
			<?php if ( $btn_include && $btn_link_url && $btn_text ) : ?>
			<div class="slider-button padding-btm-<?php echo esc_attr( $btn_btm_padding ); ?>">
				<a <?php echo cs_atts( array(
					'href'	=> esc_url( $btn_link_url ),
					'class'	=> trim( 'slider-btn-link ' . esc_attr( $btn_class ) ),
					) ); if ( $btn_target_new ) echo ' target="_blank"'; ?>>
					<?php echo esc_html( $btn_text ); ?>
				</a>
			</div>
			<?php endif; ?>
		
		</div>
		<?php endif; ?>
	
	</div>
	
</div>
