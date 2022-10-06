<?php
/**
 * @package cshero
 */
?>
<?php global $smof_data,$post; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cs-blog cs-blog-item cs-blog-item-style1 ">
		<header class="cs-blog-header">
			<div class="cs-blog-info">
				<div class="cs-date">
		            <span><?php echo get_the_time('d'); ?></span>
		            <span><?php echo get_the_time('M Y'); ?></span>
		        </div>
		        <div class="cs-info">
		            <?php echo cshero_blog_classic_detail(); ?>
		        </div>
			</div>
			<?php
				$video_source = get_post_meta($post->ID, 'cs_post_video_source', true);
				$video_height = get_post_meta($post->ID, 'cs_post_video_height', true);
				if($video_source){
					?>
					<div class="cs-blog-media">
					<?php
					switch ($video_source) {
						case 'youtube':
							$video_youtube = get_post_meta($post->ID, 'cs_post_video_youtube', true);
							if($video_youtube){
								echo do_shortcode('[cs-video height="'.$video_height.'"]'.$video_youtube.'[/cs-video]');
							}
							break;
						case 'vimeo':
							$video_vimeo = get_post_meta($post->ID, 'cs_post_video_vimeo', true);
							if($video_vimeo){
								echo do_shortcode('[cs-video height="'.$video_height.'"]'.$video_vimeo.'[/cs-video]');
							}
							break;
						case 'media':
							$video_type = get_post_meta($post->ID, 'cs_post_audio_type', true);
							$preview_image = get_post_meta($post->ID, 'cs_post_preview_image', true);
							$video_file = get_post_meta($post->ID, 'cs_post_video_url', true);
							if($video_file){
								echo do_shortcode('[video height="'.$video_height.'" '.$video_type.'="'.$video_file.'" poster="'.$preview_image.'"][/video]');
							}
							break;
					}
					?>
					</div>
					<?php
				}
			?>
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