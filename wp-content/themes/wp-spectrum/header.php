<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
	<?php wp_head(); ?>
</head>
<?php
global $smof_data, $post;
/** value */
$c_pageID = empty($post->ID)? null : $post->ID;
$body_class = $wrapper_class = '';
/** header setting */
global $header_setings;
$header_setings = cshero_generetor_header_setting();
$body_class = $header_setings->body_class;
/** site id */
$header_select = cshero_getHeader();
/** render options */
if(is_page()){
    $bg_parallax = get_post_meta($post->ID, 'cs_header_bg_parallax', true);
    $background_image = get_post_meta($page_id, 'cs_header_bg_image', true);
    if(get_post_meta($c_pageID, 'cs_header_setting', true)){
        $smof_data['header_fixed_top'] = get_post_meta($c_pageID, 'cs_header_fixed_top', true);
    }
    if(get_post_meta($c_pageID, 'cs_body_custom_class', true)){
        $body_class .= ' '.get_post_meta($c_pageID, 'cs_body_custom_class', true);
    }    
    if ($background_image) {
        $attachment_image = wp_get_attachment_metadata($background_image, 'full');
        $smof_data['background-header']['media']['height'] = $attachment_image['height'];
        $smof_data['background-header']['media']['width'] = $attachment_image['width'];
    }
    if($bg_parallax != ''){
        $smof_data['header_bg_parallax'] = $bg_parallax;
    }
}
if($smof_data['header_position']){
    $body_class .= ' header-position-'.$smof_data['header_position'];
}
if($smof_data['header_fixed_menu_appear']){
    $body_class .= ' menu-appear-'.$smof_data['header_fixed_menu_appear'];
}
$hidden_class='';
if(isset($smof_data['enable_hidden_sidebar']) && $smof_data['enable_hidden_sidebar']){
    $hidden_class = 'meny-right';
}
?>
<body <?php body_class($body_class.' '.$hidden_class.' header-'.$header_select .' '.cshero_getCSSite()); ?> id="wp-spectrum">
    <?php if( $smof_data['page_loader'] == '1'):?>
    <div id="cs_loader" style="height:100vh;width:100vw;background-color:#fff"></div>
    <?php endif;?>
	<div id="wrapper"<?php if( $smof_data['page_loader'] == '1'):?> class="cs_hidden"<?php endif;?>>
		<header class="header-wrapper">
    		<?php cshero_header(); ?>
		</header>
		<?php require_once 'framework/includes/page-title.php'; ?>

