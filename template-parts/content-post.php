<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CAWeb_Standard
 */

$using_divi = get_post_meta( get_the_ID(), '_et_pb_use_builder', true );
?>

<?php if ($using_divi == 'on') : ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<?php else : ?>

<div class="section">
	<main class="main-primary">
		<article id="post-<?php the_ID(); ?>" class="news-detail">
			<header>
	        	<h1><?php the_title(); ?></h1>
	        	<div class="published">Published: <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time></div>
	    	</header>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			
			<footer class="keywords">
		        Tags or Keywords
		        <ul>
		        	<?php
						$posttags = get_the_tags();
						if ($posttags) {
						  foreach($posttags as $tag) {
						    echo '<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>'; 
						  }
						}
					?>
		        </ul>
	    	</footer>
		</article><!-- #post-<?php the_ID(); ?> -->
	</main>
	<div class="main-secondary">
		<?php 
			if ( is_active_sidebar( 'sidebar-1' ) ) {
				get_sidebar();
			}
		?>
	</div>
</div>
<?php endif; ?>
