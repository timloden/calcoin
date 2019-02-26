<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CAWeb_Standard
 */

get_header();
$news_list_style = get_field( 'news_list_style', 'option' );
$show_sidebar_on_news_list_page = get_field( 'show_sidebar_on_news_list_page', 'option' );
?>
<div class="section">
	<main class="main-primary">
		<h1>News List</h1>

		<?php if ($news_list_style != 'list') : ?>
			<div class="group row row-flex">
		<?php else : ?>
			<section class="news-list">
		<?php endif; ?>

		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'news-' . $news_list_style );

			endwhile;



		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		<?php if ($news_list_style != 'list') : ?>
			</div>
		<?php else : ?>
			</section>
		<?php endif;
		the_posts_navigation();
		?>

	</main>

	<?php

	if ( $show_sidebar_on_news_list_page == 1 ) : ?>
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
