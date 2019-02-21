<?php
/**
 * The template for displaying Courses
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CAWeb_Standard
 */

get_header();

$show_sidebar_on_course_list_page = get_field('show_sidebar_on_course_list_page', 'option');

?>
<div class="section">
  <main class="main-primary">
      <section class="course-list">
      	<?php
      	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$loop = new WP_Query( array(
		    'post_type' => 'courses',
		    'posts_per_page' => 5,
		    'paged' => $paged,
		));

		while ( $loop->have_posts() ) : $loop->the_post();
			$image = get_field( "thumbnail" );
			$description = get_field( "description" );
			$description = preg_replace('/\s+?(\S+)?$/', '', substr($description, 0, 201));
			$event_date = get_field( "date" );
			$start_time = get_field( "start_time" );
			$end_time = get_field( "end_time" );
			$location = get_field( "location" );
		?>

        <article class="course-item">
            <div class="thumbnail">
            	<?php if ($image) : ?>
               		<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(the_title()); ?>">
            	<?php endif; ?>
            </div>

            <div class="header">
                <div class="title"><a href="<?php the_permalink(); ?>"><?php echo esc_attr(the_title()); ?></a></div>
                <div class="datetime"><?php echo esc_attr($event_date); ?> <?php if ($start_time) { echo esc_attr($start_time); } ?><?php if ($end_time) { echo (' - ' . esc_attr($end_time)); } ?></div>
            </div>

            <div class="body">
            	<?php if ($description) : ?>
                	<div class="description"><?php echo esc_attr($description); ?> &hellip;</div>
                <?php endif; ?>
                <div class="location">Location: <a href=""><?php echo esc_attr($location); ?></a></div>
            </div>

            <div class="footer">
                <a href="<?php the_permalink(); ?>" class="btn btn-default">View More Details</a>
            </div>
        </article>

		<?php
			endwhile;
			the_posts_navigation();
			wp_reset_query();
		?>
    </section>
  </main>
  <?php if ($show_sidebar_on_course_list_page == 1) : ?>
  <div class="main-secondary">
      <?php
        if ( is_active_sidebar( 'sidebar-1' ) ) {
          get_sidebar();
        }
      ?>
  </div>
<?php endif; ?>
</div>

<?php
get_footer();
