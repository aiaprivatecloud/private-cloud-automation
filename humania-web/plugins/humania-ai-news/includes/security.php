<?php
/**
 * Funciones de seguridad del plugin HUMANía AI News.
 *
 * @package HUMANía_AI_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Comprueba si el usuario puede gestionar el plugin.
 *
 * @return bool
 */
function humania_ai_news_user_can_manage() {
	return current_user_can( 'manage_options' );
}

/**
 * Verifica un nonce de administracion.
 *
 * @param string $nonce_name Nombre del nonce.
 * @param string $action Accion esperada.
 * @return bool
 */
function humania_ai_news_verify_admin_nonce( $nonce_name, $action ) {
	if ( ! isset( $_POST[ $nonce_name ] ) ) {
		return false;
	}

	$nonce = sanitize_text_field( wp_unslash( $_POST[ $nonce_name ] ) );

	return (bool) wp_verify_nonce( $nonce, $action );
}
