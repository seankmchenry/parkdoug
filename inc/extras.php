<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package _s
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function _s_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

  /* About Page */
  if ( is_page_template( 'page-templates/about-page.php' ) ) {
    $classes[] = 'about-page';
  }

  /* Non-grid pages */
  if ( !is_front_page() && !is_tax() ) {
    $classes[] = 'padded-content';
  }

	return $classes;
}
add_filter( 'body_class', '_s_body_classes' );
