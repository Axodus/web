<?php
/**
 * Blog section
 *
 * @package Olympus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->add_panel(
	'olympus_blog',
	array(
		'title' => esc_html__( 'Blog', 'olympuswp' ),
		'priority' => 70,
	)
);

$wp_customize->add_section(
	'olympus_blog_archive',
	array(
		'title' => esc_html__( 'Blog Archive', 'olympuswp' ),
		'panel' => 'olympus_blog',
	)
);

$wp_customize->add_setting(
	'olympus_settings[archive_structure]',
	array(
		'default' => $defaults['archive_structure'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_multi_choices',
	)
);

$wp_customize->add_control(
	new Olympus_Sortable_Control(
		$wp_customize,
		'olympus_settings[archive_structure]',
		array(
			'label' => esc_html__( 'Structure', 'olympuswp' ),
			'section' => 'olympus_blog_archive',
			'choices' => array(
				'image' => esc_html__( 'Featured Image', 'olympuswp' ),
				'title-meta' => esc_html__( 'Title And Meta', 'olympuswp' ),
			),
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[archive_meta]',
	array(
		'default' => $defaults['archive_meta'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_multi_choices',
	)
);

$wp_customize->add_control(
	new Olympus_Sortable_Control(
		$wp_customize,
		'olympus_settings[archive_meta]',
		array(
			'label' => esc_html__( 'Meta', 'olympuswp' ),
			'section' => 'olympus_blog_archive',
			'choices' => array(
				'author' => esc_html__( 'Author', 'olympuswp' ),
				'date' => esc_html__( 'Date', 'olympuswp' ),
				'cat' => esc_html__( 'Category', 'olympuswp' ),
				'comments' => esc_html__( 'Comments', 'olympuswp' ),
			),
		)
	)
);

$wp_customize->add_section(
	'olympus_single_post',
	array(
		'title' => esc_html__( 'Single Post', 'olympuswp' ),
		'panel' => 'olympus_blog',
	)
);

$wp_customize->add_setting(
	'olympus_settings[single_post_structure]',
	array(
		'default' => $defaults['single_post_structure'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_multi_choices',
	)
);

$wp_customize->add_control(
	new Olympus_Sortable_Control(
		$wp_customize,
		'olympus_settings[single_post_structure]',
		array(
			'label' => esc_html__( 'Structure', 'olympuswp' ),
			'section' => 'olympus_single_post',
			'choices' => array(
				'image' => esc_html__( 'Featured Image', 'olympuswp' ),
				'title-meta' => esc_html__( 'Title And Meta', 'olympuswp' ),
			),
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[single_meta]',
	array(
		'default' => $defaults['single_meta'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_multi_choices',
	)
);

$wp_customize->add_control(
	new Olympus_Sortable_Control(
		$wp_customize,
		'olympus_settings[single_meta]',
		array(
			'label' => esc_html__( 'Meta', 'olympuswp' ),
			'section' => 'olympus_single_post',
			'choices' => array(
				'author' => esc_html__( 'Author', 'olympuswp' ),
				'date' => esc_html__( 'Date', 'olympuswp' ),
				'cat' => esc_html__( 'Category', 'olympuswp' ),
				'comments' => esc_html__( 'Comments', 'olympuswp' ),
			),
		)
	)
);
