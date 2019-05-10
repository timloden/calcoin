<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CAWeb_Standard
 */

$google_settings = get_field('google', 'option');
$search_engine_id = isset($google_settings['search_engine_id']) ? $google_settings['search_engine_id'] : false;
$analytics_id = isset($google_settings['analytics']) ? $google_settings['analytics'] : false;

$multisite_ga = get_field('analytics_id', 'option');

$general_settings = get_field('general_settings', 'option');
$featured_search = $general_settings['show_search_on_front_page'];

$facebook = get_field('facebook', 'option');
$twitter = get_field('twitter', 'option');
$flickr = get_field('flickr', 'option');
$facebook = get_field('facebook', 'option');
$pinterest = get_field('pinterest', 'option');
$youtube = get_field('youtube', 'option');
$instagram = get_field('instagram', 'option');
$linkedin = get_field('linkedin', 'option');
$rss = get_field('rss', 'option');
$share_email = get_field('share_via_email', 'option');

?>

</div><!-- #main-content -->

<footer id="footer" class="global-footer">
	<div class="container">
		<div class="row">
			<div class="three-quarters">
				<?php if ( has_nav_menu( 'footer-menu' ) ) {
					wp_nav_menu(array(
						'menu'=> 'footer-menu',
						'menu_class' => 'footer-links',
						)
					);
					}
				?>
			</div>
			<div class="quarter text-right">
				<ul class="socialsharer-container">

					<?php if ($facebook['url'] && $facebook['show_in_footer'] == 1): ?>
						<li><a href="<?php echo esc_url($facebook['url']);?>"><span class="sr-only">Facebook</span><span class="ca-gov-icon-facebook" aria-hidden="true"></span></a></li>
					<?php endif; ?>

					<?php if ($twitter['url'] && $twitter['show_in_footer'] == 1): ?>
						<li><a href="<?php echo esc_url($twitter['url']);?>"><span class="sr-only">Twitter</span><span class="ca-gov-icon-twitter" aria-hidden="true"></span></a></li>
					<?php endif; ?>

					<?php if ($flickr['url'] && $flickr['show_in_footer'] == 1): ?>
						<li><a href="<?php echo esc_url($flickr['url']);?>"><span class="sr-only">Flickr</span><span class="ca-gov-icon-flickr" aria-hidden="true"></span></a></li>
					<?php endif; ?>

					<?php if ($pinterest['url'] && $pinterest['show_in_footer'] == 1): ?>
						<li><a href="<?php echo esc_url($pinterest['url']);?>"><span class="sr-only">Pinterest</span><span class="ca-gov-icon-pinterest" aria-hidden="true"></span></a></li>
					<?php endif; ?>

					<?php if ($youtube['url'] && $youtube['show_in_footer'] == 1): ?>
						<li><a href="<?php echo esc_url($youtube['url']);?>"><span class="sr-only">YouTube</span><span class="ca-gov-icon-youtube" aria-hidden="true"></span></a></li>
					<?php endif; ?>

					<?php if ($instagram['url'] && $instagram['show_in_footer'] == 1): ?>
						<li><a href="<?php echo esc_url($instagram['url']);?>"><span class="sr-only">Instagram</span><span class="ca-gov-icon-instagram" aria-hidden="true"></span></a></li>
					<?php endif; ?>

					<?php if ($linkedin['url'] && $linkedin['show_in_footer'] == 1): ?>
						<li><a href="<?php echo esc_url($linkedin['url']);?>"><span class="sr-only">LinkedIn</span><span class="ca-gov-icon-linkedin" aria-hidden="true"></span></a></li>
					<?php endif; ?>

					<?php if ($rss['url'] && $rss['show_in_footer'] == 1): ?>
						<li><a href="<?php echo esc_url($rss['url']);?>"><span class="sr-only">RSS</span><span class="ca-gov-icon-rss" aria-hidden="true"></span></a></li>
					<?php endif; ?>

					<?php if ($share_email['show_in_footer'] == 1): ?>
						<li><a href="mailto:?subject=<?php bloginfo( 'name' ); ?>&body=<?php echo site_url(); ?>"><span class="sr-only">Email</span><span class="ca-gov-icon-email" aria-hidden="true"></span></a></li>
					<?php endif; ?>

				</ul>
			</div>
		</div>

	</div>

	<!-- Copyright Statement -->
	<div class="copyright">
		<div class="container">
			Copyright &copy; <script>document.write(new Date().getFullYear())</script> State of California
		</div>
	</div>
</footer>

<!-- Extra Decorative Content -->
<div class="decoration-last">&nbsp;</div>

<script type='text/javascript'>
/* <![CDATA[ */
var args = {

	"ca_google_analytic_id":"<?php echo esc_attr($analytics_id); ?>",
	"ca_site_version":"5",
	"ca_frontpage_search_enabled":"<?php echo esc_attr($featured_search); ?>",
	"ca_google_search_id":"<?php echo esc_attr($search_engine_id); ?>",
	"caweb_multi_ga":"<?php echo esc_attr($multisite_ga); ?>",
	"ca_google_trans_enabled":""
};
/* ]]> */
</script>

<?php wp_footer(); ?>



</body>
</html>
