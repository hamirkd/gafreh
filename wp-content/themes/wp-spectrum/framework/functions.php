<?php
global $smof_data;
require get_template_directory().'/framework/templates/multiple-blog.php';
require get_template_directory().'/framework/dynamic/dynamic.php';
if(class_exists('CsCoreControl')){
    require_once 'metabox/page_template.php';
    require_once 'metabox/portfolio.php';
}
if(class_exists('Vc_Manager')){
    require get_template_directory().'/framework/vc_extra/vc_extra_params.php';
}
get_template_part('framework/widgets');
