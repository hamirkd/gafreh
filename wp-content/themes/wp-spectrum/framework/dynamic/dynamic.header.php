<?php
/**
 * Title: auto render
 * Author: Fox
 */
/**
 * edit options from page
 */
global $page_id;
cshero_re_render_options();

/**
 * google fonts
 */
for ($i = 2; $i <= 12; $i ++) {
    if ($smof_data["typography_selector_$i"]) {
        echo cshero_typography_render($smof_data["typography_$i"], $smof_data["typography_selector_$i"]);
    } elseif ($i > 3) {
        break;
    }
}
/**
 * body background
 */
if ($smof_data['background-body']) {
    echo cshero_backgrounds_render($smof_data["background-body"], 'body');
}
/**
 * header background
 */
if ($smof_data['background-header']) {
    $smof_data["background-header"]['background-alpha'] = $smof_data["header_transparent"];
    echo cshero_backgrounds_render($smof_data["background-header"], 'body #cshero-header');
}
if ($smof_data['background-header']) {
    $smof_data["background-header"]['background-alpha'] = $smof_data["header_transparent"];
    echo cshero_backgrounds_render($smof_data["background-header"], '.header-v2 #cshero-header.transparentFixed .container .row');
}
/**
 * page title $ bc
 */
if ($smof_data['background-page-title']) {
    echo cshero_backgrounds_render($smof_data["background-page-title"], '#cs-page-title-wrapper');
}
/**
 * bottom background
 */
if ($smof_data['background-bottom']) {
    echo cshero_backgrounds_render($smof_data["background-bottom"], '#cs-bottom-wrap');
}
/**
 * footer background
 */
if ($smof_data['background-footer-top']) {
    echo cshero_backgrounds_render($smof_data["background-footer-top"], '#footer-top');
}
?>
@media (min-width:993px){
    /* Menu First Level */
    #cshero-header ul.cshero-dropdown > li > a,
    #cshero-header .menu-pages .menu > ul > li > a,
    .cshero-hidden-sidebar .cshero-hidden-sidebar-btn a {
        color:<?php echo esc_attr($smof_data['menu_first_color']);?>;
    }
    #cshero-header ul.cshero-dropdown > li.current-menu-item > a,
    #cshero-header ul.cshero-dropdown > li.current-menu-ancestor > a,
    #cshero-header ul.cshero-dropdown > li > a.active,
    #cshero-header ul.cshero-dropdown > li > a:active{
        color:<?php echo esc_attr($smof_data['menu_active_first_color']);?>;
    }
}
@media (max-width:992px){
    /* Menu First Level */
    #cshero-header.transparentFixed .btn-navbar i:after,
    .csbody .cshero-menu-mobile a i:after {
        -webkit-box-shadow: -8px 2px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, -12px 9px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, 0 16px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>;
           -moz-box-shadow: -8px 2px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, -12px 9px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, 0 16px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>;
            -ms-box-shadow: -8px 2px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, -12px 9px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, 0 16px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>;
             -o-box-shadow: -8px 2px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, -12px 9px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, 0 16px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>;
                box-shadow: -8px 2px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, -12px 9px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, 0 16px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>;
    }
    /*** Hidden Sidebar and Menu Mobile ***/
    .cshero-hidden-sidebar .cshero-hidden-sidebar-btn a,
    .csbody .cshero-menu-mobile a {
        color:<?php echo esc_attr($smof_data['menu_first_color']);?>;
    }
}

/* Header fixed Left/Right */
<?php if($smof_data['arrow_parents_item_menu']) {?>
    .header-v4 .cshero-menu-left .cshero-dropdown li.menu-item-has-children > a:before{
        content:"\f067";
        font-family:"FontAwesome";
        font-size:10px;
    }
    .header-v4 .cshero-menu-left .cshero-dropdown li.menu-item-has-children > a:hover:before{
        content:"\f068";
    }
    .header-v4 .cshero-menu-left .cshero-dropdown li.menu-item-has-children > a:before{
        <?php echo esc_attr($smof_data['header_position']); ?>: 5px;
    }
<?php } ?>


