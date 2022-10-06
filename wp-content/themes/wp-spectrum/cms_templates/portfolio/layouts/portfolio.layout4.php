
<?php
global $post, $wp_query, $portfolio_options, $cs_portfolio_id;
$custom = get_post_custom($post->ID);
$portfolio_link = get_post_meta(get_the_ID(), 'cs_portfolio_link', true);
$portfolio_about = get_post_meta(get_the_ID(), 'cs_portfolio_about_project', true);
?>
<div class="cshero-portfolio-container portfolio-layout4-custom" style="margin:<?php echo esc_attr($item_margin); ?>;">
    <style type="text/css" scoped>
        .portfolio-layout4-custom .cshero-portfolio-category a {
            color: <?php echo esc_attr($category_color);?> !important;
        }
        .portfolio-layout4-custom .cshero-portfolio-img-wrap:after {
            border-color: transparent <?php echo esc_attr($item_bg_color);?> transparent transparent;
        }
        .portfolio-layout4-custom.row-right .cshero-portfolio-img-wrap:after {
            border-color: transparent transparent transparent <?php echo esc_attr($item_bg_color);?>;
        }
    </style>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="cshero-portfolio-item-content clearfix" style="background-color: <?php echo ''.$item_bg_color; ?>;">
            <div class="cshero-portfolio-img-wrap col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <?php
                if (has_post_thumbnail()) {
                    $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                    if($crop_image){
                        $image_resize = mr_image_resize( $attachment_image[0], $width_image, $height_image, true, 'c', false );
                        echo '<img alt="" src="'. esc_url($image_resize) .'" />';
                    }else{
                        echo '<img alt="" src="'. esc_attr($attachment_image[0]) .'" />';
                    }
                    $image_large = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                    $full_image = $image_large[0];
                } else{
                    $no_image = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
                    if($crop_image){
                        $image_resize = mr_image_resize( $no_image, $width_image, $height_image, true,'c', false );
                        echo '<img alt="" src="'. esc_url($image_resize) .'" />';
                    }else{
                        echo '<img alt="" src="'. esc_attr($no_image) .'" />';
                    }
                    $full_image = $no_image;
                }
                ?>
                <div class="cshero-portfolio-overlay">
                    <div class="link-wrap">
                        <?php
                        if($zoom){
                            echo '<a href="'.esc_url($full_image).'" class="zoom colorbox"><i class="'.$zoom_icon.'"></i></a>';
                        }
                        if($portfolio_link !='' && $show_link){
                            echo '<a class="more" href="' . esc_url($portfolio_link) . '" target="_blank"><i class="'.$read_more_icon.'"></i></a>';
                        }
                        if($read_more){
                            echo '<a class="more" title="" href="' . esc_url(get_the_permalink())  . '" ><i class="'.$read_more_icon.'"></i></a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="cshero-portfolio-content-wrap col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="cshero-portfolio-content-wrap-inner">
                    <div class="cshero-portfolio-meta-box">
                        <?php
                        if ($show_category) {
                            echo '<div class="cshero-portfolio-category">' . get_the_term_list($wp_query->post->ID, 'portfolio_category', '', ', ', '') . '</div>';
                        }
                        if ($show_title) {
                            echo '<h2 class="cshero-portfolio-title"><a style="color:'.$title_color.';" title="' . esc_attr(get_the_title()) . '" href="' . esc_url(get_permalink(get_the_ID())) . '" >' . get_the_title() . '</a></h2>';
                        }
                        ?>
                    </div>

                    <?php if ($show_description) { ?>
                        <div class="cshero-portfolio-content">
                            <div class="cshero-portfolio-content-inner">
                                <?php
                                if ($show_description) {
                                    echo '<div class="cshero-portfolio-description" style="color:'.$description_color.';">';
                                    if ($excerpt_length != -1) {
                                        echo cshero_content_max_charlength($portfolio_about, (int) $excerpt_length);
                                    } else {
                                        echo strip_shortcodes(get_the_content());
                                    }
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </article>
</div>
