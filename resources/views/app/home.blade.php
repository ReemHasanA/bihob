@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="m-md-5">
        <div class="flex justify-around p-5 gap-4 max-w-7xl mx-auto">
            <div class="mix-blend-multibly max-w-sm">
                <img src="{{ asset('images/girl-with-hijab-and-her-flower-pot.png') }}" alt="">
            </div>
            
            <div class="max-w-md self-center">
                <h1 class="text-5xl font-extrabold text-secondary mb-6 leading-tight">
                    هذا الفن صنع <x-app-logo-icon class="size-20 inline-block"/>
                </h1>
                <p class="text-lg text-gray mb-10 max-w-xl mx-auto">
                    اكتشف لمستنا الفنية الفريدة، رُسمت وأُبدعت بكل إتقانٍ وحب لتضيف لمسة جمالية لمقنياتك.
                </p>
                <a href="#shop" class="bg-primary text-white px-8 py-4 rounded-full font-bold hover:bg-secondary transition-all shadow-lg">
                    تسوق الآن
                </a>
                
            </div>
        </div>
    </section>
    <section class="bg-beige/40 py-20 px-6 text-center relative">
        <div class="max-w-4xl mx-auto flex justify-between absloute top-2">
            <img src="{{ asset('images/peace-for-your-heart1.png') }}" 
            height="100" width="100"
            alt="peace bird with flowers" 
            class="animate-sway"
            loading="lazy"
            >
            {{-- <img src="{{ asset('images/basboos-animation-with-girls.png') }}"  --}}
            <img src="{{ asset('images/peace-for-your-heart1.png') }}" 
            height="100" width="100"
            alt="girls hugging big cat"
            class="animate-sway -scale-x-100"
            loading="lazy"
            >
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            
            <!-- نص القصة -->
            <div class="order-2 md:order-1 text-right">
                <h2 class="text-secondary text-sm font-bold tracking-widest uppercase mb-4 border-r-4 border-primary pr-4">من نحن</h2>
                <h1 class="text-4xl md:text-5xl/20 font-extrabold text-secondary my-8 leading-tight">
                    فنٌّ يشبهنا، <br>
                    <span class="text-primary">وُلد من رحم هويتنا.</span>
                </h1>
                
                <div class="space-y-6 text-gray text-lg leading-relaxed">
                    <p>
                        بدأت رحلتنا من ملاحظة بسيطة: افتقار العالم الرقمي لرسومات تمثل **هويتنا وثقافتنا العربية** بصدق. وجدنا الكثير من المحتوى "المُعرب"، لكننا آمنّا أننا نستحق عملاً أصلياً ينبض بروحنا.
                    </p>
                    <p class="font-medium text-secondary">
                        "هذا الفن صنع بحب" ليست مجرد جملة، بل هي وعدٌ بأن كل رسمة، وكل لون، وكل تفصيل هو انعكاس لثقافتنا الغنية بأسلوب فني أصيل لم يُنسخ أو يُترجم، بل وُلد هنا.
                    </p>
                </div>

                <div class="mt-10">
                    <div class="inline-block border-b-2 border-beige pb-2 text-primary font-serif italic text-xl">
                        بكل حب، فريق بحب
                    </div>
                </div>
            </div>


            <div class="order-1 md:order-2 relative">
                
                <div class="relative group">
                    <img src="{{ asset('images/about.png') }}" alt="رسومات تعبر عن هويتنا" 
                        class="w-full h-auto rounded-3xl shadow-2xl transform group-hover:scale-105 transition-transform duration-500">
                    
                    <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl border border-beige/50 hidden lg:block animate-bounce">
                        <p class="text-primary font-bold text-sm">هذا الفن صنع بحب</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Product Grid -->
    <section id="shop" class="max-w-7xl mx-auto px-4 py-20">
        <h2 class="text-3xl font-bold text-secondary mb-12 border-r-4 border-primary pr-4">وصلنا حديثاً</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @isset($products)
            @forelse($products as $product)
            <div class="group bg-white border border-beige/20 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                <div class="aspect-square bg-beige/10 overflow-hidden">
                    <img src="{{ $product->image_url }}" alt="Product" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-secondary mb-2">{{ $product->name }}</h3>
                    <p class="text-primary font-bold text-xl">{{ $product->price }} د.أ</p>
                    <button class="mt-4 w-full border-2 border-secondary text-secondary py-2 rounded-lg font-semibold hover:bg-secondary hover:text-white transition">
                        أضف للسلة
                    </button>
                </div>
            </div>
            @empty
            <div>Soon...</div>
            @endforelse
            
            @endisset
        </div>
    </section>
@endsection
