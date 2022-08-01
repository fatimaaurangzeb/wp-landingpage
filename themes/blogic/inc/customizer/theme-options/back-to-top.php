<?php
/**
 * Back To Top settings
 */

$wp_customize->add_section(
	'blogic_back_to_top_section',
	array(
		'title' => esc_html__( 'Scroll Up ( Back To Top )', 'blogic' ),
		'panel' => 'blogic_theme_options_panel',
	)
);

// Scroll to top enable setting.
$wp_customize->add_setting(
	'blogic_enable_scroll_to_top',
	array(
		'default'           => true,
		'sanitize_callback' => 'blogic_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogic_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'blogic_enable_scroll_to_top',
		array(
			'label'    => esc_html__( 'Enable scroll to top.', 'blogic' ),
			'settings' => 'blogic_enable_scroll_to_top',
			'section'  => 'blogic_back_to_top_section',
			'type'     => 'checkbox',
		)
	)
);
