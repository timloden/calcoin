<?php
/**
 * Template Name: Wallet
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package CAWeb_Standard
 */

get_header();
?>
<main id="main" class="site-main">

<div class="section">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-content">
			<button class="generate-wallet">Create Wallet</button>

			<h2>Address: <span class="address"></span></h2>
			<h2>Private Key: <span class="key"></span></h2>
			<div id="placeHolder"></div>
		</div>
	</article>
</div>

</main><!-- #main -->
<?php
//get_sidebar();
get_footer();
