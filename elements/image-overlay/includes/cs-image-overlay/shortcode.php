<?php

/**
 * Shortcode definition
 */
$class = "cs-image-overlay cs-image-overlay-$gradient_orientation $text_align" . $class;
$color = 'color: ' . $text_content_color;
$headline_style = 'border-bottom: 1px solid ' . $text_content_color;

$gradient_atts = cs_atts( array( 'style' => cs_build_gradient( $gradient_color_start, $gradient_color_end, $gradient_orientation ) ) );
$gradient_atts_hover = cs_atts( array( 'style' => cs_build_gradient( $gradient_color_hover_start, $gradient_color_hover_end, $gradient_orientation ) ) );

$target = empty( $new_tab ) ? '' : 'target="_blank"';
?>

<div <?php cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ), true ); ?>>

	<?php if ( false === empty( $image ) ): ?>

		<figure class="cs-image-overlay-container">

			<div class="overlay-image" style="background-image: url(<?php echo $image ?>)"></div>

			<?php if( ! empty( $url ) ) : ?>
				<a href="<?php echo $url; ?>" <?php echo $target; ?>></a>
			<?php endif; ?>

			<figcaption <?php cs_atts( array( 'style' => $color ), true ); ?>>

				<?php if ( false === empty( $heading ) ): ?>

					<strong <?php cs_atts( array( 'style' => $headline_style ) , true ); ?>><?php echo $heading ?></strong>

				<?php endif; ?>

				<?php if ( false === empty( $text_content ) ): ?>

					<div class="io-text">
						<?php echo $text_content; ?>
					</div>

				<?php endif; ?>

			</figcaption>

			<span class="io-gradient io-gradient-state" <?php echo $gradient_atts;?>></span>
			<span class="io-gradient io-gradient-hover" <?php echo $gradient_atts_hover;?>></span>

		</figure>

	<?php endif; ?>
</div>
