<?php
/**
 * Template Name: Signup
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package CalCoin
 */

acf_form_head();
get_header();
?>

<h1>Signup</h1>

<?php gravity_form(1, false, false, false, '', true, 12); ?>

<script>

(function ($) {

	function createWallet() {
		var wallet = ethers.Wallet.createRandom();
		$( ".address input" ).val(wallet.address);
		$( ".key input" ).val(wallet.privateKey);
		console.log('address: ' + wallet.address);
		console.log('key: ' + wallet.privateKey);
	}

	$( "#gform_submit_button_1" ).click(function() {
 		createWallet();
	});

})(jQuery);

</script>

<?php
get_footer();
