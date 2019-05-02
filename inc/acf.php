<?php

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');

function my_acf_settings_path( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/acf/';
    // return
    return $path;

}

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');

function my_acf_settings_dir( $dir ) {

    // update path
    $dir = get_stylesheet_directory_uri() . '/acf/';

    // return
    return $dir;

}

// 3. Hide ACF field group menu item
//add_filter('acf/settings/show_admin', '__return_false');

// 4. Include ACF
include_once( get_stylesheet_directory() . '/acf/acf.php' );

// Dev Google maps key
// AIzaSyBHMxEO9Xi1gnDzjxhhqo4CA8Nczf9EZS4

function my_acf_google_map_api( $api ){

	$api['key'] = 'AIzaSyBHMxEO9Xi1gnDzjxhhqo4CA8Nczf9EZS4';

	return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


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
		'update_button' => __('Save Settings', 'acf'),
		'updated_message'	=> __("Settings Saved", 'acf'),
	));

		acf_add_options_page(array(
			'page_title' 	=> 'Multisite Google Analytics',
			'menu_title'	=> 'Multisite GA',
			'menu_slug' 	=> 'caweb-multisite-ga',
			'parent_slug'   => 'caweb-options',
			'capability'    => 'activate_plugins',
			'redirect'		=> false,
			'update_button' => __('Save Settings', 'acf'),
			'updated_message'	=> __("Settings Saved", 'acf'),
		));

		acf_add_options_page(array(
			'page_title' 	=> 'JavaScript',
			'menu_title'	=> '',
			'menu_slug' 	=> 'caweb-javascript',
			'parent_slug'   => 'caweb-options',
			'capability'    => 'activate_plugins',
			'redirect'		=> false,
			'update_button' => __('Save Settings', 'acf'),
			'updated_message'	=> __("Settings Saved", 'acf'),
		));

	function remove_admin_submenus() {

		remove_submenu_page( 'themes.php', 'nav-menus.php' ); // Remove Menus

		if ( !is_super_admin() ) {
			remove_submenu_page('caweb-options', 'caweb-multisite-ga');
			remove_submenu_page('caweb-options', 'caweb-javascript');
			remove_menu_page( 'et_divi_options' );
		}

		if ( !is_multisite() ) {
			remove_submenu_page('caweb-options', 'caweb-multisite-ga');

		}
	}

	add_action( 'admin_init', 'remove_admin_submenus' );

	function add_submenu_item() {
		 add_submenu_page('caweb-options', 'Menus', 'Menus', 'edit_posts', 'nav-menus.php');
	}
	add_action( 'admin_init', 'add_submenu_item' );
}
