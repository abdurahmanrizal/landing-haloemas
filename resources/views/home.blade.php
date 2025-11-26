@extends('layouts.app')

@section('title', 'Halo Emas - Cek Harga Emas Hari Ini & Toko Emas Terpercaya')

@section('meta_description',
    'Cek harga emas hari ini secara real-time. Temukan toko emas terpercaya dan dapatkan
    informasi lengkap seputar investasi emas di Halo Emas.')

@section('meta_keywords',
    'harga emas hari ini, harga emas 24 karat, harga logam mulia, toko emas terdekat, investasi
    emas, harga emas antam, jual beli emas')

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

        @if (isset($stores) && count($stores) > 0)
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
    <section id="about"
        class="w-full md:w-[90%] max-w-6xl mx-auto flex flex-col items-center justify-center gap-4 px-4 sm:px-6 lg:px-8 py-10">
        <div class="text-center lg:w-[560px] flex flex-col gap-1">
            <h1 class="text-xl md:text-2xl lg:text-3xl font-semibold">Kenapa Harus Haloemas.id?</h1>
            <p class="text-md md:text-md lg:text-xl font-normal">Kami pengen bikin pengalaman beli emas jadi gampang,
                aman,
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
                    <h3 class="text-xl font-semibold">Harga Selalu Update</h3>
                    <span class="text-md font-normal">Biar kamu nggak ketinggalan info harga terbaru.</span>
                </div>
            </div>
            <!-- Card -->
            <div class="flex flex-col gap-4 items-center">
                <div
                    class="w-12 h-12 flex justify-center items-center rotate-6 bg-gradient-to-t from-[#FBE68E33] to-[#FBE68E1A]">
                    <img class="-rotate-6" src="{{ asset('images/icons/seller-store.svg') }}" alt="Toko Terpercaya">
                </div>
                <div class="text-center w-[240px] flex flex-col gap-1">
                    <h3 class="text-xl font-semibold">Toko Terpercaya</h3>
                    <span class="text-md font-normal">Semua toko partner udah terkurasi, jadi kamu bisa belanja dengan
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
                    <h3 class="text-xl font-semibold">Mudah Diakses</h3>
                    <span class="text-md font-normal">Cek harga, cari toko, atau baca tips emas kapan aja, di mana
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
                    <h3 class="text-xl font-semibold">Aman & Transparan</h3>
                    <span class="text-md font-normal">Kami jaga kepercayaan kamu dengan sistem yang jelas dan
                        terpercaya.</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Harga Emas Section -->
    <section id="harga-emas"
        class="w-full md:w-[90%] max-w-6xl mx-auto flex flex-col items-center justify-center gap-4 px-4 sm:px-6 lg:px-8 mt-32">
        <div class="text-centerlg:w-[560px] justify-center items-center flex flex-col gap-3 text-center">
            <span class="px-4 py-2 text-md font-semibold w-fit bg-[#FEF9E4] border border-[#FBE68E]">
                {{ \Carbon\Carbon::now()->locale('id')->isoFormat('DD MMMM YYYY') }}
            </span>
            <h2 class="text-xl md:text-2xl lg:text-3xl font-semibold">Harga Jual Emas Hari Ini</h2>
            <p class="text-md md:text-md lg:text-xl font-normal max-w-[644px]">Pantau harga emas terbaru setiap hari.
                Transparan, gampang dicek, dan selalu update biar kamu lebih yakin sebelum jual.</p>
        </div>

        <div class="w-full flex flex-col border p-5 gap-4">
            <div>
                @include('components.gold-table', [
                    'golds' => $golds,
                    'lastUpdate' => $goldsLastUpdate,
                ])
            </div>
            <div class="flex flex-col gap-1 w-full">
                <div class="flex flex-col lg:flex-row justify-between mb-4">
                    <h2 class="text-xl font-semibold italic">Harga Logam Mulia</h2>
                    <p class="text-md font-normal italic">
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
        </div>

    </section>

    <section
        class="w-full md:w-[90%] max-w-6xl mx-auto flex flex-col items-center justify-center gap-4 px-4 sm:px-6 lg:px-8 mt-5 mb-32">
    </section>

    <!-- Toko kami section -->
    <section id="toko-kami"
        class="w-full md:w-[90%] max-w-6xl mx-auto flex flex-col items-center justify-center gap-6 px-4 sm:px-6 lg:px-8">
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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6 w-full">
            @if (isset($stores) && count($stores) > 0)
                @foreach ($stores as $store)
                    <!-- Kartu toko -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                        <img src="{{ $store['image'] }}" alt="{{ $store['name'] }}" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h2 class="font-semibold text-lg">{{ $store['name'] }}</h2>
                            <p class="text-gray-600 text-md mt-1">
                                {{ $store['address'] }}
                            </p>
                            @php
                                $whatsappNumber = $store['whatsapp'] ?? ($store['phone'] ?? null);
                                $sanitizedWhatsApp = $whatsappNumber ? preg_replace('/\D+/', '', $whatsappNumber) : null;
                            @endphp
                            <div class="mt-4 flex flex-col sm:flex-row gap-3 w-full">
                                @if (isset($store['link_address']) && $store['link_address'])
                                    <a href="{{ $store['link_address'] }}" target="_blank"
                                        class="flex-1 inline-flex justify-center items-center gap-2 px-4 py-2 text-md font-semibold border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition text-center">
                                        Lihat Maps ↗
                                    </a>
                                @endif
                                @if ($sanitizedWhatsApp)
                                    <a href="https://wa.me/{{ $sanitizedWhatsApp }}" target="_blank"
                                        class="flex-1 inline-flex justify-center items-center gap-2 px-4 py-2 text-md font-semibold bg-green-500 text-white rounded-md hover:bg-green-600 transition text-center">
                                        WhatsApp
                                    </a>
                                @endif
                            </div>
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
            <!-- Carousel -->
            <div x-data="{
                testimonies: @js($testimonies ?? []),
                itemsPerPage: 3,
                active: 0,
                init() {
                    this.updateItemsPerPage();
                    window.addEventListener('resize', () => this.updateItemsPerPage());
                },
                updateItemsPerPage() {
                    const width = window.innerWidth;
                    const oldItemsPerPage = this.itemsPerPage;
                    if (width >= 1024) {
                        this.itemsPerPage = 3; // lg: desktop
                    } else if (width >= 768) {
                        this.itemsPerPage = 2; // md: tablet
                    } else {
                        this.itemsPerPage = 1; // mobile
                    }
                    // Reset to first page if items per page changed
                    if (oldItemsPerPage !== this.itemsPerPage) {
                        this.active = 0;
                    }
                },
                get totalPages() {
                    return Math.ceil(this.testimonies.length / this.itemsPerPage);
                },
                get paginatedTestimonies() {
                    const pages = [];
                    for (let i = 0; i < this.testimonies.length; i += this.itemsPerPage) {
                        pages.push(this.testimonies.slice(i, i + this.itemsPerPage));
                    }
                    return pages;
                },
                next() {
                    this.active = (this.active + 1) % this.totalPages;
                },
                prev() {
                    this.active = (this.active - 1 + this.totalPages) % this.totalPages;
                }
            }" class="relative">

                <template x-for="(page, pageIndex) in paginatedTestimonies" :key="pageIndex">
                    <!-- Slides Container Page -->
                    <div x-show="active === pageIndex" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 min-h-[280px] px-12">
                        <template x-for="(testimony, index) in page" :key="index">
                            <div x-data="{
                                expanded: false,
                                isLong: testimony.content ? testimony.content.length > 150 : false,
                                truncated: testimony.content && testimony.content.length > 150 ? testimony.content.substring(0, 150) + '...' : (testimony.content || '')
                            }"
                                class="border border-gray-300 bg-white shadow-sm p-8 rounded-md flex flex-col justify-between">
                                <div class="mb-4">
                                    <p class="text-gray-800 italic leading-relaxed text-xl">
                                        <template x-if="!expanded || !isLong">
                                            <span
                                                x-text="isLong ? '&quot;' + truncated + '&quot;' : '&quot;' + (testimony.content || '') + '&quot;'"></span>
                                        </template>
                                        <template x-if="expanded && isLong">
                                            <span x-show="expanded && isLong"
                                                x-transition:enter="transition ease-out duration-200"
                                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                                x-text="'&quot;' + (testimony.content || '') + '&quot;'"></span>
                                        </template>
                                    </p>
                                    <button x-show="isLong" @click="expanded = !expanded"
                                        class="text-yellow-600 hover:text-yellow-700 text-md font-medium mt-2 transition-colors">
                                        <span x-show="!expanded">Baca selengkapnya</span>
                                        <span x-show="expanded">Sembunyikan</span>
                                    </button>
                                </div>
                                <p class="text-md text-gray-600 font-medium" x-text="testimony.name || ''"></p>
                            </div>
                        </template>
                    </div>
                </template>

                <!-- Arrows -->
                <template x-if="totalPages > 1">
                    <div>
                        <button @click="prev()"
                            class="flex absolute left-0 top-1/2 -translate-y-1/2 bg-[#FBE68E] w-10 h-10 rounded-sm hover:bg-yellow-400 transition items-center justify-center text-xl">
                            ←
                        </button>

                        <button @click="next()"
                            class="flex absolute right-0 top-1/2 -translate-y-1/2 bg-[#FBE68E] w-10 h-10 rounded-sm hover:bg-yellow-400 transition items-center justify-center text-xl">
                            →
                        </button>
                    </div>
                </template>

                <!-- Dots -->
                <template x-if="totalPages > 1">
                    <div class="flex justify-center mt-8 space-x-2">
                        <template x-for="(page, pageIndex) in paginatedTestimonies" :key="pageIndex">
                            <button @click="active = pageIndex"
                                :class="{
                                    'bg-black w-8': active === pageIndex,
                                    'bg-gray-400 w-3': active !== pageIndex
                                }"
                                class="h-2 transition-all duration-300"></button>
                        </template>
                    </div>
                </template>
            </div>
        @else
            <!-- No testimonies message -->
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">Belum ada testimoni</p>
            </div>
        @endif
    </section>


    <section id="blog" class="w-full md:w-[90%] max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 my-16 mt-32"
        x-data="{
            blogs: @js($blogs ?? []),
            currentPage: {{ isset($blogsMeta) && isset($blogsMeta['current_page']) ? $blogsMeta['current_page'] : 1 }},
            lastPage: {{ isset($blogsMeta) && isset($blogsMeta['last_page']) ? $blogsMeta['last_page'] : 1 }},
            loading: false,
            error: null,
            apiBaseUrl: '{{ env('API_BASE_URL', 'https://pms-testing.infokejadiansemarang.com/api/landing-page') }}',
            formatDate(date) {
                const d = new Date(date);
                const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                return `${d.getDate()} ${months[d.getMonth()]} ${d.getFullYear()}`;
            },
            async loadMore() {
                if (this.loading || this.currentPage >= this.lastPage) return;
        
                this.loading = true;
                this.error = null;
        
                try {
                    const response = await fetch(`${this.apiBaseUrl}/blogs?page=${this.currentPage + 1}&per_page=3`);
                    const data = await response.json();
        
                    if (data.success && data.data) {
                        this.blogs = [...this.blogs, ...data.data];
                        this.currentPage = data.metadata.pagination.current_page;
                        this.lastPage = data.metadata.pagination.last_page;
                    } else {
                        this.error = 'Gagal memuat blog tambahan';
                    }
                } catch (err) {
                    console.error('Error loading blogs:', err);
                    this.error = 'Terjadi kesalahan saat memuat blog';
                } finally {
                    this.loading = false;
                }
            }
        }">
        <div class="flex flex-col gap-2 justify-center items-center text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-semibold">
                Ngobrolin Emas di <span class="italic font-normal">Blog</span>
            </h2>
            <p class="text-gray-600">
                Temukan cerita, tips, dan info menarik tentang dunia emas. Belajar jadi lebih santai dan asik.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full">
            <template x-if="blogs.length > 0">
                <template x-for="blog in blogs" :key="blog.id">
                    <a :href="`/blog/${blog.slug}`"
                        class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300 block">
                        <div class="relative">
                            <template x-if="blog.thumbnail">
                                <img :src="blog.thumbnail" :alt="blog.title" class="w-full h-56 object-cover">
                            </template>
                            <template x-if="!blog.thumbnail">
                                <div class="w-full h-56 bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400">No Image</span>
                                </div>
                            </template>
                        </div>
                        <div class="p-6">
                            <span
                                class="inline-block px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full mb-3">
                                <span x-text="blog.category || 'Berita Emas'"></span>
                            </span>
                            <p class="text-xs text-gray-500 mb-2"
                                x-text="formatDate(blog.date) + ' • Oleh ' + (blog.user_created_by || 'Admin')"></p>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2 hover:text-yellow-600 transition-colors"
                                x-text="blog.title"></h3>
                            <p class="text-md text-gray-600 line-clamp-3"
                                x-text="blog.title.substring(0, 120) + (blog.title.length > 120 ? '...' : '')"></p>
                        </div>
                    </a>
                </template>
            </template>

            <template x-if="blogs.length === 0">
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500 text-lg">Belum ada artikel blog</p>
                </div>
            </template>
        </div>

        <!-- Load More Button -->
        <template x-if="blogs.length > 0">
            <div class="flex flex-col items-center mt-10">
                <template x-if="error">
                    <p class="text-red-600 text-md mb-4" x-text="error"></p>
                </template>
                <button @click="loadMore()" :disabled="loading || currentPage >= lastPage"
                    class="px-8 py-3 border-2 border-gray-300 text-gray-700 font-medium rounded-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-300 flex items-center gap-2">
                    <template x-if="loading">
                        <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </template>
                    <template x-if="!loading">
                        <span x-text="currentPage >= lastPage ? 'Semua Blog Dimuat' : 'Muat Lebih Banyak'"></span>
                    </template>
                    <template x-if="!loading && currentPage < lastPage">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </template>
                </button>
            </div>
        </template>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollToPlugin.min.js"></script>
    <script>
        function goldPriceComponent() {
            return {
                currentPrice: @js($currentPrice ?? 0),
                pricePercent: @js($pricePercent ?? 0),
                // chartHtml: @js(view('components.gold-chart', ['charts' => $charts])->render()),
                timer: null,
                error: null,
                apiBaseUrl: '{{ env('API_BASE_URL', 'https://pms-testing.infokejadiansemarang.com/api/landing-page') }}',

                formatCurrency(n) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        maximumFractionDigits: 0
                    }).format(n || 0);
                },
                async load() {
                    try {
                        const res = await fetch(`${this.apiBaseUrl}/charts`);
                        if (!res.ok) throw new Error('HTTP ' + res.status);
                        const data = await res.json();

                        // handle keys
                        if (data.data.price !== undefined) this.currentPrice = Number(data.data.price);

                        if (data.data.percent !== undefined) this.pricePercent = data.data.percent;

                        // if (data?.data?.chartHTML) {
                        //     // 1) destroy the existing chart instance first
                        //     this.destroyChart();

                        //     // 2) replace the HTML (canvas is recreated)
                        //     this.chartHtml = data.data.chartHTML;

                        //     // 3) after DOM update, (optionally) init if your HTML doesn't auto-init
                        //     this.$nextTick(() => this.initIfNeeded());
                        // }
                        this.error = null; // clear any previous error
                    } catch (e) {
                        this.error = e.message;
                        console.error('Fetch error:', e);
                    }
                },

                start() {
                    // load immediately
                    this.load();
                    // clear existing timer if exists
                    if (this.timer) clearInterval(this.timer);
                    // reload every 60 seconds
                    // this.timer = setInterval(() => this.load(), 60000);
                    this.timer = setInterval(() => this.load(), 10000);
                },

                stop() {
                    if (this.timer) clearInterval(this.timer);
                }
            };
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.gsap && window.ScrollToPlugin) {
                gsap.registerPlugin(ScrollToPlugin);
            }

            const getHeaderOffset = function() {
                const header = document.querySelector('header');
                const base = header ? header.offsetHeight : 0;
                return base + 8;
            };

            const distanceTo = function(el) {
                return Math.abs((el.getBoundingClientRect().top + window.pageYOffset) - window.pageYOffset);
            };

            const computeDuration = function(dist) {
                const pxPerSec = 1200;
                const raw = dist / pxPerSec;
                return Math.min(1.2, Math.max(0.4, raw));
            };

            const links = document.querySelectorAll('a[href*="#"]:not([href="#"])');

            links.forEach(function(link) {
                link.addEventListener('click', function(e) {
                    const url = new URL(this.href, window.location.href);
                    const isSamePage = (url.origin === window.location.origin) && (url.pathname ===
                        window.location.pathname);
                    if (!isSamePage || !url.hash) return;

                    const targetId = url.hash.replace('#', '');
                    const target = document.getElementById(targetId);
                    if (!target) return;

                    e.preventDefault();

                    const dist = distanceTo(target);
                    const duration = computeDuration(dist);

                    gsap.to(window, {
                        duration: duration,
                        scrollTo: {
                            y: target,
                            offsetY: getHeaderOffset(),
                            autoKill: true
                        },
                        ease: 'power3.inOut'
                    });

                    if (history.pushState) {
                        history.pushState(null, '', '#' + targetId);
                    }
                });
            });

            if (location.hash) {
                const target = document.getElementById(location.hash.substring(1));
                if (target) {
                    const dist = distanceTo(target);
                    const duration = computeDuration(dist);
                    setTimeout(function() {
                        gsap.to(window, {
                            duration: duration,
                            scrollTo: {
                                y: target,
                                offsetY: getHeaderOffset(),
                                autoKill: true
                            },
                            ease: 'power3.inOut'
                        });
                    }, 0);
                }
            }
        });
    </script>
@endpush
