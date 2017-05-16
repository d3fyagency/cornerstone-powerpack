<?php
/**
 * Shortcode: Team Member
 */

$class = 'csl-teammember ' . $class;
$custom_open_text = ($custom_open_text == '' ? 'View Profile' : $custom_open_text);

$member_content = html_entity_decode( $member_content );
$member_content = str_replace(
  array( '&lsqb;', '&rsqb;' ),
  array( '[', ']' ),
  $member_content
);

?>
<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ) ); ?>>
	<div class="teammember-image-wrap">
		<img src="<?= $member_image ?>" />
		<div class="teammember-info" style="background-color:<?= $highlight_color ?>;">
			<div class="teammember-name">NAME: <?= $name ?></div>
			<div class="teammember-title"><?= $job_title ?></div>
		</div>
		<div class="view-profile" style="background-color:<?= $highlight_color ?>;"><?= $custom_open_text ?></div>
	</div>
	<div class="teammember-bio-overlay">
		<div class="teammember-bio-container">
			<a href="#" class="t-close" style="background-color:<?= $highlight_color ?>;">x</a>
			<div class="teammember-bio-content">
				<img src="<?= $member_image ?>" class="alignleft"/>
				<div class="teammember-name"><?= $name ?></div>
				<div class="teammember-title"><?= $job_title ?></div>
				<?php echo do_shortcode( $content ); ?>
				<?php echo do_shortcode( $member_content ); ?>
			</div>
		</div>
	</div>
</div>

