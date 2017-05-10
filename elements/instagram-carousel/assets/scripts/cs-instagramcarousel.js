jQuery(document).ready(function($){
	
	var cycleCarouselLoaded = false;
	var loadCarousels = null;
	
	// get viewport size (with scrollbar, to match media queries)
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
	
	// get numeric value of string
  var getNumVal = function(something) {
    var results = parseInt(something, 10);
    return (isNaN(results)) ? 0 : results;
  };
  
  // check for resize, but wait a bit until resize is finished
  $(window).resize(function() {
  	if (this.csppResizeTo) {
  		clearTimeout(this.csppResizeTo);
  	}
  	this.csppResizeTo = setTimeout(function() {
  		$(this).trigger('csppResizeEnd');
  	}, 250);
  });
    
  // load responsive cycle slider
  loadCarousels = function() {
    var viewportSize = getViewportSize();
    var wasAlreadyLoaded = cycleCarouselLoaded;
    $(".d3fy-instagram-carousel").each(function(){
      var slider = $(this);
      var visibleMobile = getNumVal(slider.attr("data-d3fy-carousel-visible-mobile"));
      var visibleDesktop = getNumVal(slider.attr("data-d3fy-carousel-visible-desktop"));
      var desktopMin = getNumVal(slider.attr("data-d3fy-minwidth-desktop"));
      var visibleTarget = (viewportSize.width >= desktopMin) ? visibleDesktop : visibleMobile;
      var visibleCurrent = getNumVal(slider.attr("data-cycle-carousel-visible"));
      if (wasAlreadyLoaded && visibleTarget !== visibleCurrent) {
        slider.cycle("destroy");
        cycleCarouselLoaded = false;
      }
      if (!cycleCarouselLoaded) {
        slider.attr("data-cycle-carousel-visible", visibleTarget);
        slider.cycle();
        if (!wasAlreadyLoaded) {
	        setTimeout(function() {
				    $('.d3fy-instagram-carousel').removeClass('loading');
				  }, 500);
        }
      }
    });
    cycleCarouselLoaded = true;
  };
  loadCarousels();
  
  // toggle menu JavaScript and styles as needed on window resize
  $(window).bind('csppResizeEnd', function() {
  	loadCarousels();
  });
  
});