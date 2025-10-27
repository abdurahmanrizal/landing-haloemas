<header class="fixed top-2 sm:top-4 left-0 right-0 z-50">
    <div class="w-full md:w-[90%] max-w-6xl mx-auto sm:px-6 lg:px-8">
        <nav class="bg-primary shadow-lg rounded-md border border-secondary h-14 sm:h-16 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-full">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.svg') }}" alt="Halo Emas Logo" class="w-5 h-5 sm:w-6 sm:h-6 object-cover">
                    <span class="text-sm sm:text-base lg:text-lg font-bold text-white font-poppins">HALOEMAS.ID</span>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-6 xl:space-x-8">
                    <a href="{{ route('home') }}#hero" class="text-white hover:text-secondary transition-colors duration-200 font-normal text-sm xl:text-base">Home</a>
                    <a href="{{ route('home') }}#harga-emas" class="text-white hover:text-secondary transition-colors duration-200 font-normal text-sm xl:text-base">Harga Emas</a>
                    <a href="{{ route('home') }}#toko-kami" class="text-white hover:text-secondary transition-colors duration-200 font-normal text-sm xl:text-base">Toko Kami</a>
                    <a href="{{ route('home') }}#testimonial" class="text-white hover:text-secondary transition-colors duration-200 font-normal text-sm xl:text-base">Testimoni</a>
                    <a href="{{ route('home') }}#blog" class="text-white hover:text-secondary transition-colors duration-200 font-normal text-sm xl:text-base">Blog</a>
                </div>
                
                <!-- Desktop CTA Button -->
                <div class="">
                    <a href="{{ route('home') }}#contact" class="bg-secondary hover:bg-yellow-300 text-black px-4 xl:px-6 py-2 font-normal transition-colors duration-200 text-center text-sm xl:text-base">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>
