<?php
/**
 * Página de ajustes del plugin HUMANía AI News.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Renderiza la pantalla principal de ajustes.
 */
function humania_ai_news_render_settings_page(): void
{
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('No tienes permisos para acceder a esta página.', 'humania'));
    }

    $options = humania_ai_news_get_options();
    ?>
    <div class="wrap humania-ai-news-admin">
        <h1><?php echo esc_html__('Ajustes de HUMANía AI News', 'humania'); ?></h1>

        <p>
            <?php echo esc_html__('Plugin propio para automatización controlada de noticias de inteligencia artificial.', 'humania'); ?>
        </p>

        <div class="humania-ai-news-card">
            <h2><?php echo esc_html__('Estado inicial', 'humania'); ?></h2>

            <p>
                <?php echo esc_html__('El plugin está instalado como esqueleto seguro. Todavía no captura, resume ni publica noticias.', 'humania'); ?>
            </p>

            <p>
                <?php echo esc_html__('La automatización permanece desactivada en esta fase. Los ajustes se guardan para preparar el desarrollo posterior.', 'humania'); ?>
            </p>
        </div>

        <form method="post" action="options.php">
            <?php settings_fields('humania_ai_news_settings'); ?>

            <div class="humania-ai-news-card">
                <h2><?php echo esc_html__('Configuración editorial', 'humania'); ?></h2>

                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row">
                                <label for="humania-ai-news-source-urls">
                                    <?php echo esc_html__('Fuentes de noticias', 'humania'); ?>
                                </label>
                            </th>
                            <td>
                                <textarea
                                    id="humania-ai-news-source-urls"
                                    name="humania_ai_news_options[source_urls]"
                                    rows="8"
                                    class="large-text code"
                                    placeholder="https://ejemplo.com/feed&#10;https://otro-ejemplo.com/rss"
                                ><?php echo esc_textarea($options['source_urls']); ?></textarea>

                                <p class="description">
                                    <?php echo esc_html__('Introduce una URL por línea. En esta fase se guardan, pero todavía no se capturan automáticamente.', 'humania'); ?>
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">
                                <label for="humania-ai-news-max-items">
                                    <?php echo esc_html__('Máximo de noticias por ejecución', 'humania'); ?>
                                </label>
                            </th>
                            <td>
                                <input
                                    id="humania-ai-news-max-items"
                                    name="humania_ai_news_options[max_items]"
                                    type="number"
                                    min="1"
                                    max="20"
                                    value="<?php echo esc_attr((string) $options['max_items']); ?>"
                                />

                                <p class="description">
                                    <?php echo esc_html__('Límite previsto para futuras capturas. Rango permitido: 1 a 20.', 'humania'); ?>
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">
                                <label for="humania-ai-news-draft-status">
                                    <?php echo esc_html__('Estado de los contenidos generados', 'humania'); ?>
                                </label>
                            </th>
                            <td>
                                <select
                                    id="humania-ai-news-draft-status"
                                    name="humania_ai_news_options[draft_status]"
                                >
                                    <option value="draft" <?php selected($options['draft_status'], 'draft'); ?>>
                                        <?php echo esc_html__('Borrador', 'humania'); ?>
                                    </option>
                                    <option value="pending" <?php selected($options['draft_status'], 'pending'); ?>>
                                        <?php echo esc_html__('Pendiente de revisión', 'humania'); ?>
                                    </option>
                                </select>

                                <p class="description">
                                    <?php echo esc_html__('La publicación automática no está permitida en esta fase.', 'humania'); ?>
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">
                                <label for="humania-ai-news-notification-email">
                                    <?php echo esc_html__('Email de avisos', 'humania'); ?>
                                </label>
                            </th>
                            <td>
                                <input
                                    id="humania-ai-news-notification-email"
                                    name="humania_ai_news_options[notification_email]"
                                    type="email"
                                    class="regular-text"
                                    value="<?php echo esc_attr($options['notification_email']); ?>"
                                />

                                <p class="description">
                                    <?php echo esc_html__('Dirección prevista para futuros avisos internos del plugin.', 'humania'); ?>
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">
                                <?php echo esc_html__('Logs internos', 'humania'); ?>
                            </th>
                            <td>
                                <label>
                                    <input
                                        name="humania_ai_news_options[logs_enabled]"
                                        type="checkbox"
                                        value="1"
                                        <?php checked((int) $options['logs_enabled'], 1); ?>
                                    />
                                    <?php echo esc_html__('Activar registro interno cuando se implemente el procesamiento.', 'humania'); ?>
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">
                                <?php echo esc_html__('Automatización', 'humania'); ?>
                            </th>
                            <td>
                                <label>
                                    <input type="checkbox" disabled />
                                    <?php echo esc_html__('Desactivada en esta versión.', 'humania'); ?>
                                </label>

                                <p class="description">
                                    <?php echo esc_html__('La captura y publicación automática se mantienen bloqueadas hasta una fase posterior.', 'humania'); ?>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <?php submit_button(__('Guardar ajustes', 'humania')); ?>
            </div>
        </form>
    </div>
    <?php
}
