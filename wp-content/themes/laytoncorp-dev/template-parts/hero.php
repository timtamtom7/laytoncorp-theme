<?php
/**
 * Template part for displaying the hero section
 *
 * Supports modes: 'image' (default), 'video', 'typography', 'slideshow', 'marquee'
 *
 * @package Laytoncorp
 */

// ACF Fields with Fallbacks using lc_field helper
$hero_mode    = lc_field( 'hero_mode', 'image' );
$headline     = lc_field( 'hero_headline', 'Laytoncorp builds what matters.' );
$subheadline  = lc_field( 'hero_subtext', 'Infrastructure, innovation, and materials for a changing world.' );
$cta_text     = lc_field( 'hero_cta_text', 'Get in touch' );
$cta_link     = '#contact'; // Anchored to contact section

// Media Fallbacks
$default_poster = get_template_directory_uri() . '/assets/images/hero-poster.jpg';
$default_slide  = get_template_directory_uri() . '/assets/images/hero-slide-1.jpg';

?>

<section id="hero" class="hero-section hero-mode-<?php echo esc_attr( $hero_mode ); ?>">

	<?php if ( 'image' === $hero_mode ) : 
		$image_url = lc_field( 'hero_image', $default_slide );
	?>
		
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

	<?php elseif ( 'video' === $hero_mode ) : 
		$video_url = lc_field( 'hero_video_mp4', get_template_directory_uri() . '/assets/videos/hero-loop.mp4' );
		$poster_url = lc_field( 'hero_video_poster', $default_poster );
	?>

		<div class="hero-background">
			<video autoplay muted loop playsinline poster="<?php echo esc_url( $poster_url ); ?>">
				<source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
				<!-- Fallback to image if video not supported/fails -->
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

	<?php elseif ( 'marquee' === $hero_mode ) : 
		$marquee_images = lc_field( 'hero_marquee_images' );
		if ( empty( $marquee_images ) ) {
			// Fallback images
			$marquee_images = array();
			for ( $i = 1; $i <= 6; $i++ ) {
				$marquee_images[] = array( 'marquee_image' => get_template_directory_uri() . "/assets/images/marquee-{$i}.jpg" );
			}
		}
	?>

		<div class="marquee-container">
			<div class="marquee-track">
				<!-- Duplicate set for seamless loop -->
				<?php for ( $i = 0; $i < 4; $i++ ) : // Increased duplication for wider screens/seamless loop ?>
					<?php foreach ( $marquee_images as $item ) : 
						$img_src = isset($item['marquee_image']) ? $item['marquee_image'] : '';
						if ( ! $img_src ) continue;
					?>
						<div class="marquee-item">
							<img src="<?php echo esc_url( $img_src ); ?>" alt="Marquee Image">
						</div>
					<?php endforeach; ?>
				<?php endfor; ?>
			</div>
		</div>

	<?php endif; ?>

</section>
