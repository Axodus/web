<?php
/**
 * Layout section
 *
 * @package Olympus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->add_section(
	'olympus_layout',
	array(
		'title' => esc_html__( 'Layout', 'olympuswp' ),
		'priority' => 40,
	)
);

$wp_customize->add_setting(
	'olympus_settings[container_width]',
	array(
		'default' => $defaults['container_width'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_decimal_integer',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_setting(
	'olympus_settings[container_width_unit]',
	array(
		'default' => $defaults['container_width_unit'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Olympus_Slider_Control(
		$wp_customize,
		'olympus_settings[container_width]',
		array(
			'label' => esc_html__( 'Container Width', 'olympuswp' ),
			'section' => 'olympus_layout',
			'default' => $defaults['container_width'],
			'defaultUnit' => $defaults['container_width_unit'],
			'settings' => array(
				'size' => 'olympus_settings[container_width]',
				'sizeUnit' => 'olympus_settings[container_width_unit]',
			),
			'input_attrs' => array(
				'min'  => 700,
				'max'  => 2000,
				'step' => 5,
			),
			'suffix' => array( 'px', '%' ),
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[general_layout]',
	array(
		'default' => $defaults['general_layout'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_choices',
	)
);

$wp_customize->add_control(
	new Olympus_Radio_Image_Control(
		$wp_customize,
		'olympus_settings[general_layout]',
		array(
			'label' => esc_html__( 'General Layout', 'olympuswp' ),
			'section' => 'olympus_layout',
			'choices' => array(
				'full-width'  => array(
					'label' => esc_html__( 'Full Width', 'olympuswp' ),
					'icon'  => olympus_get_svg_icon( 'full-width' ),
				),
				'left-sidebar' => array(
					'label' => esc_html__( 'Left Sidebar', 'olympuswp' ),
					'icon'  => olympus_get_svg_icon( 'left-sidebar' ),
				),
				'right-sidebar' => array(
					'label' => esc_html__( 'Right Sidebar', 'olympuswp' ),
					'icon'  => olympus_get_svg_icon( 'right-sidebar' ),
				),
				'no-sidebar' => array(
					'label' => esc_html__( 'No Sidebar', 'olympuswp' ),
					'icon'  => olympus_get_svg_icon( 'no-sidebar' ),
				),
			),
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[blog_layout]',
	array(
		'default' => $defaults['blog_layout'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_choices',
	)
);

$wp_customize->add_control(
	new Olympus_Radio_Image_Control(
		$wp_customize,
		'olympus_settings[blog_layout]',
		array(
			'label' => esc_html__( 'Blog Layout', 'olympuswp' ),
			'section' => 'olympus_layout',
			'choices' => array(
				'full-width'  => array(
					'label' => esc_html__( 'Full Width', 'olympuswp' ),
					'icon'  => olympus_get_svg_icon( 'full-width' ),
				),
				'left-sidebar' => array(
					'label' => esc_html__( 'Left Sidebar', 'olympuswp' ),
					'icon'  => olympus_get_svg_icon( 'left-sidebar' ),
				),
				'right-sidebar' => array(
					'label' => esc_html__( 'Right Sidebar', 'olympuswp' ),
					'icon'  => olympus_get_svg_icon( 'right-sidebar' ),
				),
				'no-sidebar' => array(
					'label' => esc_html__( 'No Sidebar', 'olympuswp' ),
					'icon'  => olympus_get_svg_icon( 'no-sidebar' ),
				),
			),
		)
	)
);

$wp_customize->add_setting(
	'olympus_settings[single_post_layout]',
	array(
		'default' => $defaults['single_post_layout'],
		'type' => 'option',
		'sanitize_callback' => 'olympus_sanitize_choices',
	)
);

$wp_customize->add_control(
	new Olympus_Radio_Image_Control(
		$wp_customize,
		'olympus_settings[single_post_layout]',
		array(
			'label' => esc_html__( 'Single Post Layout', 'olympuswp' ),
			'section' => 'olympus_layout',
			'choices' => array(
				'full-width'  => array(
					'label' => esc_html__( 'Full Width', 'olympuswp' ),
					'icon'  => olympus_get_svg_icon( 'full-width' ),
				),
				'left-sidebar' => array(
					'label' => esc_html__( 'Left Sidebar', 'olympuswp' ),
					'icon'  => olympus_get_svg_icon( 'left-sidebar' ),
				),
				'right-sidebar' => array(
					'label' => esc_html__( 'Right Sidebar', 'olympuswp' ),
					'icon'  => olympus_get_svg_icon( 'right-sidebar' ),
				),
				'no-sidebar' => array(
					'label' => esc_html__( 'No Sidebar', 'olympuswp' ),
					'icon'  => olympus_get_svg_icon( 'no-sidebar' ),
				),
			),
		)
	)
);

// If WooCommerce exist.
if ( class_exists( 'WooCommerce' ) ) {
	$wp_customize->add_setting(
		'olympus_settings[shop_layout]',
		array(
			'default' => $defaults['shop_layout'],
			'type' => 'option',
			'sanitize_callback' => 'olympus_sanitize_choices',
		)
	);
	
	$wp_customize->add_control(
		new Olympus_Radio_Image_Control(
			$wp_customize,
			'olympus_settings[shop_layout]',
			array(
				'label' => esc_html__( 'Shop Layout', 'olympuswp' ),
				'section' => 'olympus_layout',
				'choices' => array(
					'full-width'  => array(
						'label' => esc_html__( 'Full Width', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'full-width' ),
					),
					'left-sidebar' => array(
						'label' => esc_html__( 'Left Sidebar', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'left-sidebar' ),
					),
					'right-sidebar' => array(
						'label' => esc_html__( 'Right Sidebar', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'right-sidebar' ),
					),
					'no-sidebar' => array(
						'label' => esc_html__( 'No Sidebar', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'no-sidebar' ),
					),
				),
			)
		)
	);

	$wp_customize->add_setting(
		'olympus_settings[single_product_layout]',
		array(
			'default' => $defaults['single_product_layout'],
			'type' => 'option',
			'sanitize_callback' => 'olympus_sanitize_choices',
		)
	);
	
	$wp_customize->add_control(
		new Olympus_Radio_Image_Control(
			$wp_customize,
			'olympus_settings[single_product_layout]',
			array(
				'label' => esc_html__( 'Single Product Layout', 'olympuswp' ),
				'section' => 'olympus_layout',
				'choices' => array(
					'full-width'  => array(
						'label' => esc_html__( 'Full Width', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'full-width' ),
					),
					'left-sidebar' => array(
						'label' => esc_html__( 'Left Sidebar', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'left-sidebar' ),
					),
					'right-sidebar' => array(
						'label' => esc_html__( 'Right Sidebar', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'right-sidebar' ),
					),
					'no-sidebar' => array(
						'label' => esc_html__( 'No Sidebar', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'no-sidebar' ),
					),
				),
			)
		)
	);

	$wp_customize->add_setting(
		'olympus_settings[cart_layout]',
		array(
			'default' => $defaults['cart_layout'],
			'type' => 'option',
			'sanitize_callback' => 'olympus_sanitize_choices',
		)
	);
	
	$wp_customize->add_control(
		new Olympus_Radio_Image_Control(
			$wp_customize,
			'olympus_settings[cart_layout]',
			array(
				'label' => esc_html__( 'Cart Layout', 'olympuswp' ),
				'section' => 'olympus_layout',
				'choices' => array(
					'full-width'  => array(
						'label' => esc_html__( 'Full Width', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'full-width' ),
					),
					'left-sidebar' => array(
						'label' => esc_html__( 'Left Sidebar', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'left-sidebar' ),
					),
					'right-sidebar' => array(
						'label' => esc_html__( 'Right Sidebar', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'right-sidebar' ),
					),
					'no-sidebar' => array(
						'label' => esc_html__( 'No Sidebar', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'no-sidebar' ),
					),
				),
			)
		)
	);

	$wp_customize->add_setting(
		'olympus_settings[checkout_layout]',
		array(
			'default' => $defaults['checkout_layout'],
			'type' => 'option',
			'sanitize_callback' => 'olympus_sanitize_choices',
		)
	);
	
	$wp_customize->add_control(
		new Olympus_Radio_Image_Control(
			$wp_customize,
			'olympus_settings[checkout_layout]',
			array(
				'label' => esc_html__( 'Checkout Layout', 'olympuswp' ),
				'section' => 'olympus_layout',
				'choices' => array(
					'full-width'  => array(
						'label' => esc_html__( 'Full Width', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'full-width' ),
					),
					'left-sidebar' => array(
						'label' => esc_html__( 'Left Sidebar', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'left-sidebar' ),
					),
					'right-sidebar' => array(
						'label' => esc_html__( 'Right Sidebar', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'right-sidebar' ),
					),
					'no-sidebar' => array(
						'label' => esc_html__( 'No Sidebar', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'no-sidebar' ),
					),
				),
			)
		)
	);

	$wp_customize->add_setting(
		'olympus_settings[my_account_layout]',
		array(
			'default' => $defaults['my_account_layout'],
			'type' => 'option',
			'sanitize_callback' => 'olympus_sanitize_choices',
		)
	);
	
	$wp_customize->add_control(
		new Olympus_Radio_Image_Control(
			$wp_customize,
			'olympus_settings[my_account_layout]',
			array(
				'label' => esc_html__( 'My Account Layout', 'olympuswp' ),
				'section' => 'olympus_layout',
				'choices' => array(
					'full-width'  => array(
						'label' => esc_html__( 'Full Width', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'full-width' ),
					),
					'left-sidebar' => array(
						'label' => esc_html__( 'Left Sidebar', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'left-sidebar' ),
					),
					'right-sidebar' => array(
						'label' => esc_html__( 'Right Sidebar', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'right-sidebar' ),
					),
					'no-sidebar' => array(
						'label' => esc_html__( 'No Sidebar', 'olympuswp' ),
						'icon'  => olympus_get_svg_icon( 'no-sidebar' ),
					),
				),
			)
		)
	);
}

// If LearnDash
if ( defined( 'LEARNDASH_VERSION' ) ) {
	$ld_pt = array(
		'sfwd_quiz' => esc_html__( 'Quiz', 'olympuswp' ),
		'sfwd_certificates' => esc_html__( 'Certificates', 'olympuswp' ),
		'sfwd_lessons' => esc_html__( 'Lessons', 'olympuswp' ),
		'sfwd_topic' => esc_html__( 'Topic', 'olympuswp' ),
		'sfwd_transactions' => esc_html__( 'Transactions', 'olympuswp' ),
		'sfwd_essays' => esc_html__( 'Essays', 'olympuswp' ),
		'sfwd_assignment' => esc_html__( 'Assignment', 'olympuswp' ),
		'sfwd_courses' => esc_html__( 'Courses', 'olympuswp' ),
		'ld_exam' => esc_html__( 'Challenges', 'olympuswp' ),
	);
	foreach ( $ld_pt as $name => $label ) {
		$wp_customize->add_setting(
			'olympus_settings[' . $name . '_layout]',
			array(
				'default' => $defaults[$name . '_layout'],
				'type' => 'option',
				'sanitize_callback' => 'olympus_sanitize_choices',
			)
		);
		
		$wp_customize->add_control(
			new Olympus_Radio_Image_Control(
				$wp_customize,
				'olympus_settings[' . $name . '_layout]',
				array(
					'label' => $label . ' ' . esc_html__( 'Layout', 'olympuswp' ),
					'section' => 'olympus_layout',
					'choices' => array(
						'full-width'  => array(
							'label' => esc_html__( 'Full Width', 'olympuswp' ),
							'icon'  => olympus_get_svg_icon( 'full-width' ),
						),
						'left-sidebar' => array(
							'label' => esc_html__( 'Left Sidebar', 'olympuswp' ),
							'icon'  => olympus_get_svg_icon( 'left-sidebar' ),
						),
						'right-sidebar' => array(
							'label' => esc_html__( 'Right Sidebar', 'olympuswp' ),
							'icon'  => olympus_get_svg_icon( 'right-sidebar' ),
						),
						'no-sidebar' => array(
							'label' => esc_html__( 'No Sidebar', 'olympuswp' ),
							'icon'  => olympus_get_svg_icon( 'no-sidebar' ),
						),
					),
				)
			)
		);
	}
}

// If LifterLMS
if ( class_exists( 'LifterLMS' ) ) {
	$llms_pt = array(
		'course' => esc_html__( 'Course', 'olympuswp' ),
		'lesson' => esc_html__( 'Lesson', 'olympuswp' ),
		'llms_quiz' => esc_html__( 'Quiz', 'olympuswp' ),
		'llms_membership' => esc_html__( 'Membership', 'olympuswp' ),
		'llms_certificate' => esc_html__( 'Certificate', 'olympuswp' ),
		'llms_my_certificate' => esc_html__( 'My Certificate', 'olympuswp' ),
	);
	foreach ( $llms_pt as $name => $label ) {
		$wp_customize->add_setting(
			'olympus_settings[' . $name . '_layout]',
			array(
				'default' => $defaults[$name . '_layout'],
				'type' => 'option',
				'sanitize_callback' => 'olympus_sanitize_choices',
			)
		);
		
		$wp_customize->add_control(
			new Olympus_Radio_Image_Control(
				$wp_customize,
				'olympus_settings[' . $name . '_layout]',
				array(
					'label' => $label . ' ' . esc_html__( 'Layout', 'olympuswp' ),
					'section' => 'olympus_layout',
					'choices' => array(
						'full-width'  => array(
							'label' => esc_html__( 'Full Width', 'olympuswp' ),
							'icon'  => olympus_get_svg_icon( 'full-width' ),
						),
						'left-sidebar' => array(
							'label' => esc_html__( 'Left Sidebar', 'olympuswp' ),
							'icon'  => olympus_get_svg_icon( 'left-sidebar' ),
						),
						'right-sidebar' => array(
							'label' => esc_html__( 'Right Sidebar', 'olympuswp' ),
							'icon'  => olympus_get_svg_icon( 'right-sidebar' ),
						),
						'no-sidebar' => array(
							'label' => esc_html__( 'No Sidebar', 'olympuswp' ),
							'icon'  => olympus_get_svg_icon( 'no-sidebar' ),
						),
					),
				)
			)
		);
	}
}

// If Custom Post Type
$all_post_types = olympus_get_post_types_objects();
foreach ( $all_post_types as $post_type_item ) {
	$post_type_name  = $post_type_item->name;
	$post_type_label = $post_type_item->label;
	$ignore_type     = olympus_get_post_types_to_ignore();

	if ( ! in_array( $post_type_name, $ignore_type, true ) ) {
		$wp_customize->add_setting(
			'olympus_settings[' . $post_type_name . '_layout]',
			array(
				'default' => $defaults[$post_type_name . '_layout'],
				'type' => 'option',
				'sanitize_callback' => 'olympus_sanitize_choices',
			)
		);
		
		$wp_customize->add_control(
			new Olympus_Radio_Image_Control(
				$wp_customize,
				'olympus_settings[' . $post_type_name . '_layout]',
				array(
					'label' => $post_type_label . ' ' . esc_html__( 'Layout', 'olympuswp' ),
					'section' => 'olympus_layout',
					'choices' => array(
						'full-width'  => array(
							'label' => esc_html__( 'Full Width', 'olympuswp' ),
							'icon'  => olympus_get_svg_icon( 'full-width' ),
						),
						'left-sidebar' => array(
							'label' => esc_html__( 'Left Sidebar', 'olympuswp' ),
							'icon'  => olympus_get_svg_icon( 'left-sidebar' ),
						),
						'right-sidebar' => array(
							'label' => esc_html__( 'Right Sidebar', 'olympuswp' ),
							'icon'  => olympus_get_svg_icon( 'right-sidebar' ),
						),
						'no-sidebar' => array(
							'label' => esc_html__( 'No Sidebar', 'olympuswp' ),
							'icon'  => olympus_get_svg_icon( 'no-sidebar' ),
						),
					),
				)
			)
		);

		$wp_customize->add_setting(
			'olympus_settings[single_' . $post_type_name . '_layout]',
			array(
				'default' => $defaults['single_' . $post_type_name . '_layout'],
				'type' => 'option',
				'sanitize_callback' => 'olympus_sanitize_choices',
			)
		);
		
		$wp_customize->add_control(
			new Olympus_Radio_Image_Control(
				$wp_customize,
				'olympus_settings[single_' . $post_type_name . '_layout]',
				array(
					'label' => esc_html__( 'Single', 'olympuswp' ) . ' ' . $post_type_label . ' ' . esc_html__( 'Layout', 'olympuswp' ),
					'section' => 'olympus_layout',
					'choices' => array(
						'full-width'  => array(
							'label' => esc_html__( 'Full Width', 'olympuswp' ),
							'icon'  => olympus_get_svg_icon( 'full-width' ),
						),
						'left-sidebar' => array(
							'label' => esc_html__( 'Left Sidebar', 'olympuswp' ),
							'icon'  => olympus_get_svg_icon( 'left-sidebar' ),
						),
						'right-sidebar' => array(
							'label' => esc_html__( 'Right Sidebar', 'olympuswp' ),
							'icon'  => olympus_get_svg_icon( 'right-sidebar' ),
						),
						'no-sidebar' => array(
							'label' => esc_html__( 'No Sidebar', 'olympuswp' ),
							'icon'  => olympus_get_svg_icon( 'no-sidebar' ),
						),
					),
				)
			)
		);
	}
}
