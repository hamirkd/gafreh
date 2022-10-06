<?php
/**
 * @package cshero
 */
global $cs_span,$masonry_filter;
$class='cs-masonry-layout-item '.$cs_span.' ';
if($masonry_filter){
	global $cs_cat_class;
	$class .= "category-".$cs_cat_class;
}
?>
<?php global $smof_data; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
		<div class="cs-blog row <?php if(is_sticky()){ echo "post-sticky"; } ?>">
		<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
		<div class="cs-blog-media col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="cs-blog-thumbnail">
				<?php the_post_thumbnail('medium'); ?>
			</div><!-- .entry-thumbnail -->
		</div>
		<?php endif; ?>
		<div class="cs-blog-main-content col-xs-12 col-sm-12 col-md-<?php echo ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() )? '6':'12'; ?> col-lg-<?php echo ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() )? '6':'12'; ?>">
			<header class="cs-blog-header">
				<div class="cs-blog-meta cs-itemBlog-meta">
					<?php echo cshero_info_bar_render(); ?>
					<?php echo cshero_title_render(); ?>
				</div>
			</header><!-- .entry-header -->
			<div class="cs-blog-content">
				
				<?php cshero_content_render(); ?>

			</div><!-- .entry-content -->
		</div>
	</div>
</article><!-- #post-## -->
