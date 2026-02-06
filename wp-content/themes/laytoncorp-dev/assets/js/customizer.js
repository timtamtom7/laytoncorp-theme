/**
 * Customizer Live Preview
 *
 * Handles real-time updates for the theme customizer using PostMessage.
 * This ensures changes are visible instantly without a page refresh.
 */

( function( $ ) {

    // Helper: Update CSS Variable
    function updateVar( setting, cssVar, suffix = '' ) {
        wp.customize( setting, function( value ) {
            value.bind( function( newval ) {
                document.documentElement.style.setProperty( cssVar, newval + suffix );
            } );
        } );
    }

    // --- GLOBAL COLORS ---
    updateVar( 'color_bg', '--color-bg' );
    updateVar( 'color_text', '--color-text' );
    updateVar( 'color_accent', '--color-accent' );

    // --- BUTTONS ---
    updateVar( 'btn_bg_color', '--btn-bg' );
    updateVar( 'btn_text_color', '--btn-text' );
    updateVar( 'btn_radius', '--btn-radius', 'px' );
    updateVar( 'btn_padding_y', '--btn-pad-y', 'px' );
    updateVar( 'btn_padding_x', '--btn-pad-x', 'px' );
    updateVar( 'btn_transform', '--btn-transform' );

    // --- TYPOGRAPHY ---
    updateVar( 'body_font_size', '--font-size-base', 'px' );
    updateVar( 'h1_font_size', '--h1-size', 'em' );
    updateVar( 'h2_font_size', '--h2-size', 'em' );
    updateVar( 'h3_font_size', '--h3-size', 'em' );
    updateVar( 'heading_font_weight', '--heading-weight' );

    // --- HEADER ---
    updateVar( 'header_height', '--header-height', 'px' );
    updateVar( 'header_bg_scrolled', '--header-bg-scrolled' );
    updateVar( 'header_logo_width', '--header-logo-width', 'px' );
    updateVar( 'header_menu_gap', '--header-menu-gap', 'px' );

    // --- FOOTER ---
    updateVar( 'footer_padding_y', '--footer-pad-y', 'px' );
    updateVar( 'footer_bg_color', '--footer-bg' );
    updateVar( 'footer_text_color', '--footer-text' );

    // --- LAYOUT ---
    updateVar( 'container_width', '--container-width', 'px' );
    updateVar( 'section_spacing', '--section-spacing', 'px' );

    // --- HERO SECTION ---
    
    // Hero Layout & Style
    updateVar( 'hero_overlay_opacity', '--hero-overlay', '' ); 
    wp.customize( 'hero_overlay_opacity', function( value ) {
        value.bind( function( newval ) {
            document.documentElement.style.setProperty( '--hero-overlay', 'rgba(0,0,0, ' + newval + ')' );
        } );
    } );

    updateVar( 'hero_alignment', '--hero-align' );
    wp.customize( 'hero_alignment', function( value ) {
        value.bind( function( newval ) {
            var align = 'center';
            if ( newval === 'left' ) align = 'flex-start';
            if ( newval === 'right' ) align = 'flex-end';
            $( '.hero-content' ).css( 'align-items', align );
        } );
    } );

    updateVar( 'hero_title_size', '--hero-title-size', 'rem' );

    // Hero Content
    wp.customize( 'hero_headline', function( value ) {
        value.bind( function( newval ) {
            $( '.hero-title' ).text( newval );
        } );
    } );

    wp.customize( 'hero_subtext', function( value ) {
        value.bind( function( newval ) {
            $( '.hero-subtitle' ).text( newval );
        } );
    } );

    wp.customize( 'hero_cta_text', function( value ) {
        value.bind( function( newval ) {
            $( '.hero-content .btn' ).text( newval );
        } );
    } );

    // Contact Info
    wp.customize( 'contact_heading', function( value ) {
        value.bind( function( newval ) {
            $( '.contact-headline' ).text( newval );
        } );
    } );


    // --- FEATURES SECTION (New) ---
    wp.customize( 'features_title', function( value ) {
        value.bind( function( newval ) {
            $( '#capabilities .section-title' ).text( newval );
        } );
    } );

    for ( let i = 1; i <= 4; i++ ) {
        wp.customize( 'feature_' + i + '_title', function( value ) {
            value.bind( function( newval ) {
                $( '.feature-card-' + i + ' .feature-title' ).text( newval );
            } );
        } );
        wp.customize( 'feature_' + i + '_text', function( value ) {
            value.bind( function( newval ) {
                $( '.feature-card-' + i + ' .feature-text' ).text( newval );
            } );
        } );
    }

    // --- PORTFOLIO SECTION (New) ---
    wp.customize( 'portfolio_title', function( value ) {
        value.bind( function( newval ) {
            $( '#portfolio .section-title' ).text( newval );
        } );
    } );

    updateVar( 'portfolio_gap', '--grid-gap', 'px' );

    wp.customize( 'portfolio_columns', function( value ) {
        value.bind( function( newval ) {
            $( '.portfolio-grid' ).css( 'grid-template-columns', 'repeat(' + newval + ', 1fr)' );
        } );
    } );

    // --- ABOUT SECTION (New) ---
    wp.customize( 'about_heading', function( value ) {
        value.bind( function( newval ) {
            $( '.about-headline' ).text( newval );
        } );
    } );

    wp.customize( 'about_body', function( value ) {
        value.bind( function( newval ) {
            $( '.about-text' ).text( newval );
        } );
    } );

    // --- CARD STYLES (New) ---
    updateVar( 'card_bg_color', '--card-bg' );
    updateVar( 'card_radius', '--card-radius', 'px' );
    updateVar( 'card_padding', '--card-padding', 'px' );

    // --- MARQUEE SECTION ---
    wp.customize( 'marquee_title', function( value ) {
        value.bind( function( newval ) {
            $( '.marquee-label' ).text( newval );
        } );
    } );

} )( jQuery );
