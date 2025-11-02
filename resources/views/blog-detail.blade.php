@extends('layouts.app')

@section('title', $blog['meta_title'] ?? ($blog['title'] ?? 'Detail Blog - Halo Emas'))

@section('meta_description', $blog['meta_desc'] ?? Str::limit(strip_tags($blog['content'] ?? ''), 160))

@section('meta_keywords',
    'blog emas, artikel emas, tips investasi emas, berita emas, ' .
    ($blog['category'] ??
    'berita
    emas'))

@section('og_type', 'article')
@section('og_url', url()->current())
@section('og_title', $blog['og_title'] ?? ($blog['meta_title'] ?? ($blog['title'] ?? 'Blog Halo Emas')))
@section('og_description', $blog['og_description'] ?? ($blog['meta_desc'] ?? Str::limit(strip_tags($blog['content'] ??
    ''), 160)))
@section('og_image', $blog['og_image'] ?? ($blog['thumbnail'] ?? asset('images/logo.svg')))

@section('twitter_url', url()->current())
@section('twitter_title', $blog['twitter_title'] ?? ($blog['meta_title'] ?? ($blog['title'] ?? 'Blog Halo Emas')))
@section('twitter_description', $blog['twitter_description'] ?? ($blog['meta_desc'] ??
    Str::limit(strip_tags($blog['content'] ?? ''), 160)))
@section('twitter_image', $blog['twitter_image'] ?? ($blog['thumbnail'] ?? asset('images/logo.svg')))

@push('structured_data')
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "{{ $blog['title'] ?? '' }}",
  "description": "{{ $blog['meta_desc'] ?? Str::limit(strip_tags($blog['content'] ?? ''), 160) }}",
  "image": "{{ $blog['thumbnail'] ?? asset('images/logo.svg') }}",
  "datePublished": "{{ isset($blog['date']) ? \Carbon\Carbon::parse($blog['date'])->toIso8601String() : '' }}",
  "dateModified": "{{ isset($blog['date']) ? \Carbon\Carbon::parse($blog['date'])->toIso8601String() : '' }}",
  "author": {
    "@type": "Person",
    "name": "{{ $blog['user_created_by'] ?? 'Admin Halo Emas' }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Halo Emas",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ asset('images/logo.svg') }}"
    }
  },
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ url()->current() }}"
  },
  "articleSection": "{{ $blog['category'] ?? 'Berita Emas' }}",
  "inLanguage": "id-ID"
}
</script>

    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "{{ url('/') }}"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Blog",
      "item": "{{ url('/#blog') }}"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "{{ $blog['title'] ?? 'Detail Blog' }}"
    }
  ]
}
</script>
@endpush

