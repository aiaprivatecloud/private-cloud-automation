<?php
/**
 * Podcast page template for HUMANía.
 *
 * This template is automatically used by a WordPress page with the slug:
 * escuchar-humania
 *
 * @package humania-theme
 */

get_header();

$humania_listen_links = array(
    array(
        'label'       => 'Spotify',
        'description' => 'Escucha HUMANía en Spotify.',
        'url'         => 'https://open.spotify.com/show/0elh8IgWie9lriejqebOS3?si=b066c51c921d45b0',
        'type'        => 'primary',
    ),
    array(
        'label'       => 'Apple Podcasts',
        'description' => 'Sigue HUMANía en Apple Podcasts.',
        'url'         => 'https://podcasts.apple.com/us/podcast/ai-ia-hoy/id1764509825',
        'type'        => 'secondary',
    ),
    array(
        'label'       => 'iVoox',
        'description' => 'Escucha HUMANía en iVoox.',
        'url'         => 'https://go.ivoox.com/sq/2381992',
        'type'        => 'secondary',
    ),
    array(
        'label'       => 'YouTube',
        'description' => 'Contenido y publicaciones de Aiberto Floppy en YouTube.',
        'url'         => 'https://www.youtube.com/@AibertoFloppy',
        'type'        => 'secondary',
    ),
    array(
        'label'       => 'RSS del podcast',
        'description' => 'Feed oficial para lectores y aplicaciones de podcast compatibles.',
        'url'         => 'https://anchor.fm/s/f06d1154/podcast/rss',
        'type'        => 'secondary',
    ),
);
?>

<main id="main-content" class="site-main humania-listen">
    <section class="humania-listen__hero" aria-labelledby="humania-listen-title">
        <p class="humania-listen__eyebrow">HUMANía</p>

        <h1 id="humania-listen-title" class="humania-listen__title">
            Podcast
        </h1>

        <p class="humania-listen__intro">
            Escucha HUMANía en las principales plataformas. Inteligencia artificial en castellano, con rigor, contexto y la ironía necesaria para mirar al presente sin pedirle una baja laboral al futuro.
        </p>
    </section>

    <section class="humania-listen__grid" aria-label="<?php esc_attr_e( 'Plataformas de escucha', 'humania-theme' ); ?>">
        <?php foreach ( $humania_listen_links as $humania_link ) : ?>
            <article class="humania-listen-card">
                <h2 class="humania-listen-card__title">
                    <?php echo esc_html( $humania_link['label'] ); ?>
                </h2>

                <p class="humania-listen-card__text">
                    <?php echo esc_html( $humania_link['description'] ); ?>
                </p>

                <a class="humania-listen-card__button humania-listen-card__button--<?php echo esc_attr( $humania_link['type'] ); ?>" href="<?php echo esc_url( $humania_link['url'] ); ?>" rel="noopener noreferrer">
                    Abrir <?php echo esc_html( $humania_link['label'] ); ?>
                </a>
            </article>
        <?php endforeach; ?>
    </section>
</main>

<?php
get_footer();
