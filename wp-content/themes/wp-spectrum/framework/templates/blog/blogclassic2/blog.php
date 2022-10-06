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
					<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
					<div class="cs-blog-media">
						<div class="cs-blog-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div><!-- .entry-thumbnail -->
					</div>
					<?php endif; ?>
					<div class="cs-blog-meta cs-itemBlog-meta">
		            <?php
						echo cshero_title_render();
					?>
					</div>
				</header><!-- .entry-header -->
				<div class="cs-blog-content">
					<?php cshero_content_render(); ?>
				</div><!-- .entry-content -->
			</div>
		</div>
	</div>
</article><!-- #post-## -->
