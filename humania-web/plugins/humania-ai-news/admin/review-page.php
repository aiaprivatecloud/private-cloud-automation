<?php
/**
 * Review page for HUMANía AI News.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Renders the review screen.
 */
function humania_ai_news_render_review_page(): void
{
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('No tienes permisos para acceder a esta página.', 'humania'));
    }

    $import_result = null;

    if (
        isset($_POST['humania_ai_news_manual_import'])
        && isset($_POST['humania_ai_news_manual_import_nonce'])
        && wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['humania_ai_news_manual_import_nonce'])),
            'humania_ai_news_manual_import'
        )
    ) {
        $import_result = humania_ai_news_run_manual_import();
    }

    $options = humania_ai_news_get_options();
    $sources = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $options['source_urls'])));

    $recent_candidates = new WP_Query(
        [
            'post_type' => 'humania_news',
            'post_status' => ['draft', 'pending', 'publish'],
            'posts_per_page' => 15,
            'orderby' => 'date',
            'order' => 'DESC',
            'meta_query' => [
                [
                    'key' => 'humania_news_editorial_status',
                    'value' => 'pending_review',
                    'compare' => '=',
                ],
            ],
        ]
    );
    ?>
    <div class="wrap humania-ai-news-admin">
        <h1><?php echo esc_html__('Revisión de noticias', 'humania'); ?></h1>

        <?php if (!empty($_GET['humania_news_discarded'])) : ?>
            <div class="notice notice-info is-dismissible">
                <p><?php echo esc_html__('Noticia descartada. Ya no aparecerá en candidatas pendientes.', 'humania'); ?></p>
            </div>
        <?php endif; ?>

        <?php if (is_array($import_result)) : ?>
            <div class="notice notice-success is-dismissible">
                <p>
                    <strong><?php echo esc_html__('Importación finalizada.', 'humania'); ?></strong>
                    <?php
                    echo esc_html(
                        sprintf(
                            'Leídas: %d · Creadas: %d · Duplicadas: %d · Inválidas: %d · Errores: %d',
                            $import_result['fetched'],
                            $import_result['created'],
                            $import_result['duplicates'],
                            $import_result['invalid'],
                            $import_result['errors']
                        )
                    );
                    ?>
                </p>
            </div>
        <?php endif; ?>

        <div class="humania-ai-news-card">
            <h2><?php echo esc_html__('Importación manual', 'humania'); ?></h2>

            <p>
                <?php echo esc_html__('Importa noticias desde las fuentes RSS configuradas. Las noticias se guardan como borrador y quedan pendientes de revisión editorial. No se publica nada automáticamente.', 'humania'); ?>
            </p>

            <form method="post">
                <?php wp_nonce_field('humania_ai_news_manual_import', 'humania_ai_news_manual_import_nonce'); ?>

                <p>
                    <button type="submit" name="humania_ai_news_manual_import" value="1" class="button button-primary">
                        <?php echo esc_html__('Importar noticias ahora', 'humania'); ?>
                    </button>
                </p>
            </form>
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
                        <th scope="row"><?php echo esc_html__('Estado de entrada creado', 'humania'); ?></th>
                        <td><?php echo esc_html__('Borrador', 'humania'); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html__('Estado editorial creado', 'humania'); ?></th>
                        <td><?php echo esc_html__('Pendiente de revisión', 'humania'); ?></td>
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

        <div class="humania-ai-news-card">
            <h2><?php echo esc_html__('Automatización cada 6 horas', 'humania'); ?></h2>

            <?php
            $next_cron = defined('HUMANIA_AI_NEWS_CRON_HOOK')
                ? wp_next_scheduled(HUMANIA_AI_NEWS_CRON_HOOK)
                : false;

            $last_cron = get_option('humania_ai_news_last_cron_import');
            ?>

            <table class="widefat striped">
                <tbody>
                    <tr>
                        <th scope="row"><?php echo esc_html__('Estado', 'humania'); ?></th>
                        <td>
                            <?php
                            echo $next_cron
                                ? esc_html__('Programada', 'humania')
                                : esc_html__('No programada', 'humania');
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html__('Próxima ejecución', 'humania'); ?></th>
                        <td>
                            <?php
                            echo $next_cron
                                ? esc_html(wp_date('d/m/Y H:i', $next_cron))
                                : esc_html__('Sin fecha programada', 'humania');
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html__('Zona horaria WordPress', 'humania'); ?></th>
                        <td><?php echo esc_html(wp_timezone_string()); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html__('Última ejecución automática', 'humania'); ?></th>
                        <td>
                            <?php
                            if (is_array($last_cron) && !empty($last_cron['time'])) {
                                echo esc_html((string) $last_cron['time']);
                            } else {
                                echo esc_html__('Todavía no ejecutada', 'humania');
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html__('Último resultado automático', 'humania'); ?></th>
                        <td>
                            <?php
                            if (is_array($last_cron) && !empty($last_cron['result']) && is_array($last_cron['result'])) {
                                echo esc_html(
                                    sprintf(
                                        'Leídas: %d · Creadas: %d · Duplicadas: %d · Inválidas: %d · Errores: %d',
                                        $last_cron['result']['fetched'] ?? 0,
                                        $last_cron['result']['created'] ?? 0,
                                        $last_cron['result']['duplicates'] ?? 0,
                                        $last_cron['result']['invalid'] ?? 0,
                                        $last_cron['result']['errors'] ?? 0
                                    )
                                );
                            } else {
                                echo esc_html__('Sin resultado todavía', 'humania');
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p>
                <?php echo esc_html__('La automatización importa candidatas como borrador y pendientes de revisión. No publica noticias automáticamente.', 'humania'); ?>
            </p>
        </div>

        <div class="humania-ai-news-card">
            <h2><?php echo esc_html__('Últimas candidatas pendientes', 'humania'); ?></h2>

            <?php if ($recent_candidates->have_posts()) : ?>
                <table class="widefat striped">
                    <thead>
                        <tr>
                            <th><?php echo esc_html__('Título', 'humania'); ?></th>
                            <th><?php echo esc_html__('Medio', 'humania'); ?></th>
                            <th><?php echo esc_html__('Idioma', 'humania'); ?></th>
                            <th><?php echo esc_html__('Fecha original', 'humania'); ?></th>
                            <th><?php echo esc_html__('Acciones', 'humania'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($recent_candidates->have_posts()) : ?>
                            <?php
                            $recent_candidates->the_post();

                            $source_name = get_post_meta(get_the_ID(), 'humania_news_source_name', true);
                            $language = get_post_meta(get_the_ID(), 'humania_news_original_language', true);
                            $original_date = get_post_meta(get_the_ID(), 'humania_news_original_date', true);
                            ?>
                            <tr>
                                <td><?php echo esc_html(get_the_title()); ?></td>
                                <td><?php echo esc_html((string) $source_name); ?></td>
                                <td><?php echo esc_html((string) $language); ?></td>
                                <td><?php echo esc_html((string) $original_date); ?></td>
                                <td>
                                    <?php
                                    $review_url = wp_nonce_url(
                                        add_query_arg(
                                            [
                                                'humania_news_action' => 'review',
                                                'news_id' => get_the_ID(),
                                            ],
                                            admin_url('admin.php')
                                        ),
                                        'humania_news_review_' . get_the_ID()
                                    );

                                    $discard_url = wp_nonce_url(
                                        add_query_arg(
                                            [
                                                'page' => 'humania-ai-news-review',
                                                'humania_news_action' => 'discard',
                                                'news_id' => get_the_ID(),
                                            ],
                                            admin_url('admin.php')
                                        ),
                                        'humania_news_discard_' . get_the_ID()
                                    );
                                    ?>

                                    <a class="button" href="<?php echo esc_url($review_url); ?>">
                                        <?php echo esc_html__('Revisar', 'humania'); ?>
                                    </a>

                                    <a class="button button-link-delete" href="<?php echo esc_url($discard_url); ?>">
                                        <?php echo esc_html__('Descartar', 'humania'); ?>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p><?php echo esc_html__('Todavía no hay noticias candidatas pendientes.', 'humania'); ?></p>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>
        </div>
    </div>
    <?php
}
