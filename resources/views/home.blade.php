@extends('layouts.app')

@section('title', 'Halo Emas - Investasi Emas Terpercaya')

@section('content')
<!-- Hero Slideshow Section -->
@include('components.hero')

<!-- About Section -->
<section id="about" class="flex flex-col items-center justify-center gap-4 px-4 md:px-0 py-10">
    <div class="text-center lg:w-[560px] flex flex-col gap-1">
        <h1 class="text-xl md:text-2xl lg:text-3xl font-semibold">Kenapa Harus Haloemas.id?</h1>
        <p class="text-sm md:text-md lg:text-base font-normal">Kami pengen bikin pengalaman beli emas jadi gampang, aman, dan bikin kamu nyaman.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-4 lg:mt-8">
        <!-- Card -->
        <div class="flex flex-col gap-4 items-center">
            <div class="w-12 h-12 flex justify-center items-center -rotate-6 bg-gradient-to-t from-[#FBE68E33] to-[#FBE68E1A]">
                <img class="rotate-6" src="{{ asset('images/icons/calculator-money.svg') }}" alt="">
            </div>
            <div class="text-center w-[240px] flex flex-col gap-1">
                <h1 class="text-base font-semibold">Harga Selalu Update</h1>
                <span class="text-sm font-normal">Biar kamu nggak ketinggalan info harga terbaru.</span>
            </div>
        </div>
        <!-- Card -->
        <div class="flex flex-col gap-4 items-center">
            <div class="w-12 h-12 flex justify-center items-center rotate-6 bg-gradient-to-t from-[#FBE68E33] to-[#FBE68E1A]">
                <img class="-rotate-6" src="{{ asset('images/icons/seller-store.svg') }}" alt="">
            </div>
            <div class="text-center w-[240px] flex flex-col gap-1">
                <h1 class="text-base font-semibold">Toko Terpercaya</h1>
                <span class="text-sm font-normal">Semua toko partner udah terkurasi, jadi kamu bisa belanja dengan tenang.</span>
            </div>
        </div>
        <!-- Card -->
        <div class="flex flex-col gap-4 items-center">
            <div class="w-12 h-12 flex justify-center items-center -rotate-6 bg-gradient-to-t from-[#FBE68E33] to-[#FBE68E1A]">
                <img class="rotate-6" src="{{ asset('images/icons/snap.svg') }}" alt="">
            </div>
            <div class="text-center w-[240px] flex flex-col gap-1">
                <h1 class="text-base font-semibold">Mudah Diakses</h1>
                <span class="text-sm font-normal">Cek harga, cari toko, atau baca tips emas kapan aja, di mana aja.</span>
            </div>
        </div>
        <!-- Card -->
        <div class="flex flex-col gap-4 items-center">
            <div class="w-12 h-12 flex justify-center items-center rotate-6 bg-gradient-to-t from-[#FBE68E33] to-[#FBE68E1A]">
                <img class="-rotate-6" src="{{ asset('images/icons/shield-check.svg') }}" alt="">
            </div>
            <div class="text-center w-[240px] flex flex-col gap-1">
                <h1 class="text-base font-semibold">Aman & Transparan</h1>
                <span class="text-sm font-normal">Kami jaga kepercayaan kamu dengan sistem yang jelas dan terpercaya.</span>
            </div>
        </div>
    </div>
</section>

<!-- Harga Emas Section -->
<section id="harga-emas" class="flex flex-col items-center justify-center gap-4 px-4 md:px-0 mt-32">
    <div class="text-centerlg:w-[560px] justify-center items-center flex flex-col gap-3 text-center">
        <span class="px-4 py-2 text-sm font-semibold w-fit bg-[#FEF9E4] border border-[#FBE68E]">17 Agustus 2025</span>
        <h1 class="text-xl md:text-2xl lg:text-3xl font-semibold">Harga Jual Emas Hari Ini</h1>
        <p class="text-md md:text-md lg:text-base font-normal max-w-[644px]">Pantau harga emas terbaru setiap hari. Transparan, gampang dicek, dan selalu update biar kamu lebih yakin sebelum jual.</p>
    </div>

    <div class="max-w-6xl w-full flex flex-col gap-2 border p-5">
        <div class="">
            <h1 class="text-base font-semibold italic">Harga Emas Murni (24K)</h1>
            <h1 class="text-xl font-semibold">Rp 1.650.000</h1>
            <p class="text-sm font-normal">Per gram <span class="font-semibold">+5%</span></p>
        </div>
        @include('components.gold-chart')

        @include('components.gold-table')
    </div>
