<?php
/**
 * Customizer: Add Panels
 *
 * This file demonstrates how to add 
 * Panels to the Customizer
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
function theme_slug_register_customizer_panels( $wp_customize ){

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
		'theme_slug_panel_colors',
		// $args
		array(
			'priority' 			=> 11,
			'capability' 		=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title' 			=> __( 'Theme Name Color Settings', 'theme-slug' ),
			'description' 		=> __( 'Configure color settings for the Theme Name Theme', 'theme-slug' ),
		)
	);

}
// Settings API options initilization and validation
add_action( 'customize_register', 'theme_slug_register_customizer_panels' );