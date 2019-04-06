<?php
/**
 * Customizer defaults
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


/**
 * Get the default option for @@pkg.name's Customizer settings.
 *
 * @param  string $name Option key name to get.
 * @return mixin
 */
function designer_defaults( $name ) {
	static $defaults;

	if ( ! $defaults ) {
		$defaults = apply_filters(
			'designer_defaults', array(

				// Identity.
				'custom_logo_max_width'          => 40,
				'custom_logo_mobile_max_width'   => 40,
				'portfolio_overlay_text_opacity' => 80,
				'portfolio_overlay_opacity'      => 95,
			)
		);
	}

	return isset( $defaults[ $name ] ) ? $defaults[ $name ] : null;
}
