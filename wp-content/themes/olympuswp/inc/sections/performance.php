<?php
/**
 * Performance section
 *
 * @package Olympus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->add_section(
	'olympus_performance',
	array(
		'title' => esc_html__( 'Performance', 'olympuswp' ),
		'priority' => 90,
	)
);

$wp_customize->add_setting(
	'olympus_settings[load_css_file]',
	array(
		'default' => $defaults['load_css_file'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_checkbox',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Switch_Control(
		$wp_customize,
		'olympus_settings[load_css_file]',
		array(
			'label' => esc_html__( 'Load Dynamic CSS In External File', 'olympuswp' ),
			'description' => esc_html__( 'Generating your dynamic CSS in an external file offers significant performance advantages.', 'olympuswp' ),
			'section' => 'olympus_performance',
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[regenerate_external_css]',
	array(
		'type' => 'option',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Action_Button_Control(
		$wp_customize,
		'olympus_settings[regenerate_external_css]',
		array(
			'label' => esc_html__( 'Regenerate CSS', 'olympuswp' ),
			'description' => esc_html__( 'Click the button to regenerate your CSS file.', 'olympuswp' ),
			'button' => esc_html__( 'Regenerate CSS File', 'olympuswp' ),
			'custom_class' => 'olympus-regenerate-css',
			'section' => 'olympus_performance',
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[load_fonts_locally]',
	array(
		'default' => $defaults['load_fonts_locally'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_checkbox',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Switch_Control(
		$wp_customize,
		'olympus_settings[load_fonts_locally]',
		array(
			'label' => esc_html__( 'Load Google Fonts Locally', 'olympuswp' ),
			'section' => 'olympus_performance',
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[preload_local_fonts]',
	array(
		'default' => $defaults['preload_local_fonts'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_checkbox',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Switch_Control(
		$wp_customize,
		'olympus_settings[preload_local_fonts]',
		array(
			'label' => esc_html__( 'Preload Local Fonts', 'olympuswp' ),
			'section' => 'olympus_performance',
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[flush_local_font_files]',
	array(
		'type' => 'option',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Action_Button_Control(
		$wp_customize,
		'olympus_settings[flush_local_font_files]',
		array(
			'label' => esc_html__( 'Flush Local Fonts', 'olympuswp' ),
			'description' => esc_html__( 'Click the button to reset the local fonts cache.', 'olympuswp' ),
			'button' => esc_html__( 'Flush Local Font Files', 'olympuswp' ),
			'custom_class' => 'olympus-regenerate-fonts',
			'section' => 'olympus_performance',
		)
	)
);
