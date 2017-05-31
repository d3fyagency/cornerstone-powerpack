<?php

/**
 * Shortcode definition
 */

$ElementAdmin = CSGoogleMapStyledManager::getInstance();
$ElementAdmin->setGAPIKey($google_api_key);
$count = $ElementAdmin->getNewElementCount();
$css_prefix = '#cs-content .cs-google-maps-styled ';

// set container classes, include main CS element positioning classes
$classes = array( 'cs-google-maps-styled' );
if ( $class ) $classes[] = $class;
$attr_container = cs_atts( array(
	'class'	=> esc_attr( implode( ' ', $classes ) ),
) );

// apply CSS
if (!$map_height) $map_height = '400px;';
$ElementAdmin->addCSSRule(
	$css_prefix.'#cspp-gmap-'.intval($count).'-canvas',
	'min-height: '.$map_height.'; background-color: #eee;'
);

$script_url = 'https://maps.googleapis.com/maps/api/js?v=3';
if ( $google_api_key ) {
  $api_key = esc_attr( $google_api_key );
  $script_url = add_query_arg( array( 'key' => $api_key ), $script_url );
}
wp_register_script( 'cs-google-maps', $script_url );
wp_enqueue_script( 'cs-google-maps' );

// set main slider attributes
$attr_map = cs_atts( array(
	'id'		=> $id,
	'class'	=> 'cs-google-maps-styled cs-google-maps-styled' . $count,
	'style'	=> $style,
) );

$map_js = array(
  'lat'         => ( $map_latitude     != ''     ) ? $map_latitude : '40.7056308',
  'lng'         => ( $map_longitude    != ''     ) ? $map_longitude : '-73.9780035',
  'drag'        => ( $map_draggable    == 'true' ),
  'zoom'        => ( $map_zoom         != ''     ) ? $map_zoom : '7',
  'zoomControl' => ( $map_zoom_control == 'true' ),
  'zoomLock'		=> ( $map_zoom_lock == 'true' ),
);

do_shortcode( $content );
$map_js['markers'] = $ElementAdmin->getElementItems();
$map_js['counter'] = $count;

$style_json = str_replace(
	array('&lsqb;', '&rsqb;', '<br>', '<br />'),
	array('[', ']', '', ''),
	html_entity_decode($map_style_json)
);
$style_json = json_decode($style_json);
$map_js['map_style_json'] = ($style_json) ? $style_json : '';
$ElementAdmin->addScriptData($map_js, $count);
$script_handle = 'cspp-googlemapsstyled-scripts';
$v = '1.0.3';
// $v = time();

wp_deregister_script( $script_handle );
wp_register_script(
	$script_handle, 
  CS_GOOGEMAPSSTYLED_URL . 'assets/scripts/cs-googlemapsstyled-min.js', 
  array('cs-google-maps', 'jquery'), $v, true
);
wp_enqueue_script( $script_handle );
wp_localize_script( $script_handle, 'CSPPStyledGMaps', $ElementAdmin->getScriptData() );

ob_start();
?>

<div <?php echo $attr_container; ?> >
	<div <?php echo trim( $attr_map ); ?> >
		
		<div id="cspp-gmap-<?php echo esc_attr( $count ); ?>-wrap">
			<div id="cspp-gmap-<?php echo esc_attr( $count ); ?>-canvas" class="google-maps"></div>
		</div>
		
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