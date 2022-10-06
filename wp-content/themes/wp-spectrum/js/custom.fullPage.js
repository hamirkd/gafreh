jQuery(document).ready(function($) {
	"use strict";
	var control_html = '<div class="full-page-control">'
	if(fullpage.top != '0'){
		control_html = control_html + '<i class="fa fa-angle-double-up" style="display: none;"></i>';
	}
	if(fullpage.bottom != '0'){
		control_html = control_html + '<i class="fa fa-angle-double-down"></i>';
	}
	control_html = control_html + '</div>';
	
	$('body').append($(control_html));
	
	var wpb_row = $('.section');
	var control_up = $('.full-page-control i.fa-angle-double-up');
	var control_down = $('.full-page-control i.fa-angle-double-down');
	$('.entry-content').fullpage({
		resize : false,
		sectionSelector : '.section',
		autoScrolling: false,
		afterRender : function(){
			wpb_row.attr('style','');
			$('.fp-tableCell').attr('style','');
		},
		afterResize : function(){
			wpb_row.attr('style','');
			$('.fp-tableCell').attr('style','');
		},
		onLeave: function(index, nextIndex, direction){
			if(nextIndex > 1){
				control_up.css('display','block');
			} else {
				control_up.css('display','none');
			}
			if(nextIndex == wpb_row.length){
				control_down.css('display','none');
			} else {
				control_down.css('display','block');
			}
		}
	});
	$('.full-page-control').on('click', 'i',function(){
		if($(this).hasClass('fa-angle-double-up')){
			$.fn.fullpage.moveSectionUp();
		} else {
			$.fn.fullpage.moveSectionDown();
		}
	});
});