<?php 
global $smof_data;
/*
 * Convert HEX to GRBA
 */
if(!function_exists('HexToRGB')){
    function HexToRGB($hex,$opacity = 1) {
        $hex = str_replace("#",null, $hex);
        $color = array();
        if(strlen($hex) == 3) {
            $color['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
            $color['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
            $color['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
            $color['a'] = $opacity;
        }
        else if(strlen($hex) == 6) {
            $color['r'] = hexdec(substr($hex, 0, 2));
            $color['g'] = hexdec(substr($hex, 2, 2));
            $color['b'] = hexdec(substr($hex, 4, 2));
            $color['a'] = $opacity;
        }
        $color = "rgba(".implode(', ', $color).")";
        return $color;
    }
}
?>
/* local fonts */
<?php for ($i = 1 ; $i <= 3; $i++):
if(!empty($smof_data["typography_local_$i"])):
    $local_fonts = $smof_data["typography_local_$i"];
    $local_fonts_selector = $smof_data["typography_local_selector_$i"];
    ?>
    @font-face {
        font-family: '<?php echo esc_attr($local_fonts); ?>';
        src: url('<?php echo get_template_directory_uri(); ?>/fonts/<?php echo esc_attr($local_fonts);?>.eot');
        src: url('<?php echo get_template_directory_uri(); ?>/fonts/<?php echo esc_attr($local_fonts);?>.eot?#iefix') format('embedded-opentype'),
        url('<?php echo get_template_directory_uri(); ?>/fonts/<?php echo esc_attr($local_fonts);?>.woff') format('woff'),
        url('<?php echo get_template_directory_uri(); ?>/fonts/<?php echo esc_attr($local_fonts);?>.ttf') format('truetype'),
        url('<?php echo get_template_directory_uri(); ?>/fonts/<?php echo esc_attr($local_fonts);?>.svg#<?php echo esc_attr($local_fonts);?>') format('svg');
        font-weight: normal;
        font-style: normal;
    }
    <?php echo !empty($local_fonts_selector) ? $local_fonts_selector."{font-family:".$local_fonts."!important}" : '' ; ?>
<?php endif; endfor; ?>
/* =========================================================        Reset Body    ========================================================= */
<?php
$body_padding = $smof_data['main_content_padding'];
if($body_padding): ?>
    .csbody:not(.home) #primary {
        background-image:  url("<?php echo esc_url($smof_data['bg_content_image']); ?>");
		background-repeat: <?php echo esc_attr($smof_data['bg_content_repeat']); ?>;
		<?php if ($smof_data['bg_content_full']=="1") { ?>
		background-size: cover;
		background-attachment: fixed;
		<?php } ?>
    }
<?php endif; ?>
	#primary.no_breadcrumb_page > .container {
		margin-top: <?php echo esc_attr($smof_data['main_content_margin_top']); ?>;
		margin-bottom: <?php echo esc_attr($smof_data['main_content_margin_bottom']); ?>;
	}
	.csbody:not(.home) #primary > .container {
		padding: <?php echo esc_attr($body_padding); ?>;
	}
	.csbody:not(.home) #primary > .container,
	.csbody:not(.home) #primary > .no-container{
		 background-color:  <?php echo esc_attr($smof_data['content_bg_color']); ?>;
	}
.csbody a {
    color: <?php echo esc_attr($smof_data['link_color']); ?>;
}
.csbody a:hover,
.csbody a:focus,
.csbody a:active,
.csbody a.active {
    color: <?php echo esc_attr($smof_data['link_color_hover']); ?>;
}
.color-primary,
.primary-color,
.primary-color *,
#cs-breadcrumb-wrapper a:hover,
.custom-heading-wrap.title-primary-color h2,
.custom-heading-wrap.title-primary-color h3,
.custom-heading-wrap.title-primary-color h4,
.custom-heading-wrap.title-primary-color h5,
.custom-heading-wrap.title-primary-color h6 {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.color-secondary,
.custom-heading-wrap.title-secondary-color h2,
.custom-heading-wrap.title-secondary-color h3,
.custom-heading-wrap.title-secondary-color h4,
.custom-heading-wrap.title-secondary-color h5,
.custom-heading-wrap.title-secondary-color h6{
    color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}

.bg-primary-color,
ul.cs_list_circle li:before, 
ul.cs_list_circleNumber li:before{
    background-color:<?php echo esc_attr($smof_data['primary_color']); ?>;
}
.bx-pager-inner li .bx-pager-link:hover,
.bx-pager-inner li .bx-pager-link.active{
    background-color: <?php echo HexToRGB($smof_data['secondary_color'],0.8); ?>;
}
/*** Boxed Body ***/
<?php if($smof_data['layout'] == '1'): ?>
    #wp-spectrum #wrapper {
        max-width: <?php echo esc_attr($smof_data['layout_width']); ?>;
        margin: auto;
        background-color: <?php echo esc_attr($smof_data['content_boxed_color']); ?>;
    }
<?php endif; ?>
/*** End Boxed Body ***/
/* =========================================================        Start Typo    ========================================================= */
body.csbody h1,
body.csbody h1 > a {
    color:<?php echo esc_attr($smof_data['typography_h1']['color']); ?>;
}
body.csbody h2,
body.csbody h2 > a,
body.csbody h2 > label {
    color: <?php echo esc_attr($smof_data['typography_h2']['color']); ?>;
}
body.csbody h3,
body.csbody h3 > a,
body.csbody h3 > label {
    color:<?php echo esc_attr($smof_data['typography_h3']['color']); ?>;
}
body.csbody h4,
body.csbody h4 > a,
body.csbody h4 > label {
   color: <?php echo esc_attr($smof_data['typography_h4']['color']); ?>;
}
body.csbody h5,
body.csbody h5 > a {
   color: <?php echo esc_attr($smof_data['typography_h5']['color']); ?>;
}
body.csbody h6,
body.csbody h6 > a {
   color:<?php echo esc_attr($smof_data['typography_h6']['color']); ?>;
}

/* ========================================    Start Header   ================================ */

/* Header V5 */
.header-menu {
    background-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/* Header Color Option */
    #header-top h1,#header-top h2,#header-top h3,
    #header-top h4,#header-top h5,#header-top h6{
        color: <?php echo esc_attr($smof_data['header_top_headings_color']); ?>;
    }
    #header-top {
        background-color: <?php echo HexToRGB($smof_data['header_top_bg_color']['color'],$smof_data['header_top_bg_color']['alpha']);?>;
        color:<?php echo esc_attr($smof_data['header_top_text_color']); ?> ;
    }
    #header-top a{
        color: <?php echo esc_attr($smof_data['header_top_link_color']); ?>;
    }
    #header-top a:hover,
    #header-top a:focus,
    #header-top a:active{
        color: <?php echo esc_attr($smof_data['header_top_link_hover_color']); ?>;
    }
    
/* Default Main Navigation Header Widget */
    #cshero-header .cshero-header-content-widget{
        height:<?php echo esc_attr($smof_data['nav_height']); ?>;
        position: relative;
        color:<?php echo esc_attr($smof_data['header_text_color']); ?> ;
    }
    #cshero-header .cshero-header-content-widget a{
        padding:<?php echo esc_attr($smof_data['default_search_padding']); ?>;
        color: <?php echo esc_attr($smof_data['header_link_color']); ?>;
        display:inline-block;
    }
    #cshero-header .cshero-header-content-widget .cshero-hidden-sidebar-btn > a{
        padding:<?php echo esc_attr($smof_data['default_hidden_sidebar_padding']); ?>;
    }
    #cshero-header .cshero-header-content-widget a:hover,
    #cshero-header .cshero-header-content-widget a:focus,
    #cshero-header .cshero-header-content-widget a:active{
        color: <?php echo esc_attr($smof_data['header_top_link_hover_color']); ?>;
    }
    /*** Header V2 ***/
    <?php if($smof_data['nav_height']):
        $nav_height = (int)str_replace('px', '', $smof_data['nav_height']);
    ?>
        .header-v2 #cshero-header.transparentFixed:before {
            background-color: <?php echo HexToRGB($smof_data['header_top_bg_color']['color'],$smof_data['header_top_bg_color']['alpha']);?>;
            height: <?php echo ($nav_height / 2 ); ?>px;
        }
    <?php endif ?>
/* End Default Main Navigation Header Widget */

#cshero-header {
    padding:<?php echo esc_attr($smof_data['header_padding']); ?>;
    margin:<?php echo esc_attr($smof_data['header_margin']); ?>;
}
.header-v6 #cshero-header .cshero-header-logo-wrapper {
    padding:<?php echo esc_attr($smof_data['header_padding']); ?>;
    margin:<?php echo esc_attr($smof_data['header_margin']); ?>;
}
#cshero-header .logo > a {
    padding: <?php echo esc_attr($smof_data['padding_logo']); ?>;
    margin:<?php echo esc_attr($smof_data['margin_logo']); ?>;
    min-height:<?php echo esc_attr($smof_data['nav_height']); ?>;
    line-height:<?php echo esc_attr($smof_data['nav_height']); ?>;
}
@media (max-width: 992px) {
    #wrapper #cshero-header #cshero-main-menu-mobile {
        top: <?php echo esc_attr($smof_data['nav_height']); ?>;
    }
    #cshero-header .cshero-menu-mobile .btn-navbar:hover i:after,
    #cshero-header.mobile-arrow-effect .btn-navbar i:after {
        -webkit-box-shadow: 0 2px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 9px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 16px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>;
           -moz-box-shadow: 0 2px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 9px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 16px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>;
            -ms-box-shadow: 0 2px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 9px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 16px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>;
             -o-box-shadow: 0 2px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 9px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 16px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>;
                box-shadow: 0 2px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 9px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 16px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>;
    }
}

