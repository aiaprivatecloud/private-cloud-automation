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
                <a class="humania-front__button humania-front__button--primary" href="#ultimos-episodios">
                    Escuchar episodios
                </a>
                <a class="humania-front__button humania-front__button--secondary" href="<?php echo esc_url( home_url( '/feed/' ) ); ?>">
                    RSS del sitio
                </a>
            </div>
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
</main>

<?php
get_footer();
