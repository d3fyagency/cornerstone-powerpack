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

$box_dimension_styles = 'height: ' . $box_height . '; width: ' . $box_width . '; ';
$style .= $box_dimension_styles;
?>

<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class . ' flip-card', 'style' => $style ) ); ?>>
  <div class="flipper">
    <div class="teammember-image-wrap front" style="<?=$box_dimension_styles?>">
      <img src="<?= $member_image ?>" />
      <div class="teammember-info" style="background-color:<?= $highlight_color ?>;">
        <div class="teammember-name"><?= $name ?></div>
        <div class="teammember-title"><?= $job_title ?></div>
      </div>
    </div>

    <div class="teammember-bio-container back" style="<?=$box_dimension_styles?>background-color:<?=$flipcard_back_color?>">
      <div class="teammember-bio-content">
        <div class="teammember-name"><?= $name ?></div>
        <div class="teammember-title"><?= $job_title ?></div>
        <?php echo do_shortcode( $content ); ?>
        <?= $member_content ?>

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
</div>
