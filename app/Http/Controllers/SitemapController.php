<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
        $sitemap .= ' xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">';

        // Homepage
        $sitemap .= '<url>';
        $sitemap .= '<loc>' . url('/') . '</loc>';
        $sitemap .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $sitemap .= '<changefreq>daily</changefreq>';
        $sitemap .= '<priority>1.0</priority>';
        $sitemap .= '</url>';

        // Get blogs from API for sitemap
        try {
            $blogsResponse = Http::withOptions([
                'verify' => false,
            ])->get('https://pms-testing.infokejadiansemarang.com/api/landing-page/blogs', [
                'page' => 1,
                'per_page' => 100 // Get more blogs for sitemap
            ]);

            $blogs = $blogsResponse->json()['data'] ?? [];

            // Add blog URLs
            foreach ($blogs as $blog) {
                $sitemap .= '<url>';
                $sitemap .= '<loc>' . route('blog.show', $blog['id']) . '</loc>';
                $sitemap .= '<lastmod>' . (isset($blog['date']) ? date('c', strtotime($blog['date'])) : now()->toAtomString()) . '</lastmod>';
                $sitemap .= '<changefreq>weekly</changefreq>';
                $sitemap .= '<priority>0.8</priority>';
                
                // Add image if exists
                if (isset($blog['thumbnail']) && $blog['thumbnail']) {
                    $sitemap .= '<image:image>';
                    $sitemap .= '<image:loc>' . htmlspecialchars($blog['thumbnail']) . '</image:loc>';
                    $sitemap .= '<image:title>' . htmlspecialchars($blog['title'] ?? '') . '</image:title>';
                    $sitemap .= '</image:image>';
                }
                
                $sitemap .= '</url>';
            }
        } catch (\Exception $e) {
            // If API fails, continue without blog URLs
        }

        $sitemap .= '</urlset>';

        return response($sitemap, 200)
            ->header('Content-Type', 'application/xml');
    }
}

