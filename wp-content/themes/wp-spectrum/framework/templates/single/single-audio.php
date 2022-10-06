<?php
/**
 * @package cshero
 */
?>
<?php global $smof_data,$post; ?>
<?php
	wp_enqueue_style( 'media-audio', get_template_directory_uri().'/css/media-audio.css',array(),'2.14.1');
?>
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
			$audio_type = get_post_meta($post->ID, 'cs_post_audio_type', true);
			?>
			<div class="cs-blog-media">
			<?php
				if($audio_type == 'ogg' || $audio_type == 'mp3' || $audio_type == 'wav'){
					$audio_url = get_post_meta($post->ID, 'cs_post_audio_url', true);
					if($audio_url){
						echo do_shortcode('[audio '.$audio_type.'="'.$audio_url.'"][/audio]');
					}
				}
			?>
			</div>
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