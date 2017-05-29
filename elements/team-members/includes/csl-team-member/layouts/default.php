<?php
$social = array();
foreach ($social_networks as $key=>$info) {
  $social_var = 'social_'.$key;
  if ($$social_var) {
    $social[] =
      '<a href="'.esc_html($$social_var).'" target="_blank" class="social-link social-link-'.esc_attr($key).'" '
      .'style="background-color: '.esc_attr($highlight_color).';">'
      .'<i class="social-icon '.esc_attr($info['icon']).'"></i>'
      .'<span class="social-text">'.esc_html($info['name']).'</span>'
      .'</a>';
  }
}
?>
<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ) ); ?>>
	<div class="teammember-image-wrap">
			<img src="<?= $member_image ?>" />
			<div class="teammember-info" style="background-color:<?= $highlight_color ?>;">
				<div class="teammember-name"><?= $name ?></div>
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
					<?php if (!empty($social)): ?>
	  			<div class="teammember-social"><ul>
	    			<?php foreach ($social as $s_link): ?>
	    			<li><?= $s_link; ?></li>
	    			<?php endforeach; ?>
	  			</ul></div>
	  			<?php endif; ?>
	  			<div class="teammember-content">
	  				<?php echo do_shortcode( $content ); ?>
	  				<?php echo do_shortcode( $member_content ); ?>
	  			</div>
				</div>
			</div>
		</div>
	</div>
