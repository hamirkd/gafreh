<?php
$output = $el_class = '';
extract(shortcode_atts(array(
            'el_class' => '',
            'dt_id' => '',
            'dt_offset'=>'',
            'type' => '',
            'css' => '',
            'row_responsive_large'=>'',
            'row_responsive_medium'=>'',
            'row_responsive_small'=>'',
            'row_responsive_extra_small'=>'',
            'font_color' => '',
            'row_link_color' => '',
            'row_head_color' => '',
            'row_link_color_hover' => '',
            'full_width' => false,
            'same_height' => '',
            'bg_video_color' => '#FFF',
            'poster' => '',
            'autoplay' => false,
            'muted' => false,
            'loop' => false,
            'controls' => false,
            'show_btn' => false,
            'preload' => 'none',
            'height_row' => '500px',
            'same_height' => '',
            'bg_video_color' => '#FFF',
            'bg_video_transparent' => '0',
            'bg_video_src_mp4' => '',
            'bg_video_src_ogv' => '',
            'bg_video_src_webm' => '',
            'lax_layer1' => '',
            'lax_layer1_width' => '',
            'lax_layer1_height' => '',
            'lax_layer1_align' => '',
            'lax_layer1_position_x' => '20px',
            'lax_layer1_position_y' => '20px',
            'lax_layer1_speed' => '',
            'lax_layer1_move' => '',
            'lax_layer2' => '',
            'lax_layer2_width' => '',
            'lax_layer2_height' => '',
            'lax_layer2_align' => '',
            'lax_layer2_position_x' => '20px',
            'lax_layer2_position_y' => '20px',
            'lax_layer2_speed' => '',
            'lax_layer2_move' => '',
            'lax_layer3' => '',
            'lax_layer3_width' => '',
            'lax_layer3_height' => '',
            'lax_layer3_align' => '',
            'lax_layer3_position_x' => '20px',
            'lax_layer3_position_y' => '20px',
            'lax_layer3_speed' => '',
            'lax_layer3_move' => '',
            'lax_layer4' => '',
            'lax_layer4_width' => '',
            'lax_layer4_height' => '',
            'lax_layer4_align' => '',
            'lax_layer4_position_x' => '20px',
            'lax_layer4_position_y' => '20px',
            'lax_layer4_speed' => '',
            'lax_layer4_move' => '',
            'lax_layer5' => '',
            'lax_layer5_width' => '',
            'lax_layer5_height' => '',
            'lax_layer5_align' => '',
            'lax_layer5_position_x' => '20px',
            'lax_layer5_position_y' => '20px',
            'lax_layer5_speed' => '',
            'lax_layer5_move' => '',
            'lax_layer6' => '',
            'lax_layer6_width' => '',
            'lax_layer6_height' => '',
            'lax_layer6_align' => '',
            'lax_layer6_position_x' => '20px',
            'lax_layer6_position_y' => '20px',
            'lax_layer6_speed' => '',
            'lax_layer6_move' => '',
            'lax_layer7' => '',
            'lax_layer7_width' => '',
            'lax_layer7_height' => '',
            'lax_layer7_align' => '',
            'lax_layer7_position_x' => '20px',
            'lax_layer7_position_y' => '20px',
            'lax_layer7_speed' => '',
            'lax_layer7_move' => '',
            'lax_layer8' => '',
            'lax_layer8_width' => '',
            'lax_layer8_height' => '',
            'lax_layer8_align' => '',
            'lax_layer8_position_x' => '20px',
            'lax_layer8_position_y' => '20px',
            'lax_layer8_speed' => '',
            'lax_layer8_move' => '',
            'enable_row_engle' => false,
            'height_engle' => '60px',
            'engle_position' => 'none',
            'engle_color' => '',
            'animation' => '',
            'parallax_speed' => '',
            'enable_parallax' => false,
            'enable_row_engle' => false,
            'height_engle' => '60px',
            'engle_color' => '',
            'enable_engle_duplicate' => false,
            'engle_position_duplicate' => 'none',
            'engle_uplicated_height' => '60px',
            'engle_duplicated_color' => '',
            'enable_engle_style2' => false,
            'engle_position_style2' => 'none',
            'height_engle_style2' => '60px',
            'engle_color_style2' => '',
            'enable_engle_duplicated_style2' => false,
            'engle_duplicated_position_style2' => '',
            'engle_duplicated_height_style2' => '60px',
            'engle_duplicated_color_style2' => '',
            'engle_border_color' => '',
            'engle_border_width' => '',
            'engle_duplicated_border_color' => '',
            'engle_duplicated_border_width' => '',
            'enable_row_sc' => '',
            'row_top_sc' => '',
            'row_bottom_sc' => '',
            'row_ar_color' => '',
            'disable_parallax_mobile' => '',
            'bg_color_left' => '',
            'bg_color_right' => ''
                ), $atts));
