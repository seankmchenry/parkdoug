<?php
/**
 * Template Name: About Page
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

              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                  <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                  <?php the_content(); ?>
                  <?php
                    wp_link_pages( array(
                      'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
                      'after'  => '</div>',
                    ) );
                  ?>
                </div><!-- .entry-content -->
              </article><!-- #post-## -->

      			<?php endwhile; // End of the loop. ?>

      		</main><!-- #main -->
      	</div><!-- #primary -->

      </div>
    </div><!-- .row -->
  </div><!-- .container -->

<?php get_footer(); ?>
