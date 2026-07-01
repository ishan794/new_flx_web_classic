<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flxware Technologies | Modern IT Consulting & Development</title>
    <meta name="description" content="Flxware Technologies is a professional software development company based in Sri Lanka and USA, delivering premium IT solutions since 2020.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script defer src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <style>
        .code-pattern {
            background-image: radial-gradient(circle at 1px 1px, rgba(255, 255, 255, 0.05) 1px, transparent 0);
            background-size: 24px 24px;
        }
        @keyframes ticker {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }
        .animate-ticker {
            animation: ticker 30s linear infinite;
        }
        .animate-bounce-slow {
            animation: bounce 2s infinite;
        }
    </style>
</head>
<body class="bg-navy-dark text-white font-sans antialiased overflow-x-hidden selection:bg-accent/30 selection:text-white" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">

    <!-- Initialize AOS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    once: true,
                    offset: 50
                });
            }
        });
    </script>

    @include('partials._navbar')

    <main>
        @yield('content')
    </main>

    @include('partials._footer')

</body>
</html>
