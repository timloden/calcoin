<?php
/**
 * The template for displaying all single courses
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CAWeb_Standard
 */

get_header();
$show_sidebar_on_course_detail_page = get_field( 'show_sidebar_on_course_detail_page', 'option' );
?>
<div class="section">
	<main class="main-primary">
<?php
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content', 'course-detail' );

endwhile; // End of the loop.
?>

	</main>

	<?php if ( $show_sidebar_on_course_detail_page == 1 ) : ?>
	<div class="main-secondary">
		<?php
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			get_sidebar(); }
		?>
	</div>
	<?php endif; ?>

</div>

<?php

get_footer();
