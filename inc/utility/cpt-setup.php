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
 * CPT: Photos
 */
$photo_labels = array(
  'post_type_name' => 'photo',
  'singular' => 'Photo',
  'plural' => 'Photos',
  'slug' => 'photos'
);
$photo_options = array(
  'public' => true,
  'has_archive' => true,
  'supports' => array( 'revisions', 'thumbnail', 'title' ),
  'rewrite' => array( 'slug' => 'photos' ),
  'menu_icon' => 'dashicons-camera'
);
$photo = new CPT( $photo_labels, $photo_options );

/**
 * Tax: Photo Category
 */
$photo->register_taxonomy( array(
  'taxonomy_name' => 'photo_category',
  'singular' => 'Photo Category',
  'plural' => 'Photo Categories',
  'slug' => 'photo-category'
) );

/**
 * Featured image column
 */
$cpts = array( $photo );

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
    $cpt->populate_column( 'p_cat', function( $column, $post ) {
      echo get_the_term_list( $post->ID, 'photo_category', '', ', ', '' );
    } );
	}
}
