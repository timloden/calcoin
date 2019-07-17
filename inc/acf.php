<?php

/* 1. Customize ACF path
--------------------------------------------------------------------------------------*/
add_filter('acf/settings/path', 'my_acf_settings_path');

function my_acf_settings_path( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/acf/';
    // return
    return $path;

}

/* 2. Customize ACF dir
--------------------------------------------------------------------------------------*/
add_filter('acf/settings/dir', 'my_acf_settings_dir');

function my_acf_settings_dir( $dir ) {

    // update path
    $dir = get_stylesheet_directory_uri() . '/acf/';

    // return
    return $dir;

}

/* 3. Hide ACF field group menu item
--------------------------------------------------------------------------------------*/
//add_filter('acf/settings/show_admin', '__return_false');

// 4. Include ACF
include_once( get_stylesheet_directory() . '/acf/acf.php' );


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'CalCoin Settings',
		'menu_title'	=> 'CalCoin Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}
