<?php
/**
 * Blog / Archive Options
 */

$wp_customize->add_section(
	'blogic_archive_page_options',
	array(
		'title' => esc_html__( 'Blog / Archive Pages Options', 'blogic' ),
		'panel' => 'blogic_theme_options_panel',
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'blogic_excerpt_length',
	array(
		'default'           => 15,
		'sanitize_callback' => 'blogic_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'blogic_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'blogic' ),
		'section'     => 'blogic_archive_page_options',
		'settings'    => 'blogic_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 5,
			'max'  => 200,
			'step' => 1,
		),
	)
);

// Grid Column layout options.
$wp_customize->add_setting(
	'blogic_archive_grid_column_layout',
	array(
		'default'           => 'grid-column-3',
		'sanitize_callback' => 'blogic_sanitize_select',
	)
);

$wp_customize->add_control(
	'blogic_archive_grid_column_layout',
	array(
		'label'           => esc_html__( 'Grid Column Layout', 'blogic' ),
		'section'         => 'blogic_archive_page_options',
		'type'            => 'select',
		'choices'         => array(
			'grid-column-1' => __( 'Column 1', 'blogic' ),
			'grid-column-2' => __( 'Column 2', 'blogic' ),
			'grid-column-3' => __( 'Column 3', 'blogic' ),
			'grid-column-4' => __( 'Column 4', 'blogic' ),
		),
	)
);

// Enable archive page category setting.
$wp_customize->add_setting(
	'blogic_enable_archive_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'blogic_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Blogic_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'blogic_enable_archive_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'blogic' ),
			'settings' => 'blogic_enable_archive_category',
			'section'  => 'blogic_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page author setting.
$wp_customize->add_setting(
	'blogic_enable_archive_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'blogic_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Blogic_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'blogic_enable_archive_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'blogic' ),
			'settings' => 'blogic_enable_archive_author',
			'section'  => 'blogic_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page date setting.
$wp_customize->add_setting(
	'blogic_enable_archive_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'blogic_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Blogic_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'blogic_enable_archive_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'blogic' ),
			'settings' => 'blogic_enable_archive_date',
			'section'  => 'blogic_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page post image setting.
$wp_customize->add_setting(
	'blogic_enable_archive_post_image',
	array(
		'default'           => true,
		'sanitize_callback' => 'blogic_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Blogic_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'blogic_enable_archive_post_image',
		array(
			'label'    => esc_html__( 'Enable Post Image', 'blogic' ),
			'settings' => 'blogic_enable_archive_post_image',
			'section'  => 'blogic_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page post title setting.
$wp_customize->add_setting(
	'blogic_enable_archive_post_title',
	array(
		'default'           => true,
		'sanitize_callback' => 'blogic_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Blogic_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'blogic_enable_archive_post_title',
		array(
			'label'    => esc_html__( 'Enable Post Title', 'blogic' ),
			'settings' => 'blogic_enable_archive_post_title',
			'section'  => 'blogic_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page post description setting.
$wp_customize->add_setting(
	'blogic_enable_archive_post_description',
	array(
		'default'           => true,
		'sanitize_callback' => 'blogic_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Blogic_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'blogic_enable_archive_post_description',
		array(
			'label'    => esc_html__( 'Enable Post Description', 'blogic' ),
			'settings' => 'blogic_enable_archive_post_description',
			'section'  => 'blogic_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);
