<?php
/**
 * Template part for displaying Event detail page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CAWeb_Standard
 */

$description    = get_field( 'description' );
$image          = get_field( 'thumbnail' );
$show_presenter = get_field( 'show_organizer' );
if ( $show_presenter == 1 ) {
	$presenter_image = get_field( 'organizer_image' );
	$presenter_name  = get_field( 'organizer_name' );
	$presenter_bio   = get_field( 'organizer_bio' );
}
$certifications                     = get_field( 'certification_and_credits' );
$event_date                         = get_field( 'date' );
$start_time                         = get_field( 'start_time' );
$end_time                           = get_field( 'end_time' );
$location                           = get_field( 'location' );
$registration_type                  = get_field( 'registration_type' );
$cost                               = get_field( 'cost' );
$button_link                        = get_field( 'registration_button_url' );
$button_text                        = get_field( 'registration_button_text' );


?>

<article id="event-<?php the_ID(); ?>" class="event-detail" itemscope itemtype="http://schema.org/Event">
	<div class="header">
		<h1 itemprop="name"><span class="ca-gov-icon-arrow-down"></span> <?php echo esc_attr( the_title() ); ?></h1>
	</div>

	<?php if ( $description ) : ?>
	<div class="description" itemprop="description">
		<p>
			<?php if ( $image ) :
				if ( $image['alt'] ) {
					$alt = $image['alt'];
				} else {
					$alt = get_the_title();
				}
			?>
				<img src="<?php echo esc_url( $image['url']); ?>" class="img-left thumbnail" alt="<?php echo esc_attr( $alt ); ?>">
			<?php endif; ?>
			<?php echo esc_attr( $description ); ?>
		</p>
	</div>
	<?php endif; ?>

	<?php if ( $show_presenter == 1 ) : ?>
	<div class="presenter" itemprop="performer" itemscope="" itemtype="http://schema.org/Person">
		<p><strong>Presenter:</strong><br>
		<strong class="presenter-name"><?php echo esc_attr( $presenter_name ); ?></strong></p>

		<div itemprop="description">
			<p><img src="<?php echo esc_url( $presenter_image ); ?>" class="img-left presenter-image" alt=""><?php echo esc_attr( $presenter_bio ); ?></p>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( $certifications ) : ?>
		<div class="course-certifications">
		<strong>Participants will receive:</strong>
		<?php echo wp_kses_post( apply_filters( 'the_content', $certifications ) ); ?>
		</div>
	<?php endif; ?>

	<div class="group">
		<div class="two-thirds">
			<strong>Organizer</strong>
			<p class="date-time">
				<?php if ( $event_date ) : ?>
				<time itemprop="startDate" datetime="<?php echo esc_attr( $event_date ); ?>"><?php echo esc_attr( $event_date ); ?> <?php
				if ( $start_time ) {
					echo esc_attr( $start_time ); }
				?>
				<?php
				if ( $end_time ) {
					echo ( ' - ' . esc_attr( $end_time ) ); }
				?>
				</time>
				<span class="ca-gov-icon-calendar"></span> <a href="">Add to calendar</a><br>
				<?php endif; ?>

				<?php if ( $location ) : ?>
				<span class="ca-gov-icon-road-pin"></span> <a href="" itemprop="location" itemscope itemtype="http://schema.org/PostalAddress"><?php echo esc_attr( $location ); ?></a>
				<?php endif; ?>
			</p>

			<?php if ( $registration_type ) : ?>
			<p itemprop="offers" itemscope itemtype="http://schema.org/Offer">Registration Type: <?php echo esc_attr( $registration_type ); ?><br>
			<?php endif; ?>

			<?php if ( $cost ) : ?>
			Cost: <span itemprop="price">$<?php echo esc_attr( $cost ); ?></span> each</p>
			<?php endif; ?>
		</div>

		<div class="third">
			<div class="location"></div>
		</div>
	</div>

	<?php if ( $button_link ) : ?>
	<a href="<?php echo esc_url( $button_link ); ?>" class="btn btn-primary"><?php echo esc_attr( $button_text ); ?></a>
	<?php endif; ?>

</article>
