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
 * Checkbox Sanitization Callback 
 * 
 * Sanitization callback for 'checkbox' type controls.
 * This callback sanitizes $input as a Boolean value, either
 * TRUE or FALSE.
 */
function theme_slug_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

/**
 * HTML Text Sanitization Callback 
 * 
 * Sanitization callback for 'html' type text inputs. This 
 * callback sanitizes $input for HTML allowable in posts.
 * 
 * @uses	wp_filter_kses()	https://developer.wordpress.org/reference/functions/wp_filter_kses	
 */
function theme_slug_sanitize_html( $input ) {
	return wp_filter_kses( $input );
}

/**
 * No HTML Text Sanitization Callback 
 * 
 * Sanitization callback for 'nohtml' type text inputs. This 
 * callback sanitizes $input to remove all HTML.
 * 
 * @uses	wp_filter_nohtml_kses()	https://developer.wordpress.org/reference/functions/wp_filter_nohtml_kses	
 */
function theme_slug_sanitize_nohtml( $input ) {
	return wp_filter_nohtml_kses( $input );
}

/**
 * Select Sanitization Callback
 * 
 * Sanitization callback for 'select' and 'radio' type controls. 
 * This callback sanitizes $input as a slug, and then validates
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