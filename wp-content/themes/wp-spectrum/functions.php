<?php
ob_start();
require_once ('admin/index.php');
load_theme_textdomain( 'wp_spectrum', get_template_directory().'/languages');
// Register Navigation
add_action('init', 'cshero_register_menu');
add_filter('widget_text', 'do_shortcode');
/*
 * Css
 */
add_action( 'wp_enqueue_scripts', 			'cshero_css' );
/*
 * Js
 */
add_action( 'wp_enqueue_scripts', 			'cshero_js' );
/*
 * Header
 */
add_action( 'wp_head', 						'cshero_favicon' );
/*
 * VC Template
 */
add_action( 'edit_form_after_title', 'cshero_add_subtitle_field' );

if(function_exists("vc_set_shortcodes_templates_dir")){
	vc_set_shortcodes_templates_dir(get_stylesheet_directory()."/vc_templates/");
}

/* Dismiss vc update. */
if(function_exists('vc_set_as_theme')) vc_set_as_theme( true );
/*
* TGM
*/
require_once(ADMIN_PATH . 'tgm-plugin-activation/class-tgm-plugin-activation.php');
require_once(ADMIN_PATH . 'tgm-plugin-activation/plugin-options.php');
/**
 * Subtitle
 */
function cshero_add_subtitle_field(){
    global $post;
    $screen = get_current_screen();
    if(in_array($screen->id, array('post', 'portfolio','team'))){
        $value = get_post_meta($post->ID, 'cs_post_subtitle', true);
    echo '<div class="subtitle">
          <input type="text"
                 name="cs_post_subtitle" 
                 value="'.$value.'" id="subtitle"
                 placeholder = "Subtitle"
                 style="width: 100%;margin-top: 4px;">
          </div>';
    }
}
add_action('save_post', 'cshero_save_meta_boxes');
/**
 * Save Post
 * @param unknown $post_id
 */
function cshero_save_meta_boxes($post_id) {
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    foreach($_POST as $key => $value) {
        if(strstr($key, 'cs_')) {
            update_post_meta($post_id, $key, $value);
        }
    }
}
/**
 * Register Menu
 */
function cshero_register_menu(){
    register_nav_menu('main_navigation', __('Main Navigation','wp_spectrum'));
    register_nav_menu('top_navigation', __('Top Navigation','wp_spectrum'));
    register_nav_menu('left_navigation', __('Left Navigation','wp_spectrum'));
    register_nav_menu('right_navigation', __('Right Navigation','wp_spectrum'));
    register_nav_menu('404_pages', __('404 Useful Pages','wp_spectrum'));
    register_nav_menu('sticky_navigation', __('Sticky Header Navigation','wp_spectrum'));
}
/*
 * Favicon
 */
function cshero_favicon(){
	global $smof_data;
	$icon = get_stylesheet_directory_uri()."/favicon.ico";
	if(!empty($smof_data['favicon']['url'])){
		$icon = $smof_data['favicon']['url'];
	}
	echo '<link type="image/x-icon" href="'.esc_url($icon).'" rel="shortcut icon">';
}
/** Generate Dynamic Css */
add_action('redux/options/smof_data/saved', 'cshero_generate_dynamic_css');
add_action('generate_dynamic_css', 'cshero_generate_dynamic_css', 10, 1);

function cshero_generate_dynamic_css(){
    global $smof_data;
    if(count($smof_data) > 1){
        $css_dir = get_template_directory() . '/framework/dynamic/'; // Shorten code, save 1 call
        ob_start(); // Capture all output (output buffering)

        require($css_dir . 'dynamic.main.php'); // Generate CSS

        $css = ob_get_clean(); // Get generated CSS (output buffering)
        file_put_contents(get_template_directory().'/css/' . 'dynamic.css', $css, LOCK_EX); // Save it
    }
}

do_action('generate_dynamic_css');

function cshero_css(){
	global $smof_data;

	/* register */
	wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css',array(), '3.2.0');
	wp_register_style('colorbox', get_template_directory_uri().'/css/colorbox.css', array(), '1.5.10');
	wp_register_style('font-awesome', get_template_directory_uri().'/css/font-awesome.min.css', array(), '4.1.0');
	wp_register_style('font-ionicons', get_template_directory_uri().'/css/ionicons.min.css', array(), '1.5.2');
	wp_register_style('lux.background', get_template_directory_uri() . '/css/lux.background.css', array(), '1.0.0');

	/* load base style */
	wp_enqueue_style( 'bootstrap' );
	if ($smof_data["use_font_awesome"] == '1') {
		wp_enqueue_style( 'font-awesome' );
	}

	if ($smof_data["use_font_ionicons"] == '1') {
	    wp_enqueue_style( 'font-ionicons' );
	}
	wp_enqueue_style( 'animate-elements', get_template_directory_uri() . "/css/cs-animate-elements.css", array(), '1.0.0');
	if(class_exists('WooCommerce')){
		wp_enqueue_style( 'woocommerce', get_template_directory_uri() . "/css/woocommerce.css", array(), '1.0.0');
	}
	/*end prefix*/
	wp_enqueue_style( 'style', get_template_directory_uri() . "/style.css", array(), '1.0.0');

    if(cshero_getHeader()=='v4'){
        wp_enqueue_style('headerleft', get_template_directory_uri().'/css/headerleft.css',array(), '1.0');
    }
    /** Dynamic */
    $page_id = '';
    if(is_page() || is_single()){
        $page_id = '&page_id='.get_the_ID();
    }
    add_action('wp_head', 'cshero_header_css_callback');
    //wp_enqueue_style('dynamic-header',admin_url( 'admin-ajax.php' ).'?action=cshero_header_css'.$page_id);
    wp_enqueue_style('dynamic-main',get_template_directory_uri().'/css/dynamic.css');

}
/*
 * Cshero JS
 */
