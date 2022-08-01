<?php
/**
 * Pagination setting
 */

// Pagination setting.
$wp_customize->add_section(
	'blogic_pagination',
	array(
		'title' => esc_html__( 'Pagination', 'blogic' ),
		'panel' => 'blogic_theme_options_panel',
	)
);

// Pagination enable setting.
$wp_customize->add_setting(
	'blogic_pagination_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'blogic_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Blogic_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'blogic_pagination_enable',
		array(
			'label'    => esc_html__( 'Enable Pagination.', 'blogic' ),
			'settings' => 'blogic_pagination_enable',
			'section'  => 'blogic_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Style.
$wp_customize->add_setting(
	'blogic_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'blogic_sanitize_select',
	)
);

$wp_customize->add_control(
	'blogic_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Style', 'blogic' ),
		'section'         => 'blogic_pagination',
		'type'            => 'select',
		'choices'         => array(
			'default'  => __( 'Default (Older/Newer)', 'blogic' ),
			'numeric'  => __( 'Numeric', 'blogic' ),
		),
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'blogic_pagination_enable' )->value() );
		},
	)
);
