jQuery(document).ready(function($) {
	// Open Member Content
	$('.csl-teammember .teammember-image-wrap').on('click', function(e) {
		e.preventDefault();
		$(this).closest('.csl-teammember').addClass('open');
	});
	// Close Member Content
	$('.csl-teammember .t-close').on('click', function(e) {
		e.preventDefault();
		$('.csl-teammember.open').removeClass('open');
	});
	// Close when ESC key pressed
	$(document).keydown(function(e) {
    if (e.keyCode == 27) {
    	$('.csl-teammember.open').removeClass('open');
    }
	});
});