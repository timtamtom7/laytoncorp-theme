<?php
/**
 * Template part for displaying the hero section
 *
 * Supports modes: 'image' (default), 'video', 'typography', 'slideshow', 'marquee'
 * Prioritizes Theme Customizer settings, falls back to ACF.
 *
 * @package Laytoncorp
 */

// 1. Resolve Data Sources (Customizer > ACF > Default)
// We use get_theme_mod without a default 2nd arg so it returns false if not set/saved yet.

// Mode
$hero_mode = get_theme_mod( 'hero_display_mode' );
if ( ! $hero_mode ) {
	$hero_mode = lc_field( 'hero_mode', 'image' );
}

// Headline
$headline = get_theme_mod( 'hero_headline' );
if ( ! $headline ) {
	$headline = lc_field( 'hero_headline', 'Laytoncorp builds what matters.' );
}

// Subtext
$subheadline = get_theme_mod( 'hero_subtext' );
if ( ! $subheadline ) {
	$subheadline = lc_field( 'hero_subtext', 'Infrastructure, innovation, and materials for a changing world.' );
}

// CTA (Not in Customizer yet, strict ACF/Hardcode for now)
$cta_text = lc_field( 'hero_cta_text', 'Get in touch' );
$cta_link = '#contact'; 

// Media Fallbacks
$default_poster = get_template_directory_uri() . '/assets/images/hero-poster.jpg';
$default_slide  = get_template_directory_uri() . '/assets/images/hero-slide-1.jpg';

// Image Logic
$image_url = '';
if ( 'image' === $hero_mode ) {
	$customizer_image_id = get_theme_mod( 'hero_image' );
	if ( $customizer_image_id ) {
		$image_url = wp_get_attachment_url( $customizer_image_id );
	} else {
		$image_url = lc_field( 'hero_image', $default_slide );
	}
}

// Video Logic
$video_url = '';
if ( 'video' === $hero_mode ) {
    $customizer_video = get_theme_mod( 'hero_video_url' );
    if ( $customizer_video ) {
        $video_url = $customizer_video;
    } else {
        $video_url = lc_field( 'hero_video_mp4', get_template_directory_uri() . '/assets/videos/hero-loop.mp4' );
    }
    $poster_url = lc_field( 'hero_video_poster', $default_poster );
}

?>

<section id="hero" class="hero-section hero-mode-<?php echo esc_attr( $hero_mode ); ?>">

	<?php if ( 'image' === $hero_mode ) : ?>
		
		<div class="hero-background">
			<img src="<?php echo esc_url( $image_url ); ?>" alt="Laytoncorp Hero">
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
			<video autoplay muted loop playsinline poster="<?php echo esc_url( $poster_url ); ?>">
				<source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
				<img src="<?php echo esc_url( $poster_url ); ?>" alt="Laytoncorp Hero">
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
			<h1 class="hero-title"><?php echo esc_html( $headline ); ?></h1>
		</div>

	<?php elseif ( 'slideshow' === $hero_mode ) : 
		$slides = lc_field( 'hero_slides' );
		if ( empty( $slides ) ) {
			// Fallback slides
			$slides = array(
				array( 'slide_image' => get_template_directory_uri() . '/assets/images/hero-slide-1.jpg' ),
				array( 'slide_image' => get_template_directory_uri() . '/assets/images/hero-slide-2.jpg' ),
				array( 'slide_image' => get_template_directory_uri() . '/assets/images/hero-slide-3.jpg' ),
			);
		}
	?>

		<div class="hero-slideshow">
			<?php foreach ( $slides as $index => $slide ) : 
				$active_class = ( 0 === $index ) ? 'active' : '';
				$img_src = isset($slide['slide_image']) ? $slide['slide_image'] : '';
				if ( ! $img_src ) continue;
			?>
				<div class="hero-slide <?php echo esc_attr( $active_class ); ?>">
					<img src="<?php echo esc_url( $img_src ); ?>" alt="Slide <?php echo esc_attr( $index + 1 ); ?>">
				</div>
			<?php endforeach; ?>
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
        <!-- Marquee implementation (retained from previous steps if it existed, otherwise basic placeholder) -->
        <div class="hero-content">
            <h1 class="hero-title"><?php echo esc_html( $headline ); ?></h1>
        </div>
        
	<?php endif; ?>

</section>
