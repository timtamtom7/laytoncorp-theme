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

} )( jQuery );