/* Header V4 Fixed on Left / Right*/
    
    @media (min-width: 993px) {
        <?php if($smof_data['menu_sub_sep_color']): ?>
        .header-v4 .main-menu-left > ul > li > a {
            /* border-bottom: 1px solid <?php echo esc_attr($smof_data['menu_sub_sep_color']); ?> ; */
        }
        <?php endif; ?>
        
        .header-v4 .header-wrapper, .header-v4 #cshero-header,
        .header-v4 .cshero-header-fixed-content-widget {
            width: <?php echo esc_attr($smof_data['header_width']); ?>;
        }
        <?php if($smof_data['header_position']=='right'): ?>
        .csbody.header-v4 .cs-sticky.fixed {
            left: inherit;
            right: 0;
        }
        .csbody.header-v4 .sticky-wrapper,
        .csbody.header-v4 #cshero-header {
            right: 0;
        }
        <?php endif; ?>
        .header-left .main-menu > li:hover:before,
        .header-left .main-menu > li:hover:after,
        .header-left .main-menu > li.current-menu-item:before,
        .header-left .main-menu > li.current-menu-item:after,
        .header-left .main-menu > li.current-menu-parent:before,
        .header-left .main-menu > li.current-menu-parent:after {
            background-color:  <?php echo HexToRGB($smof_data['menu_bg_hover_color_first']['color'], $smof_data['menu_bg_hover_color_first']['alpha']); ?>;
        }
        .header-v4 #cshero-header ul.cshero-dropdown > li > a{
            line-height: normal;
            padding-top: 15px;
            padding-bottom: 15px;
            display: block;
        }
    }

/*** Border Bottom ***/
#wrapper #cshero-header {
    border-style:<?php echo esc_attr($smof_data['header_border_style']);?>;
    border-color:<?php echo esc_attr($smof_data['header_border_color']);?>;
    border-width:<?php echo esc_attr($smof_data['header_border_width']);?>;
}
.cshero-menu-dropdown > ul > li > a,
.cshero-mobile-menu > li > a,
.meny-right .hidden-sidebar-text span i {
    <?php if(isset($smof_data['menu_first_level_text_uppecase']) && $smof_data['menu_first_level_text_uppecase']=='1'): ?>
        text-transform: uppercase;
    <?php endif; ?>
}
/* Sticky Header */
    #header-sticky {
        background-color: <?php echo HexToRGB($smof_data['header_sticky_bg_color']['color'], $smof_data['header_sticky_bg_color']['alpha']); ?>;
        <?php if (!empty($smof_data['header_sticky_border_color']['color'])) { ?>
        border-bottom:1px solid  <?php echo HexToRGB($smof_data['header_sticky_border_color']['color'], $smof_data['header_sticky_border_color']['alpha']); ?>
        <?php } ?>
    }
    #sticky-nav-wrap .menu-item-cart-search .header-cart-search .widget_searchform_content,
    #sticky-nav-wrap .menu-item-cart-search .header-cart-search .shopping_cart_dropdown {
        top: <?php echo esc_attr($smof_data['header_sticky_height']); ?>;
    }
    .sticky-header .cshero-logo > a{
        line-height: <?php echo esc_attr($smof_data['header_sticky_height']); ?>;
        min-height: <?php echo esc_attr($smof_data['header_sticky_height']); ?>;
        padding:<?php echo esc_attr($smof_data['sticky_padding_logo']); ?>;
        margin:<?php echo esc_attr($smof_data['sticky_margin_logo']); ?>;
    }

    /* Sticky Header Main Navigation Widget */
        #header-sticky .cshero-header-content-widget{
            height:<?php echo esc_attr($smof_data['header_sticky_height']); ?>;
            position: relative;
        }
        #header-sticky .cshero-header-content-widget a{
            padding:<?php echo esc_attr($smof_data['default_search_padding']); ?>;
        }
        #header-sticky .cshero-header-content-widget .cshero-hidden-sidebar-btn > a{
            padding:<?php echo esc_attr($smof_data['default_hidden_sidebar_padding']); ?>;
        }
        #header-sticky .cshero-header-content-widget{
            height:<?php echo esc_attr($smof_data['header_sticky_height']); ?>;
            position: relative;
            color:<?php echo esc_attr($smof_data['header_text_color']); ?> ;
        }
        #header-sticky .cshero-header-content-widget a{
            padding:<?php echo esc_attr($smof_data['default_search_padding']); ?>;
            color: <?php echo esc_attr($smof_data['header_link_color']); ?>;
        }
        #header-sticky .cshero-header-content-widget .cshero-hidden-sidebar-btn > a{
            padding:<?php echo esc_attr($smof_data['default_hidden_sidebar_padding']); ?>;
        }
        #header-sticky .cshero-header-content-widget a:hover,
        #header-sticky .cshero-header-content-widget a:focus,
        #header-sticky .cshero-header-content-widget a:active{
            color: <?php echo esc_attr($smof_data['header_top_link_hover_color']); ?>;
        }
    /* End Sticky Header Navigation Widget */


    <?php if (!$smof_data['header_sticky_tablet']): ?>
        @media (max-width: 992px) and (min-width: 768px) {
            #header-sticky{
                display: none;
            }
        }
    <?php endif; ?>
    <?php if (!$smof_data['header_sticky_mobile']): ?>
        @media (max-width: 767px) {
            #header-sticky{
                display: none;
            }
        }
    <?php endif; ?>
