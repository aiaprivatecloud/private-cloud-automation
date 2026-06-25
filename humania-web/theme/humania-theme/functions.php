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

/**
 * Register HUMANía episode meta fields.
 */
function humania_register_episode_meta(): void {
    $fields = array(
        'humania_audio_url'     => 'string',
        'humania_spotify_url'   => 'string',
        'humania_apple_url'     => 'string',
        'humania_ivoox_url'     => 'string',
        'humania_youtube_url'   => 'string',
        'humania_episode_intro' => 'string',
        'humania_summary'       => 'string',
        'humania_key_points'    => 'string',
        'humania_references'    => 'string',
    );

    foreach ( $fields as $field => $type ) {
        register_post_meta(
            'post',
            $field,
            array(
                'type'              => $type,
                'single'            => true,
                'show_in_rest'      => true,
                'sanitize_callback' => 'sanitize_textarea_field',
                'auth_callback'     => function () {
                    return current_user_can( 'edit_posts' );
                },
            )
        );
    }
}
add_action( 'init', 'humania_register_episode_meta' );

/**
 * Add HUMANía episode meta box.
 */
function humania_add_episode_meta_box(): void {
    add_meta_box(
        'humania_episode_data',
        __( 'Datos del episodio HUMANía', 'humania-theme' ),
        'humania_render_episode_meta_box',
        'post',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'humania_add_episode_meta_box' );

/**
 * Render HUMANía episode meta box.
 *
 * @param WP_Post $post Current post.
 */
function humania_render_episode_meta_box( WP_Post $post ): void {
    wp_nonce_field( 'humania_save_episode_meta', 'humania_episode_meta_nonce' );

    $fields = array(
        'humania_audio_url'     => 'Audio MP3',
        'humania_spotify_url'   => 'Spotify',
        'humania_apple_url'     => 'Apple Podcasts',
        'humania_ivoox_url'     => 'iVoox',
        'humania_youtube_url'   => 'YouTube',
        'humania_episode_intro' => 'Introducción breve',
        'humania_summary'       => 'Resumen',
        'humania_key_points'    => 'Ideas clave (una por línea)',
        'humania_references'    => 'Referencias (una por línea, formato: Título | URL)',
    );

    echo '<div class="humania-admin-fields" style="display:grid;gap:16px;">';

    foreach ( $fields as $key => $label ) {
        $value = get_post_meta( $post->ID, $key, true );

        echo '<p style="margin:0;">';
        echo '<label for="' . esc_attr( $key ) . '" style="display:block;font-weight:700;margin-bottom:6px;">' . esc_html( $label ) . '</label>';

        if ( in_array( $key, array( 'humania_episode_intro', 'humania_summary', 'humania_key_points', 'humania_references' ), true ) ) {
            echo '<textarea id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" rows="4" style="width:100%;">' . esc_textarea( $value ) . '</textarea>';
        } else {
            echo '<input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="url" value="' . esc_attr( $value ) . '" style="width:100%;">';
        }

        echo '</p>';
    }

    echo '</div>';
}

/**
 * Save HUMANía episode meta fields.
 *
 * @param int $post_id Current post ID.
 */
function humania_save_episode_meta( int $post_id ): void {
    if ( ! isset( $_POST['humania_episode_meta_nonce'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['humania_episode_meta_nonce'] ) ), 'humania_save_episode_meta' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $fields = array(
        'humania_audio_url',
        'humania_spotify_url',
        'humania_apple_url',
        'humania_ivoox_url',
        'humania_youtube_url',
        'humania_episode_intro',
        'humania_summary',
        'humania_key_points',
        'humania_references',
    );

    foreach ( $fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            update_post_meta(
                $post_id,
                $field,
                sanitize_textarea_field( wp_unslash( $_POST[ $field ] ) )
            );
        }
    }
}
add_action( 'save_post', 'humania_save_episode_meta' );
