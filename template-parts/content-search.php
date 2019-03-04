<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CAWeb_Standard
 */

$post_type = get_post_type();

if ( $post_type == 'events' || $post_type == 'publications' || $post_type == 'jobs' || $post_type == 'courses' ) {
	$image = get_field( 'thumbnail' ); // get acf image field
	$alt = $image['alt']; // set alt
	$image = $image['url']; // get actual image url

	if ( !$alt ) {
		$alt = get_the_title();
	}
}

if ( $post_type == 'post' ) {
	$image = get_the_post_thumbnail_url(get_the_ID(),'full');
	$thumbnail_id = get_post_thumbnail_id( $post->ID );
	$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
	if ( !$alt ) {
		$alt = get_the_title();
	}
}

if ( $post_type == 'attachment' ) {
	$attachment_type = get_post_mime_type();

	if ( $attachment_type != 'application/pdf' ) {
		$image = wp_get_attachment_url(get_the_ID(),'full');
	} else {
		$image = get_template_directory_uri() . '/images/pdf.png';
	}

}
?>

<article class="news-item">
    <?php if ( $image ) : ?>

    <div class="thumbnail">
    	<?php if ( $post_type == 'attachment' && $attachment_type != 'application/pdf' ) : ?>
			<a href="<?php echo esc_url( $image ); ?>"><img src="<?php echo esc_url( $image ); ?>"></a>
    	<?php else : ?>
    		<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $image ); ?>"></a>
    	<?php endif; ?>
    </div>
	<?php endif; ?>

    <div class="info">
        <div class="headline">
        	<?php if ( $post_type == 'attachment' && $attachment_type != 'application/pdf' ) : ?>
        		<a href="<?php echo esc_url( $image ); ?>"><?php echo esc_attr( the_title() ); ?></a>
        	<?php else : ?>
        		<a href="<?php the_permalink(); ?>"><?php echo esc_attr( the_title() ); ?></a>
        	<?php endif; ?>
        </div>
        <?php if ( get_the_excerpt() != '' ) : ?>
        	<div class="description"><p><?php echo get_the_excerpt(); ?></p></div>
        <?php endif; ?>
        <div class="published">Published: <time datetime="<?php echo get_the_date( 'F j, Y' ); ?>"><?php echo get_the_date( 'F j, Y' ); ?></time></div>
        <?php echo('post type: ' . $post_type ); ?>
    </div>

</article>
