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
                } else {
                    // If button doesn't exist, we can't easily append it without knowing the link,
                    // but usually refresh handles structure changes. This is for text updates.
                    // Ideally, we trigger a refresh if the element is missing, or we just wait for refresh.
                }
            } else {
                $btn.hide();
            }
        } );
    } );

    // Contact Info (Footer/Contact Section) - Assuming classes exist or will exist
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

} )( jQuery );
