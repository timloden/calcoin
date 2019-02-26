<?php
/**
 * Template part for displaying news block item
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
    <article class="shadow">
        <figure class="pos-rel m-b-0">
            <img class="img-fluid w-100" src="<?php echo esc_url($featured_img_url); ?>" alt="<?php echo esc_attr($alt); ?>">

            <figcaption class="pos-abs top-sm left-sm">
                <a class="btn btn-sm btn-standout rounded-0" href="#"><?php echo get_the_date( 'F j, Y' ); ?></a>
            </figcaption>
        </figure>

        <div class="p-a">
            <ul class="list-inline font-size-sm m-y-0">
                <li class="list-inline-item">
                    <span class="color-gray">By:</span>
                    <a class="color-gray-dark color-primary-hover" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author(); ?></a>
                </li>
                <li class="list-inline-item">
                    <span class="color-gray">In:</span>
                    <a class="color-gray-dark color-primary-hover" href="<?php echo esc_url($cat_link); ?>"><?php echo esc_attr($cat_name); ?></a>
                </li>
            </ul>

            <h4 class="m-t-0 m-b-sm">
                <a class="u-link-v5 color-gray-dark color-primary-hover" href="<?php the_permalink(); ?>"><?php echo esc_attr( the_title() ); ?></a>
            </h4>

            <p><?php echo get_the_excerpt(); ?></p>

            <!-- <hr class="hr-light m-y">

            <ul class="list-inline m-y-0">
                <li class="list-inline-item m-r m-y-0">
                    <a class="news-icon bg-gray-light bg-primary-hover color-gray-dark rounded-50x" href="#">
                        <i class="ca-gov-icon-email"></i><span class="sr-only">Email</span>
                    </a>
                </li>
                <li class="list-inline-item m-r m-y-0">
                    <a class="news-icon bg-gray-light bg-primary-hover color-gray-dark rounded-50x" href="#">
                        <i class="ca-gov-icon-share"></i><span class="sr-only">Share</span>
                    </a>
                </li>
            </ul> -->
        </div>
    </article>
    <!-- End Article -->
</div>
