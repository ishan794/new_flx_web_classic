<nav x-data="{ open: false }" class="fixed w-full z-50 transition-all duration-300 py-4 border-b border-transparent" id="navbar">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
        <a href="/" class="flex items-center gap-2">
            <span class="text-white font-bold text-xl tracking-tight transition-colors duration-300" id="nav-logo-text">Flxware</span>
        </a>
        
        <!-- Desktop Nav -->
        <div class="hidden md:flex items-center gap-8 text-sm font-medium text-white/90" id="nav-links">
            <a href="/#home" class="hover:text-accent transition-colors">Home</a>
            <a href="/#services" class="hover:text-accent transition-colors">Services</a>
            <a href="/#about" class="hover:text-accent transition-colors">About</a>
            <a href="/#portfolio" class="hover:text-accent transition-colors">Portfolio</a>
            <a href="/careers" class="hover:text-accent transition-colors">Careers</a>
            <a href="/#contact" class="hover:text-accent transition-colors">Contact</a>
        </div>
        
        <div class="hidden md:block">
            <a href="/#contact" class="px-6 py-3 bg-accent hover:bg-accent-light text-white text-sm font-medium rounded-lg transition-all duration-200">
                Get Started
            </a>
        </div>

        <!-- Mobile Hamburger -->
        <button @click="open = !open" class="md:hidden text-white" aria-label="Menu">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" 
         @click.away="open = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="md:hidden absolute top-full left-0 w-full bg-navy-deep/95 backdrop-blur-md border-b border-white/10 py-4 px-6 flex flex-col gap-4 text-white shadow-xl" style="display: none;">
        <a href="/#home" @click="open = false" class="block text-sm font-medium hover:text-accent">Home</a>
        <a href="/#services" @click="open = false" class="block text-sm font-medium hover:text-accent">Services</a>
        <a href="/#about" @click="open = false" class="block text-sm font-medium hover:text-accent">About</a>
        <a href="/#portfolio" @click="open = false" class="block text-sm font-medium hover:text-accent">Portfolio</a>
        <a href="/careers" @click="open = false" class="block text-sm font-medium hover:text-accent">Careers</a>
        <a href="/#contact" @click="open = false" class="block text-sm font-medium hover:text-accent">Contact</a>
        <a href="/#contact" @click="open = false" class="block text-sm font-medium text-accent mt-2">Get Started &rarr;</a>
    </div>
</nav>
