<?php
/**
 * Page Header section
 *
 * @package Olympus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->add_section(
	'olympus_page_header',
	array(
		'title' => esc_html__( 'Page Header', 'olympuswp' ),
		'priority' => 60,
	)
);

$wp_customize->add_setting(
	'olympus_settings[hide_title]',
	array(
		'default' => $defaults['hide_title'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Olympus_Switch_Control(
		$wp_customize,
		'olympus_settings[hide_title]',
		array(
			'label' => esc_html__( 'Hide Page Title', 'olympuswp' ),
			'section' => 'olympus_page_header',
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[add_breadcrumbs]',
	array(
		'default' => $defaults['add_breadcrumbs'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_checkbox',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Switch_Control(
		$wp_customize,
		'olympus_settings[add_breadcrumbs]',
		array(
			'label' => esc_html__( 'Add Breadcrumbs', 'olympuswp' ),
			'section' => 'olympus_page_header',
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[page_header_padding]',
	array(
		'default' => $defaults['page_header_padding'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_responsive_spacing',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Spacing_Control(
		$wp_customize,
		'olympus_settings[page_header_padding]',
		array(
			'label' => esc_html__( 'Padding', 'olympuswp' ),
			'section' => 'olympus_page_header',
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
	'olympus_settings[page_header_design]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Olympus_Heading_Control(
		$wp_customize,
		'olympus_settings[page_header_design]',
		array(
			'label' => esc_html__( 'Design', 'olympuswp' ),
			'section' => 'olympus_page_header',
			'custom_class' => 'no-separator custom-heading',
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[page_header_background]',
	array(
		'default' => $defaults['page_header_background'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Color_Control(
		$wp_customize,
		'olympus_settings[page_header_background]',
		array(
			'label' => esc_html__( 'Background Color', 'olympuswp' ),
			'section' => 'olympus_page_header',
			'custom_class' => 'no-separator',
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[page_header_title_color]',
	array(
		'default' => $defaults['page_header_title_color'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Color_Control(
		$wp_customize,
		'olympus_settings[page_header_title_color]',
		array(
			'label' => esc_html__( 'Title Color', 'olympuswp' ),
			'section' => 'olympus_page_header',
		)
	)
);

Olympus_Customize_Field::add_wrapper(
	'olympus_page_header_breadcrumbs_text_separator_color_wrapper',
	array(
		'section' => 'olympus_page_header',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'page_header_breadcrumbs_text_color',
				'page_header_breadcrumbs_separator_color',
			),
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[page_header_breadcrumbs_text_color]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['page_header_breadcrumbs_text_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Breadcrumbs Color', 'olympuswp' ),
		'section' => 'olympus_page_header',
		'choices' => array(
			'wrapper' => 'page_header_breadcrumbs_text_color',
			'tooltip' => esc_html__( 'Text Color', 'olympuswp' ),
			'alpha' => true,
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[page_header_breadcrumbs_separator_color]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['page_header_breadcrumbs_separator_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Separator Color', 'olympuswp' ),
		'section' => 'olympus_page_header',
		'choices' => array(
			'wrapper' => 'page_header_breadcrumbs_separator_color',
			'tooltip' => esc_html__( 'Separator Color', 'olympuswp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);

Olympus_Customize_Field::add_wrapper(
	'olympus_page_header_breadcrumbs_links_wrapper',
	array(
		'section' => 'olympus_page_header',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'page_header_breadcrumbs_links',
				'page_header_breadcrumbs_links_hover',
			),
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[page_header_breadcrumbs_links]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['page_header_breadcrumbs_links'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Breadcrumbs Links', 'olympuswp' ),
		'section' => 'olympus_page_header',
		'choices' => array(
			'wrapper' => 'page_header_breadcrumbs_links',
			'tooltip' => esc_html__( 'Choose Initial Color', 'olympuswp' ),
			'alpha' => true,
		),
	)
);

Olympus_Customize_Field::add_field(
	'olympus_settings[page_header_breadcrumbs_links_hover]',
	'Olympus_Color_Control',
	array(
		'default' => $defaults['page_header_breadcrumbs_links_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'olympus_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Breadcrumbs Links Hover', 'olympuswp' ),
		'section' => 'olympus_page_header',
		'choices' => array(
			'wrapper' => 'page_header_breadcrumbs_links_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'olympuswp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);
