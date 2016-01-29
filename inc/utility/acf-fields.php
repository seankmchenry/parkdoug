<?php
/**
 * ACF fields export file
 *
 * @package _s
 */

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_about-page-fields',
    'title' => 'About Page Fields',
    'fields' => array (
      array (
        'key' => 'field_5659e400bfc50',
        'label' => 'Bio Photo',
        'name' => 'bio_photo',
        'type' => 'image',
        'instructions' => 'Upload a photo to use as a bio photo.',
        'required' => 1,
        'save_format' => 'object',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'page-templates/about-page.php',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => 'acf_page-fields',
    'title' => 'Page Fields',
    'fields' => array (
      array (
        'key' => 'field_56abc084b8376',
        'label' => 'Hide Title?',
        'name' => 'hide_title',
        'type' => 'true_false',
        'instructions' => 'Check this box to hide the page\'s title.',
        'message' => '',
        'default_value' => 0,
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'page',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}
