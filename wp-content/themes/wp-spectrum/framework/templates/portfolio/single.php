<?php
$portfolio_gallery = get_post_meta(get_the_ID(),'cs_portfolio_gallery',true);
$portfolio_category = get_post_meta(get_the_ID(),'cs_portfolio_category',true);
$testimonial_category = get_post_meta(get_the_ID(),'cs_testimonial_category',true);
?>
<article id="cs_post_<?php the_ID(); ?>" <?php post_class(); ?>>
	<div id="main" class="cs-portfolio-item">
		<div class="row">
			<div id="cs-portfolio-content"
				class="col-xs-12 col-sm-9 col-md-9 col-lg-9 cs-portfolio-content">
				<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
				<div class="cs-portfolio-thumbnail">
					<?php the_post_thumbnail(); ?>
				</div>
				<!-- .entry-thumbnail -->
				<?php endif; ?>
				<div class="cs-portfolio-details">
					<h3 class="cs-portfolio-title-group">
						<span><?php _e('The Details', 'wp_spectrum'); ?></span>
					</h3>
				<?php the_content(); ?>
				</div>
				<?php if($portfolio_gallery): ?>
				<div class="cs-portfolio-gallery">
					<h3 class="cs-portfolio-title-group">
						<span><?php _e('Lets Take a Closer Look', 'wp_spectrum'); ?></span>
					</h3>
				    <?php
				        echo do_shortcode($portfolio_gallery);
				    ?>
				</div>
				<?php endif; ?>
				<?php if(!empty($testimonial_category)): ?>
				<div class="cs-portfolio-testimonial">
				    <?php
				    $heading_color = get_post_meta(get_the_ID(), 'cs_testimonial_title_color', true);
				    $heading_size = get_post_meta(get_the_ID(), 'cs_testimonial_title_font_size', true);
				    
				    $content_color =  get_post_meta(get_the_ID(), 'cs_testimonial_description_color', true);
				    $content_size = get_post_meta(get_the_ID(), 'cs_testimonial_description_font_size', true);
				    
				    $image_width = get_post_meta(get_the_ID(), 'cs_testimonial_images_width', true);
				    $image_width = !empty($image_width) ? $image_width : 170;
				    
				    $image_heihgt = get_post_meta(get_the_ID(), 'cs_testimonial_images_heihgt', true);
				    $image_heihgt = !empty($image_heihgt) ? $image_heihgt : 170;
				    ?>
				    <style>
    				    .cshero_testimonial_content .cshero-testimonial-title {
    				        color: <?php echo ''.$heading_color; ?>!important;
    				        font-size: <?php echo ''.$heading_size; ?>px!important;
    				    }
    				    .cshero_testimonial_content .cshero-testimonial-text {
    				        color: <?php echo ''.$content_color; ?>!important;
    				        font-size: <?php echo ''.$content_size; ?>px!important;
    				    }
    				    .cshero_testimonial_content .cshero-testimonial-image img {
    				        width: <?php echo ''.$image_width; ?>px;
    				        height: <?php echo ''.$image_heihgt; ?>px;
    				    }
				    </style>
					<h3 class="cs-portfolio-title-group">
						<span><?php _e('The Testimonial', 'wp_spectrum'); ?></span>
					</h3>
				    <?php
				    echo do_shortcode('[cshero-testimonial heading_size="h1" heading_align="text-center" heading_text_style="uppercase" posts_per_page="12" orderby="none" order="none" layout="testimonial.layout2" type="slide" carousel_mode="horizontal" auto_scroll="1" show_nav="0" nav_align="text-center" show_pager="0" pager_align="pager-center text-center" content_align="text-left" show_image="1" crop_image="1" image_align="center" quotation_icon_size="48px" show_title="1" show_category="0" show_description="1" excerpt_length="300" show_readmore="0" read_more="Read more" title="" heading_color="" category="'.$testimonial_category.'" width_item="1000" width_image="'.$image_width.'" height_image="'.$image_heihgt.'" image_border="100%" description="" item_title_heading="h5" content_color=""]');
				    ?>
				</div>
				<?php endif; ?>
				<?php cshero_post_nav(); ?>
			</div>
			<div
				class="col-xs-12 col-sm-3 col-md-3 col-lg-3 cs-portfolio-sidebar cs-scroll-fixed">
				<div id="primary-sidebar" class="cs-portfolio-meta widget-area">
					<div class="cs-portfolio-title">
						<h3>
							<span><?php _e('About The Project', 'wp_spectrum'); ?></span>
						</h3>
					</div>
					<ul class="cs-portfolio-list-details">
						<li><span class="details-label"><i class="fa fa-user"></i><?php _e('Date', 'wp_spectrum'); ?>:</span><?php the_date('jS F Y'); ?></li>
						<li class="details-category"><span class="details-label"><i
								class="fa fa-folder"></i> <?php _e('Category', 'wp_spectrum'); ?>:</span>
							<?php the_terms( get_the_ID(), 'portfolio_category', '', ', ', '' ); ?>
						</li>
						<li><span class="details-label"><i class="fa fa-heart"></i> <?php _e('Likes', 'wp_spectrum'); ?>:</span>
							<?php post_favorite('','like',false);?>
						</li>
						<li><span class="details-label"><i class="fa fa-link"></i><?php _e('Share', 'wp_spectrum'); ?>:</span>
							<div class="social-details">
								<a
									href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
									target="_blank"><i class="fa fa-facebook"></i></a> <a
									href="https://twitter.com/home?status=<?php the_permalink(); ?>"
									target="_blank"><i class="fa fa-twitter"></i></a> <a
									href="https://plus.google.com/share?url=<?php the_permalink(); ?>"
									target="_blank"><i class="fa fa-google-plus"></i></a> <a
									href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=&summary=&source="
									target="_blank"><i class="fa fa-linkedin"></i></a>
							</div></li>
					</ul>
					<?php if(!empty($portfolio_category)): ?>
					<div class="cs-portfolio-similar">
						<h3 class="cs-portfolio-similar-title">
							<span><?php _e('Similar Projects', 'wp_spectrum'); ?></span>
						</h3>
					   <?php
                       $args = array(
					       'posts_per_page' => 3,
					       'post_type' => 'portfolio',
					       'post_status' => 'publish'
					   );
					   if($portfolio_category != ''){
						   $args['tax_query'] = array(
					           array(
					               'taxonomy' => 'portfolio_category',
					               'field' => 'term_id',
					               'terms' => explode(',', $portfolio_category)
					           )
					       );
					   }
					   $wp_query = new WP_Query($args);
					   while ($wp_query->have_posts()) : $wp_query->the_post();
					   ?>
					   <div class="cs-portfolio-similar-item">
					       <?php the_post_thumbnail('large'); ?>
					       <div class="cs-portfolio-similar-details">
								<h3><i class="fa fa-user"></i><?php the_title(); ?></h3>
								<a href="<?php the_permalink(); ?>"><i class="fa fa-chain"></i><?php _e('View Project', 'wp_spectrum'); ?></a>
							</div>
						</div>
					   <?php
					   endwhile;
					   wp_reset_query();
					   ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</article>