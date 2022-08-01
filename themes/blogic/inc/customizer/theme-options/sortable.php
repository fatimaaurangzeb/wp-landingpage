<?php

/**
 * Homepage Sortable  Options
 */

$wp_customize->add_section(
	'blogic_homepage_section_sortable',
	array(
		'title' => esc_html__( 'Sort sections', 'blogic' ),
		'panel' => 'blogic_frontpage_panel',
	)
);

// Homepage sections sortable.
$wp_customize->add_setting(
	'blogic_homepage_sortable_sections',
	array(
		'sanitize_callback' => 'blogic_sanitize_sort',
		'default'           => array(),

	)
);

$wp_customize->add_control(
	new Blogic_Customize_Control_Sort_Sections(
		$wp_customize,
		'blogic_homepage_sortable_sections',
		array(
			'section' => 'blogic_homepage_section_sortable',
			'label'   => esc_html__( 'Sort sections', 'blogic' ),
			'choices' => array(

				'slider'       => array(
					'name'       => esc_html__( 'Slider Section', 'blogic' ),
					'section_id' => 'blogic_slider_section',
				),

				'recent-post'  => array(
					'name'       => esc_html__( 'Recent Posts Section', 'blogic' ),
					'section_id' => 'blogic_recent_posts_section',
				),

				'popular-post' => array(
					'name'       => esc_html__( 'Popular Posts Section', 'blogic' ),
					'section_id' => 'blogic_popular_posts_section',
				),

				'post-grid'    => array(
					'name'       => esc_html__( 'Posts Grid Section', 'blogic' ),
					'section_id' => 'blogic_posts_grid_section',
				),

			),
		)
	)
);