function cshero_js(){
	global $smof_data, $post;
	/* register */
	wp_register_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js',array(), '3.2.0');
	wp_register_script( 'jquery-easing', get_template_directory_uri().'/js/jquery.easing.min.js',array(), '1.3.1', TRUE);
	wp_register_script( 'jquery-colorbox', get_template_directory_uri() . '/js/jquery.colorbox.min.js', array(), '1.5.10', TRUE);
	wp_register_script( 'masonry-pkgd', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array(), '3.1.5');
	wp_register_script('bxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', 'jquery', '1.0', TRUE);
	wp_register_script('jm-bxslider', get_template_directory_uri() . '/js/jquery.jm-bxslider.js', 'jquery', '1.0', TRUE);

	wp_register_script('lux.background', get_template_directory_uri() . '/js/lux.background.js', 'jquery', '1.0', TRUE);

	if($smof_data['smooth_scroll'] == '1'){
        wp_register_script( 'smoothscroll', get_template_directory_uri().'/js/cs-smoothscroll.min.js', array(), '1.0.0' , TRUE);
        wp_enqueue_script( 'smoothscroll' );
    }
	/* load base script */
	wp_enqueue_script("jquery");
	wp_enqueue_script( 'bootstrap');

	wp_deregister_script( 'jquery-cookie' );
	wp_enqueue_script( 'parallax', get_template_directory_uri().'/js/cs_parallax.js', array() , '1.0.0', TRUE);
	wp_enqueue_script( 'jquery-cookie', get_template_directory_uri().'/js/jquery_cookie.min.js', array() , '1.0.0', TRUE);

    wp_enqueue_script( 'megamenu', get_template_directory_uri().'/js/megamenu.js',array(), '1.0.0', TRUE);
    wp_enqueue_script( 'mousewheel', get_template_directory_uri().'/js/jquery.mousewheel.min.js',array(), '1.0.0', TRUE);
    wp_enqueue_script( 'main', get_template_directory_uri().'/js/main.js',array(), '1.0.0', TRUE);

    if(is_page() && !empty($post->ID)){
        $page_sticky = get_post_meta($post->ID, 'cs_show_sticky_header', true);
        $one_page = get_post_meta($post->ID, 'cs_onepage', true);
        if($page_sticky != ''){ $smof_data['header_sticky'] = $page_sticky;}
        
        if($one_page){
            $page_scroll_speed = get_post_meta($post->ID, 'cs_onepage_speed', true) ? get_post_meta($post->ID, 'cs_onepage_speed', true) : '1000' ;
            $page_scroll_offset = get_post_meta($post->ID, 'cs_onepage_offset', true) ? get_post_meta($post->ID, 'cs_onepage_offset', true) : '0' ;
            $page_scroll_easing = get_post_meta($post->ID, 'cs_onepage_easing', true) ? get_post_meta($post->ID, 'cs_onepage_easing', true) : 'jswing' ;  
            wp_enqueue_script( 'jquery-easing' );
            wp_enqueue_script( 'jquery-nav', get_template_directory_uri().'/js/jquery.nav.js',array(), '3.0.0', TRUE);
            wp_register_script( 'custom-nav', get_template_directory_uri().'/js/custom-nav.js',array(), '1.0.0', TRUE);
            wp_localize_script( 'custom-nav', 'one_page', array('scrollSpeed'=>$page_scroll_speed, 'scrollOffset'=>$page_scroll_offset, 'easing'=>$page_scroll_easing) );
            wp_enqueue_script( 'custom-nav' );
        }
        
        $row_navigation = get_post_meta($post->ID, 'cs_row_navigation', true);
        $row_navigation_top = get_post_meta($post->ID, 'cs_row_navigation_top', true);
        $row_navigation_bottom = get_post_meta($post->ID, 'cs_row_navigation_bottom', true);
        if($row_navigation){
            wp_enqueue_script( 'jquery.fullPage', get_template_directory_uri().'/js/jquery.fullPage.min.js',array(), '2.5.5', TRUE);
            wp_register_script( 'custom.fullPage', get_template_directory_uri().'/js/custom.fullPage.js',array(), '2.5.5', TRUE);
            wp_localize_script( 'custom.fullPage', 'fullpage', array('top'=>$row_navigation_top, 'bottom'=>$row_navigation_bottom));
            wp_enqueue_script( 'custom.fullPage' );
        }
    }
    
	if($smof_data['header_sticky']){
		wp_enqueue_script( 'sticky', get_template_directory_uri().'/js/sticky.js',array(), '1.0.0', TRUE);
	}
    if( $smof_data['page_loader'] == '1'){
        wp_enqueue_script( 'pageloading', get_template_directory_uri().'/js/pageloading.js', array(), '1.0.0', TRUE);
    }
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        // enqueue the javascript that performs in-link comment reply fanciness
        wp_enqueue_script( 'comment-reply' );
    }
}
/*
 * Cshero CSS
 */
