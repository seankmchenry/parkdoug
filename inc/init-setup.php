<?php
/**
 * Initialize theme setup
 *
 * @package _s
 */

/**
* Set environment variable
*/
if ( !defined( 'WP_ENV' ) ) {
  define( 'WP_ENV', 'production' );
}

/**
 * Set post revision number
 */
if ( !defined( 'WP_POST_REVISIONS' ) ) {
  define( 'WP_POST_REVISIONS', 5 );
}

/**
 * Clean up some header items
 */
// hat tip: http://gomakethings.com/remove-junk-from-the-wordpress-header
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link' );
remove_action( 'wp_head', 'rel_canonical', 10, 0 );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * Add custom image sizes
 *
 * @link http://codex.wordpress.org/Function_Reference/add_image_size
 */
//add_image_size( 'hero', 1600, 640, true );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/utility/customizer-fields.php';

/**
 * CPT Class
 */
//require get_template_directory() . '/inc/utility/cpt-setup.php';

/**
 * TGM Plugin Activation
 */
require get_template_directory() . '/inc/utility/tgm-setup.php';

/**
 * Advanced Custom Fields
 */
if ( WP_ENV !== 'development' ) {
  include get_template_directory() . '/inc/utility/acf-fields.php';

  if ( wp_get_current_user()->user_login !== 'sean' ) {
    define( 'ACF_LITE' , true );
  }
}
