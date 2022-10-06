<div class="cshero-carousel-item-wrap">
    <div class="cshero-carousel-item">
        <?php do_action('woocommerce_before_shop_loop_item'); ?>
        <div class="cshero-woo-image" >
            <a href="<?php the_permalink(); ?>">
                <?php
                    if($crop_image){
                        if (has_post_thumbnail() and wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)){
                            $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                            
                            $image_resize = mr_image_resize( $attachment_image[0], $width_image, $height_image, true, 'c', false );
                            echo '<img alt=""  src="'. $image_resize .'" />';
                            
                        } else {
                            $attachment_image = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
                            
                            $image_resize = mr_image_resize( $attachment_image, $width_image, $height_image, true, false );
                            echo '<img alt="" src="'. $image_resize .'" />';
                        } 
                    } else {
                        do_action('woocommerce_before_shop_loop_item_title');
                    }
                ?>
            </a>
        </div>
    </div>
    <div class="cshero-woo-meta">
        <?php if ($show_title == '1') { ?>
            <div class="cshero-product-title">
            <<?php echo $item_heading_size; ?>>
                <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" rel="" style="color: <?php echo esc_attr($item_title_color); ?>;">
                    <?php the_title(); ?>
                </a>
            </<?php echo $item_heading_size; ?>>
            </div>
        <?php } ?>
        <?php if ( $show_category == '1'): ?>
            <div class="cshero-product-caegory">
                <?php
                    $postid = get_the_ID();
                    $categories = get_the_term_list($postid, 'product_cat', '', ', ', '');
                ?>
                <span><?php print_r($categories); ?></span>  
            </div>
        <?php endif; ?>
        <?php if ( $show_price == '1'): ?>
            <div class="cshero-product-price clearfix">
                <?php
                    do_action('woocommerce_after_shop_loop_item_title');
                ?>
            </div>
        <?php endif; ?>
        <?php if ($show_add_to_cart == '1'): ?>
            <div class="cshero-add-to-cart">
                <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
            </div>
        <?php endif; ?>   
        <div class="cshero-view-detail">
            <a class="btn view-detail" rel="" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span>View Detail</span></a>
        </div> 
    </div>  
</div>