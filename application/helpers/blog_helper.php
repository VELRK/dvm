<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('blog_post_slug')) {
    /**
     * Resolve the URL slug for a blog post array or object.
     */
    function blog_post_slug($post)
    {
        if (is_object($post)) {
            $post = (array) $post;
        }

        if (!is_array($post)) {
            return '';
        }

        if (!empty($post['slug'])) {
            return (string) $post['slug'];
        }

        $title = !empty($post['title']) ? $post['title'] : (!empty($post['name']) ? $post['name'] : '');
        if ($title !== '') {
            return url_title($title, '-', TRUE);
        }

        return isset($post['id']) ? (string) $post['id'] : '';
    }
}

if (!function_exists('blog_post_url')) {
    /**
     * Build the public URL for a blog post (slug-based).
     */
    function blog_post_url($post)
    {
        $slug = blog_post_slug($post);
        if ($slug === '') {
            return base_url('blog');
        }

        return base_url('blog/' . rawurlencode($slug));
    }
}
