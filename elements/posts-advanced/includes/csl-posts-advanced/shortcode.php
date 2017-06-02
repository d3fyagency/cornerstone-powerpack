<?php
$handle = 'cs-powerpack';

$id            = ( $id          != ''          ) ? 'id="' . esc_attr( $id ) . '"' : '';
$class         = ( $class       != ''          ) ? 'x-recent-posts cf ' . esc_attr( $class ) : 'x-recent-posts cf';
$style         = ( $style       != ''          ) ? 'style="' . $style . '"' : '';
$count         = ( $count       != ''          ) ? $count : 3;
$category      = ( $category    != ''          ) ? $category : '';
$category_type = ( $type        == 'post'      ) ? 'category_name' : 'portfolio-category';
$offset        = ( $offset      != ''          ) ? $offset : 0;
$orientation   = ( $orientation != ''          ) ? ' ' . $orientation : ' horizontal';
$no_image      = ( $no_image    == 'true'      ) ? $no_image : '';
$fade          = ( $fade        == 'true'      ) ? $fade : 'false';

$js_params = array(
  'fade' => ( $fade == 'true' )
);

$data = cs_generate_data_attributes( 'recent_posts', $js_params );

$q = new WP_Query( array(
  'orderby'          => 'date',
  'post_type'        => "{$type}",
  'posts_per_page'   => "{$count}",
  'offset'           => "{$offset}",
  "{$category_type}" => "{$category}"
) );

$supported_layouts = array('Grid', 'List');

if(in_array($layout, $supported_layouts)){
  require_once( realpath(dirname(__FILE__)) . '/layouts/' . $layout . '.php' );
}
