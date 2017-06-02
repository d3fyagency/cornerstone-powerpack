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

return array(
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
  'count' => array(
    'type' => 'select',
    'ui' => array(
			'title'   => __( 'Post Count', $handle ),
			'tooltip' => __( 'Select how many posts to display.', $handle ),
		 ),
     'suggest' => '2',
     'options' => array(
       'choices' => array(
         array( 'value' => '1', 'label' => __( '1', csl18n() ) ),
         array( 'value' => '2', 'label' => __( '2', csl18n() ) ),
         array( 'value' => '3', 'label' => __( '3', csl18n() ) ),
         array( 'value' => '4', 'label' => __( '4', csl18n() ) )
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
    'type' => 'text',
    'ui' => array(
			'title'   => __( 'Category', $handle ),
			'tooltip' => __( 'To filter your posts by category, enter in the slug of your desired category. To filter by multiple categories, enter in your slugs separated by a comma.', $handle ),
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
        array( 'value' => 'horizontal', 'label' => __( 'Horizontal', csl18n() ), 'icon' => fa_entity( 'arrows-h' ) ),
        array( 'value' => 'vertical',   'label' => __( 'Vertical', csl18n() ),   'icon' => fa_entity( 'arrows-v' ) )
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
