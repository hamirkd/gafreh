<?php
/*
Template Name: Blog Classic Style 1
*/
get_header();
global $wp_query,$paged, $post, $breadcrumb, $pagetitle; 
$cat_id = !empty($_REQUEST['cat_id']) ? $_REQUEST['cat_id'] : null;
?>
<?php $layout = cshero_generetor_layout();?>
    <section id="primary" class="content-area<?php if(!$pagetitle){ echo ' no_breadcrumb_page_blog'; }; ?> <?php if($breadcrumb == '0'){ echo ' no_breadcrumb_page'; }; ?> blog-classic-style1<?php echo esc_attr($layout->class); ?>">
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
                    <?php $categories = get_post_meta($post->ID, 'cs_page_category' ,true); ?>
                    <?php if($categories): $cats = explode(',', $categories); ?>
                        <div class="cshero-blog-category-lists">
                            <h3><?php _e('CATEGORY', 'wp_spectrum'); ?></h3>
                            <ul>
                                <?php foreach ($cats as $cat): ?>
                                <li<?php echo ($cat_id == $cat) ? ' class="current"' : ''; ?>><a href="<?php echo strpos(get_the_permalink(),'?') ? get_the_permalink().'&cat_id='.$cat : get_the_permalink().'?cat_id='.$cat ; ?>"><?php echo get_cat_name($cat); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                        <?php
                        $temp = $wp_query;
                        $wp_query= null;
                        $wp_query = new WP_Query();
                        if(!$cat_id){
                            $cat_id = $categories;
                        }
                        $wp_query->query('post_type=post&cat='.$cat_id.'&showposts='.get_option('posts_per_page').'&paged='.$paged);
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                                get_template_part( 'framework/templates/blog/small/blog',get_post_format());
                            endwhile;
                            cshero_paging_nav();
                        else :
                            get_template_part( 'framework/templates/blog/small/blog', 'none' );
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