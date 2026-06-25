<?php
/**
 * Header principal del tema HUMANía.
 *
 * @package humania-theme
 */
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
    <?php esc_html_e( 'Saltar al contenido', 'humania-theme' ); ?>
</a>

<header class="site-header" role="banner">
    <div class="site-header__inner">
        <a class="site-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="HUMANía, inicio">
            <span class="site-brand__name">HUMANía</span>
            <span class="site-brand__tagline">La IA en castellano.</span>
        </a>

        <nav class="site-nav" aria-label="<?php esc_attr_e( 'Menú principal', 'humania-theme' ); ?>">
            <?php
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'site-nav__list',
                        'container'      => false,
                        'depth'          => 1,
                    )
                );
            } else {
                ?>
                <ul class="site-nav__list">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#ultimos-episodios' ) ); ?>">Episodios</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/sobre-humania/' ) ); ?>">Sobre HUMANía</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>">Contacto</a></li>
                </ul>
                <?php
            }
            ?>
        </nav>
    </div>
</header>