function cshero_getCSSite(){
    $blog = explode('/', home_url());
    $name=$blog[count($blog)-1];
    if(get_option('cs-body-class','-1')!='-1'){
        $name=get_option('cs-body-class');
    }
    if(strstr($name,'eagle')){
    	update_option('cs-body-class',$name);
    }
    else{
    	$name='eagle1';
    }
    return $name;
}
/*
* Detect mobile
*/
function cshero_isMobile(){
	if(preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|playbook|sagem|sharp|sie-|silk|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $_SERVER['HTTP_USER_AGENT']))
		{return true;}
	else
		{return false;}
}
/*Meny JS*/
global $smof_data;
if(isset($smof_data['enable_hidden_sidebar']) && $smof_data['enable_hidden_sidebar'] && !cshero_isMobile()){
	add_action( 'wp_enqueue_scripts', 'cs_meny_script' );
	function cs_meny_script(){
		global $smof_data;
		wp_register_script( 'custom-meny', get_template_directory_uri().'/js/custom-meny.js',array(),'1.0.0',true);
		wp_enqueue_script( 'custom-meny' );
	}
}
if ( is_singular() ){ wp_enqueue_script( "comment-reply" );}
#-----------------------------------------------------------------#
# Content Width
# T_add
#-----------------------------------------------------------------#
if (!isset( $content_width )) $content_width = '669px';
#-----------------------------------------------------------------#
# Load Header
# T_add
#-----------------------------------------------------------------#
add_action( 'wp_head', 'cshero_header_custom_css' );
function cshero_header_custom_css(){
	global $smof_data,$header_setings,$post;
	$id = 0;
	$pageHeader = '';
	if(!empty($post)){
	    $pageHeader = get_post_meta($post->ID, 'cs_page_header', true);
	};
	if(empty($pageHeader) || $pageHeader=='0'){
		if($smof_data["header_layout"]!='custom'){
			return;
		}else{
			$id=(int)str_replace('cs-header-', '', $smof_data["cs-header-id"]);
		}
	}
	else{
		if(!strstr($pageHeader,'cs-header-')){
			return;
		}else{
			$id=(int)str_replace('cs-header-', '', $pageHeader);
		}
	}
	if ( $id ) {
		$shortcodes_custom_css = get_post_meta( $id, '_wpb_shortcodes_custom_css', true );
		if ( ! empty( $shortcodes_custom_css ) ) {
			echo '<style type="text/css" data-type="vc_shortcodes-custom-css-2">';
			echo esc_attr($shortcodes_custom_css);
			echo '</style>';
		}
	}
}
function cshero_header(){
	global $smof_data,$header_setings,$post;

	$pageHeader = '';
	if(!empty($post)){
	    $pageHeader = get_post_meta($post->ID, 'cs_page_header', true);
	}
	if(empty($pageHeader) || $pageHeader=='0'){
		if($smof_data["header_layout"]!='custom'){
			get_template_part('framework/headers/header',$smof_data["header_layout"]);
		} else{
			?>
			<header id="cshero-header" class="header cs-header-custom<?php if($header_setings->header_fixed == '1'){ echo ' transparentFixed';} ?> <?php if($smof_data['header_fixed_top']){ echo ' transparentFixed';} ?>">
			<?php
			echo do_shortcode(get_post(str_replace('cs-header-', '', $smof_data["cs-header-id"]))->post_content);
			get_template_part('framework/headers/sticky-header');
			?>
			</header>
			<?php
		}
	}
	else{
		if(strstr($pageHeader,'cs-header-')){

			?>
			<header id="cshero-header" class="header cs-header-custom<?php if($header_setings->header_fixed == '1'){ echo ' transparentFixed';} ?>">
			<?php
			echo do_shortcode(get_post(str_replace('cs-header-', '', $pageHeader))->post_content);
			get_template_part('framework/headers/sticky-header');
			?>
			</header>
			<?php
		}
		else{
			get_template_part('framework/headers/header',$pageHeader);
		}
	}

}
function cshero_getHeader(){
	global $smof_data,$header_setings,$post;

	$pageHeader = '';
	if(!empty($post)){
	    $pageHeader = get_post_meta($post->ID, 'cs_page_header', true);
	}
	if(empty($pageHeader) || $pageHeader=='0'){
		if($smof_data["header_layout"]!='custom'){
			return $smof_data["header_layout"];
		} else{
			return $smof_data["cs-header-id"];
		}
	}
	else{
		return $pageHeader;
	}
}
/*social share list*/
function cs_socials_share($url,$image='',$title='',$comment_link=''){
	ob_start();
	?>
	<div class="post-share">
		<span class="hide">Share<br />This</span>
		<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url($url);?>"><span class="share-box"><i class="fa fa-facebook"></i></span></a>
		<a target="_blank" href="https://twitter.com/home?status=<?php echo __('Check out this article','wp_spectrum');?>:%20<?php echo esc_attr($title);?>%20-%20<?php echo esc_url($url);?>"><span class="share-box"><i class="fa fa-twitter"></i></span></a>
		<a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url($url);?>&amp;media=<?php echo esc_url($image);?>&amp;description=<?php echo esc_attr($title);?>"><span class="share-box"><i class="fa fa-pinterest"></i></span></a>
		<a target="_blank" href="https://plus.google.com/share?url=<?php echo esc_url($url);?>"><span class="share-box"><i class="fa fa-google-plus"></i></span></a>
		<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url($url);?>&title=<?php echo esc_attr($title);?>"><span class="share-box"><i class="fa fa-linkedin"></i></span></a>
		<?php if($comment_link!=''){
			?><a href="<?php echo esc_url($comment_link);?>"><span class="share-box"><i class="fa fa-comment"></i></span></a><?php
		}?>
	</div>
	<?php
	return ob_get_clean();
}
#-----------------------------------------------------------------#
# Load footer
# T_add
#-----------------------------------------------------------------#
function cshero_footer(){
	global $smof_data;
	switch ($smof_data["footer_layout"]){
		case 'f1':
			get_template_part('framework/footer/footer-v1');
			break;
		case 'f2':
			get_template_part('framework/footer/footer-v2');
		break;
	}
}
add_theme_support( "title-tag" );
add_theme_support( 'custom-header');
add_theme_support( 'custom-background');
add_theme_support('woocommerce');
// Default RSS feed links
add_theme_support('automatic-feed-links');
// Post Formats
add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));
#-----------------------------------------------------------------#
# Add post thumbnail functionality
# T_add
#-----------------------------------------------------------------#
add_theme_support('post-thumbnails');
add_image_size('related-img', 180, 138, true);
add_image_size('portfolio-one', 540, 272, true);
add_image_size('portfolio-two', 460, 295, true);
add_image_size('portfolio-three', 300, 214, true);
add_image_size('portfolio-four', 220, 161, true);
add_image_size('portfolio-full', 940, 400, true);
add_image_size('recent-posts', 700, 441, true);
add_image_size('recent-works-thumbnail', 66, 66, true);
// Register widgetized locations
if(function_exists('register_sidebar')) {
	register_sidebar(array(
	'name' => 'Blog Sidebar',
	'id' => 'cshero-blog-sidebar',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="heading"><h3 class="wg-title"><span>',
	'after_title' => '</span></h3></div>',
	));
	register_sidebar(array(
	'name' => 'Sidebar Left',
	'id' => 'cshero-widget-left',
	'before_widget' => '<div id="%1$s" class="header-top-widget-col %2$s">',
	'after_widget' => '<div style="clear:both;"></div></div>',
	'before_title' => '<h3 class="wg-title"><span>',
	'after_title' => '</span></h3>',
	));
	register_sidebar(array(
	'name' => 'Sidebar Right',
	'id' => 'cshero-widget-right',
	'before_widget' => '<div id="%1$s" class="header-top-widget-col right-widget-wrap %2$s">',
	'after_widget' => '<div style="clear:both;"></div></div>',
	'before_title' => '<h3 class="wg-title"><span>',
	'after_title' => '</span></h3>',
	));
	register_sidebar(array(
	'name' => 'Slider Header',
	'id' => 'cshero-widget-slider-header',
	'before_widget' => '<div id="%1$s" class="slider-header-widget-col %2$s">',
	'after_widget' => '<div style="clear:both;"></div></div>',
	'before_title' => '<h3 class="wg-title"><span>',
	'after_title' => '</span></h3>',
	));
	register_sidebar(array(
	'name' => 'Sidebar Hidden Menu',
	'id' => 'cshero-widget-hidden-menu',
	'before_widget' => '<div id="%1$s" class="hidden-menu-widget-col %2$s">',
	'after_widget' => '<div style="clear:both;"></div></div>',
	'before_title' => '<h3 class="wg-title"><span>',
	'after_title' => '</span></h3>',
	));
    register_sidebar(array(
        'name' => 'Header Top Widget 1',
        'id' => 'cshero-header-top-widget-1',
        'before_widget' => '<div id="%1$s" class="header-top-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h3 class="wg-title"><span>',
        'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
        'name' => 'Header Top Widget 2',
        'id' => 'cshero-header-top-widget-2',
        'before_widget' => '<div id="%1$s" class="header-top-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h3 class="wg-title"><span>',
        'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
        'name' => 'Header Top Widget 3',
        'id' => 'cshero-header-top-widget-3',
        'before_widget' => '<div id="%1$s" class="header-top-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h3 class="wg-title"><span>',
        'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
        'name' => 'Header Content Widget 1',
        'id' => 'cshero-header-content-widget-1',
        'before_widget' => '<div id="%1$s" class="header-top-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h3 class="wg-title"><span>',
        'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
        'name' => 'Header Content Widget 2',
        'id' => 'cshero-header-content-widget-2',
        'before_widget' => '<div id="%1$s" class="header-top-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h3 class="wg-title"><span>',
        'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
        'name' => 'Header Fixed Left/Right Content Widget',
        'id' => 'cshero-header-fixed-content-widget',
        'before_widget' => '<div id="%1$s" class="header-fixed-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h3 class="wg-title"><span>',
        'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
        'name' => 'Bottom Widget 1',
        'id' => 'cshero-bottom-widget-1',
        'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h3 class="wg-title"><span>',
        'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
        'name' => 'Bottom Widget 2',
        'id' => 'cshero-bottom-widget-2',
        'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h3 class="wg-title"><span>',
        'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
        'name' => 'Bottom Widget 3',
        'id' => 'cshero-bottom-widget-3',
        'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h3 class="wg-title"><span>',
        'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
        'name' => 'Bottom Widget 4',
        'id' => 'cshero-bottom-widget-4',
        'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h3 class="wg-title"><span>',
        'after_title' => '</span></h3>',
    ));
	register_sidebar(array(
    	'name' => 'Footer Widget 1',
    	'id' => 'cshero-footer-widget-1',
    	'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
    	'after_widget' => '<div style="clear:both;"></div></div>',
    	'before_title' => '<h3 class="wg-title"><span>',
    	'after_title' => '</span></h3>',
	));
	register_sidebar(array(
    	'name' => 'Footer Widget 2',
    	'id' => 'cshero-footer-widget-2',
    	'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
    	'after_widget' => '<div style="clear:both;"></div></div>',
    	'before_title' => '<h3 class="wg-title"><span>',
    	'after_title' => '</span></h3>',
	));
	register_sidebar(array(
    	'name' => 'Footer Widget 3',
    	'id' => 'cshero-footer-widget-3',
    	'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
    	'after_widget' => '<div style="clear:both;"></div></div>',
    	'before_title' => '<h3 class="wg-title"><span>',
    	'after_title' => '</span></h3>',
	));
	register_sidebar(array(
    	'name' => 'Footer Widget 4',
    	'id' => 'cshero-footer-widget-4',
    	'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
    	'after_widget' => '<div style="clear:both;"></div></div>',
    	'before_title' => '<h3 class="wg-title"><span>',
    	'after_title' => '</span></h3>',
	));
	register_sidebar(array(
    	'name' => 'Footer Bottom Widget 1',
    	'id' => 'cshero-slidingbar-bottom-widget-1',
    	'before_widget' => '<div id="%1$s" class="slidingbar-widget-col %2$s">',
    	'after_widget' => '<div style="clear:both;"></div></div>',
    	'before_title' => '<h3 class="wg-title"><span>',
    	'after_title' => '</span></h3>',
	));
	register_sidebar(array(
    	'name' => 'Footer Bottom Widget 2',
    	'id' => 'cshero-slidingbar-bottom-widget-2',
    	'before_widget' => '<div id="%1$s" class="slidingbar-widget-col %2$s">',
    	'after_widget' => '<div style="clear:both;"></div></div>',
    	'before_title' => '<h3 class="wg-title"><span>',
    	'after_title' => '</span></h3>',
	));
    register_sidebar(array(
        'name' => 'Newsletter',
        'id' => 'cshero-slidingbar-newsletter',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));
    register_sidebar(array(
        'name' => 'Woocommerce Sidebar',
        'id' => 'woocommerce_sidebar',
        'before_widget' => '<div id="%1$s" class="slidingbar-widget-col %2$s">',
    	'after_widget' => '<div style="clear:both;"></div></div>',
    	'before_title' => '<h3 class="wg-title"><span>',
    	'after_title' => '</span></h3>',
    ));
	register_sidebar(array(
        'name' => 'Megamenu Sidebar 1',
        'id' => 'megamenu_sidebar1',
        'before_widget' => '<div class="slidingbar-widget-col %2$s">',
    	'after_widget' => '<div style="clear:both;"></div></div>',
    	'before_title' => '<h3 class="wg-title"><span>',
    	'after_title' => '</span></h3>',
    ));
	register_sidebar(array(
        'name' => 'Megamenu Sidebar 2',
        'id' => 'megamenu_sidebar2',
        'before_widget' => '<div class="slidingbar-widget-col %2$s">',
    	'after_widget' => '<div style="clear:both;"></div></div>',
    	'before_title' => '<h3 class="wg-title"><span>',
    	'after_title' => '</span></h3>',
    ));
	register_sidebar(array(
        'name' => 'Megamenu Sidebar 3',
        'id' => 'megamenu_sidebar3',
        'before_widget' => '<div class="slidingbar-widget-col %2$s">',
    	'after_widget' => '<div style="clear:both;"></div></div>',
    	'before_title' => '<h3 class="wg-title"><span>',
    	'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
    	'name' => 'Debug',
    	'id' => 'cshero-debug-widget',
    	'before_widget' => '<div id="%1$s" class="debug-widget-col %2$s">',
    	'after_widget' => '<div style="clear:both;"></div></div>',
    	'before_title' => '<h3 class="wg-title"><span>',
    	'after_title' => '</span></h3>',
	));
    register_sidebar(array(
    	'name' => 'Custom Button Action',
    	'id' => 'cshero-custom-button-widget',
    	'before_widget' => '<div class="custom-button-widget-col %2$s">',
    	'after_widget' => '<div style="clear:both;"></div></div>',
    	'before_title' => '<h3 class="wg-title"><span>',
    	'after_title' => '</span></h3>',
	));
}
#-----------------------------------------------------------------#
# register widget footer bottom
#-----------------------------------------------------------------#
function cshero_sidebar_header_top(){
	global $smof_data;
	if($smof_data['header_top_widgets']){
		for ($i = 1 ; $i <= (int)$smof_data['header_top_widgets_columns']; $i++){
			echo "<div class='header-top-".$i." ".esc_attr($smof_data['header_top_widgets_'.$i.''])."'>";
			if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Top Widget $i")):
			endif;
			echo "</div>";
		}
	}
}
#-----------------------------------------------------------------#
# register widget footer top
#-----------------------------------------------------------------#
function cshero_sidebar_footer_top(){
	global $smof_data;
	if($smof_data['footer_top_widgets']){
		for ($i = 1 ; $i <= (int)$smof_data['footer_top_widgets_columns']; $i++){
			echo "<div class='footer-top-".$i." ".esc_attr($smof_data['footer_top_widgets_'.$i.''])."'>";
			dynamic_sidebar("cshero-footer-widget-$i");
			echo "</div>";
		}
	}
}
#-----------------------------------------------------------------#
# register widget footer bottom
# T_add
#-----------------------------------------------------------------#
function cshero_sidebar_footer_bottom(){
	global $smof_data;
	if($smof_data['footer_bottom_widgets']){
	 for ($i = 1 ; $i <= (int)$smof_data['footer_bottom_widgets_columns']; $i++){
	 	echo "<div class='footer-bottom-".$i." ".esc_attr($smof_data['footer_bottom_widgets_'.$i.''])."'>";
	 	dynamic_sidebar("cshero-slidingbar-bottom-widget-$i");
	 	echo "</div>";
		}
	}
}
/*
 * Breadcrumb
*/
function cshero_breadcrumb() {
	global $smof_data;
	/* === OPTIONS === */
	$text['home'] = $smof_data['breacrumb_home_prefix']; // text for the 'Home' link
	$text['category'] = 'Archive by Category "%s"'; // text for a category page
	$text['search'] = 'Search Results for "%s" Query'; // text for a search results page
	$text['tag'] = 'Posts Tagged "%s"'; // text for a tag page
	$text['author'] = 'Articles Posted by %s'; // text for an author page
	$text['404'] = 'Error 404'; // text for the 404 page
	$show_current = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
	$show_on_home = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
	$show_title = 1; // 1 - show the title for the links, 0 - don't show
	$delimiter = ''; // delimiter between crumbs
	$before = '<span class="current">'; // tag before the current crumb
	$after = '</span>'; // tag after the current crumb
	/* === END OF OPTIONS === */
	global $post;
	$home_link = home_url('');
	$link_attr = ' rel="v:url" property="v:title"';
	$link = '<a href="%1$s">%2$s</a>';
	$parent_id = $parent_id_2 = isset($post->post_parent)?($post->post_parent?$post->post_parent:null):null;
	$frontpage_id = get_option('page_on_front');
	if (is_home() || is_front_page()) {
		if ($show_on_home == 1)
			echo '<a href="' . $home_link . '">' . $text['home'] . '</a>';
	} else {
		if ($show_home_link == 1) {
			echo '<a href="' . $home_link . '">' . $text['home'] . '</a>';
			if ($frontpage_id == 0 || $parent_id != $frontpage_id)
				echo ''.$delimiter;
		}
		if (is_category()) {
			$this_cat = get_category(get_query_var('cat'), false);
			if ($this_cat->parent != 0) {
				$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
				if ($show_current == 0)
					$cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0)
					$cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo ''.$cats;
			}
			if ($show_current == 1)
				echo ''.$before . sprintf($text['category'], single_cat_title('', false)) . $after;
		} elseif (is_search()) {
			echo ''.$before . sprintf($text['search'], get_search_query()) . $after;
		} elseif (is_day()) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F')) . $delimiter;
			echo ''.$before . get_the_time('d') . $after;
		} elseif (is_month()) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo ''.$before . get_the_time('F') . $after;
		} elseif (is_year()) {
			echo ''.$before . get_the_time('Y') . $after;
		} elseif (is_single() && !is_attachment()) {
			if (get_post_type() != 'post') {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($show_current == 1)
					echo ''.$delimiter . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category();
				$cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($show_current == 0)
					$cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>', $cats);
				if ($show_title == 0)
					$cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo ''.$cats;
				if ($show_current == 1)
					echo ''.$before . get_the_title() . $after;
			}
		} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
			$post_type = get_post_type_object(get_post_type());
			echo ''.$before . $post_type->labels->singular_name . $after;
		} elseif (is_attachment()) {
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID);
			$cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, $delimiter);
			$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
			$cats = str_replace('</a>', '</a>' . $link_after, $cats);
			if ($show_title == 0)
				$cats = preg_replace('/ title="(.*?)"/', '', $cats);
			echo ''.$cats;
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current == 1)
				echo ''.$delimiter . $before . get_the_title() . $after;
		} elseif (is_page() && !$parent_id) {
			if ($show_current == 1)
				echo ''.$before . get_the_title() . $after;
		} elseif (is_page() && $parent_id) {
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo ''.$breadcrumbs[$i];
					if ($i != count($breadcrumbs) - 1)
						echo ''.$delimiter;
				}
			}
			if ($show_current == 1) {
				if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id))
					echo ''.$delimiter;
				echo ''.$before . get_the_title() . $after;
			}
		} elseif (is_tag()) {
			echo ''.$before . sprintf($text['tag'], single_tag_title('', false)) . $after;
		} elseif (is_author()) {
			global $author;
			$userdata = get_userdata($author);
			echo ''.$before . sprintf($text['author'], $userdata->display_name) . $after;
		} elseif (is_404()) {
			echo ''.$before . $text['404'] . $after;
		}
		if (get_query_var('paged')) {
			if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
				echo ' ';
			echo __(' / Page', 'wp_spectrum') . ' ' . get_query_var('paged');
			if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
				echo '';
		}
	}
}
if(!function_exists('cshero_generetor_blog_layout')){
	function cshero_generetor_blog_layout() {
		global $smof_data,$cat;
		$layout = new stdClass();
		$layout->blog = 'col-md-12';
		$layout->left_col = null;
		$layout->right_col = null;
		$layout->class = '';
		$cat_data = get_option("category_".$cat);
		$category_layout = $smof_data['blog_layout'];

		if(is_category() && !empty($cat_data)){
			if($cat_data['category_layout'] && $cat_data['category_layout'] != 'default'){
				$category_layout = $cat_data['category_layout'];
			}
		}
		$main = 'col-xs-12 col-sm-9 col-md-9 col-lg-9';
		$sidebar_col = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';

		if($category_layout){
			if ( is_active_sidebar( 'cshero-blog-sidebar' ) && $category_layout == 'left-fixed' ){
				$layout->blog = $main;
				$layout->left_col = $sidebar_col;
				$layout->right_col = null;
				$layout->class = ' sidebar-active-left';
			} elseif (is_active_sidebar( 'cshero-blog-sidebar' ) && $category_layout == 'right-fixed'){
				$layout->blog = $main;
				$layout->left_col = null;
				$layout->right_col = $sidebar_col;
				$layout->class = ' sidebar-active-right';
			} else {
				$layout->blog = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
				$layout->left_col = null;
				$layout->right_col = null;
			}
		}
		return $layout;
	}
}
/*
 * Layout Control
*/
function cshero_generetor_layout() {
	global $smof_data,$post;
	/* Layout */
	$layout = new stdClass();
	$layout->blog = 'col-md-12';
	$layout->left1_col = null;
	$layout->left1_sidebar = null;
	$layout->right1_col = null;
	$layout->right1_sidebar = null;
	$layout->class = null;

	$sidebar_left = 'cshero-widget-left';
	$sidebar_right = 'cshero-widget-right';

	$main = 'col-xs-12 col-sm-9 col-md-9 col-lg-9';
	$sidebar_col = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
	/* Type */
	$option = null;
	if (is_page()){
	    $page_full = get_post_meta($post->ID,'cs_layout',true);
	    $page_layout = get_post_meta($post->ID,'cs_page_layout',true);
	    $page_sidebar_left = get_post_meta($post->ID,'cs_sidebar_left',true);
	    $page_sidebar_right = get_post_meta($post->ID,'cs_sidebar_right',true);
	    if($page_layout != ''){
	        $smof_data["page_layout"] = $page_layout;
	        if($page_sidebar_left){
	            $sidebar_left = $page_sidebar_left;
	        }
	        if($page_sidebar_right){
	            $sidebar_right = $page_sidebar_right;
	        }
	    } else {
	        //$sidebar_left = '';
	        //$sidebar_right = '';
	    }
		$option = $smof_data["page_layout"];
	} elseif (is_single()) {
		$option = $smof_data["post_layout"];
	} elseif (is_archive()){
		$option = $smof_data["blog_layout"];
	}
	switch ($option){
		case 'full-fixed':
			$layout->blog = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
			break;
		case 'right-fixed':
		    if(is_active_sidebar( $sidebar_right )){
    			$layout->blog = $main;
    			$layout->right1_col = $sidebar_col;
    			$layout->right1_sidebar = $sidebar_right;
    			$layout->class = ' sidebar-active-right';
		    }
			break;
		case 'left-fixed':
		    if(is_active_sidebar( $sidebar_left )){
    			$layout->blog = $main;
    			$layout->left1_col = $sidebar_col;
    			$layout->left1_sidebar = $sidebar_left;
    			$layout->class = ' sidebar-active-left';
		    }
			break;
	}
	return $layout;
}
/*
 * Calculator Collum Bootstrap 3
 */
