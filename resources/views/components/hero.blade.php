<section id="hero" class="relative w-full md:w-[90%] max-w-6xl mx-auto sm:px-6 lg:px-8 mb-0">
    <!-- Slideshow Container -->
    <div class="hero-slideshow-container relative w-full mt-24">
        @if (isset($banners) && count($banners) > 0)
            @foreach ($banners as $index => $banner)
                @if ($banner['link'])
                    <a href="{{ $banner['link'] }}" target="_blank" class="hero-slide {{ $index === 0 ? 'active' : '' }} relative w-full block">
                        <img src="{{ $banner['image'] }}" alt="{{ $banner['title'] ?? 'Halo Emas - Banner Promosi ' . ($index + 1) }}"
                            class="w-full h-auto object-contain">
                    </a>
                @else
                    <div class="hero-slide {{ $index === 0 ? 'active' : '' }} relative w-full block">
                        <img src="{{ $banner['image'] }}" alt="{{ $banner['title'] ?? 'Halo Emas - Banner Promosi ' . ($index + 1) }}"
                            class="w-full h-auto object-contain">
                    </div>
                @endif
            @endforeach
        @else
            <div class="hero-slide active relative w-full block">
                <img src="https://placehold.co/1920x1080" alt="Halo Emas - Platform Jual Beli Emas Terpercaya" class="w-full h-auto object-contain">
            </div>
        @endif
    </div>

    <!-- Navigation Dots -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 z-30 flex space-x-2">
        @if (isset($banners) && count($banners) > 0)
            @foreach ($banners as $index => $banner)
                <button
                    class="hero-dot {{ $index === 0 ? 'active' : '' }} h-2 transition-all duration-300 {{ $index === 0 ? 'w-8 bg-black' : 'w-3 bg-gray-400 hover:bg-gray-500' }}"
                    onclick="currentHeroSlide({{ $index + 1 }})"></button>
            @endforeach
        @else
            <button class="hero-dot active w-8 h-2 bg-black transition-all duration-300"
                onclick="currentHeroSlide(1)"></button>
        @endif
    </div>
</section>
