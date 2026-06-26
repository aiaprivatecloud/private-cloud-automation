<?php
/**
 * Plugin Name: HUMANía AI News
 * Description: Plugin propio para automatización controlada de noticias de inteligencia artificial.
 * Version: 0.1.0
 * Author: HUMANía
 * Text Domain: humania
 */

if (!defined('ABSPATH')) {
    exit;
}

define('HUMANIA_AI_NEWS_VERSION', '0.1.0');
define('HUMANIA_AI_NEWS_PATH', plugin_dir_path(__FILE__));
define('HUMANIA_AI_NEWS_URL', plugin_dir_url(__FILE__));

$humania_ai_news_includes = [
    'includes/security.php',
    'includes/logger.php',
    'includes/fetch-sources.php',
    'includes/normalize-item.php',
    'includes/deduplicate.php',
    'includes/import-news.php',
    'includes/cron.php',
    'includes/classify.php',
    'includes/summarize.php',
    'includes/create-draft.php',
    'includes/player-shortcode.php',
    'includes/news-post-type.php',
    'includes/news-meta-box.php',
    'includes/news-review-actions.php',
    'admin/settings-page.php',
    'admin/review-page.php',
];

foreach ($humania_ai_news_includes as $humania_ai_news_file) {
    $humania_ai_news_path = HUMANIA_AI_NEWS_PATH . $humania_ai_news_file;

    if (file_exists($humania_ai_news_path)) {
        require_once $humania_ai_news_path;
    }
}

/**
 * Devuelve los ajustes por defecto.
 */
function humania_ai_news_default_options(): array
{
    return [
        'source_urls' => '',
        'max_items' => 5,
        'draft_status' => 'draft',
        'notification_email' => get_option('admin_email'),
        'logs_enabled' => 1,
    ];
}

/**
 * Devuelve los ajustes actuales mezclados con los valores por defecto.
 */
function humania_ai_news_get_options(): array
{
    $options = get_option('humania_ai_news_options', []);

    if (!is_array($options)) {
        $options = [];
    }

    return wp_parse_args($options, humania_ai_news_default_options());
}

/**
 * Sanea la lista de URLs introducidas.
 */
function humania_ai_news_sanitize_source_urls(string $raw_urls): string
{
    $lines = preg_split('/\r\n|\r|\n/', $raw_urls);
    $clean_urls = [];

    foreach ($lines as $line) {
        $url = trim($line);

        if ($url === '') {
            continue;
        }

        $clean_url = esc_url_raw($url);

        if ($clean_url !== '') {
            $clean_urls[] = $clean_url;
        }
    }

    $clean_urls = array_unique($clean_urls);

    return implode("\n", $clean_urls);
}

/**
 * Sanea los ajustes del plugin.
 */
function humania_ai_news_sanitize_options(array $input): array
{
    $defaults = humania_ai_news_default_options();

    $source_urls = isset($input['source_urls']) ? (string) $input['source_urls'] : '';
    $max_items = isset($input['max_items']) ? absint($input['max_items']) : $defaults['max_items'];
    $draft_status = isset($input['draft_status']) ? sanitize_key($input['draft_status']) : $defaults['draft_status'];
    $notification_email = isset($input['notification_email']) ? sanitize_email($input['notification_email']) : $defaults['notification_email'];

    if ($max_items < 1) {
        $max_items = 1;
    }

    if ($max_items > 20) {
        $max_items = 20;
    }

    $allowed_statuses = ['draft', 'pending'];

    if (!in_array($draft_status, $allowed_statuses, true)) {
        $draft_status = 'draft';
    }

    if ($notification_email === '') {
        $notification_email = $defaults['notification_email'];
    }

    return [
        'source_urls' => humania_ai_news_sanitize_source_urls($source_urls),
        'max_items' => $max_items,
        'draft_status' => $draft_status,
        'notification_email' => $notification_email,
        'logs_enabled' => !empty($input['logs_enabled']) ? 1 : 0,
    ];
}

/**
 * Registra los ajustes del plugin.
 */
function humania_ai_news_register_settings(): void
{
    register_setting(
        'humania_ai_news_settings',
        'humania_ai_news_options',
        [
            'type' => 'array',
            'sanitize_callback' => 'humania_ai_news_sanitize_options',
            'default' => humania_ai_news_default_options(),
        ]
    );
}
add_action('admin_init', 'humania_ai_news_register_settings');

/**
 * Registra el menú de administración del plugin.
 */
function humania_ai_news_register_admin_menu(): void
{
    add_menu_page(
        'HUMANía AI News',
        'HUMANía IA',
        'manage_options',
        'humania-ai-news',
        'humania_ai_news_render_settings_page',
        'dashicons-rss',
        30
    );

    add_submenu_page(
        'humania-ai-news',
        'Ajustes',
        'Ajustes',
        'manage_options',
        'humania-ai-news',
        'humania_ai_news_render_settings_page'
    );

    add_submenu_page(
        'humania-ai-news',
        'Revisión',
        'Revisión',
        'manage_options',
        'humania-ai-news-review',
        'humania_ai_news_render_review_page'
    );
}
add_action('admin_menu', 'humania_ai_news_register_admin_menu');

/**
 * Carga estilos y scripts solo en las páginas del plugin.
 */
function humania_ai_news_enqueue_admin_assets(string $hook): void
{
    if (strpos($hook, 'humania-ai-news') === false) {
        return;
    }

    wp_enqueue_style(
        'humania-ai-news-admin',
        HUMANIA_AI_NEWS_URL . 'assets/css/admin.css',
        [],
        HUMANIA_AI_NEWS_VERSION
    );

    wp_enqueue_script(
        'humania-ai-news-admin',
        HUMANIA_AI_NEWS_URL . 'assets/js/admin.js',
        [],
        HUMANIA_AI_NEWS_VERSION,
        true
    );
}
add_action('admin_enqueue_scripts', 'humania_ai_news_enqueue_admin_assets');

/**
 * Carga estilos del reproductor solo cuando una entrada o página usa el shortcode.
 */
function humania_ai_news_enqueue_player_assets(): void
{
    if (!is_singular()) {
        return;
    }

    global $post;

    if (!$post instanceof WP_Post) {
        return;
    }

    if (!has_shortcode($post->post_content, 'humania_player')) {
        return;
    }

    wp_enqueue_style(
        'humania-ai-news-player',
        HUMANIA_AI_NEWS_URL . 'assets/css/player.css',
        [],
        HUMANIA_AI_NEWS_VERSION
    );
}
add_action('wp_enqueue_scripts', 'humania_ai_news_enqueue_player_assets');

/**
 * Schedules the RSS import cron when the plugin is activated.
 */
function humania_ai_news_activate_plugin(): void
{
    if (function_exists('humania_ai_news_schedule_cron')) {
        humania_ai_news_schedule_cron();
    }
}
register_activation_hook(__FILE__, 'humania_ai_news_activate_plugin');

/**
 * Clears the RSS import cron when the plugin is deactivated.
 */
function humania_ai_news_deactivate_plugin(): void
{
    if (function_exists('humania_ai_news_clear_cron')) {
        humania_ai_news_clear_cron();
    }
}
register_deactivation_hook(__FILE__, 'humania_ai_news_deactivate_plugin');

