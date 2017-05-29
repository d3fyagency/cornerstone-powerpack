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

<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class . ' no-popup', 'style' => $style ) ); ?>>
  <div class="teammember-image-wrap">
    <img src="<?= $member_image ?>" />
    <div class="teammember-info">
      <div class="teammember-name" style="font-size:<?= $name_font_size ?>"><?= $name ?></div>
      <div class="teammember-title" style="font-size:<?= $title_font_size ?>"><?= $job_title ?></div>
      <div class="teammember-content" style="font-size:<?= $desc_font_size ?>"><?= $member_content ?></div>

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
