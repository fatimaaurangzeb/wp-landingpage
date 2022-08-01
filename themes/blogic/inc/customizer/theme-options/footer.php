<?php
/**
 * Footer copyright
 */

// Footer copyright
$wp_customize->add_section(
	'blogic_footer_section',
	array(
		'title' => esc_html__( 'Footer Options', 'blogic' ),
		'panel' => 'blogic_theme_options_panel',
	)
);

$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'blogic' ), '[the-year]', '[site-link]' );

// Footer copyright setting.
$wp_customize->add_setting(
	'blogic_copyright_txt',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'blogic_sanitize_html',
	)
);

$wp_customize->add_control(
	'blogic_copyright_txt',
	array(
		'label'           => esc_html__( 'Copyright text', 'blogic' ),
		'section'         => 'blogic_footer_section',
		'type'            => 'textarea',
	)
);
