(function($) {
    'use strict';

    var woocommerce = {};
    eltdf.modules.woocommerce = woocommerce;

    woocommerce.eltdfOnDocumentReady = eltdfOnDocumentReady;
	woocommerce.eltdfOnWindowLoad = eltdfOnWindowLoad;

    $(document).ready(eltdfOnDocumentReady);
	$(window).on('load', eltdfOnWindowLoad);


    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
        eltdfInitQuantityButtons();
        eltdfInitSelect2();
	    eltdfInitSingleProductLightbox();
		eltdfInitYithSelec2();
    }

	function eltdfOnWindowLoad() {
		eltdfWooCommerceStickySidebar().init();
        eltdfInitProductListAnimatedShortcode();
	}
	
    /*
    ** Init quantity buttons to increase/decrease products for cart
    */
	function eltdfInitQuantityButtons() {
		$(document).on('click', '.eltdf-quantity-minus, .eltdf-quantity-plus', function (e) {
			e.stopPropagation();
			
			var button = $(this),
				inputField = button.siblings('.eltdf-quantity-input'),
				step = parseFloat(inputField.data('step')),
				max = parseFloat(inputField.data('max')),
				minus = false,
				inputValue = parseFloat(inputField.val()),
				newInputValue;
			
			if (button.hasClass('eltdf-quantity-minus')) {
				minus = true;
			}
			
			if (minus) {
				newInputValue = inputValue - step;
				if (newInputValue >= 1) {
					inputField.val(newInputValue);
				} else {
					inputField.val(0);
				}
			} else {
				newInputValue = inputValue + step;
				if (max === undefined) {
					inputField.val(newInputValue);
				} else {
					if (newInputValue >= max) {
						inputField.val(max);
					} else {
						inputField.val(newInputValue);
					}
				}
			}
			
			inputField.trigger('change');
		});
	}

    /*
    ** Init select2 script for select html dropdowns
    */
	function eltdfInitSelect2() {
		var orderByDropDown = $('.woocommerce-ordering .orderby');
		if (orderByDropDown.length) {
			orderByDropDown.select2({
				minimumResultsForSearch: Infinity
			});
		}
		
		var variableProducts = $('.variations td.value select');
		if (variableProducts.length) {
			variableProducts.select2();
		}

		var dropdownCategories = $('.widget_product_categories select');
		if (dropdownCategories.length) {
			dropdownCategories.select2();
		}
		
		var shippingCountryCalc = $('#calc_shipping_country');
		if (shippingCountryCalc.length) {
			shippingCountryCalc.select2();
		}
		
		var shippingStateCalc = $('.cart-collaterals .shipping select#calc_shipping_state');
		if (shippingStateCalc.length) {
			shippingStateCalc.select2();
		}
	}

	function eltdfInitYithSelec2() {
		$(document).on('click', '.yith-quickview-button', function() {
			setTimeout(function(){ eltdfInitSelect2(); }, 3000);
		});
	}
	
	/*
	 ** Init Product Single Pretty Photo attributes
	 */
	function eltdfInitSingleProductLightbox() {
		var item = $('.eltdf-woo-single-page.eltdf-woo-single-has-pretty-photo .images .woocommerce-product-gallery__image');
		
		if(item.length) {
			item.children('a').attr('data-rel', 'prettyPhoto[woo_single_pretty_photo]');
			
			if (typeof eltdf.modules.common.eltdfPrettyPhoto === "function") {
				eltdf.modules.common.eltdfPrettyPhoto();
			}
		}
	}

    /*
     ** Init Product List Animated Shortcode Layout
     */
    function eltdfInitProductListAnimatedShortcode() {

        var productListAnimatedHolder = $('.eltdf-pla-holder:not(.eltdf-pla-animation-disabled)');

        if(productListAnimatedHolder.length) {
            productListAnimatedHolder.each(function(){
                var productList = $(this),
                    productListItem = productList.children('.eltdf-pla-item');

                productList.animate({opacity: 1}, 1000, 'easeInOutQuad');

                productListItem.appear(function(){
                    $(this).addClass('eltdf-pla-animated');
                });
            });
        }
    }

	/*
** Init sticky sidebar for single product page when single layout is sticky info
*/
	function eltdfWooCommerceStickySidebar(){

		var sswHolder = $('.eltdf-single-product-summary');
		var headerHeightOffset = 0;
		var widgetTopOffset = 0;
		var widgetTopPosition = 0;
		var sidebarHeight = 0;
		var sidebarWidth = 0;
		var objectsCollection = [];

		function addObjectItems() {
			if (sswHolder.length){
				sswHolder.each(function(){
					var thisSswHolder = $(this);
					widgetTopOffset = thisSswHolder.offset().top;
					widgetTopPosition = thisSswHolder.position().top;
					sidebarHeight = thisSswHolder.outerHeight();
					sidebarWidth = thisSswHolder.width();

					objectsCollection.push({'object': thisSswHolder, 'offset': widgetTopOffset, 'position': widgetTopPosition, 'height': sidebarHeight, 'width': sidebarWidth});
				});
			}
		}

		function initStickySidebarWidget() {

			if (objectsCollection.length && eltdf.body.hasClass('eltdf-woo-single-thumb-sticky-info')){
				$.each(objectsCollection, function(i){

					var thisSswHolder = objectsCollection[i].object;
					var thisWidgetTopOffset = objectsCollection[i].offset;
					var thisWidgetTopPosition = objectsCollection[i].position;
					var thisSidebarHeight = objectsCollection[i].height;
					var thisSidebarWidth = objectsCollection[i].width;

					if (eltdf.body.hasClass('eltdf-fixed-on-scroll')) {
						headerHeightOffset = 90;
						if ($('.eltdf-fixed-wrapper').hasClass('fixed')) {
							headerHeightOffset = $('.eltdf-fixed-wrapper.fixed').height();
						}
					} else {
						headerHeightOffset = $('.eltdf-page-header').height();
					}

					if (eltdf.windowWidth > 1024) {

						var sidebarPosition = -(thisWidgetTopPosition - headerHeightOffset - eltdfGlobalVars.vars.eltdfAddForAdminBar - 10); // 10 is arbitrarily value for smooth sticky animation for first scroll
						var stickySidebarHeight = thisSidebarHeight - thisWidgetTopPosition;
						var summaryContentTopMargin = parseInt($('.eltdf-single-product-summary').css('margin-top'));
						var stickySidebarRowHolderHeight = thisSswHolder.parent().outerHeight() - 10 - summaryContentTopMargin - 10; // 10 is arbitrarily value for smooth sticky animation for first scroll and second 10 value is margin top of single product title

						//move sidebar up when hits the end of section row
						var rowSectionEndInViewport = thisWidgetTopOffset - headerHeightOffset - thisWidgetTopPosition - eltdfGlobalVars.vars.eltdfTopBarHeight + stickySidebarRowHolderHeight;

						if ((eltdf.scroll >= thisWidgetTopOffset - headerHeightOffset) && thisSidebarHeight < stickySidebarRowHolderHeight) {
							if(thisSswHolder.children('.summary').hasClass('eltdf-sticky-sidebar-appeared')) {
								thisSswHolder.children('.summary.eltdf-sticky-sidebar-appeared').css({'top': sidebarPosition+'px'});
							} else {
								thisSswHolder.children('.summary').addClass('eltdf-sticky-sidebar-appeared').css({'position': 'fixed', 'top': sidebarPosition+'px', 'width': thisSidebarWidth, 'margin-top': '-10px'}).animate({'margin-top': '0'}, 200);
							}

							if (eltdf.scroll + stickySidebarHeight >= rowSectionEndInViewport) {
								thisSswHolder.children('.summary.eltdf-sticky-sidebar-appeared').css({'position': 'absolute', 'top': stickySidebarRowHolderHeight-stickySidebarHeight+sidebarPosition-headerHeightOffset+'px'});
							} else {
								thisSswHolder.children('.summary.eltdf-sticky-sidebar-appeared').css({'position': 'fixed', 'top': sidebarPosition+'px'});
							}
						} else {
							thisSswHolder.children('.summary').removeClass('eltdf-sticky-sidebar-appeared').css({'position': 'relative', 'top': '0',  'width': 'auto'});
						}
					} else {
						thisSswHolder.children('.summary').removeClass('eltdf-sticky-sidebar-appeared').css({'position': 'relative', 'top': '0',  'width': 'auto'});
					}
				});
			}
		}

		return {
			init: function() {
				addObjectItems();

				initStickySidebarWidget();

				$(window).scroll(function(){
					initStickySidebarWidget();
				});
			},
			reInit: initStickySidebarWidget
		};
	}

})(jQuery);