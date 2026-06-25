<?php
/**
 * Search results template for HUMANía.
 *
 * @package humania-theme
 */

get_header();
?>

<main id="main-content" class="site-main humania-listing">
    <header class="humania-listing__header">
        <p class="humania-listing__eyebrow">Buscar en HUMANía</p>
        <h1 class="humania-listing__title">
            Resultados para: <?php echo esc_html( get_search_query() ); ?>
        </h1>
    </header>

    <form class="humania-search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <label class="humania-search-form__label" for="humania-search-field">
            Buscar contenidos
        </label>
        <div class="humania-search-form__row">
            <input
                id="humania-search-field"
                class="humania-search-form__input"
                type="search"
                name="s"
                value="<?php echo esc_attr( get_search_query() ); ?>"
                placeholder="Inteligencia artificial, ética, podcast..."
            >
            <button class="humania-search-form__button" type="submit">
                Buscar
            </button>
        </div>
    </form>

    <?php if ( have_posts() ) : ?>
        <div class="humania-listing__grid">
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'humania-listing-card' ); ?>>
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
                    'screen_reader_text' => 'Navegación de resultados',
                )
            );
            ?>
        </nav>
    <?php else : ?>
        <p class="humania-listing__empty">
            No se han encontrado resultados. La IA no lo sabe todo, por desgracia todavía hay humanos publicando cosas con títulos rarísimos.
        </p>
    <?php endif; ?>
</main>

<?php
get_footer();