function cshero_calculator_collum($collum = 2) {
	switch ($collum){
		case 1:
			return 'col-md-12';
			break;
		case 2:
			return 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
			break;
		case 3:
			return 'col-xs-12 col-sm-4 col-md-4 col-lg-4';
			break;
		case 4:
			return 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
			break;
	}
}
/*
 * Setting for Header
 */
if(!function_exists('cshero_generetor_header_setting')){
	function cshero_generetor_header_setting(){
		global $smof_data,$post;

		$header_setings = new stdClass();
		$header_setings->body_class = 'csbody';
		$header_setings->header_fixed = '0';
		$header_setings->top_padding = '';

		if(is_page() && get_post_meta($post->ID, 'cs_header_setting', true) == 'custom'){
			$header_setings->header_fixed = get_post_meta($post->ID, 'cs_header_fixed_top', true);

			if($header_setings->header_fixed == '1'){
				$header_setings->body_class = 'csbody body_header_fixed';
			}else{
				$header_setings->body_class = 'csbody body_header_normal';
			}
		} else {
			$header_setings->header_fixed = $smof_data['header_fixed_top'];

			if($header_setings->header_fixed == '1'){
				$header_setings->body_class = 'csbody body_header_fixed';
			} else {
				$header_setings->body_class = 'csbody body_header_normal';
			}
		}
		/* Top Padding */
		if($smof_data["header_top_padding"]){
			$header_setings->top_padding = cshero_build_style(array('padding:'.$smof_data['header_top_padding'].';'));
		}

		return $header_setings;
	}
}
/*
 * Build Style
 */
