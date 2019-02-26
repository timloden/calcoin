<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CAWeb_Standard
 */

get_header();
$show_sidebar_on_job_list_page = get_field( 'show_sidebar_on_job_list_page', 'option' );
?>
<div class="section">
	<main class="main-primary">
		<h1>Job List</h1>
		<section class="job-list">
		<?php

		if ( have_posts() ) {
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation(
				array(
					'prev_text'          => __( 'Older Courses', 'theme_textdomain' ),
					'next_text'          => __( 'Newer Courses', 'theme_textdomain' ),
					'screen_reader_text' => __( 'View more', 'theme_textdomain' ),
				)
			);
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}


		?>
		</section>
	</main>

	<?php if ( $show_sidebar_on_job_list_page == 1 ) : ?>
	<div class="main-secondary">
			<?php
			if ( is_active_sidebar( 'sidebar-1' ) ) {
				get_sidebar();
			}
			?>
	</div>
	<?php endif; ?>
</div>

<?php
get_footer();
