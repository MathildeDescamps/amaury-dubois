(function($) {
	'use strict';
	
	var linked = {};
	eltdf.modules.linked = linked;

	linked.eltdfInitLinkedImages = eltdfInitLinkedImages;


	linked.eltdfOnDocumentReady = eltdfOnDocumentReady;
    linked.eltdfOnWindowResize = eltdfOnWindowResize;
	
	$(document).ready(eltdfOnDocumentReady);
    $(window).resize(eltdfOnWindowResize);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitLinkedImages();
	}

    /*
       All functions to be called on $(window).scroll() should be in this function
   */
    function eltdfOnWindowResize() {
        eltdfInitLinkedImages();

    }

	/**
	 * Linked Images Shortcode
	 */

	function eltdfInitLinkedImages(){

		if($('.eltdf-linked-images').length){

			var holders = $('.eltdf-linked-image-holder');

			holders.each(function(){

				var holder = $(this),
					imageHolder = holder.find('.eltdf-linked-image-image'),
					fullHeight = $('.eltdf-linked-images').data('full-height');

				if (fullHeight === 'yes') {

				    var height = eltdf.windowHeight -  eltdfGlobalVars.vars.eltdfMenuAreaHeight - eltdfGlobalVars.vars.eltdfLogoAreaHeight;

				    if($('.eltdf-paspartu-enabled').length) {
				        height -= parseFloat($('.eltdf-wrapper').css('padding-top'));
				        height -= parseFloat($('.eltdf-wrapper').css('padding-bottom'));
                    }

					imageHolder.height(height);

                    var headerMargin = parseFloat(holder.closest('.eltdf-content').css('margin-top'));

                    if(headerMargin !== 0) {
                        holder.css('margin-top', - headerMargin+'px');
                    }

                    if(eltdf.windowWidth <= 1024) {
                        $('.eltdf-content .eltdf-content-inner > .eltdf-container > .eltdf-container-inner,' +
                            '.eltdf-content .eltdf-content-inner > .eltdf-full-width > .eltdf-full-width-inner').addClass('eltdf-disable-padding');
                    }
				}
			});

			$('.eltdf-linked-images').css('opacity', 1);
		}
	}
	
})(jQuery);