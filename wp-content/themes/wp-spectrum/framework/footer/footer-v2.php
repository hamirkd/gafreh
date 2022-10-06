<?php
global $smof_data;
if(is_page()){
    $footer_top_widgets = get_post_meta(get_the_ID(), 'cs_footer_top_widgets', true);
    $footer_bottom_enable = get_post_meta(get_the_ID(), 'cs_footer_bottom_enable', true);
    if($footer_top_widgets != ''){
        $smof_data['footer_top_widgets'] = $footer_top_widgets;
    }
    if($footer_bottom_enable != ''){
        $smof_data['footer_bottom_widgets'] = $footer_bottom_enable;
    }
}
?>
<?php if($smof_data['footer_top_widgets'] == '1'){
/** data parallax */
$top_parallax = '';
$top_class = '';
if($smof_data['footer_top_bg_parallax'] && !empty($smof_data['background-footer-top']['media'])){
    $top_parallax = " data-stellar-background-ratio='0.6' data-background-width='{$smof_data['background-footer-top']['media']['width']}' data-background-height='{$smof_data['background-footer-top']['media']['height']}'";
    $top_class = ' stripe-parallax-bg';
} 
?>
<?php } ?>
<?php if($smof_data['footer_bottom_widgets'] == '1'){ ?>
<footer id="footer-bottom" class="footer-bottom-v2">
	<svg class="decor engle-bottom-left" height="50px" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg"><path d="M0 0 L100 100 L0 200" stroke-width="0" stroke=""/></svg>
	<div class="<?php echo ($smof_data['footer_full_width'])?'no-container':'container';?>">
		<div class="row">
			<div class="footer-bottom">
				<?php cshero_sidebar_footer_bottom(); ?>
			</div>
		</div>
	</div>
</footer>
<?php } ?>