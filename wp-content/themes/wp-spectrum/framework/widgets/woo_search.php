<?php

add_action('widgets_init', 'register_woo_search_widget');

function register_woo_search_widget() {
    register_widget('Woo_Search_Widget');
}

class Woo_Search_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'woo_search_widget', // Base ID
            __('Woo Search', 'wp_spectrum'), // Name
            array('description' => __('Search Product', 'wp_spectrum'),) // Args
        );
    }
    
    function widget($args, $instance) {
        global $wpdb, $wp;
        
        if ( '' == get_option( 'permalink_structure' ) ) {
            $form_action = remove_query_arg( array( 'page', 'paged' ), add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) );
        } else {
            $form_action = preg_replace( '%\/page/[0-9]+%', '', home_url( $wp->request ) );
        }
        
        ?>
        <div class="widget_searchform_content">
            <form method="get" action="<?php echo esc_url( $form_action ); ?>">
                <input type="hidden" name="post_type" value="product">
                <input type="text" class="cshero-search-input" name="s" value="<?php echo get_search_query(); ?>">
                <input type="submit" value="Search">
            </form>
        </div>
        <?php
    }
    
    function update( $new_instance, $old_instance ) {
        
    }
    
    function form( $instance ) {
        
    }
}