</section>

<section class="flex flex-col items-center justify-center gap-4 px-4 md:px-0 mt-5 mb-32">
    <div class="flex flex-col gap-1 w-full px-4 lg:px-0 max-w-6xl">
		<div class="flex flex-col lg:flex-row justify-between mb-4">
            <h1 class="text-xl font-semibold italic">Harga Logam Mulia</h1>
            <p class="text-sm font-normal italic">Terakhir Update: 26 Agustus 2025 • 17:01</p>
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
                <tr>
                    <td class="py-3 px-4">Emas LM Antam Redmark 24K</td>
                    <td class="py-3 px-4">Rp 1.650.000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</section>

<!-- Toko kami section -->
<section id="toko-kami" class="max-w-6xl mx-auto flex flex-col items-center justify-center gap-6 px-4">
  <!-- Judul dan deskripsi -->
  <div class="max-w-6xl mx-auto flex flex-col items-start justify-start gap-2">
    <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold">
      Jelajahi <span class="italic font-medium">Toko Emas</span> Pilihan di Haloemas.id
    </h1>
    <p class="text-gray-600 mt-2">
      Dari toko lokal sampai brand ternama, semuanya terhubung lewat Haloemas.id. 
      Cari toko terdekat atau favoritmu, dan temukan koleksi emas terbaik dengan mudah.
    </p>
  </div>

  <!-- Grid toko -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6 w-full">
    <!-- Kartu toko 1 -->
    <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
      <img src="{{ asset('images/toko.png') }}" alt="Benua Jaya Gold Curug" class="w-full object-cover">
      <div class="p-4">
        <h2 class="font-semibold text-lg">Benua Jaya Gold Curug</h2>
        <p class="text-gray-600 text-sm mt-1">
          Pasar Curug Blok C1 No 1 & 2, Curug Wetan, Kabupaten Tangerang, Banten 15810
        </p>
        <a href="#" class="text-gray-600 text-sm font-medium mt-2 inline-block hover:underline">
          Lihat Maps ↗
        </a>
      </div>
    </div>

    <!-- Kartu toko 2 -->
    <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
      <img src="{{ asset('images/toko.png') }}" alt="Benua Jaya Gold Curug" class="w-full object-cover">
      <div class="p-4">
        <h2 class="font-semibold text-lg">Benua Jaya Gold Curug</h2>
        <p class="text-gray-600 text-sm mt-1">
          Pasar Curug Blok C1 No 1 & 2, Curug Wetan, Kabupaten Tangerang, Banten 15810
        </p>
        <a href="#" class="text-gray-600 text-sm font-medium mt-2 inline-block hover:underline">
          Lihat Maps ↗
        </a>
      </div>
    </div>
  </div>
</section>


