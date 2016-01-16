<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php //the_content(); ?>

						<?php /* Photos */
						$args = array(
							'post_type' => 'photo',
							'post_status' => 'publish',
							'posts_per_page' => -1, // add infinite scroll
							'orderby' => 'date',
							'order' => 'DESC'
						);
						$my_query = new WP_Query( $args );

						// are there posts?
						if ( $my_query->have_posts() ) { ?>
							<div class="grid-container">
								<div class="photo-section photo-section--home grid">
									<?php // loop through them if so
									while( $my_query->have_posts() ) {
										// set up the post
										$my_query->the_post();

										/* Image */
										if ( has_post_thumbnail() ) { ?>
											<a class="grid-item strip" href="<?php echo _s_get_feat_img_url( 'full' ); ?>" data-strip-group="strip" data-strip-caption="<?php the_title(); ?>">
												<?php the_post_thumbnail( 'medium' ); ?>
											</a>
										<?php }
									} ?>
								</div>
							</div>
						<?php }
						wp_reset_postdata(); ?>

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

<?php get_footer(); ?>
