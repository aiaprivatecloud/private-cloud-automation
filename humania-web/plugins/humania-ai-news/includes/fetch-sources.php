<?php
/**
 * Fetch RSS sources for HUMANía AI News.
 *
 * @package HUMANía_AI_News
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Fetches configured RSS sources and returns raw normalized feed items.
 *
 * @return array<int, array<string, mixed>>
 */
function humania_ai_news_fetch_sources(): array
{
    $options = humania_ai_news_get_options();

    $source_urls = array_filter(
        array_map(
            'trim',
            preg_split('/\r\n|\r|\n/', (string) $options['source_urls'])
        )
    );

    if (empty($source_urls)) {
        return [];
    }

    if (!function_exists('fetch_feed')) {
        require_once ABSPATH . WPINC . '/feed.php';
    }

    $max_items = isset($options['max_items']) ? absint($options['max_items']) : 5;

    if ($max_items < 1) {
        $max_items = 1;
    }

    if ($max_items > 20) {
        $max_items = 20;
    }

    $items = [];

    foreach ($source_urls as $source_url) {
        $feed = fetch_feed($source_url);

        if (is_wp_error($feed)) {
            if (function_exists('humania_ai_news_log')) {
                humania_ai_news_log(
                    'error',
                    'Error al leer fuente RSS',
                    [
                        'source_url' => $source_url,
                        'message' => $feed->get_error_message(),
                    ]
                );
            }

            continue;
        }

        $feed_title = $feed->get_title();
        $feed_items = $feed->get_items(0, $max_items);

        foreach ($feed_items as $feed_item) {
            $image_url = '';

            $enclosure = $feed_item->get_enclosure();

            if ($enclosure) {
                $enclosure_link = (string) $enclosure->get_link();
                $enclosure_type = (string) $enclosure->get_type();

                if ($enclosure_link !== '' && strpos($enclosure_type, 'image/') === 0) {
                    $image_url = $enclosure_link;
                }

                if ($image_url === '' && method_exists($enclosure, 'get_thumbnail')) {
                    $thumbnail = (string) $enclosure->get_thumbnail();

                    if ($thumbnail !== '') {
                        $image_url = $thumbnail;
                    }
                }
            }

            if ($image_url === '' && method_exists($feed_item, 'get_thumbnail')) {
                $thumbnail = (string) $feed_item->get_thumbnail();

                if ($thumbnail !== '') {
                    $image_url = $thumbnail;
                }
            }

            $items[] = [
                'source_feed_url' => $source_url,
                'source_name' => $feed_title ?: wp_parse_url($source_url, PHP_URL_HOST),
                'title' => $feed_item->get_title(),
                'original_url' => $feed_item->get_permalink(),
                'published_at' => $feed_item->get_date('Y-m-d\TH:i'),
                'description' => $feed_item->get_description(),
                'content' => $feed_item->get_content(),
                'remote_image_url' => $image_url,
            ];
        }
    }

    return $items;
}
