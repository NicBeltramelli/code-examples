<?php
/**
 * Customizer: Sanitization Callbacks
 *
 * This file demonstrates how to define 
 * sanitization callback functions for 
 * various data types.
 * 
 * @package 	code-examples
 * @copyright	Copyright (c) 2015, WordPress Theme Review Team
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 */


/**
 * Select Sanitization Callback
 * 
 * Sanitization callback for 'select' type controls. This
 * callback sanitizes $input as a slug, and then validates
 * $input against the choices defined for the control.
 * 
 * @uses	sanitize_key()	https://developer.wordpress.org/reference/functions/sanitize_key/
 * @uses	$wp_customize->get_control()	https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 */
function theme_slug_sanitize_select( $input, $setting ) {
	// Ensure input is a slug
	$input = sanitize_key( $input );
	// Get list of choices from the control
	// associated with the setting
	$choices = $setting->manager->get_control( $setting->id )->choices;
	// If the input is a valid key, return it;
	// otherwise, return the default
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}