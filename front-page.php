<?php
/**
 * Default front page
 *
 * @package CalCoin
 */
get_header();
$hero_title = get_field( "hero_title" );
$hero_sub_title = get_field( "hero_sub_title" );
$hero_button_text = get_field( "hero_button_text" );
$hero_button_url = get_field( "hero_button_url" );

$cta_title = get_field( "cta_title" );
$cta_description= get_field( "cta_description" );
$cta_link_text = get_field( "cta_link_text" );
$cta_link_url = get_field( "cta_link_url" );

$why_use_title = get_field( "why_use_title" );
$why_use_subtitle = get_field( "why_use_subtitle" );
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
				<h1><?php echo esc_attr($hero_title); ?></h1>
				<p><?php echo esc_attr($hero_sub_title); ?></p>
				<a class="button button-white create-account-button" href="<?php echo esc_url($hero_button_url); ?>"><?php echo esc_attr($hero_button_text); ?></a>
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

		<?php if( have_rows('how_blocks') ): $count = 0; $count_text = 0; $count_image = 0 ?>

		<div class="small-12 medium-12 large-8 columns">

			<h2 class="text-center"><strong>How does CalCoin work?</strong></h2>

			<div class="row large-up-3 what-tabs">

				<?php while( have_rows('how_blocks') ): the_row();

					$icon = get_sub_field('icon');
					$icon_title = get_sub_field('icon_title');

				?>

				<div class="column text-center">
					<div class="card">
						<a class="what-is-tab <?php if (!$count) { echo('is-active'); } ?>" id="<?php echo esc_attr($icon_title); ?>">
							<i class="la <?php echo esc_attr($icon); ?>"></i>
							<?php echo esc_attr($icon_title); ?>
						</a>
					</div>
				</div>

				<?php
				$count++;
				endwhile; ?>

			</div>



			<div class="row">
				<div class="column what-is-content">
					<?php while( have_rows('how_blocks') ): the_row();

						$icon_title = get_sub_field('icon_title');
						$title = get_sub_field('title');
						$description = get_sub_field('description');

					?>
					<div id="<?php echo esc_attr($icon_title); ?>-text" class="what-is-text <?php if (!$count_text) { echo('is-active'); } ?> text-center">
						<h3><?php echo esc_attr($title); ?></h3>
						<p><?php echo esc_attr($description); ?></p>
					</div>
					<?php
					$count_text++;
					endwhile; ?>
				</div>
			</div>
		</div>
		<div class="small-12 medium-12 large-4 columns">
			<?php while( have_rows('how_blocks') ): the_row();

				$icon_title = get_sub_field('icon_title');
				$image = get_sub_field('image');

			?>
			<div id="<?php echo esc_attr($icon_title); ?>-image" class="what-is-screen <?php if (!$count_image) { echo('is-active'); } ?>">
				<img src="<?php echo esc_url($image['url']); ?>">
			</div>
			<?php
			$count_image++;
			endwhile; ?>
		</div>

		<?php endif; ?>
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
			<h3><?php echo esc_attr($cta_title); ?></h3>
			<p><?php echo esc_attr($cta_description); ?></p>
			<p><a href="<?php echo esc_attr($cta_link_url); ?>"><?php echo esc_attr($cta_link_text); ?> <i class="la la-angle-right"></i></a></p>
		</div>
		<div class="small-12 medium-12 large-6 columns align-self-bottom">
			<?php if( have_rows('cta_images') ): ?>
			<div class="whitepaper-images">

				<?php while( have_rows('cta_images') ): the_row();

					$image = get_sub_field('image');

				?>
					<div class="wow animated fadeInUp faster"><img src="<?php echo esc_url($image['url']); ?>"></div>
				<?php endwhile; ?>

			</div>
			<?php endif; ?>
		</div>
</section>
<section class="why-section">
	<div class="row">
		<div class="small-12 columns">
			<h2><strong><?php echo esc_attr($why_use_title); ?></strong></h2>
			<p><?php echo esc_attr($why_use_subtitle); ?></p>

			<?php if( have_rows('why_use_blocks') ): ?>
			<div class="row why-blocks">
				<?php while( have_rows('why_use_blocks') ): the_row();

					$icon = get_sub_field('icon');
					$title = get_sub_field('title');
					$subtitle = get_sub_field('subtitle');

				?>

				<div class="small-12 medium-12 large-3 columns">
					<div class="why-block">
						<i class="la <?php echo esc_attr($icon); ?>"></i>
						<h3><?php echo esc_attr($title); ?></h3>
						<p><?php echo esc_attr($subtitle); ?></p>
					</div>
				</div>

				<?php endwhile; ?>

			</div>
			<?php endif; ?>
			<p class="why-button"><a class="button create-account-button" href="<?php echo esc_url($hero_button_url); ?>"><?php echo esc_attr($hero_button_text); ?></a></p>
		</div>
	</div>
</section>

<?php

get_footer();
