<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('blog_faq_items')) {
    /**
     * Parse FAQ entries from a blog post array.
     */
    function blog_faq_items($post)
    {
        if (!is_array($post) || empty($post['faq_data'])) {
            return array();
        }

        $decoded = json_decode($post['faq_data'], true);
        if (!is_array($decoded)) {
            return array();
        }

        $items = array();
        foreach ($decoded as $item) {
            if (!empty($item['question']) && !empty($item['answer'])) {
                $items[] = array(
                    'question' => $item['question'],
                    'answer' => $item['answer'],
                );
            }
        }

        return $items;
    }
}

if (!function_exists('schema_absolute_url')) {
    function schema_absolute_url($path)
    {
        if (empty($path)) {
            return '';
        }

        if (preg_match('/^https?:\/\//i', $path)) {
            return $path;
        }

        return rtrim(base_url(), '/') . '/' . ltrim($path, '/');
    }
}

if (!function_exists('blog_posting_schema')) {
    /**
     * BlogPosting JSON-LD for a single blog article.
     */
    function blog_posting_schema($post)
    {
        if (!is_array($post)) {
            return null;
        }

        $headline = !empty($post['meta_title']) ? $post['meta_title'] : (!empty($post['title']) ? $post['title'] : '');
        if ($headline === '') {
            return null;
        }

        $description = !empty($post['meta_description'])
            ? strip_tags($post['meta_description'])
            : (!empty($post['shortDescription']) ? strip_tags($post['shortDescription']) : '');

        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => $headline,
            'url' => blog_post_url($post),
            'mainEntityOfPage' => array(
                '@type' => 'WebPage',
                '@id' => blog_post_url($post),
            ),
            'publisher' => array(
                '@type' => 'Organization',
                'name' => 'Dream Villa Makers',
                'url' => 'https://www.dreamvillamakers.com',
                'logo' => array(
                    '@type' => 'ImageObject',
                    'url' => 'https://www.dreamvillamakers.com/assets/images/logo/logo@2x.webp',
                ),
            ),
        );

        if ($description !== '') {
            $schema['description'] = $description;
        }

        if (!empty($post['coverImageUrl'])) {
            $schema['image'] = array(
                '@type' => 'ImageObject',
                'url' => schema_absolute_url($post['coverImageUrl']),
            );
        }

        if (!empty($post['publishedDate'])) {
            $published = date('c', strtotime($post['publishedDate']));
            $schema['datePublished'] = $published;
            $schema['dateModified'] = !empty($post['updated_at'])
                ? date('c', strtotime($post['updated_at']))
                : $published;
        }

        $author = !empty($post['authorName']) ? trim($post['authorName']) : (!empty($post['author']) ? trim($post['author']) : '');
        if ($author !== '' && strcasecmp($author, 'Admin') !== 0) {
            $schema['author'] = array(
                '@type' => 'Person',
                'name' => $author,
            );
        }

        return $schema;
    }
}

if (!function_exists('faq_page_schema')) {
    /**
     * FAQPage JSON-LD from FAQ item list.
     */
    function faq_page_schema($faqItems)
    {
        if (empty($faqItems) || !is_array($faqItems)) {
            return null;
        }

        $entities = array();
        foreach ($faqItems as $faq) {
            $entities[] = array(
                '@type' => 'Question',
                'name' => strip_tags($faq['question']),
                'acceptedAnswer' => array(
                    '@type' => 'Answer',
                    'text' => strip_tags($faq['answer']),
                ),
            );
        }

        if (empty($entities)) {
            return null;
        }

        return array(
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $entities,
        );
    }
}

if (!function_exists('render_json_ld')) {
    function render_json_ld($schema)
    {
        if (empty($schema)) {
            return '';
        }

        return '<script type="application/ld+json">' . json_encode(
            $schema,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT
        ) . '</script>';
    }
}
