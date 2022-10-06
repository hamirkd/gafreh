(function($) { "use strict";
var current_scroll;

function initSideMenu(){
	jQuery('.cs_open,.cs_close').click(function(e){
		var elem = $(this);
		e.preventDefault();
		if(!jQuery('.cs_open').hasClass('opened')){
			jQuery('.meny-sidebar').css({'visibility':'visible'});
			jQuery('.meny-sidebar').addClass('right');
			jQuery(this).addClass('opened');
			jQuery('body').addClass('right_sidebar_opened');
			current_scroll = jQuery(window).scrollTop();
			
			jQuery(window).scroll(function() {
				var scroll = jQuery(window).scrollTop();
				if(Math.abs(scroll - current_scroll) > 0){
					var hide_side_menu = setTimeout(function(){
						jQuery('.meny-sidebar').css({'visibility':'hidden'});
						jQuery('.meny-sidebar').removeClass('right');
						jQuery('.cs_open').removeClass('opened');
						jQuery('body').removeClass('right_sidebar_opened');
						clearTimeout(hide_side_menu);
					},400);
				}
			});
			/** menu */
			var hidden_menu = jQuery('#menu-menu-hidden-sidebar');
			var li = hidden_menu.find('li').length;
			var i = 0;
			window.setInterval(function() {
				if(i <= li){
					var _li = hidden_menu.find('li:eq('+i+')');
						_li.addClass('open');
					i++;
				} else {
					clearInterval(this);
				}
			}, 100);
			
		}else{
			var hide_side_menu = setTimeout(function(){
				jQuery('.meny-sidebar').css({'visibility':'hidden'});
				jQuery('.meny-sidebar').removeClass('right');
				jQuery('.cs_open').removeClass('opened');
				jQuery('body').removeClass('right_sidebar_opened');
				clearTimeout(hide_side_menu);
				jQuery('#menu-menu-hidden-sidebar li').removeClass('open');
			},400);
		}
	});
}
initSideMenu();
})(jQuery);