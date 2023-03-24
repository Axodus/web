<?php
/**
 * Site Identity section
 *
 * @package Olympus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->get_section( 'title_tagline' )->priority = 1;
$wp_customize->get_control( 'blogname' )->priority = 1;
$wp_customize->get_control( 'blogdescription' )->priority = 3;
$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => 'olympus_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => 'olympus_customize_partial_blogdescription',
		)
	);
}

$wp_customize->add_setting(
	'olympus_settings[show_site_title]',
	array(
		'default' => $defaults['show_site_title'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Olympus_Switch_Control(
		$wp_customize,
		'olympus_settings[show_site_title]',
		array(
			'label' => esc_html__( 'Display Site Title', 'olympuswp' ),
			'section' => 'title_tagline',
			'priority' => 2,
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[show_tagline]',
	array(
		'default' => $defaults['show_tagline'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Olympus_Switch_Control(
		$wp_customize,
		'olympus_settings[show_tagline]',
		array(
			'label' => esc_html__( 'Display Tagline', 'olympuswp' ),
			'section' => 'title_tagline',
			'priority' => 4,
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'olympus_settings[retina_logo]',
		array(
			'selector'            => '.site-header-inner .site-branding',
			'container_inclusive' => true,
			'render_callback'     => 'olympus_add_logo',
			'fallback_refresh'    => false,
		)
	);
}

$wp_customize->add_setting(
	'olympus_settings[add_retina_logo]',
	array(
		'default' => $defaults['add_retina_logo'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_checkbox',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Switch_Control(
		$wp_customize,
		'olympus_settings[add_retina_logo]',
		array(
			'label' => esc_html__( 'Add Retina Logo', 'olympuswp' ),
			'section' => 'title_tagline',
			'priority' => 50,
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[retina_logo]',
	array(
		'default' => $defaults['retina_logo'],
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'olympus_settings[retina_logo]',
		array(
			'label' => esc_html__( 'Retina Logo', 'olympuswp' ),
			'section' => 'title_tagline',
			'priority' => 50,
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[logo_width]',
	array(
		'default' => $defaults['logo_width'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_responsive_slider',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_setting(
	'olympus_settings[logo_width_unit]',
	array(
		'default' => $defaults['logo_width_unit'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Resp_Slider_Control(
		$wp_customize,
		'olympus_settings[logo_width]',
		array(
			'label' => esc_html__( 'Logo Size', 'olympuswp' ),
			'section' => 'title_tagline',
			'default' => $defaults['logo_width'],
			'defaultUnit' => $defaults['logo_width_unit'],
			'settings' => array(
				'size' => 'olympus_settings[logo_width]',
				'sizeUnit' => 'olympus_settings[logo_width_unit]',
			),
			'input_attrs' => array(
				'max'  => 600,
				'step' => 1,
			),
			'suffix' => array( 'px', 'em', 'rem', '%' ),
			'priority' => 50,
		)
	)
);
