/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Hero Headline
	wp.customize( 'hero_headline', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-title' ).text( newval );
		} );
	} );

	// Hero Subtext
	wp.customize( 'hero_subtext', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-subtitle' ).text( newval );
		} );
	} );

    // Hero CTA Text
    wp.customize( 'hero_cta_text', function( value ) {
        value.bind( function( newval ) {
            var $btn = $( '.hero-content .btn' );
            if ( newval ) {
                if ( $btn.length ) {
                    $btn.text( newval );
                    $btn.show();
                }
            } else {
                $btn.hide();
            }
        } );
    } );

    // Contact Heading
    wp.customize( 'contact_heading', function( value ) {
        value.bind( function( newval ) {
            $( '.contact-headline' ).text( newval );
        } );
    } );

    // Contact Info (Footer/Contact Section)
    wp.customize( 'contact_email', function( value ) {
        value.bind( function( newval ) {
            $( '.contact-email' ).text( newval );
            $( '.contact-email-link' ).attr( 'href', 'mailto:' + newval );
        } );
    } );

    wp.customize( 'contact_phone', function( value ) {
        value.bind( function( newval ) {
            $( '.contact-phone' ).text( newval );
            $( '.contact-phone-link' ).attr( 'href', 'tel:' + newval.replace(/[^\d+]/g, '') );
        } );
    } );

    wp.customize( 'contact_address', function( value ) {
        value.bind( function( newval ) {
            $( '.contact-address' ).text( newval );
        } );
    } );

    // --- LIVE COLOR PREVIEW ---
    
    // Background Color
    wp.customize( 'color_bg', function( value ) {
        value.bind( function( newval ) {
            document.documentElement.style.setProperty( '--color-bg', newval );
        } );
    } );

    // Text Color
    wp.customize( 'color_text', function( value ) {
        value.bind( function( newval ) {
            document.documentElement.style.setProperty( '--color-text', newval );
        } );
    } );

    // Accent Color
    wp.customize( 'color_accent', function( value ) {
        value.bind( function( newval ) {
            document.documentElement.style.setProperty( '--color-accent', newval );
        } );
    } );

} )( jQuery );
