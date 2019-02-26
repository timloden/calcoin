<?php
function prefix_conditional_body_class( $classes ) {

	$show_sidebar_on_course_detail_page = get_field('show_sidebar_on_course_detail_page', 'option');
	$show_sidebar_on_course_list_page = get_field('show_sidebar_on_course_list_page', 'option');
	$show_sidebar_on_event_detail_page = get_field('show_sidebar_on_event_detail_page', 'option');
	$show_sidebar_on_event_list_page = get_field('show_sidebar_on_event_list_page', 'option');
	$show_sidebar_on_job_detail_page = get_field('show_sidebar_on_job_detail_page', 'option');
	$show_sidebar_on_job_list_page = get_field('show_sidebar_on_job_list_page', 'option');
	$show_sidebar_on_news_detail_page = get_field('show_sidebar_on_news_detail_page', 'option');
	$show_sidebar_on_news_list_page = get_field('show_sidebar_on_news_list_page', 'option');

	if ( is_home() ) {
		if( $show_sidebar_on_news_list_page == 1 ) {
			$classes[] = 'two-column';
		}

		return $classes;
	}

	if ( is_single() ) {

		if ( is_singular( 'events' ) && $show_sidebar_on_event_detail_page == 1 ) {
			$classes[] = 'two-column';
		}

		if ( is_singular( 'courses' ) && $show_sidebar_on_course_detail_page == 1 ) {
			$classes[] = 'two-column';
		}

		if ( is_singular( 'jobs' ) && $show_sidebar_on_job_detail_page == 1 ) {
			$classes[] = 'two-column';
		}

		return $classes;
	}

	if ( is_archive() ) {


		if( is_post_type_archive('events') && $show_sidebar_on_event_list_page == 1 ) {

			$classes[] = 'two-column';
		}

		if( is_post_type_archive('courses') && $show_sidebar_on_course_list_page == 1 ) {

			$classes[] = 'two-column';
		}

		if( is_post_type_archive('jobs') && $show_sidebar_on_job_list_page == 1 ) {

			$classes[] = 'two-column';
		}

		return $classes;
	}

}

add_filter( 'body_class', 'prefix_conditional_body_class' );

// add drop down for custom styles

function wpb_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

function my_mce_before_init_insert_formats( $init_array ) {

// Define the style_formats array

	$style_formats = array(
/*
* Each array child is a format with it's own settings
* Notice that each array has title, block, classes, and wrapper arguments
* Title is the label which will be visible in Formats menu
* Block defines whether it is a span, div, selector, or inline style
* Classes allows you to define CSS classes
* Wrapper whether or not to add a new block-level element around any selected elements
*/
		array(
			'title' => 'Overstated',
			'selector' => 'ul',
			'classes' => 'list-overstated',
			'wrapper' => true,

		),
		array(
			'title' => 'Understated',
			'selector' => 'ul',
			'classes' => 'list-understated',
			'wrapper' => true,
		),
		array(
			'title' => 'Standout',
			'selector' => 'ul',
			'classes' => 'list-standout',
			'wrapper' => true,
		),
		array(
			'title' => 'Primary',
			'selector' => 'ul',
			'classes' => 'list-primary',
			'wrapper' => true,
		),
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );


/* Automatically set the image Title, Alt-Text, Caption & Description upon upload
--------------------------------------------------------------------------------------*/
add_action( 'add_attachment', 'my_set_image_meta_upon_image_upload' );
function my_set_image_meta_upon_image_upload( $post_ID ) {

	// Check if uploaded file is an image, else do nothing

	if ( wp_attachment_is_image( $post_ID ) ) {

		$my_image_title = get_post( $post_ID )->post_title;

		// Sanitize the title:  remove hyphens, underscores & extra spaces:
		$my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );

		// Sanitize the title:  capitalize first letter of every word (other letters lower case):
		$my_image_title = ucwords( strtolower( $my_image_title ) );

		// Create an array with the image meta (Title, Caption, Description) to be updated
		// Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
		$my_image_meta = array(
			'ID'		=> $post_ID,			// Specify the image (ID) to be updated
			'post_title'	=> $my_image_title,		// Set image Title to sanitized title
			'post_excerpt'	=> $my_image_title,		// Set image Caption (Excerpt) to sanitized title
			'post_content'	=> $my_image_title,		// Set image Description (Content) to sanitized title
		);

		// Set the image Alt-Text
		update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );

		// Set the image meta (e.g. Title, Excerpt, Content)
		wp_update_post( $my_image_meta );

	}
}
