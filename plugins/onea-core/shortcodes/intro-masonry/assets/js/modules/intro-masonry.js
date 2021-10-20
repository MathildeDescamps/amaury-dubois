(function($) {
	'use strict';
	
	var introMasonry = {};
	eltdf.modules.introMasonry = introMasonry;
	
	introMasonry.eltdfOnDocumentReady = eltdfOnDocumentReady;

    $(document).ready(eltdfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitIntroMasonry();
	}
	
	var eltdfInitIntroMasonry = function() {
		var imHolder = $('.eltdf-intro-masonry');

        if(imHolder.length) {

        	var imItem = imHolder.find('.eltdf-im-image');


            //Move sections below and remove elements
            var itemNum = imItem.length,
				delayRmv=(itemNum)*120+300;

            $('html, body').css({
                overflow: 'hidden',
                height: '100%'
            });

            imHolder.waitForImages(function(){
                imItem.each(function(){
                    $(this).addClass('animated');
                });

                // Wait till offset is calculated for scroll bound functions, then move elements so they can slide up
                // setTimeout(
                //     function () {
                //         $('.eltdf-im-slideup').css({
                //             'transform':'translateY(100%)',
                //         });
                //     }, delayRmv/2
                // );

                setTimeout(
                    function () {
                        // $('.eltdf-im-slideup').css({
                        //     'transform':'translateY(0)',
                        //     'transition':'transform 2s cubic-bezier(0.54, 0.39, 0.04, 1.01)'
                        // });
                        imHolder.css({
                            'transform':'translateY(100%)',
                            'transition':'all 1.25s cubic-bezier(0.54, 0.39, 0.04, 1)'
                        });

                        $('html, body').css({
                            overflow: 'auto',
                            height: 'auto'
                        });

                    }, delayRmv
                );
            });
		}
	};
	
})(jQuery);