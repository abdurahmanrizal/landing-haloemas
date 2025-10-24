<section id="hero" class="relative min-h-screen overflow-hidden">
    <!-- Slideshow Container -->
    <div class="hero-slideshow-container relative w-full h-screen">
        <!-- Slide 1 -->
        <div class="hero-slide active relative w-full h-full">
            <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-black/30 z-10"></div>
            <img src="https://images.unsplash.com/photo-1612150354898-a69132eb7c67?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1740" 
                 alt="Gold Investment" 
                 class="w-full h-full object-cover">
        </div>

        <!-- Slide 2 -->
        <div class="hero-slide relative w-full h-full">
            <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-black/30 z-10"></div>
            <img src="https://images.unsplash.com/photo-1668408266859-997f7c29beb4?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1740" 
                 alt="Gold Bars" 
                 class="w-full h-full object-cover">
        </div>

        <!-- Slide 3 -->
        <div class="hero-slide relative w-full h-full">
            <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-black/30 z-10"></div>
            <img src="https://images.unsplash.com/photo-1621311627237-a1db44c9126d?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1740" 
                 alt="Gold Coins" 
                 class="w-full h-full object-cover">
        </div>

        <!-- Slide 4 -->
        <div class="hero-slide relative w-full h-full">
            <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-black/30 z-10"></div>
            <img src="https://images.unsplash.com/photo-1712311779445-34a3093fd14d?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1740" 
                 alt="Gold Investment Technology" 
                 class="w-full h-full object-cover">
        </div>
    </div>

    <!-- Navigation Dots -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-30 flex space-x-3">
        <button class="hero-dot active w-3 h-3 rounded-full bg-yellow-500 transition-all duration-300" onclick="currentHeroSlide(1)"></button>
        <button class="hero-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white/70 transition-all duration-300" onclick="currentHeroSlide(2)"></button>
        <button class="hero-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white/70 transition-all duration-300" onclick="currentHeroSlide(3)"></button>
        <button class="hero-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white/70 transition-all duration-300" onclick="currentHeroSlide(4)"></button>
    </div>
</section>