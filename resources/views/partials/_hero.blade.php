<section id="home" class="relative min-h-screen flex items-center bg-navy-deep overflow-hidden">
    <!-- Background code pattern & gradient -->
    <div class="absolute inset-0 z-0 code-pattern"></div>
    <div class="absolute inset-0 z-0" style="background: radial-gradient(circle at center, rgba(37, 99, 235, 0.1) 0%, transparent 60%);"></div>
    <div class="absolute inset-0 z-0 opacity-20 bg-center bg-cover bg-no-repeat" style="background-image: url('{{ asset('images/hero-bg.png') }}');"></div>
    <div class="absolute inset-0 z-0 bg-gradient-to-b from-navy-deep/60 to-navy-deep"></div>

    <div class="container max-w-7xl mx-auto px-6 relative z-10 text-center">
        <div class="max-w-4xl scroll-animate mx-auto">
            <p class="text-accent text-sm font-semibold tracking-widest uppercase mb-6">
                Innovative Software Solutions
            </p>
            
            <h1 class="text-4xl md:text-5xl lg:text-7xl font-bold text-white leading-tight mb-6">
                Building Tomorrow's<br/>
                <span class="text-accent">Software Solutions</span>
            </h1>
            
            <p class="text-lg text-gray-400 mb-10 max-w-2xl mx-auto leading-relaxed">
                We're a passionate team of developers creating innovative software that transforms businesses and empowers growth.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-10">
                <a href="#portfolio" class="border border-white/30 text-white px-6 py-3 rounded-lg font-medium hover:bg-white/10 transition-all duration-200">
                    View Our Work
                </a>
                <a href="#contact" class="bg-accent text-white px-6 py-3 rounded-lg font-medium hover:bg-accent-light transition-all duration-200 flex items-center justify-center gap-2">
                    Get Started 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce-slow text-white/40">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
    </div>
</section>
