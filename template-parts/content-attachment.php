<?php
/**
 * Template part for displaying attachment content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CAWeb_Standard
 */
$type = get_post_mime_type();

// check if the attachment is an image
if ( $type == 'image/jpeg' || $type == 'image/gif' || $type == 'image/png' ) {
	$attachment_type = 'image';
} elseif ( $type == 'application/pdf' ) {
	$attachment_type = 'pdf';
} else {
	$attachment_type = 'post';
}
echo $attachment_type;

?>

<article class="news-item">
    <div class="thumbnail">
    	<a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image( $post->ID ); ?></a>
    </div>
    <div class="info">
        <div class="headline"><a href=""><?php echo esc_attr( the_title() ); ?></a></div>
        <?php if ( get_the_excerpt() != '' ) : ?>
        	<div class="description"><p><?php echo get_the_excerpt(); ?></p></div>
        <?php endif; ?>
        <div class="published">Published: <time datetime="<?php echo get_the_date( 'F j, Y' ); ?>"><?php echo get_the_date( 'F j, Y' ); ?></time></div>
    </div>
</article>

