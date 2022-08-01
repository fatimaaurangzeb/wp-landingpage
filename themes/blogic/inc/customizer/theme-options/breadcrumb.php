<?php
/**
 * Breadcrumb settings
 */

$wp_customize->add_section(
	'blogic_breadcrumb_section',
	array(
		'title' => esc_html__( 'Breadcrumb Options', 'blogic' ),
		'panel' => 'blogic_theme_options_panel',
	)
);

// Breadcrumb enable setting.
$wp_customize->add_setting(
	'blogic_breadcrumb_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'blogic_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogic_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'blogic_breadcrumb_enable',
		array(
			'label'    => esc_html__( 'Enable breadcrumb.', 'blogic' ),
			'type'     => 'checkbox',
			'settings' => 'blogic_breadcrumb_enable',
			'section'  => 'blogic_breadcrumb_section',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'blogic_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'blogic_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'blogic' ),
		'section'         => 'blogic_breadcrumb_section',
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'blogic_breadcrumb_enable' )->value() );
		},
	)
);
