<?php
/**
 * Colors section
 *
 * @package Olympus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->get_section( 'colors' )->priority = 30;

Olympus_Customize_Field::add_wrapper(
	'olympus_global_color_wrapper',
	array(
		'section' => 'colors',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'global_color',
				'global_color_hover',
			),
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[global_color]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['global_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Global Color', 'olympuswp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'global_color',
			'tooltip' => esc_html__( 'Choose Initial Color', 'olympuswp' ),
			'alpha' => true,
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[global_color_hover]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['global_color_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Global Color Hover', 'olympuswp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'global_color_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'olympuswp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);

$wp_customize->add_setting(
	'olympus_settings[background_color]',
	array(
		'default' => $defaults['background_color'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Color_Control(
		$wp_customize,
		'olympus_settings[background_color]',
		array(
			'label' => esc_html__( 'Background Color', 'olympuswp' ),
			'section' => 'colors',
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[headings_color]',
	array(
		'default' => $defaults['headings_color'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Color_Control(
		$wp_customize,
		'olympus_settings[headings_color]',
		array(
			'label' => esc_html__( 'Headings Color', 'olympuswp' ),
			'section' => 'colors',
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[text_color]',
	array(
		'default' => $defaults['text_color'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Color_Control(
		$wp_customize,
		'olympus_settings[text_color]',
		array(
			'label' => esc_html__( 'Text Color', 'olympuswp' ),
			'section' => 'colors',
		)
	)
);

Olympus_Customize_Field::add_wrapper(
	'olympus_links_color_wrapper',
	array(
		'section' => 'colors',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'link_color',
				'link_color_hover',
				'link_color_active',
				'link_color_visited',
			),
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[link_color]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['link_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Color', 'olympuswp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'link_color',
			'tooltip' => esc_html__( 'Choose Initial Color', 'olympuswp' ),
			'alpha' => true,
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[link_color_hover]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['link_color_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Color Hover', 'olympuswp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'link_color_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'olympuswp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[link_color_active]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['link_color_active'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Color Active', 'olympuswp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'link_color_active',
			'tooltip' => esc_html__( 'Choose Active Color', 'olympuswp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[link_color_visited]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['link_color_visited'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Color Visited', 'olympuswp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'link_color_visited',
			'tooltip' => esc_html__( 'Choose Visited Color', 'olympuswp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);

Olympus_Customize_Field::add_wrapper(
	'olympus_post_title_color_wrapper',
	array(
		'section' => 'colors',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'post_title_color',
				'post_title_color_hover',
			),
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[post_title_color]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['post_title_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Post Title Color', 'olympuswp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'post_title_color',
			'tooltip' => esc_html__( 'Choose Initial Color', 'olympuswp' ),
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[post_title_color_hover]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['post_title_color_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Post Title Color Hover', 'olympuswp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'post_title_color_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'olympuswp' ),
			'hideLabel' => true,
		),
	)
);

Olympus_Customize_Field::add_wrapper(
	'olympus_button_background_color_wrapper',
	array(
		'section' => 'colors',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'button_background_color',
				'button_background_color_hover',
			),
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[button_background_color]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['button_background_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Buttons Background', 'olympuswp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'button_background_color',
			'tooltip' => esc_html__( 'Choose Initial Color', 'olympuswp' ),
			'alpha' => true,
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[button_background_color_hover]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['button_background_color_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Buttons Background Hover', 'olympuswp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'button_background_color_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'olympuswp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);

Olympus_Customize_Field::add_wrapper(
	'olympus_button_color_wrapper',
	array(
		'section' => 'colors',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'button_color',
				'button_color_hover',
			),
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[button_color]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['button_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Buttons Color', 'olympuswp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'button_color',
			'tooltip' => esc_html__( 'Choose Initial Color', 'olympuswp' ),
			'alpha' => true,
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[button_color_hover]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['button_color_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Buttons Color Hover', 'olympuswp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'button_color_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'olympuswp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);
