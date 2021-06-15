<?php
/**
 * Register custom gutenberg blocks
 */

 function theme_acf_block_render_callback( $block ) {
  // convert name ("acf/testimonial") into path friendly slug ("testimonial")
  $slug = str_replace('acf/', '', $block['name']);

  // include a template part from within the "template-parts/block" folder
  if( file_exists( get_theme_file_path("/templates/blocks/{$slug}.php") ) ) {
    include( get_theme_file_path("/templates/blocks/{$slug}.php") );
  }
}

function theme_acf_blocks_init() {

	// check function exists
	if( function_exists('acf_register_block_type') ) {


    acf_register_block_type(array(
			'name'				=> 'hero',
			'title'				=> __('Hero'),
			'description'		=> __('Hero'),
      'render_callback'	=> 'theme_acf_block_render_callback',
      'render_template' => 'templates/blocks/hero.php',
			'icon'				=> 'align-center',
			'keywords'			=> array( 'hero'),
      'mode' 	=> 'edit',
    ));

    acf_register_block_type(array(
			'name'				=> 'page-hero',
			'title'				=> __('Page Hero'),
			'description'		=> __('Page Hero'),
      'render_callback'	=> 'theme_acf_block_render_callback',
      'render_template' => 'templates/blocks/page-hero.php',
			'icon'				=> 'align-center',
			'keywords'			=> array( 'page-hero'),
      'mode' 	=> 'edit',
    ));

    acf_register_block_type(array(
			'name'				=> 'featured-products',
			'title'				=> __('Featured Products'),
			'description'		=> __('Featured Products'),
      'render_callback'	=> 'theme_acf_block_render_callback',
      'render_template' => 'templates/blocks/featured-products.php',
			'icon'				=> 'align-center',
			'keywords'			=> array( 'Featured Products'),
      'mode' 	=> 'edit',
    ));

     acf_register_block_type(array(
			'name'				=> 'image-text',
			'title'				=> __('Image Text'),
			'description'		=> __('Image Text'),
      'render_callback'	=> 'theme_acf_block_render_callback',
      'render_template' => 'templates/blocks/image-text.php',
			'icon'				=> 'align-center',
			'keywords'			=> array( 'Featured Products'),
      'mode' 	=> 'edit',
    ));

    acf_register_block_type(array(
			'name'				=> 'reviews',
			'title'				=> __('Reviews'),
			'description'		=> __('Image Text'),
      'render_callback'	=> 'theme_acf_block_render_callback',
      'render_template' => 'templates/blocks/reviews.php',
			'icon'				=> 'align-center',
			'keywords'			=> array( 'reviews'),
      'mode' 	=> 'edit',
    ));

    acf_register_block_type(array(
			'name'				=> 'ticker-section',
			'title'				=> __('Ticker Section'),
			'description'		=> __('Ticker Section'),
      'render_callback'	=> 'theme_acf_block_render_callback',
      'render_template' => 'templates/blocks/ticker-section.php',
			'icon'				=> 'align-center',
			'keywords'			=> array( 'Ticker Section'),
      'mode' 	=> 'edit',
    ));

    acf_register_block_type(array(
			'name'				=> 'full-width-image',
			'title'				=> __('Full width image'),
			'description'		=> __('Full width image'),
      'render_callback'	=> 'theme_acf_block_render_callback',
      'render_template' => 'templates/blocks/full-width-image.php',
			'icon'				=> 'align-center',
			'keywords'			=> array( 'Full width image'),
      'mode' 	=> 'edit',
    ));

    acf_register_block_type(array(
			'name'				=> 'sustainabilty-logos',
			'title'				=> __('Sustainabilty Logos'),
			'description'		=> __('Sustainabilty Logos'),
      'render_callback'	=> 'theme_acf_block_render_callback',
      'render_template' => 'templates/blocks/sustainabilty-logos.php',
			'icon'				=> 'align-center',
			'keywords'			=> array( 'Sustainabilty Logos'),
      'mode' 	=> 'edit',
    ));

    acf_register_block_type(array(
			'name'				=> 'header-copy',
			'title'				=> __('Header Copy'),
			'description'		=> __('Header Copy'),
      'render_callback'	=> 'theme_acf_block_render_callback',
      'render_template' => 'templates/blocks/header-copy.php',
			'icon'				=> 'align-center',
			'keywords'			=> array( 'Header Copy'),
      'mode' 	=> 'edit',
    ));

    acf_register_block_type(array(
			'name'				=> 'image-with-text-box',
			'title'				=> __('Image With Text Box'),
			'description'		=> __('Image With Text Box'),
      'render_callback'	=> 'theme_acf_block_render_callback',
      'render_template' => 'templates/blocks/image-with-text-box.php',
			'icon'				=> 'align-center',
			'keywords'			=> array( 'Image With Text Box'),
      'mode' 	=> 'edit',
    ));


    
    
    

    

    
  }
}
add_action('acf/init', 'theme_acf_blocks_init');

// Remove the default gutenberg block
// https://rudrastyh.com/gutenberg/remove-default-blocks.html
function theme_allowed_block_types($allowed_blocks, $post) {

  // if(get_page_template_slug( $post ) === 'template-name.php') {
  //   return array();
  // }

  return array(
    'acf/hero',
    'acf/featured-products',
    'acf/image-text', 
    'acf/reviews',   
    'acf/ticker-section',   
    'acf/full-width-image',  
    'acf/page-hero',
    'acf/sustainabilty-logos',   
    'acf/full-width-image',  
    'acf/page-hero',
    'acf/header-copy',  
    'acf/image-with-text-box', 
    
    
  );
}
add_filter('allowed_block_types', 'theme_allowed_block_types', 10, 2);
