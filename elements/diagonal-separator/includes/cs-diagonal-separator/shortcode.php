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
	'class'	=> esc_attr(implode(' ', $classes)),
	'style' => $style,
));

// generate SVG
if ($valign == 'bottom') {
	if ($slope == 'down') $points = '0 0, 100 100, 0 100';
	else $points = '0 100, 100 0, 100 100';
} else {
	if ($slope == 'down') $points = '0 0, 100 0, 100 100';
	else $points = '0 0, 100 0, 0 100';
}

$svg =
'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">'.
  '<polygon fill="'.esc_attr($color).'" points="'.$points.'"/>'.
'</svg>';

// set wrapper CSS
$wrapHeight = ($overlap == 'none') ? intval($height) : 0;
$ElementAdmin->addCSSRule( 
  trim($css_prefix),
  'position: relative; overflow: visible; width: 100%; height: '.$wrapHeight.'px;'
);

// set shape CSS
$vposition = ($overlap == 'above') ? 'bottom: 0px;' : 'top: 0px;';
$ElementAdmin->addCSSRule( 
  trim($css_prefix.' .shape'),
  'position: absolute; left: 0px; '.$vposition.' width: 100%; height: '.intval($height).'px; z-index: '.intval($zindex).';'
);
$ElementAdmin->addCSSRule( 
  trim($css_prefix.' .shape'),
  'background-image: url(\'data:image/svg+xml,'.rawurlencode($svg).'\')'
);
$ElementAdmin->addCSSRule( 
  trim($css_prefix.' .shape'),
  'background-size: 100% 100%; background-repeat: no-repeat;'
);

ob_start();

?>

<div <?php echo $attr_container; ?> >
	<div class="shape"></div>
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