if(!function_exists('cshero_build_style')){
	function cshero_build_style($arr = array()){
		$return = '';
		if(count($arr) > 0){
			$return = 'style="';
			$return .= implode(' ', $arr);
			$return .= '"';
		}
		return $return;
	}
}
/** Inline style */
if(!function_exists('cshero_inline_style')){
    function cshero_inline_style($params = array()){
        if(count($params) > 0){
            $styles = ' style="';
            foreach ($params as $key => $param){
                if(!empty($param)){
                    $styles .= $key.':'.$param.';';
                }
            }
            $styles .= '"';
            echo ''.$styles;
        }
    }
}
/*
 * Limit Words
 */
if (!function_exists('cshero_string_limit_words')) {
	function cshero_string_limit_words($string, $word_limit) {
		$words = explode(' ', $string, ($word_limit + 1));
		if (count($words) > $word_limit) {
			array_pop($words);
		}
		return implode(' ', $words)."";
	}
}
/*
 * Check posts full content or show read more.
 */
if(!function_exists('cshero_posts_full_content')){
	function cshero_posts_full_content(){
		global $smof_data;
		if($smof_data['blog_full_content'] == '1'){
			return '1';
		} elseif (is_archive() && $smof_data['show_full_content'] == '1'){
			return '1';
		} elseif (is_search()){
		    switch ($smof_data['search_view']){
		        case 'Excerpt':
		            return '2';
		            break;
		        case 'Read More':
		            return '1';
		            break;
		        default:
		            return '2';
		            break;
		    }
		} else {
			return '0';
		}
	}
}
/*
 * Max Charlength
 */
