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
<div class="row">
	<div class="columns">
		<h1>Signup</h1>
	</div>
</div>
<div class="row">
	<div class="columns">
		<?php gravity_form(1, false, false, false, '', true, 12); ?>
	</div>
</div>

<?php

get_footer();
