<?php

// stylesheets to hide certain fields in ACF

function acf_styles() {
  echo '<style>
    .menu-item-depth-0 [data-name="item_size"], .menu-item-depth-0 [data-name="description"] {
        display: none;
    }
    .menu-item-depth-1 [data-name="menu_layout"], .menu-item-depth-1 [data-name="sub_link_size"] {
        display: none;
    }
  </style>';
}

add_action('admin_head', 'acf_styles');

// change logo to caweb and check if there is a custom logo 

function custom_login_logo() { 
	$general_settings = get_field('general_settings', 'option');
	$logo = $general_settings['organization_logo'];
	?>

    <style type="text/css">
        #login h1 a, .login h1 a {
	        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/login-logo.png);
			height: 80px;
			width: 100%;
			background-size: auto;
			background-repeat: no-repeat;
			background-size: contain;
	       	padding-bottom: 0;
        }

        .login #nav {
        	font-weight: bold;
        }

        .login #nav, .login #backtoblog {
			text-align: center;
        }
		
		<?php if ($logo): ?>
	        #login h1 a, .login h1 a {
				background-image: url(<?php echo($logo); ?>);
	        }
   		<?php endif; ?>

    </style>
<?php }

add_action( 'login_enqueue_scripts', 'custom_login_logo' );

// change logged in as text

function replace_wordpress_howdy( $wp_admin_bar ) {
	$my_account = $wp_admin_bar->get_node('my-account');
    $newtext = str_replace( 'Howdy,', 'Logged in as: ', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtext,
    ) );
}

add_filter( 'admin_bar_menu', 'replace_wordpress_howdy', 25 );