if (!function_exists('cshero_content_max_charlength')) {
	function cshero_content_max_charlength($excerpt, $charlength) {
		$charlength++;
		if (mb_strlen($excerpt) > $charlength) {
			$subex = mb_substr($excerpt, 0, $charlength - 5);
			$exwords = explode(' ', $subex);
			$excut = - ( mb_strlen($exwords[count($exwords) - 1]) );
			if ($excut < 0) {
				echo mb_substr($subex, 0, $excut);
			} else {
				echo ''.$subex;
			}
			echo '';
		} else {
			echo ''.$excerpt;
		}
	}
}
/*
 * Get Icon Post Type
 */
if (!function_exists('cshero_get_icon_post_type')){
	function cshero_get_icon_post_type(){
		switch (get_post_format()){
			case 'chat':
				return 'fa fa-thumb-tack';
				break;
			case 'gallery':
				return 'fa fa-camera-retro';
				break;
			case 'link':
				return 'fa fa-link';
				break;
			case 'image':
				return 'fa fa-picture-o';
				break;
			case 'quote':
				return 'fa fa-quote-left';
				break;
			case 'video':
				return 'fa fa-youtube-play';
				break;
			case 'audio':
				return 'fa fa-volume-up';
				break;
			default:
				return 'fa fa-file-text-o';
		}
	}
}
/** page title */
function cshero_page_title_render() {
    if (is_page() && get_post_meta(get_the_ID(), 'cs_page_title_custom_text', true) != ""){
        echo esc_attr(get_post_meta(get_the_ID(), 'cs_page_title_custom_text', true));
    } else {
        if (!is_archive()){
            if(is_search()){
                printf( __( 'Search Results for: %s', 'wp_spectrum' ), '<span>' . get_search_query() . '</span>' );
            } elseif (is_404()){
                _e( '404', 'wp_spectrum');
            } else {
                the_title();
            }
        } else {
            if ( is_category() ) :
            single_cat_title();
            elseif ( is_tag() ) :
            single_tag_title();
            elseif ( is_author() ) :
            printf( __( 'Author: %s', 'wp_spectrum' ), '<span class="vcard">' . get_the_author() . '</span>' );
            elseif ( is_day() ) :
            printf( __( 'Day: %s', 'wp_spectrum' ), '<span>' . get_the_date() . '</span>' );
            elseif ( is_month() ) :
            printf( __( 'Month: %s', 'wp_spectrum' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'wp_spectrum' ) ) . '</span>' );
            elseif ( is_year() ) :
            printf( __( 'Year: %s', 'wp_spectrum' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'wp_spectrum' ) ) . '</span>' );
            elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
            _e( 'Asides', 'wp_spectrum' );
            elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
            _e( 'Galleries', 'wp_spectrum');
            elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
            _e( 'Images', 'wp_spectrum');
            elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
            _e( 'Videos', 'wp_spectrum' );
            elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
            _e( 'Quotes', 'wp_spectrum' );
            elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
            _e( 'Links', 'wp_spectrum' );
            elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
            _e( 'Statuses', 'wp_spectrum' );
            elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
            _e( 'Audios', 'wp_spectrum' );
            elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
            _e( 'Chats', 'wp_spectrum' );
            elseif (class_exists('Woocommerce') && is_woocommerce()):
                woocommerce_page_title();
            elseif (class_exists('bbPress') && is_bbpress()):
                the_title();
            else :
                the_title();
            endif;
        }
    }
}
/*
 * Get Options Show Comments
*/
if (!function_exists('cshero_show_comments')){
	function cshero_show_comments($type = 'page'){
		global $smof_data;
		$defualt = '1'; $custom = '1';
		/* custom config */
		if ( comments_open() || '0' != get_comments_number() ){
			$custom = '1';
		} else {
			$custom = '0';
		}
		/* get admin options */
		switch ($type){
			case 'page':
				$defualt = $smof_data["show_comments_page"];
				break;
			case 'post':
				$defualt = $smof_data["show_comments_post"];
				break;
		}
		/* return */
		return $defualt;
	}
}
/*
 * Custom Title Widgets
 */
