<?php global $smof_data, $post;
    $c_pageID = null;
    if($post){
        $c_pageID = $post->ID;
    }
    /* object menu */
    $menus = wp_get_nav_menus();
    /* array menu id */
    $menus_id = array();
    if(!empty($menus)){
        foreach ($menus as $menu){
            $menus_id[] = $menu->term_id;
        }
    }
    /* menu location */
    $menu_locations = get_nav_menu_locations();
    $main_navigation = null;
    $sticky_navigation = null;
    if(!empty($menu_locations)){
        if(isset($menu_locations['main_navigation'])){
            $main_navigation = $menu_locations['main_navigation'];
        }
        if(isset($menu_locations['sticky_navigation'])){
            $sticky_navigation = $menu_locations['sticky_navigation'];
        }
    }
?>
<?php if(isset($smof_data['enable_header']) && $smof_data['enable_header']){ ?>
<div id="header-sticky" class="sticky-header header-v2">
    <div class="<?php echo ($smof_data['sticky_header_full_width'])?'no-container':'container';?>">
        <div class="row">
            <div class="cshero-logo logo-sticky col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo ''.$smof_data['logo_header_sticky']['url']; ?>" alt="<?php bloginfo('name'); ?>" class="sticky-logo" style="height: <?php echo esc_attr($smof_data["header_sticky_logo_max_height"]); ?>" />
                </a>
            </div>
            <div class="sticky-menu-wrap col-xs-6 col-sm-6 col-md-9 col-lg-9">
                <div class="<?php echo ''.$smof_data["menu_position"]; ?> clearfix">
                    
                    <?php if(isset($smof_data['enable_hidden_sidebar']) && $smof_data['enable_hidden_sidebar']){ ?>
                        <div class="cshero-header-content-widget cshero-hidden-sidebar right">
                            <div class="cshero-hidden-sidebar-btn <?php if(isset($smof_data['hidden_sidebar_text']) && $smof_data['hidden_sidebar_text']){ echo 'hidden-sidebar-text'; } ?>">
                                <a href="#">
                                    <span class="<?php echo esc_attr($smof_data["hidden_sidebar_icon"]); ?> cs_open">
                                        <?php if(isset($smof_data['hidden_sidebar_text']) && $smof_data['hidden_sidebar_text']){ ?>  
                                            <i><?php echo esc_attr($smof_data["hidden_sidebar_text"]); ?></i>
                                        <?php } ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    
                    <div class="cshero-header-content-widget cshero-menu-mobile hidden-lg hidden-md right">
                        <div class="cshero-header-content-widget-inner">
                            <a class="btn-navbar" data-toggle="collapse" data-target="#cshero-main-menu-mobile" href="#" ><i class=""></i></a>
                        </div>
                    </div>

                    <nav id="sticky-nav-wrap" class="sticky-menu cs_mega_menu nav-holder cshero-menu-dropdown cshero-mobile right">
                        <?php
                        $megamenu = null;
                        if(class_exists('HeroMenuWalker')){
                            $megamenu = new HeroMenuWalker();
                        }
                        $custom_sticky_navigation = get_post_meta($c_pageID, 'cs_sticky_navigation', true);
                        if (in_array($sticky_navigation, $menus_id) || in_array($custom_sticky_navigation, $menus_id)) {
                            echo '<ul class="cshero-dropdown main-menu sticky-nav menu-item-padding">';
                            wp_nav_menu(array('theme_location' => 'sticky_navigation','menu'=>$custom_sticky_navigation, 'depth' => 5, 'container' => false, 'menu_id' => 'nav', 'items_wrap' => '%3$s', 'walker'=>$megamenu));
                            echo '</ul>';
                        } elseif (in_array($main_navigation, $menus_id)) {
                            echo '<ul class="cshero-dropdown sticky-nav menu-item-padding">';
                            wp_nav_menu(array('theme_location' => 'main_navigation', 'depth' => 5, 'container' => false, 'menu_id' => 'nav', 'items_wrap' => '%3$s', 'walker'=>$megamenu));
                            echo '</ul>';
                        } elseif (empty($menus_id)) {
                            echo '<div class="menu-pages">';
                            wp_nav_menu(array('depth' => 5, 'container' => false, 'menu_id' => 'nav', 'items_wrap' => '%3$s'));
                            echo '</div>';
                        } else {
                            echo '<ul class="cshero-dropdown sticky-nav menu-item-padding">';
                            wp_nav_menu(array('depth' => 5, 'container' => false, 'menu_id' => 'nav', 'items_wrap' => '%3$s', 'walker'=>$megamenu));
                            echo '</ul>';
                        }
                        ?>
                    </nav>
                </div>
            </div>
            <div id="cshero-sticky-menu-mobile" class="collapse navbar-collapse cshero-mmenu"></div>
        </div>
    </div>
</div>
<?php } ?> 