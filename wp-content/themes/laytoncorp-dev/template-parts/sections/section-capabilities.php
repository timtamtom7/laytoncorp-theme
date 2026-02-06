<?php
/**
 * Template part for displaying the capabilities (features) section
 *
 * @package Laytoncorp
 */

$title = get_theme_mod( 'features_title', 'Capabilities' );
?>

<section id="capabilities" class="section-capabilities">
	<div class="container">
		<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
		
		<div class="features-grid">
			<?php for ( $i = 1; $i <= 4; $i++ ) : 
				$f_title = get_theme_mod( "feature_{$i}_title", "Feature {$i}" );
				$f_text  = get_theme_mod( "feature_{$i}_text", "Description for feature {$i}." );
				$f_img_id = get_theme_mod( "feature_{$i}_image" );
			?>
				<div class="feature-card feature-card-<?php echo $i; ?>">
					<div class="feature-image-wrapper">
						<?php if ( $f_img_id ) : ?>
							<?php echo wp_get_attachment_image( $f_img_id, 'medium', false, array( 'class' => 'feature-img' ) ); ?>
						<?php endif; ?>
					</div>
					<h3 class="feature-title"><?php echo esc_html( $f_title ); ?></h3>
					<p class="feature-text"><?php echo nl2br( esc_html( $f_text ) ); ?></p>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
