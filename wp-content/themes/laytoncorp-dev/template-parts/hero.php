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

// CTA 
$cta_text = get_theme_mod( 'hero_cta_text' );
if ( ! $cta_text && $cta_text !== '' ) { // Check for false (not set), allow empty string
    $cta_text = lc_field( 'hero_cta_text', 'Get in touch' );
}

$cta_link = get_theme_mod( 'hero_cta_link' );
if ( ! $cta_link ) {
    $cta_link = '#contact'; 
}


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
$video_loop = true;
$video_muted = true;

if ( 'video' === $hero_mode ) {
    $customizer_video_id = get_theme_mod( 'hero_video_id' );
    if ( $customizer_video_id ) {
        $video_url = wp_get_attachment_url( $customizer_video_id );
    } else {
        $video_url = lc_field( 'hero_video_mp4', get_template_directory_uri() . '/assets/videos/hero-loop.mp4' );
    }
    
    // Check Customizer settings (default to true if not set/saved yet)
    $video_loop = get_theme_mod( 'hero_video_loop', true );
    $video_muted = get_theme_mod( 'hero_video_muted', true );

    // Customizer poster logic
    $customizer_poster_id = get_theme_mod( 'hero_video_poster' );
    if ( $customizer_poster_id ) {
        $poster_url = wp_get_attachment_url( $customizer_poster_id );
    } else {
        $poster_url = lc_field( 'hero_video_poster', $default_poster );
    }
}

?>

<section id="hero" class="hero-section hero-mode-<?php echo esc_attr( $hero_mode ); ?>">

	<?php if ( 'image' === $hero_mode ) : ?>
		
		<div class="hero-background">
			<img src="<?php echo esc_url( $image_url ); ?>" alt="Laytoncorp Hero">
		</div>
		<div class="hero-overlay"></div>
		
		<div class="hero-content">
			<h1 class="hero-title animate-on-scroll fade-in-up"><?php echo esc_html( $headline ); ?></h1>
			<p class="hero-subtitle animate-on-scroll fade-in-up delay-200"><?php echo esc_html( $subheadline ); ?></p>
			<?php if ( $cta_text ) : ?>
				<a href="<?php echo esc_url( $cta_link ); ?>" class="btn animate-on-scroll fade-in-up delay-300"><?php echo esc_html( $cta_text ); ?></a>
			<?php endif; ?>
		</div>

	<?php elseif ( 'video' === $hero_mode ) : ?>

		<div class="hero-background">
			<video autoplay playsinline 
                <?php echo $video_muted ? 'muted' : ''; ?> 
                <?php echo $video_loop ? 'loop' : ''; ?> 
                poster="<?php echo esc_url( $poster_url ); ?>">
				<source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
				<img src="<?php echo esc_url( $poster_url ); ?>" alt="Laytoncorp Hero">
			</video>
		</div>
		<div class="hero-overlay"></div>

		<div class="hero-content">
			<h1 class="hero-title animate-on-scroll fade-in-up"><?php echo esc_html( $headline ); ?></h1>
			<p class="hero-subtitle animate-on-scroll fade-in-up delay-200"><?php echo esc_html( $subheadline ); ?></p>
			<?php if ( $cta_text ) : ?>
				<a href="<?php echo esc_url( $cta_link ); ?>" class="btn animate-on-scroll fade-in-up delay-300"><?php echo esc_html( $cta_text ); ?></a>
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
			<h1 class="hero-title animate-on-scroll fade-in-up"><?php echo esc_html( $headline ); ?></h1>
			<p class="hero-subtitle animate-on-scroll fade-in-up delay-200"><?php echo esc_html( $subheadline ); ?></p>
			<?php if ( $cta_text ) : ?>
				<a href="<?php echo esc_url( $cta_link ); ?>" class="btn animate-on-scroll fade-in-up delay-300"><?php echo esc_html( $cta_text ); ?></a>
			<?php endif; ?>
		</div>

    <?php elseif ( 'marquee' === $hero_mode ) : ?>
        <!-- Marquee implementation (retained from previous steps if it existed, otherwise basic placeholder) -->
        <div class="hero-content">
            <h1 class="hero-title"><?php echo esc_html( $headline ); ?></h1>
        </div>
        
	<?php endif; ?>

</section>
