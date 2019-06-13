<?php
/**
 * Template Name: Login
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package CalCoin
 */

get_header();

?>
<div class="row align-center">
	<div class="columns small-10">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/login-logo.png">
	</div>
</div>
<div class="row">
	<div class="columns">
		<div class="card card-padded">
			<?php wp_login_form(); ?>
			<a class="forgot-password" href="<?php echo site_url(); ?>/forgot-password" title="Lost Password">Forgot your password?</a>
		</div>
	</div>
</div>

<?php

get_footer();
