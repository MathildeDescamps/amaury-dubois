(function($) {
    'use strict';
	
	var shopMasonryGallery = {};
	eltdf.modules.shopMasonryGallery = shopMasonryGallery;
	
	shopMasonryGallery.eltdfInitShopMasonryGallery = eltdfInitShopMasonryGallery;
	
	
	shopMasonryGallery.eltdfOnDocumentReady = eltdfOnDocumentReady;
	
	$(document).ready(eltdfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitShopMasonryGallery();
        eltdfInitSMGStackSlider();
	}
	
	/**
	 * Masonry gallery, init masonry and resize pictures in grid
	 */
	function eltdfInitShopMasonryGallery(){
		var galleryHolder = $('.eltdf-shop-masonry-gallery-holder'),
			gallery = galleryHolder.children('.eltdf-smg-inner'),
			gallerySizer = gallery.children('.eltdf-smg-grid-sizer');
		
		resizeShopMasonryGallery(gallerySizer.width(), gallery, galleryHolder);
		
		if(galleryHolder.length){
			galleryHolder.each(function(){
				var holder = $(this),
					holderGallery = holder.children('.eltdf-smg-inner');
				
				holderGallery.waitForImages(function(){
					holderGallery.animate({opacity:1});
					
					holderGallery.isotope({
						layoutMode: 'packery',
						itemSelector: '.eltdf-smg-item',
						percentPosition: true,
						packery: {
							gutter: '.eltdf-smg-grid-gutter',
							columnWidth: '.eltdf-smg-grid-sizer'
						}
					});
				});
			});
			
			$(window).resize(function(){
				resizeShopMasonryGallery(gallerySizer.width(), gallery, galleryHolder);
				
				gallery.isotope('reloadItems');
			});
		}
	}
	
	function resizeShopMasonryGallery(size, holder, galleryHolder){
		var rectangle_portrait = holder.find('.eltdf-smg-rectangle-portrait'),
			rectangle_landscape = holder.find('.eltdf-smg-rectangle-landscape'),
			rectangle_portrait_big = holder.find('.eltdf-smg-rectangle-portrait-big'),
			square_big = holder.find('.eltdf-smg-square-big'),
			square_small = holder.find('.eltdf-smg-square-small'),
			space_between_items = galleryHolder.data('space-between-items'),
			space_between_items_size = 0,
            ratio = 1.3;

		if (space_between_items == 'tiny') {
			space_between_items_size = 5;
		} else if (space_between_items == 'small') {
			space_between_items_size = 10;
		} else if (space_between_items == 'normal') {
			space_between_items_size = 15;
		} else if (space_between_items == 'medium') {
			space_between_items_size = 20;
		} else if (space_between_items == 'large') {
			space_between_items_size = 25;
		} else if (space_between_items == 'huge') {
			space_between_items_size = 40;
		}
		
		rectangle_portrait.css('height', ratio*size + 2*space_between_items_size);
		
		if (window.innerWidth <= 680) {
			rectangle_landscape.css('height', size/ratio);
		} else {
			rectangle_landscape.css('height', size);
		}
		
		square_big.css('height', 2*size + 2*space_between_items_size);
		
		if (window.innerWidth <= 680) {
			square_big.css('height', square_big.width());
		}

        rectangle_portrait_big.css('height', 2*ratio*size + 2*space_between_items_size);

		if (window.innerWidth <= 680) {
            rectangle_portrait_big.css('height', rectangle_portrait_big.width());
		}

		square_small.css('height', size);
	}

    /**
     * Initializes masonry gallery stack slider logic
     */
    function eltdfInitSMGStackSlider(){
        var holders = $('.eltdf-smg-stack-slider-holder');

        if(holders.length){
            holders.each(function(){
                var thisHolder = $(this),
                    thisSlider = thisHolder.find('.eltdf-stack-slider'),
                    // The info box vars
                    infoBox = thisHolder.find('.eltdf-smg-banner-text-inner'),
                    // Nav and buttons
                    nav = thisHolder.find('.eltdf-slider-nav'),
                    buttonNext = nav.find('.eltdf-next'),
                    buttonPrev = nav.find('.eltdf-prev'),
                    curSlide = thisSlider.find('.eltdf-stack-slide:last'),
                    prevSlide,
                    autoplayTimeout,
                    autoplayInterval,
                    // Slider variables
                    sliderSpeed = 1000,
                    autoplaySpeed = 5000,
                    autoplayOption = 'no',
                    autoplayTimeoutTime = 3000;

                // Function to reset autoplay interval and timeout
                var resetTimeouts = function() {
                    if(autoplayOption == "yes") {
                        clearTimeout(autoplayTimeout);
                        clearInterval(autoplayInterval);
                        autoplayTimeout = setTimeout(function() {
                            autoplayInterval = setInterval(function() {
                                goNext();
                            }, autoplaySpeed);
                        }, autoplayTimeoutTime);
                    }
                };

                var infoBoxMain = function(slideItem) {
                    // Read current slide item data
                    var currentContent = slideItem.find('.eltdf-info-box-data-hidden').html();

                    // Animate infoBox
                    infoBox.removeClass('eltdf-info-box-animate');
                    setTimeout(function() {
                        infoBox.addClass('eltdf-info-box-animate');
                    }, 10);

                    // Set info box information
                    setTimeout(function() {
                        infoBox.html(currentContent);
                    }, 500);
                };

                function goNext() {
                    nav.addClass("disabled");
                    thisSlider.addClass("disabled");
                    curSlide = thisSlider.find('.eltdf-stack-slide:last');
                    curSlide.css({transform: "translateX(100%)", transition: sliderSpeed + "ms ease"});
                    prevSlide = curSlide;
                    curSlide =  curSlide.prev();
                    infoBoxMain(curSlide);
                    setTimeout(function() {
                        prevSlide.css({transform: "", transition: ""});
                        prevSlide.prependTo(thisSlider);
                        nav.removeClass("disabled");
                        thisSlider.removeClass("disabled");
                    }, sliderSpeed + 100);
                }

                function goPrev() {
                    nav.addClass("disabled");
                    thisSlider.addClass("disabled");
                    curSlide = thisSlider.find('.eltdf-stack-slide:first');
                    infoBoxMain(curSlide);
                    curSlide.addClass('prepMoveBack');
                    curSlide.appendTo(thisSlider);
                    setTimeout(function() {
                        curSlide.css({transform: "translateX(0)", transition: sliderSpeed + "ms ease"});
                        prevSlide = curSlide;
                        curSlide =  thisSlider.find('.eltdf-stack-slide:first');
                    }, 100);
                    setTimeout(function() {
                        nav.removeClass("disabled");
                        thisSlider.removeClass("disabled");
                        prevSlide.css({transform: "", transition: ""});
                        prevSlide.removeClass('prepMoveBack');
                    }, sliderSpeed + 100);
                }

                // Nav buttons handling
                buttonNext.on("click", function() {
                    goNext();
                    resetTimeouts();
                });

                buttonPrev.on("click", function() {
                    goPrev();
                    resetTimeouts();
                });

                thisHolder.waitForImages(function() {
                    // Initialize infoBox
                    infoBoxMain(curSlide);
                    setTimeout(function() {
                        infoBox.removeClass('eltdf-info-box-hidden');
                    }, 1000);

                    // Start autoplay if on
                    if (autoplayOption == "yes") {
                        autoplayInterval = setInterval(function() {
                            goNext();
                        }, autoplaySpeed);
                    }
                });


            });
        }
    }

})(jQuery);