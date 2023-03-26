<?php
/**
 * Footer section
 *
 * @package Olympus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->add_section(
	'olympus_footer',
	array(
		'title' => esc_html__( 'Footer', 'olympuswp' ),
		'priority' => 80,
	)
);

$wp_customize->add_setting(
	'olympus_settings[footer_columns]',
	array(
		'default' => $defaults['footer_columns'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_check_numberic_values',
	)
);

$wp_customize->add_control(
	new Olympus_Slider_Control(
		$wp_customize,
		'olympus_settings[footer_columns]',
		array(
			'label' => esc_html__( 'Footer Columns', 'olympuswp' ),
			'section' => 'olympus_footer',
			'default' => $defaults['footer_columns'],
			'settings' => array(
				'size' => 'olympus_settings[footer_columns]',
			),
			'input_attrs' => array(
				'min' => 1,
				'max' => 6,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[footer_padding]',
	array(
		'default' => $defaults['footer_padding'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_responsive_spacing',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Spacing_Control(
		$wp_customize,
		'olympus_settings[footer_padding]',
		array(
			'label' => esc_html__( 'Padding', 'olympuswp' ),
			'section' => 'olympus_footer',
			'choices' => array(
				'top'    => esc_html__( 'Top', 'olympuswp' ),
				'right'  => esc_html__( 'Right', 'olympuswp' ),
				'bottom' => esc_html__( 'Bottom', 'olympuswp' ),
				'left'   => esc_html__( 'Left', 'olympuswp' ),
			),
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[footer_copyright]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Olympus_Heading_Control(
		$wp_customize,
		'olympus_settings[footer_copyright]',
		array(
			'label' => esc_html__( 'Copyright', 'olympuswp' ),
			'section' => 'olympus_footer',
			'custom_class' => 'no-separator custom-heading',
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[copyright]',
	array(
		'default' => $defaults['copyright'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_html',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Editor_Control(
		$wp_customize,
		'olympus_settings[copyright]',
		array(
			'section' => 'olympus_footer',
			'input_attrs' => array(
				'id' => 'oly-footer-copyright',
			),
			'custom_class' => 'no-separator',
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[copyright_align]',
	array(
		'default' => $defaults['copyright_align'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_html_class',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Selector_Control(
		$wp_customize,
		'olympus_settings[copyright_align]',
		array(
			'label' => esc_html__( 'Alignment', 'olympuswp' ),
			'section' => 'olympus_footer',
			'choices'   => array(
				'left'   => olympus_get_svg_icon( 'align-left' ),
				'center' => olympus_get_svg_icon( 'align-center' ),
				'right'  => olympus_get_svg_icon( 'align-right' ),
			),
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[copyright_font_size]',
	array(
		'default' => $defaults['copyright_font_size'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_responsive_slider',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_setting(
	'olympus_settings[copyright_font_size_unit]',
	array(
		'default' => $defaults['copyright_font_size_unit'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Resp_Slider_Control(
		$wp_customize,
		'olympus_settings[copyright_font_size]',
		array(
			'label' => esc_html__( 'Font size', 'olympuswp' ),
			'section' => 'olympus_footer',
			'default' => $defaults['copyright_font_size'],
			'defaultUnit' => $defaults['copyright_font_size_unit'],
			'settings' => array(
				'size' => 'olympus_settings[copyright_font_size]',
				'sizeUnit' => 'olympus_settings[copyright_font_size_unit]',
			),
			'suffix' => array( 'px', 'em', 'rem', '%', 'vh', 'vw' ),
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[copyright_padding]',
	array(
		'default' => $defaults['copyright_padding'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_responsive_spacing',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Spacing_Control(
		$wp_customize,
		'olympus_settings[copyright_padding]',
		array(
			'label' => esc_html__( 'Padding', 'olympuswp' ),
			'section' => 'olympus_footer',
			'choices' => array(
				'top'    => esc_html__( 'Top', 'olympuswp' ),
				'right'  => esc_html__( 'Right', 'olympuswp' ),
				'bottom' => esc_html__( 'Bottom', 'olympuswp' ),
				'left'   => esc_html__( 'Left', 'olympuswp' ),
			),
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[footer_design]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Olympus_Heading_Control(
		$wp_customize,
		'olympus_settings[footer_design]',
		array(
			'label' => esc_html__( 'Design', 'olympuswp' ),
			'section' => 'olympus_footer',
			'custom_class' => 'no-separator custom-heading',
		)
	)
);

Olympus_Customize_Field::add_wrapper(
	'olympus_footer_colors_wrapper',
	array(
		'section' => 'olympus_footer',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'footer_background',
				'footer_titles_color',
				'footer_text_color',
			),
		),
		'custom_class' => 'no-separator',
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[footer_background]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['footer_background'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_hex_color',
	),
	array(
		'label' => esc_html__( 'Footer Colors', 'olympuswp' ),
		'section' => 'olympus_footer',
		'choices' => array(
			'wrapper' => 'footer_background',
			'tooltip' => esc_html__( 'Background Color', 'olympuswp' ),
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[footer_titles_color]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['footer_titles_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_hex_color',
	),
	array(
		'label' => esc_html__( 'Footer Titles', 'olympuswp' ),
		'section' => 'olympus_footer',
		'choices' => array(
			'wrapper' => 'footer_titles_color',
			'tooltip' => esc_html__( 'Titles Color', 'olympuswp' ),
			'hideLabel' => true,
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[footer_text_color]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['footer_text_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_hex_color',
	),
	array(
		'label' => esc_html__( 'Text Color', 'olympuswp' ),
		'section' => 'olympus_footer',
		'choices' => array(
			'wrapper' => 'footer_text_color',
			'tooltip' => esc_html__( 'Text Color', 'olympuswp' ),
			'hideLabel' => true,
		),
	)
);

Olympus_Customize_Field::add_wrapper(
	'olympus_footer_links_color_wrapper',
	array(
		'section' => 'olympus_footer',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'footer_links',
				'footer_links_hover',
			),
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[footer_links]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['footer_links'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Footer Links', 'olympuswp' ),
		'section' => 'olympus_footer',
		'choices' => array(
			'wrapper' => 'footer_links',
			'tooltip' => esc_html__( 'Choose Initial Color', 'olympuswp' ),
			'alpha' => true,
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[footer_links_hover]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['footer_links_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Footer Links Hover', 'olympuswp' ),
		'section' => 'olympus_footer',
		'choices' => array(
			'wrapper' => 'footer_links_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'olympuswp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);

Olympus_Customize_Field::add_wrapper(
	'olympus_copyright_colors_wrapper',
	array(
		'section' => 'olympus_footer',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'copyright_background',
				'copyright_text_color',
			),
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[copyright_background]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['copyright_background'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_hex_color',
	),
	array(
		'label' => esc_html__( 'Copyright Colors', 'olympuswp' ),
		'section' => 'olympus_footer',
		'choices' => array(
			'wrapper' => 'copyright_background',
			'tooltip' => esc_html__( 'Background Color', 'olympuswp' ),
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[copyright_text_color]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['copyright_text_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_hex_color',
	),
	array(
		'label' => esc_html__( 'Text Color', 'olympuswp' ),
		'section' => 'olympus_footer',
		'choices' => array(
			'wrapper' => 'copyright_text_color',
			'tooltip' => esc_html__( 'Text Color', 'olympuswp' ),
			'hideLabel' => true,
		),
	)
);

Olympus_Customize_Field::add_wrapper(
	'olympus_copyright_links_color_wrapper',
	array(
		'section' => 'olympus_footer',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'copyright_links',
				'copyright_links_hover',
			),
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[copyright_links]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['copyright_links'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Copyright Links', 'olympuswp' ),
		'section' => 'olympus_footer',
		'choices' => array(
			'wrapper' => 'copyright_links',
			'tooltip' => esc_html__( 'Choose Initial Color', 'olympuswp' ),
			'alpha' => true,
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[copyright_links_hover]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['copyright_links_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Copyright Links Hover', 'olympuswp' ),
		'section' => 'olympus_footer',
		'choices' => array(
			'wrapper' => 'copyright_links_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'olympuswp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);
