<?php
/**
 * Deduplicacion futura de noticias.
 *
 * @package HUMANía_AI_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Comprueba si una noticia es duplicada.
 *
 * @param array $item Noticia normalizada.
 * @return bool
 */
function humania_ai_news_is_duplicate( $item ) {
	if ( ! is_array( $item ) ) {
		return true;
	}

	return false;
}
