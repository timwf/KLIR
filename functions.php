<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme-name
*/

//* Base Functions
require_once('includes/helpers.php');

//* Functions which enhance the theme by hooking into WordPress.
require_once('includes/template-functions.php');

//* CPT
require_once('includes/custom-posts.php');

//* Custom Taxonomies
require_once('includes/custom-taxonomies.php');

//* Gutenberg blocks
require_once('includes/blocks.php');

//* Enqueue/dequeue your files
require_once('includes/enqueue.php');

//* After Setup
add_action( 'after_setup_theme', 'theme_after_setup_theme' );

function theme_after_setup_theme() {

	add_theme_support( 'html5' );

  add_theme_support('editor_style');
  add_editor_style('css/custom-editor-styles.css');

	add_post_type_support('page', 'excerpt');

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'menus' );

  add_theme_support( 'post-thumbnails' );

  remove_theme_support( 'core-block-patterns' );

	register_nav_menus( array(
    'header-menu' => esc_html__( 'Header Menu' ),
    'footer-menu' => esc_html__( 'Footer Menu' )
	) );

  remove_image_size('1536x1536');
  remove_image_size('2048x2048');
  update_option( 'medium_size_w', 768 );
  update_option( 'medium_size_h', 2500 );
  update_option( 'large_size_w', 1280 );
  update_option( 'large_size_h', 5000 );
  add_image_size('extra-large', 1536);
  add_image_size('mega-large', 1920);
}
