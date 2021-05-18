<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package theme-name
 */

//Exclude node_modules folder from export
add_filter('ai1wm_exclude_content_from_export', function($exclude_filters) {
  $exclude_filters[] = 'themes/'.wp_get_theme()->template.'/node_modules';
  return $exclude_filters;
});

// ACF options
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}


// Custom mce classes and styles
function modify_mce_editor( $settings ) {
  $settings['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;';
  $style_formats = array(
    array(
        'title' => 'Lead-Text',
        'selector' => 'p',
        'classes' => 'text-lead',
    )
  );
  $settings['style_formats'] = json_encode( $style_formats );
  return $settings;
}
add_filter( 'tiny_mce_before_init',  'modify_mce_editor' );


// Callback function to insert 'styleselect' into the $buttons array
function theme_new_mce_buttons( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}
add_filter( 'mce_buttons', 'theme_new_mce_buttons' );


// Contact Form 7 remove styles
// add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
// function wps_deregister_styles() {
//     wp_deregister_style( 'contact-form-7' );
// }


// Contact Form 7 fix markup(remove p and br)
// add_filter('wpcf7_autop_or_not', '__return_false');


// hide posts
// function post_remove ()  {
//    remove_menu_page('edit.php');
// }
// add_action('admin_menu', 'post_remove');


// changing the logo link from wordpress.org to your site
function login_url() {  return home_url(); }
add_filter( 'login_headerurl', 'login_url' );

// changing the alt text on the logo to show your site name
function login_title() { return get_option( 'blogname' ); }
add_filter( 'login_headertitle', 'login_title' );


// Clean up wp_head
function cleanHeader() {
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
	remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
	remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
	remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
	remove_action( 'wp_head', 'index_rel_link' ); // index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post
	remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
}
add_action('init', 'cleanHeader');


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
// function _s_body_classes( $classes ) {
// 	// Adds a class of hfeed to non-singular pages.
// 	if ( ! is_singular() ) {
// 		$classes[] = 'hfeed';
// 	}

// 	// Adds a class of no-sidebar when there is no sidebar present.
// 	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
// 		$classes[] = 'no-sidebar';
// 	}

// 	return $classes;
// }
// add_filter( 'body_class', '_s_body_classes' );

// Removes Comments from admin menu
add_action( 'admin_menu', 'theme_remove_admin_menus' );
function theme_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}

// Removes Comments from post and pages
add_action('init', 'remove_comment_support', 100);
function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}

// Removes Comments from admin bar
function theme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'theme_admin_bar_render' );


// all posts on archive
// function custom_posts_per_page( $query ) {
//   if ( $query->is_archive() && $query->is_main_query() ) {
//       $query->set( 'posts_per_page', -1 );
//   }
// }
// add_action( 'pre_get_posts', 'custom_posts_per_page' );

// remove admin bar bump
function remove_admin_bar_bump() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_bar_bump');



// Remove Categories and Tags
// add_action('init', 'theme_remove_tax');
// function theme_remove_tax() {
//     register_taxonomy('category', array());
//     register_taxonomy('post_tag', array());
// }

// add_action('admin_menu', 'theme_remove_sub_menus');
// function theme_remove_sub_menus() {
//     remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
//     remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
// }
