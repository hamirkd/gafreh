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
					<div class="cs-blog-content cs-blog-quote">
						<div class="cs-content-text">
							<?php $quote_type = get_post_meta(get_the_ID(), 'cs_post_quote_type', true);
							$quote_content = '';
							if($quote_type == 'custom'){
							?>
								<?php echo get_post_meta(get_the_ID(), 'cs_post_quote', true); ?>
								<?php if(get_post_meta(get_the_ID(), 'cs_post_author', true)): ?>
								<div class="author"><span><?php echo esc_attr(get_post_meta(get_the_ID(), 'cs_post_author', true)); ?></span></div>
								<?php endif; ?>
							<?php } else {
								echo get_the_excerpt();
							}?>
						</div>
					</div>
				</header><!-- .entry-header -->
				<div class="cs-blog-content">
					<?php cshero_content_render(); ?>
				</div><!-- .entry-content -->
			</div>
		</div>
	</div>
</article><!-- #post-## -->
