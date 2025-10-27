<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    public function show($id)
    {
        $apiBaseUrl = env('API_BASE_URL', 'https://pms-testing.infokejadiansemarang.com/api/landing-page');
        $verifySSL = env('API_VERIFY_SSL', true); // Default true untuk keamanan
        
        try {
            // Fetch blog detail
            $blogResponse = Http::withOptions([
                'verify' => $verifySSL,
            ])->get("{$apiBaseUrl}/blogs/{$id}");
            
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