if (!function_exists('cshero_custom_title_widget')){
	function cshero_custom_title_widget($title){
		if ($title){
			$title = explode(' ',strip_tags($title));
			if (is_array($title)){
				if (count($title) > 0){
					$title[0] = "<span class='title-line'>".$title[0]."</span>";
				}
			}
			$title = implode(' ', $title);
		}
		return $title;
	}
}
/*
 * Remove shortcode gallery
 */
add_filter( 'the_content', 'remove_gallery' );
function remove_gallery( $content ) {
	return preg_replace ('/\[gallery[^\]]*\]/', '', $content);
}
/*
 * Post gallery
 */
if (!function_exists('cshero_grab_ids_from_gallery')) {
	function cshero_grab_ids_from_gallery() {
		global $post;
		$gallery = cshero_get_shortcode_from_content('gallery');
        $object =new stdClass();
        $object->columns = '3';
        $object->link = 'post';
        $object->ids = array();
        if($gallery){
        	$object = cshero_extra_shortcode('gallery', $gallery, $object);
        }
		return $object;
	}
}
/*
 * Extra shortcode
 */
if(!function_exists('cshero_extra_shortcode')){
	function cshero_extra_shortcode($name, $shortcode, $object) {
		if ($shortcode && is_object($object)) {
			$attrs = str_replace(array('[',']','"',$name),null, $shortcode);
			$attrs = explode(' ', $attrs);
			if(is_array($attrs)){
				foreach ($attrs as $attr){
					$_attr = explode('=', $attr);
					if(count($_attr) == 2){
						if($_attr[0] == 'ids'){
							$object->$_attr[0] = explode(',',$_attr[1]);
						} else {
							$object->$_attr[0] = $_attr[1];
						}
					}
				}
			}
		}
		return $object;
	}
}
/*
 * Get Shortcode From Content
 */
if(!function_exists('cshero_get_shortcode_from_content')){
	function cshero_get_shortcode_from_content($param) {
		global $post;
		$pattern = get_shortcode_regex();
		$content = $post->post_content;
		if (preg_match_all( '/'. $pattern .'/s', $content, $matches )
		&& array_key_exists( 2, $matches )
		&& in_array($param, $matches[2])){
			$key = array_search($param,$matches[2]);
			return $matches[0][$key];
		}
	}
}
/**
 * 
 */
