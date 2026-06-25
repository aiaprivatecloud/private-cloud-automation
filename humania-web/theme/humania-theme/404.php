<?php
/**
 * 404 template for HUMANía.
 *
 * @package humania-theme
 */

get_header();
?>

<main id="main-content" class="site-main humania-error">
    <section class="humania-error__box" aria-labelledby="humania-error-title">
        <p class="humania-error__eyebrow">Error 404</p>

        <h1 id="humania-error-title" class="humania-error__title">
            Esta página no existe.
        </h1>

        <p class="humania-error__text">
            Puede que el enlace haya cambiado, que el contenido se haya movido o que algún algoritmo haya decidido reorganizar la realidad sin pedir permiso.
        </p>

        <a class="humania-error__button" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            Volver al inicio
        </a>
    </section>
</main>

<?php
get_footer();
