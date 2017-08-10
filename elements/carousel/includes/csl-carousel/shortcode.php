<?php
/**
 * Shortcode: Cornerstone Carousel
 */
?>

<?php

/*
 * => VARS & INFO
 * ---------------------------------------------------------------------------*/


$randnum = rand(0,5000); // doing this for now to namespace multiple elements on the same page. TODO: use a session var, transient or something else.

// Class, ID, Styles
$carousel_id = "csl-carousel-".$randnum;
$class       = "csl-carousel " . $class;

// Toggle
$auto_play   = ( ($auto_play   == 1) ? "true" : "false" );
$auto_valign = ( ($auto_valign == 1) ? true : false );
$loop        = ( ($loop == 1) ? "true" : "false" );
$pause_hover = ( ($pause_hover == 1) ? "true" : "false" );
if ($auto_play_speed === null) $auto_play_speed = 5;
$auto_play_speed = round(floatval($auto_play_speed * 1000), 5);
if ($auto_play_speed < 1000) $auto_play_speed = 1000;

// Pagination
switch ( $pagination_type ) {
  case 'dots':
    $dots = 'true';
    $nums = 'false';
    $nav  = 'false';
    break;

  case 'dots_nav':
    $dots = 'true';
    $nums = 'false';
    $nav  = 'true';
    break;

  case 'numbers':
    $dots = 'true';
    $nums = 'true';
    $nav  = 'false';
    break;

  case 'numbers_nav':
    $dots = 'true';
    $nums = 'true';
    $nav  = 'true';
    break;

  case 'prev_next':
    $dots = 'false';
    $nums = 'false';
    $nav  = 'true';
    break;

  default: // NONE
    $nav  = 'false';
    $dots = 'false';
    $nums = 'false';
    break;
}

// if responsive, guess at best adjustments
if ($make_responsive) {
	$max_items_lg = intval( $max_visible_items );
	$slide_by_lg = intval( $slide_by );
	if ( !$slide_by_lg ) $slide_by_lg = 1;
	// take an educated guess at responsive max visible settings
	if ( $max_items_lg >= 6 ) {
	    $max_items_md = 5;
	    $max_items_sm = 4;
	    $max_items_xs = 2;
	} else if ( $max_items_lg >= 4) {
	    $max_items_md = 3;
	    $max_items_sm = 2;
	    $max_items_xs = 1;
	} else {
	    $max_items_md = ( $max_items_lg >= 2 ) ? 2 : 1;
	    $max_items_sm = 1;
	    $max_items_xs = 1;
	}
	// make sure slide by is never larger than max visible on smaller screens
	$slide_by_md = ( $slide_by_lg > $max_items_md ) ? $max_items_md : $slide_by_lg ;
	$slide_by_sm = ( $slide_by_lg > $max_items_sm ) ? $max_items_sm : $slide_by_lg ;
	$slide_by_xs = ( $slide_by_lg > $max_items_xs ) ? $max_items_xs : $slide_by_lg ;
}


/*
 * => ELEMENT HTML
 * ---------------------------------------------------------------------------*/
?>

<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ) ); ?>>
  <div id="<?= $carousel_id ?>" class="owl-carousel owl-theme">
    <?php echo do_shortcode( $content ); ?>
  </div>
</div>


<?php
/*
 * => SCRIPTS
 * ---------------------------------------------------------------------------*/

// add_action( 'wp_enqueue_scripts', 'csl_carousel_scripts');
?>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $("<?= '#'.$carousel_id ?>").owlCarousel({
      autoplay: <?= $auto_play ?>,
      autoplayTimeout: <?= $auto_play_speed ?>,
      loop: <?= $loop ?>,
      items: <?= $max_visible_items ?>,
      autoplayHoverPause: <?= $pause_hover ?>,
      slideBy: <?= is_numeric($slide_by) ? $slide_by : "'{$slide_by}'" ?>,
      nav: <?= $nav ?>,
      dotsEach: <?= is_numeric($slide_by) ? 'true' : 'false' ?>,
      dots: <?= $dots ?><?php if ($make_responsive): ?>,
      <?php
        // TODO: In order to display the page numbers set `dotData` to true and follow
        //  this tip: https://github.com/OwlCarousel2/OwlCarousel2/issues/158#issuecomment-56747066
        // dotData: true
      ?>
      responsiveClass: true,
      responsive: {
        0:{
          items: <?php echo $max_items_xs; ?>,
          slideBy: <?php echo $slide_by_xs; ?>
        },
        768:{
          items: <?php echo $max_items_sm; ?>,
          slideBy: <?php echo $slide_by_sm; ?>
        },
        992:{
          items: <?php echo $max_items_md; ?>,
          slideBy: <?php echo $slide_by_md; ?>
        },
        1200:{
          items: <?php echo $max_items_lg; ?>,
          slideBy: <?php echo $slide_by_lg; ?>
        }
      }<?php endif; ?>
      
    });

    <?php if ( $auto_valign ) : ?>
      /* Auto Valign */
      var elem = "<?= '#'.$carousel_id ?>";
      var height = $(elem+" .owl-stage-outer").height();
      $(elem+" .owl-item").css({
        'min-height'          : height,
        'display'         : 'flex',
        'align-items'     : 'center',
        'justify-content' : 'center'
      });
    <?php endif; ?>
  });
</script> 


