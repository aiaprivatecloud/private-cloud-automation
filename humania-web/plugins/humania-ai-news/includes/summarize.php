<?php
/**
 * Resumen futuro de noticias.
 *
 * @package HUMANía_AI_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Genera un resumen placeholder.
 *
 * @param array $item Noticia normalizada.
 * @return string
 */
function humania_ai_news_summarize_item( $item ) {
	if ( ! is_array( $item ) ) {
		return '';
	}

	return '';
}
