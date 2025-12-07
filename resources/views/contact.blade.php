@extends('layouts.app')

@section('title', 'Kontak Kami - Halo Emas')

@section('meta_description', 'Hubungi tim Halo Emas untuk informasi lebih lanjut tentang jual beli emas, harga emas terbaru, dan layanan kami.')

@section('meta_keywords', 'kontak halo emas, hubungi halo emas, customer service halo emas, alamat halo emas')

@section('content')
    <!-- Contact Section -->
    <section class="w-full md:w-[90%] max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 mt-24">
        <!-- Label -->
        <div class="flex justify-center mb-6">
            <span class="px-4 py-2 text-md font-semibold w-fit bg-secondary border border-secondary text-black">
                Hubungi Kami
            </span>
        </div>

        <!-- Title -->
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-center italic mb-6">
            Kontak Kami
        </h1>

        <!-- Description -->
        <p class="text-md md:text-lg text-gray-700 text-center max-w-3xl mx-auto mb-12">
            Kalau kamu butuh info lebih lanjut, jangan ragu untuk menghubungi kontak di bawah ini atau datang langsung ke kantor pusat kami. Kami siap membantu!
        </p>

        <!-- Contact Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">

            <!-- Email Card -->
            <a href="mailto:support@haloemas.id"
            class="block bg-white border border-gray-200 p-6 shadow-sm hover:shadow-md transition rounded-md">
                <div class="w-12 h-12 bg-[#FBE68E33] -rotate-6 rounded-md flex items-center justify-center mb-4">
                    <img src="{{ asset('images/icons/at.svg') }}" alt="Email Icon" class="rotate-6 w-6 h-6">
                </div>

                <h3 class="text-lg font-semibold text-gray-900 mb-2">Email</h3>

                <p class="text-gray-600 text-md">
                    support@haloemas.id
                </p>
            </a>


            <!-- Address Card -->
            <a href="https://maps.google.com/?q=Jl.+MH.+Thamrin+no+33,+Cikokol,+Kota+Tangerang"
            target="_blank"
            class="block bg-white border border-gray-200 p-6 shadow-sm hover:shadow-md transition rounded-md">
                <div class="w-12 h-12 bg-[#FBE68E33] -rotate-6 rounded-md flex items-center justify-center mb-4">
                    <img src="{{ asset('images/icons/location.svg') }}" alt="Location Icon" class="rotate-6 w-6 h-6">
                </div>

                <h3 class="text-lg font-semibold text-gray-900 mb-2">Alamat Pusat</h3>

                <p class="text-gray-600 text-md whitespace-nowrap truncate">
                    Jl. MH. Thamrin no 33, Cikokol, Kota Tangerang (Sebrang RS Primaya)
                </p>
            </a>


            <!-- WhatsApp Card -->
            <a href="https://wa.me/628176789188"
            target="_blank"
            class="block bg-white border border-gray-200 p-6 shadow-sm hover:shadow-md transition rounded-md">
                <div class="w-12 h-12 bg-[#FBE68E33] -rotate-6 rounded-md flex items-center justify-center mb-4">
                    <img src="{{ asset('images/icons/whatsapp.svg') }}" alt="WhatsApp Icon" class="rotate-6 w-6 h-6">
                </div>

                <h3 class="text-lg font-semibold text-gray-900 mb-2">WhatsApp</h3>

                <p class="text-gray-600 text-md">
                    +62 817 6789 188
                </p>
            </a>
        </div>

    </section>
@endsection

