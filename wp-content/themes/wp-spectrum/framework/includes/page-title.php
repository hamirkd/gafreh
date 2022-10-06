<?php
/**
 * @name : Title Bar & breadcrumb
 * @author Fox
 * @version 1.0.0
 */
global $smof_data, $breadcrumb, $pagetitle ,$post;
/** values */
$title_class = $animation = $data_parallax = $subheader_text = $breadcrumb_text = $pagetitle_content = $bg_overlay = $breadcrumb_content = '';
/** render options */
$smof_data['cs_page_title_engle_style'] = '1';
$smof_data['page_title_engle_height'] = '';
$smof_data['page_title_engle_color'] = '';
$smof_data['page_title_engle'] = '0';

if(is_page() && isset($post->ID)){
    $breadcrumb_enable = get_post_meta($post->ID, 'cs_breadcrumb', true);
    $breadcrumb_text = get_post_meta($post->ID, 'cs_breadcrumb_text', true);
    $bg_overlay = get_post_meta($post->ID, 'cs_page_title_bg_overlay', true);
    if (get_post_meta($post->ID, 'cs_page_title_setting', true)) {
        $background_image = get_post_meta($post->ID, 'cs_page_title_bg', true);
        $bg_parallax = get_post_meta($post->ID, 'cs_page_title_bg_parallax', true);
        $title_bar_align = get_post_meta($post->ID, 'cs_title_bar_align', true);
        $subheader_text = get_post_meta($post->ID, 'cs_page_title_custom_subheader_text', true);
        
        $title_class = ' page-title-style';
        $title_class .= ' '.get_post_meta($post->ID, 'cs_page_title_class', true);
        $pagetitle = get_post_meta($post->ID, 'cs_page_title_enable', true);
        if ($background_image) {
            $attachment_image = wp_get_attachment_metadata($background_image, 'full');
            $smof_data['background-page-title']['media']['height'] = $attachment_image['height'];
            $smof_data['background-page-title']['media']['width'] = $attachment_image['width'];
        }
        if($bg_parallax != ''){
            $smof_data['page_title_bg_parallax'] = $bg_parallax;
        }
        if ($title_bar_align != '') {
            $smof_data['page_title_bar_align'] = $title_bar_align;
        }
    } else {
        $pagetitle = $smof_data['page_page_title'];
    }
    $breadcrumb = ($breadcrumb_enable != '') ? $breadcrumb_enable : $smof_data['page_breadcrumbs'];
    $animation = $smof_data['page_page_title_animation'];   
    /** Engle **/
    $page_title_engle_height = get_post_meta($post->ID, 'cs_page_title_engle_height', true);
    $page_title_engle_color = get_post_meta($post->ID, 'cs_page_title_engle_color', true);
    $cs_page_title_engle_style = get_post_meta($post->ID, 'cs_page_title_engle_style', true);
    $page_title_engle = get_post_meta($post->ID, 'cs_page_title_engle', true);
    if($page_title_engle_height){
        $smof_data['page_title_engle_height'] = $page_title_engle_height;
    }
    if($page_title_engle_color){
        $smof_data['page_title_engle_color'] = $page_title_engle_color;
    }
    if($page_title_engle){
        $smof_data['page_title_engle'] = $page_title_engle;
    }
    if($cs_page_title_engle_style){
        $smof_data['cs_page_title_engle_style'] = $cs_page_title_engle_style;
    }
} elseif (is_single() && isset($post->ID)){
    $pagetitle = $smof_data['post_page_title'];
    switch (get_post_type()){
        case 'portfolio':
            $breadcrumb = $smof_data['portfolio_breadcrumb'];
            break;
        case 'team':
            $breadcrumb = $smof_data['team_breadcrumb'];
            break;
        default:
            $breadcrumb = $smof_data['post_breadcrumbs'];
            break;
    }
    $animation = $smof_data['post_page_title_animation'];
    $subheader_text = get_post_meta($post->ID, 'cs_post_subtitle', true);
    $title_bg_image = get_post_meta($post->ID, 'cs_post_title_bg_image', true);
    $bg_overlay = get_post_meta($post->ID, 'cs_page_title_bg_overlay', true);
    if(get_post_meta($post->ID, 'cs_post_page_title_custom',true)){
        $pagetitle = get_post_meta($post->ID, 'cs_post_page_title',true);
    }
    
    if($title_bg_image){
        $attachment_image = wp_get_attachment_metadata($title_bg_image, 'full');
        $smof_data['background-page-title']['media']['height'] = $attachment_image['height'];
        $smof_data['background-page-title']['media']['width'] = $attachment_image['width'];
    }
    elseif (has_post_thumbnail()){
        $attachment_image = wp_get_attachment_metadata(get_post_thumbnail_id($post->ID), 'full');
        $smof_data['background-page-title']['media']['height'] = $attachment_image['height'];
        $smof_data['background-page-title']['media']['width'] = $attachment_image['width'];
    }
} elseif (is_archive()){
    $pagetitle = $smof_data['archive_page_title'];
    $breadcrumb = $smof_data['archive_breadcrumbs'];
    $animation = $smof_data['archive_page_title_animation'];
} elseif (is_front_page()){
    $pagetitle = '0';
    $breadcrumb = '0';
} elseif (is_search()){
    $pagetitle = $smof_data['search_page_title'];
    $breadcrumb = $smof_data['search_breadcrumbs'];
    $animation = $smof_data['search_page_title_animation'];
} elseif (is_404()){
    $pagetitle = $smof_data['404_page_title'];
    $breadcrumb = $smof_data['404_breadcrumbs'];
    $animation = $smof_data['404_page_title_animation'];
} else {
    $pagetitle = '1';
    $breadcrumb = $smof_data['breadcrumb_show'];
}
/** data parallax */
if($smof_data['page_title_bg_parallax'] && !empty($smof_data['background-page-title']['media'])){
    $data_parallax = " data-stellar-background-ratio=0.6 data-background-width={$smof_data['background-page-title']['media']['width']} data-background-height={$smof_data['background-page-title']['media']['height']}";
}
/** render title content */
if($pagetitle){
    $pagetitle_content = '<div class="title_bar"><h1 class="page-title">';
    ob_start();
    cshero_page_title_render();
    $pagetitle_content .= ob_get_clean();
    $pagetitle_content .= '</h1>';
    if($subheader_text){
       $pagetitle_content .=  '<div class="sub_header_text">'.$subheader_text.'</div>';
    }
    $pagetitle_content .= '</div>';
}
/** render breadcrumb content */
if($breadcrumb){
    $breadcrumb_content = '<div id="cs-breadcrumb-wrapper"';
    if($smof_data['breadcrumb_mobile'] != '1'){
        $breadcrumb_content .= ' class="hidden-xs"'; 
    }
    $breadcrumb_content .= '><div class="cs-breadcrumbs">';
    if($breadcrumb_text){
       $breadcrumb_content .= $breadcrumb_text;
    } else {
       ob_start();
       cshero_breadcrumb();
       $breadcrumb_content .= ob_get_clean();
    }
    $breadcrumb_content .= '</div></div>';
}

