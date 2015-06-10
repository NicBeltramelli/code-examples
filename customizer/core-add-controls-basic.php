<?php
/**
 * Customizer: Add Controls: Basic
 *
 * This file demonstrates how to add 
 * Basic core controls to the Customizer
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
function theme_slug_register_customizer_controls_basic( $wp_customize ){

	/**
	 * Failsafe is safe
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}
	
	
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
add_action( 'customize_register', 'theme_slug_register_customizer_controls_basic' );