<?php
/**
 * Adore Themes Customizer
 *
 * @package Blogic
 *
 * Slider Section
 */

$wp_customize->add_section(
	'blogic_slider_section',
	array(
		'title' => esc_html__( 'Slider Section', 'blogic' ),
		'panel' => 'blogic_frontpage_panel',
	)
);

// Slider enable setting.
$wp_customize->add_setting(
	'blogic_slider_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'blogic_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Blogic_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'blogic_slider_section_enable',
		array(
			'label'    => esc_html__( 'Enable Slider Section', 'blogic' ),
			'type'     => 'checkbox',
			'settings' => 'blogic_slider_section_enable',
			'section'  => 'blogic_slider_section',
		)
	)
);

// Slider autoplay setting.
$wp_customize->add_setting(
	'blogic_slider_section_autoplay',
	array(
		'default'           => false,
		'sanitize_callback' => 'blogic_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogic_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'blogic_slider_section_autoplay',
		array(
			'label'           => esc_html__( 'Enable Slider Autoplay', 'blogic' ),
			'type'            => 'checkbox',
			'settings'        => 'blogic_slider_section_autoplay',
			'section'         => 'blogic_slider_section',
			'active_callback' => 'blogic_if_slider_enabled',
		)
	)
);

// slider content type settings.
$wp_customize->add_setting(
	'blogic_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'blogic_sanitize_select',
	)
);

$wp_customize->add_control(
	'blogic_slider_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'blogic' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'blogic' ),
		'section'         => 'blogic_slider_section',
		'type'            => 'select',
		'active_callback' => 'blogic_if_slider_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'blogic' ),
			'page'     => esc_html__( 'Page', 'blogic' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {
	// slider post setting.
	$wp_customize->add_setting(
		'blogic_slider_post_' . $i,
		array(
			'sanitize_callback' => 'blogic_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'blogic_slider_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'blogic' ), $i ),
			'section'         => 'blogic_slider_section',
			'type'            => 'select',
			'choices'         => blogic_get_post_choices(),
			'active_callback' => 'blogic_slider_section_content_type_post_enabled',
		)
	);

	// slider page setting.
	$wp_customize->add_setting(
		'blogic_slider_page_' . $i,
		array(
			'default'           => 0,
			'sanitize_callback' => 'blogic_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'blogic_slider_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Page %d', 'blogic' ), $i ),
			'section'         => 'blogic_slider_section',
			'type'            => 'dropdown-pages',
			'choices'         => blogic_get_page_choices(),
			'active_callback' => 'blogic_slider_section_content_type_page_enabled',
		)
	);
}

/*========================Active Callback==============================*/
function blogic_if_slider_enabled( $control ) {
	return $control->manager->get_setting( 'blogic_slider_section_enable' )->value();
}
function blogic_slider_section_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'blogic_slider_content_type' )->value();
	return blogic_if_slider_enabled( $control ) && ( 'page' === $content_type );
}
function blogic_slider_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'blogic_slider_content_type' )->value();
	return blogic_if_slider_enabled( $control ) && ( 'post' === $content_type );
}