<?php
/**
 * Template Name: Create Wallet
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package CalCoin
 */

get_header();
?>
<br><br><br>
<button class="generate-wallet">Create Wallet</button>

<h2>Address: <span class="address"></span></h2>
<h2>Private Key: <span class="key"></span></h2>
<div id="placeHolder"></div>

<?php

get_footer();