/* script */
wp_enqueue_style('js_composer_front');
wp_enqueue_script('wpb_composer_front_js');
wp_enqueue_style('js_composer_custom_css');
/* one page id */
$output .= '<div class="section">';
if($dt_id){
    $dt_id = " id='$dt_id'";
}
    $el_class = $this->getExtraClass($el_class);
/* Responsive */
    $responsive = '';
    if($row_responsive_large){
        $responsive .= ' hidden-lg';
    }
    if($row_responsive_medium){
        $responsive .= ' hidden-md';
    }
    if($row_responsive_small){
        $responsive .= ' hidden-sm';
    }
    if($row_responsive_extra_small){
        $responsive .= ' hidden-xs';
    }
/* Full Container */
    global $post;
    $post_full_width = get_post_meta($post->ID, 'cs_blog_layout', true);
    $cl_full_width = 'no-container';
    $enable_container = '';
    $main_full_width = '';
    if(!$post_full_width){
        if ($full_width == 'true') {
            $cl_full_width = 'no-container';
        } else {
            $enable_container = $cl_full_width = 'container';
        }
    }
    if ($full_width == 'true') {
        $cl_full_width .= ' cs-row-fullwidth';
        $main_full_width = ' cs-row-fullwidth-wrap';
    } else {
        $cl_full_width .= ' cs-row-container';
        $main_full_width = ' cs-row-container-wrap';
    }
/* row class */
    $lax_class = $lax_layer1 ? 'lax-active' : '';
    $row_sc_class = $enable_row_sc ? 'header-wrapper' : '';
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'wpb_row clearfix '.$engle_position.' '.$engle_position_style2.' '.$lax_class.' '. get_row_css_class() . $el_class . $responsive . $main_full_width . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
/* Link Color */
    global $link_style;
    $uqid = uniqid();
    $class_link = vc_shortcode_custom_css_class( $css, '.' ).' .cshero_'.$uqid;
    if($row_link_color || $row_link_color_hover || $row_head_color){
        if($row_head_color){
            $link_style .= "".$class_link." h1,".$class_link." h2,".$class_link." h3,".$class_link." h4,".$class_link." h5,".$class_link." h6 {color: $row_head_color!important}";
            $link_style .= "".$class_link." .cs-header.dotted-bottom2:after, ".$class_link." .cs-header.dotted-bottom cs-title:after {background-color: $row_head_color!important}";
        }
        if($row_link_color){
            $link_style .= "".$class_link." a{color: $row_link_color!important}";
        }
        if($row_link_color_hover){
            $link_style .= "".$class_link." a:hover{color: $row_link_color_hover!important}";
        }
        wp_register_script( 'cshero_row_css', get_template_directory_uri().'/js/custom_row.js' );
        $translation_array = array( 'css' => $link_style );
        wp_localize_script( 'cshero_row_css', 'cshero_row_object', $translation_array );
        wp_enqueue_script( 'cshero_row_css' );
    }
/* Text Color */
    $style = "";
    if($font_color){
        $style = " style='color: $font_color'";
    }
