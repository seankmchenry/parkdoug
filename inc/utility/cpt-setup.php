<?php
/**
 * Custom Post Type Class Setup
 *
 * @package _s
 */

/**
 * Load the CPT class
 */
include_once get_template_directory() . '/inc/vendor/wp-custom-post-type-class/src/CPT.php';

// Dashicons for 'menu_icon' value can be found here:
// https://developer.wordpress.org/resource/dashicons

/**
 * CPT: Custom Posts
 */
$custom_post_labels = array(
  'post_type_name' => 'custom_post',
  'singular' => 'Custom Post',
  'plural' => 'Custom Posts',
  'slug' => 'custom-posts'
);
$custom_post_options = array(
  'public' => true,
  'has_archive' => false,
  'rewrite' => false,
  'supports' => array( 'editor', 'revisions', 'thumbnail', 'title' ),
  'menu_icon' => 'dashicons-format-quote'
);
$custom_post = new CPT( $custom_post_labels, $custom_post_options );

/**
 * Featured image column
 */
$cpts = array( $custom_post );

// add column to each $cpt setup variable
if ( $cpts ) {
	foreach ( $cpts as $cpt ) {
		$cpt->columns( array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Title' ),
			'feat_img' => __( 'Featured Image' ),
			'p_cat' => __( 'Category' ),
			'author' => __( 'Author' ),
			'date' => __( 'Date' )
		) );
		$cpt->populate_column( 'feat_img', function( $column, $post ) {
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( array( 64, 64 ) );
			}
		} );
	}
}
