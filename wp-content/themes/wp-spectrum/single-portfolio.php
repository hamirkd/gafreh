<?php
/**
 * The Template for displaying all single portfolio.
 *
 * @package cshero
 */
global $breadcrumb, $pagetitle;
get_header();
wp_enqueue_script( 'portfolio-details-fixed', get_template_directory_uri().'/js/portfolio.details.fixed.js',array(),'1.0.0');
?>
	<section id="primary" class="content-area<?php if($breadcrumb == '0'){ echo ' no_breadcrumb'; }; ?> <?php if(!$pagetitle){ echo ' no_page_title'; }; ?>">
        <div class="container">
			<main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="cs-team-wrap">
						<?php get_template_part( 'framework/templates/portfolio/single'); ?>
					</div>
				<?php endwhile; ?>
			</main><!-- #main -->
        </div>
	</section><!-- #primary -->
<?php get_footer(); ?>