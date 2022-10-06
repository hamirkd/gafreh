<?php
/**
 * @package cshero
 */
global $cs_span,$masonry_filter,$timeline;
$class='cs-masonry-layout-item '.$cs_span.' ';
if($masonry_filter){
	global $cs_cat_class;
	$class .= "category-".$cs_cat_class;
}
?>
<?php global $smof_data,$post; ?>
<?php
	wp_enqueue_style( 'media-audio', get_template_directory_uri().'/css/media-audio.css',array(),'2.14.1');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
	<?php if($timeline=='timeline'):?>
		<div class="cs-timeline-date hidden-xs">
			<?php
			$archive_date = get_the_date($smof_data['archive_date_format']);?>
		    <span><i class="fa fa-clock-o"></i><a href="<?php echo get_day_link(get_the_time('Y'),get_the_time('m'),get_the_time('d')); ?>" title="<?php echo ''.$archive_date; ?>"><?php echo ''.$archive_date; ?></a></span>
		</div>
	<?php endif;?>
	<div class="cs-blog  <?php if(is_sticky()){ echo "post-sticky"; } ?>">
		<header class="cs-blog-header">
			<?php
			$audio_type = get_post_meta($post->ID, 'cs_post_audio_type', true);
			$audio_url = get_post_meta($post->ID, 'cs_post_audio_url', true);
			if($audio_type):
				?>
				<div class="cs-blog-media">
				<?php
				if ($audio_type == 'content'){
					$shortcode = cshero_get_shortcode_from_content('playlist');
					if(!$shortcode){
						$shortcode = cshero_get_shortcode_from_content('audio');
					}
					if($shortcode):
						echo do_shortcode($shortcode);
					endif;
				} elseif ($audio_type == 'ogg' || $audio_type == 'mp3' || $audio_type == 'wav'){
					if($audio_url){
						echo do_shortcode('[audio '.$audio_type.'="'.$audio_url.'" preload="metadata"][/audio]');
					}
				}
				?>
				</div>
			<?php elseif (has_post_thumbnail() && ! post_password_required() && ! is_attachment()): ?>
    			<div class="cs-blog-thumbnail">
    				<?php the_post_thumbnail(); ?>
    			</div><!-- .entry-thumbnail -->
			<?php endif; ?>
			<div class="cs-blog-meta cs-itemBlog-meta">
				<?php if($timeline!='timeline'){
					echo cshero_info_bar_render();
				}
				else{
					echo cshero_info_bar_render('detail_date');
				} ?>
				<?php echo cshero_title_render(); ?>
			</div>
		</header><!-- .entry-header -->
		<div class="cs-blog-content">
			<?php cshero_content_render(); ?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->
