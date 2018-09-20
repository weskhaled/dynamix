<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/roots-translations
  load_theme_textdomain('roots', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'roots')
  ));

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size( 800, 600, array( 'center', 'center'));
  add_image_size( 'prt-nav-thumb', 200,140,  array( 'center', 'center') );
  add_image_size( 'prt-slider-img', 960,9999 ,  false );
  add_image_size( 'prt-square', 330,250 ,  true );
	
  add_image_size( 'blog-thumb', 740,420,  array( 'center', 'center') );
  add_image_size( 'blog-post-gallery', 760,350,  array( 'center', 'center') );

  add_image_size('slider_img_preview', 210, 120, array( 'center', 'center'));
  add_image_size( 'slider_nav_thumb', 200,140,  array( 'center', 'center') );
  add_image_size('slider_img_large', 960, 640, array( 'center', 'center'));
  add_image_size( 'gall-square', 320,300 ,  true );
	
  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', array('caption', 'comment-form', 'comment-list'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'roots_setup');

/**
 * Register sidebars
 */
function roots_widgets_init() {
  register_sidebar(array(
    'name'          => __('Primary', 'roots'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));

  register_sidebar(array(
    'name'          => __('Footer Col 1', 'roots'),
    'id'            => 'sidebar-footer-col-1',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4 class="all-caps">',
    'after_title'   => '</h4>',
  ));

  register_sidebar(array(
    'name'          => __('Footer Col 2', 'roots'),
    'id'            => 'sidebar-footer-col-2',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4 class="all-caps">',
    'after_title'   => '</h4>',
  ));

  register_sidebar(array(
    'name'          => __('Footer Col 3', 'roots'),
    'id'            => 'sidebar-footer-col-3',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4 class="all-caps">',
    'after_title'   => '</h4>',
  ));
  register_sidebar(array(
    'name'          => __('Footer Col 4', 'roots'),
    'id'            => 'sidebar-footer-col-4',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4 class="all-caps">',
    'after_title'   => '</h4>',
  ));
  register_sidebar(array(
    'name'          => __('Sub Footer Text', 'roots'),
    'id'            => 'sub-footer-text',
    'before_widget' => '<div class="pull-left widget %1$s %2$s">',
    'after_widget'  => '</div>',
  ));
}
add_action('widgets_init', 'roots_widgets_init');
