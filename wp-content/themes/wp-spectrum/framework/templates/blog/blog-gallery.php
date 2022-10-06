<?php
/**
 * @package cshero
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cs-blogClass-style2 clearfix">
	    <div class="cs-blogClass-left col-xs-12 col-sm-3 col-md-3 col-lg-3">
	        <div class="cs-blogClass-date">
	            <span><?php echo get_the_time('d'); ?></span>
	            <span><?php echo get_the_time('M Y'); ?></span>
	        </div>
	        <div class="cs-blogClass-info">
	            <?php echo cshero_blog_classic_detail(); ?>
	        </div>
	    </div>
		<div class="cs-blogClass-right col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<div class="cs-blog <?php if(is_sticky()){ echo " post-sticky"; } ?>">
				<header class="cs-blog-header">
					<div class="cs-blog-media">
					<?php
					$gallery_ids = cshero_grab_ids_from_gallery()->ids;
					if(!empty($gallery_ids)):
					?>
					<div id="carousel-example-generic<?php the_ID(); ?>" class="carousel slide" data-ride="carousel">
		                <div class="carousel-inner">
		                <?php $i = 0; ?>
		                <?php foreach ($gallery_ids as $image_id): ?>
							<?php
		                    $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
		                    if($attachment_image[0] != ''):?>
								<div class="item <?php if($i==0){ echo 'active'; } ?>">
		                    		<img style="width:100%;" data-src="holder.js" src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
		                    	</div>
		                    <?php $i++; endif; ?>
		                <?php endforeach; ?>
		                </div>
		                <a class="left carousel-control" href="#carousel-example-generic<?php the_ID(); ?>" role="button" data-slide="prev">
						    <span class="ion-ios-arrow-left"></span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic<?php the_ID(); ?>" role="button" data-slide="next">
						    <span class="ion-ios-arrow-right"></span>
						</a>
					</div>
					<?php elseif (has_post_thumbnail() && ! post_password_required() && ! is_attachment()): ?>
					<div class="cs-blog-thumbnail">
						<?php the_post_thumbnail(); ?>
					</div><!-- .entry-thumbnail -->
					<?php endif; ?>
					</div>
					<div class="cs-blog-meta cs-itemBlog-meta">
						<?php echo cshero_title_render(); ?>
					</div>
				</header><!-- .entry-header -->
				<div class="cs-blog-content">
					<?php cshero_content_render(); ?>
				</div><!-- .entry-content -->
			</div>
		</div>
	</div>
</article><!-- #post-## -->

