<?php
/**
 * Normalizacion futura de noticias.
 *
 * @package HUMANía_AI_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Normaliza una noticia capturada.
 *
 * @param array $item Noticia original.
 * @return array
 */
function humania_ai_news_normalize_item( $item ) {
	if ( ! is_array( $item ) ) {
		return array();
	}

	return $item;
}
