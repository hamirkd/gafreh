<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cshero
 */
get_header(); ?>
<?php global $smof_data, $pagetitle; $blog_layout = cshero_generetor_blog_layout(); ?>
	<section id="primary" class="content-area<?php if(!$pagetitle){ echo ' no_breadcrumb'; }; ?><?php echo esc_attr($blog_layout->class); ?>">
        <div class="container">
            <div class="row">
            	<?php if ($blog_layout->left_col): ?>
                	<div class="left-wrap <?php echo esc_attr($blog_layout->left_col); ?>">
                		<?php get_sidebar(); ?>
                	</div>
                <?php endif; ?>
                <div class="content-wrap <?php echo esc_attr($blog_layout->blog); ?>">

                    <main id="main" class="site-main" role="main">

                        <?php if ( have_posts() ) :?>
							<?php if($smof_data["archive_heading"]): ?>
                            <header class="page-header">
                                <h1 class="page-title">
                                    <?php
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

                                    else :
                                        _e( 'Archives', 'wp_spectrum' );

                                    endif;
                                    ?>
                                </h1>
                                <?php
                                // Show an optional term description.
                                $term_description = term_description();
                                if ( ! empty( $term_description ) ) :
                                    printf( '<div class="taxonomy-description">%s</div>', $term_description );
                                endif;
                                ?>
                            </header><!-- .page-header -->
							<?php endif; ?>
                            <?php /* Start the Loop */ ?>
                            <?php if ( isset($smof_data['archive_post']) && ($smof_data['archive_post'] == 'blog-3-columns' || $smof_data['archive_post'] == 'blog-2-columns') ) : ?>
                            <div class="blog-columns-wrap clearfix"> 
                            <?php endif; ?> 

                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php
                                /* Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                if ( isset($smof_data['archive_post']) && $smof_data['archive_post'] == 'blog-3-columns') {
                                    get_template_part( 'framework/templates/blog/blog','columns3');
                                }
                                else if (isset($smof_data['archive_post']) && $smof_data['archive_post'] == 'blog-2-columns') {
                                    get_template_part( 'framework/templates/blog/blog','columns2');
                                }
                                else {
                                    get_template_part( 'framework/templates/blog/blog',get_post_format());
                                }
                                    
                                ?>

                            <?php endwhile; ?>
                            <?php if ( isset($smof_data['archive_post']) && ($smof_data['archive_post'] == 'blog-3-columns' || $smof_data['archive_post'] == 'blog-2-columns') ) : ?>
                                </div>
                            <?php endif; ?> 
                            <?php cshero_paging_nav(); ?>

                        <?php else : ?>

                            <?php get_template_part( 'framework/templates/blog/blog', 'none' ); ?>

                        <?php endif; ?>

                    </main><!-- #main -->

                </div>
                <?php if ($blog_layout->right_col): ?>
                	<div class="right-wrap <?php echo esc_attr($blog_layout->right_col); ?>">
                		<?php get_sidebar(); ?>
                	</div>
                <?php endif; ?>
            </div>
        </div>

	</section><!-- #primary -->
<?php get_footer(); ?>
