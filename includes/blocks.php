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

		// ******************* XXX Block *******************************
		acf_register_block_type(array(
			'name'				=> 'XXX',
			'title'				=> __('XXX Block'),
			'description'		=> __('XXX block'),
      'render_callback'	=> 'theme_acf_block_render_callback',
			'icon'				=> 'align-center',
			'keywords'			=> array( 'XXX' ),
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
    'acf/xxx',
  );
}
add_filter('allowed_block_types', 'theme_allowed_block_types', 10, 2);
