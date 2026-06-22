<?php
/**
 * Cabecera del tema HUMANía.
 *
 * @package HUMANía
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main-content">
	<?php esc_html_e( 'Saltar al contenido', 'humania' ); ?>
</a>

<header class="site-header">
	<div class="site-header__inner">
		<a class="site-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span class="site-brand__name">
				<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			</span>
			<span class="site-brand__tagline">
				<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
			</span>
		</a>

		<nav class="site-nav" aria-label="<?php esc_attr_e( 'Menu principal', 'humania' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'site-nav__menu',
					'fallback_cb'    => false,
					'depth'          => 2,
				)
			);
			?>
		</nav>
	</div>
</header>
