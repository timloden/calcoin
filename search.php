<?php
/**
 * The search template file
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

$url = $_SERVER['REQUEST_URI'];
$parts = parse_url($url);
parse_str($parts['query'], $query);
$keyword = $query['s'];

$show_sidebar_on_search_list_page = get_field( 'show_sidebar_on_search_list_page', 'option' );

?>
<div class="section">
	<main class="main-primary">
		<h1>Search Results for: <?php echo esc_attr($keyword);?></h1>

		<section class="news-list">

		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'search' );

			endwhile;

		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>

		</section>

		<?php the_posts_navigation(); ?>

	</main>

	<?php

	if ( $show_sidebar_on_search_list_page == 1 ) : ?>
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
