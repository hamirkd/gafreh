<?php

/**
 * add child styles.
 * 
 * @author FOX
 * @since 1.0.0
 */
function theme_enqueue_styles()
{
    $parent_style = 'cmssuperheroes-style';
    
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array(
        $parent_style
    ));
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

/**
 * load vc template dir.
 * 
 * @author FOX
 * @since 1.0.0
 */
if (function_exists("vc_set_template_dir")) {
    vc_set_template_dir(get_stylesheet_directory() . "/vc_templates/");
}