<?php
/**
 * Customizer: Add Controls: Advanced
 *
 * This file demonstrates how to add 
 * advanced core controls to the Customizer. The 
 * Customizer API includes advanced controls for 
 * the following control types:
 * - WP_Customize_Color_Control 
 * - WP_Customize_Image_Control 
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
function theme_slug_register_customizer_controls_advanced( $wp_customize ){

	/**
	 * Failsafe is safe
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}
	
	
	/**
	 * Control: Color 
	 * Setting: Link Color
	 * Sanitization: hex_color
	 * 
	 * Register "WP_Customize_Color_Control" to be 
	 * used to configure the Link Color setting.
	 * 
	 * @uses	$wp_customize->add_control()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
	 * @link	$wp_customize->add_control()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
	 * 
	 * @uses	WP_Customize_Color_Control()	https://developer.wordpress.org/reference/classes/wp_customize_color_control/
	 * @link	WP_Customize_Color_Control()	https://codex.wordpress.org/Class_Reference/WP_Customize_Color_Control
	 * 
	 * @param	string	$id			Control ID
	 * @param	array	$args		Arguments passed to the Control
	 */
	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
			// $wp_customize object
			$wp_customize,
			// $id
			'link_color',
			// $args
			array(
				'settings'		=> 'link_color',
				'section'		=> 'theme_slug_section_colors',
				'label'			=> __( 'Link Color', 'theme-slug' ),
				'description'	=> __( 'Select the color to be used for hyperlinks.', 'theme-slug' )
			)
		)
	);
	
	
	/**
	 * Control: Image Upload 
	 * Setting: Site Logo
	 * Sanitization: image  
	 * 
	 * Register "WP_Customize_Color_Control" to be 
	 * used to configure the Link Color setting.
	 * 
	 * @uses	$wp_customize->add_control()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
	 * @link	$wp_customize->add_control()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
	 * 
	 * @uses	WP_Customize_Image_Control()	https://developer.wordpress.org/reference/classes/wp_customize_image_control/
	 * @link	WP_Customize_Image_Control()	https://codex.wordpress.org/Class_Reference/WP_Customize_Image_Control
	 * 
	 * @param	string	$id			Control ID
	 * @param	array	$args		Arguments passed to the Control
	 */
	$wp_customize->add_control(
		new WP_Customize_Image_Control( 
			// $wp_customize object
			$wp_customize,
			// $id
			'site_logo',
			// $args
			array(
				'settings'		=> 'site_logo',
				'section'		=> 'theme_slug_section_header',
				'label'			=> __( 'Site Logo', 'theme-slug' ),
				'description'	=> __( 'Select the image to be used for the site logo.', 'theme-slug' )
			)
		)
	);

}
// Settings API options initilization and validation
add_action( 'customize_register', 'theme_slug_register_customizer_controls_advanced' );