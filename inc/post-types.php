<?php
/**
 * Customer Stories post type.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
 */

function publications_post_type() {
	$labels = array(
		'name'               => _x( 'Publications', 'post type general name', 'caweb' ),
		'singular_name'      => _x( 'Publication', 'post type singular name', 'caweb' ),
		'menu_name'          => _x( 'Publications', 'admin menu', 'caweb' ),
		'name_admin_bar'     => _x( 'Publications', 'add new on admin bar', 'caweb' ),
		'add_new'            => _x( 'Add New', 'Publication', 'caweb' ),
		'add_new_item'       => __( 'Add New Publication', 'caweb' ),
		'new_item'           => __( 'New Publication', 'caweb' ),
		'edit_item'          => __( 'Edit Publication', 'caweb' ),
		'view_item'          => __( 'View Publication', 'caweb' ),
		'all_items'          => __( 'All Publications', 'caweb' ),
		'search_items'       => __( 'Search Publications', 'caweb' ),
		'parent_item_colon'  => __( 'Parent Publications:', 'caweb' ),
		'not_found'          => __( 'No Publications found.', 'caweb' ),
		'not_found_in_trash' => __( 'No Publications found in Trash.', 'caweb' ),
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
		'menu_icon'          => 'dashicons-book-alt',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
		'taxonomies'         => array( 'post_tag' ),
	);

	register_post_type( 'publications', $args );
	flush_rewrite_rules();
}

//add_action( 'init', 'publications_post_type' );
