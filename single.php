<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
