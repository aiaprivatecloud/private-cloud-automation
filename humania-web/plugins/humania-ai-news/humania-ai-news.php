<?php
/**
 * Plugin Name: HUMANía AI News
 * Plugin URI: https://aiaprendi.com/
 * Description: Plugin propio para automatizacion controlada de noticias de inteligencia artificial en HUMANía Web.
 * Version: 0.1.0
 * Author: HUMANía
 * Text Domain: humania-ai-news
 *
 * @package HUMANía_AI_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HUMANIA_AI_NEWS_VERSION', '0.1.0' );
define( 'HUMANIA_AI_NEWS_FILE', __FILE__ );
define( 'HUMANIA_AI_NEWS_PATH', plugin_dir_path( __FILE__ ) );
define( 'HUMANIA_AI_NEWS_URL', plugin_dir_url( __FILE__ ) );

require_once HUMANIA_AI_NEWS_PATH . 'includes/security.php';
require_once HUMANIA_AI_NEWS_PATH . 'includes/logger.php';
require_once HUMANIA_AI_NEWS_PATH . 'includes/fetch-sources.php';
require_once HUMANIA_AI_NEWS_PATH . 'includes/normalize-item.php';
require_once HUMANIA_AI_NEWS_PATH . 'includes/deduplicate.php';
require_once HUMANIA_AI_NEWS_PATH . 'includes/classify.php';
require_once HUMANIA_AI_NEWS_PATH . 'includes/summarize.php';
require_once HUMANIA_AI_NEWS_PATH . 'includes/create-draft.php';
require_once HUMANIA_AI_NEWS_PATH . 'admin/settings-page.php';
require_once HUMANIA_AI_NEWS_PATH . 'admin/review-page.php';

/**
 * Acciones al activar el plugin.
 */
function humania_ai_news_activate() {
	update_option( 'humania_ai_news_version', HUMANIA_AI_NEWS_VERSION );
}
register_activation_hook( __FILE__, 'humania_ai_news_activate' );

/**
 * Acciones al desactivar el plugin.
 */
function humania_ai_news_deactivate() {
	// Reservado para futuras tareas de limpieza controlada.
}
register_deactivation_hook( __FILE__, 'humania_ai_news_deactivate' );

/**
 * Registra el menu de administracion.
 */
function humania_ai_news_register_admin_menu() {
	add_menu_page(
		__( 'HUMANía AI News', 'humania-ai-news' ),
		__( 'HUMANía IA', 'humania-ai-news' ),
		'manage_options',
		'humania-ai-news',
		'humania_ai_news_render_settings_page',
		'dashicons-rss',
		58
	);

	add_submenu_page(
		'humania-ai-news',
		__( 'Revision de noticias', 'humania-ai-news' ),
		__( 'Revision', 'humania-ai-news' ),
		'manage_options',
		'humania-ai-news-review',
		'humania_ai_news_render_review_page'
	);
}
add_action( 'admin_menu', 'humania_ai_news_register_admin_menu' );

/**
 * Carga assets solo en paginas del plugin.
 *
 * @param string $hook Hook de la pagina actual.
 */
function humania_ai_news_enqueue_admin_assets( $hook ) {
	if ( false === strpos( $hook, 'humania-ai-news' ) ) {
		return;
	}

	wp_enqueue_style(
		'humania-ai-news-admin',
		HUMANIA_AI_NEWS_URL . 'assets/css/admin.css',
		array(),
		HUMANIA_AI_NEWS_VERSION
	);

	wp_enqueue_script(
		'humania-ai-news-admin',
		HUMANIA_AI_NEWS_URL . 'assets/js/admin.js',
		array(),
		HUMANIA_AI_NEWS_VERSION,
		true
	);
}
add_action( 'admin_enqueue_scripts', 'humania_ai_news_enqueue_admin_assets' );
