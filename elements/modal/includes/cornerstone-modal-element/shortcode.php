<?php

$modal_id = sanitize_key( 'csppcsm_'.uniqid() );

$parsedContent = html_entity_decode( $modalcontent );
$parsedContent = str_replace(
  array( '&lsqb;', '&rsqb;' ),
  array( '[', ']' ),
  $parsedContent
);

$btn_class = 'x-btn';
if ( $button_size !== 'default' ) $btn_class .= ' '.$button_size;

$template = '<div class="lity theme-'.esc_js($theme).'" role="dialog" aria-label="Dialog Window (Press escape to close)" tabindex="-1"><div class="lity-wrap" data-lity-close role="document"><div class="lity-loader" aria-hidden="true">Loading...</div><div class="lity-container"><div class="lity-content"></div><button class="lity-close" type="button" aria-label="Close (Press escape to close)" data-lity-close>&times;</button></div></div></div>';

$btn_js = '';
ob_start();
if ( $display_on === 'button' ):
?>

<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ) ); ?>>
	<a id="csm-btn-<? echo $modal_id; ?>"
		href="javascript:void(0);"
		class="csm-vex-btn <? echo esc_attr($btn_class); ?>">
		<? echo $button_text; ?>
	</a>
</div>

<?php endif; ?>

<div id="<?php echo $modal_id; ?>" class="lity-hide">
	<div class="csmodal-container">
  	<div class="csmodal-header"></div>
  	<div class="csmodal-content">
  	  <?php echo do_shortcode( $parsedContent ); ?>
  	</div>
  	<div class="csmodal-footer">
    	<a href="javascript:void(0);" id="<? echo $modal_id; ?>-closebtn" class="csm-ok-btn"><span>OK</span></a>
    </div>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
  	var lightbox = null;
		
<?php if ( $display_on === 'button' ): ?>

    $("#csm-btn-<?php echo $modal_id; ?>").click(function(e){
    	e.preventDefault();
    	lightbox = lity("#<?php echo $modal_id; ?>", { template: '<?php echo $template; ?>' });
    });

<?php elseif ($display_on === 'element'): ?>

    $("<? echo $identifier; ?>").click(function(e) {
    	e.preventDefault();
    	lightbox = lity("#<?php echo $modal_id; ?>", { template: '<?php echo $template; ?>' });
    });

<?php else: ?>

    setTimeout(function() {
    	lightbox = lity("#<?php echo $modal_id; ?>", { template: '<?php echo $template; ?>' });
    }, <? echo floatVal($delay) * 1000; ?>);

<?php endif; ?>
		
		$("#<? echo $modal_id; ?>-closebtn").click(function(e){
  		e.preventDefault();
  		if (typeof lightbox !== null){
    		lightbox.close();
      }
		});
	});
</script>