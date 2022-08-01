<?php
/**
 * Sidebar settings
 */

$wp_customize->add_section(
	'blogic_sidebar_option',
	array(
		'title' => esc_html__( 'Sidebar Options', 'blogic' ),
		'panel' => 'blogic_theme_options_panel',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'blogic_sidebar_position',
	array(
		'sanitize_callback' => 'blogic_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'blogic_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'blogic' ),
		'section' => 'blogic_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'blogic' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'blogic' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'blogic' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'blogic_post_sidebar_position',
	array(
		'sanitize_callback' => 'blogic_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'blogic_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'blogic' ),
		'section' => 'blogic_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'blogic' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'blogic' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'blogic' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'blogic_page_sidebar_position',
	array(
		'sanitize_callback' => 'blogic_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'blogic_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'blogic' ),
		'section' => 'blogic_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'blogic' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'blogic' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'blogic' ),
		),
	)
);
