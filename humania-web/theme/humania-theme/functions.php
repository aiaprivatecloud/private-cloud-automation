<?php
/**
 * Funciones principales del tema HUMANía.
 *
 * @package HUMANía
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Configuracion inicial del tema.
 */
function humania_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Menu principal', 'humania' ),
			'footer'  => __( 'Menu footer', 'humania' ),
		)
	);
}
add_action( 'after_setup_theme', 'humania_theme_setup' );

/**
 * Carga de estilos y scripts.
 */
function humania_enqueue_assets() {
	wp_enqueue_style(
		'humania-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		'0.1.0'
	);

	wp_enqueue_script(
		'humania-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		'0.1.0',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'humania_enqueue_assets' );

/**
 * Register HUMANía navigation menus.
 */
function humania_register_navigation_menus(): void {
    register_nav_menus(
        array(
            'primary' => __( 'Menú principal', 'humania-theme' ),
        )
    );
}
add_action( 'after_setup_theme', 'humania_register_navigation_menus' );

