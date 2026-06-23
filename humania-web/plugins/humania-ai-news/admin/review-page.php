<?php
/**
 * Página de revisión del plugin HUMANía AI News.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Renderiza la pantalla de revisión.
 */
function humania_ai_news_render_review_page(): void
{
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('No tienes permisos para acceder a esta página.', 'humania'));
    }

    $options = humania_ai_news_get_options();
    $sources = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $options['source_urls'])));
    ?>
    <div class="wrap humania-ai-news-admin">
        <h1><?php echo esc_html__('Revisión de noticias', 'humania'); ?></h1>

        <div class="humania-ai-news-card">
            <p>
                <?php echo esc_html__('Esta pantalla se usará para revisar borradores generados por la automatización.', 'humania'); ?>
            </p>

            <p>
                <?php echo esc_html__('En esta fase no hay captura automática ni publicación directa.', 'humania'); ?>
            </p>
        </div>

        <div class="humania-ai-news-card">
            <h2><?php echo esc_html__('Configuración actual', 'humania'); ?></h2>

            <table class="widefat striped">
                <tbody>
                    <tr>
                        <th scope="row"><?php echo esc_html__('Fuentes configuradas', 'humania'); ?></th>
                        <td><?php echo esc_html((string) count($sources)); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html__('Máximo por ejecución', 'humania'); ?></th>
                        <td><?php echo esc_html((string) $options['max_items']); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html__('Estado previsto', 'humania'); ?></th>
                        <td><?php echo esc_html($options['draft_status']); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html__('Logs internos', 'humania'); ?></th>
                        <td>
                            <?php
                            echo (int) $options['logs_enabled'] === 1
                                ? esc_html__('Activados', 'humania')
                                : esc_html__('Desactivados', 'humania');
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}
