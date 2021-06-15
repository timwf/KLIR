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
    'footer-menu' => esc_html__( 'Footer Menu' ),
    'footer-menu-more-info' => esc_html__( 'Footer Menu More Info' ),
    'footer-menu-social' => esc_html__( 'Social' ),
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

//woo support

function klir_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'klir_add_woocommerce_support' );

//remove woo sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


//ajax add to cart

// add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
// add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
        
// function woocommerce_ajax_add_to_cart() {

//             $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
//             $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
//             $variation_id = absint($_POST['variation_id']);
//             $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
//             $product_status = get_post_status($product_id);

//             if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

//                 do_action('woocommerce_ajax_added_to_cart', 'convert_to_sub_181=1_month&add-to-cart=181&action=xoo_wsc_add_to_cart');

//                 if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
//                     wc_add_to_cart_message(array($product_id => $quantity), true);
//                 }

//                 WC_AJAX :: get_refreshed_fragments();
//             } else {

//                 $data = array(
//                     'error' => true,
//                     'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

//                 echo wp_send_json($data);
//             }

//             wp_die();
//         }