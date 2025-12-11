@extends('layouts.app')

@section('title', 'Haloemas.id - Terima Jual Emas Harga Terbaik')

@section('meta_description',
    'Cek harga emas hari ini secara real-time. Temukan toko emas terpercaya dan dapatkan
    informasi lengkap seputar investasi emas di Halo Emas.')

@section('meta_keywords',
    'harga emas hari ini, harga emas 24 karat, harga logam mulia, toko emas terdekat, investasi
    emas, harga emas antam, jual beli emas')
@section('og_image', asset('img_preview_share.jpeg'))
@section('og_description','Platform terpercaya untuk terima emas dengan harga terbaik. Cek harga jual terbaru dan dan temukan lokasi terdekat kami.')
@section('twitter_image', asset('img_preview_share.jpeg'))
@section('twitter_description','Platform terpercaya untuk terima emas dengan harga terbaik. Cek harga jual terbaru dan dan temukan lokasi terdekat kami.')
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
            <h1 class="text-xl md:text-2xl lg:text-3xl font-bold">Kenapa Harus Haloemas.id?</h1>
            <p class="text-md md:text-md lg:text-xl font-normal">Kami pengen bikin pengalaman beli emas jadi gampang,
                aman,
                dan bikin kamu nyaman.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-4 lg:mt-8">
            <!-- Card -->
            <div class="flex flex-col gap-4 items-center">
                <div
                    class="w-12 h-12 flex justify-center items-center -rotate-6 bg-gradient-to-t from-[#FBE68E33] to-[#FBE68E1A]">
                    <img class="rotate-6" src="{{ asset('images/icons/calculator-money.svg') }}" alt="Harga Beli Emas Lebih Tinggi">
                </div>
                <div class="text-center w-[240px] flex flex-col gap-1">
                    <h3 class="text-xl font-bold">Harga Beli Emas Lebih Tinggi</h3>
                    <span class="text-md font-normal">Kami menghadirkan nilai terbaik agar setiap gram emas Anda dihargai maksimal.</span>
                </div>
            </div>
            <!-- Card -->
            <div class="flex flex-col gap-4 items-center">
                <div
                    class="w-12 h-12 flex justify-center items-center rotate-6 bg-gradient-to-t from-[#FBE68E33] to-[#FBE68E1A]">
                    <img class="-rotate-6" src="{{ asset('images/icons/seller-store.svg') }}" alt="Penilaian Profesional & Akurat">
                </div>
                <div class="text-center w-[240px] flex flex-col gap-1">
                    <h3 class="text-xl font-semibold">Penilaian Profesional & Akurat</h3>
                    <span class="text-md font-normal">Proses cek kadar dan berat dilakukan dengan alat canggih modern yang presisi.</span>
                </div>
            </div>
            <!-- Card -->
            <div class="flex flex-col gap-4 items-center">
                <div
                    class="w-12 h-12 flex justify-center items-center -rotate-6 bg-gradient-to-t from-[#FBE68E33] to-[#FBE68E1A]">
                    <img class="rotate-6" src="{{ asset('images/icons/shield-check.svg') }}" alt="Transparansi Tanpa Kompromi">
                </div>
                <div class="text-center w-[240px] flex flex-col gap-1">
                    <h3 class="text-xl font-semibold">Transparansi Tanpa Kompromi</h3>
                    <span class="text-md font-normal">Setiap langkah penilaian ditunjukkan di depan Anda — jelas, jujur, dan tanpa biaya tersembunyi.</span>
                </div>
            </div>
            <!-- Card -->
            <div class="flex flex-col gap-4 items-center">
                <div
                    class="w-12 h-12 flex justify-center items-center rotate-6 bg-gradient-to-t from-[#FBE68E33] to-[#FBE68E1A]">
                    <img class="-rotate-6" src="{{ asset('images/icons/time.svg') }}" alt="Proses Cepat & Sangat Praktis">
                </div>
                <div class="text-center w-[240px] flex flex-col gap-1">
                    <h3 class="text-xl font-bold">Proses Cepat & Sangat Praktis</h3>
                    <span class="text-md font-normal">Datang – cek – langsung cair tanpa ribet tanpa potongan. Cocok buat Anda yang punya waktu terbatas.</span>
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
            <h2 class="text-xl md:text-2xl lg:text-3xl font-bold">Harga Jual Emas Hari Ini</h2>
            <p class="text-md md:text-md lg:text-xl font-normal max-w-[644px]">Pantau harga emas terbaru setiap hari.
                Transparan, gampang dicek, dan selalu update biar kamu lebih yakin sebelum jual.</p>
        </div>

        <div class="w-full flex flex-col gap-4">
            <div>
                @include('components.gold-table', [
                    'golds' => $golds,
                    'lastUpdate' => $goldsLastUpdate,
                ])
            </div>
            <div class="flex flex-col gap-1 w-full">
                <div class="flex flex-col lg:flex-row justify-between mb-4">
                    <h2 class="text-xl font-bold italic">Harga Logam Mulia</h2>
                    <p class="text-md font-normal italic">
                        Terakhir Update:
                        @if (isset($metalsLastUpdate))
                            {{ \Carbon\Carbon::parse($metalsLastUpdate)->locale('id')->isoFormat('DD MMMM YYYY • HH:mm') }}
                        @else
                            -
                        @endif
                    </p>
                </div>
                <div class="overflow-x-auto shadow max-h-[300px] overflow-y-auto pe-2">
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
                                        <td class="py-3 px-4">{{ $metal['name'] }}</td>
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
                Kunjungi <span class="italic font-bold">Outlet</span> Haloemas.id
            </h2>
            <p class="text-gray-600 mt-2">
                Ingin jual emas dengan cepat, aman, dan nilai terbaik?
                Datang langsung ke outlet haloemas.id dan rasakan pengalaman transaksi emas yang jujur, transparan, dan tanpa ribet.
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
                            @php
                                $whatsappNumber = $store['whatsapp'] ?? ($store['phone'] ?? null);
                                $sanitizedWhatsApp = $whatsappNumber ? preg_replace('/\D+/', '', $whatsappNumber) : null;
                                // Format: +62 xxx xxxx xxxx
                                if ($sanitizedWhatsApp) {
                                    // Jika sudah ada 62 di depan, hapus
                                    if (substr($sanitizedWhatsApp, 0, 2) == '62') {
                                        $sanitizedWhatsApp = substr($sanitizedWhatsApp, 2);
                                    }
                                    // Format menjadi +62 xxx xxxx xxxx
                                    if (strlen($sanitizedWhatsApp) >= 9) {
                                        $formattedWhatsApp = '+62' . substr($sanitizedWhatsApp, 0, 3) . substr($sanitizedWhatsApp, 3, 4) . substr($sanitizedWhatsApp, 7);
                                        $sanitizedWhatsApp = '62'. $sanitizedWhatsApp; // Untuk link wa.me
                                    } else {
                                        $formattedWhatsApp = '+' . $sanitizedWhatsApp;
                                    }
                                } else {
                                    $formattedWhatsApp = null;
                                }
                            @endphp
                            @if ($formattedWhatsApp)
                                <div class="flex items-center gap-2 mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#25D366" class="w-5 h-5">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                    </svg>
                                    <a href="https://wa.me/{{ $formattedWhatsApp }}" target="_blank" class="text-gray-600 text-md hover:underline">{{ $formattedWhatsApp }}</a>
                                </div>
                            @endif
                            <p class="text-gray-600 text-md mt-1">
                                {{ $store['address'] }}
                            </p>
                            <div class="mt-4 flex items-center gap-4">
                            @if (isset($store['link_address']) && $store['link_address'])
                                <a href="{{ $store['link_address'] }}" target="_blank"
                                        class="text-gray-600 text-md font-medium hover:underline">
                                    Lihat Maps ↗
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
        <h2 class="text-2xl md:text-3xl font-bold">
            Apa <span class="italic">Kata Mereka?</span>
        </h2>
        <p class="text-gray-600 mt-2">
            Dari pelayanan ramah sampai harga yang transparan, banyak yang udah ngerasain pengalaman belanja emas bareng
            Halo Emas.
            Sekarang giliran kamu buat buktiin sendiri.
        </p>
    </div>

        @if (isset($testimonies) && count($testimonies) > 0)
            <div x-data="{
                testimonies: @js($testimonies ?? []),
                scrollContainer: null,
                canScrollLeft: false,
                canScrollRight: true,
                activeDot: 0,
                cardWidth: 320,
                gap: 24,
                init() {
                    this.$nextTick(() => {
                        this.scrollContainer = this.$refs.scrollContainer;
                        this.updateCardWidth();
                        // Delay sedikit untuk memastikan container sudah ter-render
                        setTimeout(() => {
                            this.updateScrollButtons();
                            this.updateActiveDot();
                        }, 100);
                    });
                    window.addEventListener('resize', () => {
                        this.updateCardWidth();
                        setTimeout(() => {
                            this.updateScrollButtons();
                            this.updateActiveDot();
                        }, 100);
                    });
                },
                updateCardWidth() {
                    if (window.innerWidth < 640) {
                        this.cardWidth = 280;
                    } else {
                        this.cardWidth = 320;
                    }
                },
                get itemsPerView() {
                    if (!this.scrollContainer) return 1;
                    const containerWidth = this.scrollContainer.clientWidth;
                    const cardWidthWithGap = this.cardWidth + this.gap;
                    const calculated = containerWidth / cardWidthWithGap;
                    return Math.max(1, Math.floor(calculated));
                },
                get totalDots() {
                    if (!this.scrollContainer || this.testimonies.length === 0) return 1;
                    const itemsPerView = this.itemsPerView || 1;
                    const total = Math.ceil(this.testimonies.length / itemsPerView);
                    return Math.max(1, total);
                },
                updateScrollButtons() {
                    if (!this.scrollContainer) return;
                    this.canScrollLeft = this.scrollContainer.scrollLeft > 0;
                    this.canScrollRight = this.scrollContainer.scrollLeft < (this.scrollContainer.scrollWidth - this.scrollContainer.clientWidth - 10);
                },
                updateActiveDot() {
                    if (!this.scrollContainer) return;
                    const scrollLeft = this.scrollContainer.scrollLeft;
                    const cardWidthWithGap = this.cardWidth + this.gap;
                    const itemsPerView = this.itemsPerView || 1;
                    const pageWidth = cardWidthWithGap * itemsPerView;
                    
                    // Hitung dot index berdasarkan posisi scroll dengan threshold
                    // Gunakan Math.floor untuk mendapatkan page yang sedang terlihat
                    let currentPage = Math.floor((scrollLeft + (pageWidth / 2)) / pageWidth);
                    
                    // Pastikan tidak melebihi total dots
                    currentPage = Math.max(0, Math.min(currentPage, this.totalDots - 1));
                    this.activeDot = currentPage;
                },
                scrollLeft() {
                    if (this.scrollContainer) {
                        const itemsPerView = this.itemsPerView || 1;
                        const cardWidthWithGap = this.cardWidth + this.gap;
                        const pageWidth = cardWidthWithGap * itemsPerView;
                        this.scrollContainer.scrollBy({ left: -pageWidth, behavior: 'smooth' });
                        setTimeout(() => {
                            this.updateScrollButtons();
                            this.updateActiveDot();
                        }, 300);
                    }
                },
                scrollRight() {
                    if (this.scrollContainer) {
                        const itemsPerView = this.itemsPerView || 1;
                        const cardWidthWithGap = this.cardWidth + this.gap;
                        const pageWidth = cardWidthWithGap * itemsPerView;
                        this.scrollContainer.scrollBy({ left: pageWidth, behavior: 'smooth' });
                        setTimeout(() => {
                            this.updateScrollButtons();
                            this.updateActiveDot();
                        }, 300);
                    }
                },
                scrollToDot(dotIndex) {
                    if (!this.scrollContainer) return;
                    const itemsPerView = this.itemsPerView || 1;
                    const cardWidthWithGap = this.cardWidth + this.gap;
                    const pageWidth = cardWidthWithGap * itemsPerView;
                    const scrollAmount = pageWidth * dotIndex;
                    this.scrollContainer.scrollTo({ left: scrollAmount, behavior: 'smooth' });
                    setTimeout(() => {
                        this.updateScrollButtons();
                        this.updateActiveDot();
                    }, 300);
                }
            }" class="relative">
                <!-- Scroll Container -->
                <div x-ref="scrollContainer" @scroll="updateScrollButtons(); updateActiveDot();" 
                    class="flex gap-6 overflow-x-auto scrollbar-hide pb-4" 
                    style="scrollbar-width: none; -ms-overflow-style: none;">
                    <template x-for="(testimony, index) in testimonies" :key="index">
                        <div class="flex-shrink-0 w-[280px] sm:w-[320px]">
                            <template x-if="testimony.embed">
                                <div class="testimonial-embed w-full h-[373px] sm:h-[426px] rounded-xl overflow-hidden">
                                    <div x-html="testimony.embed" class="w-full h-full"></div>
                                </div>
                            </template>
                            <template x-if="!testimony.embed">
                            <div x-data="{
                                expanded: false,
                                isLong: testimony.content ? testimony.content.length > 150 : false,
                                    truncated: testimony.content && testimony.content.length > 150 ? testimony.content.substring(0, 150) + '...' : (testimony.content || ''),
                                    full: testimony.content || ''
                                }" class="bg-white rounded-xl p-6 flex flex-col gap-3 h-[373px] sm:h-[426px]">
                                    <p class="text-gray-800 italic leading-relaxed text-xl">
                                        <template x-if="!expanded || !isLong">
                                            <span
                                                x-text="isLong ? '&quot;' + truncated + '&quot;' : '&quot;' + full + '&quot;'"></span>
                                        </template>
                                        <template x-if="expanded && isLong">
                                            <span x-show="expanded && isLong"
                                                x-transition:enter="transition ease-out duration-200"
                                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                                x-text="'&quot;' + full + '&quot;'"></span>
                                        </template>
                                    </p>
                                    <button x-show="isLong" @click="expanded = !expanded"
                                        class="text-yellow-600 hover:text-yellow-700 text-md font-medium transition-colors text-left">
                                        <span x-show="!expanded">Baca selengkapnya</span>
                                        <span x-show="expanded">Sembunyikan</span>
                                    </button>
                                </div>
                            </template>
                            </div>
                        </template>
                    </div>

                <!-- Navigation Buttons -->
                <template x-if="testimonies.length > 1">
                    <div>
                        <button @click="scrollLeft()" x-show="canScrollLeft"
                            class="hidden sm:flex absolute left-0 top-1/2 -translate-y-1/2 bg-white shadow-lg w-10 h-10 rounded-full items-center justify-center hover:bg-gray-50 transition z-10">
                            ←
                        </button>
                        <button @click="scrollRight()" x-show="canScrollRight"
                            class="hidden sm:flex absolute right-0 top-1/2 -translate-y-1/2 bg-white shadow-lg w-10 h-10 rounded-full items-center justify-center hover:bg-gray-50 transition z-10">
                            →
                        </button>
                    </div>
                </template>

                <!-- Dots Navigation -->
                <template x-if="testimonies.length > 1 && totalDots > 1">
                    <div class="flex justify-center mt-6 space-x-2">
                        <template x-for="(dot, index) in Array(totalDots).fill(0)" :key="index">
                            <button @click="scrollToDot(index)"
                                :class="{
                                    'bg-black w-8': activeDot === index,
                                    'bg-gray-300 w-3': activeDot !== index
                                }"
                                class="h-2 rounded-full transition-all duration-300 hover:bg-gray-400"></button>
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
        <h2 class="text-2xl md:text-3xl font-bold">
            Ngobrolin Emas di <span class="italic font-bold">Blog</span>
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
