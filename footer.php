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

?>
<section class="footer-section">
	<div class="row">
		<div class="columns">
			<footer class="text-center">
				<p><img class="footer-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/calcoin-full-logo.png"></p>
				<p><a href="/signup">Create Account</a><a href="/login">Login</a></p>
				<p class="copyright">&copy; <?php echo date("Y"); ?> DSIA Academy</p>
			</footer>
		</div>
	</div>
</section>
</main>

<?php wp_footer(); ?>

<script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
<script>

//wow.js
new WOW().init();

// smooth scroll
let scroll = new SmoothScroll('a[href*="#"]', {
	speed: 1200,
	easing: 'easeInOutCubic'
});

// jquery stuff

(function ($) {
	$( document ).ready(function() {

		$(document).foundation();

		var allTabs = $('.what-is-tab');
		var allText = $('.what-is-text');
		var allImages = $('.what-is-screen');

		$('.what-is-tab').click(function() {
			$(allTabs).removeClass('is-active');
			$(allText).removeClass('is-active');
			$(allImages).removeClass('is-active');
			$('#' + this.id).addClass('is-active');
			$('#' + this.id + '-image').addClass('is-active');
			$('#' + this.id + '-text').addClass('is-active');
		});

	});

})(jQuery);


</script>

</body>
</html>
