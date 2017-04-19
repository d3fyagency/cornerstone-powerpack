<?php

$modal_id = rand( 0, 1000 );

$parsedContent = html_entity_decode( $modalcontent );
$parsedContent = str_replace(
  array( '&lsqb;', '&rsqb;', "\r", "\n" ),
  array( '[', ']', '', '' ),
  $parsedContent
);
$parsedContent = do_shortcode( $parsedContent );
$parsedContent = addslashes( $parsedContent );

if ( $display_on === 'button' ):

	if ( $button_size !== 'default' ) {
		$btn_class = 'x-btn ' . $button_size;
	} else {
		$btn_class = 'x-btn';
	}
?>

<div <?php echo cs_atts( 
			array( 'id' => $id, 'class' => $class, 'style' => $style ) ); ?>
>
	<a id="csm-btn-<?= $modal_id ?>"
		href="#<?= $modal_id ?>"
		class="csm-vex-btn <?= $btn_class ?>">
		<?= $button_text ?>
	</a>
	<script>
		jQuery(document).ready(function($) {
			document.getElementById('csm-btn-'+<?= $modal_id ?>)
					.addEventListener('click', function() {
						vex.dialog.alert({
							unsafeMessage: '<?= $parsedContent; ?>',
							className: 'vex-theme-<?= $theme ?>'
						})
					})
		})
	</script>
</div>
<?php elseif ($display_on === 'element'): ?>
	<script>
		jQuery(document).ready(function($) {
			$('<?= $identifier ?>').click(function() {
				vex.dialog.alert({
					unsafeMessage: '<?= $parsedContent; ?>',
					className: 'vex-theme-<?= $theme ?>'
				})
			})
		})
	</script>
<?php else: ?>
	<script>
		setTimeout(function() {
			vex.dialog.alert({
				unsafeMessage: '<?= $parsedContent; ?>',
				className: 'vex-theme-<?= $theme ?>'
			})
		}, <?= $delay * 1000 ?>)
	</script>
<?php endif; ?>
