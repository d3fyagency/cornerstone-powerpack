<?php

/**
 * Element Controls: Posts Advanced
 */
$handle = 'cs-powerpack';

 $args = array(
  'public'   => true,
  // '_builtin' => false
 );
 $all_post_types = get_post_types( $args );

 // don't include media
 unset( $all_post_types['attachment'] );

 $choices = array();

 foreach ($all_post_types as $key => $value) {
   $obj = get_post_type_object( $value );
   $choices[] = array( 'value' => $key, 'label' => $obj->labels->name );
 }

$categories_qry = get_categories( array(
  'orderby' => 'name',
  'order'   => 'asc'
) );

$categories = array(array('value' => '', 'label' => '- select -'));

if(count($categories_qry)){
  foreach($categories_qry as $cat){
    $categories[] = array('value' => $cat->cat_name, 'label' => $cat->cat_name);
  }
}

$controls_array = array(
  'post_type' => array(
    'type' => 'select',
    'ui' => array(
			'title'   => __( 'Post Type', $handle ),
			'tooltip' => __( 'Choose between standard posts or portfolio posts.', $handle ),
		),
    'options' => array(
      'choices' => $choices
    )
	),
	'layout' => array(
    'type' => 'select',
    'ui' => array(
			'title'   => __( 'Layout', $handle ),
			'tooltip' => __( 'Choose between grid and list layouts.', $handle ),
		),
    'options' => array(
      'choices' => array(
				array('value' => 'Grid', 'label' => 'Grid'),
				array('value' => 'List', 'label' => 'List'),
			)
    ),
		'suggest' => 'Grid'
	),
  'list_fields' => array(
    'type' => 'multi-choose',
    'condition' => array('layout' => 'List'),
    'ui' => array(
			'title'   => __( 'List Fields', $handle ),
			'tooltip' => __( 'Choose the post info to display', $handle ),
		),
    'columns' => '5',
    'options' => array(
      'choices' => array(
        array( 'value' => 'title', 'label' => __( 'Title', $handle ) ),
        array( 'value' => 'author', 'label' => __( 'Author', $handle ) ),
        array( 'value' => 'categories', 'label' => __( 'Categories', $handle ) ),
        array( 'value' => 'tags', 'label' => __( 'Tags', $handle ) ),
        array( 'value' => 'date', 'label' => __( 'Date', $handle ) ),
      ),
    ),
  ),
  'include_excerpt' => array(
    'type' => 'toggle',
    'condition' => array('layout' => 'Grid'),
    'ui' => array(
      'title' => __( 'Excerpt Text', $handle ),
      'tooltip' => __( 'Display Excerpt Text', $handle ),
    ),
  ),
  'include_post_meta' => array(
    'type' => 'toggle',
    'condition' => array('layout' => 'Grid'),
    'ui' => array(
      'title' => __( 'Post Meta', $handle ),
      'tooltip' => __( 'Display Post Meta', $handle ),
    ),
  ),

  'display_order' => array(
    'type' => 'select',
    'ui' => array(
			'title'   => __( 'Item Ordering', $handle ),
			'tooltip' => __( 'Select how the posts are ordered by.', $handle ),
		 ),
     'suggest' => 'date-desc',
     'options' => array(
       'choices' => array(
         array( 'value' => 'date-asc', 'label' => __( 'Date - Ascending', $handle ) ),
         array( 'value' => 'date-desc', 'label' => __( 'Date - Descending', $handle ) ),
         array( 'value' => 'title-asc', 'label' => __( 'Title - Ascending', $handle ) ),
         array( 'value' => 'title-desc', 'label' => __( 'Title - Descending', $handle ) ),
         array( 'value' => 'random', 'label' => __( 'Random', $handle ) ),
       )
     )
  ),

  'count' => array(
    'type' => 'select',
    'ui' => array(
			'title'   => __( 'Post Count', $handle ),
			'tooltip' => __( 'Select how many posts to display.', $handle ),
		 ),
     'suggest' => '2',
     'options' => array(
       'choices' => array(
         array( 'value' => '1', 'label' => __( '1', $handle ) ),
         array( 'value' => '2', 'label' => __( '2', $handle ) ),
         array( 'value' => '3', 'label' => __( '3', $handle ) ),
         array( 'value' => '4', 'label' => __( '4', $handle ) )
       )
     )
  ),

  'offset' => array(
    'type' => 'text',
    'ui' => array(
			'title'   => __( 'Offset', $handle ),
			'tooltip' => __( 'Enter a number to offset initial starting post of your Recent Posts.', $handle ),
		),
  ),

  'category' => array(
    'type' => 'select',
    'ui' => array(
			'title'   => __( 'Category', $handle ),
			'tooltip' => __( 'To filter your posts by category, enter in the slug of your desired category. To filter by multiple categories, enter in your slugs separated by a comma.', $handle ),
		),
    'options' => array(
      'choices' => $categories
    ),
  ),

  'orientation' => array(
    'type' => 'choose',
    'ui' => array(
			'title'   => __( 'Orientation', $handle ),
			'tooltip' => __( 'Select the orientation or your Recent Posts.', $handle ),
		),
    'suggest' => 'horizontal',
    'options' => array(
      'columns' => '2',
      'choices' => array(
        array( 'value' => 'horizontal', 'label' => __( 'Horizontal', $handle ), 'icon' => fa_entity( 'arrows-h' ) ),
        array( 'value' => 'vertical',   'label' => __( 'Vertical', $handle ),   'icon' => fa_entity( 'arrows-v' ) )
      )
    )
  ),

  'no_image' => array(
    'type' => 'toggle',
    'ui' => array(
			'title'   => __( 'Remove Featured Image', $handle ),
			'tooltip' => __( 'Select to remove the featured image.', $handle ),
		),
  ),

  'fade' => array(
    'type' => 'toggle',
    'ui' => array(
			'title'   => __( 'Fade Effect', $handle ),
			'tooltip' => __( 'Select to activate the fade effect.', $handle ),
		),
  ),

);

$taxonomies_controls = array();
$taxonomies_qry = get_taxonomies();

if(count($taxonomies_qry)){
  $taxonomies = array(array('value' => '', 'label' => '- select -'));

  foreach($taxonomies_qry as $t){
    $taxonomies[] = array('value' => $t, 'label' => $t);
  }

  $taxonomies_controls['taxonomy'] = array(
    'type' => 'select',
    'ui'  => array(
      'title'   => __( 'Taxonomy', $handle ),
      'tooltip' => __( 'Enter the taxonomy to use as filter.', $handle ),
    ),
    'options' => array(
      'choices' => $taxonomies
    ),
  );

  $taxonomies_controls['taxonomy_field'] = array(
    'type' => 'select',
    'ui'  => array(
      'title'   => __( 'Taxonomy Field', $handle ),
      'tooltip' => __( 'Enter the taxonomy field to use as filter.', $handle ),
    ),
    'options' => array(
      'choices' => array(
        array('value' => '', 'label' => '- select -'),
        array('value' => 'term_id', 'label' => 'term_id'),
        array('value' => 'name', 'label' => 'name'),
        array('value' => 'slug', 'label' => 'slug'),
        array('value' => 'term_taxonomy_id', 'label' => 'term_taxonomy_id'),
      )
    ),
  );

  $taxonomies_controls['taxonomy_terms'] = array(
    'type' => 'text',
    'ui' => array(
      'title'   => __( 'Taxonomy Terms', $handle ),
      'tooltip' => __( 'Enter the taxonomy terms separated by spaces to use as filter.', $handle ),
    ),
  );
}

return array_merge($controls_array, $taxonomies_controls);
