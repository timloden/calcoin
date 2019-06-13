<?php
/**
 * Default front page
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
	<div class="columns text-center" style="margin-top: 2em;">
		<a href="<?php echo site_url(); ?>/dashboard" class="button button-primary">Dashboard</a>
		<a href="<?php echo site_url(); ?>/login" class="button button-primary">Login</a>
		<a href="<?php echo site_url(); ?>/signup" class="button button-primary">Signup</a>
	</div>
</div>

<?php

get_footer();
