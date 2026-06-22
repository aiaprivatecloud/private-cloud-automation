<?php
/**
 * Plantilla principal del tema HUMANía.
 *
 * @package HUMANía
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main-content" class="site-main">
	<section class="hero">
		<p class="hero__eyebrow"><?php esc_html_e( 'HUMANía', 'humania' ); ?></p>
		<h1 class="hero__title"><?php esc_html_e( 'La IA en castellano', 'humania' ); ?></h1>
		<p class="hero__text">
			<?php esc_html_e( 'Una web editorial sobre inteligencia artificial, tecnología y mirada humana.', 'humania' ); ?>
		</p>
	</section>

	<section class="content-list" aria-label="<?php esc_attr_e( 'Ultimas publicaciones', 'humania' ); ?>">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-card' ); ?>>
					<header class="content-card__header">
						<h2 class="content-card__title">
							<a href="<?php echo esc_url( get_permalink() ); ?>">
								<?php echo esc_html( get_the_title() ); ?>
							</a>
						</h2>
					</header>

					<div class="content-card__summary">
						<?php the_excerpt(); ?>
					</div>
				</article>
			<?php endwhile; ?>

			<nav class="pagination" aria-label="<?php esc_attr_e( 'Paginacion de publicaciones', 'humania' ); ?>">
				<?php
				the_posts_pagination(
					array(
						'prev_text' => __( 'Anterior', 'humania' ),
						'next_text' => __( 'Siguiente', 'humania' ),
					)
				);
				?>
			</nav>
		<?php else : ?>
			<article class="content-card">
				<h2><?php esc_html_e( 'No hay contenido publicado todavía', 'humania' ); ?></h2>
				<p><?php esc_html_e( 'Cuando haya publicaciones, apareceran en esta sección.', 'humania' ); ?></p>
			</article>
		<?php endif; ?>
	</section>
</main>

<?php
get_footer();
