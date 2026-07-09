<?php
/**
 * Template Name: Revista HUMANía
 * Public Revista HUMANía page template.
 *
 * This template can be manually assigned to the WordPress page:
 * Revista HUMANía.
 *
 * @package humania-theme
 */

get_header();

$humania_news_query = new WP_Query(
    array(
        'post_type'      => 'humania_news',
        'post_status'    => 'publish',
        'posts_per_page' => 24,
        'meta_query'     => array(
            array(
                'key'     => 'humania_news_editorial_status',
                'value'   => 'approved',
                'compare' => '=',
            ),
        ),
        'orderby'        => 'date',
        'order'          => 'DESC',
    )
);

if (!function_exists('humania_theme_news_relative_time')) {
    /**
     * Returns a readable relative time for HUMANía news.
     *
     * @param string $date Raw date string.
     * @return string
     */
    function humania_theme_news_relative_time(string $date): string
    {
        if ($date === '') {
            return '';
        }

        $timestamp = strtotime($date);

        if (!$timestamp) {
            return esc_html($date);
        }

        $now = current_time('timestamp');
        $diff = abs($now - $timestamp);

        if ($diff < WEEK_IN_SECONDS) {
            return sprintf(
                'hace %s',
                human_time_diff($timestamp, $now)
            );
        }

        return date_i18n(get_option('date_format'), $timestamp);
    }
}
?>

<main id="main-content" class="site-main humania-revista">
    <section class="humania-revista__hero" aria-labelledby="humania-revista-title">
        <p class="humania-revista__eyebrow">Noticias</p>

        <h1 id="humania-revista-title" class="humania-revista__title">
            Actualidad de IA revisada antes de publicarse
        </h1>

        <p class="humania-revista__intro">
            Noticias de inteligencia artificial seleccionadas con criterio editorial. La automatización propone candidatas; HUMANía revisa, edita y publica manualmente.
        </p>

        <p class="humania-revista__note">
            Cada noticia enlaza al medio original. Aquí no se publican borradores, descartes ni piezas pendientes de revisión.
        </p>
    </section>

    <section class="humania-revista__content" aria-label="<?php esc_attr_e('Noticias aprobadas', 'humania-theme'); ?>">
        <?php if ($humania_news_query->have_posts()) : ?>
            <div class="humania-revista__grid">
                <?php while ($humania_news_query->have_posts()) : ?>
                    <?php
                    $humania_news_query->the_post();

                    $source_name = trim((string) get_post_meta(get_the_ID(), 'humania_news_source_name', true));
                    $original_url = trim((string) get_post_meta(get_the_ID(), 'humania_news_original_url', true));
                    $language = trim((string) get_post_meta(get_the_ID(), 'humania_news_original_language', true));
                    $original_date = trim((string) get_post_meta(get_the_ID(), 'humania_news_original_date', true));
                    $short_summary = trim((string) get_post_meta(get_the_ID(), 'humania_news_short_summary', true));
                    $extended_summary = trim((string) get_post_meta(get_the_ID(), 'humania_news_extended_summary', true));
                    $remote_image_url = trim((string) get_post_meta(get_the_ID(), 'humania_news_remote_image_url', true));
                    $image_approved = (bool) get_post_meta(get_the_ID(), 'humania_news_image_approved', true);

                    $summary = $language === 'es' ? $short_summary : $extended_summary;

                    if ($summary === '') {
                        $summary = get_the_excerpt();
                    }

                    $time_label = humania_theme_news_relative_time($original_date);

                    if ($time_label === '') {
                        $time_label = humania_theme_news_relative_time(get_the_date('c'));
                    }
                    ?>

                    <article class="humania-news-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="humania-news-card__media">
                                <?php the_post_thumbnail('medium_large', array('class' => 'humania-news-card__image')); ?>
                            </div>
                        <?php elseif ($image_approved && $remote_image_url !== '') : ?>
                            <div class="humania-news-card__media">
                                <img class="humania-news-card__image" src="<?php echo esc_url($remote_image_url); ?>" alt="">
                            </div>
                        <?php endif; ?>

                        <div class="humania-news-card__body">
                            <div class="humania-news-card__meta">
                                <?php if ($source_name !== '') : ?>
                                    <span><?php echo esc_html($source_name); ?></span>
                                <?php endif; ?>

                                <?php if ($time_label !== '') : ?>
                                    <span aria-hidden="true">·</span>
                                    <time><?php echo esc_html($time_label); ?></time>
                                <?php endif; ?>
                            </div>

                            <h2 class="humania-news-card__title">
                                <?php the_title(); ?>
                            </h2>

                            <?php if ($summary !== '') : ?>
                                <p class="humania-news-card__summary">
                                    <?php echo esc_html($summary); ?>
                                </p>
                            <?php endif; ?>

                            <?php if ($language !== '' && $language !== 'es') : ?>
                                <p class="humania-news-card__language">
                                    Medio original en otro idioma. Resumen editorial en castellano.
                                </p>
                            <?php endif; ?>

                            <?php if ($original_url !== '') : ?>
                                <a class="humania-news-card__button" href="<?php echo esc_url($original_url); ?>" target="_blank" rel="noopener noreferrer">
                                    Leer en el medio original
                                </a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <div class="humania-revista__empty">
                <h2>No hay noticias publicadas todavía.</h2>
                <p>Las noticias aparecerán aquí solo cuando hayan sido revisadas y aprobadas manualmente.</p>
            </div>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </section>
</main>

<?php
get_footer();