/** render layout */
$_breadcrumb_content = $breadcrumb_content;
$_pagetitle_content = $pagetitle_content;
$col_1 = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
$col_2 = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
if(!$breadcrumb){
    $col_1 = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
    $col_2 = '';
} elseif ($pagetitle) {
    switch ($smof_data['page_title_bar_align']) {
        case 'center':
            $col_1 = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
            $col_2 = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
            break;
        case 'right':
            $col_1 = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
            $col_2 = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
            $_breadcrumb_content = $pagetitle_content;
            $_pagetitle_content = $breadcrumb_content;
            break;
        default:
            $col_1 = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
            $col_2 = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
            break;
    }
}

if($pagetitle): ?>
<section class="cs-content-header<?php if(is_sticky()){ echo " page-title-sticky"; } ?>">
    <div id="cs-page-title-wrapper" class="cs-page-title stripe-parallax-bg<?php echo esc_attr($title_class); ?>" <?php echo esc_attr($data_parallax); ?>>
    	<div class="container">
    		<div id="<?php if($animation){ echo 'title-animate'; } ?>" class="row">
    		    <?php if ($pagetitle && $_pagetitle_content): ?>
                <div class="<?php echo esc_attr($col_1); ?>">
                    <?php echo ''.$_pagetitle_content; ?>
                </div>
                <?php endif; ?>
        		<?php if ($breadcrumb && $_breadcrumb_content): ?>
        		<div class="<?php echo esc_attr($col_2); ?>">
            		<?php echo ''.$_breadcrumb_content; ?>
        		</div>
        		<?php endif; ?>
    		</div>
    	</div>
    	<?php if(get_post_type() == 'post' && is_single()): ?>
    	<span class="cshero-feature-posttype">
            <?php $post_icon = cshero_get_post_format_icon(); ?>
            <i class="<?php echo esc_attr($post_icon['icon']); ?>"></i>
        </span>
        <?php endif; ?>
        <?php if($bg_overlay):?>
        <span class="cs-page-title-overlay" style="background-color:<?php echo esc_attr($bg_overlay); ?>"></span>
        <?php endif; ?>
        <?php if ($smof_data['page_title_engle']): ?>
            <?php if (($smof_data['cs_page_title_engle_style']) == '1'): ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="<?php echo esc_attr($smof_data['page_title_engle_height']); ?>" class="decor" style="fill: <?php echo esc_attr($smof_data['page_title_engle_color']); ?>"><path stroke-width="0" d="M0 0 L100 100 L0 200"/></svg>
            <?php endif; ?> 
            <?php if (($smof_data['cs_page_title_engle_style']) == '2'): ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="<?php echo esc_attr($smof_data['page_title_engle_height']); ?>" class="decor" style="fill: <?php echo esc_attr($smof_data['page_title_engle_color']); ?>"><path stroke-width="0" d="M0 100 L100 0 L200 100"/></svg>
            <?php endif; ?>   
            <?php if (($smof_data['cs_page_title_engle_style']) == '3'): ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="<?php echo esc_attr($smof_data['page_title_engle_height']); ?>" class="decor" style="fill: <?php echo esc_attr($smof_data['page_title_engle_color']); ?>"><path stroke-width="0" d="M0 0 L50 100 L100 0 L100 100 L0 100"/></svg>
            <?php endif; ?>    
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>