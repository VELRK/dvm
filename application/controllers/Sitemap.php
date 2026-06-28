<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'blog'));
        $this->load->library('db_store');
    }

    /**
     * Dynamic XML sitemap (blogs, properties, static pages).
     */
    public function index()
    {
        $siteBase = 'https://www.dreamvillamakers.com';
        $entries = array(
            $this->entry($siteBase . '/', 'daily', '1.0'),
            $this->entry($siteBase . '/about', 'monthly', '0.8'),
            $this->entry($siteBase . '/our-projects', 'daily', '0.9'),
            $this->entry($siteBase . '/blog', 'daily', '0.8'),
            $this->entry($siteBase . '/contact', 'monthly', '0.7'),
            $this->entry($siteBase . '/legal/terms', 'yearly', '0.5'),
            $this->entry($siteBase . '/legal/privacy', 'yearly', '0.5'),
            $this->entry($siteBase . '/legal/cookie', 'yearly', '0.5'),
        );

        $blogsResult = $this->db_store->getBlogs(5000, 0);
        if (!empty($blogsResult['success']) && !empty($blogsResult['blogs'])) {
            foreach ($blogsResult['blogs'] as $blog) {
                $slug = blog_post_slug($blog);
                if ($slug === '') {
                    continue;
                }

                $lastmod = !empty($blog['updated_at'])
                    ? $blog['updated_at']
                    : (!empty($blog['publishedDate']) ? $blog['publishedDate'] : '');

                $entries[] = $this->entry(
                    rtrim($siteBase, '/') . '/blog/' . rawurlencode($slug),
                    'weekly',
                    '0.7',
                    $lastmod
                );
            }
        }

        $propertiesResult = $this->db_store->getProperties(5000, 0);
        if (!empty($propertiesResult['success']) && !empty($propertiesResult['properties'])) {
            foreach ($propertiesResult['properties'] as $property) {
                if (empty($property['slug'])) {
                    continue;
                }

                $entries[] = $this->entry(
                    $siteBase . '/plots-in-coimbatore/' . rawurlencode($property['slug']),
                    'weekly',
                    '0.8',
                    !empty($property['updated_at'])
                        ? $property['updated_at']
                        : (!empty($property['created_at']) ? $property['created_at'] : '')
                );
            }
        }

        $this->output
            ->set_content_type('application/xml', 'utf-8')
            ->set_output($this->build_xml($entries));
    }

    private function entry($loc, $changefreq, $priority, $lastmod = '')
    {
        return array(
            'loc' => $loc,
            'changefreq' => $changefreq,
            'priority' => $priority,
            'lastmod' => $this->format_lastmod($lastmod),
        );
    }

    private function format_lastmod($value)
    {
        if (empty($value)) {
            return '';
        }

        $timestamp = strtotime($value);
        if ($timestamp === false) {
            return '';
        }

        return date('Y-m-d', $timestamp);
    }

    private function build_xml($entries)
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($entries as $entry) {
            $xml .= "  <url>\n";
            $xml .= '    <loc>' . htmlspecialchars($entry['loc'], ENT_XML1, 'UTF-8') . "</loc>\n";
            if (!empty($entry['lastmod'])) {
                $xml .= '    <lastmod>' . htmlspecialchars($entry['lastmod'], ENT_XML1, 'UTF-8') . "</lastmod>\n";
            }
            $xml .= '    <changefreq>' . htmlspecialchars($entry['changefreq'], ENT_XML1, 'UTF-8') . "</changefreq>\n";
            $xml .= '    <priority>' . htmlspecialchars($entry['priority'], ENT_XML1, 'UTF-8') . "</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= "</urlset>\n";
        return $xml;
    }
}
