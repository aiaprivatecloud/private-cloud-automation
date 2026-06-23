<?php
/**
 * Shortcode del reproductor propio de HUMANía.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Renderiza el reproductor de podcast HUMANía.
 *
 * Uso:
 * [humania_player audio="https://..." title="Título" ivoox="https://..." spotify="https://..." apple="https://..." youtube="https://..." rss="https://..."]
 */
function humania_player_shortcode(array $atts): string
{
    $atts = shortcode_atts(
        [
            'title' => '',
            'audio' => '',
            'ivoox' => '',
            'spotify' => '',
            'apple' => '',
            'youtube' => '',
            'rss' => '',
        ],
        $atts,
        'humania_player'
    );

    $title = sanitize_text_field((string) $atts['title']);
    $audio_url = esc_url((string) $atts['audio']);

    if ($audio_url === '') {
        if (current_user_can('edit_posts')) {
            return '<p class="humania-player-error">' . esc_html__('Falta la URL de audio en el shortcode HUMANía.', 'humania') . '</p>';
        }

        return '';
    }

    $platforms = [
        'ivoox' => [
            'label' => 'iVoox',
            'url' => esc_url((string) $atts['ivoox']),
        ],
        'spotify' => [
            'label' => 'Spotify',
            'url' => esc_url((string) $atts['spotify']),
        ],
        'apple' => [
            'label' => 'Apple Podcasts',
            'url' => esc_url((string) $atts['apple']),
        ],
        'youtube' => [
            'label' => 'YouTube',
            'url' => esc_url((string) $atts['youtube']),
        ],
        'rss' => [
            'label' => 'RSS',
            'url' => esc_url((string) $atts['rss']),
        ],
    ];

    ob_start();
    ?>
    <section class="humania-player" aria-label="<?php echo esc_attr__('Reproductor de episodio HUMANía', 'humania'); ?>">
        <div class="humania-player__header">
            <span class="humania-player__kicker"><?php echo esc_html__('HUMANía Podcast', 'humania'); ?></span>

            <?php if ($title !== '') : ?>
                <h2 class="humania-player__title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
        </div>

        <audio class="humania-player__audio" controls preload="metadata" src="<?php echo esc_url($audio_url); ?>">
            <?php echo esc_html__('Tu navegador no puede reproducir este audio.', 'humania'); ?>
            <a href="<?php echo esc_url($audio_url); ?>">
                <?php echo esc_html__('Abrir audio', 'humania'); ?>
            </a>
        </audio>

        <div class="humania-player__links" aria-label="<?php echo esc_attr__('Escuchar en otras plataformas', 'humania'); ?>">
            <?php foreach ($platforms as $platform) : ?>
                <?php if ($platform['url'] !== '') : ?>
                    <a class="humania-player__link" href="<?php echo esc_url($platform['url']); ?>" target="_blank" rel="noopener noreferrer">
                        <?php echo esc_html($platform['label']); ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>
    <?php

    return (string) ob_get_clean();
}
add_shortcode('humania_player', 'humania_player_shortcode');
