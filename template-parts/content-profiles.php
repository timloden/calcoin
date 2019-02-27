<?php
/**
 * Template part for displaying profile archive item
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CAWeb_Standard
 */

$image = get_field( 'thumbnail' );
$title = get_field( 'title' );
$job = get_field( 'job' );
$appointed_by = get_field( 'appointed_by' );
$appointed_on = get_field( 'appointed_on' );
$reappointed = get_field( 'reappointed' );
$term_ends = get_field( 'term_ends' );
$alt = $image['alt'];
if (!$image['alt']) {
	$alt = get_the_title();
}
?>

<article class="profile-item" itemscope itemtype="http://schema.org/Person">
	<?php if ( $image ) : ?>
    <div class="thumbnail">
        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $alt ); ?>" itemprop="image">
    </div>
    <?php endif; ?>
    <div class="header">
        <div class="title"><a href="<?php the_permalink(); ?>"><?php echo esc_attr( the_title() ); ?><?php if ( $title ) : ?><span itemprop="jobTitle">, <?php echo esc_attr( $title ); ?></span><?php endif; ?></a></div>
    </div>
    <div class="body">
        <div class="job" itemprop="jobTitle"><?php echo esc_attr( $job ); ?></div>
        <?php if ( $appointed_by || $appointed_on ) : ?>
        	<div class="appointed">Appointed <?php if ( $appointed_by ) : ?>by <?php echo esc_attr( $appointed_by ); ?> <?php endif; ?> <?php if ( $appointed_on ) : ?> on <time datetime="<?php echo esc_attr( $appointed_on ); ?>"><?php echo esc_attr( $appointed_on ); ?></time><?php endif; ?></div>
    	<?php endif; ?>
    	<?php if ( $reappointed ) : ?>
        <div class="reappointed">Reappointed on <time datetime="<?php echo esc_attr( $reappointed ); ?>"><?php echo esc_attr( $reappointed ); ?></time></div>
        <?php endif; ?>
        <?php if ( $term_ends ) : ?>
        <div class="term-end">Term ends <time datetime="<?php echo esc_attr( $term_ends ); ?>"><?php echo esc_attr( $term_ends ); ?></time></div>
        <?php endif; ?>
    </div>
    <div class="footer">
        <a href="<?php the_permalink(); ?>" class="btn btn-default" itemprop="url">View More Details</a>
    </div>
</article>
