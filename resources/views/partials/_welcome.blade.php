<section id="about-intro" class="py-16 lg:py-24 bg-gray-light">
    <div class="container max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <!-- Left Column -->
            <div class="scroll-animate">
                <span class="text-accent text-sm font-semibold tracking-widest uppercase block mb-4">ABOUT US</span>
                <h2 class="text-3xl md:text-4xl font-bold text-navy-deep mb-6" data-cms-key="pages.home.welcome.title">
                    {{ cms_data('pages.home.welcome.title', 'Welcome to Flxware Technologies') }}
                </h2>
                <p class="text-gray-600 leading-relaxed mb-6" data-cms-key="pages.home.welcome.desc">
                    {{ cms_data('pages.home.welcome.desc', 'Founded with a vision to bridge the gap between innovative ideas and practical software solutions, Flxware Technologies specializes in creating robust, scalable applications that drive business success. Our team combines technical expertise with creative problem-solving to deliver exceptional results.') }}
                </p>
                <a href="{{ cms_data('pages.home.welcome.link', '/#about') }}" data-cms-href="pages.home.welcome.link" class="inline-flex items-center gap-2 text-accent hover:text-accent-light font-medium transition-colors group">
                    <span data-cms-key="pages.home.welcome.link_text">{{ cms_data('pages.home.welcome.link_text', 'Learn More About Us') }}</span>
                    <svg class="transform group-hover:translate-x-1 transition-transform" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Right Column - Stat Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center scroll-animate hover:shadow-md transition-shadow">
                    <div class="text-5xl font-bold text-accent mb-3" data-cms-key="pages.home.stats.projects.value">{{ cms_data('pages.home.stats.projects.value', '10+') }}</div>
                    <div class="text-lg font-bold text-navy-deep mb-1" data-cms-key="pages.home.stats.projects.label">{{ cms_data('pages.home.stats.projects.label', 'Projects') }}</div>
                    <div class="text-sm text-gray-500" data-cms-key="pages.home.stats.projects.sub">{{ cms_data('pages.home.stats.projects.sub', 'Successfully delivered') }}</div>
                </div>
                
                <!-- Card 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center scroll-animate hover:shadow-md transition-shadow" style="transition-delay: 100ms;">
                    <div class="text-5xl font-bold text-accent mb-3" data-cms-key="pages.home.stats.years.value">{{ cms_data('pages.home.stats.years.value', '4') }}</div>
                    <div class="text-lg font-bold text-navy-deep mb-1" data-cms-key="pages.home.stats.years.label">{{ cms_data('pages.home.stats.years.label', 'Years') }}</div>
                    <div class="text-sm text-gray-500" data-cms-key="pages.home.stats.years.sub">{{ cms_data('pages.home.stats.years.sub', 'Dedicated service') }}</div>
                </div>
                
                <!-- Card 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center scroll-animate hover:shadow-md transition-shadow" style="transition-delay: 200ms;">
                    <div class="text-5xl font-bold text-accent mb-3" data-cms-key="pages.home.stats.satisfaction.value">{{ cms_data('pages.home.stats.satisfaction.value', '100%') }}</div>
                    <div class="text-lg font-bold text-navy-deep mb-1" data-cms-key="pages.home.stats.satisfaction.label">{{ cms_data('pages.home.stats.satisfaction.label', 'Satisfaction') }}</div>
                    <div class="text-sm text-gray-500" data-cms-key="pages.home.stats.satisfaction.sub">{{ cms_data('pages.home.stats.satisfaction.sub', 'Client satisfaction') }}</div>
                </div>
            </div>

            <!-- Bottom Text -->
            <div class="col-span-1 lg:col-span-2 text-center mt-8 scroll-animate" style="transition-delay: 300ms;">
                <p class="text-gray-500 text-lg" data-cms-key="pages.home.stats.bottom_text">
                    {{ cms_data('pages.home.stats.bottom_text', 'From startups to enterprises, we build software that matters.') }}
                </p>
            </div>

        </div>
    </div>
</section>
