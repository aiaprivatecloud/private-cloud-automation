<?php
/**
 * Single post template for HUMANía.
 *
 * @package humania-theme
 */

get_header();

while ( have_posts() ) :
    the_post();

    $audio_url   = trim( (string) get_post_meta( get_the_ID(), 'humania_audio_url', true ) );
    $spotify_url = trim( (string) get_post_meta( get_the_ID(), 'humania_spotify_url', true ) );
    $apple_url   = trim( (string) get_post_meta( get_the_ID(), 'humania_apple_url', true ) );
    $ivoox_url   = trim( (string) get_post_meta( get_the_ID(), 'humania_ivoox_url', true ) );
    $youtube_url = trim( (string) get_post_meta( get_the_ID(), 'humania_youtube_url', true ) );

    $episode_intro = trim( (string) get_post_meta( get_the_ID(), 'humania_episode_intro', true ) );
    $summary       = trim( (string) get_post_meta( get_the_ID(), 'humania_summary', true ) );
    $key_points    = trim( (string) get_post_meta( get_the_ID(), 'humania_key_points', true ) );
    $references    = trim( (string) get_post_meta( get_the_ID(), 'humania_references', true ) );

    $is_episode = ! empty( $audio_url ) || ! empty( $summary ) || ! empty( $key_points );

    $player_shortcode = '';

    if ( ! empty( $audio_url ) ) {
        $player_shortcode = '[humania_player audio="' . esc_url( $audio_url ) . '" title="' . esc_attr( get_the_title() ) . '"';

        if ( ! empty( $ivoox_url ) ) {
            $player_shortcode .= ' ivoox="' . esc_url( $ivoox_url ) . '"';
        }

        if ( ! empty( $spotify_url ) ) {
            $player_shortcode .= ' spotify="' . esc_url( $spotify_url ) . '"';
        }

        if ( ! empty( $apple_url ) ) {
            $player_shortcode .= ' apple="' . esc_url( $apple_url ) . '"';
        }

        if ( ! empty( $youtube_url ) ) {
            $player_shortcode .= ' youtube="' . esc_url( $youtube_url ) . '"';
        }
$player_shortcode .= ']';
    }
    ?>

    <main id="main-content" class="site-main humania-single-main">
        <article id="post-<?php the_ID(); ?>" <?php post_class( $is_episode ? 'humania-episode' : 'humania-single' ); ?>>
            <header class="humania-episode__hero">
                <div class="humania-episode__hero-inner">
                    <p class="humania-episode__eyebrow">
                        <?php echo $is_episode ? esc_html__( 'Episodio HUMANía', 'humania-theme' ) : esc_html__( 'HUMANía', 'humania-theme' ); ?>
                    </p>

                    <h1 class="humania-episode__title"><?php the_title(); ?></h1>

                    <div class="humania-episode__meta">
                        <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                            <?php echo esc_html( get_the_date() ); ?>
                        </time>

                        <?php if ( has_category() ) : ?>
                            <span aria-hidden="true">·</span>
                            <span><?php the_category( ', ' ); ?></span>
                        <?php endif; ?>
                    </div>

                    <?php if ( ! empty( $episode_intro ) ) : ?>
                        <p class="humania-episode__intro">
                            <?php echo esc_html( $episode_intro ); ?>
                        </p>
                    <?php elseif ( has_excerpt() ) : ?>
                        <p class="humania-episode__intro">
                            <?php echo esc_html( get_the_excerpt() ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="humania-episode__image-wrap">
                        <?php the_post_thumbnail( 'large', array( 'class' => 'humania-episode__image' ) ); ?>
                    </div>
                <?php endif; ?>
            </header>

            <?php if ( ! empty( $player_shortcode ) ) : ?>
                <section class="humania-episode__player" aria-label="<?php esc_attr_e( 'Reproductor del episodio', 'humania-theme' ); ?>">
                    <?php echo do_shortcode( $player_shortcode ); ?>
                </section>
            <?php endif; ?>

            <?php if ( $is_episode ) : ?>
                <div class="humania-episode__layout">
                    <div class="humania-episode__main">
                        <?php if ( ! empty( $summary ) ) : ?>
                            <section class="humania-episode-section">
                                <h2>Resumen</h2>
                                <?php echo wpautop( esc_html( $summary ) ); ?>
                            </section>
                        <?php endif; ?>

                        <?php
                        /*
                         * En episodios HUMANía no se imprime el contenido manual de WordPress.
                         * La estructura pública se genera desde campos propios para permitir automatización.
                         */
                        ?>
                    </div>

                    <aside class="humania-episode__aside" aria-label="<?php esc_attr_e( 'Información del episodio', 'humania-theme' ); ?>">
                        <?php if ( ! empty( $key_points ) ) : ?>
                            <section class="humania-episode-box">
                                <h2>Ideas clave</h2>
                                <ul>
                                    <?php foreach ( preg_split( '/\r\n|\r|\n/', $key_points ) as $point ) : ?>
                                        <?php $point = trim( $point ); ?>
                                        <?php if ( ! empty( $point ) ) : ?>
                                            <li><?php echo esc_html( $point ); ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </section>
                        <?php endif; ?>

                        <?php if ( ! empty( $references ) ) : ?>
                            <section class="humania-episode-box">
                                <h2>Referencias</h2>
                                <ul class="humania-episode-references">
                                    <?php foreach ( preg_split( '/\r\n|\r|\n/', $references ) as $reference ) : ?>
                                        <?php
                                        $reference = trim( $reference );

                                        if ( empty( $reference ) ) {
                                            continue;
                                        }

                                        $parts = array_map( 'trim', explode( '|', $reference, 2 ) );
                                        $label = $parts[0];
                                        $url   = $parts[1] ?? '';
                                        ?>
                                        <li>
                                            <?php if ( ! empty( $url ) ) : ?>
                                                <a href="<?php echo esc_url( $url ); ?>" rel="noopener noreferrer">
                                                    <?php echo esc_html( $label ); ?>
                                                </a>
                                            <?php else : ?>
                                                <?php echo esc_html( $label ); ?>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </section>
                        <?php endif; ?>
                    </aside>
                </div>
            <?php else : ?>
                <div class="humania-single__content">
                    <?php the_content(); ?>
                </div>
            <?php endif; ?>

            <?php if ( has_tag() ) : ?>
                <footer class="humania-single__footer">
                    <?php the_tags( '<span class="screen-reader-text">Etiquetas: </span>', ', ' ); ?>
                </footer>
            <?php endif; ?>
        </article>
    </main>

<?php
endwhile;

get_footer();
