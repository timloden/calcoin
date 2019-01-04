<?php

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
 
    // update path
    $path = get_stylesheet_directory() . '/advanced-custom-fields-pro/';
    
    // return
    return $path;
    
}

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '/advanced-custom-fields-pro/';
    
    // return
    return $dir;
    
}

// 3. Hide ACF field group menu item
//add_filter('acf/settings/show_admin', '__return_false');


// 4. Include ACF
include_once( get_stylesheet_directory() . '/advanced-custom-fields-pro/acf.php' );


// CAWeb Options page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'CAWeb Options',
		'menu_title'	=> 'CAWeb Options',
		'menu_slug' 	=> 'caweb-options',
		'capability'	=> 'edit_posts',
		'icon_url'		=> get_stylesheet_directory_uri() . '/images/caweb_logo.png',
		'position' 		=> 2,
		'redirect'		=> false,
		'update_button' => __('Save Options', 'acf'),
	));
	
}