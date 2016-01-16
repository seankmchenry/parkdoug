<?php
/**
 * Template Name: Full-Width Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

  <div class="container">
    <div class="row">

      <div class="col-xs-12">
      	<div id="primary" class="content-area">
      		<main id="main" class="site-main" role="main">

      			<?php while ( have_posts() ) : the_post(); ?>

      				<?php get_template_part( 'templates/content', 'page' ); ?>

      			<?php endwhile; // End of the loop. ?>

      		</main><!-- #main -->
      	</div><!-- #primary -->
      </div>

    </div><!-- .row -->
  </div><!-- .container -->

<?php get_footer(); ?>