/*** Start Main Menu ***/
    /* General Option */
    <?php if ($smof_data['enable_menu_border']) { ?>
    .cshero-menu-dropdown > ul > li > a:after {
        content: "|";
        position: absolute;
        right: 0;
        color:<?php echo esc_attr($smof_data['menu_border_color']); ?>;
    }
    <?php } ?>
    .cshero-menu-dropdown .multicolumn > li.group > a {
        background-color: <?php echo esc_attr($smof_data['menu_sub_bg_color']); ?> !important;
    }
    .cshero-menu-dropdown .cshero-dropdown .multicolumn > li.group > a,
    .cshero-menu-dropdown .cshero-dropdown .multicolumn > li.group > a:hover {
        color: <?php echo esc_attr($smof_data['menu_sub_color']); ?> !important;  
    }
    /* Sub level */
    .cshero-menu-dropdown ul li ul {
        min-width: <?php echo esc_attr($smof_data['dropdown_menu_width']); ?>;
    }
    /* End General Option */

    /* Default Menu */
    #cshero-header .main-menu-content,
    #cshero-header .full-menu-background   {
        background-color: <?php echo esc_attr($smof_data['menu_bg_color']); ?> ;
    }

    /* First Level */
    #cshero-header ul.cshero-dropdown > li > a,
    #cshero-header .menu-pages .menu > ul > li > a{
        font-size:<?php echo esc_attr($smof_data['menu_fontsize_first_level']);?>;
        line-height: <?php echo esc_attr($smof_data['nav_height']); ?>;
        padding-left: <?php echo esc_attr($smof_data['nav_padding_left']); ?>px ;
        padding-top: <?php echo esc_attr($smof_data['nav_padding_top']); ?>px ;
        padding-right: <?php echo esc_attr($smof_data['nav_padding_right']); ?>px ;
        padding-bottom: <?php echo esc_attr($smof_data['nav_padding_bottom']); ?>px ;
        margin:<?php echo esc_attr($smof_data['nav_margin']); ?>;
    }
    #cshero-header ul.cshero-dropdown > li > a:hover,
    #cshero-header .menu-pages .menu > ul > li > a:hover,
    #cshero-header ul.cshero-dropdown > li > a:focus,
    #cshero-header ul.cshero-dropdown > li:hover > a,
    #cshero-header ul.cshero-dropdown > li:focus > a,
    #cshero-header ul.cshero-dropdown > li:active > a{
        color:<?php echo esc_attr($smof_data['menu_hover_first_color']);?>;
        background-color:<?php echo HexToRGB($smof_data['menu_bg_hover_color_first']['color'],$smof_data['menu_bg_hover_color_first']['alpha']);?>;
    }
    #cshero-header .cshero-header-menu-wrapper.home-shop .cshero-menu-dropdown ul.cshero-dropdown > li > a:hover {
        color: #fff !important;
    }
    .csbody.home-minimal #cshero-header ul.cshero-dropdown > li > a:hover,
    .csbody.home-minimal #cshero-header .menu-pages .menu > ul > li > a:hover,
    .csbody.home-minimal #cshero-header ul.cshero-dropdown > li > a:focus,
    .csbody.home-minimal #cshero-header ul.cshero-dropdown > li:hover > a,
    .csbody.home-minimal #cshero-header ul.cshero-dropdown > li:focus > a,
    .csbody.home-minimal #cshero-header ul.cshero-dropdown > li:active > a{
        color:<?php echo esc_attr($smof_data['primary_color_minimal']);?>;
    }
    #cshero-header .cshero-hidden-sidebar-btn a:hover,
    #cshero-header .cshero-hidden-sidebar-btn a:focus,
    #cshero-header .cshero-hidden-sidebar-btn a:active,
    #cshero-header .cshero-menu-mobile a:hover,
    #cshero-header .cshero-menu-mobile a:focus,
    #cshero-header .cshero-menu-mobile a:active {
        color:<?php echo esc_attr($smof_data['menu_hover_first_color']);?>;
    }
    #cshero-header ul.cshero-dropdown > li.current-menu-item > a,
    #cshero-header ul.cshero-dropdown > li.current-menu-ancestor > a,
    #cshero-header ul.cshero-dropdown > li > a.active,
    #cshero-header ul.cshero-dropdown > li > a:active{
        background-color:<?php echo HexToRGB($smof_data['menu_bg_actived_color_first']['color'],$smof_data['menu_bg_actived_color_first']['alpha']);?>;
    }
    /* Menu Style */
    <?php if($smof_data['menu_style'] == 'menu-style-1'): ?>
        #cshero-header, #header-sticky {
            border-bottom: 4px solid #222222 !important;
        }
        #cshero-header.transparentFixed {
            border-bottom: none !important;
        }
        #cshero-header.transparentFixed .main-menu-wrap {
            border-bottom: 4px solid #222222;
        }
        #cshero-header.transparentFixed .row.active-logo {
            border-bottom: 4px solid #222222;
        }
        #cshero-header.transparentFixed .row.active-logo .main-menu-wrap {
            border-bottom: none;
        }
        .csbody #cshero-header ul.cshero-dropdown > li > a,
        .csbody #header-sticky ul.cshero-dropdown > li > a {
            -webkit-transition: box-shadow 0ms linear 0ms;
               -moz-transition: box-shadow 0ms linear 0ms;
                 -o-transition: box-shadow 0ms linear 0ms;
                -ms-transition: box-shadow 0ms linear 0ms;
                    transition: box-shadow 0ms linear 0ms;
        }
        #cshero-header ul.cshero-dropdown > li > a:hover, 
        #cshero-header .menu-pages .menu > ul > li > a:hover, 
        #cshero-header ul.cshero-dropdown > li > a:focus, 
        #cshero-header ul.cshero-dropdown > li:hover > a, 
        #cshero-header ul.cshero-dropdown > li:focus > a,
        #cshero-header ul.cshero-dropdown > li:active > a,
        #cshero-header ul.cshero-dropdown > li.current-menu-item > a, 
        #cshero-header ul.cshero-dropdown > li.current-menu-ancestor > a, 
        #cshero-header ul.cshero-dropdown > li > a.active, 
        #cshero-header ul.cshero-dropdown > li > a:active {
            color:<?php echo esc_attr($smof_data['menu_first_color']);?> !important;
            -webkit-box-shadow: 0 4px 0 <?php echo esc_attr($smof_data['menu_hover_first_color']);?>;
               -moz-box-shadow: 0 4px 0 <?php echo esc_attr($smof_data['menu_hover_first_color']);?>;
                -ms-box-shadow: 0 4px 0 <?php echo esc_attr($smof_data['menu_hover_first_color']);?>;
                 -o-box-shadow: 0 4px 0 <?php echo esc_attr($smof_data['menu_hover_first_color']);?>;
                    box-shadow: 0 4px 0 <?php echo esc_attr($smof_data['menu_hover_first_color']);?>;
        }
        #cshero-header ul.cshero-dropdown > li:active > a,
        #cshero-header ul.cshero-dropdown > li.current-menu-item > a, 
        #cshero-header ul.cshero-dropdown > li.current-menu-ancestor > a, 
        #cshero-header ul.cshero-dropdown > li > a.active, 
        #cshero-header ul.cshero-dropdown > li > a:active {
            -webkit-box-shadow: 0 4px 0 <?php echo esc_attr($smof_data['menu_active_first_color']);?>;
               -moz-box-shadow: 0 4px 0 <?php echo esc_attr($smof_data['menu_active_first_color']);?>;
                -ms-box-shadow: 0 4px 0 <?php echo esc_attr($smof_data['menu_active_first_color']);?>;
                 -o-box-shadow: 0 4px 0 <?php echo esc_attr($smof_data['menu_active_first_color']);?>;
                    box-shadow: 0 4px 0 <?php echo esc_attr($smof_data['menu_active_first_color']);?>;
        }
        #cshero-header.home-shop ul.cshero-dropdown > li > a:hover, 
        #cshero-header.home-shop .menu-pages .menu > ul > li > a:hover, 
        #cshero-header.home-shop ul.cshero-dropdown > li > a:focus, 
        #cshero-header.home-shop ul.cshero-dropdown > li:hover > a, 
        #cshero-header.home-shop ul.cshero-dropdown > li:focus > a, 
        #cshero-header.home-shop ul.cshero-dropdown > li:active > a,
        #cshero-header.home-shop ul.cshero-dropdown > li.current-menu-item > a, 
        #cshero-header.home-shop ul.cshero-dropdown > li.current-menu-ancestor > a, 
        #cshero-header.home-shop ul.cshero-dropdown > li > a.active, 
        #cshero-header.home-shop ul.cshero-dropdown > li > a:active {
            color:<?php echo esc_attr($smof_data['menu_first_color']);?> !important;
            -webkit-box-shadow: 0 5px 0 <?php echo esc_attr($smof_data['menu_hover_first_color']);?>;
               -moz-box-shadow: 0 5px 0 <?php echo esc_attr($smof_data['menu_hover_first_color']);?>;
                -ms-box-shadow: 0 5px 0 <?php echo esc_attr($smof_data['menu_hover_first_color']);?>;
                 -o-box-shadow: 0 5px 0 <?php echo esc_attr($smof_data['menu_hover_first_color']);?>;
                    box-shadow: 0 5px 0 <?php echo esc_attr($smof_data['menu_hover_first_color']);?>;
        }
        #header-sticky ul.cshero-dropdown > li > a:hover,
        #header-sticky ul.cshero-dropdown > li > a:focus,
        #header-sticky ul.cshero-dropdown > li:hover > a,
        #header-sticky ul.cshero-dropdown > li:focus > a,
        #header-sticky ul.cshero-dropdown > li:active > a,
        #header-sticky ul.cshero-dropdown > li.current-menu-item > a, 
        #header-sticky ul.cshero-dropdown > li.current-menu-ancestor > a, 
        #header-sticky ul.cshero-dropdown > li > a.active, 
        #header-sticky ul.cshero-dropdown > li > a:active {
            color:<?php echo esc_attr($smof_data['sticky_menu_first_color']);?> !important;
            -webkit-box-shadow: 0 4px 0 <?php echo esc_attr($smof_data['sticky_menu_hover_first_color']);?>;
               -moz-box-shadow: 0 4px 0 <?php echo esc_attr($smof_data['sticky_menu_hover_first_color']);?>;
                -ms-box-shadow: 0 4px 0 <?php echo esc_attr($smof_data['sticky_menu_hover_first_color']);?>;
                 -o-box-shadow: 0 4px 0 <?php echo esc_attr($smof_data['sticky_menu_hover_first_color']);?>;
                    box-shadow: 0 4px 0 <?php echo esc_attr($smof_data['sticky_menu_hover_first_color']);?>;
        }
        @media (min-width:993px) {
            .cshero-dropdown > li {
                position: relative;
            }
            .cshero-dropdown > li:hover:before {
                bottom: -20px;
                content: "";
                height: 20px;
                left: 0;
                position: absolute;
                width: 100%;
                background: rgba(0,0,0,0);
            }
            .cshero-menu-dropdown ul li:hover:not(.group) > ul.sub-menu {
                margin-top: 4px;
            }
        }
        @media (max-width:992px) {
            #wrapper .main-menu-wrap {
                border-bottom: none !important;
            }
            #wrapper #cshero-header{
                border-bottom: 4px solid #222222 !important;
            }
        }
    <?php endif; ?>
    /* Sub Level */
    #cshero-header ul.cshero-dropdown .sub-menu{
        background-color:<?php echo esc_attr($smof_data['menu_sub_bg_color']);?>;
    }
    #cshero-header ul.cshero-dropdown ul > li {
        border-top:1px solid <?php echo esc_attr($smof_data['menu_sub_sep_color']);?>;
    }
    #cshero-header ul.cshero-dropdown ul > li > a{
        font-size:<?php echo esc_attr($smof_data['menu_fontsize_sub_level']);?>;
        color:<?php echo esc_attr($smof_data['menu_sub_color']);?>;
    }
    #cshero-header .header-left ul.cshero-dropdown ul > li {
        border: none
    }
    #cshero-header .header-left ul.cshero-dropdown ul > li a {
        border-top:1px solid <?php echo esc_attr($smof_data['menu_sub_sep_color']);?>;
    }

    /* Hover state */
    #cshero-header ul.cshero-dropdown ul > li > a:hover,
    #cshero-header ul.cshero-dropdown ul > li > a:focus,
    #cshero-header ul.cshero-dropdown ul > li:not(.group):hover > a,
    #cshero-header ul.cshero-dropdown ul > li:not(.group):focus > a,
    #cshero-header ul.cshero-dropdown ul > li:not(.group):active > a,
    #cshero-header ul.cshero-dropdown ul > li:not(.group):visited > a{
        color:<?php echo esc_attr($smof_data['menu_sub_hover_color']);?>;
        background-color:<?php echo esc_attr($smof_data['menu_bg_hover_color']);?>;
    }
    /* Active state */
    #cshero-header ul.cshero-dropdown ul > li.current-menu-item > a,
    #cshero-header ul.cshero-dropdown ul > li.current-menu-ancestor > a
    #cshero-header ul.cshero-dropdown ul > li > a:active,
    #cshero-header ul.cshero-dropdown ul > li > a.active{
        color:<?php echo esc_attr($smof_data['menu_sub_active_color']);?>;
        background-color:<?php echo esc_attr($smof_data['menu_bg_hover_color']);?>;
    }
    /* End Default Menu*/
    /* Sticky Menu */
    .sticky-menu{
        background-color: <?php echo esc_attr($smof_data['sticky_menu_bg_color']); ?> ;
    }
    /* First Level */
    #header-sticky ul.cshero-dropdown > li > a {
        font-size:<?php echo esc_attr($smof_data['sticky_menu_fontsize_first_level']);?>; 
        color:<?php echo esc_attr($smof_data['sticky_menu_first_color']);?>;
        line-height: <?php echo esc_attr($smof_data['header_sticky_height']); ?>;
        padding-left: <?php echo esc_attr($smof_data['sticky_nav_padding_left']); ?>px ;
        padding-top: <?php echo esc_attr($smof_data['sticky_nav_padding_top']); ?>px ;
        padding-right: <?php echo esc_attr($smof_data['sticky_nav_padding_right']); ?>px ;
        padding-bottom: <?php echo esc_attr($smof_data['sticky_nav_padding_bottom']); ?>px ;
        margin:<?php echo esc_attr($smof_data['sticky_nav_margin']); ?>;
    }
    #header-sticky .cshero-hidden-sidebar-btn a,
    #header-sticky .cshero-menu-mobile a {
        color:<?php echo esc_attr($smof_data['sticky_menu_first_color']);?>;
    }
    #header-sticky ul.cshero-dropdown > li > a:hover,
    #header-sticky ul.cshero-dropdown > li > a:focus,
    #header-sticky ul.cshero-dropdown > li:hover > a,
    #header-sticky ul.cshero-dropdown > li:focus > a,
    #header-sticky ul.cshero-dropdown > li:active > a{
        color:<?php echo esc_attr($smof_data['sticky_menu_hover_first_color']);?>;
        background-color:<?php echo HexToRGB($smof_data['sticky_menu_bg_hover_color_first']['color'],$smof_data['sticky_menu_bg_hover_color_first']['alpha']);?>;
    }
    #header-sticky .cshero-hidden-sidebar-btn a:hover {
        color:<?php echo esc_attr($smof_data['sticky_menu_hover_first_color']);?>;
    }
    #header-sticky ul.cshero-dropdown > li.current-menu-item > a,
    #header-sticky ul.cshero-dropdown > li.current-menu-ancestor > a,
    #header-sticky ul.cshero-dropdown > li > a.active,
    #header-sticky ul.cshero-dropdown > li > a:active{
        color:<?php echo esc_attr($smof_data['sticky_menu_active_first_color']);?>;
        background-color:<?php echo HexToRGB($smof_data['sticky_menu_bg_actived_color_first']['color'],$smof_data['sticky_menu_bg_actived_color_first']['alpha']);?>;
    }
    /* Sub Level */
    #header-sticky ul.cshero-dropdown .sub-menu{
        background-color:<?php echo esc_attr($smof_data['sticky_menu_sub_bg_color']);?>;
    }
    #header-sticky ul.cshero-dropdown ul > li{
        border-top:1px solid <?php echo esc_attr($smof_data['sticky_menu_sub_sep_color']);?>;
    }
    #header-sticky ul.cshero-dropdown ul > li > a{
        font-size:<?php echo esc_attr($smof_data['sticky_menu_fontsize_sub_level']);?>;
        color:<?php echo esc_attr($smof_data['sticky_menu_sub_color']);?>;
    }
    /* Hover state */
    #header-sticky ul.cshero-dropdown ul > li > a:hover,
    #header-sticky ul.cshero-dropdown ul > li > a:focus,
    #header-sticky ul.cshero-dropdown ul > li:not(.group):hover > a,
    #header-sticky ul.cshero-dropdown ul > li:not(.group):focus > a,
    #header-sticky ul.cshero-dropdown ul > li:not(.group):active > a,
    #header-sticky ul.cshero-dropdown ul > li:not(.group):visited > a{
        color:<?php echo esc_attr($smof_data['sticky_menu_sub_hover_color']);?>;
        background-color:<?php echo esc_attr($smof_data['sticky_menu_bg_hover_color']);?>;
    }
    /* Active state */
    #header-sticky ul.cshero-dropdown ul > li.current-menu-item > a,
    #header-sticky ul.cshero-dropdown ul > li.current-menu-ancestor > a
    #header-sticky ul.cshero-dropdown ul > li > a:active,
    #header-sticky ul.cshero-dropdown ul > li > a.active{
        color:<?php echo esc_attr($smof_data['sticky_menu_sub_active_color']);?>;
        background-color:<?php echo esc_attr($smof_data['sticky_menu_bg_hover_color']);?>;
    }
    /* End Sticky Menu*/

    /* Main header  sidebar icon */
    #cshero-header  ul.cs-hidden-sidebar > li > a{
        line-height: <?php echo esc_attr($smof_data['nav_height']); ?>;
        padding:<?php echo esc_attr($smof_data['default_hidden_sidebar_padding']); ?>;

    }
    #cshero-header  ul.cs-item-cart-search > li .header a{
        line-height: <?php echo esc_attr($smof_data['nav_height']); ?>;
        padding:<?php echo esc_attr($smof_data['default_search_padding']); ?>;
    }
    
    /* Sticky sidebar icon */
    #header-sticky  ul.cs-hidden-sidebar > li > a{
        line-height: <?php echo esc_attr($smof_data['header_sticky_height']); ?>;
        padding:<?php echo esc_attr($smof_data['sticky_hidden_sidebar_padding']); ?>;
    }
    #header-sticky  ul.cs-item-cart-search > li .header a{
        line-height: <?php echo esc_attr($smof_data['header_sticky_height']); ?>;
        padding:<?php echo esc_attr($smof_data['sticky_search_padding']); ?>;
    }
