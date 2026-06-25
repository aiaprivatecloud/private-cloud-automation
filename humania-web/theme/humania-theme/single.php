<?php
/**
 * Plantilla individual para entradas HUMANía.
 *
 * @package humania-theme
 */

get_header();
?>

<main id="main-content" class="site-main humania-single-main">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <!-- HUMANIA_SINGLE_TEMPLATE_ACTIVE -->

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'humania-single' ); ?>>
                <header class="humania-single__header">
                    <p class="humania-single__eyebrow">HUMANía</p>

                    <h1 class="humania-single__title">
                        <?php the_title(); ?>
                    </h1>

                    <div class="humania-single__meta" aria-label="Información del episodio">
                        <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                            <?php echo esc_html( get_the_date() ); ?>
                        </time>

                        <?php if ( has_category() ) : ?>
                            <span aria-hidden="true"> · </span>
                            <span class="humania-single__categories">
                                <?php the_category( ', ' ); ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <figure class="humania-single__image">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </figure>
                    <?php endif; ?>
                </header>

                <div class="humania-single__content">
                    <?php the_content(); ?>
                </div>

                <?php if ( has_tag() ) : ?>
                    <footer class="humania-single__footer">
                        <?php the_tags( '<p class="humania-single__tags">Etiquetas: ', ', ', '</p>' ); ?>
                    </footer>
                <?php endif; ?>
            </article>

        <?php endwhile; ?>
    <?php else : ?>
        <article class="humania-single">
            <h1>No se ha encontrado contenido</h1>
            <p>La entrada solicitada no está disponible.</p>
        </article>
    <?php endif; ?>
</main>

<?php
get_footer();
