<?php
/**
 * Template part for displaying news image block item
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CAWeb_Standard
 */

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
$categories = get_the_category($post->ID);
$cat_name = $categories[0]->cat_name;
$cat_link = get_category_link($categories[0]->cat_ID);
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

if ( !$alt ) {
	$alt = get_the_title() . ' - ' . get_the_date( 'F j, Y' );
}
?>

 <article class="news-item">
    <div class="thumbnail"><img src="<?php echo esc_url($featured_img_url); ?>" alt="<?php echo esc_attr($alt); ?>"></div>
    <div class="info">
        <div class="headline"><a href=""><?php echo esc_attr( the_title() ); ?></a></div>
        <div class="description"><p><?php echo get_the_excerpt(); ?></p></div>
        <div class="published">Published: <time datetime="<?php echo get_the_date( 'F j, Y' ); ?>"><?php echo get_the_date( 'F j, Y' ); ?></time></div>
    </div>
</article>