/* Custom Menu Header */
.cs_custom_header_menu{}
    /* Fix Social Widget */
    .cs_custom_header_menu ul.cs-social li a,
    .cs_custom_header_menu li.cshero-hidden-sidebar a{
        padding:<?php echo esc_attr($smof_data['default_search_padding']); ?> !important;
        color: <?php echo esc_attr($smof_data['header_link_color']); ?> !important;
        display:inline-block !important;
    }
    .cs_custom_header_menu ul.cs-social li a:hover,
    .cs_custom_header_menu ul.cs-social li a:focus,
    .cs_custom_header_menu ul.cs-social li a:active,
    .cs_custom_header_menu li.cshero-hidden-sidebar a:hover,
    .cs_custom_header_menu li.cshero-hidden-sidebar a:focus,
    .cs_custom_header_menu li.cshero-hidden-sidebar a:active{
        color: <?php echo esc_attr($smof_data['header_top_link_hover_color']); ?> !important;
    }
/* End Custom Menu Header */
/*** Mobile Menu ***/
@media (max-width:767px) {
    #wrapper #cshero-header .cshero-dropdown.cshero-mobile-menu {
        background-color: <?php echo esc_attr($smof_data['mobile_menu_bg_color']); ?>;
    }
    #wrapper #cshero-header ul.cshero-dropdown > li > a, 
    #wrapper #cshero-header .menu-pages .menu > ul > li > a {
        color: <?php echo esc_attr($smof_data['mobile_menu_first_color']); ?>;
    }
    #wrapper #cshero-header ul.cshero-dropdown > li > a:hover, 
    #wrapper #cshero-header .menu-pages .menu > ul > li > a:hover {
        color: <?php echo esc_attr($smof_data['mobile_menu_hover_first_color']); ?> !important;
    }
    #wrapper #cshero-header ul.cshero-dropdown > li ul li a, 
    #wrapper #cshero-header .menu-pages .menu > ul > li ul li a {
        color: <?php echo esc_attr($smof_data['mobile_menu_sub_color']); ?>;
    }
    #wrapper #cshero-header ul.cshero-dropdown > li ul li a:hover, 
    #wrapper #cshero-header .menu-pages .menu > ul > li ul li a:hover {
        color: <?php echo esc_attr($smof_data['mobile_menu_sub_hover_color']); ?>;
    }
    .csbody #wrapper #cshero-header #cshero-main-menu-mobile ul.cshero-dropdown > li > a, 
    .csbody #wrapper #cshero-header #cshero-main-menu-mobile .menu-pages .menu > ul > li > a {
        border-color: <?php echo esc_attr($smof_data['mobile_menu_sub_sep_color']); ?>
    }
}
/*** End Mobile Menu ***/
#menu.menu-up .main-menu > li > ul{
    bottom: <?php echo esc_attr($smof_data['nav_height']); ?>; /* for menu fixed bottm */
}

/*** Page Title ***/
<?php if($smof_data['page_title_upper_portfolio'] == '1'): ?>
    .single-portfolio #cs-page-title-wrapper .title_bar .page-title {
        text-transform: uppercase;
    }
<?php endif; ?>

<?php if($smof_data['page_title_upper_team'] == '1'): ?>
    .single-team #cs-page-title-wrapper .title_bar .page-title {
        text-transform: uppercase;
    }
