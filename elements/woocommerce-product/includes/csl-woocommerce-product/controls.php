<?php

/**
 * Element Controls: Woocommerce Products
 */

$handle = 'cs-powerpack';

$products_qry = get_posts(array( 'post_type' => 'product'));

$products = array();

if(count($products_qry)){
  foreach($products_qry as $p){
    $products[] = array(
      'value' => $p->ID,
      'label' => $p->post_title      
    );
  }
}

return array(
  'product_id' => array(
    'type' => 'choose',
    'ui' => array(
			'title'   => __( 'Product to Display', $handle ),
			'tooltip' => __( 'Select the product to display.', $handle ),
		),
    'options' => array(
      'columns' => '2',
      'choices' => $products
    )
  ),
  'product_image_height' => array(
    'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Product Image Height', 'cs-powerpack' ),
			'tooltip' => __( 'Set the height of the product image (e.g. 300px or 50%).', 'cs-powerpack' ),
		)
  ),
  'product_info_position' => array(
    'type'  =>  'choose',
    'ui' => array(
			'title'   => __( 'Product Name and Price Position', $handle ),
			'tooltip' => __( 'Select where the product name and price are going to be displayed.', $handle ),
		),
    'options' => array(
      'columns' => '2',
      'choices' => array(
        array('value' => 'top', 'label' => 'Top'),
        array('value' => 'bottom', 'label' => 'Bottom'),
      )
    ),
  ),

  'product_name_font_size' => array(
    'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Product Name Font Size', 'cs-powerpack' ),
			'tooltip' => __( 'Set the font size of the product name (e.g. 12px or 1em).', 'cs-powerpack' ),
		)
  ),

  'product_name_color' => array(
    'type'    => 'color',
		'ui' => array(
			'title'   => __( 'Product Name Color', 'cs-powerpack' ),
			'tooltip' => __( 'Choose color for the product name.', 'cs-powerpack' ),
		)
  ),

  'product_price_font_size' => array(
    'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Product Price Font Size', 'cs-powerpack' ),
			'tooltip' => __( 'Set the font size of the product price (e.g. 12px or 1em).', 'cs-powerpack' ),
		)
  ),

  'product_price_color' => array(
    'type'    => 'color',
		'ui' => array(
			'title'   => __( 'Product Price Color', 'cs-powerpack' ),
			'tooltip' => __( 'Choose color for the product price.', 'cs-powerpack' ),
		)
  ),

  'display_product_short_desc' => array(
    'type' => 'toggle',
    'ui' => array(
			'title'   => __( 'Show Product Short Description', $handle ),
			'tooltip' => __( 'Select to show product short description', $handle ),
		),
  ),

  'product_short_desc_font_size' => array(
    'condition' => array('display_product_short_desc' => true),
    'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Product Description Font Size', 'cs-powerpack' ),
			'tooltip' => __( 'Set the font size of the product description (e.g. 12px or 1em).', 'cs-powerpack' ),
		)
  ),

  'product_short_desc_color' => array(
    'condition' => array('display_product_short_desc' => true),
    'type'    => 'color',
		'ui' => array(
			'title'   => __( 'Product Short Description Color', 'cs-powerpack' ),
			'tooltip' => __( 'Choose color for the product short description.', 'cs-powerpack' ),
		)
  ),
);
