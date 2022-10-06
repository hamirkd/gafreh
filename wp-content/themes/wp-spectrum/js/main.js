/*
 * CS Hero
 *
 */
(function ($) {
    "use strict";
    /*same height*/
    function sameHeight() {
        "use strict";
        var biggestHeight = 0;
        $('.sameheight article').each(function () {
            if ($(this).height() > biggestHeight) {
                biggestHeight = $(this).height();
            }
        });
        $('.sameheight article').height(biggestHeight);
    }
    function fullWidth() {
        var windowWidth = $(window).width();
        $('.stripe').each(function () {
            var $bgobj = $(this);
            var width = $bgobj.width();
            var v = (windowWidth - width) / 2;
            $bgobj.css({
                marginLeft: -v,
                paddingLeft: v,
                paddingRight: v
            });
        })
    }

    function boxed() {
        var windowWidth = $(window).width();
        $('.stripe').each(function () {
            $(this).css({
                marginLeft: 0,
                paddingLeft: 0,
                paddingRight: 0
            });
        })
    }
    $(document).ready(function () {
		/* Menu */
		var depth = 0;
		var el = null;
		var w_width = jQuery(window).width();
		jQuery('li.menu-item').hover(function(){
			el = jQuery('.sub-menu:first',this);
			if(el.length > 0){
				var el_left = el.offset().left;
				var el_width = el.outerWidth();
				if(w_width < (el_left+el_width)){
					el.addClass('autodrop');
				}
			}
		},function(){
			if(el){
				el.removeClass('autodrop');
				el = null;
			}
		})
		/* End Menu */
        /** Active Arrow Menu Mobile ***/
        $('.btn-navbar').click(function () {
            $("#cshero-header").toggleClass("mobile-arrow-effect");
        })
        /*** Portfolio Style 4 ***/
        $(".portfolio-layout4 .cshero-portfolio-item:odd .portfolio-layout4-custom").addClass("row-right"); 
        if ($(".colorbox").length > 0) {
            $(".colorbox").colorbox();
        }
        if ($(".cs-colorbox-post-video").length > 0) {
            $(".cs-colorbox-post-video").colorbox({
                iframe: true,
                innerWidth: 640,
                innerHeight: 390
            });
        }
        if ($(".cs-colorbox-post-gallery").length > 0) {
            var pid = $(".cs-colorbox-post-gallery").data('sid');
            $(".cs-colorbox-post-gallery").colorbox({
                html: "<div id='cs-gallery-popup" + pid + "' class='carousel slide' data-ride='carousel'>" + $("#" + $(".cs-colorbox-post-gallery").data('selement')).html() + "</div>"
            });
        }


        setTimeout(function () {
            $('.widget_searchform_content').each(function () {
                var wg = $(this);
                var offset = wg.offset().left + wg.outerWidth() - $(window).width();
                if (offset > 0) {
                    wg.css({
                        left: 0 - offset
                    });
                }
            })
        }, 1000)
        $('.smooth2pager').click(function () {
            var selector = $(this).data('el-selector');
            var top = $(selector).offset().top;
            $("html,body").animate({
                scrollTop: top
            }, 500);
        })
        var $mainmenu = $('.main-menu-content .cshero-dropdown');
        var $stickymenu = $('.sticky-menu .cshero-mobile > ul');
        var $mobilemenu = $mainmenu.clone().removeClass('main-menu menu-item-padding right left').addClass('cshero-mobile-menu');
        $mobilemenu.find('li').each(function () {
            var $this = $(this);
            if ($this.find('ul').length > 0) {
                var $menutoggle = $('<span class="cs-menu-toggle"></span>');
                $menutoggle.bind('click', function () {
                    $this.toggleClass('open')
                });
                $this.append($menutoggle);
            }
        });
        $mobilemenu.appendTo('#cshero-main-menu-mobile');
        var $mobilesticky = $mobilemenu.clone(true);
        $mobilesticky.find('li').each(function () {
            var $this = $(this);
            if ($this.find('ul').length > 0) {
                var $menutoggle = $('<span class="cs-menu-toggle"></span>');
                $menutoggle.bind('click', function () {
                    $this.toggleClass('open')
                });
                $this.append($menutoggle);
            }
        });
        $mobilesticky.appendTo('#cshero-sticky-menu-mobile');
        
        /* Show Tooltip */
        $('[data-rel="tooltip"]').tooltip();

        /* Back to top */
        var window_height = $(window).height();
        var back_to_top = $('#back_to_top');
        var mainmenu = $('#cshero-header');
        var menu_top = $('#cs-header-custom-bottom');
        if (menu_top.length > 0) {
            menu_top.addClass('menu-up');
        }
        $(window).scroll(function () {
            /* fixed menu */
            var scroll_top = $(window).scrollTop();
            if (menu_top.length > 0) {

                if (scroll_top >= menu_top.outerHeight(true)) {
                    menu_top.find('#menu').removeClass('menu-up');
                } else {
                    menu_top.find('#menu').addClass('menu-up');
                }

                if (scroll_top >= (mainmenu.outerHeight() - menu_top.outerHeight(true))) {
                    menu_top.addClass('fixed-top');
                } else {
                    menu_top.removeClass('fixed-top');
                }
            }
            /* back to top */
            if (scroll_top < window_height) {
                back_to_top.addClass('off').removeClass('on');
            } else {
                back_to_top.removeClass('off').addClass('on');
            }
        });
        back_to_top.click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 1500);
        });
        /* Fix Column Height */
        $('.feature-box').each(function () {
            var subs = $(this).find('> .column_container');
            if (subs.length < 2)
                return;
            var maxHeight = Math.max.apply(null, $(this).find("> .column_container").map(function () {
                return $(this).height();
            }).get());
            $(this).find("> .column_container").height(maxHeight - 3);
        });
        /* Parallax Section */
        var windowHeight = $(window).height();
        fullWidth();
        $('.wpb_row').each(function () {
            if ($(this).hasClass('ww-same-height')) {
                var height = $(this).height();
                $(this).children(":first").children().each(function () {
                    $(this).css('min-height', height);
                });
            }

        });
        //Fade out Title Bar on Scroll
        var item_height = $(".cs-page-title").outerHeight(true);
        var position = $(".cs-page-title").position();
        var title_animate = $("#title-animate,#breadcrumb-animate");
        $(window).scroll(function () {
            if (position) {
                var scroll = $(window).scrollTop();
                var max = position.top + item_height;
                if (scroll <= max) {
                    var opacity = scroll / item_height;
                    title_animate.css("opacity", 1 - opacity);
                } else {
                    title_animate.css("opacity", opacity);
                }
            }
        });
        /** row col same height */
        $('.same-height').each(function() {
        	"use strict";
        	var same_height = 0;
        	var col_items = $(this).find('.wpb_column');
        	col_items.each(function (key) {
        		"use strict";
				var col_height = $(this).outerHeight(true);
				var col_style = $(this).attr('style');
				if(key == 0){
					same_height = col_height;
				} else {
					if(same_height < col_height){
						same_height = col_height;
					}
				}
			});
        	if(same_height > 0){
        		col_items.css({height:same_height});
			}
		});

        $(".cs-masonry-layout").each(function () {
            $(this).imagesLoaded(function () {
                var $container = $(this);
                var $column = $(this).data('columns');
                var colW = Math.floor($container.width() / $column);

                $container.css({
                    width: colW * $column
                }).isotope({
                    itemSelector: '.cs-masonry-layout-item',
                    masonry: {
                        columnWidth: colW
                    }
                });
                var $filter = $(this).parent().find('.filter');
                if ($filter.length > 0) {
                    $filter.on('click', function () {
                        $filter.removeClass('active');
                        $(this).addClass('active');
                        var filterValue = $(this).attr('data-filter');
                        if (filterValue != '*') {
                            $('.cs_pagination').css('display', 'none');
                        } else {
                            $('.cs_pagination').css('display', 'block');
                        }
                        $(".cs-masonry-layout").isotope({
                            filter: filterValue
                        });
                    });
                }
            });
        });
        $('.header-v4 #cshero-header').bind('mousewheel', function(event) {
            event.preventDefault();
            var scrollTop = this.scrollTop;
            this.scrollTop = (scrollTop + ((event.deltaY * event.deltaFactor) * -1));
        });
        
        //Woo button
        $('input.minus').click(function(){
        	$(this).parent().find('input[type="number"]').get(0).stepDown();
        });
        $('input.plus').click(function(){
        	$(this).parent().find('input[type="number"]').get(0).stepUp();
        });
        // Placeholder Input Cart Search
        $('.widget_searchform_content').find("input[type='text']").each(function(ev) {
            if(!$(this).val()) { 
                $(this).attr("placeholder", "Search for item");
            }
        });
        $('.header-v5 .cshero-header-content-widget').find("input[type='text']").each(function(ev) {
            if(!$(this).val()) { 
                $(this).attr("placeholder", "Search for item");
            }
        });
    });
})(jQuery);
