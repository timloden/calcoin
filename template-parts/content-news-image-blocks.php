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

<div class="third m-b-md">
    <!-- Article -->
    <article class="block-hover">
        <figure class="bg-overlay">
            <img class="img-fluid w-100 block-hover_zoom" src="<?php echo esc_url($featured_img_url); ?>" alt="<?php echo esc_attr($alt); ?>">
        </figure>

        <header class="w-100 text-center absolute-centered p-x">
            <span class="btn btn-xs btn-primary rounded-0" href="<?php echo esc_url($cat_link); ?>"><?php echo esc_attr($cat_name); ?></span>
            <h4 class="m-y-sm">
                <?php echo esc_attr( the_title() ); ?>
            </h4>

            <small class="color-white">
                <i class="ca-gov-icon-time pos-rel"></i> <?php echo get_the_date( 'F j, Y' ); ?>
            </small>
        </header>

        <a class="news-link" href="<?php the_permalink(); ?>">Read More</a>
    </article>
    <!-- End Article -->
</div>
