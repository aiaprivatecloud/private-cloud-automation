<?php
/**
 * Single post template for HUMANía theme
 *
 * Displays title, date, categories, featured image, content and tags.
 *
 * @package humania-theme
 */

get_header(); ?>

<main id="main-content" class="site-main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
        <header class="single-header">
            <h1 class="single-title"><?php the_title(); ?></h1>
            <div class="single-meta">
                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                    <?php echo esc_html( get_the_date() ); ?>
                </time>
                <span class="single-categories">
                    <?php the_category( ', ' ); ?>
                </span>
            </div>
            <?php if ( has_post_thumbnail() ) : ?>
            <figure class="single-thumbnail">
                <?php
                $thumbnail_id = get_post_thumbnail_id();
                $thumbnail_alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
                if ( empty( $thumbnail_alt ) ) {
                    $thumbnail_alt = get_the_title();
                }
                the_post_thumbnail( 'large', array( 'alt' => esc_attr( $thumbnail_alt ) ) );
                ?>
            </figure>
            <?php endif; ?>
        </header>

        <div class="single-content">
            <?php the_content(); ?>
            <?php
                // Support for paginated posts.
                wp_link_pages(
                    array(
                        'before' => '<nav class="page-links">' . __( 'Páginas:', 'humania-theme' ),
                        'after'  => '</nav>',
                    )
                );
            ?>
        </div>

        <footer class="single-footer">
            <?php the_tags( '<span class="tags-links">' . __( 'Etiquetas: ', 'humania-theme' ), ', ', '</span>' ); ?>
        </footer>
    </article>

    <nav class="post-navigation" role="navigation">
        <div class="nav-links">
            <div class="nav-previous">
                <?php previous_post_link( '%link', '<span class="nav-label">' . __( 'Anterior', 'humania-theme' ) . '</span> %title' ); ?>
            </div>
            <div class="nav-next">
                <?php next_post_link( '%link', '<span class="nav-label">' . __( 'Siguiente', 'humania-theme' ) . '</span> %title' ); ?>
            </div>
        </div>
    </nav>

    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
