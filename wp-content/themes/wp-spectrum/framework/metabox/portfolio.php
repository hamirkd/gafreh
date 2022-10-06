<?php
/**
 * add options
 */
add_action('portfolio_metabox_general_after', 'cshero_portfolio_metabox_general');
function cshero_portfolio_metabox_general(){
    cs_options(array(
        'id' => 'portfolio_text_intro',
        'label' => __('Intro Text','wp_spectrum'),
        'type' => 'textarea',
    ));
    cs_options(array(
        'id' => 'portfolio_about_project',
        'label' => __('About Project','wp_spectrum'),
        'type' => 'textarea',
    ));
    if(function_exists('get_categories_assoc')){
        $testimonial_options = get_categories_assoc('testimonial_category');
        cs_options(array(
            'id' => 'testimonial_category',
            'label' => __('Testimonial','wp_spectrum'),
            'type' => 'multiple',
            'options' => $testimonial_options
        ));       
        cs_options(array(
            'id' => 'testimonial_title_color',
            'label' => __('Testimonial Title Color','wp_spectrum'),
            'type' => 'color',
            'rgba' => false,
        ));
        cs_options(array(
            'id' => 'testimonial_title_font_size',
            'label' => __('Testimonial Title Font Size','wp_spectrum'),
            'type' => 'text',
            'placeholder' => ''
        ));
        cs_options(array(
            'id' => 'testimonial_description_color',
            'label' => __('Testimonial Description Color','wp_spectrum'),
            'type' => 'color',
            'rgba' => false,
        ));
        cs_options(array(
            'id' => 'testimonial_description_font_size',
            'label' => __('Testimonial Description Font Size','wp_spectrum'),
            'type' => 'text',
            'placeholder' => ''
        ));
        cs_options(array(
            'id' => 'testimonial_images_width',
            'label' => __('Testimonial Images Width','wp_spectrum'),
            'type' => 'text',
            'placeholder' => ''
        ));
        cs_options(array(
            'id' => 'testimonial_images_heihgt',
            'label' => __('Testimonial Images Height','wp_spectrum'),
            'type' => 'text',
            'placeholder' => ''
        ));
        $portfolio_options = get_categories_assoc('portfolio_category');
        cs_options(array(
            'id' => 'portfolio_category',
            'label' => __('Similar Projects','wp_spectrum'),
            'type' => 'multiple',
            'options' => $portfolio_options
        ));
    }
}
/**
 * create Tab
 */
add_action('portfolio_metabox_tab_title_after', 'cshero_portfolio_metabox_tab_title');
function cshero_portfolio_metabox_tab_title() {
    ?>
    <li class='cs-tab'><a href="#tabs-gallery"><i class="dashicons dashicons-images-alt2"></i> <?php echo _e('GALLERY', 'wp_spectrum');?></a></li>
    <?php
}
add_action('portfolio_metabox_tab_content_after', 'cshero_portfolio_metabox_tab_content');
function cshero_portfolio_metabox_tab_content() {
    ?>
    <div class='cs-tabs-panel clearfix'>
 		<div id="tabs-gallery">
 		<?php
 		cs_options(array(
     		'id' => 'portfolio_gallery',
     		'type' => 'editor',
 		));
 		?>
 		</div>
	</div>
    <?php
}