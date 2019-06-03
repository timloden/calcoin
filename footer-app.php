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
$address = get_field('wallet_address', 'user_' . $user_id);

?>

</main>
<footer class="app">
	<div class="expanded button-group">
	  <a href="/dashboard" class="button">Home</a>
	  <a href="/send" class="button">Send</a>
	  <a class="button" data-open="wallet-modal">Wallet</a>
	  <a href="/history" class="button">History</a>
	  <a href="/profile" class="button">Profile</a>
	</div>
</footer>

<div class="reveal" id="wallet-modal" data-reveal>
  <h1>Awesome. I Have It.</h1>
  <p class="lead">Your couch. It is mine.</p>
  <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php wp_footer(); ?>

</body>
</html>
