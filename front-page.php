<?php
/**
 * Default front page
 *
 * @package CAWeb_Standard
 */
get_header();
?>
<!-- blank home page -->

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'page' );

	endwhile; // End of the loop.
	?>

<?php
get_footer();
