<?php
/** Generate Header Css */
//add_action('wp_ajax_cshero_header_css', 'cshero_header_css_callback');
//add_action('wp_ajax_nopriv_cshero_header_css', 'cshero_header_css_callback');
add_action('wp_head', 'cshero_header_css_callback');

function cshero_header_css_callback()
{
    global $smof_data, $post, $page_id;
    if (!empty($post->ID)) {
        $page_id = $post->ID;
    }
    ob_start();
    require_once 'dynamic.header.php';
    echo '<style type="text/css">'.cshero_compressCss(ob_get_clean()).'</style>';
}

/**
 * minimize CSS styles
 *
 * @since 1.1.0
 */
function cshero_compressCss($buffer){

    /* remove comments */
    $buffer = preg_replace("!/\*[^*]*\*+([^/][^*]*\*+)*/!", "", $buffer);
    /* remove tabs, spaces, newlines, etc. */
    $buffer = str_replace("	", " ", $buffer); //replace tab with space
    $arr = array("\r\n", "\r", "\n", "\t", "  ", "    ", "    ");
    $rep = array("", "", "", "", " ", " ", " ");
    $buffer = str_replace($arr, $rep, $buffer);
    /* remove whitespaces around {}:, */
    $buffer = preg_replace("/\s*([\{\}:,])\s*/", "$1", $buffer);
    /* remove last ; */
    $buffer = str_replace(';}', "}", $buffer);

    return $buffer;
}

