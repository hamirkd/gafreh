<?php
add_action('init', 'cshero_vc_extra_param');
/* add extra param for vc shortcodes */
function cshero_vc_extra_param()
{
    global $post;
    if (function_exists('vc_add_param')) {
        
            // Adding stripes to rows
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "heading" => __('Responsive utilities', 'wp_spectrum'),
                "param_name" => "row_responsive_large",
                "value" => array(
                    __("Hidden (Large devices)", 'wp_spectrum') => true
                ),
                "group" => "Responsive",
            ));
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "heading" => '',
                "param_name" => "row_responsive_medium",
                "value" => array(
                    __("Hidden (Medium devices)", 'wp_spectrum') => true
                ),
                "group" => "Responsive",
            ));
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "heading" => '',
                "param_name" => "row_responsive_small",
                "value" => array(
                    __("Hidden (Small devices)", 'wp_spectrum') => true
                ),
                "group" => "Responsive",
            ));
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "heading" => '',
                "param_name" => "row_responsive_extra_small",
                "value" => array(
                    __("Hidden (Extra small devices)", 'wp_spectrum') => true
                ),
                "group" => "Responsive",
                "description" => __("For faster mobile-friendly development, use these utility classes for showing and hiding content by device via media query.", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                "type" => "textfield",
                "heading" => __("ID Name for Navigation", 'wp_spectrum'),
                "param_name" => "dt_id",
                "group" => "One Page",
                "description" => __("If this row wraps the content of one of your sections, set an ID. You can then use it for navigation. Ex: work", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                "type" => "textfield",
                "heading" => __("Scroll Offset", 'wp_spectrum'),
                "param_name" => "dt_offset",
                "group" => "One Page",
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("SCROLL NEXT STEP", 'wp_spectrum'),
                "param_name" => "one_headding1",
                "value" => "",
                "group" => __("One Page", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Enable Row Scroll", 'wp_spectrum'),
                "param_name" => "enable_row_sc",
                "value" => array(
                    "" => "false"
                ),
                "group" => __("One Page", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                "type" => "textfield",
                "heading" => __("ID Name Scroll Top", 'wp_spectrum'),
                "param_name" => "row_top_sc",
                "group" => __("One Page", 'wp_spectrum'),
                "description" => __("", 'wp_spectrum'),
                "description" => __("Please add ID scroll top. Ex: #row1", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                "type" => "textfield",
                "heading" => __("ID Name Scroll Bottom", 'wp_spectrum'),
                "param_name" => "row_bottom_sc",
                "group" => __("One Page", 'wp_spectrum'),
                "description" => __("", 'wp_spectrum'),
                "description" => __("Please add ID scroll bottom. Ex: #row2", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Arrow color", 'wp_spectrum'),
                "param_name" => "row_ar_color",
                "value" => "",
                "description" => __("Select color for arrow.", 'wp_spectrum'),
                "group" => __("One Page", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "heading" => __("Row style", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "type",
                "value" => array(
                    "Default" => "",
                    "Custom" => "ww-custom",
                    "Background 2 Color" => "csrow-2color",
                    "Column No Padding" => "csrow-colno-padding ",
                    "Call To Action Custom" => "call-to-action-custom"
                ),
                "group" => "Style",
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Background Color Left", 'wp_spectrum'),
                "param_name" => "bg_color_left",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "csrow-2color"
                    ),
                    "not_empty" => true
                ),
                "group" => "Style",
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Background Color Right", 'wp_spectrum'),
                "param_name" => "bg_color_right",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "csrow-2color"
                    ),
                    "not_empty" => true
                ),
                "group" => "Style",
            ));
            vc_add_param('vc_row', array(
                'type' => 'dropdown',
                'heading' => "Full Width",
                'param_name' => 'full_width',
                'value' => array(
                    "No" => "false",
                    "Yes" => "true"
                ),
                'description' => "Only activated on main layout full width"
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Heading color", 'wp_spectrum'),
                "param_name" => "row_head_color",
                "value" => "",
                "description" => __("Select color for head.", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Link color", 'wp_spectrum'),
                "param_name" => "row_link_color",
                "value" => "",
                "description" => __("Select color for link.", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Link color hover", 'wp_spectrum'),
                "param_name" => "row_link_color_hover",
                "value" => "",
                "description" => __("Select color for link hover.", 'wp_spectrum')
            ));

            vc_add_param("vc_row_inner", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Same height", 'wp_spectrum'),
                "param_name" => "same_height",
                "value" => array(
                    "" => 'true'
                ),
                "description" => __("Set the same hight for all column in this row.", 'wp_spectrum')
            ));

            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Animation", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "animation",
                "value" => array(
                    "None" => "",
                    "Right To Left" => "right-to-left",
                    "Left To Right" => "left-to-right",
                    "Bottom To Top" => "bottom-to-top",
                    "Top To Bottom" => "top-to-bottom",
                    "Scale Up" => "scale-up",
                    "Fade In" => "fade-in"
                )
            ));

            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Enable Angle", 'wp_spectrum'),
                "param_name" => "enable_row_engle",
                "value" => array(
                    "" => "false"
                ),
                "group" => "Angle",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                )
            ));

            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Angle Position", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "engle_position",
                "value" => array(
                    "None" => "none",
                    "Top Left" => "engle-top-left",
                    "Top Right" => "engle-top-right",
                    "Bottom Right" => "engle-bottom-right",
                    "Bottom Left" => "engle-bottom-left"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Angle Height", 'wp_spectrum'),
                "param_name" => "height_engle",
                "value" => "60px",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Angle Color", 'wp_spectrum'),
                "param_name" => "engle_color",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    ),
                    "not_empty" => true
                ),
                "group" => "Angle",
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Angle Border Color", 'wp_spectrum'),
                "param_name" => "engle_border_color",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    ),
                    "not_empty" => true
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Angle Border Width", 'wp_spectrum'),
                "param_name" => "engle_border_width",
                "value" => "0",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Enable Angle Duplicated", 'wp_spectrum'),
                "param_name" => "enable_engle_duplicate",
                "value" => array(
                    "" => "false"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Angle Position Duplicated", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "engle_position_duplicate",
                "value" => array(
                    "None" => "none",
                    "Top Left" => "engle-top-left",
                    "Top Right" => "engle-top-right",
                    "Bottom Right" => "engle-bottom-right",
                    "Bottom Left" => "engle-bottom-left"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Angle Duplicated Height", 'wp_spectrum'),
                "param_name" => "engle_uplicated_height",
                "value" => "60px",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Angle Duplicated Color", 'wp_spectrum'),
                "param_name" => "engle_duplicated_color",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    ),
                    "not_empty" => true
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Angle Duplicated Border Color", 'wp_spectrum'),
                "param_name" => "engle_duplicated_border_color",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    ),
                    "not_empty" => true
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Angle Duplicated Border Width", 'wp_spectrum'),
                "param_name" => "engle_duplicated_border_width",
                "value" => "0",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Enable Angle Style 2", 'wp_spectrum'),
                "param_name" => "enable_engle_style2",
                "value" => array(
                    "" => "false"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Angle Position Style 2", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "engle_position_style2",
                "value" => array(
                    "None" => "none",
                    "Top Style1" => "engle-top-style1",
                    "Top Style2" => "engle-top-style2",
                    "Bottom Style1" => "engle-bottom-style1",
                    "Bottom Style2" => "engle-bottom-style2"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Angle Height Style 2", 'wp_spectrum'),
                "param_name" => "height_engle_style2",
                "value" => "60px",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Angle Color Style 2", 'wp_spectrum'),
                "param_name" => "engle_color_style2",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    ),
                    "not_empty" => true
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Enable Duplicated Angle Style 2", 'wp_spectrum'),
                "param_name" => "enable_engle_duplicated_style2",
                "value" => array(
                    "" => "false"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Angle Duplicated Position Style 2", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "engle_duplicated_position_style2",
                "value" => array(
                    "None" => "",
                    "Top Style1" => "engle-top-style1",
                    "Top Style2" => "engle-top-style2",
                    "Bottom Style1" => "engle-bottom-style1",
                    "Bottom Style2" => "engle-bottom-style2"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Angle Duplicated Height Style 2", 'wp_spectrum'),
                "param_name" => "engle_duplicated_height_style2",
                "value" => "60px",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Angle Duplicated Color Style 2", 'wp_spectrum'),
                "param_name" => "engle_duplicated_color_style2",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    ),
                    "not_empty" => true
                ),
                "group" => "Angle",
            ));


            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Enable parallax", 'wp_spectrum'),
                "param_name" => "enable_parallax",
                "value" => array(
                    "" => true
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Style",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Background ratio", 'wp_spectrum'),
                "param_name" => "parallax_speed",
                "value" => "0.8",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Style",
            ));

            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Overlay Color", 'wp_spectrum'),
                "param_name" => "bg_video_color",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                ),
                "group" => "Style",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Overlay Opacity", 'wp_spectrum'),
                "param_name" => "bg_video_transparent",
                "value" => "0",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                ),
                "group" => "Style",
            ));

            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Disable parallax mobile", 'wp_spectrum'),
                "param_name" => "disable_parallax_mobile",
                "value" => array(
                    "" => "false"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Style",
            ));

            vc_add_param ( "vc_row", array (
                    "type" => "attach_image",
                    "class" => "",
                    "heading" => __( "Video poster", 'wp_spectrum' ),
                    "param_name" => "poster",
                    "value" => "",
                    "dependency" => array(
                        "element" => "type",
                        "not_empty" => true
                    ),
                    "group" => "Style",
            ) );
            vc_add_param ( "vc_row", array (
                    "type" => "checkbox",
                    "class" => "",
                    "heading" => __( "Loop", 'wp_spectrum' ),
                    "param_name" => "loop",
                    "value" => array (
                            __( "Yes, please", 'wp_spectrum' )  => true,
                    ),
                    "dependency" => array(
                        "element" => "type",
                        "not_empty" => true
                    ),
                    "group" => "Style",
            ) );
            vc_add_param ( "vc_row", array (
                    "type" => "checkbox",
                    "class" => "",
                    "heading" => __( "Autoplay", 'wp_spectrum' ),
                    "param_name" => "autoplay",
                    "value" => array (
                            __( "Yes, please", 'wp_spectrum' )  => true,
                    ),
                    "dependency" => array(
                        "element" => "type",
                        "not_empty" => true
                    ),
                    "group" => "Style",
            ) );
            vc_add_param ( "vc_row", array (
                    "type" => "checkbox",
                    "class" => "",
                    "heading" => __( "Muted", 'wp_spectrum' ),
                    "param_name" => "muted",
                    "value" => array (
                            __( "Yes, please", 'wp_spectrum' )  => true,
                    ),
                    "dependency" => array(
                        "element" => "type",
                        "not_empty" => true
                    ),
                    "group" => "Style",
            ) );
            vc_add_param ( "vc_row", array (
                    "type" => "checkbox",
                    "class" => "",
                    "heading" => __( "Controls", 'wp_spectrum' ),
                    "param_name" => "controls",
                    "value" => array (
                            __( "Yes, please", 'wp_spectrum' )  => true,
                    ),
                    "dependency" => array(
                        "element" => "type",
                        "not_empty" => true
                    ),
                    "group" => "Style",
            ) );
            vc_add_param ( "vc_row", array (
                    "type" => "checkbox",
                    "class" => "",
                    "heading" => __( "Show Button Play", 'wp_spectrum' ),
                    "param_name" => "show_btn",
                    "value" => array (
                            __( "Yes, please", 'wp_spectrum' )  => true,
                    ),
                    "dependency" => array(
                        "element" => "type",
                        "not_empty" => true
                    ),
                    "group" => "Style",
            ) );
            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Video background (mp4)", 'wp_spectrum'),
                "param_name" => "bg_video_src_mp4",
                "value" => "",
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                ),
                "group" => "Style",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Video background (ogv)", 'wp_spectrum'),
                "param_name" => "bg_video_src_ogv",
                "value" => "",
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                ),
                "group" => "Style",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Video background (webm)", 'wp_spectrum'),
                "param_name" => "bg_video_src_webm",
                "value" => "",
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                ),
                "group" => "Style",
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("OPTION LAYER 1", 'wp_spectrum'),
                "param_name" => "lax_headding1",
                "value" => "",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Lax Layer 1", 'wp_spectrum'),
                "param_name" => "lax_layer1",
                "value" => "",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 1 Width', 'wp_spectrum'),
                'param_name' => 'lax_layer1_width',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'px,em,...', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 1 Height', 'wp_spectrum'),
                'param_name' => 'lax_layer1_height',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'px,em,...', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Lax Layer 1 Align", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "lax_layer1_align",
                "value" => array(
                    "Left Top" => "lax_left_top",
                    "Center Top" => "lax_center_top",
                    "Right Top" => "lax_right_top",
                    "Left Middle" => "lax_left_middle",
                    "Center Middle" => "lax_center_middle",
                    "Right Middle" => "lax_right_middle",
                    "Left Bottom" => "lax_left_bottom",
                    "Center Bottom" => "lax_center_bottom",
                    "Right Bottom" => "lax_right_bottom"
                ),
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 1 Position X', 'wp_spectrum'),
                'param_name' => 'lax_layer1_position_x',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 1 Position Y', 'wp_spectrum'),
                'param_name' => 'lax_layer1_position_y',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 1 Speed', 'wp_spectrum'),
                'param_name' => 'lax_layer1_speed',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'Time move default 5s', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 1 Move', 'wp_spectrum'),
                'param_name' => 'lax_layer1_move',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'Default 40 lax move -40 to 40 px', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("OPTION LAYER 2", 'wp_spectrum'),
                "param_name" => "lax_headding2",
                "value" => "",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Lax Layer 2", 'wp_spectrum'),
                "param_name" => "lax_layer2",
                "value" => "",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 2 Width', 'wp_spectrum'),
                'param_name' => 'lax_layer2_width',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'px,em,...', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 2 Height', 'wp_spectrum'),
                'param_name' => 'lax_layer2_height',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'px,em,...', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Lax Layer 2 Align", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "lax_layer2_align",
                "value" => array(
                    "Left Top" => "lax_left_top",
                    "Center Top" => "lax_center_top",
                    "Right Top" => "lax_right_top",
                    "Left Middle" => "lax_left_middle",
                    "Center Middle" => "lax_center_middle",
                    "Right Middle" => "lax_right_middle",
                    "Left Bottom" => "lax_left_bottom",
                    "Center Bottom" => "lax_center_bottom",
                    "Right Bottom" => "lax_right_bottom"
                ),
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 2 Position X', 'wp_spectrum'),
                'param_name' => 'lax_layer2_position_x',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 2 Position Y', 'wp_spectrum'),
                'param_name' => 'lax_layer2_position_y',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 2 Speed', 'wp_spectrum'),
                'param_name' => 'lax_layer2_speed',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'Time move default 5s', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 2 Move', 'wp_spectrum'),
                'param_name' => 'lax_layer2_move',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'Default 40 lax move -40 to 40 px', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("OPTION LAYER 3", 'wp_spectrum'),
                "param_name" => "lax_headding3",
                "value" => "",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Lax Layer 3", 'wp_spectrum'),
                "param_name" => "lax_layer3",
                "value" => "",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 3 Width', 'wp_spectrum'),
                'param_name' => 'lax_layer3_width',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'px,em,...', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 3 Height', 'wp_spectrum'),
                'param_name' => 'lax_layer3_height',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'px,em,...', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Lax Layer 3 Align", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "lax_layer3_align",
                "value" => array(
                    "Left Top" => "lax_left_top",
                    "Center Top" => "lax_center_top",
                    "Right Top" => "lax_right_top",
                    "Left Middle" => "lax_left_middle",
                    "Center Middle" => "lax_center_middle",
                    "Right Middle" => "lax_right_middle",
                    "Left Bottom" => "lax_left_bottom",
                    "Center Bottom" => "lax_center_bottom",
                    "Right Bottom" => "lax_right_bottom"
                ),
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 3 Position X', 'wp_spectrum'),
                'param_name' => 'lax_layer3_position_x',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 3 Position Y', 'wp_spectrum'),
                'param_name' => 'lax_layer3_position_y',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 3 Speed', 'wp_spectrum'),
                'param_name' => 'lax_layer3_speed',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'Time move default 5s', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 3 Move', 'wp_spectrum'),
                'param_name' => 'lax_layer3_move',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'Default 40 lax move -40 to 40 px', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("OPTION LAYER 4", 'wp_spectrum'),
                "param_name" => "lax_headding4",
                "value" => "",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Lax Layer 4", 'wp_spectrum'),
                "param_name" => "lax_layer4",
                "value" => "",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 4 Width', 'wp_spectrum'),
                'param_name' => 'lax_layer4_width',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'px,em,...', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 4 Height', 'wp_spectrum'),
                'param_name' => 'lax_layer4_height',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'px,em,...', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Lax Layer 4 Align", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "lax_layer4_align",
                "value" => array(
                    "Left Top" => "lax_left_top",
                    "Center Top" => "lax_center_top",
                    "Right Top" => "lax_right_top",
                    "Left Middle" => "lax_left_middle",
                    "Center Middle" => "lax_center_middle",
                    "Right Middle" => "lax_right_middle",
                    "Left Bottom" => "lax_left_bottom",
                    "Center Bottom" => "lax_center_bottom",
                    "Right Bottom" => "lax_right_bottom"
                ),
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 4 Position X', 'wp_spectrum'),
                'param_name' => 'lax_layer4_position_x',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 4 Position Y', 'wp_spectrum'),
                'param_name' => 'lax_layer4_position_y',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 4 Speed', 'wp_spectrum'),
                'param_name' => 'lax_layer4_speed',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'Time move default 5s', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 4 Move', 'wp_spectrum'),
                'param_name' => 'lax_layer4_move',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'Default 40 lax move -40 to 40 px', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("OPTION LAYER 5", 'wp_spectrum'),
                "param_name" => "lax_headding5",
                "value" => "",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Lax Layer 5", 'wp_spectrum'),
                "param_name" => "lax_layer5",
                "value" => "",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 5 Width', 'wp_spectrum'),
                'param_name' => 'lax_layer5_width',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'px,em,...', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 5 Height', 'wp_spectrum'),
                'param_name' => 'lax_layer5_height',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'px,em,...', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Lax Layer 5 Align", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "lax_layer5_align",
                "value" => array(
                    "Left Top" => "lax_left_top",
                    "Center Top" => "lax_center_top",
                    "Right Top" => "lax_right_top",
                    "Left Middle" => "lax_left_middle",
                    "Center Middle" => "lax_center_middle",
                    "Right Middle" => "lax_right_middle",
                    "Left Bottom" => "lax_left_bottom",
                    "Center Bottom" => "lax_center_bottom",
                    "Right Bottom" => "lax_right_bottom"
                ),
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 5 Position X', 'wp_spectrum'),
                'param_name' => 'lax_layer5_position_x',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 5 Position Y', 'wp_spectrum'),
                'param_name' => 'lax_layer5_position_y',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 5 Speed', 'wp_spectrum'),
                'param_name' => 'lax_layer5_speed',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'Time move default 5s', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 5 Move', 'wp_spectrum'),
                'param_name' => 'lax_layer5_move',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'Default 40 lax move -40 to 40 px', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("OPTION LAYER 6", 'wp_spectrum'),
                "param_name" => "lax_headding6",
                "value" => "",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Lax Layer 6", 'wp_spectrum'),
                "param_name" => "lax_layer6",
                "value" => "",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 6 Width', 'wp_spectrum'),
                'param_name' => 'lax_layer6_width',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'px,em,...', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 6 Height', 'wp_spectrum'),
                'param_name' => 'lax_layer6_height',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'px,em,...', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Lax Layer 6 Align", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "lax_layer6_align",
                "value" => array(
                    "Left Top" => "lax_left_top",
                    "Center Top" => "lax_center_top",
                    "Right Top" => "lax_right_top",
                    "Left Middle" => "lax_left_middle",
                    "Center Middle" => "lax_center_middle",
                    "Right Middle" => "lax_right_middle",
                    "Left Bottom" => "lax_left_bottom",
                    "Center Bottom" => "lax_center_bottom",
                    "Right Bottom" => "lax_right_bottom"
                ),
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 6 Position X', 'wp_spectrum'),
                'param_name' => 'lax_layer6_position_x',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 6 Position Y', 'wp_spectrum'),
                'param_name' => 'lax_layer6_position_y',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 6 Speed', 'wp_spectrum'),
                'param_name' => 'lax_layer6_speed',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'Time move default 5s', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 6 Move', 'wp_spectrum'),
                'param_name' => 'lax_layer6_move',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'Default 40 lax move -40 to 40 px', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("OPTION LAYER 7", 'wp_spectrum'),
                "param_name" => "lax_headding7",
                "value" => "",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Lax Layer 7", 'wp_spectrum'),
                "param_name" => "lax_layer7",
                "value" => "",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 7 Width', 'wp_spectrum'),
                'param_name' => 'lax_layer7_width',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'px,em,...', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 7 Height', 'wp_spectrum'),
                'param_name' => 'lax_layer7_height',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'px,em,...', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Lax Layer 7 Align", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "lax_layer7_align",
                "value" => array(
                    "Left Top" => "lax_left_top",
                    "Center Top" => "lax_center_top",
                    "Right Top" => "lax_right_top",
                    "Left Middle" => "lax_left_middle",
                    "Center Middle" => "lax_center_middle",
                    "Right Middle" => "lax_right_middle",
                    "Left Bottom" => "lax_left_bottom",
                    "Center Bottom" => "lax_center_bottom",
                    "Right Bottom" => "lax_right_bottom"
                ),
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 7 Position X', 'wp_spectrum'),
                'param_name' => 'lax_layer7_position_x',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 7 Position Y', 'wp_spectrum'),
                'param_name' => 'lax_layer7_position_y',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 7 Speed', 'wp_spectrum'),
                'param_name' => 'lax_layer7_speed',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'Time move default 5s', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 7 Move', 'wp_spectrum'),
                'param_name' => 'lax_layer7_move',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'Default 40 lax move -40 to 40 px', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("OPTION LAYER 8", 'wp_spectrum'),
                "param_name" => "lax_headding8",
                "value" => "",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Lax Layer 8", 'wp_spectrum'),
                "param_name" => "lax_layer8",
                "value" => "",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 8 Width', 'wp_spectrum'),
                'param_name' => 'lax_layer8_width',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'px,em,...', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 8 Height', 'wp_spectrum'),
                'param_name' => 'lax_layer8_height',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'px,em,...', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Lax Layer 8 Align", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "lax_layer8_align",
                "value" => array(
                    "Left Top" => "lax_left_top",
                    "Center Top" => "lax_center_top",
                    "Right Top" => "lax_right_top",
                    "Left Middle" => "lax_left_middle",
                    "Center Middle" => "lax_center_middle",
                    "Right Middle" => "lax_right_middle",
                    "Left Bottom" => "lax_left_bottom",
                    "Center Bottom" => "lax_center_bottom",
                    "Right Bottom" => "lax_right_bottom"
                ),
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 8 Position X', 'wp_spectrum'),
                'param_name' => 'lax_layer8_position_x',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 8 Position Y', 'wp_spectrum'),
                'param_name' => 'lax_layer8_position_y',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", 'wp_spectrum')
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 8 Speed', 'wp_spectrum'),
                'param_name' => 'lax_layer8_speed',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'Time move default 5s', 'wp_spectrum' )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 8 Move', 'wp_spectrum'),
                'param_name' => 'lax_layer8_move',
                "group" => __("Lax", 'wp_spectrum'),
                "description" => __ ( 'Default 40 lax move -40 to 40 px', 'wp_spectrum' )
            ));
        
        /* vc column */
        
            vc_add_param("vc_column", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __('Font Color', 'wp_spectrum'),
                "param_name" => "font_color",
                "description" => ''
            ));

            vc_add_param("vc_column", array(
                "type" => "checkbox",
                "heading" => __('Responsive utilities', 'wp_spectrum'),
                "param_name" => "column_responsive_large",
                "value" => array(
                    __("Hidden (Large devices)", 'wp_spectrum') => true
                )
            ));
            vc_add_param("vc_column", array(
                "type" => "checkbox",
                "heading" => '',
                "param_name" => "column_responsive_medium",
                "value" => array(
                    __("Hidden (Medium devices)", 'wp_spectrum') => true
                )
            ));
            vc_add_param("vc_column", array(
                "type" => "checkbox",
                "heading" => '',
                "param_name" => "column_responsive_small",
                "value" => array(
                    __("Hidden (Small devices)", 'wp_spectrum') => true
                )
            ));
            vc_add_param("vc_column", array(
                "type" => "checkbox",
                "heading" => '',
                "param_name" => "column_responsive_extra_small",
                "value" => array(
                    __("Hidden (Extra small devices)", 'wp_spectrum') => true
                ),
                "description" => __("For faster mobile-friendly development, use these utility classes for showing and hiding content by device via media query.", 'wp_spectrum')
            ));
            vc_add_param("vc_column", array(
                "type" => "checkbox",
                "heading" => 'Image Transition',
                "param_name" => "image_transition",
                "value" => array(
                    __("Yes", 'wp_spectrum') => true
                )
            ));
            vc_add_param("vc_column", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Animation", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "animation",
                "value" => array(
                    "None" => "",
                    "Right To Left" => "right-to-left",
                    "Left To Right" => "left-to-right",
                    "Bottom To Top" => "bottom-to-top",
                    "Top To Bottom" => "top-to-bottom",
                    "Scale Up" => "scale-up",
                    "Fade In" => "fade-in"
                )
            ));
            vc_add_param("vc_column_inner", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __('Font Color', 'wp_spectrum'),
                "param_name" => "font_color",
                "description" => ''
            ));
            vc_add_param("vc_column_inner", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Animation", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "animation",
                "value" => array(
                    "None" => "",
                    "Right To Left" => "right-to-left",
                    "Left To Right" => "left-to-right",
                    "Bottom To Top" => "bottom-to-top",
                    "Top To Bottom" => "top-to-bottom",
                    "Scale Up" => "scale-up",
                    "Fade In" => "fade-in"
                )
            ));
            vc_add_param("vc_column", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Text Align", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "text_align",
                "value" => array(
                    "None" => "",
                    "Inherit" => "inherit",
                    "Initial" => "initial",
                    "Justify" => "justify",
                    "Left" => "left",
                    "Right" => "right",
                    "Center" => "center",
                    "Start" => "start",
                    "End" => "end"
                )
            ));
            vc_add_param("vc_column", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Column Heading Style", 'wp_spectrum'),
                "admin_label" => true,
                "param_name" => "column_style",
                "value" => array(
                    "Default" => "no-style-col",
                    "Title Primary Color" => "title-preset1",
                    "Title Secondary Color" => "title-preset2",
                    "Title Feature Box" => "title-feature-box",
                    "Title and Subtitle" => "title-sub",
                    "Title Construction Style 1" => "title-construction style1",
                    "Title Construction Style 2 Line Bottom Fixed" => "title-construction style2",
                    "Title Construction Style 3 Line Bottom Mini" => "title-construction style3",
                    "Fixed Row Padding Mobile" => "cs-padding-mobile"
                ),
                "description" => __("Add some styles to column", 'wp_spectrum')
            ));
        
        // Pie chart
        
            vc_add_param("vc_pie", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Heading size", 'wp_spectrum'),
                "param_name" => "heading_size",
                "value" => array(
                    "Default" => "h4",
                    "Heading 1" => "h1",
                    "Heading 2" => "h2",
                    "Heading 3" => "h3",
                    "Heading 4" => "h4",
                    "Heading 5" => "h5",
                    "Heading 6" => "h6"
                ),
                "description" => 'Select your heading size for title.'
            ));
            vc_add_param("vc_pie", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __('Title Color', 'wp_spectrum'),
                "param_name" => "title_color",
                "description" => ''
            ));
            vc_add_param("vc_pie", array(
                'type' => 'textfield',
                'heading' => __('Pie icon', 'wp_spectrum'),
                'param_name' => 'icon',
                'description' => __('', 'wp_spectrum'),
                'value' => '',
                'admin_label' => true
            ));
            vc_add_param("vc_pie", array(
                'type' => 'textfield',
                'heading' => __('Icon Size', 'wp_spectrum'),
                'param_name' => 'icon_size',
                'description' => __('Font size of icon', 'wp_spectrum'),
                'value' => '24',
                'admin_label' => true
            ));
            vc_add_param("vc_pie", array(
                'type' => 'colorpicker',
                'heading' => __('Icon Color', 'wp_spectrum'),
                'param_name' => 'icon_color',
                'description' => __('', 'wp_spectrum'),
                'value' => '#888',
                'admin_label' => true
            ));
            vc_remove_param("vc_pie", "color");
            vc_add_param("vc_pie", array(
                'type' => 'colorpicker',
                'heading' => __('Bar color', 'wp_spectrum'),
                'param_name' => 'color',
                'value' => '#00c3b6', // $pie_colors,
                'description' => __('Select pie chart color.', 'wp_spectrum'),
                'admin_label' => true,
                'param_holder_class' => 'vc-colored-dropdown'
            ));
            vc_add_param("vc_pie", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Bar Width", 'wp_spectrum'),
                "param_name" => "pie_width",
                "value" => "12",
                "description" => __('', 'wp_spectrum')
            ));
            vc_add_param("vc_pie", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Description", 'wp_spectrum'),
                "param_name" => "desc",
                "value" => "",
                "description" => ""
            ));
            vc_add_param("vc_pie", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Style", 'wp_spectrum'),
                "param_name" => "style",
                "value" => array(
                    "Style 1" => "style1",
                    "Style 2" => "style2"
                ),
                "description" => __("Select style for pie.", 'wp_spectrum')
            ));
            vc_add_param("vc_pie", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Icon", 'wp_spectrum'),
                "param_name" => "icon",
                "value" => "",
                "description" => __('You can find icon class at here: <a target="_blank" href="http://fontawesome.io/icons/">"http://fontawesome.io/icons/</a>. For example, fa fa-heart', 'wp_spectrum')
            ));
        
        
        /* accordion */
        
            vc_add_param("vc_accordion_tab", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Icon", 'wp_spectrum'),
                "param_name" => "icon",
                "value" => "",
                "description" => __('You can find icon class at here: <a target="_blank" href="http://fontawesome.io/icons/">"http://fontawesome.io/icons/</a>. For example, fa fa-heart', 'wp_spectrum')
            ));
            vc_add_param("vc_accordion_tab", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Title Color", 'wp_spectrum'),
                "param_name" => "title_color",
                "description" => __('', 'wp_spectrum')
            ));
            vc_add_param("vc_accordion_tab", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Background Tab", 'wp_spectrum'),
                "param_name" => "background_tab",
                "description" => __('', 'wp_spectrum')
            ));
            vc_add_param("vc_accordion_tab", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Background Content", 'wp_spectrum'),
                "param_name" => "background_content",
                "description" => __('', 'wp_spectrum')
            ));
            vc_add_param("vc_accordion_tab", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Title Active Color", 'wp_spectrum'),
                "param_name" => "title_active_color",
                "description" => __('', 'wp_spectrum')
            ));
            vc_add_param("vc_accordion_tab", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Background Tab Active", 'wp_spectrum'),
                "param_name" => "background_tab_active",
                "description" => __('', 'wp_spectrum')
            ));
            vc_add_param("vc_accordion", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Item Margin Bottom", 'wp_spectrum'),
                "param_name" => "item_margin_bottom",
                "value" => '',
                "description" => __('margin bottom each accordion tab. Ex: 10px', 'wp_spectrum')
            ));
            vc_add_param("vc_accordion", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Item Border", 'wp_spectrum'),
                "param_name" => "item_border",
                "value" => '',
                "description" => __('Border of each accordion tab. Ex: 1px solid #444', 'wp_spectrum')
            ));
            vc_add_param("vc_accordion", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Title Align", 'wp_spectrum'),
                "param_name" => "title_align",
                "value" => array(
                    'Left' => 'left',
                    'Right' => 'right',
                    'Center' => 'center'
                ),
                "description" => __('', 'wp_spectrum')
            ));

        /* VC Button */
       
            vc_remove_param('vc_button', 'color');
            vc_remove_param('vc_button', 'icon');
            vc_remove_param('vc_button', 'size');
            vc_add_param("vc_button", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Button Type", 'wp_spectrum'),
                "param_name" => "type",
                "value" => array(
                    'Button Default' => 'btn btn-default',
                    'Button Primary' => 'btn btn-primary',
                    'Button Border' => 'btn btn-border',
                    'Button Default Alt' => 'btn btn-default btn-default-alt',
                    'Button Primary Alt' => 'btn btn-primary btn-primary-alt',
                    'Button Warning' => 'btn btn-warning',
                    'Button Danger' => 'btn btn-danger',
                    'Button Success' => 'btn btn-success',
                    'Button Info' => 'btn btn-info',
                    'Button Inverse' => 'btn btn-inverse'
                ),
                "description" => __('', 'wp_spectrum')
            ));
            $size_arr = array(
                __('Default', 'wp_spectrum') => '',
                __('Large', 'wp_spectrum') => 'btn-lg btn-large',
                __('Medium', 'wp_spectrum') => 'btn-md btn-medium',
                __('Small', 'wp_spectrum') => 'btn-sm btn-small',
                __('Mini', 'wp_spectrum') => "btn-xs btn-mini"
            );
            vc_add_param("vc_button", array(
                'type' => 'dropdown',
                'heading' => __('Size', 'wp_spectrum'),
                'param_name' => 'size',
                'value' => $size_arr,
                'description' => __('Button size.', 'wp_spectrum')
            ));
            vc_add_param("vc_button", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Button Align", 'wp_spectrum'),
                "param_name" => "button_align",
                "value" => array(
                    'None' => '',
                    'Left' => 'left',
                    'Right' => 'right'
                ),
                "description" => __('', 'wp_spectrum')
            ));
            vc_add_param("vc_button", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Button Block", 'wp_spectrum'),
                "param_name" => "button_block",
                "value" => array(
                    "" => "true"
                ),
                "description" => __("Yes, please.", 'wp_spectrum')
            ));
            vc_add_param("vc_button", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Button icon", 'wp_spectrum'),
                "param_name" => "button_icon",
                "value" => '',
                "description" => __('Please get icon Font Awesome. Ex: fa-home', 'wp_spectrum')
            ));
        
        
            vc_add_param("vc_tab", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Icon", 'wp_spectrum'),
                "param_name" => "icon_title",
                "value" => "",
                "description" => ""
            ));
        
        /*
         * Contact form-7
         */
        
            vc_add_param("contact-form-7", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Contact Style", 'wp_spectrum'),
                "param_name" => "html_class",
                "value" => array(
                    'Style 1' => 'contact-style-1',
                    'Style 2' => 'contact-style-2'
                ),
                "description" => ""
            ));
        
    }
}

