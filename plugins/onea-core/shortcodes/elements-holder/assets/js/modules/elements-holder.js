(function($) {
	'use strict';

	var elementsHolder = {};
	eltdf.modules.elementsHolder = elementsHolder;

	elementsHolder.eltdfInitElementsHolderResponsiveStyle = eltdfInitElementsHolderResponsiveStyle;


	elementsHolder.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitElementsHolderResponsiveStyle();
	}

	/*
	 **	Elements Holder responsive style
	 */
	function eltdfInitElementsHolderResponsiveStyle(){
		var elementsHolder = $('.eltdf-elements-holder');

		if(elementsHolder.length){
			elementsHolder.each(function() {
				var thisElementsHolder = $(this),
					elementsHolderItem = thisElementsHolder.children('.eltdf-eh-item'),
					style = '',
					responsiveStyle = '';

				elementsHolderItem.each(function() {
					var thisItem = $(this),
						thisItemSurface = thisItem.find('.eltdf-elements-holder-background-outer'),
						itemClass = '',
						largeLaptop = '',
						smallLaptop = '',
						ipadLandscape = '',
						ipadPortrait = '',
						mobileLandscape = '',
						mobilePortrait = '',

						largeLaptopSurface = '',
                        smallLaptopSurface = '',
                        ipadLandscapeSurface = '',
                        ipadPortraitSurface = '',
                        mobileLandscapeSurface = '',
                        mobilePortraitSurface = '';

                    if(thisItem.is('.eltdf-eh-expander')) {
                        $(window).scroll(function(){
                            var elOffset = thisItem.offset().top+200;

                            var scrollOffset = eltdf.scroll + window.innerHeight,
                                scrollBelow = scrollOffset >= elOffset;

                            if (scrollBelow) {
                                thisItem.addClass('eltdf-eh-expander-on');
                            }
                        });
                    }

					if (typeof thisItem.data('item-class') !== 'undefined' && thisItem.data('item-class') !== false) {
						itemClass = thisItem.data('item-class');
					}
					if (typeof thisItem.data('1367-1600') !== 'undefined' && thisItem.data('1367-1600') !== false) {
						largeLaptop = thisItem.data('1367-1600');
					}
					if (typeof thisItem.data('1025-1366') !== 'undefined' && thisItem.data('1025-1366') !== false) {
						smallLaptop = thisItem.data('1025-1366');
					}
					if (typeof thisItem.data('769-1024') !== 'undefined' && thisItem.data('769-1024') !== false) {
						ipadLandscape = thisItem.data('769-1024');
					}
					if (typeof thisItem.data('681-768') !== 'undefined' && thisItem.data('681-768') !== false) {
						ipadPortrait = thisItem.data('681-768');
					}
                    if (typeof thisItem.data('481-680') !== 'undefined' && thisItem.data('481-680') !== false) {
                        mobileLandscape = thisItem.data('481-680');
                    }
					if (typeof thisItem.data('480') !== 'undefined' && thisItem.data('480') !== false) {
                        mobilePortrait = thisItem.data('480');
					}

                    if (typeof thisItemSurface.data('1367-1600') !== 'undefined' && thisItemSurface.data('1367-1600') !== false) {
                        largeLaptopSurface = thisItemSurface.data('1367-1600');
                    }
                    if (typeof thisItemSurface.data('1025-1366') !== 'undefined' && thisItemSurface.data('1025-1366') !== false) {
                        smallLaptopSurface = thisItemSurface.data('1025-1366');
                    }
                    if (typeof thisItemSurface.data('769-1024') !== 'undefined' && thisItemSurface.data('769-1024') !== false) {
                        ipadLandscapeSurface = thisItemSurface.data('769-1024');
                    }
                    if (typeof thisItemSurface.data('681-768') !== 'undefined' && thisItemSurface.data('681-768') !== false) {
                        ipadPortraitSurface = thisItemSurface.data('681-768');
                    }
                    if (typeof thisItemSurface.data('481-680') !== 'undefined' && thisItemSurface.data('481-680') !== false) {
                        mobileLandscapeSurface = thisItemSurface.data('481-680');
                    }
                    if (typeof thisItemSurface.data('480') !== 'undefined' && thisItemSurface.data('480') !== false) {
                        mobilePortraitSurface = thisItemSurface.data('480');
                    }

					if(largeLaptop.length || smallLaptop.length || ipadLandscape.length || ipadPortrait.length || mobileLandscape.length || mobilePortrait.length) {

						if(largeLaptop.length) {
							responsiveStyle += "@media only screen and (min-width: 1367px) and (max-width: 1600px) {.eltdf-eh-item."+itemClass+" .eltdf-eh-item-content { padding: "+largeLaptop+" !important; } }";
						}
						if(smallLaptop.length) {
							responsiveStyle += "@media only screen and (min-width: 1025px) and (max-width: 1366px) {.eltdf-eh-item."+itemClass+" .eltdf-eh-item-content { padding: "+smallLaptop+" !important; } }";
						}
						if(ipadLandscape.length) {
							responsiveStyle += "@media only screen and (min-width: 769px) and (max-width: 1024px) {.eltdf-eh-item."+itemClass+" .eltdf-eh-item-content { padding: "+ipadLandscape+" !important; } }";
						}
						if(ipadPortrait.length) {
							responsiveStyle += "@media only screen and (min-width: 681px) and (max-width: 768px) {.eltdf-eh-item."+itemClass+" .eltdf-eh-item-content { padding: "+ipadPortrait+" !important; } }";
						}
                        if(mobileLandscape.length) {
                            responsiveStyle += "@media only screen and (min-width: 481px) and (max-width: 680px) {.eltdf-eh-item."+itemClass+" .eltdf-eh-item-content { padding: "+mobileLandscape+" !important; } }";
                        }
						if(mobilePortrait.length) {
							responsiveStyle += "@media only screen and (max-width: 480px) {.eltdf-eh-item."+itemClass+" .eltdf-eh-item-content { padding: "+mobilePortrait+" !important; } }";
						}
					}

                    if(largeLaptopSurface.length || smallLaptopSurface.length || ipadLandscapeSurface.length || ipadPortraitSurface.length || mobileLandscapeSurface.length || mobilePortraitSurface.length) {

                        if(largeLaptopSurface.length) {
                            responsiveStyle += "@media only screen and (min-width: 1367px) and (max-width: 1600px) {.eltdf-eh-item."+itemClass+" .eltdf-elements-holder-background-outer { padding: "+largeLaptopSurface+" !important; } }";
                        }
                        if(smallLaptopSurface.length) {
                            responsiveStyle += "@media only screen and (min-width: 1025px) and (max-width: 1366px) {.eltdf-eh-item."+itemClass+" .eltdf-elements-holder-background-outer { padding: "+smallLaptopSurface+" !important; } }";
                        }
                        if(ipadLandscapeSurface.length) {
                            responsiveStyle += "@media only screen and (min-width: 769px) and (max-width: 1024px) {.eltdf-eh-item."+itemClass+" .eltdf-elements-holder-background-outer { padding: "+ipadLandscapeSurface+" !important; } }";
                        }
                        if(ipadPortraitSurface.length) {
                            responsiveStyle += "@media only screen and (min-width: 681px) and (max-width: 768px) {.eltdf-eh-item."+itemClass+" .eltdf-elements-holder-background-outer { padding: "+ipadPortraitSurface+" !important; } }";
                        }
                        if(mobileLandscapeSurface.length) {
                            responsiveStyle += "@media only screen and (min-width: 481px) and (max-width: 680px) {.eltdf-eh-item."+itemClass+" .eltdf-elements-holder-background-outer { padding: "+mobileLandscapeSurface+" !important; } }";
                        }
                        if(mobilePortraitSurface.length) {
                            responsiveStyle += "@media only screen and (max-width: 480px) {.eltdf-eh-item."+itemClass+" .eltdf-elements-holder-background-outer { padding: "+mobilePortraitSurface+" !important; } }";
                        }
                    }

                    if (typeof eltdf.modules.common.eltdfOwlSlider === "function") { // if owl function exist
                        var owl = thisItem.find('.eltdf-owl-slider');
                        if (owl.length) { // if owl is in elements holder
                            setTimeout(function () {
                                owl.trigger('refresh.owl.carousel'); // reinit owl
                            }, 100);
                        }
                    }

				});

				if(responsiveStyle.length) {
					style = '<style type="text/css">'+responsiveStyle+'</style>';
				}

				if(style.length) {
                    $('head').append(style);
                }
			});
		}
	}

})(jQuery);