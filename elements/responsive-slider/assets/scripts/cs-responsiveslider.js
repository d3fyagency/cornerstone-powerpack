jQuery(document).ready(function($){
    
  // get viewport size (with scrollbar, to match media queries, minus WP admin bar)
	var getViewportSize = function(){
		var e = window, a = 'inner';
		if (!('innerWidth' in window)){
			a = 'client';
			e = document.documentElement || document.body;
		}
		var viewportSize = { 'width': e[a+'Width'], 'height': e[a+'Height'] };
		var wpAdminBarHeight = $("#wpadminbar").height();
		if (wpAdminBarHeight) { viewportSize.height -= wpAdminBarHeight; }
		return viewportSize;
	};
	
	// add custom event to detect when resize stops
  $(window).resize(function() {
  	if (this.resizeTO) {
  		clearTimeout(this.resizeTO);
  	}
  	this.resizeTO = setTimeout(function() {
  		$(this).trigger('resizeEnd');
  	}, 400);
  });
  
  // set height for full viewport height sliders
  $(".cs-responsive-slider-fullheight").addClass("with-js");
	var setFSSliderHeight = function(){
		$(".cs-responsive-slider-fullheight").height(getViewportSize().height);
	};
	setFSSliderHeight();
	
	// update things again after window resize
  $(window).bind('resizeEnd', function() {
  	setFSSliderHeight();
  });
  
  // remove loading class after a couple seconds
  setTimeout(function() {
    $('.x-flexslider').removeClass('loading');
  }, 1500);
    
});