<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

  <div class="container">
    <div class="row">

      <div class="col-xs-12 col-sm-8">
      	<div id="primary" class="content-area">
      		<main id="main" class="site-main" role="main">

      			<?php while ( have_posts() ) : the_post(); ?>

      				<?php get_template_part( 'templates/content', 'page' ); ?>

      			<?php endwhile; // End of the loop. ?>

      		</main><!-- #main -->
      	</div><!-- #primary -->
      </div>

      <div class="col-xs-12 col-sm-4">
        <?php get_sidebar(); ?>
      </div>

    </div><!-- .row -->
  </div><!-- .container -->

<?php get_footer(); ?>
