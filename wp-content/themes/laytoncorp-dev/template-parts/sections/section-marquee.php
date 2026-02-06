<?php
/**
 * Marquee Section (Partners/Clients)
 *
 * @package Laytoncorp
 */

$enable = get_theme_mod( 'marquee_enable', false );

if ( ! $enable ) {
    return;
}

$title = get_theme_mod( 'marquee_title', 'Trusted by Industry Leaders' );

// Gather Logos
$logos = array();
for ( $i = 1; $i <= 6; $i++ ) {
    $logo_id = get_theme_mod( "marquee_logo_{$i}" );
    if ( $logo_id ) {
        $logos[] = wp_get_attachment_image_url( $logo_id, 'medium' );
    }
}

// Fallback Logos if none are set, just to show something in preview if enabled
if ( empty( $logos ) && is_customize_preview() ) {
    // Just placeholder logic for preview
    $logos = array_fill( 0, 6, get_template_directory_uri() . '/assets/images/placeholder-brand.jpg' ); 
}

if ( empty( $logos ) ) {
    return;
}
?>

<section id="partners-marquee" class="section-marquee">
    <div class="container">
        <?php if ( $title ) : ?>
            <p class="marquee-label"><?php echo esc_html( $title ); ?></p>
        <?php endif; ?>
    </div>

    <div class="marquee-wrapper">
        <div class="marquee-track">
            <?php 
            // Repeat twice for infinite effect
            for ( $k = 0; $k < 2; $k++ ) : 
                foreach ( $logos as $logo_url ) : ?>
                    <div class="marquee-item">
                        <img src="<?php echo esc_url( $logo_url ); ?>" alt="Partner Logo">
                    </div>
                <?php endforeach; 
            endfor; 
            ?>
             <?php 
            // Repeat again just to be safe for wide screens
            for ( $k = 0; $k < 2; $k++ ) : 
                foreach ( $logos as $logo_url ) : ?>
                    <div class="marquee-item">
                        <img src="<?php echo esc_url( $logo_url ); ?>" alt="Partner Logo">
                    </div>
                <?php endforeach; 
            endfor; 
            ?>
        </div>
    </div>
</section>
