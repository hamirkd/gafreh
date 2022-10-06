<article <?php post_class(); ?>>
    <h3 class="cs-pricing-title" <?php if($custom['is_feature'][0] == 1) {?> style="background: <?php echo ''.$title_background_pricing_color; ?>; color: <?php echo ''.$title_pricing_color; ?>" <?php } ?>><?php if($custom['is_feature'][0] == 1) {?><span><?php echo ''.$custom['best_value'][0]; ?></span><?php } ?><?php echo get_the_title(); ?></h3>
    <?php
    if($video_file_webm || $video_file_ogg || $video_file_mp4 || has_post_thumbnail()){
        ?>
        <div class="pricing-video">
            <?php if($video_file_webm || $video_file_ogg || $video_file_mp4): ?>
            <video class="pricing-content" width="auto" height="auto" <?php echo ''.$poster; ?>>
                <?php if($video_file_webm): ?>
                <source src="<?php echo ''.$video_file_webm; ?>" type="video/webm">
                <?php endif; ?>
                <?php if($video_file_ogg): ?>
                <source src="<?php echo ''.$video_file_ogg; ?>" type="video/ogg">
                <?php endif; ?>
                <?php if($video_file_mp4): ?>
                <source src="<?php echo ''.$video_file_mp4; ?>" type="video/mp4">
                <?php endif; ?>
            </video>
            <span class="pricing-video-play" onclick=""></span>
            <?php elseif (has_post_thumbnail()):
            the_post_thumbnail('large');
            endif; ?>
        </div>
    <?php } ?>
    <div class="cs-pricing-content-wrapper">
        <?php the_content(); ?>
    </div>
    <div class="cs-pricing-description">
        <div class="jmPrice">
            <?php if($custom['price'][0] != '') { ?>
            <div class="number">
                <span><?php echo esc_attr($custom['price'][0]); ?></span>
                <?php if($custom['value'][0] != '') { ?>
                    <small><?php echo esc_attr($custom['value'][0]); ?></small>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <dl class="loaded" <?php if($custom['is_feature'][0] == 1) { echo 'style="background:'.$content_background_pricing_color.';"'; } ?>>
            <?php if($custom['price'][0] != '' || $custom['per_time'][0] != '') { ?>
            <?php } ?>
            <?php if($custom['option_1'][0] != '') { ?>
            <dd class="odd"><?php echo ''.$custom['option_1'][0] ?></dd>
            <?php } ?>
            <?php if($custom['option_2'][0] != '') { ?>
            <dd class="retail"><?php echo ''.$custom['option_2'][0] ?></dd>
            <?php } ?>
            <?php if($custom['option_3'][0] != '') { ?>
            <dd class="odd"><?php echo ''.$custom['option_3'][0] ?></dd>
            <?php } ?>
            <?php if($custom['option_4'][0] != '') { ?>
            <dd class="retail"><?php echo ''.$custom['option_4'][0] ?></dd>
            <?php } ?>
            <?php if($custom['option_5'][0] != '') { ?>
            <dd class="cs-option-5"><?php echo ''.$custom['option_5'][0] ?></dd>
            <?php } ?>
            <?php if($custom['option_6'][0] != '') { ?>
            <dd class="cs-option-6"><?php echo ''.$custom['option_6'][0] ?></dd>
            <?php } ?>
            <?php if($custom['option_7'][0] != '') { ?>
            <dd class="cs-option-7"><?php echo ''.$custom['option_7'][0] ?></dd>
            <?php } ?>
            <?php if($custom['option_8'][0] != '') { ?>
            <dd class="cs-option-8"><?php echo ''.$custom['option_8'][0] ?></dd>
            <?php } ?>
            <?php if($custom['option_9'][0] != '') { ?>
            <dd class="cs-option-9"><?php echo ''.$custom['option_9'][0] ?></dd>
            <?php } ?>
            <?php if($custom['option_10'][0] != '') { ?>
            <dd class="cs-option-10"><?php echo ''.$custom['option_10'][0] ?></dd>
            <?php } ?>
        </dl>
    </div>
    <div class="cs-pricing-button" <?php if($custom['is_feature'][0] == 1) { echo 'style="background:'.$content_background_pricing_color.';"'; } ?>>
        <a <?php if($custom['is_feature'][0] == 1) { echo 'style="background:'.$button_background_pricing_color.';color:'.$button_font_pricing_color.';"'; } ?> title="<?php get_the_title() ?>" href="<?php echo esc_url($custom['button_url'][0]); ?>" rel="" class="btn btn-block <?php echo ''.$button_type;?>"><?php echo ''.$custom['button_text'][0]; ?></a>
    </div>
</article>
