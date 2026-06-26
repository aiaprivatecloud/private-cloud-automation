<?php
/**
 * Admin meta box for HUMANía news.
 *
 * @package humania-ai-news
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Adds the HUMANía news editorial meta box.
 */
function humania_ai_news_add_news_meta_box(): void
{
    add_meta_box(
        'humania_ai_news_editorial_data',
        'Datos editoriales de la noticia',
        'humania_ai_news_render_news_meta_box',
        'humania_news',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'humania_ai_news_add_news_meta_box');

/**
 * Renders the HUMANía news editorial meta box.
 *
 * @param WP_Post $post Current post.
 */
function humania_ai_news_render_news_meta_box(WP_Post $post): void
{
    wp_nonce_field('humania_ai_news_save_news_meta', 'humania_ai_news_meta_nonce');

    $source_name = get_post_meta($post->ID, 'humania_news_source_name', true);
    $original_url = get_post_meta($post->ID, 'humania_news_original_url', true);
    $original_language = get_post_meta($post->ID, 'humania_news_original_language', true);
    $original_date = get_post_meta($post->ID, 'humania_news_original_date', true);
    $editorial_status = get_post_meta($post->ID, 'humania_news_editorial_status', true);
    $short_summary = get_post_meta($post->ID, 'humania_news_short_summary', true);
    $extended_summary = get_post_meta($post->ID, 'humania_news_extended_summary', true);
    $remote_image_url = get_post_meta($post->ID, 'humania_news_remote_image_url', true);
    $image_approved = (bool) get_post_meta($post->ID, 'humania_news_image_approved', true);

    if ($original_language === '') {
        $original_language = 'es';
    }

    if ($editorial_status === '') {
        $editorial_status = 'pending_review';
    }
    ?>

    <div class="humania-news-fields">
        <p>
            <label for="humania_news_source_name"><strong>Medio original</strong></label><br>
            <input
                id="humania_news_source_name"
                name="humania_news_source_name"
                type="text"
                value="<?php echo esc_attr($source_name); ?>"
                class="widefat"
                placeholder="Ejemplo: MIT Technology Review"
            >
        </p>

        <p>
            <label for="humania_news_original_url"><strong>URL original</strong></label><br>
            <input
                id="humania_news_original_url"
                name="humania_news_original_url"
                type="url"
                value="<?php echo esc_attr($original_url); ?>"
                class="widefat"
                placeholder="https://..."
            >
        </p>

        <p>
            <label for="humania_news_original_language"><strong>Idioma original</strong></label><br>
            <select id="humania_news_original_language" name="humania_news_original_language">
                <option value="es" <?php selected($original_language, 'es'); ?>>Castellano</option>
                <option value="en" <?php selected($original_language, 'en'); ?>>Inglés</option>
                <option value="fr" <?php selected($original_language, 'fr'); ?>>Francés</option>
                <option value="de" <?php selected($original_language, 'de'); ?>>Alemán</option>
                <option value="it" <?php selected($original_language, 'it'); ?>>Italiano</option>
                <option value="pt" <?php selected($original_language, 'pt'); ?>>Portugués</option>
                <option value="other" <?php selected($original_language, 'other'); ?>>Otro</option>
            </select>
        </p>

        <p>
            <label for="humania_news_original_date"><strong>Fecha original de publicación</strong></label><br>
            <input
                id="humania_news_original_date"
                name="humania_news_original_date"
                type="datetime-local"
                value="<?php echo esc_attr($original_date); ?>"
            >
        </p>

        <p>
            <label for="humania_news_editorial_status"><strong>Estado editorial HUMANía</strong></label><br>
            <select id="humania_news_editorial_status" name="humania_news_editorial_status">
                <option value="pending_review" <?php selected($editorial_status, 'pending_review'); ?>>Pendiente de revisión</option>
                <option value="in_review" <?php selected($editorial_status, 'in_review'); ?>>En revisión</option>
                <option value="approved" <?php selected($editorial_status, 'approved'); ?>>Aprobada para publicar</option>
                <option value="discarded" <?php selected($editorial_status, 'discarded'); ?>>Descartada</option>
            </select>
        </p>

        <p>
            <label for="humania_news_short_summary"><strong>Resumen breve</strong></label><br>
            <textarea
                id="humania_news_short_summary"
                name="humania_news_short_summary"
                rows="4"
                class="widefat"
                placeholder="Resumen corto para noticias en castellano."
            ><?php echo esc_textarea($short_summary); ?></textarea>
        </p>

        <p>
            <label for="humania_news_extended_summary"><strong>Resumen ampliado</strong></label><br>
            <textarea
                id="humania_news_extended_summary"
                name="humania_news_extended_summary"
                rows="7"
                class="widefat"
                placeholder="Resumen más completo para noticias de medios en otros idiomas."
            ><?php echo esc_textarea($extended_summary); ?></textarea>
        </p>

        <p>
            <label for="humania_news_remote_image_url"><strong>URL de imagen remota detectada</strong></label><br>
            <input
                id="humania_news_remote_image_url"
                name="humania_news_remote_image_url"
                type="url"
                value="<?php echo esc_attr($remote_image_url); ?>"
                class="widefat"
                placeholder="https://..."
            >
            <small>No se descarga automáticamente. Solo se guarda como candidata.</small>
        </p>

        <p>
            <label>
                <input
                    type="checkbox"
                    name="humania_news_image_approved"
                    value="1"
                    <?php checked($image_approved); ?>
                >
                Imagen aprobada manualmente para mostrarse como miniatura pública
            </label>
        </p>
    </div>

    <?php
}

/**
 * Saves HUMANía news editorial meta fields.
 *
 * @param int $post_id Current post ID.
 */
function humania_ai_news_save_news_meta(int $post_id): void
{
    if (!isset($_POST['humania_ai_news_meta_nonce'])) {
        return;
    }

    if (!wp_verify_nonce(
        sanitize_text_field(wp_unslash($_POST['humania_ai_news_meta_nonce'])),
        'humania_ai_news_save_news_meta'
    )) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (get_post_type($post_id) !== 'humania_news') {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $allowed_languages = ['es', 'en', 'fr', 'de', 'it', 'pt', 'other'];
    $allowed_statuses = ['pending_review', 'in_review', 'approved', 'discarded'];

    $source_name = isset($_POST['humania_news_source_name'])
        ? sanitize_text_field(wp_unslash($_POST['humania_news_source_name']))
        : '';

    $original_url = isset($_POST['humania_news_original_url'])
        ? esc_url_raw(wp_unslash($_POST['humania_news_original_url']))
        : '';

    $original_language = isset($_POST['humania_news_original_language'])
        ? sanitize_key(wp_unslash($_POST['humania_news_original_language']))
        : 'es';

    if (!in_array($original_language, $allowed_languages, true)) {
        $original_language = 'other';
    }

    $original_date = isset($_POST['humania_news_original_date'])
        ? sanitize_text_field(wp_unslash($_POST['humania_news_original_date']))
        : '';

    $editorial_status = isset($_POST['humania_news_editorial_status'])
        ? sanitize_key(wp_unslash($_POST['humania_news_editorial_status']))
        : 'pending_review';

    if (!in_array($editorial_status, $allowed_statuses, true)) {
        $editorial_status = 'pending_review';
    }

    /*
     * If a HUMANía news item is manually published, it must be considered
     * approved for the public Revista HUMANía page.
     *
     * This happens here because WordPress may save meta fields after the
     * post status transition hook.
     */
    if (
        get_post_status($post_id) === 'publish'
        && in_array($editorial_status, ['', 'pending_review', 'in_review'], true)
    ) {
        $editorial_status = 'approved';
    }

    $short_summary = isset($_POST['humania_news_short_summary'])
        ? sanitize_textarea_field(wp_unslash($_POST['humania_news_short_summary']))
        : '';

    $extended_summary = isset($_POST['humania_news_extended_summary'])
        ? sanitize_textarea_field(wp_unslash($_POST['humania_news_extended_summary']))
        : '';

    $remote_image_url = isset($_POST['humania_news_remote_image_url'])
        ? esc_url_raw(wp_unslash($_POST['humania_news_remote_image_url']))
        : '';

    $image_approved = !empty($_POST['humania_news_image_approved']);

    update_post_meta($post_id, 'humania_news_source_name', $source_name);
    update_post_meta($post_id, 'humania_news_original_url', $original_url);
    update_post_meta($post_id, 'humania_news_original_language', $original_language);
    update_post_meta($post_id, 'humania_news_original_date', $original_date);
    update_post_meta($post_id, 'humania_news_editorial_status', $editorial_status);
    update_post_meta($post_id, 'humania_news_short_summary', $short_summary);
    update_post_meta($post_id, 'humania_news_extended_summary', $extended_summary);
    update_post_meta($post_id, 'humania_news_remote_image_url', $remote_image_url);
    update_post_meta($post_id, 'humania_news_image_approved', $image_approved ? 1 : 0);
}
add_action('save_post_humania_news', 'humania_ai_news_save_news_meta');
