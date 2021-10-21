(function($) {
    'use strict';

    var productList = {};
    eltdf.modules.productList = productList;

    productList.eltdfOnDocumentReady = eltdfOnDocumentReady;

    $(document).ready(eltdfOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
        eltdfInitProductListFilter().init();
        eltdfPLFadeIn();
    }

    function eltdfInitProductListFilter(){
        var productList = $('.eltdf-pl-holder');
        var queryParams = {};

        var initFilterClick = function(thisProductList){
            var links = thisProductList.find('.eltdf-pl-categories a, .eltdf-pl-ordering a');

            links.on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                var clickedLink = $(this);
                if(!clickedLink.hasClass('active')) {
                    initMainPagFunctionality(thisProductList, clickedLink);
                }
            });
        };

        //used for replacing content after ajax call
        var eltdfReplaceStandardContent = function(thisProductListInner, loader, responseHtml) {
            thisProductListInner.html(responseHtml);
            loader.fadeOut();
            thisProductListInner.removeClass('eltdf-ajax-loading');
        };

        //used for replacing content after ajax call
        var eltdfReplaceMasonryContent = function(thisProductListInner, loader, responseHtml) {


            //todo
            /*
            thisProductListInner.find('.eltdf-pli').remove();

            thisProductListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
            eltdfProductImageSizes(thisProductListInner);
            setTimeout(function() {
                thisProductListInner.isotope('layout');
                loader.fadeOut();
                thisProductListInner.removeClass('eltdf-ajax-loading');
            }, 400);

            */
        };

        //used for storing parameters in global object
        var eltdfReturnOrderingParemeters = function(queryParams, data){

            for (var key in data) {
                queryParams[key] = data[key];
            }

            return queryParams;
        };

        var initMainPagFunctionality = function(thisProductList, clickedLink){
            var thisProductListInner = thisProductList.find('.eltdf-pl-outer');

            var loadData = eltdf.modules.common.getLoadMoreData(thisProductList),
                loader = thisProductList.find('.eltdf-prl-loading');

            //store parameters in global object
            eltdfReturnOrderingParemeters(queryParams, clickedLink.data());

            //set paremeters for new query passed through ajax
            loadData.category = queryParams.category !== undefined ? queryParams.category : '';
            loadData.metaKey = queryParams.metaKey !== undefined ? queryParams.metaKey : '';

            thisProductListInner.addClass('eltdf-ajax-loading');
            loader.fadeIn();
            var ajaxData = eltdf.modules.common.setLoadMoreAjaxData(loadData, 'eltdf_product_ajax_load_category');

            $.ajax({
                type: 'POST',
                data: ajaxData,
                url: eltdfGlobalVars.vars.eltdfAjaxUrl,
                success: function (data) {
                    var response = $.parseJSON(data),
                        responseHtml =  response.html;

                    thisProductList.waitForImages(function(){
                        clickedLink.parent().siblings().find('a').removeClass('active');
                        clickedLink.addClass('active');
                        if(thisProductList.hasClass('eltdf-masonry-layout')) {
                            eltdfReplaceMasonryContent(thisProductListInner, loader, responseHtml);
                        }else{
                            eltdfReplaceStandardContent(thisProductListInner, loader, responseHtml);
                        }
                        //eltdfAddingToCart();
                        //eltdfAddingToWishlist();
                    });

                }
            });
        };

        var initMobileFilterClick = function(cliked, holder){
            cliked.on('click',function(){
                if(eltdf.windowWidth <= 768) {
                    if(!cliked.hasClass('opened')){
                        cliked.addClass('opened');
                        holder.slideDown();
                    }else{
                        cliked.removeClass('opened');
                        holder.slideUp();
                    }
                }
            });
        };

        return {
            init: function () {
                if (productList.length) {
                    productList.each(function () {
                        var thisProductList = $(this);
                        initFilterClick(thisProductList);
                        initMobileFilterClick(thisProductList.find('.eltdf-pl-ordering-outer h6'), thisProductList.find('.eltdf-pl-ordering'));
                        initMobileFilterClick(thisProductList.find('.eltdf-pl-categories-label'),thisProductList.find('.eltdf-pl-categories-label').next('ul'));
                    });
                }
            }

        };
    }

    /**
     * Initializes list article random appear animation
     */
    function eltdfPLFadeIn(){
        var fadeinProductList = $('.eltdf-enable-rand-fadein');

        if (fadeinProductList.length){
            fadeinProductList.each(function () {
                var thisPL = $(this),
                    products = thisPL.find('.eltdf-pli');

                var randomize = function(n) {
                    var queue = new Array();

                    for (var i = 0; i < numberOfItems; i++) {
                        var queueElement = Math.floor(Math.random()*numberOfItems);

                        if( jQuery.inArray(queueElement, queue) > 0 ) {
                            --i;
                        } else {
                            queue.push(queueElement);
                        }
                    }
                    return queue;
                };

                var numberOfItems = products.length,
                    r = randomize(numberOfItems);

                products.each(function(i) {
                    var product = $(this);

                    setTimeout(function(){
                        product.addClass('eltdf-fade-out-cover').one(eltdf.animationEnd, function() {
                            $(this).addClass('eltdf-remove-cover');
                        });
                    },  r[i]*100);
                });
            });
        }
    }

})(jQuery);