@section('content')
    <div class="w-full md:w-[90%] max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 mt-24">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Featured Image (Paling Atas) -->
                @if (isset($blog['thumbnail']) && $blog['thumbnail'])
                    <div class="mb-8">
                        <img src="{{ $blog['thumbnail'] }}" alt="{{ $blog['title'] }}" class="w-full h-auto">
                    </div>
                @endif

                <!-- Breadcrumb -->
                <div class="mb-6">
                    <span class="inline-block px-3 py-1 text-sm font-medium bg-gray-100 text-gray-700 rounded-full">
                        {{ $blog['category'] ?? 'Berita Emas' }}
                    </span>
                </div>

                <!-- Meta Info -->
                <p class="text-sm text-gray-500 mb-4">
                    {{ \Carbon\Carbon::parse($blog['date'])->locale('id')->isoFormat('DD MMMM YYYY') }} •
                    Oleh {{ $blog['user_created_by'] ?? 'Admin' }}
                </p>

                <!-- Title -->
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    {{ $blog['title'] }}
                </h1>

                <!-- Content -->
                <div class="prose prose-lg max-w-none">
                    {{-- {!! $blog['content'] ?? '<p>Konten tidak tersedia.</p>' !!} --}}
                    <div class="not-prose blog-content">
                        {!! $blog['content'] !!}
                    </div>
                </div>

                <!-- Social Share -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Bagikan Blog</h3>
                    <div class="flex gap-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                            target="_blank" rel="noopener nofollow" class="text-gray-600 hover:text-gray-900"
                            aria-label="Share on Facebook">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog['title']) }}"
                            target="_blank" rel="noopener nofollow" class="text-gray-600 hover:text-gray-900"
                            aria-label="Share on X">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                        <a href="#" onclick="event.preventDefault(); copyPostLink(this, '{{ url()->current() }}')"
                            class="text-gray-600 hover:text-gray-900" aria-label="Share on link">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1" x-data="{
                searchQuery: '',
                blogs: @js($relatedBlogs ?? []),
                loading: false,
                searchBlogs() {
                    if (this.searchQuery.length === 0) {
                        this.blogs = @js($relatedBlogs ?? []);
                        return;
                    }
            
                    if (this.searchQuery.length < 3) {
                        return;
                    }
            
                    this.loading = true;
                    const apiBaseUrl = '{{ env('API_BASE_URL', 'https://pms-testing.infokejadiansemarang.com/api/landing-page') }}';
                    fetch(`${apiBaseUrl}/search-blogs?limit=10&q=${this.searchQuery}`, {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                this.blogs = data.data;
                            }
                            this.loading = false;
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            this.loading = false;
                        });
                },
                formatDate(date) {
                    const d = new Date(date);
                    const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    return `${d.getDate()} ${months[d.getMonth()]} ${d.getFullYear()}`;
                }
            }">
                <!-- Search Box -->
                <div class="mb-6">
                    <div class="relative">
                        <button class="absolute left-3 top-[50%] translate-y-[-50%] text-gray-400">
                            <img src="{{ asset('images/icons/search.svg') }}" alt="Search" class="w-4 h-4">
                        </button>
                        <input type="text" x-model="searchQuery" @input.debounce.500ms="searchBlogs()"
                            placeholder="Cari blog..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>
                </div>

                <!-- Blog Terbaru -->
                <div class="flex flex-col">
                    <h3 class="text-lg font-semibold mb-4">Blog Terbaru</h3>

                    <!-- Loading State -->
                    <div x-show="loading" class="text-center py-8">
                        <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-yellow-600"></div>
                        <p class="text-sm text-gray-500 mt-2">Mencari...</p>
                    </div>

                    <!-- Blog List -->
                    <div x-show="!loading" class="space-y-4">
                        <template x-if="blogs.length > 0">
                            <div>
                                <template x-for="blog in blogs" :key="blog.id">
                                    <a :href="`/blog/${blog.slug}`"
                                        class="block group pb-4 border-b border-gray-200 last:border-b-0 last:pb-0 mt-4">
                                        <p class="text-xs text-gray-500 mb-2"
                                            x-text="`${formatDate(blog.date)} • Oleh ${blog.user_created_by || 'Admin'}`">
                                        </p>
                                        <h4 class="text-sm font-semibold text-gray-900 line-clamp-2 group-hover:text-yellow-600 transition-colors"
                                            x-text="blog.title"></h4>
                                    </a>
                                </template>
                            </div>
                        </template>

                        <template x-if="blogs.length === 0">
                            <p class="text-sm text-gray-500">Tidak ada blog ditemukan</p>
                        </template>
                    </div>
                </div>

                <!-- Tags
                            @if (isset($tags) && count($tags) > 0)
                            <div class="bg-white p-4 rounded-lg border border-gray-200 mt-6">
                                <h3 class="text-lg font-semibold mb-4">Tag</h3>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($tags as $tag)
    <span class="px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded-full">
                                            {{ $tag['name'] }}
                                        </span>
    @endforeach
                                </div>
                            </div>
                            @endif -->
            </div>
        </div>

        <!-- Related Blogs -->
        @if (isset($relatedBlogs) && count($relatedBlogs) > 0)
            <div class="mt-16">
                <h2 class="text-2xl font-semibold mb-6">Blog Terkait</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($relatedBlogs as $related)
                        <a href="{{ route('blog.show', $related['slug']) }}"
                            class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="relative">
                                @if (isset($related['thumbnail']) && $related['thumbnail'])
                                    <img src="{{ $related['thumbnail'] }}" alt="{{ $related['title'] }}"
                                        class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-400">No Image</span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-4">
                                <span
                                    class="inline-block px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full mb-2">
                                    {{ $related['category'] ?? 'Berita Emas' }}
                                </span>
                                <p class="text-xs text-gray-500 mb-2">
                                    {{ \Carbon\Carbon::parse($related['date'])->locale('id')->isoFormat('DD MMMM YYYY') }}
                                    •
                                    Oleh {{ $related['user_created_by'] ?? 'Admin' }}
                                </p>
                                <h3 class="text-base font-semibold text-gray-900 line-clamp-2">
                                    {{ $related['title'] }}
                                </h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        function copyPostLink(btn, url) {
            const flash = (msg = 'Copied!') => {
                const prev = btn.getAttribute('data-prev') ?? btn.textContent;
                btn.setAttribute('data-prev', prev);
                btn.disabled = true;
                // btn.textContent = msg;
                setTimeout(() => {
                    // btn.textContent = btn.getAttribute('data-prev');
                    btn.disabled = false;
                }, 1200);
                alert('Link berhasil disalin!');
            };

            // Preferred: modern Clipboard API (requires HTTPS or localhost)
            if (window.isSecureContext && navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(url).then(flash).catch(() => fallbackCopy(url, flash));
            } else {
                fallbackCopy(url, flash);
            }
        }

        function fallbackCopy(text, done) {
            // Create a hidden textarea to execCommand('copy')
            const ta = document.createElement('textarea');
            ta.value = text;
            ta.setAttribute('readonly', '');
            ta.style.position = 'fixed';
            ta.style.opacity = '0';
            document.body.appendChild(ta);
            ta.select();
            try {
                document.execCommand('copy');
                done();
            } catch (e) {
                console.error('Copy failed:', e);
                done('Copy failed');
            } finally {
                document.body.removeChild(ta);
            }
        }
    </script>
@endpush
