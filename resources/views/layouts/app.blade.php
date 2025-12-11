<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/svg+xml" href="/images/favicon.jpeg" />
    <!-- Title -->
    <title>@yield('title', 'Haloemas.id - Terima Jual Emas Harga Terbaik')</title>
    
    <!-- Meta Description -->
    <meta name="description" content="@yield('meta_description', 'Haloemas.id - Terima Jual Emas Harga Terbaik. Platform terpercaya untuk jual beli emas di Indonesia dengan harga terbaik, proses cepat, dan layanan profesional.')">
    
    <!-- Meta Keywords -->
    <meta name="keywords" content="@yield('meta_keywords', 'harga emas hari ini, jual beli emas, toko emas, investasi emas, harga emas antam, logam mulia, emas 24 karat, halo emas, haloemas, investasi emas mudah, benua jaya gold, haloemas, Haloemas.id')">
    
    <!-- Author -->
    <meta name="author" content="Halo Emas">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="@yield('canonical', url()->current())">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:title" content="@yield('og_title', 'Haloemas.id - Terima Jual Emas Harga Terbaik')">
    <meta property="og:description" content="@yield('og_description', 'Platform terpercaya untuk jual beli emas di Indonesia. Cek harga emas terbaru dan temukan toko haloemas terdekat.')">
    <meta property="og:image" content="@yield('og_image', asset('images/favicon.jpeg'))">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="Halo Emas">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="@yield('twitter_url', url()->current())">
    <meta name="twitter:title" content="@yield('twitter_title', 'Haloemas.id - Terima Jual Emas Harga Terbaik')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Haloemas.id - Terima Jual Emas Harga Terbaik. Cek harga emas terbaru dan jual emas dengan proses mudah.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/favicon.jpeg'))">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Theme Color for Mobile -->
    <meta name="theme-color" content="#5B4636">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#5B4636">
    <meta name="mobile-web-app-capable" content="yes">
    
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
    <!--Google Analytics-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2XKZ94FB92"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-2XKZ94FB92');
    </script>
    <!--end Google Analytics-->
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KXG64PFC');</script>
    <!-- End Google Tag Manager -->


    <!-- Structured Data -->
    @stack('structured_data')
</head>

<body class="bg-[#FFFEFA] relative scroll-smooth">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KXG64PFC"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
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
