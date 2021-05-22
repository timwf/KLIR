<?php
/**
 * The template for displaying the front-page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package theme-name
 */

get_header(); ?>
		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();

			the_content();

			endwhile;

		else :

			echo "No posts found.";

		endif; ?>

<?php get_footer(); ?>
