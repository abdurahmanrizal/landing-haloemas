<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $apiBaseUrl = env('API_BASE_URL', 'https://pms-testing.infokejadiansemarang.com/api/landing-page');
        $verifySSL = env('API_VERIFY_SSL', false); // Default true untuk keamanan
        
        try {
            // Banner
            $bannersResponse = Http::withOptions([
                'verify' => $verifySSL,
            ])->get($apiBaseUrl . '/banners');

            $banners = $bannersResponse->json()['data'] ?? [];

            // Harga Emas Murni (24K)
            $chartsResponse = Http::withOptions([
                'verify' => $verifySSL,
            ])->get($apiBaseUrl . '/charts');

            $chartsData = $chartsResponse->json()['data'] ?? [];
            $charts = $chartsData['charts'] ?? [];
            $currentPrice = $chartsData['price'] ?? '0';
            $pricePercent = $chartsData['percent'] ?? 0;

            // Harga Emas Semua Kadar
            $goldsResponse = Http::withOptions([
                'verify' => $verifySSL,
            ])->get($apiBaseUrl . '/golds');

            $goldsData = $goldsResponse->json()['data'] ?? [];
            $golds = $goldsData['items'] ?? [];
            $goldsLastUpdate = $goldsData['last_update'] ?? now()->format('Y-m-d H:i:s');

            // Harga Logam Mulia
            $metalsResponse = Http::withOptions([
                'verify' => $verifySSL,
            ])->get($apiBaseUrl . '/metals');
            
            $metalsData = $metalsResponse->json()['data'] ?? [];
            $metals = $metalsData['items'] ?? [];
            $metalsLastUpdate = $metalsData['last_update'] ?? now()->format('Y-m-d H:i:s');
            
            // Toko
            $storesResponse = Http::withOptions([
                'verify' => $verifySSL,
            ])->get($apiBaseUrl . '/stores');
            
            $stores = $storesResponse->json()['data'] ?? [];
            
            // Testimoni
            $testimoniesResponse = Http::withOptions([
                'verify' => $verifySSL,
            ])->get($apiBaseUrl . '/testimonies');
            
            $testimonies = $testimoniesResponse->json()['data'] ?? [];
            
            // Blogs
            $blogsResponse = Http::withOptions([
                'verify' => $verifySSL,
            ])->get($apiBaseUrl . '/blogs', [
                'page' => 1,
                'per_page' => 3  // Load 3 blog pertama, setiap klik "Muat Lebih Banyak" akan menambah 3 blog berikutnya
            ]);
            
            $blogsData = $blogsResponse->json();
            $blogs = $blogsData['data'] ?? [];
            $blogsMeta = $blogsData['metadata']['pagination'] ?? null;
            
            return view('home', compact('banners', 'charts', 'currentPrice', 'pricePercent', 'golds', 'goldsLastUpdate', 'metals', 'metalsLastUpdate', 'stores', 'testimonies', 'blogs', 'blogsMeta'));
        } catch (\Exception $e) {
            return view('home', [
                'banners' => [], 
                'charts' => [], 
                'currentPrice' => '0', 
                'pricePercent' => 0,
                'golds' => [],
                'goldsLastUpdate' => now()->format('Y-m-d H:i:s'),
                'metals' => [],
                'metalsLastUpdate' => now()->format('Y-m-d H:i:s'),
                'stores' => [],
                'testimonies' => [],
                'blogs' => [],
                'blogsMeta' => null
            ]);
        }
    }
}
