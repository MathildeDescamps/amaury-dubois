(function($) {
    "use strict";

    var headerVerticalSliding = {};
    eltdf.modules.headerVerticalSliding = headerVerticalSliding;
	
	headerVerticalSliding.eltdfOnDocumentReady = eltdfOnDocumentReady;

    $(document).ready(eltdfOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
        eltdfVerticalSlidingMenu().init();
    }

    /**
     * Function object that represents vertical menu area.
     * @returns {{init: Function}}
     */
    var eltdfVerticalSlidingMenu = function() {
	    var verticalMenuObject = $('.eltdf-header-vertical-sliding .eltdf-vertical-menu-area');
	
	    var initNavigation = function () {
		    var varticalMenuOpener = verticalMenuObject.find('.eltdf-vertical-menu-opener a'),
			    verticalMenuNavHolder = verticalMenuObject.find('.eltdf-vertical-menu-nav-holder-outer'),
			    menuItemWithChild = verticalMenuObject.find('.eltdf-fullscreen-menu > ul li.has_sub > a'),
			    menuItemWithoutChild = verticalMenuObject.find('.eltdf-fullscreen-menu ul li:not(.has_sub) a');
		
		    //set height of vertical menu holder and initialize perfectScrollbar
		    verticalMenuNavHolder.height(eltdf.windowHeight);
            eltdf.modules.common.eltdfInitPerfectScrollbar().init(verticalMenuNavHolder);
		
		    //set height of vertical menu holder on resize
		    $(window).resize(function () {
			    verticalMenuNavHolder.height(eltdf.windowHeight);
		    });
		
		    varticalMenuOpener.on('click', function (e) {
			    e.preventDefault();
			
			    if (!verticalMenuNavHolder.hasClass('active')) {
				    verticalMenuNavHolder.addClass('active');
				    verticalMenuObject.addClass('opened');
				    if (!eltdf.body.hasClass('page-template-full_screen-php')) {
					    eltdf.modules.common.eltdfDisableScroll();
				    }
			    } else {
				    verticalMenuNavHolder.removeClass('active');
				    verticalMenuObject.removeClass('opened');
				    if (!eltdf.body.hasClass('page-template-full_screen-php')) {
					    eltdf.modules.common.eltdfEnableScroll();
				    }
			    }
		    });
		
		    $('.eltdf-content').on('click', function () {
			    if (verticalMenuNavHolder.hasClass('active')) {
				    verticalMenuNavHolder.removeClass('active');
				    verticalMenuObject.removeClass('opened');
				    if (!eltdf.body.hasClass('page-template-full_screen-php')) {
					    eltdf.modules.common.eltdfEnableScroll();
				    }
			    }
		    });
		
		    //logic for open sub menus in popup menu
		    menuItemWithChild.on('tap click', function (e) {
			    e.preventDefault();
			
			    if ($(this).parent().hasClass('has_sub')) {
				    var submenu = $(this).parent().find('> ul.sub_menu');
				    
				    if (submenu.is(':visible')) {
					    submenu.slideUp(200);
					    $(this).parent().removeClass('open_sub');
				    } else {
					    if ($(this).parent().siblings().hasClass('open_sub')) {
						    $(this).parent().siblings().each(function () {
							    var sibling = $(this);
							    if (sibling.hasClass('open_sub')) {
								    var openedUl = sibling.find('> ul.sub_menu');
								    openedUl.slideUp(200);
								    sibling.removeClass('open_sub');
							    }
							    if (sibling.find('.open_sub')) {
								    var openedUlUl = sibling.find('.open_sub').find('> ul.sub_menu');
								    openedUlUl.slideUp(200);
								    sibling.find('.open_sub').removeClass('open_sub');
							    }
						    });
					    }
					
					    $(this).parent().addClass('open_sub');
					    submenu.slideDown(200);
				    }
			    }
			    return false;
		    });
		
	    };
	
	    return {
		    /**
		     * Calls all necessary functionality for vertical menu area if vertical area object is valid
		     */
		    init: function () {
			    if (verticalMenuObject.length) {
				    initNavigation();
				
			    }
		    }
	    };
    };

})(jQuery);