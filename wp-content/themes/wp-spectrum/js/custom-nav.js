(function($) { "use strict"; 
jQuery(document).ready(function($) {
	$('.header-wrapper').onePageNav({
		currentClass:'current-menu-item',
		easing: one_page.easing,
		scrollSpeed: parseInt(one_page.scrollSpeed),
		scrollOffset: parseInt(one_page.scrollOffset),
		changeHash: false
	});
});
})(jQuery);
