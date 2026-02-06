<?php
/**
 * Template part for displaying the hero section
 *
 * Supports modes: 'image' (default), 'video', 'typography', 'slideshow', 'marquee'
 *
 * @package Laytoncorp
 */

// Configuration (will be replaced by ACF later)
$hero_mode = 'image'; // Options: 'image', 'video', 'typography', 'slideshow', 'marquee'
// $hero_mode = 'video';
// $hero_mode = 'typography';
// $hero_mode = 'slideshow';
// $hero_mode = 'marquee';

$headline = "Laytoncorp builds what matters.";
$subheadline = "Infrastructure, innovation, and materials for a changing world.";
$cta_text = "Discover More";
$cta_link = "#about";

?>

<section id="hero" class="hero-section hero-mode-<?php echo esc_attr( $hero_mode ); ?>">

	<?php if ( 'image' === $hero_mode ) : ?>
		
		<div class="hero-background">
			<!-- Placeholder for Mode A -->
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-slide-1.jpg" alt="Laytoncorp Hero">
		</div>
		<div class="hero-overlay"></div>
		
		<div class="hero-content">
			<h1 class="hero-title"><?php echo esc_html( $headline ); ?></h1>
			<p class="hero-subtitle"><?php echo esc_html( $subheadline ); ?></p>
			<?php if ( $cta_text ) : ?>
				<a href="<?php echo esc_url( $cta_link ); ?>" class="btn"><?php echo esc_html( $cta_text ); ?></a>
			<?php endif; ?>
		</div>

	<?php elseif ( 'video' === $hero_mode ) : ?>

		<div class="hero-background">
			<video autoplay muted loop playsinline poster="<?php echo get_template_directory_uri(); ?>/assets/images/hero-poster.jpg">
				<source src="<?php echo get_template_directory_uri(); ?>/assets/videos/hero-loop.mp4" type="video/mp4">
				<!-- Fallback to image if video not supported/fails -->
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-poster.jpg" alt="Laytoncorp Hero">
			</video>
		</div>
		<div class="hero-overlay"></div>

		<div class="hero-content">
			<h1 class="hero-title"><?php echo esc_html( $headline ); ?></h1>
			<p class="hero-subtitle"><?php echo esc_html( $subheadline ); ?></p>
			<?php if ( $cta_text ) : ?>
				<a href="<?php echo esc_url( $cta_link ); ?>" class="btn"><?php echo esc_html( $cta_text ); ?></a>
			<?php endif; ?>
		</div>

	<?php elseif ( 'typography' === $hero_mode ) : ?>

		<div class="hero-content">
			<h1 class="hero-title">Building at the scale of impact.</h1>
		</div>

	<?php elseif ( 'slideshow' === $hero_mode ) : ?>

		<div class="hero-slideshow">
			<div class="hero-slide active">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-slide-1.jpg" alt="Slide 1">
			</div>
			<div class="hero-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-slide-2.jpg" alt="Slide 2">
			</div>
			<div class="hero-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-slide-3.jpg" alt="Slide 3">
			</div>
		</div>
		<div class="hero-overlay"></div>

		<div class="hero-content">
			<h1 class="hero-title"><?php echo esc_html( $headline ); ?></h1>
			<p class="hero-subtitle"><?php echo esc_html( $subheadline ); ?></p>
			<?php if ( $cta_text ) : ?>
				<a href="<?php echo esc_url( $cta_link ); ?>" class="btn"><?php echo esc_html( $cta_text ); ?></a>
			<?php endif; ?>
		</div>

	<?php elseif ( 'marquee' === $hero_mode ) : ?>

		<div class="marquee-container">
			<div class="marquee-track">
				<!-- Duplicate set for seamless loop -->
				<?php for ($i = 0; $i < 2; $i++) : ?>
					<div class="marquee-item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/marquee-1.jpg" alt="Marquee 1"></div>
					<div class="marquee-item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/marquee-2.jpg" alt="Marquee 2"></div>
					<div class="marquee-item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/marquee-3.jpg" alt="Marquee 3"></div>
					<div class="marquee-item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/marquee-4.jpg" alt="Marquee 4"></div>
					<div class="marquee-item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/marquee-5.jpg" alt="Marquee 5"></div>
					<div class="marquee-item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/marquee-6.jpg" alt="Marquee 6"></div>
				<?php endfor; ?>
			</div>
		</div>

	<?php endif; ?>

</section>
