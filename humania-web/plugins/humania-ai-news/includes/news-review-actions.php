<?php
/**
 * Review actions for HUMANía news.
 *
 * @package HUMANía_AI_News
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Handles quick review actions from the review screen.
 */
function humania_ai_news_handle_review_actions(): void
{
    if (!is_admin()) {
        return;
    }

    if (!current_user_can('manage_options')) {
        return;
    }

    if (empty($_GET['humania_news_action']) || empty($_GET['news_id']) || empty($_GET['_wpnonce'])) {
        return;
    }

    $action = sanitize_key(wp_unslash($_GET['humania_news_action']));
    $post_id = absint($_GET['news_id']);

    if (!$post_id || get_post_type($post_id) !== 'humania_news') {
        return;
    }

    $nonce_action = 'humania_news_' . $action . '_' . $post_id;

    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['_wpnonce'])), $nonce_action)) {
        return;
    }

    if ($action === 'review') {
        update_post_meta($post_id, 'humania_news_editorial_status', 'in_review');

        wp_safe_redirect(get_edit_post_link($post_id, 'raw'));
        exit;
    }

    if ($action === 'discard') {
        update_post_meta($post_id, 'humania_news_editorial_status', 'discarded');

        wp_safe_redirect(
            add_query_arg(
                [
                    'page' => 'humania-ai-news-review',
                    'humania_news_discarded' => '1',
                ],
                admin_url('admin.php')
            )
        );
        exit;
    }
}
add_action('admin_init', 'humania_ai_news_handle_review_actions');

/**
 * Automatically approves HUMANía news when it is published manually.
 *
 * @param string  $new_status New status.
 * @param string  $old_status Old status.
 * @param WP_Post $post       Post object.
 */
function humania_ai_news_auto_approve_on_publish(string $new_status, string $old_status, WP_Post $post): void
{
    if ($post->post_type !== 'humania_news') {
        return;
    }

    if ($new_status !== 'publish') {
        return;
    }

    $current_status = (string) get_post_meta($post->ID, 'humania_news_editorial_status', true);

    if (in_array($current_status, ['', 'pending_review', 'in_review'], true)) {
        update_post_meta($post->ID, 'humania_news_editorial_status', 'approved');
    }
}
add_action('transition_post_status', 'humania_ai_news_auto_approve_on_publish', 10, 3);
