<?php

// Home Page Customizer panel.
$wp_customize->add_panel(
	'blogic_frontpage_panel',
	array(
		'title'    => esc_html__( 'Frontpage Sections', 'blogic' ),
		'priority' => 140,
	)
);

require get_template_directory() . '/inc/customizer/frontpage-customizer/slider.php';
