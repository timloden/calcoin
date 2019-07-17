<?php
/**
 * Default front page
 *
 * @package CalCoin
 */
get_header();

?>
<div class="row">
	<div class="small-12 columns header-wrapper">
		<header class="home">
			<a href="/"><img class="header-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/calcoin-logo-white.png"></a>
			<div class="buttons">
				<a class="button button-hollow small" href="/login">Login</a>
				<a class="button button-hollow small" href="/signup"><strong>Signup</strong></a>
			</div>
		</header>
	</div>
</div>
<div class="hero">
	<div class="hero-content">
		<div class="row align-center">
			<div class="large-8 columns">
				<h1>Your Digital Benefits</h1>
				<p>CalCoin is a digital currency that the state sends to you instead of paper vouchers for programs such as WIC, CalFresh and FMNP. You spend this currency in approved stores using your CalCoin wallet on your phone.</p>
				<a class="button button-white create-account-button" href="/signup">Create Your Account</a>
			</div>
		</div>
		<div class="row hero-continue">
			<div class="columns text-center">
				<p class="no-bottom"><a href="#learn">Learn more</a></p>
				<a data-scroll class="hero-arrow" href="#learn"><i class="la la-arrow-down"></i></a>
			</div>
		</div>
	</div>
	<div class="video-wrapper">

		<div class="video-container">

			<div class="video-overlay"></div>
			<video autoplay preload loop muted>
				<source src="https://calcoin.azureedge.net/media/calcoin-video-hero.mp4" type="video/mp4">
			</video>
		</div>

	</div>
</div>
<section id="learn" class="learn-section">
	<div class="row">
		<div class="small-12 medium-12 large-8 columns">
			<h2 class="text-center"><strong>How does CalCoin work?</strong></h2>
			<!-- <div class="divider"></div> -->


			<div class="row large-up-3 what-tabs">
				<div class="column text-center">
					<div class="card">
						<a class="what-is-tab is-active" id="signup">
							<i class="la la-user"></i>
							Signup
						</a>
					</div>
				</div>
				<div class="column text-center">
					<div class="card">
						<a class="what-is-tab" id="recieve">
							<i class="la la-mobile-phone"></i>
							Recieve
						</a>
					</div>
				</div>
				<div class="column text-center">
					<div class="card">
						<a class="what-is-tab" id="spend">
							<i class="la la-qrcode"></i>
							Spend
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="column what-is-content">
					<div id="signup-text" class="what-is-text is-active text-center">
						<h3>Signup for a free digital wallet</h3>
						<p>Create your account and connect your existing benefits to your CalCoin account for free.</p>
					</div>
					<div id="recieve-text" class="what-is-text text-center">
						<h3>Recieve your benefits directly</h3>
						<p>CalCoin are sent to your digital wallet directly instead of paper checks or vouchers.</p>
					</div>
					<div id="spend-text" class="what-is-text text-center">
						<h3>Spend at locations all of California</h3>
						<p>Use CalCoin at any participating retail location or farmers market that accepts CalCoin.</p>
					</div>
					<div class="what-is-button text-center">
						<a class="button button-primary" href="/signup">Get Started Today</a>
					</div>
				</div>
			</div>
		</div>
		<div class="small-12 medium-12 large-4 columns">
			<div id="signup-image" class="what-is-screen is-active">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/dashboard-screen.png">
			</div>
			<div id="recieve-image" class="what-is-screen">
				<img class="mobile-screen" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/wallet-overlay-screen.png">
			</div>
			<div id="spend-image" class="what-is-screen">
				<img class="mobile-screen" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/wallet-overlay-screen.png">
			</div>
		</div>
	</div>
	<div class="row align-center logos">
		<div class="small-12 medium-12 large-3 columns text-center">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/wic-logo.png">
		</div>
		<div class="small-12 medium-12 large-3 columns text-center">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/calfresh-logo.png">
		</div>
		<div class="small-12 medium-12 large-3 columns text-center">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/cdfa-logo.png">
		</div>
	</div>
</section>
<section class="blue-section">
	<div class="row">
		<div class="small-12 medium-12 large-6 columns">
			<h3>Learn how CalCoin saves California money</h3>
			<p>CalCoin is a digital currency that the state sends to you instead of paper vouchers for programs such as WIC, CalFresh and FMNP. You spend this currency in approved stores using your CalCoin wallet on your phone.</p>
			<p><a href="#">See the CalCoin presentation <i class="la la-angle-right"></i></a></p>
		</div>
		<div class="small-12 medium-12 large-6 columns align-self-bottom">
			<div class="whitepaper-images">
				<div class="wow animated fadeInRight faster"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/half-screenshot-1.png"></div>
				<div class="wow animated fadeInUp faster"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/half-screenshot-tall.png"></div>
				<div class="wow animated fadeInLeft faster"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/half-screenshot-1.png"></div>
			</div>
		</div>
</section>
<section class="why-section">
	<div class="row">
		<div class="small-12 columns">
			<h2><strong>Why use CalCoin?</strong></h2>
			<p>CalCoin is a digital currency that the state sends to you instead of paper vouchers for programs such as WIC, CalFresh and FMNP. You spend this currency in approved stores using your CalCoin wallet on your phone.</p>

			<div class="row why-blocks">
				<div class="small-12 medium-12 large-3 columns">
					<div class="why-block">
						<i class="la la-money"></i>
						<h3>Saves money</h3>
						<p>You spend this currency in approved stores.</p>
					</div>
				</div>
				<div class="small-12 medium-12 large-3 columns">
					<div class="why-block">
						<i class="la la-shopping-cart"></i>
						<h3>Easier for retailers</h3>
						<p>You spend this currency in approved stores.</p>
					</div>
				</div>
				<div class="small-12 medium-12 large-3 columns">
					<div class="why-block">
						<i class="la la-unlock"></i>
						<h3>Secure payments</h3>
						<p>You spend this currency in approved stores.</p>
					</div>
				</div>
				<div class="small-12 medium-12 large-3 columns">
					<div class="why-block last">
						<i class="la la-tachometer"></i>
						<h3>Instant funds</h3>
						<p>You spend this currency in approved stores.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php

get_footer();