/* Custom BG */
if ($type) {
    $stripe_classes = array();
    if(is_numeric($poster)) {
        $image_src = wp_get_attachment_url( $poster );
    }else {
        $image_src = $poster;
    }
    $stripe_classes[] = $type;
    /* class same height */
    if ($same_height != false && $same_height != 1) {
        $stripe_classes[] = 'same-height';
    }
    /* video BG */
    $bg_video = '';
    $bg_video_args = array();
    if ($bg_video_src_mp4) {
        $bg_video_args['mp4'] = $bg_video_src_mp4;
    }
    if ($bg_video_src_ogv) {
        $bg_video_args['ogv'] = $bg_video_src_ogv;
    }
    if ($bg_video_src_webm) {
        $bg_video_args['webm'] = $bg_video_src_webm;
    }
    $uniqid = uniqid('video');
    $css_height = 'auto';
    if (!empty($bg_video_args)) {
        $css_height = $height_row;
        $attr_strings = array(
            'id="'.$uniqid.'"',
            'data-id="'.$uniqid.'"',
        );
        if (!empty($image_src)) {
            $attr_strings[] = 'poster="'.$image_src.'"';
        }
        if ($autoplay==true) {
            $attr_strings[] = 'autoplay';
        }
        if ($muted==true) {
            $attr_strings[] = 'muted';
        }
        if ($loop==true) {
            $attr_strings[] = 'loop';
        }
        if ($controls==true) {
            $attr_strings[] = 'controls="controls"';
        }
        if ($preload) {
            $attr_strings[] = 'preload="'.$preload.'"';
        }
        $bg_video .= sprintf('<div class="stripe-video-bg"><video data-ratio="1.7777777777777777" onloadeddata="javascript:{jQuery(this).attr(\'data-ratio\',this.videoWidth/this.videoHeight)}" class="video-parallax" %s>', join(' ', $attr_strings));
        $source = '<source type="%s" src="%s" />';
        foreach ($bg_video_args as $video_type => $video_src) {
            $video_type = wp_check_filetype($video_src, wp_get_mime_types());
            $bg_video .= sprintf($source, $video_type['type'], esc_url($video_src));
        }
        $bg_video .= '</video></div>';
        $bg_video .= '<div class="ww-video-bg" style="background:'.$bg_video_color.' ; opacity :'.$bg_video_transparent.';"></div>';

        $stripe_classes[] = 'stripe-video-wrap';
    }
    $data_attr = ' data-offset="'.$dt_offset.'" data-height-row="'.$css_height.'"';
    if ($enable_parallax) {
        $parallax_speed = floatval($parallax_speed);
        if (!$parallax_speed) {
            $parallax_speed = 0.5;
        }
        if($css){
            preg_match('/id=[0-9]*/', $css , $matches);
            if(!empty($matches[0])){
                $req_id = explode('=', $matches[0]);
                $bg_metadata = wp_get_attachment_metadata($req_id[1]);
                if(!empty($bg_metadata['width']) && !empty($bg_metadata['height'])){
                    $stripe_classes[] = 'stripe-parallax-bg';
                    $data_attr = ' data-stellar-background-ratio="' . $parallax_speed . '" data-background-width="'.$bg_metadata['width'].'" data-background-height="'.$bg_metadata['height'].'"';
                }
            }
            if ($disable_parallax_mobile) {
                $data_attr .= ' data-parallax-mobile="1"';
            }
        }
    }
    if (!empty($css_class)) {
        $stripe_classes[] = $css_class;
    }
    $output .= '<div'.$dt_id.' class="' . esc_attr(implode(' ', $stripe_classes)) . '"' . $data_attr  . '>';
    $output .= $bg_video;
} else {
    $stripe_classes = array();
    if ($same_height != false && $same_height != 1) {
        $stripe_classes[] = 'ww-same-height';
    }
    if (!empty($css_class)) {
        $stripe_classes[] = $css_class;
    }
    $output .= "<div$dt_id";
    if (count($stripe_classes) > 0) {
        $output .= ' class="' . esc_attr(implode(' ', $stripe_classes)) . '" data-offset="'.$dt_offset.'"';
    }
    $output .= ">";
}
/* class animation for row */
if ($animation) {
    wp_enqueue_script( 'waypoints');
    $animation .= '  wpb_animate_when_almost_visible wpb_'.$animation;
}
/** svg */
if($enable_row_engle){
    $M = $engle_border_width ? 'M-'.str_replace('px','',$engle_border_width) : 'M0';
    $L = $engle_border_width ? 'L'.(100 + (int)str_replace('px','',$engle_border_width)) : 'L100';
    $pen = "$M 100 $L 0 L200 100";
    switch ($engle_position){
        case 'engle-top-left':
            $pen = "$M 100 $L 0 L200 100";
            break;
        case 'engle-top-right':
            $pen = "$M 0 $L 100 L0 200";
            break;
        case 'engle-bottom-right':
            $pen = "$M 100 $L 0 L200 100";
            break;
        case 'engle-bottom-left':
            $pen = "$M 0 $L 100 L0 200";
            break;
    }

    $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="'.$height_engle.'" class="decor '.$engle_position.'" style="fill:'.$engle_color.'"><path stroke="'.$engle_border_color.'" stroke-width="'.$engle_border_width.'" d="'.$pen.'"/></svg>';
    if($enable_engle_duplicate){
        $MD = $engle_duplicated_border_width ? 'M-'.str_replace('px','',$engle_duplicated_border_width) : 'M0';
        $LD = $engle_duplicated_border_width ? 'L'.(100 + (int)str_replace('px','',$engle_duplicated_border_width)) : 'L100';
        $penD = "$MD 100 $LD 0 L200 100";
        switch ($engle_position_duplicate){
            case 'engle-top-left':
                $penD = "$MD 100 $LD 0 L200 100";
                break;
            case 'engle-top-right':
                $penD = "$MD 0 $LD 100 L0 200";
                break;
            case 'engle-bottom-right':
                $penD = "$MD 100 $LD 0 L200 100";
                break;
            case 'engle-bottom-left':
                $penD = "$MD 0 $LD 100 L0 200";
                break;
        }
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="'.$engle_uplicated_height.'" class="decor engle-duplicate '.$engle_position_duplicate.'" style="fill:'.$engle_duplicated_color.'"><path stroke="'.$engle_duplicated_border_color.'" stroke-width="'.$engle_duplicated_border_width.'" d="'.$penD.'"/></svg>';
    }
}