function cshero_re_render_options()
{
    global $smof_data, $page_id;

    if(!empty( $smof_data['background-header']['background-color'])){
        $smof_data['background-header']['background-color'] = HexToRGB($smof_data['background-header']['background-color'],$smof_data['header_transparent']);
    }
    if(!empty($smof_data['header_border_bottom_color']['color'])){
        $smof_data['header_border_bottom_color'] = HexToRGB($smof_data['header_border_bottom_color']['color'],$smof_data['header_border_bottom_color']['alpha']);
    }
    if ($page_id) {
        $post_type = get_post_field('post_type',$page_id);
        /**
         * background-body
         */
        $bg_body = array();
        $bg_body['background-color'] = get_post_meta($page_id, 'cs_body_bg_color', true);
        $background_image = get_post_meta($page_id, 'cs_body_bg_image', true);
        if ($background_image || $smof_data['background-body']['background-image']) {
            $attachment_image = wp_get_attachment_image_src($background_image, 'full');
            if (isset($attachment_image[0])) {
                $bg_body['background-image'] = $attachment_image[0];
            }
            $bg_body['background-repeat'] = get_post_meta($page_id, 'cs_body_bg_repeat', true);
            $bg_body['background-size'] = get_post_meta($page_id, 'cs_body_bg_size', true);
            $bg_body['background-attachment'] = get_post_meta($page_id, 'cs_body_bg_attachment', true);
            $bg_body['background-position'] = get_post_meta($page_id, 'cs_body_bg_position', true);
        }
        $smof_data['background-body'] = cshero_options_array_render($bg_body, $smof_data['background-body']);
        
        /**
         * background-header
         */
        $bg_header = array();
        $bg_header['background-color'] = get_post_meta($page_id, 'cs_header_bg_color', true);
        $background_image = get_post_meta($page_id, 'cs_header_bg_image', true);
        if ($background_image || $smof_data['background-header']['background-image']) {
            $attachment_image = wp_get_attachment_image_src($background_image, 'full');
            if (isset($attachment_image[0])) {
                $bg_header['background-image'] = $attachment_image[0];
            }
            $bg_header['background-color'] = get_post_meta($page_id, 'cs_header_bg_color', true);
            $bg_header['background-repeat'] = get_post_meta($page_id, 'cs_header_bg_repeat', true);
            $bg_header['background-size'] = get_post_meta($page_id, 'cs_header_bg_size', true);
            $bg_header['background-attachment'] = get_post_meta($page_id, 'cs_header_bg_attachment', true);
            $bg_header['background-position'] = get_post_meta($page_id, 'cs_header_bg_position', true);
        }
        $smof_data['background-header'] = cshero_options_array_render($bg_header, $smof_data['background-header']);
        
        /**
         * background-page-title
         */
        if($post_type == 'page'){
            if (get_post_meta($page_id, 'cs_page_title_setting', true)) {
                $smof_data['page_page_title'] = get_post_meta($page_id, 'cs_page_title_enable', true);
                /* bg */
                $bg_page = array();
                $bg_page['background-color'] = get_post_meta($page_id, 'cs_page_title_background_color', true);
                $background_image = get_post_meta($page_id, 'cs_page_title_bg', true);
                $title_margin = get_post_meta($page_id, 'cs_page_title_margin', true);
                $title_padding = get_post_meta($page_id, 'cs_page_title_padding', true);
                if ($background_image || $smof_data['background-page-title']['background-image']) {
                    $attachment_image = wp_get_attachment_image_src($background_image, 'full');
                    if (isset($attachment_image[0])) {
                        $bg_page['background-image'] = $attachment_image[0];
                    }
                    $bg_page['background-repeat'] = get_post_meta($page_id, 'cs_page_title_bg_repeat', true);
                    $bg_page['background-size'] = get_post_meta($page_id, 'cs_page_title_bg_size', true);
                    $bg_page['background-attachment'] = get_post_meta($page_id, 'cs_page_title_bg_attachment', true);
                    $bg_page['background-position'] = get_post_meta($page_id, 'cs_page_title_bg_position', true);
                }
                $smof_data['background-page-title'] = cshero_options_array_render($bg_page, $smof_data['background-page-title']);
                /* custom */
                if ($smof_data['page_page_title']) {          
                    $title_bar_align = get_post_meta($page_id, 'cs_title_bar_align', true);
                    $title_bar_color = get_post_meta($page_id, 'cs_title_bar_color', true);
                    $title_size = get_post_meta($page_id, 'cs_page_title_custom_size', true);
                    $title_sub_color = get_post_meta($page_id, 'cs_page_title_custom_subheader_text_color', true);
                    if ($title_bar_align) {
                        $smof_data['page_title_bar_align'] = $title_bar_align;
                    }
                    if ($title_bar_color) {
                        $smof_data['page_title_color'] = $title_bar_color;
                    }
                    if ($title_size) {
                        $smof_data['title_bar_size'] = $title_size;
                    }
                    if($title_sub_color) {
                        $smof_data['page_subtitle_color'] = $title_sub_color;
                    }
                }
                /* padding & margin */
                if ($title_padding) {
                    $smof_data['page_title_padding'] = $title_padding;
                }
                if ($title_margin) {
                    $smof_data['page_title_margin'] = $title_margin;
                }
            }
        } elseif ($post_type == 'post'){
            $bg_post = array();
            $title_bg_color = get_post_meta($page_id, 'cs_post_title_bg_color', true);
            $title_bg_image = get_post_meta($page_id, 'cs_post_title_bg_image', true);
            $title_bar_color = get_post_meta($page_id, 'cs_post_title_color', true);
            $subtitle_bar_color = get_post_meta($page_id, 'cs_post_subtitle_color', true);
            $breadcrumb_color = get_post_meta($page_id, 'cs_post_breadcrumb_color', true);
            
            if($title_bg_image){
                $attachment_image = wp_get_attachment_image_src($title_bg_image, 'full');
                if (isset($attachment_image[0])) {
                    $bg_post['background-image'] = $attachment_image[0];
                }
            }
            elseif (has_post_thumbnail($page_id)){
                $bg_post['background-image'] = wp_get_attachment_url(get_post_thumbnail_id($page_id), 'full');
            }
            
            if($title_bg_color) { $bg_post['background-color'] = $title_bg_color; }
            
            if($title_bar_color){ $smof_data['page_title_color'] = $title_bar_color; } 
            elseif ($smof_data['post_page_title_color']) { $smof_data['page_title_color'] = $smof_data['post_page_title_color']; }
            
            if($subtitle_bar_color){ $smof_data['page_subtitle_color'] = $subtitle_bar_color; }
            elseif ($smof_data['post_page_subtitle_color']) { $smof_data['page_subtitle_color'] = $smof_data['post_page_subtitle_color']; }
            
            if($breadcrumb_color){$smof_data['breadcrumbs_text_color']= $breadcrumb_color;}
            elseif ($smof_data['post_breadcrumbs_color']){$smof_data['breadcrumbs_text_color'] = $smof_data['post_breadcrumbs_color'];}
            
            $smof_data['background-page-title'] = cshero_options_array_render($bg_post, $smof_data['background-page-title']);
        }
        /**
         * background-bottom
         */
        $bg_bottom = array();
        $bg_bottom['background-color'] = get_post_meta($page_id, 'footer_top_bg_color', true);
        $background_image = get_post_meta($page_id, 'footer_top_bg_image', true);
        if ($background_image || $smof_data['background-bottom']['background-image']) {
            $attachment_image = wp_get_attachment_image_src($background_image, 'full');
            if (isset($attachment_image[0])) {
                $bg_bottom['background-image'] = $attachment_image[0];
            }
            $bg_bottom['background-repeat'] = get_post_meta($page_id, 'footer_top_bg_repeat', true);
            $bg_bottom['background-size'] = get_post_meta($page_id, 'footer_top_bg_size', true);
            $bg_bottom['background-attachment'] = get_post_meta($page_id, 'footer_top_bg_attachment', true);
            $bg_bottom['background-position'] = get_post_meta($page_id, 'footer_top_bg_position', true);
        }
        $smof_data['background-bottom'] = cshero_options_array_render($bg_bottom, $smof_data['background-bottom']);
        
        /**
         * background-footer-top
         */
        $bg_footer_top = array();
        $bg_footer_top['background-color'] = get_post_meta($page_id, 'cs_footer_top_bg_color', true);
        $background_image = get_post_meta($page_id, 'cs_footer_top_bg_image', true);
        if ($background_image || $smof_data['background-footer-top']['background-image']) {
            $attachment_image = wp_get_attachment_image_src($background_image, 'full');
            if (isset($attachment_image[0])) {
                $bg_footer_top['background-image'] = $attachment_image[0];
            }
            $bg_footer_top['background-repeat'] = get_post_meta($page_id, 'cs_footer_top_bg_repeat', true);
            $bg_footer_top['background-size'] = get_post_meta($page_id, 'cs_footer_top_bg_size', true);
            $bg_footer_top['background-attachment'] = get_post_meta($page_id, 'cs_footer_top_bg_attachment', true);
            $bg_footer_top['background-position'] = get_post_meta($page_id, 'cs_footer_top_bg_position', true);
        }
        $smof_data['background-footer-top'] = cshero_options_array_render($bg_footer_top, $smof_data['background-footer-top']);
        /**
         * Breadcrumb
         */
        $breadcrumb_text_align = get_post_meta($page_id, 'cs_breadcrumb_text_align', true);
        $breadcrumb_color = get_post_meta($page_id, 'cs_breadcrumb_color', true);
        if ($breadcrumb_text_align) {
            $smof_data['breadcrumb_text_align'] = get_post_meta($page_id, 'cs_breadcrumb_text_align', true);
        }
        if ($breadcrumb_color) {
            $smof_data['breadcrumbs_text_color'] = get_post_meta($page_id, 'cs_breadcrumb_color', true);
        }
        /**
         * Menu
         */
        $nav_height = get_post_meta($page_id, 'cs_nav_height', true);
        if($nav_height){
            $smof_data['nav_height'] = $nav_height;
        }
        if(get_post_meta($page_id, 'cs_header_setting', true)){
            $smof_data['header_fixed_top'] = get_post_meta($page_id, 'cs_header_fixed_top', true);

            $menu_color = get_post_meta($page_id, 'cs_header_fixed_menu_color', true);
            $menu_active = get_post_meta($page_id, 'cs_header_fixed_menu_color_active', true);
            $menu_color_hover = get_post_meta($page_id, 'cs_header_fixed_menu_color_hover', true);

            $smof_data['header_border_bottom'] = get_post_meta($page_id, 'cs_header_border_bottom', true);
            $border_bottom_style = get_post_meta($page_id, 'cs_header_border_bottom_style', true);
            $border_bottom_height = get_post_meta($page_id, 'cs_header_border_bottom_height', true);
            $border_bottom_color = get_post_meta($page_id, 'cs_header_border_bottom_color', true);

            

            
            if($smof_data['header_fixed_top']){
                if($menu_color){
                    $smof_data['menu_first_color'] = $menu_color;
                }
                if($menu_active){
                    $smof_data['menu_active_first_color'] = $menu_active;
                }
                if($menu_color_hover){
                    $smof_data['header_fixed_menu_color_hover'] = $menu_color_hover;
                }
            }
            if($smof_data['header_border_bottom']){
                if($border_bottom_style){
                    $smof_data['header_border_bottom_style'] = $border_bottom_style;
                }
                if($border_bottom_height){
                    $smof_data['header_border_bottom_height'] = $border_bottom_height;
                }
                if($border_bottom_color){
                    $smof_data['header_border_bottom_color'] = $border_bottom_color;
                }
            }
        }
    }
}