<?php endif; ?>
/* =========================================================        Start Primary    =========================================================*/
/* All Primary Color */
.comment-author .fn,
.tweets-container ul li .jtwt_tweet_text a {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.cshero-header-content-widget1 .cshero-header-content-widget-inner .cs-social i {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.comment-form .form-submit .submit:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
}
blockquote > p {
    border-left: 2px solid <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.single-portfolio .cs-portfolio-list-details .details-category a:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.single-portfolio .cs-portfolio-similar-item:hover:before {
    background-color: <?php echo HexToRGB($smof_data['primary_color'],0.8); ?>;
}
<?php if($smof_data['pt_testimonial_images_width']): ?>
    .csbody.single-portfolio .testimonial-layout2 .cshero-testimonial-image img {
        width: <?php echo esc_attr($smof_data['pt_testimonial_images_width']); ?>;
        height: <?php echo esc_attr($smof_data['pt_testimonial_images_height']); ?>;
    }
<?php endif; ?>
<?php if($smof_data['pt_testimonial_desciption_fontsize']): ?>
    .csbody.single-portfolio .testimonial-layout2 .cshero-testimonial-text {
        font-size: <?php echo esc_attr($smof_data['pt_testimonial_desciption_fontsize']); ?>;
    }
<?php endif; ?>


/* Form Style */
<?php if($smof_data['form_bg_color']): ?>
    form {
        background-color: <?php echo esc_attr($smof_data['form_bg_color']); ?>;
    }
<?php endif; ?>
<?php if($smof_data['form_field_bg_color']): ?>
    form input,
    form button,
    form select,
    form textarea {
        background-color: <?php echo esc_attr($smof_data['form_field_bg_color']); ?>;
    }
<?php else:?>
    form input,
    form button,
    form select,
    form textarea {
        background-color: transparent;
    }
<?php endif; ?>
<?php if($smof_data['form_field_bg_color_hover']): ?>
    form input:hover,
    form button:hover,
    form select:hover,
    form textarea:hover,
    form input:active,
    form button:active,
    form select:active,
    form textarea:active,
    form input:focus,
    form button:focus,
    form select:focus,
    form textarea:focus {
        background-color: <?php echo esc_attr($smof_data['form_field_bg_color_hover']); ?>;
    }
<?php else: ?>
    form input:hover,
    form button:hover,
    form select:hover,
    form textarea:hover,
    form input:active,
    form button:active,
    form select:active,
    form textarea:active,
    form input:focus,
    form button:focus,
    form select:focus,
    form textarea:focus {
        background-color: transparent;
    }
<?php endif; ?>
<?php if($smof_data['form_text_color']): ?>
    form,
    form label,
    form input,
    form button,
    form select,
    form textarea,
    input::-moz-placeholder, 
    textarea::-moz-placeholder {
        color: <?php echo esc_attr($smof_data['form_text_color']); ?>;
    }
<?php endif; ?>
<?php if($smof_data['form_border_style']): ?>
    form input,
    form select,
    form textarea,
    form button {
        border-style:<?php echo esc_attr($smof_data['form_border_style']); ?>
    }
<?php endif; ?>
<?php if($smof_data['form_border_width']): ?>
    form input,
    form select,
    form textarea,
    form button {
        border-width: <?php echo esc_attr($smof_data['form_border_width']); ?>;
    }
<?php endif; ?>
<?php if($smof_data['form_border_color']): ?>
    form input,
    form select,
    form textarea,
    form button {
        border-color: <?php echo esc_attr($smof_data['form_border_color']); ?> ;
    }
<?php endif; ?>
<?php if($smof_data['form_border_color_hover']): ?>
form input:hover,
form select:hover,
form textarea:hover,
form button:hover,
form input:active,
form select:active,
form textarea:active,
form button:active,
form input:focus,
form select:focus,
form textarea:focus,
form button:focus {
    border-color: <?php echo esc_attr($smof_data['form_border_color_hover']); ?>;
}
<?php endif; ?>
<?php if($smof_data['form_shadow']!=''): ?>
    form input,
    form select,
    form textarea,
    form button {
        box-shadow: <?php echo esc_attr($smof_data['form_shadow']); ?>;
        -moz-box-shadow: <?php echo esc_attr($smof_data['form_shadow']); ?>;
        -webkit-box-shadow: <?php echo esc_attr($smof_data['form_shadow']); ?>;
        -ms-box-shadow: <?php echo esc_attr($smof_data['form_shadow']); ?>;
        -o-box-shadow: <?php echo esc_attr($smof_data['form_shadow']); ?>;
    }
<?php else: ?>
    form input,
    form select,
    form textarea,
    form button {
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        -ms-box-shadow: none;
        -o-box-shadow: none;
    }
<?php endif;  ?>
<?php if($smof_data['form_shadow_hover']!=''): ?>
    form input:hover,
    form select:hover,
    form textarea:hover,
    form button:hover,
    form input:active,
    form select:active,
    form textarea:active,
    form button:active,
    form input:focus,
    form select:focus,
    form textarea:focus,
    form button:focus {
        box-shadow: <?php echo esc_attr($smof_data['form_shadow_hover']); ?>;
        -moz-box-shadow: <?php echo esc_attr($smof_data['form_shadow_hover']); ?>;
        -webkit-box-shadow: <?php echo esc_attr($smof_data['form_shadow_hover']); ?>;
        -ms-box-shadow: <?php echo esc_attr($smof_data['form_shadow_hover']); ?>;
        -o-box-shadow: <?php echo esc_attr($smof_data['form_shadow_hover']); ?>;
    }
<?php else: ?>
    form input:hover,
    form select:hover,
    form textarea:hover,
    form button:hover,
    form input:active,
    form select:active,
    form textarea:active,
    form button:active,
    form input:focus,
    form select:focus,
    form textarea:focus,
    form button:focus {
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        -ms-box-shadow: none;
        -o-box-shadow: none;
    }
<?php endif; ?>
<?php if($smof_data['form_border_radius']) :?>
    form input,
    form select,
    form textarea,
    form button{
        -webkit-border-radius: <?php echo esc_attr($smof_data['form_border_radius']);?>;
        -ms-border-radius: <?php echo esc_attr($smof_data['form_border_radius']);?>;
        -moz-border-radius: <?php echo esc_attr($smof_data['form_border_radius']);?>;
        -o-border-radius: <?php echo esc_attr($smof_data['form_border_radius']);?>;
        border-radius: <?php echo esc_attr($smof_data['form_border_radius']);?>;
    }
<?php endif;?>
/* Style for FORM in Parallax section
NOTE: you need add extra class name called parallax-form to row or column or shortcode setting
*/
.content-area .parallax-form input[type="text"]:hover,
.content-area .parallax-form input[type="password"]:hover,
.content-area .parallax-form input[type="datetime"]:hover,
.content-area .parallax-form input[type="datetime-local"]:hover,
.content-area .parallax-form input[type="date"]:hover,
.content-area .parallax-form input[type="month"]:hover,
.content-area .parallax-form input[type="time"]:hover,
.content-area .parallax-form input[type="week"]:hover,
.content-area .parallax-form input[type="number"]:hover,
.content-area .parallax-form input[type="email"]:hover,
.content-area .parallax-form input[type="url"]:hover,
.content-area .parallax-form input[type="search"]:hover,
.content-area .parallax-form input[type="tel"]:hover,
.content-area .parallax-form input[type="color"]:hover,
.content-area .parallax-form input[type="submit"]:hover,
.content-area .parallax-form textarea:hover,
.content-area .parallax-form label:hover,
.content-area .parallax-form select:hover{
    border-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}

/* =========================================================        Start Sidebar    =========================================================*/
.widget_calendar td:hover {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/* =========================================================        Start Title and Module    =========================================================*/
.title-preset2 h3 {
    color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.title-preset1 h3, .title-style-colorprimary-retro h3, .title-style-colorprimary-retro2 h3,
.title-style-colorprimary-retro2 h3 + p,.tagline  {
    color: <?php echo esc_attr($smof_data['primary_color']); ?> ;
}
.title-construction .wpb_wrapper > h3 {
    border-bottom: 1px solid <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.title-construction .wpb_wrapper > h3:before,
.title-construction.style2 .wpb_wrapper > h3:after,
.title-construction.style3 .wpb_wrapper > h3:after {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/* =========================================================        Start Button Style    =========================================================*/

.csbody .btn, .csbody .btn-default, .csbody button, .csbody .button, .csbody input[type="submit"], .csbody input[type="button"], .csbody input#submit, .widget_shopping_cart_content a.button {
    font-size: <?php echo esc_attr($smof_data['button_font_size']); ?> ;
    <?php if($smof_data['button_uppercase'] == '1'): ?>
        text-transform: uppercase;
    <?php endif; ?>
    background-color: <?php echo HexToRGB($smof_data['button_gradient_top_color']['color'],$smof_data['button_gradient_top_color']['alpha']);?>;
    color: <?php echo esc_attr($smof_data['button_gradient_text_color']); ?>;
    border-style: <?php echo esc_attr($smof_data['button_border_style']); ?>;
    border-color: <?php echo esc_attr($smof_data['button_border_color']); ?>;
    border-width: <?php echo esc_attr($smof_data['button_border_width']); ?>;

    border-radius: <?php echo esc_attr($smof_data['button_border_radius']); ?>;
    -webkit-border-radius: <?php echo esc_attr($smof_data['button_border_radius']); ?>;
    -moz-border-radius: <?php echo esc_attr($smof_data['button_border_radius']); ?>;
    -ms-border-radius: <?php echo esc_attr($smof_data['button_border_radius']); ?>;
    -o-border-radius: <?php echo esc_attr($smof_data['button_border_radius']); ?>;

    <?php if($smof_data['button_border_top'] == '0'): ?>
        border-top-width: 0;
    <?php endif; ?>
    <?php if($smof_data['button_border_right'] == '0'): ?>
        border-right-width: 0;
    <?php endif; ?>
    <?php if($smof_data['button_border_bottom'] == '0'): ?>
        border-bottom-width: 0;
    <?php endif; ?>
    <?php if($smof_data['button_border_left'] == '0'): ?>
        border-left-width: 0;
    <?php endif; ?>
   
    padding-top: <?php echo esc_attr($smof_data['button_padding_top']); ?>;
    padding-right: <?php echo esc_attr($smof_data['button_padding_right']); ?>;
    padding-bottom: <?php echo esc_attr($smof_data['button_padding_bottom']); ?>;
    padding-left: <?php echo esc_attr($smof_data['button_padding_left']); ?>;

    margin: <?php echo esc_attr($smof_data['button_margin']); ?>;
}
.csbody .btn:hover,
.csbody .btn:focus,
.csbody .button:hover,
.csbody .button:focus,
.csbody  button:hover,
.csbody  button:focus,
.csbody  input[type="submit"]:hover,
.csbody  input[type="submit"]:focus,
.csbody  input#submit:hover,
.csbody  input#submit:focus,
.widget_shopping_cart_content a.button:hover,
.widget_shopping_cart_content a.button:focus {
    background-color: <?php echo HexToRGB($smof_data['button_gradient_top_color_hover']['color'],$smof_data['button_gradient_top_color_hover']['alpha']);?>;
    color: <?php echo esc_attr($smof_data['button_gradient_text_color_hover']); ?>;
    border-color: <?php echo esc_attr($smof_data['button_border_color_hover']); ?>;
}
.csbody.home-minimal .btn:hover {
   background-color: <?php echo esc_attr($smof_data['primary_color_minimal']); ?> !important;
}
.csbody .btn-default-alt,
.csbody input[type="submit"],
.csbody input[type="button"] {
    background-color: <?php echo HexToRGB($smof_data['button_gradient_top_color']['color'],0.6); ?>;
}
.csbody.home-joinery input[type="submit"],
.csbody.home-joinery input[type="button"] {
    background-color: <?php echo HexToRGB($smof_data['button_gradient_top_color']['color'],1); ?>;
}
.csbody.home-joinery input[type="submit"]:hover,
.csbody.home-joinery input[type="button"]:hover {
    background-color: <?php echo HexToRGB($smof_data['button_gradient_top_color_hover']['color'],1); ?>;
}
/* btn primary */
.csbody .btn-primary{
    
    font-size: <?php echo esc_attr($smof_data['button_primary_font_size']); ?>;
    <?php if($smof_data['button_uppercase'] == '1'): ?>
        text-transform: uppercase;
    <?php endif; ?>

    background-color: <?php echo HexToRGB($smof_data['button_primary_background_color']['color'],$smof_data['button_primary_background_color']['alpha']); ?>;
    color: <?php echo esc_attr($smof_data['button_primary_text_color']); ?>;

    border-style: <?php echo esc_attr($smof_data['button_primary_border_style']); ?>;
    border-color: <?php echo esc_attr($smof_data['button_primary_border_color']); ?>;
    border-width: <?php echo esc_attr($smof_data['button_primary_border_width']); ?>;
    <?php if($smof_data['button_primary_border_top'] == '0'): ?>
        border-top-width: 0;
    <?php endif; ?>
    <?php if($smof_data['button_primary_border_right'] == '0'): ?>
        border-right-width: 0;
    <?php endif; ?>
    <?php if($smof_data['button_primary_border_bottom'] == '0'): ?>
        border-bottom-width: 0;
    <?php endif; ?>
    <?php if($smof_data['button_primary_border_left'] == '0'): ?>
        border-left-width: 0;
    <?php endif; ?>
    
    border-radius: <?php echo esc_attr($smof_data['button_primary_border_radius']); ?>;
    -webkit-border-radius: <?php echo esc_attr($smof_data['button_primary_border_radius']); ?>;
    -moz-border-radius: <?php echo esc_attr($smof_data['button_primary_border_radius']); ?>;
    -ms-border-radius: <?php echo esc_attr($smof_data['button_primary_border_radius']); ?>;
    -o-border-radius: <?php echo esc_attr($smof_data['button_primary_border_radius']); ?>;

    margin: <?php echo esc_attr($smof_data['button_margin']); ?>;
}

.csbody .btn-primary:hover,
.csbody .btn-primary:active,
.csbody .btn-primary:focus {
    background-color: <?php echo HexToRGB($smof_data['button_primary_background_color_hover']['color'],$smof_data['button_primary_background_color_hover']['alpha']); ?>;
    color: <?php echo esc_attr($smof_data['button_primary_text_color_hover']); ?>;
    border-color: <?php echo esc_attr($smof_data['button_primary_border_color_hover']); ?>;  
}

<?php if($smof_data['button_primary_border_effect']):
    $button_primary_border_width = (int)str_replace('px', '', $smof_data['button_primary_border_width']);
?>
    .csbody .btn-primary:before {
        background: <?php echo esc_attr($smof_data['button_primary_border_color']); ?>;
        bottom: -<?php echo ($button_primary_border_width + 3 ); ?>px;
    }
<?php endif ?>

.btn.btn-white:hover {
    background-color: <?php echo HexToRGB($smof_data['button_gradient_top_color_hover']['color'],$smof_data['button_gradient_top_color_hover']['alpha']);?> !important;
    color: <?php echo esc_attr($smof_data['button_gradient_text_color_hover']); ?> !important;
    border-color: <?php echo esc_attr($smof_data['button_border_color_hover']); ?> !important;
}
/* btn custom style */
.csbody .btn.btn-primary-style1 {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.csbody .btn.btn-primary-style1:hover {
    border-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.csbody .btn.btn-default-overlay:hover {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
    border-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/* =========================================================
    End Button Style
=========================================================*/
/* =========================================================
    Start Short Code
=========================================================*/
/*** High light ***/
.cs-highlight-style-1 {
     background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/*** Pricing ***/
.csbody .cs-pricing.pricing-layout1 .cs-pricing-item.cs-pricing-feature .cs-pricing-title {
    background: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
}
/*---- Start Accordion ----*/

/*---- End Accordion ----*/
/*** Shortcode Tabs ***/
.wpb_tabs.style3 .wpb_tabs_nav li a:hover,
.wpb_tabs.style3 .wpb_tabs_nav li.ui-tabs-active a {
    color: <?php echo esc_attr($smof_data['primary_color']); ?> !important; 
} 
.wpb_tabs.style4 ul.wpb_tabs_nav li.ui-state-active a,
.wpb_tabs.style4 ul.wpb_tabs_nav li.ui-state-active a:hover {
    background: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
}
/* ==========================================================================
  Block Quotes
========================================================================== */
.cs-quote-style-1:before, .cs-quote-style-3:before,
.cs-quote-style-1:after, .cs-quote-style-3:after {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.cs-quote-style-3, .cs-quote-style-2 {
    border-left: 10px solid <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.rtl .cs-quote-style-3, .rtl .cs-quote-style-2 {
    border-left: none;
    border-right: 10px solid <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/*---- Begin post carousel ----*/
.postcarousel-default .cshero-carousel-post-read-more a:hover,
.postcarousel-layout4 .cshero-carousel-title a:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;  
}
.postcarousel-layout2 .cshero-carousel-post-read-more a:hover,
.postcarousel-layout2 .cshero-carousel-title a:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
}
.postcarousel-layout3 .cshero-carousel-container:hover .cshero-carousel-effect:before {
    background: <?php echo HexToRGB($smof_data['primary_color'],0.9)?>;
}
/*---- End post carousel ----*/
/*---- Start fancybox ----*/
.fancybox-layout5 .cshero-read-more .read-more-link {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.fancybox-layout5 .cshero-read-more .read-more-link:hover {
    color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.fancybox-layout8 .cshero-read-more a:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.fancybox-layout10 .cshero-read-more a:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.fancybox-layout11 .cshero-fancybox-wrapper .title-child,
.fancybox-layout11 .cshero-fancybox-wrapper a:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/*---- End fancybox ----*/
/* Start Testinomial */
    .cs-testimonial .fa{
		color: <?php echo esc_attr($smof_data['primary_color']); ?>;	
    }
/* End Testinomial */
/* Social */
.cs-social.style-1 > li > a,
.cs-social.style-2 > li > a,
.cs-social.style-3 > li > a{
    background-color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.cs-social.style-1 > li > a:hover,
.cs-social.style-2 > li > a:hover,
.cs-social.style-3 > li > a:hover{
    background-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/* End Social */
/* Start Highlight */
.cs-highlight-style-1 {
    background-color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.cs-highlight-style-2 {
    background-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/* Portfolio Carousel */
    /* Style 1 */
    .portfolio-layout1 .cshero-portfolio-title:hover a {
        color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
    }
    /* Style 2*/
    .cs-carousel-portfolio-style-2 .cs-readmore,
     .cs-carousel-portfolio-style-2 .cs-zoom{
        color: #fff;
    }
    /*** Style 3 ***/
    .portfolio-layout3 .cshero-portfolio-item-content:hover .cshero-portfolio-content-wrap {
        background: <?php echo HexToRGB($smof_data['primary_color'],0.8)?>;
    }
    .csbody.home-minimal .portfolio-layout3 .cshero-portfolio-item-content:hover .cshero-portfolio-content-wrap {
        background: <?php echo HexToRGB($smof_data['primary_color_minimal'],0.8)?>;
    }
    /*** Style 4 ***/
    .portfolio-layout4 .cshero-portfolio-img-wrap .cshero-portfolio-overlay .link-wrap a:hover {
        color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
    }
    .portfolio-layout4.cshero_portfolio_filters ul li.active a, 
    .portfolio-layout4.cshero_portfolio_filters ul li:hover a {
        color: <?php echo esc_attr($smof_data['link_color_hover']); ?> !important;
    }

    .cshero_portfolio_filters ul li a.active,
    .cshero_portfolio_filters ul li:hover a,
    .cshero-portfolio .cshero-portfolio-category a:hover {
        color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
    }
/* End Portfolio Carousel */
/* Start Team Shortcode */
    /* Default */
    .team-default .cshero-team-title a:hover {
        color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
    }
/* End Team Shortcode */
/* Start Course Shortcode */
.cs-carousel-course-style-1 .cs-course-content-inner{
    background: <?php echo HexToRGB($smof_data['primary_color'],0.8)?>;
}
.cs-carousel-course-style-1 .course-date{
    background: <?php echo HexToRGB($smof_data['secondary_color'],0.8)?>;
}
.cs-carousel-course-style-1 div.cs-morelink{
    background:<?php echo esc_attr($smof_data['secondary_color'])?>;
}
/* End Course Shortcode */
/* Start Event Carousel */
    /*Style 2*/
    .cs-carousel-event-style-2 .cs-carousel-item:hover .cs-carousel-container,
    .cs-carousel-event-style-2 .cs-carousel-item:active .cs-carousel-container,
    .cs-carousel-event-style-2 .cs-carousel-item:focus .cs-carousel-container{
        background-color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
        border-color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
    }
    .cs-carousel-event-style-2 time:before{
        background-color: <?php echo esc_attr($smof_data['primary_color']);?>;
    }
    .cs-carousel-event-style-2 .cs-carousel-item:hover time:before,
    .cs-carousel-event-style-2 .cs-carousel-item:active time:before,
    .cs-carousel-event-style-2 .cs-carousel-item:focus time:before{
        background-color: #fff;
    }
    .cs-carousel-event-style-2 .cs-carousel-item .cs-carousel-footer,
    .cs-carousel-event-style-2 .cs-carousel-item .cs-carousel-footer,
    .cs-carousel-event-style-2 .cs-carousel-item .cs-carousel-footer{
        background-color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
    }
    .cs-carousel-event-style-2 .cs-carousel-item:hover .cs-carousel-footer,
    .cs-carousel-event-style-2 .cs-carousel-item:active .cs-carousel-footer,
    .cs-carousel-event-style-2 .cs-carousel-item:focus .cs-carousel-footer{
        background-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
    }
/* End Event Carousel */
/* =========================================================
    End Short Code
=========================================================*/

/* ==========================================================================
   All Style Woocommorce
========================================================================== */
.csbody.woocommerce span.onsale,
.csbody.woocommerce .widget_shopping_cart .cart_list li a.remove:hover,
.csbody.woocommerce .cshero-carousel-item-wrap .cshero-add-to-cart a:hover span,
.csbody.woocommerce .cshero-carousel-item-wrap .cshero-view-detail a:hover span,
.csbody .woocommerce .cshero-carousel-item-wrap .cshero-add-to-cart a:hover span,
.csbody .woocommerce .cshero-carousel-item-wrap .cshero-view-detail a:hover span {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.csbody.single-product .cs-product-wrap .price del .amount,
.csbody.woocommerce .cshero-carousel-item-wrap .cshero-woo-meta .cshero-product-price del .amount,
.csbody .woocommerce .cshero-carousel-item-wrap .cshero-woo-meta .cshero-product-price del .amount {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.csbody.woocommerce .widget_shopping_cart .cart_list li a.remove,
.csbody.woocommerce-page a.remove,
.csbody.woocommerce-page .woocommerce-message:before,
.csbody.woocommerce-page .woocommerce-info:before,
.csbody.woocommerce-page .woocommerce-error:before {
    color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
}
.csbody.woocommerce-page a.remove:hover {
    background: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
    color: #fff !important;
}
.cs-product-wrap .images .thumbnails a:hover:before {
    background: <?php echo HexToRGB($smof_data['primary_color'],0.6); ?>;
}
.csbody.woocommerce-page #wrapper .woocommerce-error, 
.csbody.woocommerce-page #wrapper .woocommerce-info, 
.csbody.woocommerce-page #wrapper .woocommerce-message {
    border-top: 4px solid <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.csbody.woocommerce-page #wrapper .woocommerce-error a.button, 
.csbody.woocommerce-page #wrapper .woocommerce-info a.button, 
.csbody.woocommerce-page #wrapper .woocommerce-message a.button {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
    color: #fff;
    border: 1px solid #fff;
}
.csbody.woocommerce-page #wrapper .woocommerce-error a.button:hover, 
.csbody.woocommerce-page #wrapper .woocommerce-info a.button:hover, 
.csbody.woocommerce-page #wrapper .woocommerce-message a.button:hover {
    background: #fff;
    color: #222;
    border: 1px solid <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.woocommerce-page #cs-breadcrumb-wrapper .cs-breadcrumbs a:hover {
    color: <?php echo esc_attr($smof_data['woo_breadcrumbs_color_hover']); ?>;
}
/*** One Shop ***/
.csbody .woocommerce .cshero-carousel-item-wrap .cshero-woo-meta .cshero-product-price span.amount {
    color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.csbody .woocommerce ul.products li.product .new-product,
.csbody .woocommerce ul.products li.product .best-sale-product,
.csbody.woocommerce span.best-sale-product {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.csbody .woocommerce ul.products li.product .onsale {
    background: <?php echo esc_attr($smof_data['secondary_color']); ?>;
    top: 10px;
}
/* ==========================================================================
   End All Style Woocommorce
========================================================================== */

/*Start All Style Widget WP*/
/* Default widget */
/* =========================================================
    Start Bottom
=========================================================*/
#cs-bottom-wrap {
    color: <?php echo esc_attr($smof_data['bottom_1_text_color']); ?> ;
	padding:<?php echo esc_attr($smof_data['bottom_1_padding']); ?>;
	margin:<?php echo esc_attr($smof_data['bottom_1_margin']); ?>;
}
#cs-bottom-wrap h3,#cs-bottom-wrap h1,#cs-bottom-wrap h2,#cs-bottom-wrap h4
,#cs-bottom-wrap h5,#cs-bottom-wrap h6 {
    color: <?php echo esc_attr($smof_data['bottom_1_headings_color']); ?> ;
}
#cs-bottom-wrap a {
    color: <?php echo esc_attr($smof_data['bottom_1_link_color']); ?> ;
}
#cs-bottom-wrap a:hover {
    color: <?php echo esc_attr($smof_data['bottom_1_link_hover_color']); ?> ;
}
/* =========================================================
    Start Footer
=========================================================*/
#footer-top {
    color: <?php echo esc_attr($smof_data['footer_text_color']); ?>;
    <?php if($smof_data['footer_top_border_style']!='none'): ?>
        border-style:<?php echo esc_attr($smof_data['footer_top_border_style']);?>;
        border-color:<?php echo esc_attr($smof_data['footer_top_border_color']);?>;
        border-width:<?php echo esc_attr($smof_data['footer_top_border_width']);?>;
    <?php endif;?>
}
#footer-top form input:hover,
#footer-top form input:focus,
#footer-top form select:hover,
#footer-top form select:focus,
#footer-top form textarea:hover,
#footer-top form textarea:focus,
#footer-top form button:hover,
#footer-top form button:focus{
    color: <?php echo esc_attr($smof_data['footer_text_color']); ?>;
}
#footer-top h3.wg-title {
    color: <?php echo esc_attr($smof_data['footer_headings_color']); ?>;
    font-size: <?php echo esc_attr($smof_data['footer_top_heading_font_size']); ?>;
}

<?php if($smof_data['footer_top_heading_style']=='Style Heading Button'): ?>
    #footer-top h3.wg-title > span {
        border: 2px solid #6c6c6c;
        display: inline-block;
        padding: 10px;
    }
<?php endif; ?>

#footer-top h3.wg-title {
    <?php if($smof_data['footer_top_heading_uppercase']=='1') { ?>
        text-transform: uppercase;
    <?php } else { ?>
        text-transform: capitalize;
    <?php } ?>
}
#footer-top a {
    color: <?php echo esc_attr($smof_data['footer_link_color']); ?>;
}
#footer-top a:hover {
    color: <?php echo esc_attr($smof_data['footer_link_hover_color']); ?>;
}
#footer-top .cs-social a i {
    color:<?php echo esc_attr($smof_data['footer_social_color']); ?>;
}
#footer-top .cs-social a:hover i {
    color: <?php echo esc_attr($smof_data['footer_social_hover_color']); ?>;
}
#footer-top .cs-social.style-4 li a:hover i {
    border-color: <?php echo esc_attr($smof_data['footer_social_hover_color']); ?>;
}
#footer-bottom {
    background-color: <?php echo esc_attr($smof_data['footer_bottom_bg_color']); ?> ;
    color: <?php echo esc_attr($smof_data['footer_bottom_text_color']); ?>;
	margin: <?php echo esc_attr($smof_data['footer_bottom_margin']); ?>;
	<?php if($smof_data['footer_bottom_border_style']!='none'): ?>
		border-style:<?php echo esc_attr($smof_data['footer_bottom_border_style']);?>;
		border-color:<?php echo esc_attr($smof_data['footer_bottom_border_color']);?>;
		border-width:<?php echo esc_attr($smof_data['footer_bottom_border_width']);?>;
	<?php endif;?>
	<?php if($smof_data['footer_bottom_padding'] || $smof_data['footer_bottom_margin']) : ?>
		padding: <?php echo esc_attr($smof_data['footer_bottom_padding']); ?>;	
	<?php endif; ?>
}
#footer-bottom svg {
    fill: <?php echo esc_attr($smof_data['footer_bottom_bg_color']); ?> ;
}
#footer-bottom.footer-bottom-v2 {
    border-bottom: 9px solid <?php echo esc_attr($smof_data['primary_color']); ?>; 
}
#footer-bottom h3.wg-title {
    color: <?php echo esc_attr($smof_data['footer_bottom_headings_color']); ?>;
}
#footer-bottom a {
    color: <?php echo esc_attr($smof_data['footer_bottom_link_color']); ?>;
}
#footer-bottom a:hover {
    color: <?php echo esc_attr($smof_data['footer_bottom_link_hover_color']); ?>;
}
<?php if($smof_data['footer_top_padding'] || $smof_data['footer_top_padding']) : ?>
#footer-top {
    padding: <?php echo esc_attr($smof_data['footer_top_padding']); ?>;
    margin: <?php echo esc_attr($smof_data['footer_top_margin']); ?>;
}
<?php endif; ?>

