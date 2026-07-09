<?php
/**
 * Contact page template for HUMANía.
 *
 * This template is automatically used by a WordPress page with the slug:
 * contacto
 *
 * @package humania-theme
 */

get_header();

$editorial_email = 'comunidad@aiaprendi.com';
$commercial_email = 'social@aiaprendi.com';

$editorial_email_safe = antispambot( sanitize_email( $editorial_email ) );
$commercial_email_safe = antispambot( sanitize_email( $commercial_email ) );
?>

<main id="main-content" class="site-main humania-contact">
    <section class="humania-contact__hero" aria-labelledby="humania-contact-title">
        <p class="humania-contact__eyebrow">HUMANía</p>

        <h1 id="humania-contact-title" class="humania-contact__title">
            Contacto
        </h1>

        <p class="humania-contact__intro">
            Para propuestas editoriales, colaboraciones, patrocinios o cualquier asunto relacionado con HUMANía, utiliza los canales indicados en esta página.
        </p>
    </section>

    <section class="humania-contact__grid" aria-label="<?php esc_attr_e( 'Canales de contacto', 'humania-theme' ); ?>">
        <article class="humania-contact-card">
            <h2 class="humania-contact-card__title">
                Propuestas editoriales
            </h2>

            <p class="humania-contact-card__text">
                Para temas, fuentes, correcciones, propuestas de contenidos o asuntos relacionados con Revista HUMANía y el enfoque editorial del proyecto.
            </p>

            <a class="humania-contact-card__button" href="<?php echo esc_url( 'mailto:' . $editorial_email ); ?>">
                <?php echo esc_html( $editorial_email_safe ); ?>
            </a>
        </article>

        <article class="humania-contact-card">
            <h2 class="humania-contact-card__title">
                Patrocinios y colaboraciones
            </h2>

            <p class="humania-contact-card__text">
                Para propuestas comerciales, patrocinios, colaboraciones profesionales o campañas compatibles con la línea editorial de HUMANía.
            </p>

            <a class="humania-contact-card__button" href="<?php echo esc_url( 'mailto:' . $commercial_email ); ?>">
                <?php echo esc_html( $commercial_email_safe ); ?>
            </a>
        </article>
    </section>

    <section class="humania-contact__notice" aria-labelledby="humania-contact-security-title">
        <h2 id="humania-contact-security-title">
            Sin formulario de contacto
        </h2>

        <p>
            No usamos formulario en esta página para reducir spam, evitar automatismos abusivos y mantener la web más simple y segura.
        </p>

        <p>
            Si el mensaje encaja con el proyecto, escribe directamente al canal correspondiente. Si es spam, publicidad masiva o una propuesta generada a paladas, Internet ya tiene suficientes vertederos.
        </p>
    </section>
</main>

<?php
get_footer();