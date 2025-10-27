@extends('layouts.app')

@section('title', 'Halo Emas - Cek Harga Emas Hari Ini & Toko Emas Terpercaya')

@section('meta_description', 'Cek harga emas hari ini secara real-time. Temukan toko emas terpercaya dan dapatkan informasi lengkap seputar investasi emas di Halo Emas.')

@section('meta_keywords', 'harga emas hari ini, harga emas 24 karat, harga logam mulia, toko emas terdekat, investasi emas, harga emas antam, jual beli emas')

@push('structured_data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Halo Emas",
  "alternateName": "HaloEmas.id",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('images/logo.svg') }}",
  "description": "Platform terpercaya untuk jual beli emas di Indonesia dengan harga transparan dan toko-toko emas terkurasi.",
  "address": {
    "@type": "PostalAddress",
    "addressCountry": "ID",
    "addressLocality": "Indonesia"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "contactType": "Customer Service",
    "availableLanguage": ["Indonesian"]
  },
  "sameAs": [
    "#",
    "#",
    "#"
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "Halo Emas",
  "url": "{{ url('/') }}",
  "description": "Platform jual beli emas terpercaya di Indonesia",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "{{ url('/') }}?q={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>

@if(isset($stores) && count($stores) > 0)
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "itemListElement": [
    @foreach($stores as $index => $store)
    {
      "@type": "ListItem",
      "position": {{ $index + 1 }},
      "item": {
        "@type": "LocalBusiness",
        "name": "{{ $store['name'] }}",
        "image": "{{ $store['image'] }}",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "{{ $store['address'] }}",
          "addressCountry": "ID"
        }
        @if(isset($store['link_address']) && $store['link_address'])
        ,"hasMap": "{{ $store['link_address'] }}"
        @endif
      }
    }{{ $loop->last ? '' : ',' }}
    @endforeach
  ]
}
</script>
@endif
@endpush

