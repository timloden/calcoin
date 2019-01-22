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
                <?php 
                    wp_nav_menu(array(
                        'theme_location'=> 'Footer',
                        'menu_class' => 'footer-links',
                        )
                    );
                ?>
            </div>
            <div class="quarter text-right">
                <ul class="socialsharer-container">

                    <?php if ($facebook['url'] && $facebook['show_in_footer'] == 1): ?>
                        <li><a href="<?php echo esc_url($facebook['url']);?>" class="ca-gov-icon-facebook" title="Share via Facebook"><span class="sr-only">Facebook</span></a></li>
                    <?php endif; ?>

                    <?php if ($twitter['url'] && $twitter['show_in_footer'] == 1): ?>
                        <li><a href="<?php echo esc_url($twitter['url']);?>" class="ca-gov-icon-twitter" title="Share via Twitter"><span class="sr-only">Twitter</span></a></li>
                    <?php endif; ?>

                    <?php if ($flickr['url'] && $flickr['show_in_footer'] == 1): ?>
                        <li><a href="<?php echo esc_url($flickr['url']);?>" class="ca-gov-icon-flickr" title="Share via Flickr"><span class="sr-only">Flickr</span></a></li>
                    <?php endif; ?>

                    <?php if ($pinterest['url'] && $pinterest['show_in_footer'] == 1): ?>
                        <li><a href="<?php echo esc_url($pinterest['url']);?>" class="ca-gov-icon-pinterest" title="Share via Pinterest"><span class="sr-only">Pinterest</span></a></li>
                    <?php endif; ?>

                    <?php if ($youtube['url'] && $youtube['show_in_footer'] == 1): ?>
                        <li><a href="<?php echo esc_url($youtube['url']);?>" class="ca-gov-icon-youtube" title="Share via YouTube"><span class="sr-only">YouTube</span></a></li>
                    <?php endif; ?>

                    <?php if ($instagram['url'] && $instagram['show_in_footer'] == 1): ?>
                        <li><a href="<?php echo esc_url($instagram['url']);?>" class="ca-gov-icon-instagram" title="Share via Instagram"><span class="sr-only">Instagram</span></a></li>
                    <?php endif; ?>

                    <?php if ($linkedin['url'] && $linkedin['show_in_footer'] == 1): ?>
                        <li><a href="<?php echo esc_url($linkedin['url']);?>" class="ca-gov-icon-linkedin" title="Share via LinkedIn"><span class="sr-only">LinkedIn</span></a></li>
                    <?php endif; ?>

                    <?php if ($rss['url'] && $rss['show_in_footer'] == 1): ?>
                        <li><a href="<?php echo esc_url($rss['url']);?>" class="ca-gov-icon-rss" title="Share via RSS"><span class="sr-only">RSS</span></a></li>
                    <?php endif; ?>

                    <?php if ($share_email['show_in_footer'] == 1): ?>
                        <li><a href="mailto:?subject=<?php bloginfo( 'name' ); ?>&body=<?php echo site_url(); ?>" class="ca-gov-icon-email" title="Share via Email"><span class="sr-only">Email</span></a></li>
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
    "ca_frontpage_search_enabled":"",
    "ca_google_search_id":"<?php echo esc_attr($search_engine_id); ?>",
    "caweb_multi_ga":"<?php echo esc_attr($multisite_ga); ?>",
    "ca_google_trans_enabled":"1"};
/* ]]> */
</script>

<?php wp_footer(); ?>



</body>
</html>