#footer-top .widget_cs_social_widget.style2 ul li a{
	background-color:  <?php echo esc_attr($smof_data['footer_link_color']); ?>;
	color:<?php echo esc_attr($smof_data['footer_social_color']); ?>;
}
#footer-top .widget_cs_social_widget.style2 ul li a:hover{
	background-color:  <?php echo esc_attr($smof_data['footer_link_hover_color']); ?>;
	color:<?php echo esc_attr($smof_data['footer_social_hover_color']); ?>;
}
<?php if($smof_data['text_align_footer_bottom_widgets_1'] != 'none') : ?>
.footer-bottom-1{
    text-align: <?php echo esc_attr($smof_data['text_align_footer_bottom_widgets_1']); ?>;
}
<?php endif; ?>
<?php if($smof_data['text_align_footer_bottom_widgets_2'] != 'none') : ?>
.footer-bottom-2{
    text-align: <?php echo esc_attr($smof_data['text_align_footer_bottom_widgets_2']); ?>;
}
<?php endif; ?>

/* ==========================================================================
   Hidden Menu Sidebar
========================================================================== */
.meny-right .meny-sidebar .cs_close i:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.meny-right .hidden-sidebar-text span i {
    font-size:<?php echo esc_attr($smof_data['menu_fontsize_first_level']);?> !important;
}
.meny-right .hidden-sidebar-text span:before {
    color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
}
.cs-navigation .page-numbers:hover, 
.cs-navigation .page-numbers.current,
.woocommerce-pagination ul.page-numbers > li > .page-numbers:hover, 
.woocommerce-pagination ul.page-numbers > li > .page-numbers.current {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.cshero-nav ul li a:hover {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
    color: #fff;
}
.csbody.home-minimal .cshero-nav ul li a:hover {
    background: <?php echo esc_attr($smof_data['primary_color_minimal']); ?>;
}
/*** Hidden Sidebar Width ***/
<?php if($smof_data['hidden_sidebar_width']):
    $hidden_sidebar_width = (int)str_replace('px', '', $smof_data['hidden_sidebar_width']);
?>
    .csbody.right_sidebar_opened #wrapper {
       -webkit-transform: matrix(1, 0, 0, 1, -<?php echo esc_attr($hidden_sidebar_width); ?>, 0);
           -moz-transform: matrix(1, 0, 0, 1, -<?php echo esc_attr($hidden_sidebar_width); ?>, 0);
            -ms-transform: matrix(1, 0, 0, 1, -<?php echo esc_attr($hidden_sidebar_width); ?>, 0);
             -o-transform: matrix(1, 0, 0, 1, -<?php echo esc_attr($hidden_sidebar_width); ?>, 0);
                transform: matrix(1, 0, 0, 1, -<?php echo esc_attr($hidden_sidebar_width); ?>, 0);
    }
    .csbody.meny-right .meny-sidebar {
        width: <?php echo esc_attr($smof_data['hidden_sidebar_width']); ?>;
        background: <?php echo esc_attr($smof_data['hidden_sidebar_background_color']); ?>;
        -webkit-transform: matrix(1, 0, 0, 1, <?php echo esc_attr($hidden_sidebar_width); ?>, 0);
           -moz-transform: matrix(1, 0, 0, 1, <?php echo esc_attr($hidden_sidebar_width); ?>, 0);
            -ms-transform: matrix(1, 0, 0, 1, <?php echo esc_attr($hidden_sidebar_width); ?>, 0);
             -o-transform: matrix(1, 0, 0, 1, <?php echo esc_attr($hidden_sidebar_width); ?>, 0);
                transform: matrix(1, 0, 0, 1, <?php echo esc_attr($hidden_sidebar_width); ?>, 0);
    }
