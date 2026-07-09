<?php
/**
 * Portada principal HUMANía.
 *
 * @package humania-theme
 */

get_header();
?>

<main id="main-content" class="site-main humania-front">
    <section class="humania-front__hero" aria-labelledby="humania-front-title">
        <div class="humania-front__hero-inner">
            <p class="humania-front__eyebrow">HUMANía</p>

            <h1 id="humania-front-title" class="humania-front__title">
                La IA en castellano.
            </h1>

            <p class="humania-front__intro">
                Podcast, análisis y noticias sobre inteligencia artificial con mirada humana,
                rigor informativo y la ironía justa para sobrevivir al presente.
            </p>

            <div class="humania-front__actions" aria-label="Acciones principales">
                <a class="humania-front__button humania-front__button--primary" href="<?php echo esc_url( home_url( '/escuchar-humania/' ) ); ?>">
                    Escuchar el podcast
                </a>
                <a class="humania-front__button humania-front__button--secondary" href="<?php echo esc_url( home_url( '/revista-humania/' ) ); ?>">
                    Leer la revista
                </a>
            </div>
    </section>

    <section id="ultimos-episodios" class="humania-front__section" aria-labelledby="humania-latest-title">
        <div class="humania-front__section-header">
            <p class="humania-front__section-kicker">Últimos contenidos</p>
            <h2 id="humania-latest-title" class="humania-front__section-title">
                Episodios recientes
            </h2>
        </div>

        <?php
        $latest_posts = new WP_Query(
            array(
                'posts_per_page'      => 6,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true,
                'meta_query'          => array(
                    array(
                        'key'     => 'humania_audio_url',
                        'value'   => '',
                        'compare' => '!=',
                    ),
                ),
            )
        );
        ?>

        <?php if ( $latest_posts->have_posts() ) : ?>
            <div class="humania-front__grid">
                <?php while ( $latest_posts->have_posts() ) : ?>
                    <?php $latest_posts->the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'humania-front-card' ); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a class="humania-front-card__image-link" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
                                <?php the_post_thumbnail( 'medium_large', array( 'class' => 'humania-front-card__image' ) ); ?>
                            </a>
                        <?php endif; ?>

                        <div class="humania-front-card__body">
                            <p class="humania-front-card__meta">
                                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                    <?php echo esc_html( get_the_date() ); ?>
                                </time>
                            </p>

                            <h3 class="humania-front-card__title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <div class="humania-front-card__excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </article>

                <?php endwhile; ?>
            </div>

            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="humania-front__empty">
                Todavía no hay episodios publicados.
            </p>
        <?php endif; ?>
    </section>

    <section id="ultimas-noticias" class="humania-front__section" aria-labelledby="humania-news-title">
        <div class="humania-front__section-header">
            <p class="humania-front__section-kicker">Noticias</p>
            <h2 id="humania-news-title" class="humania-front__section-title">
                Últimas noticias
            </h2>
        </div>

        <?php
        $latest_news = new WP_Query(
            array(
                'post_type'           => 'humania_news',
                'posts_per_page'      => 3,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true,
                'meta_query'          => array(
                    array(
                        'key'     => 'humania_news_editorial_status',
                        'value'   => 'approved',
                        'compare' => '=',
                    ),
                ),
            )
        );
        ?>

        <?php if ( $latest_news->have_posts() ) : ?>
            <div class="humania-front__grid">
                <?php while ( $latest_news->have_posts() ) : ?>
                    <?php
                    $latest_news->the_post();

                    $source_name = get_post_meta( get_the_ID(), 'humania_news_source_name', true );
                    $original_date = get_post_meta( get_the_ID(), 'humania_news_original_date', true );
                    $original_url = get_post_meta( get_the_ID(), 'humania_news_original_url', true );
                    ?>

                    <article id="news-<?php the_ID(); ?>" <?php post_class( 'humania-front-card humania-front-card--news' ); ?>>
                        <div class="humania-front-card__body">
                            <p class="humania-front-card__meta">
                                <?php if ( ! empty( $source_name ) ) : ?>
                                    <span><?php echo esc_html( (string) $source_name ); ?></span>
                                <?php endif; ?>

                                <?php if ( ! empty( $original_date ) ) : ?>
                                    <span><?php echo esc_html( (string) $original_date ); ?></span>
                                <?php endif; ?>
                            </p>

                            <h3 class="humania-front-card__title">
                                <?php echo esc_html( get_the_title() ); ?>
                            </h3>

                            <div class="humania-front-card__excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <?php if ( ! empty( $original_url ) ) : ?>
                                <a class="humania-front-card__link" href="<?php echo esc_url( (string) $original_url ); ?>" target="_blank" rel="noopener noreferrer">
                                    Leer en el medio original
                                </a>
                            <?php endif; ?>
                        </div>
                    </article>

                <?php endwhile; ?>
            </div>

            <?php wp_reset_postdata(); ?>

            <p class="humania-front__more">
                <a class="humania-front__button humania-front__button--secondary" href="<?php echo esc_url( home_url( '/revista-humania/' ) ); ?>">
                    Ver todas las noticias
                </a>
            </p>
        <?php else : ?>
            <p class="humania-front__empty">
                Todavía no hay noticias aprobadas.
            </p>
        <?php endif; ?>
    </section>
</main>

<?php
get_footer();
