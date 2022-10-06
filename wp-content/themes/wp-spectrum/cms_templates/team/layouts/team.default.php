<?php
    global $team_options;
    extract($team_options);
?>
<article id="post-<?php the_ID(); ?>" <?php  post_class(); ?> <?php if($content_bg_color) echo 'style="background-color:'.$content_bg_color.';padding:10px;"';?>>
    <header class="cshero-team-title-wrap">
        <?php if ($show_title) { ?>
            <<?php echo ''.$item_heading_size;?> class="cshero-team-title">
                <a <?php if($title_team_color) echo 'style="color:'.$title_team_color.';"';?> title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title() ?></a>
            </<?php echo ''.$item_heading_size;?>>
        <?php } ?>
    </header>
    <div class="cshero-team-info-wrap">
        <?php if ($show_category) { ?>
            <div class="cshero-team-category"><?php echo strip_tags (get_the_term_list($post->ID, 'team_category', '', ', ', '')); ?></div>
        <?php } ?>
        <?php  if($show_team_position) {                            
            $team_position = isset($custom['team_position'][0]) ? $custom['team_position'][0] : '';
            if ($team_position) { ?>
            <div class="cshero-team-info cshero-team-position"><?php echo strip_tags ($team_position); ?></div>
        <?php } } ?>
        <?php  ?>
        <?php  if($show_team_qualification) {                           
            $team_qualification = isset($custom['team_qualification'][0]) ? $custom['team_qualification'][0] : '';
            if ($team_qualification) { ?>
            <div class="cshero-team-info cshero-team_qualification"><?php echo strip_tags ($team_qualification); ?></div>
        <?php } } ?>
        <?php  ?>
        <?php  if($show_team_experience) {                          
            $team_experience = isset($custom['team_experience'][0]) ? $custom['team_experience'][0] : '';
            if ($team_experience) { ?>
            <div class="cshero-team-info cshero-team_experience"><?php echo strip_tags ($team_experience); ?></div>
        <?php } }?>
        <?php  if($show_team_contact_info) {                               
            $team_contact_info = isset($custom['team_contact_info'][0]) ? $custom['team_contact_info'][0] : '';
            if ($team_contact_info) { ?>
            <div class="cshero-team-info cshero-team_contact_info"><?php echo strip_tags ($team_contact_info); ?></div>
        <?php } } ?>
    </div>
    <?php if ($show_socials) {
        if (!empty($links)) {
            $social_title = get_post_meta( $post->ID, '_cshero_team_social', true );
            if(!empty($social_title)){
                echo '<h3 class="cshero-content-header">'.$social_title.'</h3>';
            }
            echo '<div class="cshero-team-social">' . implode('', $links) . '</div>';
        }
    } ?>
    <?php if (has_post_thumbnail()) { ?>
        <div class="cshero-team-image clearfix" <?php echo ''.$crop_image_size;?>>
            <?php
            $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);;
            if($crop_image){
                $image_resize = mr_image_resize( $attachment_image[0], $width_image, $height_image, true, 'c', false );
                echo '<img alt="" src="'. esc_url($image_resize) .'" '.$image_style.' />';
            }else{
                echo '<img alt="" src="'. esc_attr($attachment_image[0]) .'" '.$image_style.' />';
            }
            ?>

			<a class="overlay cshero-readmore" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" rel="">
			</a>
        </div>
    <?php } else { ?>
        <?php
            $no_image = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
            if($crop_image){
                $image_resize = mr_image_resize( $no_image, $width_image, $height_image, true, false );
            }
        ?>
        <div class="cshero-team-image no-image clearfix" <?php echo ''.$crop_image_size;?>>
            <?php if($crop_image){ ?>
                <img alt="" src="<?php echo ''.$image_resize; ;?>" <?php echo ''.$image_style;?> />
            <?php } else { ?>
                <img alt="" src="<?php echo ''.$no_image; ;?>" <?php echo ''.$image_style;?> />
            <?php } ?>

            <?php if($read_more){ ?>
				<a class="overlay cshero-readmore" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" rel="">
					<i class="fa fa-link"></i>
				</a>
			<?php } ?>
        </div>
    <?php } ?>
    <?php if ($show_description) { ?>
    <div class="cshero-team-content">
        <div class="cshero-team-description">
            <?php echo substr(get_the_content($read_more), 0, $excerpt_length); ?>
        </div>
    </div>
    <?php } ?>
</article>