if($enable_engle_style2){
    $pen = 'M0 0 L50 100 L100 0 L100 100 L0 100';
    switch ($engle_position_style2){
        case 'engle-top-style1':
            $pen = 'M0 0 L50 100 L100 0 L100 100 L0 100';
            break;
        case 'engle-top-style2':
            $pen = 'M0 0 L50 100 L100 0';
            break;
        case 'engle-bottom-style1':
            $pen = 'M0 0 L50 100 L100 0 L100 100 L0 100';
            break;
        case 'engle-bottom-style2':
            $pen = 'M0 0 L50 100 L100 0';
            break;
    }
    $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="'.$height_engle_style2.'" class="engle-style2 '.$engle_position_style2.'" style="fill:'.$engle_color_style2.'"><path stroke-width="0" d="'.$pen.'"/></svg>';
}
if($enable_engle_duplicated_style2){
    $pen = 'M0 0 L50 100 L100 0 L100 100 L0 100';
    switch ($engle_duplicated_position_style2){
        case 'engle-top-style1':
            $pen = 'M0 0 L50 100 L100 0 L100 100 L0 100';
            break;
        case 'engle-top-style2':
            $pen = 'M0 0 L50 100 L100 0';
            break;
        case 'engle-bottom-style1':
            $pen = 'M0 0 L50 100 L100 0 L100 100 L0 100';
            break;
        case 'engle-bottom-style2':
            $pen = 'M0 0 L50 100 L100 0';
            break;
    }
    $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="'.$engle_duplicated_height_style2.'" class="engle-duplicated-style2 '.$engle_duplicated_position_style2.'" style="fill:'.$engle_duplicated_color_style2.'"><path stroke-width="0" d="'.$pen.'"/></svg>';
}
/** LAX PARALAX */
wp_enqueue_style('lux.background');
wp_enqueue_script('lux.background');
if($lax_layer1){
    $output .= '<div class="cshero-lax-layer lax">';
    if($lax_layer1){
        $align1 = "";
        switch ($lax_layer1_align) {
             case 'lax_left_top':
                 $align1 .= "top: {$lax_layer1_position_y}; left: {$lax_layer1_position_x};";
                 break;
             case 'lax_center_top':
                 $align1 .= "top: {$lax_layer1_position_y}; left: 0; right: 0; margin: auto;";
                 break;
             case 'lax_right_top':
                 $align1 .= "top: {$lax_layer1_position_y}; right: {$lax_layer1_position_x};";
                 break;
             case 'lax_left_middle':
                 $align1 .= "top: 0; bottom: 0; left: {$lax_layer1_position_x}; margin: auto;";
                 break;
             case 'lax_center_middle':
                 $align1 .= "top: 50%; left: 0; right: 0; margin: auto; transform: translate(0px, -50%);-webkit-transform: translate(0px, -50%);-moz-transform: translate(0px, -50%);-ms-transform: translate(0px, -50%);-o-transform: translate(0px, -50%);";
                 break;
             case 'lax_right_middle':
                 $align1 .= "top: 0; bottom: 0; right: {$lax_layer1_position_x}; margin: auto;";
                 break;
             case 'lax_left_bottom':
                 $align1 .= "left: {$lax_layer1_position_x}; bottom: {$lax_layer1_position_y};";
                 break;
             case 'lax_center_bottom':
                 $align1 .= "left: 0; right: 0; bottom:{$lax_layer1_position_y}; margin: auto;";
                 break;
             case 'lax_right_bottom':
                 $align1 .= "right: {$lax_layer1_position_x}; bottom: {$lax_layer1_position_y};";
                 break;
             default:
                 $align1 .= "top: {$lax_layer1_position_y}; left: {$lax_layer1_position_x};";
                 break;
        }
        $lax_layer1 = wp_get_attachment_url($lax_layer1);
        $output .= '<div class="lax-layer cshero-layer-item '.$lax_layer1_align.'" data-speed="'.$lax_layer1_speed.'" data-move="'.$lax_layer1_move.'" style="'.$align1.' height:'.$lax_layer1_height.'; width:'.$lax_layer1_width.'; background-image:url('.$lax_layer1.');"></div>';
    }
    if($lax_layer2) {
        $align2 = "";
        switch ($lax_layer2_align) {
             case 'lax_left_top':
                 $align2 .= "top: {$lax_layer2_position_y}; left: {$lax_layer2_position_x};";
                 break;
             case 'lax_center_top':
                 $align2 .= "top: {$lax_layer2_position_y}; left: 0; right: 0; margin: auto;";
                 break;
             case 'lax_right_top':
                 $align2 .= "top: {$lax_layer2_position_y}; right: {$lax_layer2_position_x};";
                 break;
             case 'lax_left_middle':
                 $align2 .= "top: 0; bottom: 0; left: {$lax_layer2_position_x}; margin: auto;";
                 break;
             case 'lax_center_middle':
                 $align2 .= "top: 50%; left: 0; right: 0; margin: auto; transform: translate(0px, -50%);-webkit-transform: translate(0px, -50%);-moz-transform: translate(0px, -50%);-ms-transform: translate(0px, -50%);-o-transform: translate(0px, -50%);";
                 break;
             case 'lax_right_middle':
                 $align2 .= "top: 0; bottom: 0; right: {$lax_layer2_position_x}; margin: auto;";
                 break;
             case 'lax_left_bottom':
                 $align2 .= "left: {$lax_layer2_position_x}; bottom: {$lax_layer2_position_y};";
                 break;
             case 'lax_center_bottom':
                 $align2 .= "left: 0; right: 0; bottom:{$lax_layer2_position_y}; margin: auto;";
                 break;
             case 'lax_right_bottom':
                 $align2 .= "right: {$lax_layer2_position_x}; bottom: {$lax_layer2_position_y};";
                 break;
             default:
                 $align2 .= "top: {$lax_layer2_position_y}; left: {$lax_layer2_position_x};";
                 break;
        }
        $lax_layer2 = wp_get_attachment_url($lax_layer2);
        $output .= '<div class="lax-layer cshero-layer-item '.$lax_layer2_align.'" data-speed="'.$lax_layer2_speed.'" data-move="'.$lax_layer2_move.'" style="'.$align2.' height:'.$lax_layer2_height.'; width:'.$lax_layer2_width.'; background-image:url('.$lax_layer2.');"></div>';
    }
    if($lax_layer3) {
        $align3 = "";
        switch ($lax_layer3_align) {
             case 'lax_left_top':
                 $align3 .= "top: {$lax_layer3_position_y}; left: {$lax_layer3_position_x};";
                 break;
             case 'lax_center_top':
                 $align3 .= "top: {$lax_layer3_position_y}; left: 0; right: 0; margin: auto;";
                 break;
             case 'lax_right_top':
                 $align3 .= "top: {$lax_layer3_position_y}; right: {$lax_layer3_position_x};";
                 break;
             case 'lax_left_middle':
                 $align3 .= "top: 0; bottom: 0; left: {$lax_layer3_position_x}; margin: auto;";
                 break;
             case 'lax_center_middle':
                 $align3 .= "top: 50%; left: 0; right: 0; margin: auto; transform: translate(0px, -50%);-webkit-transform: translate(0px, -50%);-moz-transform: translate(0px, -50%);-ms-transform: translate(0px, -50%);-o-transform: translate(0px, -50%);";
                 break;
             case 'lax_right_middle':
                 $align3 .= "top: 0; bottom: 0; right: {$lax_layer3_position_x}; margin: auto;";
                 break;
             case 'lax_left_bottom':
                 $align3 .= "left: {$lax_layer3_position_x}; bottom: {$lax_layer3_position_y};";
                 break;
             case 'lax_center_bottom':
                 $align3 .= "left: 0; right: 0; bottom:{$lax_layer3_position_y}; margin: auto;";
                 break;
             case 'lax_right_bottom':
                 $align3 .= "right: {$lax_layer3_position_x}; bottom: {$lax_layer3_position_y};";
                 break;
             default:
                 $align3 .= "top: {$lax_layer3_position_y}; left: {$lax_layer3_position_x};";
                 break;
        }
        $lax_layer3 = wp_get_attachment_url($lax_layer3);
        $output .= '<div class="lax-layer cshero-layer-item '.$lax_layer3_align.'" data-speed="'.$lax_layer3_speed.'" data-move="'.$lax_layer3_move.'" style="'.$align3.' height:'.$lax_layer3_height.'; width:'.$lax_layer3_width.'; background-image:url('.$lax_layer3.');"></div>';
    }
    if($lax_layer4) {
        $align4 = "";
        switch ($lax_layer4_align) {
             case 'lax_left_top':
                 $align4 .= "top: {$lax_layer4_position_y}; left: {$lax_layer4_position_x};";
                 break;
             case 'lax_center_top':
                 $align4 .= "top: {$lax_layer4_position_y}; left: 0; right: 0; margin: auto;";
                 break;
             case 'lax_right_top':
                 $align4 .= "top: {$lax_layer4_position_y}; right: {$lax_layer4_position_x};";
                 break;
             case 'lax_left_middle':
                 $align4 .= "top: 0; bottom: 0; left: {$lax_layer4_position_x}; margin: auto;";
                 break;
             case 'lax_center_middle':
                 $align4 .= "top: 50%; left: 0; right: 0; margin: auto; transform: translate(0px, -50%);-webkit-transform: translate(0px, -50%);-moz-transform: translate(0px, -50%);-ms-transform: translate(0px, -50%);-o-transform: translate(0px, -50%);";
                 break;
             case 'lax_right_middle':
                 $align4 .= "top: 0; bottom: 0; right: {$lax_layer4_position_x}; margin: auto;";
                 break;
             case 'lax_left_bottom':
                 $align4 .= "left: {$lax_layer4_position_x}; bottom: {$lax_layer4_position_y};";
                 break;
             case 'lax_center_bottom':
                 $align4 .= "left: 0; right: 0; bottom:{$lax_layer4_position_y}; margin: auto;";
                 break;
             case 'lax_right_bottom':
                 $align4 .= "right: {$lax_layer4_position_x}; bottom: {$lax_layer4_position_y};";
                 break;
             default:
                 $align4 .= "top: {$lax_layer4_position_y}; left: {$lax_layer4_position_x};";
                 break;
        }
        $lax_layer4 = wp_get_attachment_url($lax_layer4);
        $output .= '<div class="lax-layer cshero-layer-item '.$lax_layer4_align.'" data-speed="'.$lax_layer4_speed.'" data-move="'.$lax_layer4_move.'" style="'.$align4.' height:'.$lax_layer4_height.'; width:'.$lax_layer4_width.'; background-image:url('.$lax_layer4.');"></div>';
    }
    if($lax_layer5) {
        $align5 = "";
        switch ($lax_layer5_align) {
             case 'lax_left_top':
                 $align5 .= "top: {$lax_layer5_position_y}; left: {$lax_layer5_position_x};";
                 break;
             case 'lax_center_top':
                 $align5 .= "top: {$lax_layer5_position_y}; left: 0; right: 0; margin: auto;";
                 break;
             case 'lax_right_top':
                 $align5 .= "top: {$lax_layer5_position_y}; right: {$lax_layer5_position_x};";
                 break;
             case 'lax_left_middle':
                 $align5 .= "top: 0; bottom: 0; left: {$lax_layer5_position_x}; margin: auto;";
                 break;
             case 'lax_center_middle':
                 $align5 .= "top: 50%; left: 0; right: 0; margin: auto; transform: translate(0px, -50%);-webkit-transform: translate(0px, -50%);-moz-transform: translate(0px, -50%);-ms-transform: translate(0px, -50%);-o-transform: translate(0px, -50%);";
                 break;
             case 'lax_right_middle':
                 $align5 .= "top: 0; bottom: 0; right: {$lax_layer4_position_x}; margin: auto;";
                 break;
             case 'lax_left_bottom':
                 $align5 .= "left: {$lax_layer5_position_x}; bottom: {$lax_layer5_position_y};";
                 break;
             case 'lax_center_bottom':
                 $align5 .= "left: 0; right: 0; bottom:{$lax_layer5_position_y}; margin: auto;";
                 break;
             case 'lax_right_bottom':
                 $align5 .= "right: {$lax_layer5_position_x}; bottom: {$lax_layer5_position_y};";
                 break;
             default:
                 $align5 .= "top: {$lax_layer5_position_y}; left: {$lax_layer5_position_x};";
                 break;
        }
        $lax_layer5 = wp_get_attachment_url($lax_layer5);
        $output .= '<div class="lax-layer cshero-layer-item '.$lax_layer5_align.'" data-speed="'.$lax_layer5_speed.'" data-move="'.$lax_layer5_move.'" style="'.$align5.' height:'.$lax_layer5_height.'; width:'.$lax_layer5_width.'; background-image:url('.$lax_layer5.');"></div>';
    }
    if($lax_layer6) {
        $align6 = "";
        switch ($lax_layer6_align) {
             case 'lax_left_top':
                 $align6 .= "top: {$lax_layer6_position_y}; left: {$lax_layer6_position_x};";
                 break;
             case 'lax_center_top':
                 $align6 .= "top: {$lax_layer6_position_y}; left: 0; right: 0; margin: auto;";
                 break;
             case 'lax_right_top':
                 $align6 .= "top: {$lax_layer6_position_y}; right: {$lax_layer6_position_x};";
                 break;
             case 'lax_left_middle':
                 $align6 .= "top: 0; bottom: 0; left: {$lax_layer6_position_x}; margin: auto;";
                 break;
             case 'lax_center_middle':
                 $align6 .= "top: 50%; left: 0; right: 0; margin: auto; transform: translate(0px, -50%);-webkit-transform: translate(0px, -50%);-moz-transform: translate(0px, -50%);-ms-transform: translate(0px, -50%);-o-transform: translate(0px, -50%);";
                 break;
             case 'lax_right_middle':
                 $align6 .= "top: 0; bottom: 0; right: {$lax_layer6_position_x}; margin: auto;";
                 break;
             case 'lax_left_bottom':
                 $align6 .= "left: {$lax_layer6_position_x}; bottom: {$lax_layer6_position_y};";
                 break;
             case 'lax_center_bottom':
                 $align6 .= "left: 0; right: 0; bottom:{$lax_layer6_position_y}; margin: auto;";
                 break;
             case 'lax_right_bottom':
                 $align6 .= "right: {$lax_layer6_position_x}; bottom: {$lax_layer6_position_y};";
                 break;
             default:
                 $align6 .= "top: {$lax_layer6_position_y}; left: {$lax_layer6_position_x};";
                 break;
        }
        $lax_layer6 = wp_get_attachment_url($lax_layer6);
        $output .= '<div class="lax-layer cshero-layer-item '.$lax_layer6_align.'" data-speed="'.$lax_layer6_speed.'" data-move="'.$lax_layer6_move.'" style="'.$align6.' height:'.$lax_layer6_height.'; width:'.$lax_layer6_width.'; background-image:url('.$lax_layer6.');"></div>';
    }
    if($lax_layer7) {
        $align7 = "";
        switch ($lax_layer7_align) {
             case 'lax_left_top':
                 $align7 .= "top: {$lax_layer7_position_y}; left: {$lax_layer7_position_x};";
                 break;
             case 'lax_center_top':
                 $align7 .= "top: {$lax_layer7_position_y}; left: 0; right: 0; margin: auto;";
                 break;
             case 'lax_right_top':
                 $align7 .= "top: {$lax_layer7_position_y}; right: {$lax_layer7_position_x};";
                 break;
             case 'lax_left_middle':
                 $align7 .= "top: 0; bottom: 0; left: {$lax_layer7_position_x}; margin: auto;";
                 break;
             case 'lax_center_middle':
                 $align7 .= "top: 50%; left: 0; right: 0; margin: auto; transform: translate(0px, -50%);-webkit-transform: translate(0px, -50%);-moz-transform: translate(0px, -50%);-ms-transform: translate(0px, -50%);-o-transform: translate(0px, -50%);";
                 break;
             case 'lax_right_middle':
                 $align7 .= "top: 0; bottom: 0; right: {$lax_layer7_position_x}; margin: auto;";
                 break;
             case 'lax_left_bottom':
                 $align7 .= "left: {$lax_layer7_position_x}; bottom: {$lax_layer7_position_y};";
                 break;
             case 'lax_center_bottom':
                 $align7 .= "left: 0; right: 0; bottom:{$lax_layer7_position_y}; margin: auto;";
                 break;
             case 'lax_right_bottom':
                 $align7 .= "right: {$lax_layer7_position_x}; bottom: {$lax_layer7_position_y};";
                 break;
             default:
                 $align7 .= "top: {$lax_layer7_position_y}; left: {$lax_layer7_position_x};";
                 break;
        }
        $lax_layer7 = wp_get_attachment_url($lax_layer7);
        $output .= '<div class="lax-layer cshero-layer-item '.$lax_layer7_align.'" data-speed="'.$lax_layer7_speed.'" data-move="'.$lax_layer7_move.'" style="'.$align7.' height:'.$lax_layer7_height.'; width:'.$lax_layer7_width.'; background-image:url('.$lax_layer7.');"></div>';
    }
    if($lax_layer8) {
        $align8 = "";
        switch ($lax_layer8_align) {
             case 'lax_left_top':
                 $align8 .= "top: {$lax_layer8_position_y}; left: {$lax_layer8_position_x};";
                 break;
             case 'lax_center_top':
                 $align8 .= "top: {$lax_layer8_position_y}; left: 0; right: 0; margin: auto;";
                 break;
             case 'lax_right_top':
                 $align8 .= "top: {$lax_layer8_position_y}; right: {$lax_layer8_position_x};";
                 break;
             case 'lax_left_middle':
                 $align8 .= "top: 0; bottom: 0; left: {$lax_layer8_position_x}; margin: auto;";
                 break;
             case 'lax_center_middle':
                 $align8 .= "top: 50%; left: 0; right: 0; margin: auto; transform: translate(0px, -50%);-webkit-transform: translate(0px, -50%);-moz-transform: translate(0px, -50%);-ms-transform: translate(0px, -50%);-o-transform: translate(0px, -50%);";
                 break;
             case 'lax_right_middle':
                 $align8 .= "top: 0; bottom: 0; right: {$lax_layer8_position_x}; margin: auto;";
                 break;
             case 'lax_left_bottom':
                 $align8 .= "left: {$lax_layer8_position_x}; bottom: {$lax_layer8_position_y};";
                 break;
             case 'lax_center_bottom':
                 $align8 .= "left: 0; right: 0; bottom:{$lax_layer8_position_y}; margin: auto;";
                 break;
             case 'lax_right_bottom':
                 $align8 .= "right: {$lax_layer8_position_x}; bottom: {$lax_layer8_position_y};";
                 break;
             default:
                 $align8 .= "top: {$lax_layer8_position_y}; left: {$lax_layer8_position_x};";
                 break;
        }
        $lax_layer8 = wp_get_attachment_url($lax_layer8);
        $output .= '<div class="lax-layer cshero-layer-item '.$lax_layer8_align.'" data-speed="'.$lax_layer8_speed.'" data-move="'.$lax_layer8_move.'" style="'.$align8.' height:'.$lax_layer8_height.'; width:'.$lax_layer8_width.'; background-image:url('.$lax_layer8.');"></div>';
    }
    $output .= '</div>';
}

