<?php
/**
 * Listen page template for HUMANía.
 *
 * This template is automatically used by a WordPress page with the slug:
 * escuchar-humania
 *
 * @package humania-theme
 */

get_header();

$humania_listen_links = array(
    array(
        'label'       => 'RSS del podcast',
        'description' => 'Feed general de HUMANía para lectores y aplicaciones de podcast compatibles.',
        'url'         => 'https://anchor.fm/s/f06d1154/podcast/rss',
        'type'        => 'primary',
    ),
    array(
        'label'       => 'Spotify',
        'description' => 'Enlace general pendiente de configurar.',
        'url'         => '',
        'type'        => 'secondary',
    ),
    array(
        'label'       => 'Apple Podcasts',
        'description' => 'Enlace general pendiente de configurar.',
        'url'         => '',
        'type'        => 'secondary',
    ),
    array(
        'label'       => 'iVoox',
        'description' => 'Enlace general pendiente de configurar.',
        'url'         => '',
        'type'        => 'secondary',
    ),
    array(
        'label'       => 'YouTube',
        'description' => 'Enlace general pendiente de configurar.',
        'url'         => '',
        'type'        => 'secondary',
    ),
);
?>

<main id="main-content" class="site-main humania-listen">
    <section class="humania-listen__hero" aria-labelledby="humania-listen-title">
        <p class="humania-listen__eyebrow">HUMANía</p>

        <h1 id="humania-listen-title" class="humania-listen__title">
            Dónde escuchar HUMANía
        </h1>

        <p class="humania-listen__intro">
            Accesos oficiales para escuchar y seguir el podcast HUMANía. El RSS vive aquí, en su sitio natural, no escondido dentro de cada episodio como si fuera contrabando editorial.
        </p>
    </section>

    <section class="humania-listen__grid" aria-label="<?php esc_attr_e( 'Plataformas de escucha', 'humania-theme' ); ?>">
        <?php foreach ( $humania_listen_links as $humania_link ) : ?>
            <article class="humania-listen-card <?php echo empty( $humania_link['url'] ) ? 'humania-listen-card--pending' : ''; ?>">
                <h2 class="humania-listen-card__title">
                    <?php echo esc_html( $humania_link['label'] ); ?>
                </h2>

                <p class="humania-listen-card__text">
                    <?php echo esc_html( $humania_link['description'] ); ?>
                </p>

                <?php if ( ! empty( $humania_link['url'] ) ) : ?>
                    <a class="humania-listen-card__button humania-listen-card__button--<?php echo esc_attr( $humania_link['type'] ); ?>" href="<?php echo esc_url( $humania_link['url'] ); ?>" rel="noopener noreferrer">
                        Abrir <?php echo esc_html( $humania_link['label'] ); ?>
                    </a>
                <?php else : ?>
                    <p class="humania-listen-card__pending">
                        Pendiente de enlace oficial.
                    </p>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    </section>
</main>

<?php
get_footer();