function cshero_get_post_format_icon() {
    $post_icon = array('icon'=>'fa fa-file-text-o','text'=>__('STANDARD', 'wp_spectrum'));
    switch (get_post_format()) {
        case 'gallery':
            $post_icon['icon'] = 'fa fa-file-image-o';
            $post_icon['text'] = __('GALLERY', 'wp_spectrum');
            break;
        case 'link':
            $post_icon['icon'] = 'fa fa-external-link';
            $post_icon['text'] = __('LINK', 'wp_spectrum');
            break;
        case 'quote':
            $post_icon['icon'] = 'fa fa-quote-left';
            $post_icon['text'] = __('QUOTE', 'wp_spectrum');
            break;
        case 'video':
            $post_icon['icon'] = 'fa fa-film';
            $post_icon['text'] = __('VIDEO', 'wp_spectrum');
            break;
        case 'audio':
            $post_icon['icon'] = 'fa fa-bullhorn';
            $post_icon['text'] = __('AUDIO', 'wp_spectrum');
            break;
        default:
            if(is_sticky()){
                $post_icon['icon'] = 'fa fa-thumbs-o-up';
                $post_icon['text'] = __('STICKY', 'wp_spectrum');
            } else {
                $post_icon['icon'] = 'fa fa-file-text-o';
                $post_icon['text'] = __('STANDARD', 'wp_spectrum');
            }
            break;
    }
    return $post_icon;
}
/*
 * Default 404 page
 */
if(!function_exists('cshero_404_page_default')){
    function cshero_404_page_default(){
        global $smof_data;
        ob_start();
        ?>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 error_image">
		   <img alt="" src="<?php if($smof_data['404_image']['url']){ echo esc_url($smof_data['404_image']['url']); } else { echo esc_url($smof_data['logo']['url']); } ?>">
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 error_content">
		   <h1><?php _e('404', 'wp_spectrum'); ?></h1>
		   <h2><?php _e('Page not found.', 'wp_spectrum')?></h2>
		   <div class="error-body">
		       <span><?php _e('Ooops! This is embarrasing!', 'wp_spectrum'); ?></span>
		       <span><?php _e('It seems the page you are looking for has been misplaced.', 'wp_spectrum'); ?></span>
		       <span><?php _e('Please ', 'wp_spectrum'); ?></span>
		       <a href="<?php echo home_url(); ?>"><?php _e('click here', 'wp_spectrum'); ?></a>
		       <span><?php _e(' to get back home', 'wp_spectrum'); ?></span>
		   </div>
		</div>
        <?php
        echo ob_get_clean();
    }
}
/**
 * Default tunoff plugins on CMS.
 * @param $params | array options.
 */
if(!function_exists('cscore_plugins_support')){
    function cscore_plugins_support($params = array(), $support = '0') {
        foreach ($params as $param){
            update_option($param, $support);
        }
    }
}
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
//convert dates to readable format
if (!function_exists('tp_relative_time')) {

    function tp_relative_time($a) {
        //get current timestampt
        $b = strtotime("now");
        //get timestamp when tweet created
        $c = strtotime($a);
        //get difference
        $d = $b - $c;
        //calculate different time values
        $minute = 60;
        $hour = $minute * 60;
        $day = $hour * 24;
        $week = $day * 7;

        if (is_numeric($d) && $d > 0) {
            //if less then 3 seconds
            if ($d < 3)
                return "right now";
            //if less then minute
            if ($d < $minute)
                return floor($d) . " seconds ago";
            //if less then 2 minutes
            if ($d < $minute * 2)
                return "about 1 minute ago";
            //if less then hour
            if ($d < $hour)
                return floor($d / $minute) . " minutes ago";
            //if less then 2 hours
            if ($d < $hour * 2)
                return "about 1 hour ago";
            //if less then day
            if ($d < $day)
                return floor($d / $hour) . " hours ago";
            //if more then day, but less then 2 days
            if ($d > $day && $d < $day * 2)
                return "yesterday";
            //if less then year
            if ($d < $day * 365)
                return floor($d / $day) . " days ago";
            //else return more than a year
            return "over a year ago";
        }
    }

}
/**
 * Function for Framework
 */
require get_template_directory().'/framework/functions.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/* sample data */
add_action( 'admin_enqueue_scripts', 			'cshero_sample' );
function cshero_sample(){
	wp_enqueue_script('sample',get_template_directory_uri().'/admin/assets/js/sample.js');
	wp_enqueue_style('sample-css',get_template_directory_uri().'/admin/assets/css/sample.css');
}
add_action( 'wp_ajax_sample', 'prefix_ajax_sanple' );

function prefix_ajax_sanple(){
    locate_template(array('admin/sample/cs_importer.php'), true, true);
    installSample();
}
/**
 * Woo cusstom field.
 */
// Display Fields
add_action('woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields');
// Save Fields
add_action('woocommerce_process_product_meta', 'woo_add_custom_general_fields_save');


if(!function_exists('woo_add_custom_general_fields')){
    function woo_add_custom_general_fields()
    {
        global $post;
        $_spectrum_new_item =  get_post_meta($post->ID, '_spectrum_new_item', true);
        $_spectrum_best_sale = get_post_meta($post->ID, '_spectrum_best_sale', true);
        
        ob_start();
        ?>
        <div class="options_group">
        <?php
        woocommerce_wp_text_input(array(
            'id' => '_spectrum_new_item',
            'label' => __('New Text', 'wp_spectrum'),
            'value' => $_spectrum_new_item,
            'desc_tip' => 'true'
        ));
        woocommerce_wp_text_input(array(
            'id' => '_spectrum_best_sale',
            'label' => __('Bestseller Text', 'wp_spectrum'),
            'value' => $_spectrum_best_sale,
            'desc_tip' => 'true'
        ));
        ?>
        </div>
        <?php
        echo ob_get_clean();
    }
}
if(!function_exists('woo_add_custom_general_fields_save')){
    function woo_add_custom_general_fields_save($post_id)
    {
        update_post_meta($post_id, '_spectrum_new_item', isset($_POST['_spectrum_new_item']) ? $_POST['_spectrum_new_item'] : '');
        update_post_meta($post_id, '_spectrum_best_sale', isset($_POST['_spectrum_best_sale']) ? $_POST['_spectrum_best_sale'] : '' );
    }
}
?>
