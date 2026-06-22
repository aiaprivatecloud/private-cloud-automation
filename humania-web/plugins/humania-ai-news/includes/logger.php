<?php
/**
 * Logger basico del plugin HUMANía AI News.
 *
 * @package HUMANía_AI_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registra mensajes de depuracion si WP_DEBUG esta activo.
 *
 * @param string $message Mensaje.
 */
function humania_ai_news_log( $message ) {
	if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
		error_log( '[HUMANía AI News] ' . sanitize_text_field( $message ) );
	}
}
