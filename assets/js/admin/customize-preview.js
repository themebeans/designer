/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. This javascript will grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */

( function( $ ) {

	//LIVE HTML
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.logo_text' ).html( newval );
		} );
	} );

	wp.customize( 'footer_colophon', function( value ) {
		value.bind( function( newval ) {
			$( '.footer p.colophon' ).html( newval );
		} );
	} );

	wp.customize( 'custom_more_tag', function( value ) {
		value.bind( function( newval ) {
			$( '.more-link' ).html( newval );
		} );
	} );

	wp.customize( 'portfolio_cta_btn_text', function( value ) {
		value.bind( function( newval ) {
			$( '.project-cta .btn' ).html( newval );
		} );
	} );

	wp.customize( 'contact_button_text', function( value ) {
		value.bind( function( newval ) {
			$( '.bean-contactform li.submit .button' ).html( newval );
		} );
	} );

	wp.customize( 'footer_copyright', function( value ) {
		value.bind( function( newval ) {
			$( '.copyright' ).html( newval );
		} );
	} );

	wp.customize( 'portfolio_form_header', function( value ) {
		value.bind( function( newval ) {
			$( '.project-form header h2' ).html( newval );
		} );
	} );

	wp.customize( 'custom_logo_max_width', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="custom_logo_max_width">@media screen and (min-width: 769px) { body.logged-in .custom-logo-link img.custom-logo { width:' + newval + 'px; } }</style>';

            el =  $( '.custom_logo_max_width' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'custom_logo_mobile_max_width', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="custom_logo_mobile_max_width">@media screen and (max-width: 768px) { body.logged-in .custom-logo-link img.custom-logo { width:' + newval + 'px; } }</style>';

            el =  $( '.custom_logo_mobile_max_width' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'portfolio_overlay_text_opacity', function( value ) {
        value.bind( function( newval ) {
             var opacity;

             el =  newval * 0.01;

            $('body .project .title-wrap__inner').css('opacity', el );
        } );
    } );

    wp.customize( 'portfolio_overlay_opacity', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="portfolio_overlay_opacity">@media screen and (min-width: 600px) { body .projects .project .thumb:hover .overlay { opacity:' + newval * 0.01 + '; } }</style>';

            el =  $( '.portfolio_overlay_opacity' );
            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'portfolio_overlay_text_color', function( value ) {
        value.bind( function( newval ) {
            $('body .project .title-wrap h2, body .project .title-wrap span, body .project .title-wrap span a').css('color', newval );
        } );
    } );

    wp.customize( 'portfolio_overlay_color', function( value ) {
        value.bind( function( newval ) {
            $('body .project .overlay').css('background-color', newval );
        } );
    } );



} )( jQuery );
