<?php
/**
 * Customizer: Add Sections
 *
 * This file demonstrates how to add 
 * Sections to the Customizer
 * 
 * @package 	code-examples
 * @copyright	Copyright (c) 2015, WordPress Theme Review Team
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 */
 

/**
 * Theme Options Customizer Implementation
 *
 * Implement the Theme Customizer for 
 * Theme Settings.
 * 
 * @param 	object	$wp_customize	Object that holds the customizer data
 * 
 * @link	http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/	Otto
 */
function theme_slug_register_customizer_sections( $wp_customize ){

	/**
	 * Failsafe is safe
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}
	
	
	/**
	 * Add Header Section for General Options
	 * 
	 * @uses	$wp_customize->add_section()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
	 * @link	$wp_customize->add_panel()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_section
	 * 
	 * @param	string	$id			Section ID. Passed to $wp_customize->add_control()
	 * @param	array	$args		Arguments passed to the Section
	 */
	$wp_customize->add_section(
		// $id
		'theme_slug_section_header',
		// $args
		array(
			'title'			=> __( 'Header Options', 'theme-slug' ),
			'description'	=> __( 'Some description for the options in the header section', 'theme-slug' ),
			'panel'			=> 'theme_slug_panel_general'
		)
	);

}
// Settings API options initilization and validation
add_action( 'customize_register', 'theme_slug_register_customizer_sections' );


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