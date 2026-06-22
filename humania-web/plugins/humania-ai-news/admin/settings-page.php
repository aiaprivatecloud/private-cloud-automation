<?php
/**
 * Pagina de ajustes del plugin.
 *
 * @package HUMANía_AI_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Renderiza la pagina de ajustes.
 */
function humania_ai_news_render_settings_page() {
	if ( ! humania_ai_news_user_can_manage() ) {
		wp_die( esc_html__( 'No tienes permisos para acceder a esta pagina.', 'humania-ai-news' ) );
	}
	?>
	<div class="wrap humania-ai-news-admin">
		<h1><?php esc_html_e( 'HUMANía AI News', 'humania-ai-news' ); ?></h1>

		<p>
			<?php esc_html_e( 'Plugin propio para automatizacion controlada de noticias de inteligencia artificial.', 'humania-ai-news' ); ?>
		</p>

		<div class="humania-ai-news-card">
			<h2><?php esc_html_e( 'Estado inicial', 'humania-ai-news' ); ?></h2>
			<p><?php esc_html_e( 'El plugin esta instalado como esqueleto inicial. Todavia no captura, resume ni publica noticias.', 'humania-ai-news' ); ?></p>
			<p><?php esc_html_e( 'La primera fase solo prepara la estructura segura del plugin.', 'humania-ai-news' ); ?></p>
		</div>
	</div>
	<?php
}
