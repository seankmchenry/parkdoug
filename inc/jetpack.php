<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package _s
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 */
function _s_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => '_s_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
} // end function _s_jetpack_setup
add_action( 'after_setup_theme', '_s_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function _s_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'templates/content', get_post_format() );
	}
} // end function _s_infinite_scroll_render
