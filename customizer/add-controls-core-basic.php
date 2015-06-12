<?php
/**
 * Customizer: Add Controls: Basic
 *
 * This file demonstrates how to add 
 * basic core controls to the Customizer. 
 * 
 * The Customizer API includes basic controls 
 * for the following control types:
 * - basic: checkbox 
 * - basic: dropdown pages
 * - basic: radio 
 * - basic: select 
 * - basic: text 
 * - basic: textarea 
 * 
 * WordPress 4.0 also introduced controls 
 * for the following specialized text 
 * input control types:
 * - text: email
 * - text: number 
 * - text: password (not included here)
 * - text: search (not included here)
 * - text: tel 
 * - text: url 
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
	 * Control: Basic: Checkbox
	 * Setting: Display Footer Credit Link
	 * Sanitization: checkbox 
	 * 
	 * Register the core "checkbox" control to be 
	 * used to configure the Display Footer Credit 
	 * Link setting.
	 * 
	 * @uses	$wp_customize->add_control()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
	 * @link	$wp_customize->add_control()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
	 * 
	 * @param	string	$id			Control ID
	 * @param	array	$args		Arguments passed to the Control
	 */
	$wp_customize->add_control(
		// $id
		'display_footer_credit_link',
		// $args
		array(
			'settings'		=> 'display_footer_credit_link',
			'section'		=> 'theme_slug_section_footer',
			'type'			=> 'checkbox',
			'label'			=> __( 'Display Footer Credit Link', 'theme-slug' ),
			'description'	=> __( 'Should the Theme developer credit link be displayed in your site footer?', 'theme-slug' ),
		)
	);
	
	
	/**
	 * Control: Basic: Dropdown Pages 
	 * Setting: Call-To-Action Link
	 * Sanitization: dropdown_pages 
	 * 
	 * Register the core "dropdown-pages" control to be 
	 * used to configure Call-To-Action Link setting.
	 * 
	 * @uses	$wp_customize->add_control()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
	 * @link	$wp_customize->add_control()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
	 * 
	 * @param	string	$id			Control ID
	 * @param	array	$args		Arguments passed to the Control
	 */
	$wp_customize->add_control(
		// $id
		'cta_link',
		// $args
		array(
			'settings'		=> 'cta_link',
			'section'		=> 'theme_slug_section_frontpage',
			'type'			=> 'dropdown-pages',
			'label'			=> __( 'Call-To-Action Link', 'theme-slug' ),
			'description'	=> __( 'Select the page to link to the Call-To-Action button on the front page.', 'theme-slug' ),
		)
	);
	
	
	/**
	 * Control: Basic: Radio 
	 * Setting: Menu Position
	 * Sanitization: select 
	 * 
	 * Register the core "radio" control to be 
	 * used to configure the Menu Position setting.
	 * 
	 * @uses	$wp_customize->add_control()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
	 * @link	$wp_customize->add_control()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
	 * 
	 * @param	string	$id			Control ID
	 * @param	array	$args		Arguments passed to the Control
	 */
	$wp_customize->add_control(
		// $id
		'menu_position',
		// $args
		array(
			'settings'		=> 'menu_position',
			'section'		=> 'theme_slug_section_header',
			'type'			=> 'radio',
			'label'			=> __( 'Menu Position', 'theme-slug' ),
			'description'	=> __( 'Display the main navigation menu above or below the header image?', 'theme-slug' ),
			'choices'		=> array(
				'above' => __( 'Above', 'theme-slug' ),
				'below' => __( 'Below', 'theme-slug' )
			)
		)
	);
	
	
	/**
	 * Control: Basic: Select 
	 * Setting: Color Scheme
	 * Sanitization: select 
	 * 
	 * Register the core "select" control to be 
	 * used to configure the Color Scheme setting.
	 * 
	 * @uses	$wp_customize->add_control()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
	 * @link	$wp_customize->add_control()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
	 * 
	 * @param	string	$id			Control ID
	 * @param	array	$args		Arguments passed to the Control
	 */
	$wp_customize->add_control(
		// $id
		'color_scheme',
		// $args
		array(
			'settings'		=> 'color_scheme',
			'section'		=> 'theme_slug_section_colors',
			'type'			=> 'select',
			'label'			=> __( 'Color Scheme', 'theme-slug' ),
			'description'	=> __( 'Select the color scheme to be used for your site.', 'theme-slug' ),
			'choices'		=> array(
				'blue' => __( 'Blue', 'theme-slug' ),
				'red' => __( 'Red', 'theme-slug' ),
				'green' => __( 'Green', 'theme-slug' )
			)
		)
	);
	
	
	/**
	 * Control: Basic: Text 
	 * Setting: Footer Copyright Text
	 * Sanitization: html  
	 * 
	 * Register the core "text" control to be 
	 * used to configure the Footer Copyright 
	 * Text setting.
	 * 
	 * @uses	$wp_customize->add_control()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
	 * @link	$wp_customize->add_control()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
	 * 
	 * @param	string	$id			Control ID
	 * @param	array	$args		Arguments passed to the Control
	 */
	$wp_customize->add_control(
		// $id
		'footer_copyright_text',
		// $args
		array(
			'settings'		=> 'footer_copyright_text',
			'section'		=> 'theme_slug_section_footer',
			'type'			=> 'text',
			'label'			=> __( 'Footer Copyright Text', 'theme-slug' ),
			'description'	=> __( 'Copyright or other text to be displayed in the site footer. HTML allowed.', 'theme-slug' )
		)
	);
	
	
	/**
	 * Control: Basic: Textarea 
	 * Setting: Custom CSS
	 * Sanitization: css 
	 * 
	 * Register the core "textarea" control to be 
	 * used to configure the Custom CSS setting.
	 * 
	 * @uses	$wp_customize->add_control()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
	 * @link	$wp_customize->add_control()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
	 * 
	 * @param	string	$id			Control ID
	 * @param	array	$args		Arguments passed to the Control
	 */
	$wp_customize->add_control(
		// $id
		'custom_css',
		// $args
		array(
			'settings'		=> 'custom_css',
			'section'		=> 'theme_slug_section_css',
			'type'			=> 'textarea',
			'label'			=> __( 'Custom CSS', 'theme-slug' ),
			'description'	=> __( 'Define custom CSS be used for your site. Do not enclose in script tags.', 'theme-slug' ),
		)
	);
	
	
	/**
	 * Control: Text: Email 
	 * Setting: Contact Email
	 * Sanitization: email  
	 * 
	 * Register the core "email" text control to be 
	 * used to configure the Contact Email setting.
	 * 
	 * @uses	$wp_customize->add_control()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
	 * @link	$wp_customize->add_control()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
	 * 
	 * @param	string	$id			Control ID
	 * @param	array	$args		Arguments passed to the Control
	 */
	$wp_customize->add_control(
		// $id
		'contact_email',
		// $args
		array(
			'settings'		=> 'contact_email',
			'section'		=> 'theme_slug_section_footer',
			'type'			=> 'email',
			'label'			=> __( 'Contact Email', 'theme-slug' ),
			'description'	=> __( 'Contact email address to be displayed in the site footer.', 'theme-slug' )
		)
	);
	
	
	/**
	 * Control: Text: Number 
	 * Setting: Slide Count
	 * Sanitization: number_absint
	 * 
	 * Register the core "number" text control to be 
	 * used to configure the Slide Count setting.
	 * 
	 * @uses	$wp_customize->add_control()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
	 * @link	$wp_customize->add_control()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
	 * 
	 * @param	string	$id			Control ID
	 * @param	array	$args		Arguments passed to the Control
	 */
	$wp_customize->add_control(
		// $id
		'slide_count',
		// $args
		array(
			'settings'		=> 'slide_count',
			'section'		=> 'theme_slug_section_frontpage',
			'type'			=> 'number',
			'label'			=> __( 'Slide Count', 'theme-slug' ),
			'description'	=> __( 'Set the number of sticky posts to display in the slider.', 'theme-slug' )
		)
	);
	
	
	/**
	 * Control: Text: Tel 
	 * Setting: Contact Telephone
	 * Sanitization: number_range
	 * 
	 * Register the core "tel" text control to be 
	 * used to configure the Contact Telephone setting.
	 * 
	 * A valid telephone number is either 10 or 12 digits, 
	 * so the control is passed attributes for min 10 and 
	 * max 12, with step = 2.
	 * 
	 * @uses	$wp_customize->add_control()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
	 * @link	$wp_customize->add_control()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
	 * 
	 * @param	string	$id			Control ID
	 * @param	array	$args		Arguments passed to the Control
	 */
	$wp_customize->add_control(
		// $id
		'contact_telephone',
		// $args
		array(
			'settings'		=> 'contact_telephone',
			'section'		=> 'theme_slug_section_footer',
			'type'			=> 'number',
			'label'			=> __( 'Contact Telephone', 'theme-slug' ),
			'description'	=> __( 'Contact phone number to be displayed in the site footer. Numbers only.', 'theme-slug' ),
			'input_attrs'	=> array(
				'min'	=> 10,
				'max'	=> 12,
				'step'	=> 2
			)
		)
	);

}
// Settings API options initilization and validation
add_action( 'customize_register', 'theme_slug_register_customizer_controls_basic' );