/*** Scroll Effect Top and Bottom ***/
if($enable_row_sc){
    if($row_top_sc){
        $output .= '<div class="row_sc_top '.$row_sc_class.'"><a class="row-to-top" href="'.$row_top_sc.'"><i class="fa fa-angle-double-up" style="color: '.$row_ar_color.';"></i></a></div>';
    }
    if($row_bottom_sc){
        $output .= '<div class="row_sc_bottom '.$row_sc_class.'"><a class="row-to-bottom" href="'.$row_bottom_sc.'"><i class="fa fa-angle-double-down" style="color: '.$row_ar_color.';"></i></a></div>';
    }
}

$strip_video = ($bg_video_src_ogv!='' || $bg_video_src_mp4!='' || $bg_video_src_webm!='')?'stripe-video-content':'';
/*** BG Color ***/
$output .= '<div class="bg-color-left" style="background-color:'.$bg_color_left.' ;"></div><div class="bg-color-right" style="background-color:'.$bg_color_right.' ;"></div>';
/* div parallax */
$output .= '<div class="ww-parallax-bg" style="background:'.$bg_video_color.' ; opacity :'.$bg_video_transparent.';"></div>';
$output .= '<div class="'. esc_attr($cl_full_width) .' cshero_'. $uqid. ' '.$strip_video.' " '.$style.'>';
/* add div row if rows = container*/
if($enable_container == 'container'){ $output .= '<div class="row">'; }
/* content */
$btn_html = '<div class="exp-videobg-control-btn control-btn-circle exp-mbot"><i class="fa exp-icon fa-play"></i></div>';
if($show_btn) $content = $btn_html.$content;
$output .= wpb_js_remove_wpautop($content);
/* end div row */
if($enable_container == 'container'){ $output .= '</div>'; }

$output .= '</div>';
$output .= '</div>' . $this->endBlockComment('row');
$output .= '</div>';
echo ''.$output;
