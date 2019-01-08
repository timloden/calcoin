<?php
/**
 * Template Name: SERP
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package CAWeb_Standard
 */

get_header();
?>

<main id="main" class="site-main">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/search-results', 'page' );

	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
