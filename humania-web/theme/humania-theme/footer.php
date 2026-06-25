<?php
/**
 * Footer principal del tema HUMANía.
 *
 * @package humania-theme
 */

$humania_footer_links = array(
    array(
        'label' => 'Política de privacidad',
        'slug'  => 'politica-de-privacidad',
    ),
    array(
        'label' => 'Política de cookies',
        'slug'  => 'politica-de-cookies',
    ),
    array(
        'label' => 'Términos y condiciones',
        'slug'  => 'terminos-y-condiciones',
    ),
    array(
        'label' => 'Contacto',
        'slug'  => 'contacto',
    ),
);
?>

<footer class="site-footer" role="contentinfo">
    <div class="site-footer__inner">
        <div class="site-footer__brand">
            <p class="site-footer__name">HUMANía</p>
            <p class="site-footer__tagline">La IA en castellano.</p>
        </div>

        <nav class="site-footer__nav" aria-label="<?php esc_attr_e( 'Enlaces legales', 'humania-theme' ); ?>">
            <ul class="site-footer__links">
                <?php foreach ( $humania_footer_links as $humania_footer_link ) : ?>
                    <?php
                    $humania_page = get_page_by_path( $humania_footer_link['slug'] );
                    $humania_url  = $humania_page ? get_permalink( $humania_page ) : home_url( '/' . $humania_footer_link['slug'] . '/' );
                    ?>
                    <li>
                        <a href="<?php echo esc_url( $humania_url ); ?>">
                            <?php echo esc_html( $humania_footer_link['label'] ); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <p class="site-footer__copy">
            &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> HUMANía.
            <?php esc_html_e( 'Proyecto editorial sobre inteligencia artificial.', 'humania-theme' ); ?>
        </p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
