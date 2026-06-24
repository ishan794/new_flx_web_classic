@extends('layouts.app')

@section('content')

{{-- Hero Section --}}
<section class="pt-24 lg:pt-32 pb-16 lg:pb-24 bg-[#05070F] relative overflow-hidden">
    {{-- Dot Grid Overlay --}}
    <div class="absolute inset-0 z-0" style="background-image: radial-gradient(circle, rgba(255,255,255,0.04) 1px, transparent 1px); background-size: 24px 24px;"></div>
    {{-- Radial Glow --}}
    <div class="absolute inset-0 z-0" style="background-image: radial-gradient(ellipse 80% 50% at 50% -20%, rgba(37,99,235,0.15), transparent);"></div>

    <div class="container max-w-5xl mx-auto px-6 relative z-10 text-center scroll-animate">
        <p class="text-[#60A5FA] text-sm font-semibold tracking-widest uppercase mb-6">
            We're Hiring
        </p>
        
        <h1 class="text-white text-4xl md:text-5xl lg:text-7xl font-bold mb-6 leading-tight">
            Build the Future <span class="text-[#2563EB]">With Us</span>
        </h1>
        
        <p class="text-gray-400 text-lg max-w-2xl mx-auto text-center leading-relaxed mb-10">
            Join a team of passionate innovators dedicated to creating exceptional digital experiences. At Flxware, your work matters.
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="#openings" class="bg-[#2563EB] text-white px-6 py-3 rounded-lg font-medium hover:bg-[#3B82F6] transition-all duration-200">
                View Openings
            </a>
            <a href="/#about" class="border border-white/30 text-white px-6 py-3 rounded-lg font-medium hover:bg-white/10 transition-all duration-200">
                Learn About Us
            </a>
        </div>
    </div>
</section>

{{-- Open Positions Section --}}
<section id="openings" class="bg-[#F8F9FC] py-16 lg:py-24">
    <div class="container max-w-5xl mx-auto px-6">

        <div class="mb-12 scroll-animate">
            <span class="text-[#2563EB] text-sm font-semibold tracking-widest uppercase block mb-2">OPEN POSITIONS</span>
            <h2 class="text-[#111827] font-bold text-3xl lg:text-4xl mb-4">Open Positions</h2>
            <p class="text-gray-500 text-base max-w-xl">
                Ready to make an impact? Check out our current opportunities below.
            </p>
        </div>

        <div class="space-y-4">
            @foreach($jobs as $slug => $job)
            <a href="{{ route('careers.show', $slug) }}" class="block bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 scroll-animate" style="transition-delay: {{ $loop->index * 80 }}ms;">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-[#111827] font-semibold text-xl mb-2">{{ $job['title'] }}</h3>
                        
                        <div class="flex flex-wrap gap-3 mt-2 text-sm text-gray-500 font-medium">
                            <span>{{ $job['department'] }}</span>
                            <span>&bull;</span>
                            <span>{{ $job['location'] }}</span>
                            <span>&bull;</span>
                            <span>{{ $job['type'] }}</span>
                        </div>
                    </div>
                    
                    <div class="mt-2 md:mt-0">
                        <span class="text-[#2563EB] font-medium text-sm hover:underline flex items-center gap-1">
                            View Details <span aria-hidden="true">&rarr;</span>
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Don't see the right role? Banner --}}
        <div class="bg-gradient-to-r from-[#2563EB] to-[#1D4ED8] rounded-2xl p-10 text-center mt-12 scroll-animate" style="transition-delay: 400ms;">
            <h3 class="text-white font-bold text-2xl">Don't see the right role?</h3>
            <p class="text-white/80 mt-2 text-sm max-w-lg mx-auto">
                We're always looking for talented individuals to join our team. Send us your resume and tell us how you can contribute.
            </p>
            <a href="mailto:careers@flxwaretech.com" class="inline-flex items-center gap-2 bg-white text-[#2563EB] font-semibold px-6 py-3 rounded-lg hover:bg-gray-100 transition mt-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                Email Us: careers@flxwaretech.com
            </a>
        </div>

    </div>
</section>

@endsection
