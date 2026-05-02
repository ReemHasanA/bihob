<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <title>صنع بحب | Handmade Art</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans antialiased text-gray">
    <nav class="max-w-7xl mx-auto sticky md:rounded-full shadow-lg top-2 z-50 bg-white/50 backdrop-blur-md border-b border-beige/30">
        <div class="px-8 py-4 flex justify-between items-center ">
            <div class="text-2xl font-bold text-primary italic">
                <x-app-logo-icon class="size-16 inline-block"/>
            </div>
            <div class="space-x-6 text-secondary font-medium">
                <a href="#" class="hover:text-primary transition">الرئيسية</a>
                <a href="#" class="hover:text-primary transition">المتجر</a>
                <a href="#" class="hover:text-primary transition">قصتنا</a>
            </div>
        </div>
    </nav>
    

    <main>
        @yield('content')
    </main>

    <footer class="relative bg-beige/30 mt-32 p-3">
        <!-- The Flower "Growth" -->
        <div class="absolute top-0 left-0 w-full h-32 -translate-y-full bg-bottom bg-repeat-x mix-blend-multiply" 
            style="background-image: url('/images/flowers-sm-200.png'); background-size: contain;">
        </div>
        <!-- Footer Content -->
        {{-- <div class="relative z-10 max-w-7xl mx-auto px-4">
            <h2 class="text-primary font-serif text-2xl mb-2">هذا الفن صنع بحب</h2>
            <p class="text-secondary/70 text-sm mb-6">شكراً لدعمكم للفن اليدوي</p>
            
            <div class="flex justify-center gap-6 mb-8 text-secondary">
                <a href="#" class="hover:text-primary transition-colors">انستغرام</a>
                <a href="#" class="hover:text-primary transition-colors">واتساب</a>
            </div>
            <!-- Flexible Social Links -->
            <img src="{{ asset('images/girl-with-hijab-and-her-flower-garden.png') }}">
        </div> --}}
        <div class="flex justify-between text-gray/60items-center">
            <p class="text-center">
                &copy; {{ date('Y') }} جميع الحقوق محفوظة
            </p>
            
            <!-- Instagram (Standard icon in a 'handmade' style container) -->
            <a href="https://www.instagram.com/bihobart" target="_blank" class="group relative p-1 border-2 border-dashed border-gray/40 rounded-full hover:border-primary transition">
                <flux:icon icon="instagram" class="text-secondary hover:text-primary"/>
            </a>
        </div>
    </footer>

</body>
</html>
