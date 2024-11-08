<?php
/*** Customizer Core Panel
 *
 * @package Newspaperup
 */

$newspaperup_default = newspaperup_get_default_theme_options();
// Adding customizer home page setting

// Add Background Settings Section
Newspaperup_Customizer_Control::add_section(
    'background_image',
    array(
        'title' => esc_html__('Background Settings', 'newspaperup'),
        'priority' => 35,
        'capability' => 'edit_theme_options',
	)
);
// Background Color Heading
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'hidden', 
        'settings'  => 'body_bg_color_heading',
        'label' => esc_html__('Background Color', 'newspaperup'),
        'section' => 'colors',
        'sanitize_callback' => 'newspaperup_sanitize_text',
	)
);
$wp_customize->remove_control('background_color');
//Theme Background Color
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'color-alpha', 
        'settings'  => 'body_background_color',
        'label' => esc_html__('Background Color', 'newspaperup'),
		'section'  => 'colors',
        'default' => $newspaperup_default['body_background_color'],
        'sanitize_callback' => 'newspaperup_sanitize_alpha_color',
	)
);