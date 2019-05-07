<?php

/* On theme activation try and import existing theme settings
--------------------------------------------------------------------------------------*/

add_action('after_switch_theme', 'caweb_theme_activate');

function caweb_theme_activate() {

	if(get_option('caweb_theme_activated') != '1') {

		$blog_id = get_current_blog_id();

        update_option( 'caweb_theme_activated', '1' );

        $updated = array();

        $logo = get_option('header_ca_branding');

        if ($logo) {
		 	$logo_id = attachment_url_to_postid($logo);
		 	update_option('options_general_settings_organization_logo', $logo_id);
			$updated[] = 'logo - ID: ' . $logo_id;
		 }

		// look for a logo (must be attachment id)

		// if (is_multisite()) {
		// 	$logo = get_blog_option($blog_id, 'header_ca_branding');
		// } else {
		// 	$logo = get_option('header_ca_branding');
		// }


		// if ($logo) {
		// 	$logo_id = attachment_url_to_postid($logo);

		// 	if(is_multisite()) {
		// 		update_blog_option($blog_id, 'options_general_settings_organization_logo', $logo_id);
		// 		$updated[] = 'logo';
		// 	} else {
		// 		update_option('options_general_settings_organization_logo', $logo_id);
		// 		$updated[] = 'logo';
		// 	}
		// }

		// look for favicon (must be attachment id)
		$favicon = get_option('ca_fav_ico');
		if ($favicon) {
			$favicon_id = attachment_url_to_postid($favicon);
			update_option('options_general_settings_fav_icon', $favicon_id);
			$updated[] = 'favicon';

		}

		// look for all other non image fields
		$fields = array(
			'ca_site_color_scheme' => 'options_general_settings_color_scheme',
			'ca_google_analytic_id' => 'options_google_analytics',
			'ca_google_search_id' => 'options_google_search_engine_id',
			'ca_sticky_navigation' => 'options_general_settings_use_sticky_navigation',
			'ca_frontpage_search_enabled' => 'options_general_settings_show_search_on_front_page',
			'ca_google_trans_enabled' => 'options_google_enable_google_translate',
			'ca_contact_us_link' => 'options_utility_header_contact_us_page',
			'ca_geo_locator_enabled' => 'options_utility_header_enable_geo_locator',
			'ca_google_meta_id' => 'options_google_meta_id',
			'ca_custom_css' => 'options_custom_css',
			'ca_social_facebook' => 'options_facebook_url',
			'ca_social_facebook_header' => 'options_facebook_show_in_header',
			'ca_social_facebook_footer' => 'options_facebook_show_in_footer',
			'ca_social_facebook_new_window' => 'options_facebook_open_in_new_tab',
			'ca_social_twitter' => 'options_twitter_url',
			'ca_social_twitter_header' => 'options_twitter_show_in_header',
			'ca_social_twitter_footer' => 'options_twitter_show_in_footer',
			'ca_social_twitter_new_window' => 'options_twitter_open_in_new_tab',
			'ca_social_email' => 'options_share_via_email',
			'ca_social_email_header' => 'options_share_via_email_show_in_header',
			'ca_social_email_footer' => 'options_share_via_email_show_in_footer',
			'ca_social_flickr' => 'options_flickr_url',
			'ca_social_flickr_header' => 'options_flickr_show_in_header',
			'ca_social_flickr_footer' => 'options_flickr_show_in_footer',
			'ca_social_flickr_new_window' => 'options_flickr_open_in_new_tab',
			'ca_social_pinterest' => 'options_pinterest_url',
			'ca_social_pinterest_header' => 'options_pinterest_show_in_header',
			'ca_social_pinterest_footer' => 'options_pinterest_show_in_footer',
			'ca_social_pinterest_new_window' => 'options_pinterest_open_in_new_tab',
			'ca_social_youtube' => 'options_youtube_url',
			'ca_social_youtube_header' => 'options_youtube_show_in_header',
			'ca_social_youtube_footer' => 'options_youtube_show_in_footer',
			'ca_social_youtube_new_window' => 'options_youtube_open_in_new_tab',
			'ca_social_instagram' => 'options_instagram_url',
			'ca_social_instagram_header' => 'options_instagram_show_in_header',
			'ca_social_instagram_footer' => 'options_instagram_show_in_footer',
			'ca_social_instagram_new_window' => 'options_instagram_open_in_new_tab',
			'ca_social_linkedin' => 'options_linkedin_url',
			'ca_social_linkedin_header' => 'options_linkedin_show_in_header',
			'ca_social_linkedin_footer' => 'options_linkedin_show_in_footer',
			'ca_social_linkedin_new_window' => 'options_linkedin_open_in_new_tab',
			'ca_social_rss' => 'options_rss_url',
			'ca_social_rss_header' => 'options_rss_show_in_header',
			'ca_social_rss_footer' => '_options_rss_show_in_footer',
			'ca_social_rss_new_window' => 'options_rss_open_in_new_tab',
			'ca_home_nav_link' => 'options_utility_header_home_link_in_utility_header',
			'ca_utility_link_1' => 'options_utility_header_custom_link_1_custom_link_1_url',
			'ca_utility_link_2' => 'options_utility_header_custom_link_2_custom_link_2_url',
			'ca_utility_link_3' => 'options_utility_header_custom_link_3_custom_link_3_url',
			'ca_utility_link_1_name' => 'options_utility_header_custom_link_1_custom_link_1_text',
			'ca_utility_link_2_name' => 'options_utility_header_custom_link_2_custom_link_2_text',
			'ca_utility_link_3_name' => 'options_utility_header_custom_link_3_custom_link_3_text',
			'ca_utility_link_1_new_window' => 'options_utility_header_custom_link_1_open_custom_link_1_in_new_tab',
			'ca_utility_link_2_new_window' => 'options_utility_header_custom_link_2_open_custom_link_2_in_new_tab',
			'ca_utility_link_3_new_window' => 'options_utility_header_custom_link_3_open_custom_link_3_in_new_tab',
			'ca_google_trans_page' => 'options_google_custom_translate_translate_page_url',
			'ca_google_trans_icon' => 'options_google_custom_translate_translate_icon',
			'ca_google_trans_enabled' => 'options_google_enable_google_translate'

		);

		// get each of the fields and update the values
		foreach ($fields as $field_name => $field_key) {
	    	$value = get_option($field_name);

	      	if ($value != '') {
	        	update_option($field_key, $value);
	        	$updated[] = $field_name;
	      	}
	    }

	    // get header menu

	    $menu_name = get_term(get_nav_menu_locations()['header-menu'], 'nav_menu')->name;
	    $menu = wp_get_nav_menu_object( $menu_name );
	    $menuitems = wp_get_nav_menu_items( $menu->term_id );

	    // get exsisting menu item metadata

		foreach ($menuitems as $item) {
			$icon = get_post_meta( $item->ID, '_caweb_menu_icon', true );
			$unit = get_post_meta( $item->ID, '_caweb_menu_unit_size', true );
			update_field('icon', 'ca-gov-icon-' . $icon, $item->ID);
			update_field('item_size', $unit, $item->ID);
		}

	    // tell us what we updated
	    if ($updated != '') {
	    	echo('<div class="notice notice-success is-dismissible"><p>Migrated the following: </p>');
		    foreach ($updated as $key => $item) {
		    	echo('<li>' . $item . '</li>');
		    }
		    echo('</div>');
	    }

    }

}

/* On theme deactivation clear out the caweb_theme_activated value to reimport
--------------------------------------------------------------------------------------*/

add_action('switch_theme', 'caweb_theme_deactivate');

function caweb_theme_deactivate () {
  update_option( 'caweb_theme_activated', '0' );
}
