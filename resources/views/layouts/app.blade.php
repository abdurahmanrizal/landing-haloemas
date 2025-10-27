<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Title -->
    <title>@yield('title', 'Halo Emas - Platform Jual Beli Emas Terpercaya di Indonesia')</title>
    
    <!-- Meta Description -->
    <meta name="description" content="@yield('meta_description', 'Halo Emas adalah platform terpercaya untuk jual beli emas di Indonesia. Cek harga emas terbaru, temukan toko emas terdekat, dan dapatkan tips investasi emas.')">
    
    <!-- Meta Keywords -->
    <meta name="keywords" content="@yield('meta_keywords', 'harga emas hari ini, jual beli emas, toko emas, investasi emas, harga emas antam, logam mulia, emas 24 karat, halo emas')">
    
    <!-- Author -->
    <meta name="author" content="Halo Emas">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="@yield('canonical', url()->current())">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:title" content="@yield('og_title', 'Halo Emas - Platform Jual Beli Emas Terpercaya')">
    <meta property="og:description" content="@yield('og_description', 'Platform terpercaya untuk jual beli emas di Indonesia. Cek harga emas terbaru dan temukan toko emas terdekat.')">
    <meta property="og:image" content="@yield('og_image', asset('images/logo.svg'))">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="Halo Emas">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="@yield('twitter_url', url()->current())">
    <meta name="twitter:title" content="@yield('twitter_title', 'Halo Emas - Platform Jual Beli Emas Terpercaya')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Platform terpercaya untuk jual beli emas di Indonesia. Cek harga emas terbaru.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/logo.svg'))">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Theme Color for Mobile -->
    <meta name="theme-color" content="#5B4636">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#5B4636">
    
    <!-- Google Fonts - Lora -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Additional CSS -->
    @stack('styles')
    
    <!-- Structured Data -->
    @stack('structured_data')
</head>

<body class="bg-[#FFFEFA] relative scroll-smooth">
    <!-- Header -->
    @include('components.header')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Additional JavaScript -->
    @stack('scripts')
</body>

</html>
