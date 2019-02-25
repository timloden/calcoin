<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CAWeb_Standard
 */

get_header();
$show_sidebar_on_course_list_page = get_field( 'show_sidebar_on_course_list_page', 'option' );
?>
<div class="section">
	<main class="main-primary">
		<section class="course-list">
		<?php

		if ( have_posts() ) {
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation(
				array(
					'prev_text'          => __( 'Older Courses', 'theme_textdomain' ),
					'next_text'          => __( 'Newer Courses', 'theme_textdomain' ),
					'screen_reader_text' => __( 'Posts navigation', 'theme_textdomain' ),
				)
			);
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}


		?>
		</section>
	</main>

	<?php if ( $show_sidebar_on_course_list_page == 1 ) : ?>
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
