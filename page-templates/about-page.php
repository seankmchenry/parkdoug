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

      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      	<div id="primary" class="content-area py3">
      		<main id="main" class="site-main" role="main">

      			<?php while ( have_posts() ) : the_post(); ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                  <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                  <?php /* Bio Photo */
                  if ( get_field( 'bio_photo' ) ) {
                    $photo = get_field( 'bio_photo' );
                    $p_url = $photo['sizes']['large'];
                    $p_alt = $photo['alt']; ?>

                    <img class="bio-image mb3" src="<?php echo $p_url; ?>" alt="<?php echo $p_alt; ?>">
                  <?php } ?>

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
