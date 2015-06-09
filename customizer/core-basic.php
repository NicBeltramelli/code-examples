<?php
/**
 * Core Theme Customizer Integration
 *
 * This file integrates the Theme Customizer
 * using core API features including Panels,
 * Sections, Settings, and Controls
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
function theme_slug_register_theme_customizer( $wp_customize ){

	/**
	 * Failsafe is safe
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}

	/**
	 * Add Panel for General Settings
	 * 
	 * @uses	$wp_customize->add_panel()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_panel/
	 * @link	$wp_customize->add_panel()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_panel
	 * 
	 * @param	string	$id			Panel ID. Passed to $wp_customize->add_section()
	 * @param	array	$args		Arguments passed to the Panel
	 */
	$wp_customize->add_panel(
		// $id
		'theme_slug_panel_general',
		// $args
		array(
			'priority' 			=> 10,
			'capability' 		=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title' 			=> __( 'Theme Name General Settings', 'theme-slug' ),
			'description' 		=> __( 'Configure general settings for the Theme Name Theme', 'theme-slug' ),
		)
	);
	
	
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
	
	/**
	 * Add Menu Position Setting
	 * 
	 * Uses a dropdown select to configure the
	 * position of the primary nav menu, either
	 * above or below the header image.
	 * 
	 * @uses	$wp_customize->add_setting()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
	 * @link	$wp_customize->add_panel()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
	 * 
	 * @param	string	$id			Setting ID. Passed to $wp_customize->add_control()
	 * @param	array	$args		Arguments passed to the Setting
	 */
	$wp_customize->add_setting(
		// $id
		'menu_position',
		// $args
		array(
			'default'			=> 'above',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'theme_slug_sanitize_select'
		)
	);
	
	
	/**
	 * Add Control for Menu Position Setting
	 * 
	 * Register the control to be used to configure
	 * the setting. This setting uses the core 
	 * "select" control.
	 * 
	 * @uses	$wp_customize->add_control()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
	 * @link	$wp_customize->add_panel()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
	 * 
	 * @param	string	$id			Control ID
	 * @param	array	$args		Arguments passed to the Control
	 */
	$wp_customize->add_control(
		// $id
		'menu_position',
		// $args
		array(
			'label'			=> __( 'Menu Position', 'theme-slug' ),
			'section'		=> 'theme_slug_section_header',
			'settings'		=> 'menu_position',
			'type'			=> 'select',
			'description'	=> __( 'Display the main navigation menu above or below the header image?', 'theme-slug' ),
			'choices'		=> array(
				'above' => __( 'Above', 'theme-slug' ),
				'below' => __( 'Below', 'theme-slug' )
			)
		)
	);

}
// Settings API options initilization and validation
add_action( 'customize_register', 'theme_slug_register_theme_customizer' );


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