<!-- Testimonial section -->
<section id="testimonial" class="max-w-6xl mx-auto px-4 my-16">
  <div class="mb-10">
    <h2 class="text-2xl md:text-3xl font-semibold">
      Apa <span class="italic">Kata Mereka?</span>
    </h2>
    <p class="text-gray-600 mt-2">
      Dari pelayanan ramah sampai harga yang transparan, banyak yang udah ngerasain pengalaman belanja emas bareng Halo Emas.
      Sekarang giliran kamu buat buktiin sendiri.
    </p>
  </div>

  <!-- Carousel -->
  <div 
    x-data="{
      active: 0,
      testimonials: [
        { id: 1, text: 'Lorem ipsum dolor sit amet consectetur. Enim rhoncus nunc volutpat pellentesque nunc nullam ante. Id egestas erat tortor sit semper sed nullam lectus sed. Id in tortor iaculis sit nibh dis bibendum. Laoreet scelerisque quis dolor egestas ut tincidunt nisl. Ac metus mi sit nisi cursus ornare maecenas tristique.', author: 'Ajis Dzalparo' },
        { id: 2, text: 'Lorem ipsum dolor sit amet consectetur. Enim rhoncus nunc volutpat pellentesque nunc nullam ante. Id egestas erat tortor sit semper sed nullam lectus sed. Id in tortor iaculis sit nibh dis bibendum. Laoreet scelerisque quis dolor egestas ut tincidunt nisl. Ac metus mi sit nisi cursus ornare maecenas tristique.', author: 'Ajis Dzalparo' },
        { id: 3, text: 'Lorem ipsum dolor sit amet consectetur. Enim rhoncus nunc volutpat pellentesque nunc nullam ante. Id egestas erat tortor sit semper sed nullam lectus sed. Id in tortor iaculis sit nibh dis bibendum. Laoreet scelerisque quis dolor egestas ut tincidunt nisl. Ac metus mi sit nisi cursus ornare maecenas tristique.', author: 'Ajis Dzalparo' },
        { id: 4, text: 'Lorem ipsum dolor sit amet consectetur. Enim rhoncus nunc volutpat pellentesque nunc nullam ante. Id egestas erat tortor sit semper sed nullam lectus sed. Id in tortor iaculis sit nibh dis bibendum. Laoreet scelerisque quis dolor egestas ut tincidunt nisl. Ac metus mi sit nisi cursus ornare maecenas tristique.', author: 'Ajis Dzalparo' },
        { id: 5, text: 'Lorem ipsum dolor sit amet consectetur. Enim rhoncus nunc volutpat pellentesque nunc nullam ante. Id egestas erat tortor sit semper sed nullam lectus sed. Id in tortor iaculis sit nibh dis bibendum. Laoreet scelerisque quis dolor egestas ut tincidunt nisl. Ac metus mi sit nisi cursus ornare maecenas tristique.', author: 'Ajis Dzalparo' },
      ],
      next() {
        this.active = (this.active + 1) % this.testimonials.length;
      },
      prev() {
        this.active = (this.active - 1 + this.testimonials.length) % this.testimonials.length;
      }
    }"
    class="relative px-12"
  >
    <!-- Slides Container -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Card 1 -->
      <div class="border border-gray-200 bg-white shadow-sm p-6 rounded-md">
        <p class="text-gray-700 italic leading-relaxed text-sm">
          "Lorem ipsum dolor sit amet consectetur. Enim rhoncus nunc volutpat pellentesque nunc nullam ante. Id egestas erat tortor sit semper sed nullam lectus sed. Id in tortor iaculis sit nibh dis bibendum. Laoreet scelerisque quis dolor egestas ut tincidunt nisl. Ac metus mi sit nisi cursus ornare maecenas tristique."
        </p>
        <p class="text-sm text-gray-500 mt-4 text-right">_Ajis Dzalparo</p>
      </div>

      <!-- Card 2 -->
      <div class="border border-gray-200 bg-white shadow-sm p-6 rounded-md">
        <p class="text-gray-700 italic leading-relaxed text-sm">
          "Lorem ipsum dolor sit amet consectetur. Enim rhoncus nunc volutpat pellentesque nunc nullam ante. Id egestas erat tortor sit semper sed nullam lectus sed. Id in tortor iaculis sit nibh dis bibendum. Laoreet scelerisque quis dolor egestas ut tincidunt nisl. Ac metus mi sit nisi cursus ornare maecenas tristique."
        </p>
        <p class="text-sm text-gray-500 mt-4 text-right">_Ajis Dzalparo</p>
      </div>

      <!-- Card 3 -->
      <div class="border border-gray-200 bg-white shadow-sm p-6 rounded-md">
        <p class="text-gray-700 italic leading-relaxed text-sm">
          "Lorem ipsum dolor sit amet consectetur. Enim rhoncus nunc volutpat pellentesque nunc nullam ante. Id egestas erat tortor sit semper sed nullam lectus sed. Id in tortor iaculis sit nibh dis bibendum. Laoreet scelerisque quis dolor egestas ut tincidunt nisl. Ac metus mi sit nisi cursus ornare maecenas tristique."
        </p>
        <p class="text-sm text-gray-500 mt-4 text-right">_Ajis Dzalparo</p>
      </div>
    </div>

    <!-- Arrows -->
    <button 
      @click="prev()"
      class="absolute left-0 top-1/2 -translate-y-1/2 bg-[#FBE68E] w-10 h-10 rounded-sm hover:bg-yellow-400 transition flex items-center justify-center text-xl"
    >
      ←
    </button>

    <button 
      @click="next()"
      class="absolute right-0 top-1/2 -translate-y-1/2 bg-[#FBE68E] w-10 h-10 rounded-sm hover:bg-yellow-400 transition flex items-center justify-center text-xl"
    >
      →
    </button>

    <!-- Dots -->
    <div class="flex justify-center mt-6 space-x-2">
      <template x-for="(item, index) in testimonials" :key="index">
        <button 
          @click="active = index"
          :class="{'bg-gray-800 w-8': active === index, 'bg-gray-300 w-3': active !== index}"
          class="h-3 rounded-full transition-all"
        ></button>
      </template>
    </div>
  </div>
</section>



@endsection
