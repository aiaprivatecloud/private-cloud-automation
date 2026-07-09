<?php
/**
 * Cron scheduling for HUMANía AI News.
 *
 * @package HUMANía_AI_News
 */

if (!defined('ABSPATH')) {
    exit;
}

const HUMANIA_AI_NEWS_CRON_HOOK = 'humania_ai_news_import_sources_event';

/**
 * Adds a custom six-hour cron interval.
 *
 * @param array<string, array<string, mixed>> $schedules Existing schedules.
 * @return array<string, array<string, mixed>>
 */
function humania_ai_news_add_cron_interval(array $schedules): array
{
    $schedules['humania_every_six_hours'] = [
        'interval' => 6 * HOUR_IN_SECONDS,
        'display' => __('Cada 6 horas', 'humania'),
    ];

    return $schedules;
}
add_filter('cron_schedules', 'humania_ai_news_add_cron_interval');

/**
 * Schedules the automatic RSS import if it is not already scheduled.
 */
function humania_ai_news_schedule_cron(): void
{
    if (!wp_next_scheduled(HUMANIA_AI_NEWS_CRON_HOOK)) {
        wp_schedule_event(
            time() + 10 * MINUTE_IN_SECONDS,
            'humania_every_six_hours',
            HUMANIA_AI_NEWS_CRON_HOOK
        );
    }
}

/**
 * Clears the automatic RSS import schedule.
 */
function humania_ai_news_clear_cron(): void
{
    wp_clear_scheduled_hook(HUMANIA_AI_NEWS_CRON_HOOK);
}

/**
 * Runs the automatic import.
 */
function humania_ai_news_run_cron_import(): void
{
    if (!function_exists('humania_ai_news_run_manual_import')) {
        return;
    }

    $result = humania_ai_news_run_manual_import();

    update_option(
        'humania_ai_news_last_cron_import',
        [
            'time' => current_time('mysql'),
            'result' => $result,
        ],
        false
    );

    if (function_exists('humania_ai_news_log')) {
        humania_ai_news_log(
            'info',
            'Importación automática RSS ejecutada',
            [
                'result' => $result,
            ]
        );
    }
}
add_action(HUMANIA_AI_NEWS_CRON_HOOK, 'humania_ai_news_run_cron_import');

/**
 * Ensures cron exists while the plugin is active.
 */
function humania_ai_news_maybe_schedule_cron(): void
{
    humania_ai_news_schedule_cron();
}
add_action('init', 'humania_ai_news_maybe_schedule_cron');
