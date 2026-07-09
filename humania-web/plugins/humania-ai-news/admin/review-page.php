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

    $editorial_statuses = [
        'pending_review' => __('Pendientes', 'humania'),
        'in_review' => __('En revisión', 'humania'),
        'approved' => __('Aprobadas', 'humania'),
        'discarded' => __('Descartadas', 'humania'),
    ];

    $selected_editorial_status = isset($_GET['humania_news_status'])
        ? sanitize_key(wp_unslash($_GET['humania_news_status']))
        : 'pending_review';

    if ($selected_editorial_status !== 'all' && !array_key_exists($selected_editorial_status, $editorial_statuses)) {
        $selected_editorial_status = 'pending_review';
    }

    $editorial_status_counts = [];

    foreach ($editorial_statuses as $status_key => $status_label) {
        $count_query = new WP_Query(
            [
                'post_type' => 'humania_news',
                'post_status' => ['draft', 'pending', 'publish'],
                'posts_per_page' => 1,
                'fields' => 'ids',
                'orderby' => 'date',
                'order' => 'DESC',
                'meta_query' => [
                    [
                        'key' => 'humania_news_editorial_status',
                        'value' => $status_key,
                        'compare' => '=',
                    ],
                ],
            ]
        );

        $editorial_status_counts[$status_key] = (int) $count_query->found_posts;
    }

    $all_editorial_status_count = array_sum($editorial_status_counts);

    $review_query_args = [
        'post_type' => 'humania_news',
        'post_status' => ['draft', 'pending', 'publish'],
        'posts_per_page' => 20,
        'orderby' => 'date',
        'order' => 'DESC',
    ];

    if ($selected_editorial_status === 'all') {
        $review_query_args['meta_query'] = [
            [
                'key' => 'humania_news_editorial_status',
                'value' => array_keys($editorial_statuses),
                'compare' => 'IN',
            ],
        ];
    } else {
        $review_query_args['meta_query'] = [
            [
                'key' => 'humania_news_editorial_status',
                'value' => $selected_editorial_status,
                'compare' => '=',
            ],
        ];
    }

    $recent_candidates = new WP_Query($review_query_args);
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
            <div class="humania-ai-news-card-header">
                <div>
                    <h2><?php echo esc_html__('Noticias de revisión editorial', 'humania'); ?></h2>
                    <p>
                        <?php echo esc_html__('Gestiona candidatas importadas, noticias en revisión, aprobadas y descartadas.', 'humania'); ?>
                    </p>
                </div>
            </div>

            <div class="humania-ai-news-status-grid">
                <?php foreach ($editorial_statuses as $status_key => $status_label) : ?>
                    <?php
                    $status_url = add_query_arg(
                        [
                            'page' => 'humania-ai-news-review',
                            'humania_news_status' => $status_key,
                        ],
                        admin_url('admin.php')
                    );

                    $status_count = $editorial_status_counts[$status_key] ?? 0;
                    $status_class = $selected_editorial_status === $status_key ? ' is-active' : '';
                    ?>
                    <a class="humania-ai-news-status-card<?php echo esc_attr($status_class); ?>" href="<?php echo esc_url($status_url); ?>">
                        <span class="humania-ai-news-status-count"><?php echo esc_html((string) $status_count); ?></span>
                        <span class="humania-ai-news-status-label"><?php echo esc_html($status_label); ?></span>
                    </a>
                <?php endforeach; ?>

                <?php
                $all_status_url = add_query_arg(
                    [
                        'page' => 'humania-ai-news-review',
                        'humania_news_status' => 'all',
                    ],
                    admin_url('admin.php')
                );

                $all_status_class = $selected_editorial_status === 'all' ? ' is-active' : '';
                ?>
                <a class="humania-ai-news-status-card<?php echo esc_attr($all_status_class); ?>" href="<?php echo esc_url($all_status_url); ?>">
                    <span class="humania-ai-news-status-count"><?php echo esc_html((string) $all_editorial_status_count); ?></span>
                    <span class="humania-ai-news-status-label"><?php echo esc_html__('Todas', 'humania'); ?></span>
                </a>
            </div>

            <?php if ($recent_candidates->have_posts()) : ?>
                <table class="widefat striped humania-ai-news-review-table">
                    <thead>
                        <tr>
                            <th><?php echo esc_html__('Título', 'humania'); ?></th>
                            <th><?php echo esc_html__('Medio', 'humania'); ?></th>
                            <th><?php echo esc_html__('Idioma', 'humania'); ?></th>
                            <th><?php echo esc_html__('Estado', 'humania'); ?></th>
                            <th><?php echo esc_html__('Fecha original', 'humania'); ?></th>
                            <th><?php echo esc_html__('Acciones', 'humania'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($recent_candidates->have_posts()) : ?>
                            <?php
                            $recent_candidates->the_post();

                            $news_id = get_the_ID();
                            $source_name = get_post_meta($news_id, 'humania_news_source_name', true);
                            $language = get_post_meta($news_id, 'humania_news_original_language', true);
                            $original_date = get_post_meta($news_id, 'humania_news_original_date', true);
                            $original_url = get_post_meta($news_id, 'humania_news_original_url', true);
                            $editorial_status = get_post_meta($news_id, 'humania_news_editorial_status', true);
                            $editorial_status_label = $editorial_statuses[$editorial_status] ?? __('Sin estado', 'humania');

                            $review_url = wp_nonce_url(
                                add_query_arg(
                                    [
                                        'humania_news_action' => 'review',
                                        'news_id' => $news_id,
                                    ],
                                    admin_url('admin.php')
                                ),
                                'humania_news_review_' . $news_id
                            );

                            $edit_url = get_edit_post_link($news_id, '');

                            $discard_url = wp_nonce_url(
                                add_query_arg(
                                    [
                                        'page' => 'humania-ai-news-review',
                                        'humania_news_action' => 'discard',
                                        'news_id' => $news_id,
                                    ],
                                    admin_url('admin.php')
                                ),
                                'humania_news_discard_' . $news_id
                            );
                            ?>
                            <tr>
                                <td data-label="<?php echo esc_attr__('Título', 'humania'); ?>">
                                    <strong><?php echo esc_html(get_the_title()); ?></strong>
                                </td>
                                <td data-label="<?php echo esc_attr__('Medio', 'humania'); ?>">
                                    <?php echo esc_html((string) $source_name); ?>
                                </td>
                                <td data-label="<?php echo esc_attr__('Idioma', 'humania'); ?>">
                                    <?php echo esc_html((string) $language); ?>
                                </td>
                                <td data-label="<?php echo esc_attr__('Estado', 'humania'); ?>">
                                    <span class="humania-ai-news-badge humania-ai-news-badge-<?php echo esc_attr((string) $editorial_status); ?>">
                                        <?php echo esc_html($editorial_status_label); ?>
                                    </span>
                                </td>
                                <td data-label="<?php echo esc_attr__('Fecha original', 'humania'); ?>">
                                    <?php echo esc_html((string) $original_date); ?>
                                </td>
                                <td data-label="<?php echo esc_attr__('Acciones', 'humania'); ?>">
                                    <div class="humania-ai-news-actions">
                                        <?php if ($editorial_status === 'pending_review') : ?>
                                            <a class="button button-primary" href="<?php echo esc_url($review_url); ?>">
                                                <?php echo esc_html__('Revisar', 'humania'); ?>
                                            </a>
                                        <?php elseif ($edit_url) : ?>
                                            <a class="button" href="<?php echo esc_url($edit_url); ?>">
                                                <?php echo esc_html__('Editar', 'humania'); ?>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!empty($original_url)) : ?>
                                            <a class="button" href="<?php echo esc_url((string) $original_url); ?>" target="_blank" rel="noopener noreferrer">
                                                <?php echo esc_html__('Ver original', 'humania'); ?>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (in_array($editorial_status, ['pending_review', 'in_review'], true)) : ?>
                                            <a class="button button-link-delete" href="<?php echo esc_url($discard_url); ?>">
                                                <?php echo esc_html__('Descartar', 'humania'); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p><?php echo esc_html__('No hay noticias en este filtro.', 'humania'); ?></p>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>
        </div>
    </div>
    <?php
}
