<?php
/**
 * Customer Stories post type.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
 */
function courses_post_type() {
	$labels = array(
		'name'               => _x( 'Courses', 'post type general name', 'caweb' ),
		'singular_name'      => _x( 'Course', 'post type singular name', 'caweb' ),
		'menu_name'          => _x( 'Courses', 'admin menu', 'caweb' ),
		'name_admin_bar'     => _x( 'Courses', 'add new on admin bar', 'caweb' ),
		'add_new'            => _x( 'Add New', 'Course', 'caweb' ),
		'add_new_item'       => __( 'Add New Course', 'caweb' ),
		'new_item'           => __( 'New Course', 'caweb' ),
		'edit_item'          => __( 'Edit Course', 'caweb' ),
		'view_item'          => __( 'View Course', 'caweb' ),
		'all_items'          => __( 'All Courses', 'caweb' ),
		'search_items'       => __( 'Search Courses', 'caweb' ),
		'parent_item_colon'  => __( 'Parent Courses:', 'caweb' ),
		'not_found'          => __( 'No Courses found.', 'caweb' ),
		'not_found_in_trash' => __( 'No Courses found in Trash.', 'caweb' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-welcome-learn-more',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
		'taxonomies'         => array( 'category' ),
	);

	register_post_type( 'courses', $args );
	flush_rewrite_rules();
}

add_action( 'init', 'courses_post_type' );
