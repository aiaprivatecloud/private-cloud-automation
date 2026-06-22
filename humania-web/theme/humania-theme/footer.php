<?php
/**
 * Pie de pagina del tema HUMANía.
 *
 * @package HUMANía
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<footer class="site-footer">
	<div class="site-footer__inner">
		<p class="site-footer__brand">
			<?php echo esc_html( get_bloginfo( 'name' ) ); ?> — <?php esc_html_e( 'La IA en castellano', 'humania' ); ?>
		</p>

		<nav class="site-footer__nav" aria-label="<?php esc_attr_e( 'Menu footer', 'humania' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'container'      => false,
					'menu_class'     => 'site-footer__menu',
					'fallback_cb'    => false,
					'depth'          => 1,
				)
			);
			?>
		</nav>

		<p class="site-footer__copy">
			&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
		</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
