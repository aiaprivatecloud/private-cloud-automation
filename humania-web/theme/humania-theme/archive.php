<?php
/**
 * Archive template for HUMANía.
 *
 * @package humania-theme
 */

get_header();
?>

<main id="main-content" class="site-main humania-listing">
    <header class="humania-listing__header">
        <p class="humania-listing__eyebrow">HUMANía</p>
        <h1 class="humania-listing__title">
            <?php the_archive_title(); ?>
        </h1>
        <?php if ( get_the_archive_description() ) : ?>
            <div class="humania-listing__description">
                <?php the_archive_description(); ?>
            </div>
        <?php endif; ?>
    </header>

    <?php if ( have_posts() ) : ?>
        <div class="humania-listing__grid">
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'humania-listing-card' ); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a class="humania-listing-card__image-link" href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'medium_large', array( 'class' => 'humania-listing-card__image' ) ); ?>
                        </a>
                    <?php endif; ?>

                    <div class="humania-listing-card__body">
                        <p class="humania-listing-card__meta">
                            <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                <?php echo esc_html( get_the_date() ); ?>
                            </time>
                        </p>

                        <h2 class="humania-listing-card__title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <div class="humania-listing-card__excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <nav class="humania-pagination" aria-label="Paginación">
            <?php
            the_posts_pagination(
                array(
                    'mid_size'           => 1,
                    'prev_text'          => 'Anterior',
                    'next_text'          => 'Siguiente',
                    'screen_reader_text' => 'Navegación de publicaciones',
                )
            );
            ?>
        </nav>
    <?php else : ?>
        <p class="humania-listing__empty">No hay contenidos disponibles en este archivo.</p>
    <?php endif; ?>
</main>

<?php
get_footer();
