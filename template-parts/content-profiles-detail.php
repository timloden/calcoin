<?php
/**
 * Template part for displaying profile detail page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CAWeb_Standard
 */

$image = get_field( 'thumbnail' );
$title = get_field( 'title' );
$bio = get_field( 'bio' );
$alt = $image['alt'];
if (!$image['alt']) {
	$alt = get_the_title();
}
?>

<article class="profile-detail" itemscope itemtype="http://schema.org/Person">
    <h1><span class="ca-gov-icon-arrow-down"></span> <?php echo esc_attr( the_title() ); ?><?php if ( $title ) : ?><span itemprop="jobTitle">, <?php echo esc_attr( $title ); ?></span><?php endif; ?></h1>
    <div itemprop="description">
    	<img itemprop="image" src="<?php echo esc_url( $image['url'] ); ?>" class="img-right profile-image" alt="<?php echo esc_attr( the_title() ); ?>">
       <?php echo wp_kses_post( apply_filters( 'the_content', $bio ) ); ?>
    </div>
</article>
