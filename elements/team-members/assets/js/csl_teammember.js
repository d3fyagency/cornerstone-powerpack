jQuery(document).ready(function($) {
  // Lightbox Settings
  var teamMemberLightbox = null;
  var modalTmpl = '<div class="cspplity cspplity-teammember" role="dialog" aria-label="Dialog Window (Press escape to close)" tabindex="-1"><div class="cspplity-wrap" data-cspplity-close role="document"><div class="cspplity-loader" aria-hidden="true">Loading...</div><div class="cspplity-container"><div class="cspplity-content"></div></div></div></div>';
	// Open Member Content
	$('.csl-teammember .teammember-image-wrap').on('click', function(e) {
		e.preventDefault();
		var element = $(this).closest(".csl-teammember");
		teamMemberLightbox = cspplity($(".teammember-bio-overlay", $(element)).html(), { "template": modalTmpl });
		$(this).closest('.csl-teammember').addClass('open');
	});
	// Close Member Content
	$(document).on("click", ".teammember-bio-container .t-close", function(e){
  	e.preventDefault();
		teamMemberLightbox.close();
		$('.csl-teammember.open').removeClass('open');
	});
});