<?php
/**
 * Clasificacion futura de noticias.
 *
 * @package HUMANía_AI_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Clasifica una noticia.
 *
 * @param array $item Noticia normalizada.
 * @return string
 */
function humania_ai_news_classify_item( $item ) {
	if ( ! is_array( $item ) ) {
		return 'sin-clasificar';
	}

	return 'sin-clasificar';
}
