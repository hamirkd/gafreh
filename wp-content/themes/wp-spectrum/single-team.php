<?php
/**
 * The Template for displaying all single team.
 *
 * @package cshero
 */
global $breadcrumb, $pagetitle;
get_header(); ?>
	<section id="primary" class="content-area<?php if($breadcrumb == '0'){ echo ' no_breadcrumb'; }; ?> <?php if(!$pagetitle){ echo ' no_page_title'; }; ?>">
        <div class="container">
			<main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="cs-team-wrap clearfix">
						<?php get_template_part( 'framework/templates/team/single'); ?>
					</div>
				<?php endwhile; ?>
			</main><!-- #main -->
        </div>
	</section><!-- #primary -->
<?php get_footer(); ?>