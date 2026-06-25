<?php
/**
 * Plantilla para páginas simples HUMANía.
 *
 * @package humania-theme
 */

get_header();
?>

<main id="main-content" class="site-main humania-page-main">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'humania-page' ); ?>>
                <header class="humania-page__header">
                    <p class="humania-page__eyebrow">HUMANía</p>

                    <h1 class="humania-page__title">
                        <?php the_title(); ?>
                    </h1>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <figure class="humania-page__image">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </figure>
                <?php endif; ?>

                <div class="humania-page__content">
                    <?php the_content(); ?>
                </div>
            </article>

        <?php endwhile; ?>
    <?php else : ?>
        <article class="humania-page">
            <h1>No se ha encontrado contenido</h1>
            <p>La página solicitada no está disponible.</p>
        </article>
    <?php endif; ?>
</main>

<?php
get_footer();
