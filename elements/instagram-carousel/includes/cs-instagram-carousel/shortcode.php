<?php

/**
 * Shortcode definition
 */

$ElementAdmin = CSInstagramCarouselManager::getInstance();
$count = $ElementAdmin->getNewElementCount();
$slider_id = 'd3fy-instagram-carousel-'.$count;

// set container classes, include main CS element positioning classes
$classes = array('cs-instagram-feed-carousel', 'min-slide-height');
if ($class) $classes[] = $class;
if ($hover_effect == 'gradientdark') $classes[] = 'hover-gradient hover-gradient-dark';
else if ($hover_effect == 'gradientlight') $classes[] = 'hover-gradient hover-gradient-light';
else if ($hover_effect == 'gradientdarkicon') $classes[] = 'hover-gradient hover-gradient-dark hover-icon';
else if ($hover_effect == 'gradientlighticon') $classes[] = 'hover-gradient hover-gradient-light hover-icon';

$attr_container = cs_atts(array(
  'id'    => $id,
	'class'	=> esc_attr(implode(' ', $classes)),
	'style' => $style,
));	

$columns_mobile = (integer) $columns_mobile;
if (!$columns_mobile) $columns_mobile = 3;
$slide_width_mobile = floor(10000 * (100/$columns_mobile)) / 10000;
$maxMobile = $columns_mobile * $rows_mobile;
$ElementAdmin->addCSSRule(
	'#'.$slider_id.' .slide',
	'width: '.$slide_width_mobile.'%;'
);
$ElementAdmin->addCSSRule(
	'#'.$slider_id.'.d3fy-instagram-feed .overmax-mobile',
	'display: none;',
	'max-width: '.(intval($minwidth_desktop)-1).'px'
);
$columns_desktop = (integer) $columns_desktop;
if (!$columns_desktop) $columns_desktop = 6;
$rows_desktop = (integer) $rows_desktop;
if ($rows_desktop < 1) $rows_desktop = 1;
$slide_width_desktop = floor(10000 * (100/$columns_desktop)) / 10000;
$maxDesktop = $columns_desktop * $rows_desktop;
$ElementAdmin->addCSSRule(
	'#'.$slider_id.' .slide',
	'width: '.$slide_width_desktop.'%;',
	'min-width: '.intval($minwidth_desktop).'px'
);
$ElementAdmin->addCSSRule(
	'#'.$slider_id.'.d3fy-instagram-feed .overmax-desktop',
	'display: none;',
	'min-width: '.intval($minwidth_desktop).'px'
);

// generic function to fetch value from object or array (or return default)
if (!function_exists('d3fy_get_object_property')) {
	function d3fy_get_object_property($object, $property, $default=null) {
		if (is_object($object) && property_exists($object, $property))
			return $object->$property;
		else if (is_array($object) && isset($object[$property]))
			return $object[$property];
		else return $default;
	}
}

// enqueue scripts if carousel
if ($carousel) {
  $v = '0.1.8';
  // $v = time();
	wp_enqueue_script(
		'cs-instagramcarousel-scripts', 
		CS_INSTAGRAMCAROUSEL_URL.'assets/scripts/cs-instagramcarousel-min.js', 
		array('jquery'), $v, true
	);
	wp_enqueue_script(
		'cspp-cycle2', 
		D3FY_CSPP_URL.'/lib/cycle2/jquery.cycle2.min.js',
		array('jquery'), $v, true
	);
	wp_enqueue_script(
		'cspp-cycle2-carousel', 
		D3FY_CSPP_URL.'/lib/cycle2/jquery.cycle2.carousel.min.js', 
		array('jquery', 'cspp-cycle2'), $v, true
	);
}

$images = array();
if ($instagram_key) {
  $keys = explode(',', $instagram_key);
  foreach ($keys as $key) {
    $key = trim($key);
    if ($key) {
      $feed = 'https://www.instagram.com/'.urlencode($key).'/media/';
    	$json = file_get_contents($feed);
    	$data = json_decode($json);
    	if ($data) {
    		foreach (d3fy_get_object_property($data, 'items') as $item) {
    			if (d3fy_get_object_property($item, 'type') == 'image') {
    				$image = new stdClass();
    				$image->feed = $key;
    				$image->standard = d3fy_get_object_property(d3fy_get_object_property(d3fy_get_object_property($item, 'images'), 'standard_resolution'), 'url');
    				$image->thumbnail = d3fy_get_object_property(d3fy_get_object_property(d3fy_get_object_property($item, 'images'), 'thumbnail'), 'url');
    				$image->link = d3fy_get_object_property($item, 'link');
    				$image->created_time = d3fy_get_object_property($item, 'created_time');
    				$image->code = d3fy_get_object_property($item, 'code');
    				$image->id = d3fy_get_object_property($item, 'id');
    				$images[] = $image;
    			}
    		}
    	} // if ($data)
    } // if ($key)
  } // foreach ($keys as $key)
}
if ($images):

usort($images, array('CSInstagramCarouselManager', 'sortFeedByDate'));
ob_start();

?>

<div <?php echo $attr_container; ?> >
	<?php if ($carousel): ?>
	<div class="d3fy-instagram-carousel loading" id="<?php echo esc_attr($slider_id); ?>"
		data-cycle-fx="carousel"
		data-cycle-carousel-visible="<?php echo esc_attr($columns_desktop); ?>" 
		data-d3fy-carousel-visible-mobile="<?php echo esc_attr($columns_mobile); ?>" 
		data-d3fy-carousel-visible-desktop="<?php echo esc_attr($columns_desktop); ?>" 
		data-d3fy-minwidth-desktop="<?php echo esc_attr($minwidth_desktop); ?>" 
		data-cycle-carousel-fluid=true
		data-cycle-timeout="<?php echo esc_attr($carousel_time); ?>" 
		data-cycle-speed="<?php echo esc_attr($carousel_speed); ?>" 
		data-cycle-auto-height="calc" 
    data-cycle-slides="> .slide" 
		data-cycle-log=false
		>
	<?php else: ?>
	<div class="d3fy-instagram-feed" id="<?php echo esc_attr($slider_id); ?>">
	<?php endif; ?>
		<?php
		$i = 0;
		foreach ($images as $image):
			$maxClasses = array('slide');
			if ($i >= $maxDesktop) $maxClasses[] = 'overmax-desktop';
			if ($i >= $maxMobile) $maxClasses[] = 'overmax-mobile';
		?>
		<div class="<?php echo esc_attr(implode(' ', $maxClasses)); ?>">
			<a href="<?php echo esc_url($image->link); ?>" class="instagram-link" target="_blank" style="background-image: url('<?php echo esc_attr($image->standard); ?>');">
				<img src="<?php echo esc_attr($image->standard); ?>" alt="" />
			</a>
		</div>
		<?php $i++; endforeach; ?>
	</div>
</div>

<?php

$output = ob_get_contents();
ob_end_clean();

$css = $ElementAdmin->getElementCSS();
if ($css) :

?>

<style media="screen">
<?php echo wp_filter_nohtml_kses( $css ); ?>

</style>

<?php

endif;
echo $output;

endif; /* if ($images): */