<?php if ( $smof_data['header_headings_color'] ) { ?>
    .csbody.header-v4 #cshero-header .header-left-inner h1,
    .csbody.header-v4 #cshero-header .header-left-inner h2,
    .csbody.header-v4 #cshero-header .header-left-inner h3,
    .csbody.header-v4 #cshero-header .header-left-inner h4,
    .csbody.header-v4 #cshero-header .header-left-inner h5,
    .csbody.header-v4 #cshero-header .header-left-inner h6 {
        color: <?php echo  $smof_data['header_headings_color']; ?>;
    }
<?php } ?>

<?php if ( $smof_data['header_text_color'] ) { ?>
    .csbody.header-v4 #cshero-header .header-left-inner {
        color: <?php echo  $smof_data['header_text_color'] ?>;
    }
<?php } ?>

<?php if ( $smof_data['header_link_color'] ) { ?>
    .csbody.header-v4 #cshero-header .header-left-inner .cshero-header-fixed-content-widget a {
        color: <?php echo  $smof_data['header_link_color'] ?>;
    }
<?php } ?>

<?php if ( $smof_data['header_link_hover_color'] ) { ?>
    .csbody.header-v4 #cshero-header .header-left-inner .cshero-header-fixed-content-widget a:hover {
        color: <?php echo  $smof_data['header_link_hover_color'] ?>;
    }
<?php } ?>

@media (min-width: 993px) {
    body.header-v4 > div#wrapper {
        padding-<?php echo esc_attr($smof_data['header_position']); ?>:<?php echo esc_attr($smof_data['header_width']); ?>;
    }
    body.header-v4 .header-wrapper{
        <?php echo esc_attr($smof_data['header_position']); ?>:0;
    }
    body.header-v4 .cshero-header-fixed-content-widget{
        <?php echo esc_attr($smof_data['header_position']); ?>:0;
    }
}

/**** Start Page Title ****/
#cs-page-title-wrapper{
    padding: <?php echo esc_attr($smof_data['page_title_padding']); ?>;
    margin: <?php echo esc_attr($smof_data['page_title_margin']); ?>;
    <?php if($smof_data['page_title_border_top'] == '1'): ?>
        border-top: 1px solid <?php echo esc_attr($smof_data['page_title_border_color']); ?>;
    <?php endif; ?>
    <?php if($smof_data['page_title_border_bottom'] == '1'): ?>
        border-bottom: 1px solid <?php echo esc_attr($smof_data['page_title_border_color']); ?>;
    <?php endif; ?>
}
#cs-page-title-wrapper .title_bar .page-title{
    color: <?php echo esc_attr($smof_data['page_title_color']); ?>;
    font-size: <?php echo esc_attr($smof_data['title_bar_size']); ?>;
    line-height: <?php echo esc_attr($smof_data['title_bar_size']); ?>;

}
#cs-page-title-wrapper .title_bar, #cs-page-title-wrapper .title_bar .sub_header_text{
    text-align: <?php echo esc_attr($smof_data['page_title_bar_align']); ?>;
    color: <?php echo esc_attr($smof_data['page_subtitle_color']); ?>; 
}
/**** End Page Title ****/
/**** Start Breadcrumb ****/
#cs-breadcrumb-wrapper{
    text-align: <?php echo esc_attr($smof_data['breadcrumb_text_align']); ?>;
}
#cs-breadcrumb-wrapper, #cs-breadcrumb-wrapper span, #cs-breadcrumb-wrapper a,
#cs-breadcrumb-wrapper .cs-breadcrumbs a:after {
    color: <?php echo esc_attr($smof_data['breadcrumbs_text_color']) ?>;
}
<?php if($smof_data['breadcrumbs_item_padding']): ?>
    .csbody #cs-breadcrumb-wrapper .cs-breadcrumbs a,
    .csbody #cs-breadcrumb-wrapper .cs-breadcrumbs span {
        padding: <?php echo esc_attr($smof_data['breadcrumbs_item_padding']); ?>;
    }
<?php endif; ?>
<?php if($smof_data['breadcrumbs_separator']): ?>
    .csbody #cs-breadcrumb-wrapper .cs-breadcrumbs a:after {
        content: "\<?php echo esc_attr($smof_data['breadcrumbs_separator']); ?>";
    }
<?php endif; ?>
/**** End Breadcrumb ****/