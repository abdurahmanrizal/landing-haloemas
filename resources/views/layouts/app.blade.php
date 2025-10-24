<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Halo Emas')</title>
    
    <!-- Google Fonts - Lora -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Additional CSS -->
    @stack('styles')
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
    
    <!-- Hero Slideshow JavaScript -->
    <script>
        let heroSlideIndex = 1;
        let heroSlideInterval;

        // Initialize hero slideshow
        document.addEventListener('DOMContentLoaded', function() {
            showHeroSlide(heroSlideIndex);
            startHeroSlideshow();
        });

        // Show specific hero slide
        function showHeroSlide(n) {
            const slides = document.getElementsByClassName('hero-slide');
            const dots = document.getElementsByClassName('hero-dot');
            
            if (n > slides.length) { heroSlideIndex = 1; }
            if (n < 1) { heroSlideIndex = slides.length; }
            
            // Hide all slides
            for (let i = 0; i < slides.length; i++) {
                slides[i].classList.remove('active');
            }
            
            // Remove active class from all dots
            for (let i = 0; i < dots.length; i++) {
                dots[i].classList.remove('active');
            }
            
            // Show current slide and activate corresponding dot
            slides[heroSlideIndex - 1].classList.add('active');
            dots[heroSlideIndex - 1].classList.add('active');
        }

        // Change hero slide by n steps
        function changeHeroSlide(n) {
            heroSlideIndex += n;
            showHeroSlide(heroSlideIndex);
            resetHeroSlideshow();
        }

        // Go to specific hero slide
        function currentHeroSlide(n) {
            heroSlideIndex = n;
            showHeroSlide(heroSlideIndex);
            resetHeroSlideshow();
        }

        // Start automatic hero slideshow
        function startHeroSlideshow() {
            heroSlideInterval = setInterval(function() {
                heroSlideIndex++;
                showHeroSlide(heroSlideIndex);
            }, 6000); // Change slide every 6 seconds
        }

        // Reset hero slideshow timer
        function resetHeroSlideshow() {
            clearInterval(heroSlideInterval);
            startHeroSlideshow();
        }

        // Pause hero slideshow on hover
        const heroSlideshowContainer = document.querySelector('.hero-slideshow-container');
        if (heroSlideshowContainer) {
            heroSlideshowContainer.addEventListener('mouseenter', function() {
                clearInterval(heroSlideInterval);
            });
            
            heroSlideshowContainer.addEventListener('mouseleave', function() {
                startHeroSlideshow();
            });
        }

        // Touch/swipe support for mobile hero slideshow
        let heroStartX = 0;
        let heroEndX = 0;

        if (heroSlideshowContainer) {
            heroSlideshowContainer.addEventListener('touchstart', function(e) {
                heroStartX = e.touches[0].clientX;
            });

            heroSlideshowContainer.addEventListener('touchend', function(e) {
                heroEndX = e.changedTouches[0].clientX;
                handleHeroSwipe();
            });
        }

        function handleHeroSwipe() {
            const threshold = 50; // Minimum swipe distance
            const diff = heroStartX - heroEndX;

            if (Math.abs(diff) > threshold) {
                if (diff > 0) {
                    // Swipe left - next slide
                    changeHeroSlide(1);
                } else {
                    // Swipe right - previous slide
                    changeHeroSlide(-1);
                }
            }
        }
    </script>
</body>
</html>
