<?php
/**
 * The header for our app section
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CalCoin
 */

if ( !is_user_logged_in() ) {
    //wp_redirect( home_url( '/login/' ) );
}

$user = wp_get_current_user();
$user_id = $user->ID;

global $address;
$address = get_field('wallet_address', 'user_' . $user_id);

?>

<!doctype html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header>
	<h1><?php echo esc_html( get_the_title() ); ?></h1>
</header>
<main id="swup" class="transition-fade">
