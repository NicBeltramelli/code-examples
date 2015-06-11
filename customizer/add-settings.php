<?php
/**
 * Customizer: Add Settings
 *
 * This file demonstrates how to add 
 * Settings to the Customizer
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
function theme_slug_register_customizer_settings( $wp_customize ){

	/**
	 * Failsafe is safe
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}
	
	
	/**
	 * Setting: Menu Position 
	 * Control: select
	 * Sanitization: select
	 * 
	 * Uses a radio select to configure the
	 * position of the primary nav menu, either
	 * above or below the header image.
	 * 
	 * @uses	$wp_customize->add_setting()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
	 * @link	$wp_customize->add_setting()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
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
	 * Setting: Site Logo
	 * Control: WP_Customize_Image_Control
	 * Sanitization: image
	 * 
	 * Uses the media manager to upload and 
	 * select an image to be used as the 
	 * site logo.
	 * 
	 * @uses	$wp_customize->add_setting()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
	 * @link	$wp_customize->add_setting()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
	 * 
	 * @param	string	$id			Setting ID. Passed to $wp_customize->add_control()
	 * @param	array	$args		Arguments passed to the Setting
	 */
	$wp_customize->add_setting(
		// $id
		'site_logo',
		// $args
		array(
			'default'			=> '',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'theme_slug_sanitize_image'
		)
	);
	
	
	/**
	 * Setting: Contact Email 
	 * Control: email 
	 * Sanitization: email 
	 * 
	 * Uses an email text field to configure the
	 * user's contact email address displayed 
	 * in the site footer.
	 * 
	 * @uses	$wp_customize->add_setting()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
	 * @link	$wp_customize->add_setting()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
	 * 
	 * @param	string	$id			Setting ID. Passed to $wp_customize->add_control()
	 * @param	array	$args		Arguments passed to the Setting
	 */
	$wp_customize->add_setting(
		// $id
		'contact_email',
		// $args
		array(
			'default'			=> '',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'theme_slug_sanitize_email'
		)
	);
	
	
	/**
	 * Setting: Footer Copyright Text 
	 * Control: text 
	 * Sanitization: html 
	 * 
	 * Uses a text field to configure the
	 * user's copyright text displayed 
	 * in the site footer.
	 * 
	 * @uses	$wp_customize->add_setting()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
	 * @link	$wp_customize->add_setting()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
	 * 
	 * @param	string	$id			Setting ID. Passed to $wp_customize->add_control()
	 * @param	array	$args		Arguments passed to the Setting
	 */
	$wp_customize->add_setting(
		// $id
		'footer_copyright_text',
		// $args
		array(
			'default'			=> sprintf( __( 'Copyright %s. All rights reserved.', 'theme-slug' ), esc_html( get_bloginfo( 'name' ) ) ),
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'theme_slug_sanitize_html'
		)
	);
	
	
	/**
	 * Setting: Display Footer Credit Link 
	 * Control: checkbox 
	 * Sanitization: checkbox
	 * 
	 * Uses a checkbox to configure the
	 * display of the Theme developer's 
	 * footer credit link.
	 * 
	 * @uses	$wp_customize->add_setting()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
	 * @link	$wp_customize->add_setting()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
	 * 
	 * @param	string	$id			Setting ID. Passed to $wp_customize->add_control()
	 * @param	array	$args		Arguments passed to the Setting
	 */
	$wp_customize->add_setting(
		// $id
		'display_footer_credit',
		// $args
		array(
			'default'			=> false,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'theme_slug_sanitize_checkbox'
		)
	);
	
	
	/**
	 * Setting: Slide Count
	 * Control: number
	 * Sanitization: number_absint
	 * 
	 * Uses a number type text input to configure 
	 * the number of sticky posts to display as 
	 * slides in the front page slider
	 * 
	 * @uses	$wp_customize->add_setting()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
	 * @link	$wp_customize->add_setting()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
	 * 
	 * @param	string	$id			Setting ID. Passed to $wp_customize->add_control()
	 * @param	array	$args		Arguments passed to the Setting
	 */
	$wp_customize->add_setting(
		// $id
		'slide_count',
		// $args
		array(
			'default'			=> 3,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'theme_slug_sanitize_number_absint'
		)
	);
	
	
	/**
	 * Setting: Call-To-Action Link
	 * Control: dropdown pages
	 * Sanitization: dropdown_pages
	 * 
	 * Uses a dropdown pages select to configure 
	 * the page link for a front page Call-To-Action 
	 * button.
	 * 
	 * @uses	$wp_customize->add_setting()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
	 * @link	$wp_customize->add_setting()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
	 * 
	 * @param	string	$id			Setting ID. Passed to $wp_customize->add_control()
	 * @param	array	$args		Arguments passed to the Setting
	 */
	$wp_customize->add_setting(
		// $id
		'cta_link',
		// $args
		array(
			'default'			=> '',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'theme_slug_sanitize_dropdown_pages'
		)
	);
	
	
	/**
	 * Setting: Color Scheme
	 * Control: select
	 * Sanitization: select
	 * 
	 * Uses a dropdown select to configure the
	 * Theme color scheme, from a defined list 
	 * of valid color choices.
	 * 
	 * @uses	$wp_customize->add_setting()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
	 * @link	$wp_customize->add_setting()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
	 * 
	 * @param	string	$id			Setting ID. Passed to $wp_customize->add_control()
	 * @param	array	$args		Arguments passed to the Setting
	 */
	$wp_customize->add_setting(
		// $id
		'color_scheme',
		// $args
		array(
			'default'			=> 'blue',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'theme_slug_sanitize_select'
		)
	);
	
	
	/**
	 * Setting: Link Color
	 * Control: WP_Customize_Color_Control
	 * Sanitization: hex_color
	 * 
	 * Uses a color wheel to configure 
	 * the Link Color setting.
	 * 
	 * @uses	$wp_customize->add_setting()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
	 * @link	$wp_customize->add_setting()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
	 * 
	 * @param	string	$id			Setting ID. Passed to $wp_customize->add_control()
	 * @param	array	$args		Arguments passed to the Setting
	 */
	$wp_customize->add_setting(
		// $id
		'link_color',
		// $args
		array(
			'default'			=> '5588AA',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'theme_slug_sanitize_hex_color'
		)
	);
	
	
	/**
	 * Setting: Custom CSS
	 * Control: textarea
	 * Sanitization: css
	 * 
	 * Uses a textarea to configure the
	 * user-defined custom CSS for the 
	 * Theme.
	 * 
	 * @uses	$wp_customize->add_setting()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
	 * @link	$wp_customize->add_setting()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
	 * 
	 * @param	string	$id			Setting ID. Passed to $wp_customize->add_control()
	 * @param	array	$args		Arguments passed to the Setting
	 */
	$wp_customize->add_setting(
		// $id
		'color_scheme',
		// $args
		array(
			'default'			=> '',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'theme_slug_sanitize_css'
		)
	);

}
// Settings API options initilization and validation
add_action( 'customize_register', 'theme_slug_register_customizer_settings' );