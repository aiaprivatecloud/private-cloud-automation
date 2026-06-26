<?php
/**
 * Normalize fetched news items.
 *
 * @package HUMANía_AI_News
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Normalizes a fetched news item.
 *
 * @param array<string, mixed> $item Raw item.
 * @return array<string, string>
 */
function humania_ai_news_normalize_item($item): array
{
    if (!is_array($item)) {
        return [];
    }

    $title = isset($item['title']) ? sanitize_text_field(wp_strip_all_tags((string) $item['title'])) : '';
    $original_url = isset($item['original_url']) ? esc_url_raw((string) $item['original_url']) : '';
    $source_name = isset($item['source_name']) ? sanitize_text_field(wp_strip_all_tags((string) $item['source_name'])) : '';
    $published_at = isset($item['published_at']) ? sanitize_text_field((string) $item['published_at']) : '';
    $remote_image_url = isset($item['remote_image_url']) ? esc_url_raw((string) $item['remote_image_url']) : '';

    $description = isset($item['description']) ? (string) $item['description'] : '';
    $content = isset($item['content']) ? (string) $item['content'] : '';

    $summary_source = $description !== '' ? $description : $content;
    $summary_source = wp_strip_all_tags($summary_source);
    $summary_source = html_entity_decode($summary_source, ENT_QUOTES | ENT_HTML5, get_bloginfo('charset'));
    $summary_source = preg_replace('/\s+/', ' ', $summary_source);
    $summary_source = trim((string) $summary_source);

    $short_summary = '';

    if ($summary_source !== '') {
        $short_summary = wp_trim_words($summary_source, 38, '…');
    }

    if ($title === '' || $original_url === '') {
        return [];
    }

    return [
        'title' => $title,
        'source_name' => $source_name,
        'original_url' => $original_url,
        'original_language' => 'es',
        'published_at' => $published_at,
        'short_summary' => $short_summary,
        'extended_summary' => '',
        'remote_image_url' => $remote_image_url,
    ];
}
