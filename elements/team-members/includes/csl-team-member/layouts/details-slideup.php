<?php
$social = array();
foreach ($social_networks as $key=>$info) {
  $social_var = 'social_'.$key;
  if ($$social_var) {
    $social[] =
      '<a href="'.esc_html($$social_var).'" target="_blank" class="social-link social-link-'.esc_attr($key).'">'
      .'<i class="social-icon '.esc_attr($info['icon']).'"></i>'
      .'</a>';
  }
}
?>

<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class . ' details-slideup', 'style' => $style ) ); ?>>
  <div class="teammember-image-wrap">
    <img src="<?= $member_image ?>" />
    <div class="teammember-info" style="background-color:<?= $highlight_color ?>;">
      <div class="teammember-name"><?= $name ?></div>
      <div class="teammember-title"><?= $job_title ?></div>
    </div>
  </div>
  <div class="teammember-bio-overlay">
    <div class="teammember-bio-container">
      <a href="#" class="t-close" style="background-color:<?= $highlight_color ?>;">x</a>
      <div class="teammember-bio-content">
        <img src="<?= $member_image ?>" class="alignleft"/>
        <div class="teammember-name"><?= $name ?></div>
        <div class="teammember-title"><?= $job_title ?></div>
        <?php echo do_shortcode( $content ); ?>
        <?= $member_content ?>
      </div>
      <?php if (!empty($social)): ?>
      <div class="teammember-social"><ul>
        <?php foreach ($social as $s_link): ?>
        <li style="font-size:<?=$social_logo_font_size?>; color:<?= $social_logo_color ?>">
          <?= $s_link; ?>
        </li>
        <?php endforeach; ?>
      </ul></div>
      <?php endif; ?>
    </div>
  </div>
</div>
