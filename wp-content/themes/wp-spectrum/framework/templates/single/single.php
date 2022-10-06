<?php
/**
 * @package cshero
 */
?>
<?php global $smof_data;?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cs-blog cs-blog-item cs-blog-item-style1 <?php if(is_sticky()){ echo "post-sticky"; } ?>">
		<header class="cs-blog-header">
			<div class="cs-blog-info">
				<div class="cs-date">
		            <span><?php echo get_the_time('d'); ?></span>
		            <span><?php echo get_the_time('M Y'); ?></span>
		        </div>
		        <div class="cs-info">
		        	<?php echo cshero_title_render(); ?>
		            <?php echo cshero_blog_classic_detail(); ?>
		        </div>
			</div>
			<?php if ($smof_data['post_featured_images'] == '1') : ?>
				<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
					<div class="cs-blog-thumbnail">
						<?php the_post_thumbnail(); ?>
					</div><!-- .entry-thumbnail -->
				<?php endif; ?>
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