<?php
/**
 * Blog World functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blog World
 */

add_theme_support( 'title-tag' );

add_theme_support( 'automatic-feed-links' );

add_theme_support( 'register_block_style' );

add_theme_support( 'register_block_pattern' );

add_theme_support( 'responsive-embeds' );

add_theme_support( 'wp-block-styles' );

add_theme_support( 'align-wide' );

add_theme_support( 'html5', array(
	'search-form',
	'comment-form',
	'comment-list',
	'gallery',
	'caption',
	'style',
	'script',
) );

add_theme_support( 'custom-logo', array(
	'height'      => 250,
	'width'       => 250,
	'flex-width'  => true,
	'flex-height' => true,
) );

if ( ! function_exists( 'blog_world_setup' ) ) :
	function blog_world_setup() {
		/*
		* Make child theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_child_theme_textdomain( 'blog-world', get_stylesheet_directory() . '/languages' );
	}
endif;
add_action( 'after_setup_theme', 'blog_world_setup' );

if ( ! function_exists( 'blog_world_enqueue_styles' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function blog_world_enqueue_styles() {
		$parenthandle = 'blogic-style';
		$theme        = wp_get_theme();

		wp_enqueue_style(
			$parenthandle,
			get_template_directory_uri() . '/style.css',
			array(
				'blogic-fonts',
				'blogic-slick-style',
				'blogic-fontawesome-style',
				'blogic-blocks-style',
			),
			$theme->parent()->get( 'Version' )
		);

		wp_enqueue_style(
			'blog-world-style',
			get_stylesheet_uri(),
			array( $parenthandle ),
			$theme->get( 'Version' )
		);

	}

endif;

add_action( 'wp_enqueue_scripts', 'blog_world_enqueue_styles' );

function blog_world_customize_control_style() {
	wp_enqueue_style( 'blogin-customize-controls', get_theme_file_uri() . '/customize-controls.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'blog_world_customize_control_style' );

function blog_world_load_custom_wp_admin_style() {

	?>
	<style type="text/css">

		.ocdi p.about-description {
			display: none !important;
		}

	</style>

	<?php
}
add_action( 'admin_enqueue_scripts', 'blog_world_load_custom_wp_admin_style' );
