<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // Banner
            $bannersResponse = Http::withOptions([
                'verify' => false,
            ])->get('https://pms-testing.infokejadiansemarang.com/api/landing-page/banners');

            $banners = $bannersResponse->json()['data'] ?? [];

            // Harga Emas Murni (24K)
            $chartsResponse = Http::withOptions([
                'verify' => false,
            ])->get('https://pms-testing.infokejadiansemarang.com/api/landing-page/charts');

            $chartsData = $chartsResponse->json()['data'] ?? [];
            $charts = $chartsData['charts'] ?? [];
            $currentPrice = $chartsData['price'] ?? '0';
            $pricePercent = $chartsData['percent'] ?? 0;

            // Harga Emas Semua Kadar
            $goldsResponse = Http::withOptions([
                'verify' => false,
            ])->get('https://pms-testing.infokejadiansemarang.com/api/landing-page/golds');

            $goldsData = $goldsResponse->json()['data'] ?? [];
            $golds = $goldsData['items'] ?? [];
            $goldsLastUpdate = $goldsData['last_update'] ?? now()->format('Y-m-d H:i:s');

            // Harga Logam Mulia
            $metalsResponse = Http::withOptions([
                'verify' => false,
            ])->get('https://pms-testing.infokejadiansemarang.com/api/landing-page/metals');
            
            $metalsData = $metalsResponse->json()['data'] ?? [];
            $metals = $metalsData['items'] ?? [];
            $metalsLastUpdate = $metalsData['last_update'] ?? now()->format('Y-m-d H:i:s');
            
            // Toko
            $storesResponse = Http::withOptions([
                'verify' => false,
            ])->get('https://pms-testing.infokejadiansemarang.com/api/landing-page/stores');
            
            $stores = $storesResponse->json()['data'] ?? [];
            
            // Testimoni
            $testimoniesResponse = Http::withOptions([
                'verify' => false,
            ])->get('https://pms-testing.infokejadiansemarang.com/api/landing-page/testimonies');
            
            $testimonies = $testimoniesResponse->json()['data'] ?? [];
            
            // Blogs
            $blogsResponse = Http::withOptions([
                'verify' => false,
            ])->get('https://pms-testing.infokejadiansemarang.com/api/landing-page/blogs', [
                'page' => 1,
                'per_page' => 3
            ]);
            
            $blogs = $blogsResponse->json()['data'] ?? [];
            
            return view('home', compact('banners', 'charts', 'currentPrice', 'pricePercent', 'golds', 'goldsLastUpdate', 'metals', 'metalsLastUpdate', 'stores', 'testimonies', 'blogs'));
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
                'blogs' => []
            ]);
        }
    }
}
