<?php
/**
 * Register HUMANía news custom post type and metadata.
 *
 * @package humania-ai-news
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Registers the HUMANía News custom post type.
 */
function humania_ai_news_register_news_post_type(): void
{
    $labels = [
        'name' => 'Noticias HUMANía',
        'singular_name' => 'Noticia HUMANía',
        'menu_name' => 'Revista HUMANía',
        'name_admin_bar' => 'Noticia HUMANía',
        'add_new' => 'Añadir noticia',
        'add_new_item' => 'Añadir noticia HUMANía',
        'new_item' => 'Nueva noticia HUMANía',
        'edit_item' => 'Editar noticia HUMANía',
        'view_item' => 'Ver noticia HUMANía',
        'all_items' => 'Todas las noticias',
        'search_items' => 'Buscar noticias',
        'not_found' => 'No se han encontrado noticias',
        'not_found_in_trash' => 'No hay noticias en la papelera',
    ];

    register_post_type(
        'humania_news',
        [
            'labels' => $labels,
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => 'humania-ai-news',
            'show_in_rest' => true,
            'publicly_queryable' => false,
            'exclude_from_search' => true,
            'show_in_nav_menus' => false,
            'menu_icon' => 'dashicons-media-document',
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
            'has_archive' => false,
            'rewrite' => false,
            'capability_type' => 'post',
        ]
    );
}
add_action('init', 'humania_ai_news_register_news_post_type');

/**
 * Registers metadata fields for HUMANía news.
 */
function humania_ai_news_register_news_meta(): void
{
    $fields = [
        'humania_news_source_name' => 'string',
        'humania_news_original_url' => 'string',
        'humania_news_original_language' => 'string',
        'humania_news_original_date' => 'string',
        'humania_news_detected_date' => 'string',
        'humania_news_editorial_status' => 'string',
        'humania_news_short_summary' => 'string',
        'humania_news_extended_summary' => 'string',
        'humania_news_remote_image_url' => 'string',
        'humania_news_image_approved' => 'boolean',
    ];

    foreach ($fields as $field => $type) {
        register_post_meta(
            'humania_news',
            $field,
            [
                'type' => $type,
                'single' => true,
                'show_in_rest' => true,
                'sanitize_callback' => $type === 'boolean' ? 'rest_sanitize_boolean' : 'sanitize_textarea_field',
                'auth_callback' => static function (): bool {
                    return current_user_can('edit_posts');
                },
            ]
        );
    }
}
add_action('init', 'humania_ai_news_register_news_meta');
