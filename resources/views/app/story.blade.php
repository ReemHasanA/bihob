@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section 
        class="m-md-5" 
        x-data="revealOnView({ immediate: true })"
    >
        <div class="flex max-sm:flex-col justify-around p-5 gap-4 max-w-7xl mx-auto">
            <div 
                class="max-w-md self-center animate-fade-in"
                :class="{ 'in-view': isInView }"
            >
                <h1 class="text-5xl font-extrabold text-secondary mb-6 leading-tight">
                    من <x-app-logo-icon class="size-20 inline-block"/>؟
                </h1>
                <p 
                    class="text-lg text-gray mb-10 max-w-xl mx-auto animate-fade-in" 
                    :class="{ 'in-view': isInView }"
                >
                    أصحاب لمسة فريدة نؤمن أن الفن والابداع جزء من هويتنا التي بنيناها بحب
                </p>
            </div>

            <div 
                class="mix-blend-multiply max-w-sm self-center animate-fade-in"
                :class="{ 'in-view': isInView }"
            >
                <img 
                    src="{{ asset('images/basboos-animation-with-girls.png') }}" 
                    alt="رسم كرتوني لفتاتين يحتضنان قطة عملاقة"
                    class="animate-float"
                    loading="eager"
                >
            </div>
        </div>
    </section>

<section class="bg-secondary/10 py-20 px-6 text-center relative" x-data="revealOnView()">
    <div class="max-w-4xl mx-auto flex justify-around items-start">
        <div class="flex flex-col justify-center gap-12">
            <!-- Cloud: gentle floating, like it's drifting -->
            <img 
                src="{{ asset('images/happy-cloud.png') }}" 
                alt="cute cloud" 
                class="my-6 cloud-animate"
                :class="{ 'in-view': isInView }"
                loading="lazy"
            >
            <!-- Winter girl: soft bounce, replaces the constant animate-bounce -->
            <img 
                src="{{ asset('images/winter-girl.png') }}" 
                alt="love winter" 
                class="winter-animate opacity-0"
                :class="{ 'in-view': isInView }"
                loading="lazy"
            >
        </div>

        <div class="max-w-sm self-center animate-fade-in" :class="{ 'in-view': isInView }">
            <h2 class="text-3xl">
                لن تثنينا العواصف والأمطار
                <br>
                بل سنمطركم بالحب
            </h2>
        </div>
    </div>
</section>

    <section 
        class="py-20 px-6 text-center relative"
        x-data="revealOnView()"
    >
        <div class="max-w-4xl mx-auto flex justify-around items-start">
            <div class="max-w-sm self-center">
                <h2 
                    class="text-3xl animate-fade-in"
                    :class="{ 'in-view': isInView }"
                >
                    وبعد المطر
                    <br>
                    ستشرق شمسٌ تملأنا دفئًا وحب
                </h2>
            </div>

            <div class="flex flex-col justify-center gap-12">
                <!-- Sun image with rise and shine animation -->
                <img 
                    src="{{ asset('images/sun.png') }}" 
                    alt="smily sun" 
                    class="my-6 sun-animate size-24"
                    :class="{ 'in-view': isInView }"
                    loading="lazy"
                >
                
                <!-- Girl image with fade-in and slide-up animation -->
                <img 
                    src="{{ asset('images/summer-girl.png') }}" 
                    alt="love summer" 
                    class="girl-animate animate-sway opacity-0"
                    :class="{ 'in-view': isInView }"
                    loading="lazy"
                >
            </div>
        </div>
    </section>

@endsection
