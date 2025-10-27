<section id="hero" class="relative min-h-screen overflow-hidden">
    <!-- Slideshow Container -->
    <div class="hero-slideshow-container relative w-full h-screen">
        @if (isset($banners) && count($banners) > 0)
            @foreach ($banners as $index => $banner)
                <div class="hero-slide {{ $index === 0 ? 'active' : '' }} relative w-full h-full">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-black/30 z-10"></div>
                    @if ($banner['link'])
                        <a href="{{ $banner['link'] }}" target="_blank" class="block w-full h-full" aria-label="Banner Promosi {{ $index + 1 }}">
                            <img src="{{ $banner['image'] }}" alt="{{ $banner['title'] ?? 'Halo Emas - Banner Promosi ' . ($index + 1) }}"
                                class="w-full h-full object-cover">
                        </a>
                    @else
                        <img src="{{ $banner['image'] }}" alt="{{ $banner['title'] ?? 'Halo Emas - Banner Promosi ' . ($index + 1) }}"
                            class="w-full h-full object-cover">
                    @endif
                </div>
            @endforeach
        @else
            <div class="hero-slide active relative w-full h-full">
                <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-black/30 z-10"></div>
                <img src="https://placehold.co/1920x1080" alt="Halo Emas - Platform Jual Beli Emas Terpercaya" class="w-full h-full object-cover">
            </div>
        @endif
    </div>

    <!-- Navigation Dots -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-30 flex space-x-2">
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
