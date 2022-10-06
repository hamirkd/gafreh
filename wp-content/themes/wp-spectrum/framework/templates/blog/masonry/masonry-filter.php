<?php
$page_category = get_post_meta(get_the_ID(),'cs_page_category',true);
$masonry_filter = get_post_meta(get_the_ID(),'cs_page_masonry_filter',true);
if(is_category()){
	$page_category = get_query_var( 'cat' );
}
if ($page_category == "" && !is_category()) {
    $args = array(
        'parent' => 0
    );
    $categories = get_categories( $args );
} else {
	$page_category = explode(',', $page_category);
	if(is_array($page_category)){
		$cats = $page_category;
		$categories = array();
		foreach ($cats as $key => $value) {
			$cat = get_category($value);
			$categories[$key] = new stdClass();
			$categories[$key]->slug = $cat->slug; 
			$categories[$key]->name = $cat->name; 
		}
	}
	else{
		$args = array(
	        'parent' => $page_category
	    );
	    $categories = get_categories( $args );
	}
    
}
if ($masonry_filter && count($categories) > 0) {	?>
			<div class="filter_outer">
				<h3><?php _e('CATEGORY', 'wp_spectrum'); ?></h3>
				<div class="filter_holder">
					<ul>
						<li class="filter active" data-filter="*"><span><?php _e('All', 'wp_spectrum'); ?></span></li>
						<?php foreach ($categories as $category) { ?>
							 <li class="filter" data-filter="<?php echo ".category-" . $category->slug; ?>"><span><?php echo ''.$category->name; ?></span></li>
						<?php } ?>
					</ul>
				</div>
			</div>

      <?php  }
?>
