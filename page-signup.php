<?php
/**
 * Template Name: Signup
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
			<div class="card-header">
				<div class="card-header-title">
					<span>Create your account</span>
				</div>
			</div>
			<?php gravity_form(1, false, false, false, '', true, 12); ?>
		</div>
	</div>
</div>

<?php

get_footer();
