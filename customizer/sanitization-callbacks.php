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
 * Sanitization: css 
 * Control: text, textarea 
 * 
 * Sanitization callback for 'css' type textarea inputs. This 
 * callback sanitizes $input for valid CSS.
 * 
 * NOTE: wp_strip_all_tags() can be passed directly as 
 * $wp_customize->add_setting() 'sanitize_callback'. It 
 * is wrapped in a callback here merely for example 
 * purposes.
 * 
 * @uses	wp_strip_all_tags()	https://developer.wordpress.org/reference/functions/wp_strip_all_tags/
 */
function theme_slug_sanitize_css( $input ) {
	return wp_strip_all_tags( $input );
}

/**
 * Sanitization: dropdown-pages  
 * Control: dropdown-pages  
 * 
 * Sanitization callback for 'dropdown-pages' type controls. 
 * This callback sanitizes $input as an absolute integer, 
 * and then validates that $input is the ID of a published 
 * page.
 * 
 * @uses	absint()			https://developer.wordpress.org/reference/functions/absint/
 * @uses	get_post_status()	https://developer.wordpress.org/reference/functions/get_post_status/
 */
function theme_slug_sanitize_dropdown_pages( $input, $setting ) {
	// Ensure input is an absolute integer
	$input = absint( $input );
	// If the input is an ID of a 
	// published page, return it;
	// otherwise, return the default
	return ( 'publish' == get_post_status( $input ) ? $input : $setting->default );
}

/**
 * Sanitization: email  
 * Control: text 
 * 
 * Sanitization callback for 'email' type text controls. 
 * This callback sanitizes $input as a valid email 
 * address.
 * 
 * @uses	sanitize_email()	https://developer.wordpress.org/reference/functions/sanitize_key/ 
 * @link 	sanitize_email()	https://codex.wordpress.org/Function_Reference/sanitize_email
 */
function theme_slug_sanitize_email( $input, $setting ) {
	// Sanitize $input as a hex value 
	// without the hash prefix.
	$email = sanitize_email( $input );
	// If $input is a valid email,
	// return it; otherwise, return 
	// the default.
	return ( ! null( $email ) ? $email : $setting->default );
}

/**
 * Sanitization: hex_color 
 * Control: text, WP_Customize_Color_Control 
 * 
 * Sanitization callback hex colors.
 * 
 * Note: sanitize_hex_color_no_hash() can also be used here, 
 * depending on whether or not the hash prefix should be 
 * stored/retrieved with the hex color value.
 * 
 * @uses	sanitize_hex_color()			https://developer.wordpress.org/reference/functions/sanitize_hex_color/ 
 * @link	sanitize_hex_color_no_hash()	https://developer.wordpress.org/reference/functions/sanitize_hex_color_no_hash/
 */
function theme_slug_sanitize_hex_color( $input, $setting ) {
	// Sanitize $input as a hex value 
	// without the hash prefix.
	$hex = sanitize_hex_color( $input );
	// If $input is a valid hex value,
	// return it; otherwise, return 
	// the default.
	return ( ! null( $hex ) ? $hex : $setting->default );
}

/**
 * Sanitization: html 
 * Control: text, textarea  
 * 
 * Sanitization callback for 'html' type text inputs. This 
 * callback sanitizes $input for HTML allowable in posts.
 * 
 * NOTE: wp_filter_post_kses() can be passed directly as 
 * $wp_customize->add_setting() 'sanitize_callback'. It 
 * is wrapped in a callback here merely for example 
 * purposes.
 * 
 * @uses	wp_filter_post_kses()	https://developer.wordpress.org/reference/functions/wp_filter_post_kses/ 
 */
function theme_slug_sanitize_html( $input ) {
	return wp_filter_post_kses( $input );
}

/**
 * Sanitization: image 
 * Control: text, WP_Customize_Image_Control 
 * 
 * Sanitization callback for images.
 * 
 * @uses	wp_check_filetype()		https://developer.wordpress.org/reference/functions/wp_check_filetype/
 * @uses	in_array()				http://php.net/manual/en/function.in-array.php
 */
function theme_slug_sanitize_image( $input, $setting ) {

	// Array of valid image file types
	// The array includes image mime types 
	// that are included in wp_get_mime_types()
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );

	// Return an array with file extension 
	// and mime_type
    $file = wp_check_filetype( $input, $mimes );

	// If $input has a valid mime_type, 
	// return it; otherwise, return 
	// the default.
    return ( $file['ext'] ? $input : $setting->default );
}

/**
 * Sanitization: nohtml 
 * Control: text, textarea 
 * 
 * Sanitization callback for 'nohtml' type text inputs. This 
 * callback sanitizes $input to remove all HTML.
 * 
 * NOTE: wp_filter_nohtml_kses() can be passed directly as 
 * $wp_customize->add_setting() 'sanitize_callback'. It 
 * is wrapped in a callback here merely for example 
 * purposes.
 * 
 * @uses	wp_filter_nohtml_kses()	https://developer.wordpress.org/reference/functions/wp_filter_nohtml_kses/ 
 */
function theme_slug_sanitize_nohtml( $input ) {
	return wp_filter_nohtml_kses( $input );
}

/**
 * Sanitization: number_absint 
 * Control: number 
 * 
 * Sanitization callback for 'number' type text inputs. This 
 * callback sanitizes $input to as an absolute integer.
 * 
 * NOTE: absint() can be passed directly as 
 * $wp_customize->add_setting() 'sanitize_callback'. It 
 * is wrapped in a callback here merely for example 
 * purposes.
 * 
 * @uses	absint()	https://developer.wordpress.org/reference/functions/absint/ 
 */
function theme_slug_sanitize_number_absint( $input ) {
	return absint( $input );
}

/**
 * Sanitization: select  
 * Control: select, radio 
 * 
 * Sanitization callback for 'select' and 'radio' type controls. 
 * This callback sanitizes $input as a slug, and then validates
 * $input against the choices defined for the control.
 * 
 * @uses	sanitize_key()					https://developer.wordpress.org/reference/functions/sanitize_key/
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