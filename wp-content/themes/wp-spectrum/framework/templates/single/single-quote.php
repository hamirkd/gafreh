<?php
/**
 * @package cshero
 */
?>
<?php global $smof_data,$post; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cs-blog cs-blog-item cs-blog-item-style1 ">
		<header class="cs-blog-header cs-blog-quote">
			<div class="cs-blog-info">
				<div class="cs-date">
		            <span><?php echo get_the_time('d'); ?></span>
		            <span><?php echo get_the_time('M Y'); ?></span>
		        </div>
		        <div class="cs-info">
		            <?php echo cshero_blog_classic_detail(); ?>
		        </div>
			</div>
			<?php if(get_post_meta($post->ID, 'cs_post_quote_type', true) == 'custom'):?>
			<div class="cs-blog-content table">
				<span class="icon-left table-cell"></span>
					<div class="cs-content-text table-cell">
						<?php echo get_post_meta($post->ID, 'cs_post_quote', true); ?>
						<?php if(get_post_meta($post->ID, 'cs_post_author', true)): ?>
						<div class="author"><span><?php echo esc_attr(get_post_meta($post->ID, 'cs_post_author', true)); ?></span></div>
						<?php endif; ?>
					</div>
				<span class="icon-right table-cell"></span>
			</div>
			<?php endif; ?>
		</header><!-- .entry-header -->
		<div class="cs-blog-content">
			<?php
				the_content();
				wp_link_pages( array(
					'before'      => '<div class="pagination loop-pagination"><span class="page-links-title">' . __( 'Pages:','wp_spectrum') . '</span>',
					'after'       => '</div>',
					'link_before' => '<span class="page-numbers">',
					'link_after'  => '</span>',
				) );
			?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->