<?php
/**
 * Initialize theme functions
 *
 * @package _s
 */

/**
 * Flush rewrite rules on theme activation
 */
function _s_flush_rewrite_rules() {
  flush_rewrite_rules();
}
add_action( 'after_switch_theme', '_s_flush_rewrite_rules' );

/**
 * Google analytics setup
 */
function _s_google_analytics() { ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '<?php echo get_theme_mod( 'analytics_id' ); ?>', 'auto');
    ga('send', 'pageview');
  </script>
<?php }
if ( get_theme_mod( 'analytics_id' ) ) {
  add_action( 'wp_head', '_s_google_analytics' );
}

/**
 * Strip &nbsp; from end of posts
 */
function _s_trim_trailing_whitespace( $content ) {
  $content = preg_replace( "/&nbsp;/", "☺", $content );
  $content = rtrim( $content, "☺" . " \t\n\r\0\x0B" );
  $content = preg_replace( "/☺/", "&nbsp;", $content );
  return $content;
}
add_filter( 'the_content', '_s_trim_trailing_whitespace', 0 );

/**
 * Yoast SEO meta box priority
 */
function _s_move_yoast_seo_meta() {
  return 'low';
}
add_filter( 'wpseo_metabox_prio', '_s_move_yoast_seo_meta' );

/**
 * Add SVG support and fix ACF thumbnail sizes
 */
function _s_add_svg_media_upload( $mimes ) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
function _s_fix_svg_thumbnails() {
  echo '<style>
    .acf-input img[src$=".svg"] {
      max-width: 150px;
      max-height: 150px;
    }
  </style>';
}
add_filter( 'upload_mimes', '_s_add_svg_media_upload' );
add_action( 'admin_head', '_s_fix_svg_thumbnails' );

/**
 * Get featured image URL
 */
function _s_get_feat_img_url( $size ) {
  // hat tip: http://goo.gl/fzHOaB
  $img_id = get_post_thumbnail_id();
  $img_array = wp_get_attachment_image_src( $img_id, $size );
  $img_url = $img_array[0];
  return $img_url;
}

/**
 * Get home page ID
 */
function _s_get_home_ID() {
  $home_id = get_option( 'page_on_front' );
  return $home_id;
}

/**
 * Get raw phone number
 */
function _s_get_phone_link( $phone ) {
  $phone = preg_replace( "/[^0-9,.]/", "", $phone );
  $link = "tel:" . $phone;
  return $link;
}