@section('content')
    <!-- Hero Slideshow Section -->
    @include('components.hero', ['banners' => $banners])

    <!-- About Section -->
    <section id="about" class="w-full md:w-[90%] max-w-6xl mx-auto flex flex-col items-center justify-center gap-4 px-4 sm:px-6 lg:px-8 py-10">
        <div class="text-center lg:w-[560px] flex flex-col gap-1">
            <h1 class="text-xl md:text-2xl lg:text-3xl font-semibold">Kenapa Harus Haloemas.id?</h1>
            <p class="text-sm md:text-md lg:text-base font-normal">Kami pengen bikin pengalaman beli emas jadi gampang, aman,
                dan bikin kamu nyaman.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-4 lg:mt-8">
            <!-- Card -->
            <div class="flex flex-col gap-4 items-center">
                <div
                    class="w-12 h-12 flex justify-center items-center -rotate-6 bg-gradient-to-t from-[#FBE68E33] to-[#FBE68E1A]">
                    <img class="rotate-6" src="{{ asset('images/icons/calculator-money.svg') }}" alt="Harga Selalu Update">
                </div>
                <div class="text-center w-[240px] flex flex-col gap-1">
                    <h3 class="text-base font-semibold">Harga Selalu Update</h3>
                    <span class="text-sm font-normal">Biar kamu nggak ketinggalan info harga terbaru.</span>
                </div>
            </div>
            <!-- Card -->
            <div class="flex flex-col gap-4 items-center">
                <div
                    class="w-12 h-12 flex justify-center items-center rotate-6 bg-gradient-to-t from-[#FBE68E33] to-[#FBE68E1A]">
                    <img class="-rotate-6" src="{{ asset('images/icons/seller-store.svg') }}" alt="Toko Terpercaya">
                </div>
                <div class="text-center w-[240px] flex flex-col gap-1">
                    <h3 class="text-base font-semibold">Toko Terpercaya</h3>
                    <span class="text-sm font-normal">Semua toko partner udah terkurasi, jadi kamu bisa belanja dengan
                        tenang.</span>
                </div>
            </div>
            <!-- Card -->
            <div class="flex flex-col gap-4 items-center">
                <div
                    class="w-12 h-12 flex justify-center items-center -rotate-6 bg-gradient-to-t from-[#FBE68E33] to-[#FBE68E1A]">
                    <img class="rotate-6" src="{{ asset('images/icons/snap.svg') }}" alt="Mudah Diakses">
                </div>
                <div class="text-center w-[240px] flex flex-col gap-1">
                    <h3 class="text-base font-semibold">Mudah Diakses</h3>
                    <span class="text-sm font-normal">Cek harga, cari toko, atau baca tips emas kapan aja, di mana
                        aja.</span>
                </div>
            </div>
            <!-- Card -->
            <div class="flex flex-col gap-4 items-center">
                <div
                    class="w-12 h-12 flex justify-center items-center rotate-6 bg-gradient-to-t from-[#FBE68E33] to-[#FBE68E1A]">
                    <img class="-rotate-6" src="{{ asset('images/icons/shield-check.svg') }}" alt="Aman dan Transparan">
                </div>
                <div class="text-center w-[240px] flex flex-col gap-1">
                    <h3 class="text-base font-semibold">Aman & Transparan</h3>
                    <span class="text-sm font-normal">Kami jaga kepercayaan kamu dengan sistem yang jelas dan
                        terpercaya.</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Harga Emas Section -->
    <section id="harga-emas" class="w-full md:w-[90%] max-w-6xl mx-auto flex flex-col items-center justify-center gap-4 px-4 sm:px-6 lg:px-8 mt-32">
        <div class="text-centerlg:w-[560px] justify-center items-center flex flex-col gap-3 text-center">
            <span class="px-4 py-2 text-sm font-semibold w-fit bg-[#FEF9E4] border border-[#FBE68E]">
                {{ \Carbon\Carbon::now()->locale('id')->isoFormat('DD MMMM YYYY') }}
            </span>
            <h2 class="text-xl md:text-2xl lg:text-3xl font-semibold">Harga Jual Emas Hari Ini</h2>
            <p class="text-md md:text-md lg:text-base font-normal max-w-[644px]">Pantau harga emas terbaru setiap hari.
                Transparan, gampang dicek, dan selalu update biar kamu lebih yakin sebelum jual.</p>
        </div>

        <div class="w-full flex flex-col gap-2 border p-5">
            <div class="">
                <h3 class="text-base font-semibold italic">Harga Emas Murni (24K)</h3>
                <p class="text-xl font-semibold">Rp {{ number_format($currentPrice ?? 0, 0, ',', '.') }}</p>
                <p class="text-sm font-normal">Per gram
                    <span class="font-semibold {{ ($pricePercent ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' }}">
                        {{ ($pricePercent ?? 0) >= 0 ? '+' : '' }}{{ number_format($pricePercent ?? 0, 2) }}%
                    </span>
                </p>
            </div>
            @include('components.gold-chart', ['charts' => $charts])

            @include('components.gold-table', ['golds' => $golds, 'lastUpdate' => $goldsLastUpdate])
        </div>
    </section>

    <section class="w-full md:w-[90%] max-w-6xl mx-auto flex flex-col items-center justify-center gap-4 px-4 sm:px-6 lg:px-8 mt-5 mb-32">
        <div class="flex flex-col gap-1 w-full">
            <div class="flex flex-col lg:flex-row justify-between mb-4">
                <h2 class="text-xl font-semibold italic">Harga Logam Mulia</h2>
                <p class="text-sm font-normal italic">
                    Terakhir Update:
                    @if (isset($metalsLastUpdate))
                        {{ \Carbon\Carbon::parse($metalsLastUpdate)->locale('id')->isoFormat('DD MMMM YYYY • HH:mm') }}
                    @else
                        -
                    @endif
                </p>
            </div>
            <div class="overflow-x-auto shadow">
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-[#F7F2F6]">
                        <tr class="text-left border-b">
                            <th class="py-3 px-4 font-semibold text-gray-700">Kadar Karat</th>
                            <th class="py-3 px-4 font-semibold text-gray-700">Harga per Gram</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @if (isset($metals) && count($metals) > 0)
                            @foreach ($metals as $metal)
                                <tr>
                                    <td class="py-3 px-4">Emas {{ $metal['name'] }}</td>
                                    <td class="py-3 px-4">Rp {{ number_format($metal['price'], 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2" class="py-3 px-4 text-center text-gray-500">
                                    Data Logam Mulia belum tersedia
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Toko kami section -->
    <section id="toko-kami" class="w-full md:w-[90%] max-w-6xl mx-auto flex flex-col items-center justify-center gap-6 px-4 sm:px-6 lg:px-8">
        <!-- Judul dan deskripsi -->
        <div class="w-full flex flex-col items-start justify-start gap-2">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold">
                Jelajahi <span class="italic font-medium">Toko Emas</span> Pilihan di Haloemas.id
            </h2>
            <p class="text-gray-600 mt-2">
                Dari toko lokal sampai brand ternama, semuanya terhubung lewat Haloemas.id.
                Cari toko terdekat atau favoritmu, dan temukan koleksi emas terbaik dengan mudah.
            </p>
        </div>

        <!-- Grid toko -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6 w-full">
            @if (isset($stores) && count($stores) > 0)
                @foreach ($stores as $store)
                    <!-- Kartu toko -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                        <img src="{{ $store['image'] }}" alt="{{ $store['name'] }}" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h2 class="font-semibold text-lg">{{ $store['name'] }}</h2>
                            <p class="text-gray-600 text-sm mt-1">
                                {{ $store['address'] }}
                            </p>
                            @if (isset($store['link_address']) && $store['link_address'])
                                <a href="{{ $store['link_address'] }}" target="_blank"
                                    class="text-gray-600 text-sm font-medium mt-2 inline-block hover:underline">
                                    Lihat Maps ↗
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <!-- No stores message -->
                <div class="col-span-2 text-center py-12">
                    <p class="text-gray-500 text-lg">Data toko belum tersedia</p>
                </div>
            @endif
        </div>
    </section>


    <!-- Testimonial section -->
    <section id="testimonial" class="w-full md:w-[90%] max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 my-16">
        <div class="mb-10">
            <h2 class="text-2xl md:text-3xl font-semibold">
                Apa <span class="italic">Kata Mereka?</span>
            </h2>
            <p class="text-gray-600 mt-2">
                Dari pelayanan ramah sampai harga yang transparan, banyak yang udah ngerasain pengalaman belanja emas bareng
                Halo Emas.
                Sekarang giliran kamu buat buktiin sendiri.
            </p>
        </div>

        @if (isset($testimonies) && count($testimonies) > 0)
            @php
                $itemsPerPage = 3;
                $totalPages = ceil(count($testimonies) / $itemsPerPage);
                $testimonyChunks = array_chunk($testimonies, $itemsPerPage);
            @endphp

            <!-- Carousel -->
            <div x-data="{
                active: 0,
                totalPages: {{ $totalPages }},
                next() {
                    this.active = (this.active + 1) % this.totalPages;
                },
                prev() {
                    this.active = (this.active - 1 + this.totalPages) % this.totalPages;
                }
            }" class="relative px-12">

                @foreach ($testimonyChunks as $pageIndex => $chunk)
                    <!-- Slides Container Page {{ $pageIndex + 1 }} -->
                    <div x-show="active === {{ $pageIndex }}" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 min-h-[280px]">
                        @foreach ($chunk as $testimony)
                            <div
                                class="border border-gray-300 bg-white shadow-sm p-8 rounded-md flex flex-col justify-between">
                                <p class="text-gray-800 italic leading-relaxed text-base mb-4">
                                    "{{ $testimony['content'] }}"
                                </p>
                                <p class="text-sm text-gray-600 font-medium">{{ $testimony['name'] }}</p>
                            </div>
                        @endforeach
                    </div>
                @endforeach

                <!-- Arrows -->
                @if ($totalPages > 1)
                    <button @click="prev()"
                        class="absolute left-0 top-1/2 -translate-y-1/2 bg-[#FBE68E] w-10 h-10 rounded-sm hover:bg-yellow-400 transition flex items-center justify-center text-xl">
                        ←
                    </button>

                    <button @click="next()"
                        class="absolute right-0 top-1/2 -translate-y-1/2 bg-[#FBE68E] w-10 h-10 rounded-sm hover:bg-yellow-400 transition flex items-center justify-center text-xl">
                        →
                    </button>

                    <!-- Dots -->
                    <div class="flex justify-center mt-8 space-x-2">
                        @for ($i = 0; $i < $totalPages; $i++)
                            <button @click="active = {{ $i }}"
                                :class="{
                                    'bg-black w-8': active === {{ $i }},
                                    'bg-gray-400 w-3': active !==
                                        {{ $i }}
                                }"
                                class="h-2 transition-all duration-300"></button>
                        @endfor
                    </div>
                @endif
            </div>
        @else
            <!-- No testimonies message -->
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">Belum ada testimoni</p>
            </div>
        @endif
    </section>


    <section id="blog" class="w-full md:w-[90%] max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 my-16 mt-32">
        <div class="flex flex-col gap-2 justify-center items-center text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-semibold">
                Ngobrolin Emas di <span class="italic font-normal">Blog</span>
            </h2>
            <p class="text-gray-600">
                Temukan cerita, tips, dan info menarik tentang dunia emas. Belajar jadi lebih santai dan asik.
            </p>
        </div>

        @if (isset($blogs) && count($blogs) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full">
                @foreach ($blogs as $blog)
                    <!-- Blog Card -->
                    <a href="{{ route('blog.show', $blog['id']) }}"
                        class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300 block">
                        <div class="relative">
                            @if(isset($blog['thumbnail']) && $blog['thumbnail'])
                                <img src="{{ $blog['thumbnail'] }}"
                                    alt="{{ $blog['title'] }}" class="w-full h-56 object-cover">
                            @else
                                <div class="w-full h-56 bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400">No Image</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <span
                                class="inline-block px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full mb-3">
                                {{ $blog['category'] ?? 'Berita Emas' }}
                            </span>
                            <p class="text-xs text-gray-500 mb-2">
                                {{ \Carbon\Carbon::parse($blog['date'])->locale('id')->isoFormat('DD MMMM YYYY') }} •
                                Oleh {{ $blog['user_created_by'] ?? 'Admin' }}
                            </p>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2 hover:text-yellow-600 transition-colors">
                                {{ $blog['title'] }}
                            </h3>
                            <p class="text-sm text-gray-600 line-clamp-3">
                                {{ Str::limit($blog['title'], 120) }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <!-- No blogs message -->
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">Belum ada artikel blog</p>
            </div>
        @endif

        <!-- Load More Button -->
        @if (isset($blogs) && count($blogs) >= 3)
            <div class="flex justify-center mt-10">
                <a href="#"
                    class="px-8 py-3 border-2 border-gray-300 text-gray-700 font-medium rounded-md hover:bg-gray-50 transition-colors duration-300 flex items-center gap-2">
                    Muat Lebih Banyak
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>
            </div>
        @endif
    </section>



@endsection
