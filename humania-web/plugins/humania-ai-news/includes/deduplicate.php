<?php
/**
 * Deduplication for HUMANía AI News.
 *
 * @package HUMANía_AI_News
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Checks whether a normalized news item already exists.
 *
 * @param array<string, mixed> $item Normalized item.
 * @return bool
 */
function humania_ai_news_is_duplicate($item): bool
{
    if (!is_array($item)) {
        return true;
    }

    $original_url = isset($item['original_url']) ? esc_url_raw((string) $item['original_url']) : '';

    if ($original_url === '') {
        return true;
    }

    $existing = new WP_Query(
        [
            'post_type' => 'humania_news',
            'post_status' => 'any',
            'posts_per_page' => 1,
            'fields' => 'ids',
            'meta_query' => [
                [
                    'key' => 'humania_news_original_url',
                    'value' => $original_url,
                    'compare' => '=',
                ],
            ],
        ]
    );

    return $existing->have_posts();
}
