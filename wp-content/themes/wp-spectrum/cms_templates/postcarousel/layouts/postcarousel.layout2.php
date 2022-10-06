<article id="post-<?php echo the_ID() ?>" <?php post_class(); ?> <?php echo ''.$content_style;?>>
    <div class="cshero-carousel-container">
        <?php if($show_image) { ?>
        <div class="cshero-carousel-image clearfix">
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
        </div>
        <?php } ?>
        <div class="cshero-carousel-effect">
            <div class="cshero-carousel-body">
                <?php if($show_date || $show_comment || $show_author): ?>
                    <div class="cshero-carousel-meta clearfix" <?php echo ''.$date_style;?>>
                        <?php if ($show_title == '1') { ?>
                            <<?php echo ''.$item_heading_size; ?> class="cshero-carousel-title">
                                <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" rel="" style="color: <?php echo ''.$item_title_color; ?>;">
                                    <?php the_title(); ?>
                                </a>
                            </<?php echo ''.$item_heading_size; ?>>
                        <?php } ?>

                        <?php if ($show_author || $show_date): ?>
                            <ul class="author-date-wrap">
                                <?php if($show_author) :?>
                                    <li class="author-wrap">
                                        <?php the_author(); ?>
                                    </li>
                                <?php endif; ?>
                                <?php if($show_date) :?>
                                    <li class="date-wrap">
                                        <span> <?php _e(' on', 'wp_spectrum'); ?> </span>
                                        <span class="cshero-day"><?php echo get_the_date('dS'); ?></span>
                                        <span class="cshero-month"><?php echo get_the_date('F Y'); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if($show_comment) :?>
                                    <li class="cshero-carousel-comment">
                                        <?php
                                        $comments = (int)get_comments_number();
                                        if($comments > 0){
                                            echo ''.$comments." Comments";
                                        }
                                        else {
                                            echo _e("No Comments",'wp_spectrum');
                                        }
                                        ?>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif ?>
                        
                        <?php if ($show_category) : ?>
                            <div class="cshero-carousel-post-category">
                                <?php echo strip_tags (get_the_term_list($post->ID, 'category', '', ', ', '')); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endif; ?>
                <div class="cshero-carousel-inner clearfix">
                    <?php if ($show_description == '1') { ?>
                    <div class="cshero-carousel-post-description" style="color: <?php echo esc_attr($content_color); ?>">
                        <?php if ($excerpt_length != -1) { ?>
                            <p><?php echo cshero_content_max_charlength(strip_tags(get_the_content()), $excerpt_length); ?></p>
                        <?php } else { ?>
                            <p><?php the_content(); ?></p>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <?php if($show_read_more): ?>
                        <div class="cshero-carousel-post-read-more">
                            <?php echo balanceTags($readmore_link); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</article>
