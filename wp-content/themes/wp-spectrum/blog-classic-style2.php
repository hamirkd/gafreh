<?php
/*
Template Name: Blog Classic Style 2
*/
get_header(); ?>
<?php global $wp_query, $post, $paged, $breadcrumb, $pagetitle; ?>
<?php $layout = cshero_generetor_layout();?>
    <section id="primary" class="content-area<?php if(!$pagetitle){ echo ' no_breadcrumb_page_blog'; }; ?> <?php if($breadcrumb == '0'){ echo ' no_breadcrumb_page'; }; ?> blog-classic-style2<?php echo esc_attr($layout->class); ?>">
        <div class="<?php if(get_post_meta($post->ID, 'cs_blog_layout', true) == "full"){ echo "no-container";} else { echo "container"; } ?>">
            <div class="row">
                <?php if($layout->left1_col):?>
                    <div class="left-wrap <?php echo esc_attr($layout->left1_col); ?>">
                         <div id="secondary" class="widget-area" role="complementary">
                            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                                <?php dynamic_sidebar($layout->left1_sidebar); ?>
                            </div>
                         </div>
                    </div>
                <?php endif; ?>
                <div class="content-wrap <?php echo esc_attr($layout->blog); ?>">
                    <main id="main" class="site-main" role="main">
                    <?php
                    
                    $cat_ids = get_post_meta(get_the_ID(), 'cs_page_category', true);
                    
                    $cat_ids = !empty($cat_ids) ? "&cat='.$cat_ids.'" : '';
                    
                    $wp_query->query('post_type=post'.$cat_ids.'&showposts='.get_option('posts_per_page').'&paged='.$paged);
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            get_template_part( 'framework/templates/blog/blogclassic2/blog', get_post_format());
                        endwhile;
                        cshero_paging_nav();
                    else :
                        get_template_part( 'framework/templates/blog/blogclassic2/blog', 'none' );
                    endif;
                    ?>
                    </main><!-- #main -->
                </div>
                <?php if($layout->right1_col):?>
                    <div class="right-wrap <?php echo esc_attr($layout->right1_col); ?>">
                         <div id="secondary" class="widget-area" role="complementary">
                            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                                <?php dynamic_sidebar($layout->right1_sidebar); ?>
                            </div>
                         </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section><!-- #primary -->
<?php get_footer(); ?>