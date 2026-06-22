<?php
/**
 * Pagina futura de revision de noticias.
 *
 * @package HUMANia_AI_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Renderiza la pagina de revision.
 */
function humania_ai_news_render_review_page() {
	if ( ! humania_ai_news_user_can_manage() ) {
		wp_die( esc_html__( 'No tienes permisos para acceder a esta pagina.', 'humania-ai-news' ) );
	}
	?>
	<div class="wrap humania-ai-news-admin">
		<h1><?php esc_html_e( 'Revision de noticias', 'humania-ai-news' ); ?></h1>

		<div class="humania-ai-news-card">
			<p><?php esc_html_e( 'Esta pantalla se usara para revisar borradores generados por la automatizacion.', 'humania-ai-news' ); ?></p>
			<p><?php esc_html_e( 'En esta fase no hay captura automatica ni publicacion directa.', 'humania-ai-news' ); ?></p>
		</div>
	</div>
	<?php
}
