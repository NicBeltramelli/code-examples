<?php
/**
 * Customizer: Add Panels
 *
 * This file demonstrates how to add Panels to the Customizer.
 * 
 * @package   code-examples
 * @copyright Copyright (c) 2015, WordPress Theme Review Team
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 */
 

/**
 * Theme Options Customizer Implementation.
 *
 * Implement the Theme Customizer for Theme Settings.
 *
 * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
 * 
 * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
 */
function theme_slug_register_customizer_panels( $wp_customize ){

	/*
	 * Failsafe is safe
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}

	/**
	 * Add Panel for General Settings.
	 * 
	 * @uses $wp_customize->add_panel() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_panel/
	 * @link $wp_customize->add_panel() https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_panel
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
	 * Add Panel for Color and Layout Settings.
	 * 
	 * @uses $wp_customize->add_panel() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_panel/
	 * @link $wp_customize->add_panel() https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_panel
	 */
	$wp_customize->add_panel(
		// $id
		'theme_slug_panel_colorslayouts',
		// $args
		array(
			'priority' 			=> 11,
			'capability' 		=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title' 			=> __( 'Theme Name Colors and Layouts', 'theme-slug' ),
			'description' 		=> __( 'Configure color and layout settings for the Theme Name Theme', 'theme-slug' ),
		)
	);

	/**
	 * Add Panel for Advanced Settings.
	 * 
	 * @uses $wp_customize->add_panel() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_panel/
	 * @link $wp_customize->add_panel() https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_panel
	 */
	$wp_customize->add_panel(
		// $id
		'theme_slug_panel_advanced',
		// $args
		array(
			'priority' 			=> 12,
			'capability' 		=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title' 			=> __( 'Theme Name Advanced Settings', 'theme-slug' ),
			'description' 		=> __( 'Configure advanced settings for the Theme Name Theme', 'theme-slug' ),
		)
	);
}

// Settings API options initilization and validation
add_action( 'customize_register', 'theme_slug_register_customizer_panels' );
