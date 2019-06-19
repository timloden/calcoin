<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CalCoin
 */

$user = wp_get_current_user();
$user_id = $user->ID;
//$address = get_field('wallet_address', 'user_' . $user_id);

$address = '0x89F156CA9efFe59eD2e2D933d708Ae876d124d77';

?>

<?php if ($address) : ?>

<div class="wallet-container">
	<div class="row">
		<div class="columns">
			<div class="card wallet-card faster">
				<p class="text-right">
					<a class="wallet-button wallet-close">
			    		<i class="la la-close"></i>
			  		</a>
			  	</p>
				<div id="wallet-qr"></div>
				<span>Address:</span>
				<p class="wallet-address"><?php echo $address; ?></p>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>

</main>

<footer class="app">
	 <?php
	 	wp_nav_menu( array(
		    'menu'           => 'Footer app',
		    'theme_location' => 'footer-app',
		    'menu_class'	=> 'app-nav',
		    'fallback_cb'    => false
		) );
	 ?>
</footer>

<?php wp_footer(); ?>

</body>

<script>
(function ($) {

	$(document).ready(function() {

		<?php if ($address) : ?>

		var typeNumber = 2;
		var errorCorrectionLevel = 'Q';
		var qr = qrcode(typeNumber, errorCorrectionLevel);
		qr.addData(<?php echo $address; ?>);
		qr.make();
		document.getElementById('wallet-qr').innerHTML = qr.createImgTag('10','0','Address QR Code');

		<?php endif; ?>

	});

})(jQuery);
</script>
</html>
