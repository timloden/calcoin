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
<div class="row">
	<div class="columns">
		<h1>Login</h1>
	</div>
</div>
<div class="row">
	<div class="columns">
		<?php wp_login_form(); ?>
	</div>
</div>

<?php

get_footer();