vc_remove_element ( "vc_cta_button2" );
vc_remove_element ( "vc_button2" );
// intergrate VC
cs_integrateWithVC();
function cs_integrateWithVC() {
    $vc_is_wp_version_3_6_more = version_compare ( preg_replace ( '/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo ( 'version' ) ), '3.6' ) >= 0;
    /*
     * Tabs ----------------------------------------------------------
     */
    $tab_id_1 = time () . '-1-' . rand ( 0, 100 );
    $tab_id_2 = time () . '-2-' . rand ( 0, 100 );
    vc_map ( array (
            "name" => __ ( 'Tabs', 'js_composer' ),
            'base' => 'vc_tabs',
            'show_settings_on_create' => false,
            'is_container' => true,
            'icon' => 'icon-wpb-ui-tab-content',
            'category' => __ ( 'Content', 'js_composer' ),
            'description' => __ ( 'Tabbed content', 'js_composer' ),
            'params' => array (
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Widget title', 'js_composer' ),
                            'param_name' => 'title',
                            'description' => __ ( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' )
                    ),
                    array (
                            'type' => 'dropdown',
                            'heading' => __ ( 'Auto rotate tabs', 'js_composer' ),
                            'param_name' => 'interval',
                            'value' => array (
                                    __ ( 'Disable', 'js_composer' ) => 0,
                                    3,
                                    5,
                                    10,
                                    15
                            ),
                            'std' => 0,
                            'description' => __ ( 'Auto rotate tabs each X seconds.', 'js_composer' )
                    ),
                    array (
                            'type' => 'colorpicker',
                            'heading' => __ ( 'Title Font Color', 'js_composer' ),
                            'param_name' => 'title_font_color',
                            'std' => '#444',
                            'description' => __ ( '', 'js_composer' )
                    ),
                    array (
                            'type' => 'colorpicker',
                            'heading' => __ ( 'Title Font Color Hover', 'js_composer' ),
                            'param_name' => 'title_font_color_hover',
                            'std' => '#444',
                            'description' => __ ( '', 'js_composer' )
                    ),
                    array (
                            'type' => 'colorpicker',
                            'heading' => __ ( 'Tab Border Color', 'js_composer' ),
                            'param_name' => 'tab_border_color',
                            'std' => '#444',
                            'description' => __ ( '', 'js_composer' )
                    ),
                    array (
                            'type' => 'colorpicker',
                            'heading' => __ ( 'Tab Border Color Active', 'js_composer' ),
                            'param_name' => 'tab_border_color_active',
                            'std' => '#444',
                            'description' => __ ( '', 'js_composer' )
                    ),
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Extra class name', 'js_composer' ),
                            'param_name' => 'el_class',
                            'description' => __ ( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
                    ),
                    array (
                            'type' => 'dropdown',
                            'param_name' => 'style',
                            'heading' => __ ( 'Style', 'js_composer' ),
                            'value' => array (
                                    "Style 1" => "style1",
                                    "Style 2" => "style2",
                                    "Style 3" => "style3",
                                    "Style 4" => "style4"

                            ),
                            'std' => 'style1',
                            'description' => __ ( '', 'js_composer' )
                    )
            ),
            'custom_markup' => '
    <div class="wpb_tabs_holder wpb_holder vc_container_for_children">
    <ul class="tabs_controls">
    </ul>
    %content%
    </div>',
            'default_content' => '
    [vc_tab title="' . __ ( 'Tab 1', 'js_composer' ) . '" tab_id="' . $tab_id_1 . '"][/vc_tab]
    [vc_tab title="' . __ ( 'Tab 2', 'js_composer' ) . '" tab_id="' . $tab_id_2 . '"][/vc_tab]
    ',
            'js_view' => $vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35'
    ) );
    /*
     * Call to Action Button ----------------------------------------------------------
     */
    $target_arr = array (
            __ ( 'Same window', 'js_composer' ) => '_self',
            __ ( 'New window', 'js_composer' ) => "_blank"
    );
    $button_type = array (
            __ ( 'Button Default', 'js_composer' ) => 'btn-default',
            __ ( 'Button Primary', 'js_composer' ) => 'btn-primary',
            __ ( 'Button White', 'js_composer' ) => 'btn-primary btn-white'
    );
    $size_arr = array (
            __ ( 'Regular size', 'js_composer' ) => '',
            __ ( 'Large', 'js_composer' ) => 'btn-large',
            __ ( 'Small', 'js_composer' ) => 'btn-small',
            __ ( 'Mini', 'js_composer' ) => "btn-mini"
    );
    vc_map ( array (
            'name' => __ ( 'Call to Action Button', 'js_composer' ),
            'base' => 'vc_cta_button',
            'icon' => 'icon-wpb-call-to-action',
            'category' => __ ( 'Content', 'js_composer' ),
            'description' => __ ( 'Catch visitors attention with CTA block', 'js_composer' ),
            'params' => array (
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Icon', 'js_composer' ),
                            'param_name' => 'call_icon',
                            'value' => __ ( '', 'js_composer' ),
                            'description' => __ ( 'Font Awesome.', 'js_composer' )
                    ),
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Icon size', 'js_composer' ),
                            'param_name' => 'call_icon_size',
                            'value' => __ ( '', 'js_composer' ),
                            'description' => __ ( 'Icon on font size px.', 'js_composer' )
                    ),
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Icon color', 'js_composer' ),
                            'param_name' => 'call_icon_color',
                            'value' => __ ( '', 'js_composer' ),
                            'description' => __ ( 'Icon on color.', 'js_composer' )
                    ),
                    array (
                            'type' => 'textarea',
                            'admin_label' => true,
                            'heading' => __ ( 'Text', 'js_composer' ),
                            'param_name' => 'call_text',
                            'value' => __ ( 'Click edit button to change this text.', 'js_composer' ),
                            'description' => __ ( 'Enter your content.', 'js_composer' )
                    ),
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Text on the font size', 'js_composer' ),
                            'param_name' => 'call_text_font_size',
                            'value' => __ ( '', 'js_composer' ),
                            'description' => __ ( 'Text on font size px.', 'js_composer' )
                    ),
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Text on the color', 'js_composer' ),
                            'param_name' => 'call_text_color',
                            'value' => __ ( '', 'js_composer' ),
                            'description' => __ ( 'Text on color.', 'js_composer' )
                    ),
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Text on the button', 'js_composer' ),
                            'param_name' => 'title',
                            'value' => __ ( 'Text on the button', 'js_composer' ),
                            'description' => __ ( 'Text on the button.', 'js_composer' )
                    ),
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'URL (Link)', 'js_composer' ),
                            'param_name' => 'href',
                            'description' => __ ( 'Button link.', 'js_composer' )
                    ),
                    array (
                            'type' => 'dropdown',
                            'heading' => __ ( 'Target', 'js_composer' ),
                            'param_name' => 'target',
                            'value' => $target_arr,
                            'dependency' => array (
                                    'element' => 'href',
                                    'not_empty' => true
                            )
                    ),
                    array (
                            'type' => 'dropdown',
                            'heading' => __ ( 'Button Type ', 'js_composer' ),
                            'param_name' => 'button_type',
                            'value' => $button_type,
                            'description' => __ ( 'Button Type.', 'js_composer' ),
                            'param_holder_class' => 'vc-button-type-dropdown'
                    ),
                    array (
                            'type' => 'dropdown',
                            'heading' => __ ( 'Button size', 'js_composer' ),
                            'param_name' => 'size',
                            'value' => $size_arr,
                            'description' => __ ( 'Button size.', 'js_composer' )
                    ),
                    array (
                            'type' => 'dropdown',
                            'heading' => __ ( 'Button align', 'js_composer' ),
                            'param_name' => 'position',
                            'value' => array (
                                    __ ( 'Align right', 'js_composer' ) => 'cs_align_right',
                                    __ ( 'Align left', 'js_composer' ) => 'cs_align_left'
                            ),
                            'description' => __ ( 'Select button alignment.', 'js_composer' )
                    ),
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Extra class name', 'js_composer' ),
                            'param_name' => 'el_class',
                            'description' => __ ( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
                    )
            ),
            'js_view' => 'VcCallToActionView'
    ) );
}