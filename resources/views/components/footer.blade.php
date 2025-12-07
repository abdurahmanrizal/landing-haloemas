<footer id="contact" class="bg-primary text-white">
    <div class="w-full md:w-[90%] max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col justify-center items-center gap-2 text-center">
            <h2 class="text-xl md:text-2xl lg:text-3xl font-semibold">Konsultasi Gratis</h2>
            <p class="text-sm md:text-md lg:text-base font-normal">Tinggal hubungi tim Haloemas.id, kami siap bantu jawab pertanyaan kamu.</p>
             <div class="mt-4">
                <a href="{{ route('contact') }}" target="_blank" class="bg-secondary hover:bg-yellow-300 text-black px-4 xl:px-6 py-2 font-normal transition-colors duration-200 text-center text-sm xl:text-base">
                    Hubungi Kami
                </a>
            </div>
        </div>
        
        <!-- Bottom Bar -->
        <div class="border-t border-secondary mt-8 pt-8">
            <div class="flex flex-col gap-7 md:flex-row justify-start md:justify-between items-start md:items-center">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.svg') }}" alt="Halo Emas Logo" class="w-7 h-7 sm:w-6 sm:h-6 object-cover">
                    <span class="text-lg font-bold text-white font-poppins">HALOEMAS.ID</span>
                </div>

                <!-- Menu -->
                <nav class="flex flex-col md:flex-row gap-2 md:gap-4 md:mt-0" aria-label="Footer Navigation">
                    <a href="{{ route('home') }}#harga-emas" class="text-white hover:text-yellow-500 text-sm transition-colors duration-200">Harga Emas</a>
                    <a href="{{ route('home') }}#toko-kami" class="text-white hover:text-yellow-500 text-sm transition-colors duration-200">Toko Kami</a>
                    <a href="{{ route('home') }}#blog" class="text-white hover:text-yellow-500 text-sm transition-colors duration-200">Blog</a>
                </nav>

                <!-- Sosial Media -->
                <div class="flex gap-3 justify-center items-center">
                    <a href="https://www.instagram.com/haloemasid?igsh=MTc0ZXB0eWc4MWhzYQ==" target="_blank" class="h-8 w-8 border border-secondary rounded-sm flex justify-center items-center" aria-label="Instagram"><img src="{{ asset('images/icons/instagram.svg') }}" alt="Instagram Icon"></a>
                    <a href="https://www.tiktok.com/@haloemasid?_t=ZS-90uiCMNYV89&_r=1" target="_blank" class="h-8 w-8 border border-secondary rounded-sm flex justify-center items-center" aria-label="TikTok"><img src="{{ asset('images/icons/tiktok.svg') }}" alt="TikTok Icon"></a>
                    <a href="https://www.youtube.com/@HaloEmas" target="_blank" class="h-8 w-8 border border-secondary rounded-sm flex justify-center items-center" aria-label="YouTube"><img src="{{ asset('images/icons/youtube.svg') }}" alt="YouTube Icon"></a>
                </div>
            </div>
        </div>
    </div>
</footer>

