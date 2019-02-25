<?php
/**
 * Template part for displaying Courses archive item
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CAWeb_Standard
 */

$image       = get_field( 'thumbnail' );
$description = get_field( 'description' );
$description = preg_replace( '/\s+?(\S+)?$/', '', substr( $description, 0, 201 ) );
$event_date  = get_field( 'date' );
$start_time  = get_field( 'start_time' );
$end_time    = get_field( 'end_time' );
$location    = get_field( 'location' );
?>
<article class="course-item">
	<div class="thumbnail">
		<?php if ( $image ) : ?>
				<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( the_title() ); ?>">
		<?php endif; ?>
	</div>

	<div class="header">
		<div class="title"><a href="<?php the_permalink(); ?>"><?php echo esc_attr( the_title() ); ?></a></div>
			<div class="datetime"><?php echo esc_attr( $event_date ); ?> <?php
			if ( $start_time ) {
				echo esc_attr( $start_time ); }
			if ( $end_time ) {
				echo ( ' - ' . esc_attr( $end_time ) ); }
			?>

		</div>
	</div>

	<div class="body">
		<?php if ( $description ) : ?>
				<div class="description"><?php echo esc_attr( $description ); ?> &hellip;</div>
			<?php endif; ?>
			<div class="location">Location: <a href=""><?php echo esc_attr( $location ); ?></a></div>
	</div>

	<div class="footer">
			<a href="<?php the_permalink(); ?>" class="btn btn-default">View More Details</a>
	</div>
</article>


