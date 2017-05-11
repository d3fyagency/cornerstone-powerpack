(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	 $(document).ready(function(){
  	 var elementsForm = $('form[name="frm-element-list"]');
  	 $('.tco-form-control').on('change', elementsForm, function(e){
    	 var container = $(this).closest("label");
    	 container.find('.saving-text, .saved-text').remove();
    	 container.append('<span class="saving-text"><i class="fa fa-refresh fa-spin"></i> Saving...</span>');
    	 $.post(elementsForm.attr('action'), elementsForm.serialize(), function(data, textStatus){
					setTimeout(function(){
  					container.find('.saving-text').remove();
  					container.append('<span class="saved-text">Saved!</span>');
  					setTimeout(function(){
    					container.find('.saved-text').fadeOut(500, function(){
      					container.find('.saved-text').remove();
    					});
  					}, 2000);
					}, 500);
				});
     });
	 });
	 
	 /*
	 $(document).ready(function(){
		 var loadingOverlayMarkup = $('<div id="cornerstone-powerpack-overlay">' +
																		'<div class="cornerstone-powerpack-spinner">' +
																				'<div class="bounce1"></div>' +
																				'<div class="bounce2"></div>' +
																				'<div class="bounce3"></div>' +
																			'</div>' +
																		'</div>');

		var savedText = $('<span class="saved-text">Saved!</span>');

		$('body').append(loadingOverlayMarkup);

		 var elementsForm = $('form[name="frm-element-list"]');
		 
		 $('.tco-form-control').on('change', elementsForm, function(e){
			 loadingOverlayMarkup.show();
				$.post(elementsForm.attr('action'), elementsForm.serialize(), function(data, textStatus){
					loadingOverlayMarkup.hide();
					var container = $(e.target).parents('label:first');
					container.append(savedText);
					setTimeout(function(){
						container.find('.saved-text').remove();
					}, 2000);
				});
		 })
	 });
	 */
	 
})( jQuery );
