(function($) {
	'use strict';
	
	var banner = {};
	eltdf.modules.banner = banner;
	
	banner.eltdfInitAnimationHolder = eltdfInitFullHeightBanner;
	
	
	banner.eltdfOnDocumentReady = eltdfOnDocumentReady;
	
	$(document).ready(eltdfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitFullHeightBanner();
	}

	/*
	 *	Init animation holder shortcode
	 */
	function eltdfInitFullHeightBanner(){
		var elements = $('.eltdf-banner-full-height');
		
		if(elements.length){
			elements.each(function(){
				var thisElement = $(this),
                    closestRow = thisElement.closest('.vc_row');

				closestRow.addClass('eltdf-banner-row-holder');

			});
		}
	}
	
})(jQuery);