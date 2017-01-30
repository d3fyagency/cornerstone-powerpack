<?php
/**
 * Shortcode: Team Member
 */

$class = 'csl-simplecontactform ' . $class;
?>


<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ) ); ?>>
		<?php echo do_shortcode( $content ); ?>
</div>