<?php endif ?>
/*============================================                Start Post Blog Style    ============================================*/
.cs-blog .cs-blog-share i{
    background-color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.cs-blog .cs-blog-share i:hover,
.cs-blog .cs-blog-share i:active,
.cs-blog .cs-blog-share i:focus{
    background-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.blog-multiple-columns-style2  .cs-blog .cs-blog-media .readmore{
    background: <?php echo HexToRGB($smof_data['primary_color'],0.8); ?>;
}
.blog-multiple-columns-style2  .cs-blog:hover .cs-blog-title a,
.blog-multiple-columns-style2  .cs-blog:active .cs-blog-title a,
.blog-multiple-columns-style2  .cs-blog:focus .cs-blog-title a{
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.cshero-blog-category-lists ul li.current a,
.cshero-blog-category-lists ul li a:hover,
.filter_outer ul li.active span,
.filter_outer ul li:hover span{
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.tagcloud a:hover {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/*** Blog Class Style 2 ***/
.cs-blogClass-style2 .cs-blogClass-info ul li a:hover,
.cs-blog .cs-blog-quote .author {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.cs-blog .cs-blog-quote .cs-content-text {
    border-left: 2px solid <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/* Style Post Audio */
.csbody .mejs-controls .mejs-time-rail .mejs-time-current,
.csbody .mejs-controls .mejs-time-rail .mejs-time-loaded, 
.csbody .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/*** Style Post Page Style 1 ***/
.cs-blog-item-style1 .cs-blog-info ul li a:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/*============================================                Shortcode heading style    ============================================*/
.cs-header.overline .cs-title .line{
    border-bottom-color: <?php echo esc_attr($smof_data['primary_color']);?>;
}

/* End Shortcode heading style */


.portfoliocarousel-layout1 .cshero-portfolio-carousel-item .cshero-carousel-image-inner .overlay a:hover {
    background:<?php echo esc_attr($smof_data['primary_color']); ?> !important;   
}
.portfoliocarousel-layout1 .cshero-title a:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;    
}
/*======================================*/
/*        3rd Extensions                */
/*======================================*/
/*LearDash LMS*/
.lms-course-list .lms-course-item:hover .lms-course-content .readmore{
    background: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
/* custom css */
<?php echo esc_attr($smof_data["custom_css"]);?>
/*** Home Shop ***/
.widget_searchform_content form input[type='submit'],
.header-v5 .cshero-header-content-widget form input[type='submit'] {
    background-color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
    border-color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
}
.widget_searchform_content form input[type='submit']:hover,
.header-v5 .cshero-header-content-widget form input[type='submit']:hover {
    background-color: <?php echo esc_attr($smof_data['secondary_color']); ?> !important;
    border-color: <?php echo esc_attr($smof_data['secondary_color']); ?> !important;
}
.top-contact > li i {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.header-v3 .cshero-total.shop,
.header-v3 .cart_total_text.shop i,
.header-v6 .cshero-total.shop,
.header-v6 .cart_total_text.shop i {
    color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.cshero-header-menu-wrapper.home-shop .cshero-menu-left-title {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.header-v3 .shopping_cart_dropdown .cart-list span.quantity,
.header-v6 .shopping_cart_dropdown .cart-list span.quantity {
    color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.header-v3 #cshero-header .shopping_cart_dropdown .btn.btn-primary,
.header-v6 #cshero-header .shopping_cart_dropdown .btn.btn-primary {
    background: <?php echo esc_attr($smof_data['secondary_color']); ?>;
    border: 1px solid <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.header-v3 #cshero-header .shopping_cart_dropdown .btn.btn-primary:hover,
.header-v6 #cshero-header .shopping_cart_dropdown .btn.btn-primary:hover {
    color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.header-v3 #cshero-header .shopping_cart_dropdown span.total,
.header-v6 #cshero-header .shopping_cart_dropdown span.total {
    color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.csbody.woocommerce span.new-product {
    background: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.csbody .tp-bullets.simplebullets .bullet.selected {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.box-sale-right .box-contents a {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.box-sale-right .box-contents a:hover {
    background: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
}