/**
 * render options array to array
 */
function cshero_options_array_render($customs = array(), $options = array())
{
    foreach ($options as $key => $option) {
        if (! empty($customs[$key])) {
            $options[$key] = $customs[$key];
        }
    }
    return $options;
}

/**
 * backgrounds render
 */
function cshero_backgrounds_render($backgrounds, $selector)
{
    ob_start();
    ?>
    <?php echo "".$selector; ?>{
        <?php if(is_array($backgrounds)): ?>
            background-color:<?php echo esc_attr($backgrounds['background-color']); ?>;
            <?php if($backgrounds['background-image']): ?>
            background-repeat:<?php echo esc_attr($backgrounds['background-repeat']); ?>;
            background-size:<?php echo esc_attr($backgrounds['background-size']); ?>;
            background-attachment:<?php echo esc_attr($backgrounds['background-attachment']); ?>;
            background-position:<?php echo esc_attr($backgrounds['background-position']); ?>;
            background-image:url(<?php echo esc_url($backgrounds['background-image']); ?>);
            <?php endif; ?>
        <?php else: ?>
            background-color:<?php echo esc_attr($backgrounds); ?>;
        <?php endif; ?>
    }
    <?php
    return ob_get_clean();
}

/**
 * typography render
 */
function cshero_typography_render($typography = array(), $selector)
{
    ob_start();
    ?>
    <?php echo "".$selector; ?>{
        font-family:<?php echo esc_attr($typography['font-family']); ?>;
        font-weight:<?php echo esc_attr($typography['font-weight']); ?>;
        <?php if($typography['font-style']): ?>
        font-style:<?php echo esc_attr($typography['font-style']); ?>;
        <?php endif; ?>
        text-align:<?php echo esc_attr($typography['text-align']); ?>;
        font-size:<?php echo esc_attr($typography['font-size']); ?>;
        line-height:<?php echo esc_attr($typography['line-height']); ?>;
        color:<?php echo esc_attr($typography['color']); ?>;
        }
    <?php
    return ob_get_clean();
}