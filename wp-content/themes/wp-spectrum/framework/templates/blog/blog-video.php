<?php
/**
 * @package cshero
 */
?>
<?php global $post; ?>
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
					<?php
						$video_source = get_post_meta(get_the_ID(), 'cs_post_video_source', true);
						$video_height = get_post_meta(get_the_ID(), 'cs_post_video_height', true);
						if($video_source):
							?>
							<div class="cs-blog-media">
							<?php
							switch ($video_source) {
								case 'post':
									$shortcode = cshero_get_shortcode_from_content('playlist');
									if(!$shortcode){
										$shortcode = cshero_get_shortcode_from_content('video');
									}
									if($shortcode):
										echo do_shortcode($shortcode);
									endif;
									break;
								case 'youtube':
									$video_youtube = get_post_meta(get_the_ID(), 'cs_post_video_youtube', true);
									if($video_youtube){
										echo do_shortcode('[cs-video height="'.$video_height.'"]'.$video_youtube.'[/cs-video]');
									}
									break;
								case 'vimeo':
									$video_vimeo = get_post_meta(get_the_ID(), 'cs_post_video_vimeo', true);
									if($video_vimeo){
										echo do_shortcode('[cs-video height="'.$video_height.'"]'.$video_vimeo.'[/cs-video]');
									}
									break;
								case 'media':
									$video_type = get_post_meta(get_the_ID(), 'cs_post_audio_type', true);
									$preview_image = get_post_meta(get_the_ID(), 'cs_post_preview_image', true);
									$video_file = get_post_meta(get_the_ID(), 'cs_post_video_url', true);
									if($video_file){
										echo do_shortcode('[video height="'.$video_height.'" '.$video_type.'="'.$video_file.'" poster="'.$preview_image.'"][/video]');
									}
									break;
							}
							?>
							</div>
						<?php elseif (has_post_thumbnail() && ! post_password_required() && ! is_attachment()): ?>
		    			<div class="cs-blog-thumbnail">
		    				<?php the_post_thumbnail(); ?>
		    			</div><!-- .entry-thumbnail -->
						<?php endif; ?>
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
