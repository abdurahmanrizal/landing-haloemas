<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    public function show($id)
    {
        try {
            // Fetch blog detail
            $blogResponse = Http::withOptions([
                'verify' => false,
            ])->get("https://pms-testing.infokejadiansemarang.com/api/landing-page/blogs/{$id}");
            
            $blogData = $blogResponse->json()['data'] ?? null;
            
            // If blog not found, redirect to home
            if (!$blogData) {
                return redirect()->route('home')->with('error', 'Blog tidak ditemukan');
            }
            
            // Extract blog and related blogs from response
            $blog = $blogData;
            $relatedBlogs = $blogData['related_blogs'] ?? [];
            $tags = $blogData['tag_ids'] ?? [];
            
            return view('blog-detail', compact('blog', 'relatedBlogs', 'tags'));
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Terjadi kesalahan');
        }
    }
}

