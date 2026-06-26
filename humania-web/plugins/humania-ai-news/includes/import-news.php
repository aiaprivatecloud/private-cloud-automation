<?php
/**
 * Manual import for HUMANía AI News.
 *
 * @package HUMANía_AI_News
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Creates a HUMANía news candidate from a normalized item.
 *
 * @param array<string, string> $item Normalized item.
 * @return int|WP_Error
 */
function humania_ai_news_create_news_candidate(array $item)
{
    if (empty($item['title']) || empty($item['original_url'])) {
        return new WP_Error(
            'humania_ai_news_invalid_item',
            'La noticia no tiene título o URL original.'
        );
    }

    $post_id = wp_insert_post(
        [
            'post_type' => 'humania_news',
            'post_status' => 'draft',
            'post_title' => $item['title'],
            'post_excerpt' => $item['short_summary'] ?? '',
            'post_content' => '',
            'meta_input' => [
                'humania_news_source_name' => $item['source_name'] ?? '',
                'humania_news_original_url' => $item['original_url'],
                'humania_news_original_language' => $item['original_language'] ?? 'es',
                'humania_news_original_date' => $item['published_at'] ?? '',
                'humania_news_detected_date' => current_time('mysql'),
                'humania_news_editorial_status' => 'pending_review',
                'humania_news_short_summary' => $item['short_summary'] ?? '',
                'humania_news_extended_summary' => $item['extended_summary'] ?? '',
                'humania_news_remote_image_url' => $item['remote_image_url'] ?? '',
                'humania_news_image_approved' => 0,
            ],
        ],
        true
    );

    return $post_id;
}

/**
 * Runs a manual import from configured RSS sources.
 *
 * @return array<string, int>
 */
function humania_ai_news_run_manual_import(): array
{
    $result = [
        'fetched' => 0,
        'created' => 0,
        'duplicates' => 0,
        'invalid' => 0,
        'errors' => 0,
    ];

    $raw_items = humania_ai_news_fetch_sources();
    $result['fetched'] = count($raw_items);

    foreach ($raw_items as $raw_item) {
        $item = humania_ai_news_normalize_item($raw_item);

        if (empty($item)) {
            $result['invalid']++;
            continue;
        }

        if (humania_ai_news_is_duplicate($item)) {
            $result['duplicates']++;
            continue;
        }

        $created = humania_ai_news_create_news_candidate($item);

        if (is_wp_error($created)) {
            $result['errors']++;

            if (function_exists('humania_ai_news_log')) {
                humania_ai_news_log(
                    'error',
                    'Error al crear noticia candidata',
                    [
                        'title' => $item['title'] ?? '',
                        'url' => $item['original_url'] ?? '',
                        'message' => $created->get_error_message(),
                    ]
                );
            }

            continue;
        }

        $result['created']++;
    }

    return $result;
}
