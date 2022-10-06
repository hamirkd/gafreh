<article id="post-<?php echo the_ID() ?>" <?php post_class(); ?> <?php echo ''.$content_style;?>>
    <div class="cshero-carousel-container clearfix">
        <?php if($show_image) { ?>
        <div class="cshero-carousel-image clearfix col-xs-12 col-sm-6 col-md-6 col-lg-6" <?php echo ''.$crop_image_size;?>>
            <div class="cshero-carousel-image-inner">
                <?php
                if (has_post_thumbnail()){
                   $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                    if($crop_image){
                        $image_resize = mr_image_resize( $attachment_image[0], $width_image, $height_image, true, 'c', false );
                        echo '<img alt=""  src="'. $image_resize .'" '.$image_style.' />';
                    }else{
                       echo '<img alt src="'. esc_attr($attachment_image[0]) .'"   '.$image_style.'  />';
                    }
                } else {
                    $attachment_image = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
                    if($crop_image == '1'){
                        $image_resize = mr_image_resize( $attachment_image, $width_image, $height_image, true, false );
                        echo '<img alt="" src="'. $image_resize .'"   '.$image_style.' />';
                    }else{
                        echo '<img alt="" src="'. $attachment_image .'"  '.$image_style.' />';
                    }

                } ?>
                <?php if($show_popup): ?>
                    <?php
                        $attachment_full_image = "";
                        if (has_post_thumbnail()) {
                            $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                            $attachment_full_image = $attachment_image[0];
                        } else {
                            $attachment_full_image = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
                        }
                    ?>
                <?php endif; ?>
                <?php if($show_popup): ?>
                    <div class="overlay" <?php echo ''.$overlay_style; ?>>
                        <div class="overlay-content">
                            <div class="link-wrap">
                            <?php if($show_popup) echo ''.$popup_link; ?>
                            <?php if($show_popup) echo ''.$readmore_link; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php } ?>
        <div class="cshero-carousel-effect col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="cshero-carousel-body">
                <?php if($show_date || $show_comment || $show_author): ?>
                    <div class="cshero-carousel-meta clearfix">
                        <?php if($show_date) :?>
                            <div class="cshero-carousel-date" <?php echo ''.$date_style;?>>
                               <div class="cshero-carousel-date-effect">
                                    <span class="cshero-day"><?php echo get_the_date('dS'); ?></span>
                                    <span class="cshero-month"><?php echo get_the_date('F Y'); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($show_comment) :?>
                        <span class="cshero-carousel-comment">
                            <?php
                            $comments = (int)get_comments_number();
                            if($comments > 0){
                                echo ''.$comments." Comments";
                            }
                            else {
                                echo _e("No Comments",'wp_spectrum');
                            }
                            ?>
                        </span>
                        <?php endif; ?>
                        <?php if($show_author) :?>
                        <span><?php the_author(); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="cshero-carousel-inner clearfix">
                    <?php if ($show_category) : ?>
                        <div class="cshero-carousel-post-category">
                            <?php echo strip_tags (get_the_term_list($post->ID, 'category', '', ', ', '')); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($show_title) { ?>
                        <<?php echo ''.$item_heading_size; ?> class="cshero-carousel-title">
                            <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" rel="" <?php echo ''.$item_title_style;?>>
                                <?php the_title(); ?>
                            </a>
                        </<?php echo ''.$item_heading_size; ?>>
                    <?php } ?>
                    <?php if ($show_description == '1') { ?>
                    <div class="cshero-carousel-post-description" style="color: <?php echo esc_attr($content_color); ?>">
                        <?php if ($excerpt_length != -1) { ?>
                            <p><?php echo cshero_content_max_charlength(strip_tags(get_the_content()), $excerpt_length); ?></p>
                        <?php } else { ?>
                            <p><?php the_content(); ?></p>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <?php if($show_read_more) echo ''.$readmore_link ?>
                </div>
            </div>
        </div>
    </div>
</article>
