<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package CAWeb_Standard
 */
$error_settings = get_field('custom_404_page', 'option');
//print_r($error_settings);

if ($error_settings['redirect_404_to_custom_page'] == '1') {
	$location = $error_settings['custom_page_url'];
	header( "Location: {$location}" );
	exit();
}

get_header();
?>

<div class="section">
	<main class="main-primary">
		<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'caweb-standard' ); ?></h1>
		<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'caweb-standard' ); ?></p>
	</main>
</div>

<?php
get_footer();
