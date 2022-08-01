<?php
/**
 * Single Post Options
 */

$wp_customize->add_section(
	'blogic_single_page_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'blogic' ),
		'panel' => 'blogic_theme_options_panel',
	)
);

// Enable single post category setting.
$wp_customize->add_setting(
	'blogic_enable_single_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'blogic_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Blogic_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'blogic_enable_single_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'blogic' ),
			'settings' => 'blogic_enable_single_category',
			'section'  => 'blogic_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post author setting.
$wp_customize->add_setting(
	'blogic_enable_single_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'blogic_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Blogic_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'blogic_enable_single_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'blogic' ),
			'settings' => 'blogic_enable_single_author',
			'section'  => 'blogic_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post date setting.
$wp_customize->add_setting(
	'blogic_enable_single_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'blogic_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Blogic_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'blogic_enable_single_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'blogic' ),
			'settings' => 'blogic_enable_single_date',
			'section'  => 'blogic_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post tag setting.
$wp_customize->add_setting(
	'blogic_enable_single_tag',
	array(
		'default'           => true,
		'sanitize_callback' => 'blogic_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Blogic_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'blogic_enable_single_tag',
		array(
			'label'    => esc_html__( 'Enable Post Tag', 'blogic' ),
			'settings' => 'blogic_enable_single_tag',
			'section'  => 'blogic_single_page_options',
			'type'     => 'checkbox',
		)
	)
);
