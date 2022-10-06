<div id="<?php echo esc_attr($fancybox_id); ?>" class="cshero-fancybox-wrap <?php echo esc_attr($fancy_wrap.' '.$custom_class.' '.$content_align.' '.$animate_class); ?>" <?php echo ''.$box_style;?>>
    <div class="cshero-fancybox-title-image">
        <?php if($show_icon_link){?>
            <a title="<?php echo esc_attr($read_more); ?>" href="<?php echo esc_url($link_show_more); ?>">
        <?php } ?>
        <?php if(!empty($icon_title)) { ?>
            <i class="fancy-icon icon-hover-<?php echo esc_attr($icon_hover_style);?> fa <?php echo esc_attr($icon_title); ?>" <?php echo ''.$style; ?>></i>
        <?php } ?>
        <?php if($show_icon_link){?>
            </a>
        <?php } ?>
        <?php if (!empty($image_url)) { ?>
            <div class="cshero-fancybox-image">
                <img src="<?php echo esc_attr($image_url); ?>" alt="<?php echo ''.$title; ?>" />
            </div>
        <?php } ?>
    </div>
    <?php if ( !empty( $content ) || !empty( $read_more ) ) : ?>
        <div class="cshero-fancybox-content">
            <<?php echo ''.$heading_size ?> class="cshero-fancybox-title-wrap" <?php echo ''.$title_style; ?> >
                <span class="cshero-title-main"><?php echo ''.$title; ?></span>
            </<?php echo ''.$heading_size; ?>>
            <?php if ( $content ) : ?>
                <div class="content">
                    <?php echo ''.$content; ?>
                </div>
            <?php endif; ?>
            
            <?php
            if ($read_more != '') { ?>
                <div class="cshero-read-more" <?php if ( $read_more_margin ) echo 'style="margin: '.esc_attr($read_more_margin).'"'; ?>>
                    <a class="read-more-link <?php if($read_btn){ echo ''.$button_type. ' btn ' . $button_size;} ?>" title="<?php echo esc_attr($read_more); ?>" href="<?php echo esc_url($link_show_more); ?>">
                        <?php echo ''.$read_more; ?>
                    </a>
                </div>
            <?php } ?>
        </div>
    <?php endif; ?>
</div>
