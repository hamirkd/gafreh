<?php
    $about_portfolio = get_post_meta(get_the_ID(),'cs_portfolio_about_project',true);
    $text_intro = get_post_meta(get_the_ID(),'cs_portfolio_text_intro',true);
?>

<article id="post-<?php echo the_ID() ?>" <?php  post_class(); ?>>
    <h6 style="display:none;">&nbsp;</h6><?php /* this element for fix validator warning */ ?>
    <div class="cshero-carousel-container clearfix"  <?php echo ''.$item_style;?>>
        <div class="cshero-carousel-image clearfix col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="cshero-carousel-image-inner">
                <?php if (has_post_thumbnail() and wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)) { ?>
                    <?php if($crop_image == 1){
                        $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                        $image_resize = mr_image_resize( $attachment_image[0], $width_image, $height_image, true, 'c', false );
                        echo '<img alt="" class="" src="'. esc_url($image_resize)  .'" '.$image_style.' />';
                    }else{
                       //echo get_the_post_thumbnail($post->ID);
                        $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                        echo '<img alt="" class="" src="'. esc_url($attachment_image[0])  .'" '.$image_style.' />';
                    } ?>
                <?php } else { ?>
                    <?php
                        $no_image = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
                        if($crop_image == 1){
                            $image_resize = mr_image_resize( $no_image, $width_image, $height_image, true, false );
                        }
                    ?>
                    <?php if($crop_image == 1){ ?>
                        <img alt="<?php the_title(); ?>" src="<?php echo ''.$image_resize; ;?>" <?php echo ''.$image_style; ?> />
                    <?php } else { ?>
                        <img alt="<?php the_title(); ?>" src="<?php echo ''.$no_image; ;?>" <?php echo ''.$image_style; ?> />
                    <?php } ?>
                <?php } ?>
                <?php if($show_popup): ?>
                    <div class="overlay" >
                        <div class="overlay-content">
                            <div class="link-wrap">
                                <?php if($show_popup == '1') :?>
                                    <a class="zoom colorbox" title="<?php the_title(); ?>" href="<?php echo esc_url($attachment_full_image); ?>" >
                                        <i class="fa fa-search"></i>
                                    </a>
                                <?php endif;?>
                                <?php if($portfolio_link!='' && $show_link == '1'){ ?>
                                    <a class="more" href="<?php echo  esc_url($portfolio_link); ?>" title="<?php the_title(); ?>" target="_blank">
                                        <i class="fa fa-sign-in"></i>
                                    </a>
                                <?php } ?>
                                <?php if($show_read_more == '1') :?>
                                    <a class="more" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" >
                                        <i class="fa fa-sign-in"></i>
                                    </a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="cshero-carousel-effect col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="cshero-carousel-body">
                <div class="cshero-carousel-inner clearfix">
                    <?php if ($show_category == '1') : ?>
                        <div class="cshero-carousel-post-category">
                            <?php echo strip_tags (get_the_term_list($post->ID, 'portfolio_category', '', ', ', '')); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($show_title == '1') { ?>
                        <<?php echo ''.$item_heading_size; ?> class="cshero-title">
                            <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" <?php echo ''.$item_title_style;?>>
                                <?php the_title(); ?>
                            </a>
                        </<?php echo ''.$item_heading_size; ?>>
                    <?php } ?>

                    <?php if ($show_description == '1') { ?>
                        <div class="cshero-carousel-post-description">
                            <?php if ($excerpt_length != -1) { ?>
                                <p><?php echo cshero_content_max_charlength(strip_tags($text_intro), $excerpt_length); ?></p>
                            <?php } else { ?>
                                <p><?php the_content(); ?></p>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php //if($show_read_more) echo ''.$readmore_link ?>
                </div>
            </div>
        </div>

    </div>
</article>
                    