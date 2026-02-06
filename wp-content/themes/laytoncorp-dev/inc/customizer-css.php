<?php
/**
 * Dynamic CSS Output for Customizer Settings
 *
 * @package Laytoncorp
 */

function laytoncorp_customizer_css() {
    // --- Colors ---
    $bg_color     = get_theme_mod( 'color_bg', '#0a0a0a' );
    $text_color   = get_theme_mod( 'color_text', '#ffffff' );
    $accent_color = get_theme_mod( 'color_accent', '#3b82f6' );

    // --- Buttons ---
    $btn_bg        = get_theme_mod( 'btn_bg_color', '#ffffff' );
    $btn_text      = get_theme_mod( 'btn_text_color', '#000000' );
    $btn_radius    = get_theme_mod( 'btn_radius', '0' );
    $btn_pad_y     = get_theme_mod( 'btn_padding_y', '12' );
    $btn_pad_x     = get_theme_mod( 'btn_padding_x', '32' );
    $btn_border_w  = get_theme_mod( 'btn_border_width', '0' );
    $btn_border_c  = get_theme_mod( 'btn_border_color', 'transparent' );
    $btn_transform = get_theme_mod( 'btn_transform', 'uppercase' );

    // --- Typography ---
    $base_font_size = get_theme_mod( 'body_font_size', '16' );
    $body_line_height = get_theme_mod( 'body_line_height', '1.6' );
    
    $h1_size        = get_theme_mod( 'h1_font_size', '4' );
    $h2_size        = get_theme_mod( 'h2_font_size', '3' );
    $h3_size        = get_theme_mod( 'h3_font_size', '2' );
    
    $heading_weight = get_theme_mod( 'heading_font_weight', '700' );
    $heading_spacing = get_theme_mod( 'heading_letter_spacing', '-0.02' );

    // --- Cards ---
    $card_bg      = get_theme_mod( 'card_bg_color', '#1a1a1a' );
    $card_radius  = get_theme_mod( 'card_radius', '0' );
    $card_padding = get_theme_mod( 'card_padding', '24' );
    
    // --- Portfolio Grid ---
    $portfolio_gap  = get_theme_mod( 'portfolio_gap', '24' );
    $portfolio_cols = get_theme_mod( 'portfolio_columns', '3' );

    // --- Header ---
    $header_height      = get_theme_mod( 'header_height', '80' );
    $header_bg_scrolled = get_theme_mod( 'header_bg_scrolled', 'rgba(10,10,10,0.95)' );
    $header_logo_width  = get_theme_mod( 'header_logo_width', '150' );
    $header_menu_gap    = get_theme_mod( 'header_menu_gap', '32' );

    // --- Footer ---
    $footer_pad_y = get_theme_mod( 'footer_padding_y', '64' );
    $footer_bg    = get_theme_mod( 'footer_bg_color', '#000000' );
    $footer_text  = get_theme_mod( 'footer_text_color', '#888888' );

    // --- Layout ---
    $container_width = get_theme_mod( 'container_width', '1280' );
    $section_spacing = get_theme_mod( 'section_spacing', '96' );

    // --- Hero ---
    $hero_opacity    = get_theme_mod( 'hero_overlay_opacity', '0.3' );
    $hero_align      = get_theme_mod( 'hero_alignment', 'center' );
    $hero_title_size = get_theme_mod( 'hero_title_size', '4' );

    ?>
    <style type="text/css" id="laytoncorp-customizer-css">
        :root {
            /* Global Colors */
            --color-bg: <?php echo esc_attr( $bg_color ); ?>;
            --color-text: <?php echo esc_attr( $text_color ); ?>;
            --color-accent: <?php echo esc_attr( $accent_color ); ?>;
            
            /* Buttons */
            --btn-bg: <?php echo esc_attr( $btn_bg ); ?>;
            --btn-text: <?php echo esc_attr( $btn_text ); ?>;
            --btn-radius: <?php echo esc_attr( $btn_radius ); ?>px;
            --btn-pad-y: <?php echo esc_attr( $btn_pad_y ); ?>px;
            --btn-pad-x: <?php echo esc_attr( $btn_pad_x ); ?>px;
            --btn-border-width: <?php echo esc_attr( $btn_border_w ); ?>px;
            --btn-border-color: <?php echo esc_attr( $btn_border_c ); ?>;
            --btn-transform: <?php echo esc_attr( $btn_transform ); ?>;
            
            /* Typography */
            --font-size-base: <?php echo esc_attr( $base_font_size ); ?>px;
            --line-height-base: <?php echo esc_attr( $body_line_height ); ?>;
            --h1-size: <?php echo esc_attr( $h1_size ); ?>em;
            --h2-size: <?php echo esc_attr( $h2_size ); ?>em;
            --h3-size: <?php echo esc_attr( $h3_size ); ?>em;
            --heading-weight: <?php echo esc_attr( $heading_weight ); ?>;
            --heading-spacing: <?php echo esc_attr( $heading_spacing ); ?>em;

            /* Cards */
            --card-bg: <?php echo esc_attr( $card_bg ); ?>;
            --card-radius: <?php echo esc_attr( $card_radius ); ?>px;
            --card-padding: <?php echo esc_attr( $card_padding ); ?>px;
            --grid-gap: <?php echo esc_attr( $portfolio_gap ); ?>px;

            /* Header */
            --header-height: <?php echo esc_attr( $header_height ); ?>px;
            --header-bg-scrolled: <?php echo esc_attr( $header_bg_scrolled ); ?>;
            --header-logo-width: <?php echo esc_attr( $header_logo_width ); ?>px;
            --header-menu-gap: <?php echo esc_attr( $header_menu_gap ); ?>px;

            /* Footer */
            --footer-pad-y: <?php echo esc_attr( $footer_pad_y ); ?>px;
            --footer-bg: <?php echo esc_attr( $footer_bg ); ?>;
            --footer-text: <?php echo esc_attr( $footer_text ); ?>;

            /* Layout */
            --container-width: <?php echo esc_attr( $container_width ); ?>px;
            --section-spacing: <?php echo esc_attr( $section_spacing ); ?>px;

            /* Hero */
            --hero-overlay: rgba(0,0,0, <?php echo esc_attr( $hero_opacity ); ?>);
            --hero-align: <?php echo esc_attr( $hero_align ); ?>;
            --hero-title-size: <?php echo esc_attr( $hero_title_size ); ?>rem;
        }

        /* Portfolio Grid */
        .portfolio-grid {
            grid-template-columns: repeat(<?php echo esc_attr( $portfolio_cols ); ?>, 1fr);
            gap: var(--grid-gap);
        }
        @media (max-width: 768px) {
            .portfolio-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 480px) {
            .portfolio-grid {
                grid-template-columns: 1fr;
            }
        }
        
        /* Hero Overrides */
        .hero-overlay {
            background-color: var(--hero-overlay);
        }
        .hero-content {
            text-align: var(--hero-align);
            align-items: <?php echo ($hero_align === 'left' ? 'flex-start' : ($hero_align === 'right' ? 'flex-end' : 'center')); ?>;
        }
        .hero-title {
            font-size: clamp(2rem, 5vw, var(--hero-title-size));
            letter-spacing: var(--heading-spacing);
        }
        
        /* Typography Overrides */
        body {
            line-height: var(--line-height-base);
        }
        h1, h2, h3, h4, h5, h6 {
            letter-spacing: var(--heading-spacing);
        }
    </style>
    <?php
}
add_action( 'wp_head', 'laytoncorp_customizer_css' );
