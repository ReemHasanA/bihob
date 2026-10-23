@extends('layouts.app')

@section('content')

    <!-- Shop Header -->
    <section
        class="bg-secondary/10 py-16 px-6 text-center relative overflow-hidden"
        x-data="revealOnView({ immediate: true })"
    >
        <div class="max-w-4xl mx-auto flex items-center justify-around max-sm:flex-col gap-6">
            <div class="max-w-md animate-fade-in" :class="{ 'in-view': isInView }">
                <h1 class="text-5xl font-extrabold text-secondary mb-4 leading-tight">
                    المتجر
                </h1>
                <p class="text-lg text-gray">
                    قطع صُنعت بحب، اختاروا ما يشبهكم
                </p>
            </div>

            <img
                src="{{ asset('images/sun.png') }}"
                alt="smily sun"
                class="sun-animate size-24"
                :class="{ 'in-view': isInView }"
                loading="eager"
            >
        </div>
    </section>

    <!-- Filters -->
    <section class="max-w-7xl mx-auto px-4 pt-10">
        <form
            method="GET"
            action="{{ url()->current() }}"
            class="flex flex-wrap items-center justify-between gap-4"
        >
            {{-- Category chips --}}
            <div class="flex flex-wrap gap-2">
                <a href="{{ url()->current() }}"
                   class="px-4 py-2 rounded-full text-sm font-semibold border-2 transition
                          {{ request('category') ? 'border-beige/40 text-secondary hover:border-primary' : 'bg-secondary border-secondary text-white' }}">
                    الكل
                </a>

                @isset($categories)
                    @foreach($categories as $category)
                        <a href="{{ url()->current() }}?category={{ $category->slug }}"
                           class="px-4 py-2 rounded-full text-sm font-semibold border-2 transition
                                  {{ request('category') === $category->slug ? 'bg-secondary border-secondary text-white' : 'border-beige/40 text-secondary hover:border-primary' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                @endisset
            </div>

            {{-- Sort --}}
            <div class="flex items-center gap-2">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                {{-- <label for="sort" class="text-sm text-gray">ترتيب حسب</label>
                <select
                    id="sort"
                    name="sort"
                    onchange="this.form.submit()"
                    class="border-2 border-beige/40 rounded-lg px-3 py-2 text-sm text-secondary bg-white focus:border-primary focus:outline-none"
                >
                    <option value="latest"     @selected(request('sort') === 'latest')>الأحدث</option>
                    <option value="price_asc"  @selected(request('sort') === 'price_asc')>السعر: الأقل أولاً</option>
                    <option value="price_desc" @selected(request('sort') === 'price_desc')>السعر: الأعلى أولاً</option>
                </select> --}}
            </div>
        </form>
    </section>

    <!-- Product Grid -->
    <section
        id="shop"
        class="max-w-7xl mx-auto px-4 py-12"
        x-data="revealOnView({ threshold: 0.1 })"
        :class="{ 'in-view': isInView }"
    >
        <h2 class="text-3xl font-bold text-secondary mb-10 border-r-4 border-primary pr-4">
            {{ request('category') ? 'نتائج التصفية' : 'كل المنتجات' }}
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @isset($products)
                @forelse($products as $product)
                    <article
                        class="product-card group relative bg-white border border-beige/20 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300"
                        style="--delay: {{ ($loop->index % 8) * 90 }}ms"
                        x-data="{ liked: false, added: false }"
                    >
                        {{-- Image --}}
                        <div class="relative aspect-square bg-beige/10 overflow-hidden">
                            <img
                                src="{{ $product->image_url }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy"
                            >

                            {{-- Badge --}}
                            @if(isset($product->stock) && $product->stock < 1)
                                <span class="absolute top-3 right-3 bg-secondary text-white text-xs font-bold px-3 py-1 rounded-full">
                                    نفدت الكمية
                                </span>
                            @elseif(!empty($product->is_new))
                                <span class="absolute top-3 right-3 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full">
                                    جديد
                                </span>
                            @endif

                            {{-- Wishlist heart --}}
                            <button
                                type="button"
                                @click="liked = !liked"
                                :aria-pressed="liked"
                                aria-label="أضف للمفضلة"
                                class="absolute top-3 left-3 size-9 rounded-full bg-white/90 backdrop-blur flex items-center justify-center shadow-sm hover:scale-110 transition"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-5 transition"
                                     :class="liked ? 'fill-primary stroke-primary heart-pop' : 'fill-none stroke-secondary'"
                                     stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/>
                                </svg>
                            </button>
                        </div>

                        {{-- Details --}}
                        <div class="p-5">
                            @if(!empty($product->category?->name))
                                <p class="text-xs text-gray mb-1">{{ $product->category->name }}</p>
                            @endif

                            <h3 class="text-lg font-bold text-secondary mb-2 line-clamp-1">{{ $product->name }}</h3>
                            <p class="text-primary font-bold text-xl">{{ $product->price }} د.أ</p>

                            <button
                                type="button"
                                @disabled(isset($product->stock) && $product->stock < 1)
                                @click="added = true; setTimeout(() => added = false, 1500)"
                                {{-- With Livewire: wire:click="addToCart({{ $product->id }})" --}}
                                class="mt-4 w-full border-2 py-2 rounded-lg font-semibold transition disabled:opacity-40 disabled:cursor-not-allowed"
                                :class="added
                                    ? 'bg-primary border-primary text-white'
                                    : 'border-secondary text-secondary hover:bg-secondary hover:text-white'"
                            >
                                <span x-show="!added">أضف للسلة</span>
                                <span x-show="added" x-cloak>تمت الإضافة ✓</span>
                            </button>
                        </div>
                    </article>
                @empty
                    {{-- Empty state --}}
                    <div class="col-span-full text-center py-20">
                        <img
                            src="{{ asset('images/happy-cloud.png') }}"
                            alt="cute cloud"
                            class="cloud-drift mx-auto size-32 mb-6"
                            loading="lazy"
                        >
                        <p class="text-2xl font-bold text-secondary mb-2">لا توجد منتجات هنا بعد</p>
                        <p class="text-gray">قريباً سنملأ هذا المكان بالحب</p>
                    </div>
                @endforelse
            @endisset
        </div>

        {{-- Pagination --}}
        @if(isset($products) && method_exists($products, 'links'))
            <div class="mt-12">
                {{ $products->withQueryString()->links() }}
            </div>
        @endif
    </section>

    <style>
        /* Product cards: staggered fade-up once the grid is in view */
        .product-card {
            opacity: 0;
        }
        /* Uses the standalone `translate` property so it doesn't fight
           the hover:-translate-y-1 lift (which uses `transform`) */
        @keyframes cardIn {
            from { opacity: 0; translate: 0 30px; }
            to   { opacity: 1; translate: 0 0; }
        }
        #shop.in-view .product-card {
            animation: cardIn 0.7s ease-out var(--delay, 0ms) forwards;
        }

        /* Wishlist heart pop */
        @keyframes heartPop {
            0%   { transform: scale(1); }
            50%  { transform: scale(1.35); }
            100% { transform: scale(1); }
        }
        .heart-pop {
            animation: heartPop 0.35s ease-out;
        }

        /* Empty-state cloud drift */
        @keyframes cloudDrift {
            0%, 100% { transform: translate(0, 0); }
            50%      { transform: translate(8px, -6px); }
        }
        .cloud-drift {
            animation: cloudDrift 5s ease-in-out infinite;
        }

        [x-cloak] { display: none !important; }

        @media (prefers-reduced-motion: reduce) {
            .product-card,
            #shop.in-view .product-card {
                animation: none !important;
                opacity: 1;
            }
            .cloud-drift,
            .heart-pop {
                animation: none !important;
            }
        }
    </style>

@endsection