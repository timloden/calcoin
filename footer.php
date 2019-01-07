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
                    <li><a href="https://www.flickr.com/groups/californiagovernment"><span class="ca-gov-icon-flickr" aria-hidden="true"></span><span class="sr-only">Flickr</span></a></li>
                    <li><a href="https://www.pinterest.com/cagovernment/"><span class="ca-gov-icon-pinterest" aria-hidden="true"></span><span class="sr-only">Pinterest</span></a></li>
                    <li><a href="https://twitter.com/cagovernment"><span class="ca-gov-icon-twitter" aria-hidden="true"></span><span class="sr-only">Twitter</span></a></li>
                    <li><a href="https://www.youtube.com/user/californiagovernment"><span class="ca-gov-icon-youtube" aria-hidden="true"></span><span class="sr-only">YouTube</span></a></li>
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

<?php wp_footer(); ?>

</body>
</html>
