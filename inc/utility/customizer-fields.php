<?php
/**
 * Customizer Fields
 *
 * @package _s
 */

/**
 * Panels
 */
function _s_customizer_add_panels( $wp_customize ) {
  /* Client Setup */
  $wp_customize->add_panel( 'client_setup', array(
    'capability' => 'edit_theme_options',
    'title' => __( 'Client Setup', '_s' ),
  ) );
}
add_action( 'customize_register', '_s_customizer_add_panels' );

/**
 * Sections
 */
function _s_customizer_add_sections( $wp_customize ) {
  /* Appearance */
  $wp_customize->add_section( 'appearance', array(
    'title' => __( 'Appearance', '_s' ),
    'description' => __( 'Customize the appearance of the site here.', '_s' ),
    'panel' => 'client_setup',
    'priority' => 1
  ) );

  /* Contact Info */
  $wp_customize->add_section( 'contact_info', array(
    'title' => __( 'Contact Info', '_s' ),
    'description' => __( 'Contact information can be configured here.', '_s' ),
    'panel' => 'client_setup',
    'priority' => 2
  ) );

  /* Social Media */
  $wp_customize->add_section( 'social_media', array(
    'title' => __( 'Social Media', '_s' ),
    'description' => __( 'Social media links can be configured here.', '_s' ),
    'panel' => 'client_setup',
    'priority' => 3
  ) );

  /* Miscellaneous */
  $wp_customize->add_section( 'miscellaneous', array(
    'title' => __( 'Miscellaneous', '_s' ),
    'description' => __( 'Miscellaneous items can be configured here.', '_s' ),
    'panel' => 'client_setup',
    'priority' => 4
  ) );
}
add_action( 'customize_register', '_s_customizer_add_sections' );

/**
 * Fields
 */
function _s_customizer_add_fields( $wp_customize ) {
  /* Appearance */
  $wp_customize->add_setting( 'brand_logo' );
  $wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize, 'brand_logo', array(
      'label' => __( 'Brand Logo', '_s' ),
      'description' => __( 'Upload your brand\'s logo here.', '_s' ),
      'section' => 'appearance',
      'settings' => 'brand_logo'
    ) )
  );

  /* Contact Info */
  $wp_customize->add_setting( 'email_address' );
  $wp_customize->add_control( 'email_address', array(
    'label' => __( 'Email Address', '_s' ),
    'description' => __( 'Add the primary email address of the business.', '_s' ),
    'section' => 'contact_info',
    'type' => 'email'
  ) );
  $wp_customize->add_setting( 'phone_number' );
  $wp_customize->add_control( 'phone_number', array(
    'label' => __( 'Phone Number', '_s' ),
    'description' => __( 'Add the phone number of the business.', '_s' ),
    'section' => 'contact_info',
    'type' => 'text'
  ) );

  /* Social Media */
  $wp_customize->add_setting( 'facebook_url' );
  $wp_customize->add_control( 'facebook_url', array(
    'label' => __( 'Facebook URL', '_s' ),
    'description' => __( 'Add a link to your Facebook page.', '_s' ),
    'section' => 'social_media',
    'type' => 'url'
  ) );
  $wp_customize->add_setting( 'twitter_url' );
  $wp_customize->add_control( 'twitter_url', array(
    'label' => __( 'Twitter URL', '_s' ),
    'description' => __( 'Add a link to your Twitter page.', '_s' ),
    'section' => 'social_media',
    'type' => 'url'
  ) );

  /* Miscellaneous */
  $wp_customize->add_setting( 'analytics_id' );
  $wp_customize->add_control( 'analytics_id', array(
    'label' => __( 'Analytics ID', '_s' ),
    'description' => __( 'Add your Google Analytics ID here to enable page tracking (e.g. UA-000000-01).', '_s' ),
    'section' => 'miscellaneous',
    'type' => 'text'
  ) );
}
add_action( 'customize_register', '_s_customizer_add_fields' );