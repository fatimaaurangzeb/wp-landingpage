<?php

/**
 * Color Options
 */

// Site tagline color setting.
$wp_customize->add_setting(
	'blogic_header_tagline',
	array(
		'default'           => '#404040',
		'sanitize_callback' => 'blogic_sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'blogic_header_tagline',
		array(
			'label'   => esc_html__( 'Site tagline Color', 'blogic' ),
			'section' => 'colors',
		)
	)
);
