<?php
function cs_shortcode_menu_render($atts) {
    extract(shortcode_atts(array(
                'title' => '',
                'layout' => 'menu.layout1',
                'nav_menu' => '',
                'menu_link_color' => '',
                'menu_background_hover' => '',
                'menu_link_hover' => '',
                'menu_background_active' => '',
                'menu_link_active' => '',
                'sh_content_wd_1' => '',
                'sh_content_wd_2' => '',
                'sh_hidden_sidebar' => '',
                'widget_position' => 'left',
                'widget_bg'         =>'',
                'widget_margin'         =>'0',
                'widget_padding'         =>'0',
                'el_class' => '',
                'css' => '',
                'bg_image'        => '',
			    'bg_color'        => '',
			    'bg_image_repeat' => '',
			    'padding'         => '',
			    'margin_bottom'   => '',
    ), $atts));
    ob_start();
    global $smof_data;
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'cs_custom_header_menu ' . str_replace('.','-',$layout) .' '. $el_class .' '. vc_shortcode_custom_css_class( $css, ' ' ), 'cs-shortcode-menu', $atts );
    
    $menu_position =  get_post_meta(get_the_ID(), 'cs_menu_position', true);
    if($menu_position != ''){ $smof_data['menu_position'] = $menu_position; }

    if($sh_content_wd_1 != ''){ $smof_data['header_content_widgets'] = $sh_content_wd_1; }
    if($sh_content_wd_2 != ''){ $smof_data['header_content_widgets'] = $sh_content_wd_2; }
    if($sh_hidden_sidebar != ''){ $smof_data['enable_hidden_sidebar'] = $sh_hidden_sidebar; }
    ?>
    <div id="menu" class="cs_mega_menu <?php echo $css_class;?>">

        <style type="text/css" scoped>
            #cshero-header .cs_custom_header_menu ul.cshero-dropdown > li > a,
            #cshero-header .cs_custom_header_menu .cshero-header-content-widget  a{color:<?php echo $menu_link_color;?>;}
            #cshero-header .cs_custom_header_menu ul.cshero-dropdown > li.current-menu-item > a,
            #cshero-header .cs_custom_header_menu ul.cshero-dropdown > li.current-menu-ancestor > a,
            #cshero-header .cs_custom_header_menu ul.cshero-dropdown > li > a:active,
            #cshero-header .cs_custom_header_menu ul.cshero-dropdown > li > a.active,
            #cshero-header .cs_custom_header_menu .cshero-header-content-widget a:active{
                color:<?php echo $menu_link_active;?>;
                background-color:<?php echo $menu_background_active;?>;
            }
            #cshero-header .cs_custom_header_menu ul.cshero-dropdown > li > a:hover,
            #cshero-header .cs_custom_header_menu ul.cshero-dropdown > li > a:focus,
            #cshero-header .cs_custom_header_menu ul.cshero-dropdown > li:not(.group):hover > a,
            #cshero-header .cs_custom_header_menu ul.cshero-dropdown > li:not(.group):focus > a,
            #cshero-header .cs_custom_header_menu ul.cshero-dropdown > li:not(.group):active > a,
            #cshero-header .cs_custom_header_menu ul.cshero-dropdown > li:not(.group):visited > a,
            #cshero-header .cs_custom_header_menu .cshero-header-content-widget a:hover,
            #cshero-header .cs_custom_header_menu .cshero-header-content-widget a:focus{
                color:<?php echo $menu_link_hover;?>;
                background-color:<?php echo $menu_background_hover;?>;
            }
            #cshero-header .cs_custom_header_menu .cshero-header-content-widget{
                background-color:<?php echo $widget_bg;?>;
                margin:<?php echo $widget_margin; ?>;
                padding:<?php echo $widget_padding; ?>;
            }
            ?>
        </style>

		<?php 
           $file_layout= "cms_templates/menu/layouts/$layout.php";
            $file_css   = "cms_templates/menu/css/$layout.css";
            if(locate_template($file_layout)){
                if(locate_template($file_css))
                    wp_enqueue_style("menu-$layout",get_template_directory_uri()."/".$file_css);    
                require locate_template($file_layout);
            }else{
                wp_enqueue_style("menu-".str_replace('.','-',$layout)."", CSCORE_PLUGIN_URL . "framework/shortcodes/menu/css/$layout.css",array(),'1.0.0','all');
                require  "layouts/$layout.php";
            }
        ?>
	</div>
	<style type="text/css" scoped>
        #cshero-header a.shortcode-menu{color:<?php echo $menu_link_color;?>;}
        #cshero-header a.shortcode-menu:hover{
            color:<?php echo $menu_link_hover;?>;
        }
    </style>
	<div id="cshero-main-menu-mobile" class="collapse navbar-collapse cshero-mmenu"></div>
    <?php
    return ob_get_clean();
}

add_shortcode('cs-shortcode-menu', 'cs_shortcode_menu_render');

?>