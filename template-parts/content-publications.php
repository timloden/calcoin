<?php
/**
 * Template part for displaying publication archive item
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CAWeb_Standard
 */

$image = get_field( 'thumbnail' );
$pdf = get_field( 'publication_pdf' );
$alt = $image['alt'];
if (!$image['alt']) {
	$alt = get_the_title();
}
?>

 <article class="pub-item">
 	<?php if ( $image ) : ?>
    <div class="thumbnail"><img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $alt ); ?>"></div>
    <?php endif; ?>
    <div class="pub-body">
        <span class="pub-title"><?php echo esc_attr( the_title() ); ?></span>
        <?php

		// check if the repeater field has rows of data
		if( have_rows('publication_files') ):

		 	// loop through the rows of data
		    while ( have_rows('publication_files') ) : the_row();
		?>

        <span class="pub-language">(<?php echo( esc_attr( the_sub_field('pdf_language') ) ); ?> <a href="<?php echo( esc_attr( the_sub_field('pdf_file') ) ); ?>">PDF</a>) | <span class="pub-revision-date">(Revision Date <time datetime="<?php the_modified_date(); ?>"><?php the_modified_date(); ?></time>)</span>
    	</span>

        <?php
        endwhile;

		else :

		    echo('<p>Now files found.</p>');

		endif;

		?>
		<?php $posttags = get_the_tags();
		if ($posttags) : ?>
        	<div class="pub-tags">Tags: <?php { foreach($posttags as $tag) { echo( '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>' ); } } ?></div>
        <?php endif; ?>
    </div>
</article>
