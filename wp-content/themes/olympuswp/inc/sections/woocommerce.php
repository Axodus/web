<?php
/**
 * WooCommerce section
 *
 * @package Olympus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->get_panel( 'woocommerce' )->priority = 71;

$wp_customize->add_setting(
	'olympus_settings[shop_columns]',
	array(
		'default' => $defaults['shop_columns'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_responsive_slider',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Resp_Slider_Control(
		$wp_customize,
		'olympus_settings[shop_columns]',
		array(
			'label' => esc_html__( 'Shop Columns', 'olympuswp' ),
			'section' => 'woocommerce_product_catalog',
			'default' => $defaults['shop_columns'],
			'settings' => array(
				'size' => 'olympus_settings[shop_columns]',
			),
			'input_attrs' => array(
				'min'  => 1,
				'max'  => 6,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[shop_no_of_products]',
	array(
		'default' => $defaults['shop_no_of_products'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_check_numberic_values',
	)
);

$wp_customize->add_control(
	new Olympus_Slider_Control(
		$wp_customize,
		'olympus_settings[shop_no_of_products]',
		array(
			'label' => esc_html__( 'Products Per Page', 'olympuswp' ),
			'section' => 'woocommerce_product_catalog',
			'default' => $defaults['shop_no_of_products'],
			'settings' => array(
				'size' => 'olympus_settings[shop_no_of_products]',
			),
			'input_attrs' => array(
				'min' => 1,
				'max' => 100,
				'step' => 1,
			),
		)
	)
);
