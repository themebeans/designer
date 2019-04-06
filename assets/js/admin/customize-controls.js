/**
 * Scripts within the customizer controls window.
 *
 * Contextually shows the color hue control and informs the preview
 * when users open or close the front page sections section.
 */

(function() {
	wp.customize.bind( 'ready', function() {

		/**
		 * Function to hide/show Customizer options, based on another control.
		 *
		 * Parent option, Affected Control, Value which affects the control.
		 */
		function customizer_option_display( parent_setting, affected_control, value ) {
			wp.customize( parent_setting, function( setting ) {
				wp.customize.control( affected_control, function( control ) {
					var visibility = function() {
						if ( value === setting.get() ) {
							control.container.slideDown( 180 );
						} else {
							control.container.slideUp( 180 );
						}
					};

					visibility();
					setting.bind( visibility );
				});
			});
		}

		// Only show the Twitter profile option, if social sharing is enabled.
		customizer_option_display( 'social_sharing', 'twitter_profile', true );

		// Only show the images option, if portfolio pagination is enabled.
		customizer_option_display( 'display_pagination', 'portfolio_pagination_images', true );

		// Only show the portfolio CTA settings, if the portfolio CTA enabled.
		customizer_option_display( 'portfolio_cta', 'portfolio_cta_btn_text', true );
		customizer_option_display( 'portfolio_cta', 'portfolio_form_header', true );
		customizer_option_display( 'portfolio_cta', 'portfolio_cta_subject1', true );
		customizer_option_display( 'portfolio_cta', 'portfolio_cta_subject2', true );
		customizer_option_display( 'portfolio_cta', 'portfolio_cta_subject3', true );
		customizer_option_display( 'portfolio_cta', 'portfolio_cta_subject4', true );
		customizer_option_display( 'portfolio_cta', 'portfolio_cta_subject5', true );
		customizer_option_display( 'portfolio_cta', 'portfolio_cta_subject6', true );

		// Only show the portfolio grid flyout sorting settings, if the flyout is enabled.
		customizer_option_display( 'portfolio_flyout', 'portfolio_sorting', true );

		// Only show the overlay categories option, if the overlay is enabled.
		customizer_option_display( 'loop_overlay', 'loop_categories', true );

	});
})( jQuery );