<?php

/**
 * Shortcode definition
 */

$ElementAdmin = CSDiagonalSepManager::getInstance();


$count = $ElementAdmin->getNewElementCount();
$css_prefix = '#cs-content .cs-diagonal-separator-'.$count.' ';
$element_id = 'cs-diagonal-separator-'.$count;

// store any attributes to share with slide items
$ElementAdmin->setElementParam('slider_id', $element_id);

// set container classes, include main CS element positioning classes
$classes = array('cs-diagonal-separator', 'cs-diagonal-separator-'.$count);
if ($class) $classes[] = $class;
$attr_container = cs_atts(array(
  'id'    => $id,
  'class' => esc_attr(implode(' ', $classes)),
  'style' => $style,
));

// generate SVG
if ($valign == 'bottom') {
  if ($slope == 'point') $shape = '<polygon points="0 100, 50 0, 100 100" />';
  else if ($slope == 'dip') $shape = '<polygon points="0 0, 0 100, 50 100" /><polygon points="100 0, 100 100, 50 100" />';
  else if ($slope == 'down') $shape = '<polygon points="0 0, 100 100, 0 100" />';
  else $shape = '<polygon points="0 100, 100 0, 100 100" />';
} else {
  if ($slope == 'point') $shape = '<polygon points="0 0, 50 100, 100 0" />';
  else if ($slope == 'dip') $shape = '<polygon points="0 100, 0 0, 50 0" /><polygon points="50 0, 100 0, 100 100" />';
  else if ($slope == 'down') $shape = '<polygon points="0 0, 100 0, 100 100" />';
  else $shape = '<polygon points="0 0, 100 0, 0 100" />';
}
$svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" style="fill: '.esc_attr($color).';">'.$shape.'</svg>';

// set wrapper CSS
$wrapHeight = ($overlap == 'none') ? intval($height) : 0;
$ElementAdmin->addCSSRule( 
  trim($css_prefix),
  'position: relative; overflow: visible; width: 100%; height: '.$wrapHeight.'px;'
);

// set shape CSS
$vposition = ($overlap == 'above') 
  ? 'top: 0; transform: translate(0, -'.intval($height).'px);' 
  : 'bottom: 0; transform: translate(0, '.intval($height).'px);';
/* $vposition = ($overlap == 'above') 
  ? 'top: -'.intval($height).'px;' 
  : 'bottom: -'.intval($height).'px;'; */
$ElementAdmin->addCSSRule( 
  trim($css_prefix.' .shape'),
  'position: absolute; margin: 0 auto; left: 0; right: 0; '.$vposition.' width: 100%; height: '.intval($height).'px; z-index: '.intval($zindex).';'
);
$ElementAdmin->addCSSRule( 
  trim($css_prefix.' .shape svg'),
  'width: 100%; height: 100%;'
);

ob_start();

?>

<div <?php echo $attr_container; ?> >
  <div class="shape"><?php echo $svg; ?></div>
</div>

<?php

$output = ob_get_contents();
ob_end_clean();

$css = $ElementAdmin->getElementCSS();
if ($css) :

?>

<style media="screen">
<?php echo stripslashes(wp_filter_nohtml_kses($css)); ?>

</style>

<?php

endif;
echo $output;