@extends('layouts.app')

@section('content')

{{-- Header --}}
<section class="pt-24 lg:pt-32 pb-16 bg-[#05070F] relative overflow-hidden">
    <div class="absolute inset-0 z-0" style="background-image: radial-gradient(circle, rgba(255,255,255,0.04) 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="absolute inset-0 z-0" style="background-image: radial-gradient(ellipse 80% 50% at 50% -20%, rgba(37,99,235,0.15), transparent);"></div>

    <div class="container max-w-4xl mx-auto px-6 relative z-10 scroll-animate">
        
        <a href="{{ route('careers.index') }}" class="inline-flex items-center text-[#60A5FA] hover:text-[#3B82F6] text-sm font-medium mb-8 transition-colors gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
            Back to Careers
        </a>

        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6 leading-tight">{{ $job['title'] }}</h1>
        
        <div class="flex flex-wrap gap-4 text-sm font-medium text-gray-400">
            <span>{{ $job['department'] }}</span>
            <span>&bull;</span>
            <span>{{ $job['location'] }}</span>
            <span>&bull;</span>
            <span>{{ $job['type'] }}</span>
        </div>
    </div>
</section>

{{-- Job Details --}}
<section class="py-20 bg-[#F8F9FC]">
    <div class="container max-w-4xl mx-auto px-6">
        
        <div class="bg-white border border-[#E5E7EB] rounded-xl p-8 md:p-12 shadow-sm scroll-animate">
            
            {{-- About the Role --}}
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-[#111827] mb-6 flex items-center gap-3">
                    <div class="w-8 h-8 bg-[#2563EB]/10 rounded-lg flex items-center justify-center text-[#2563EB] flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    </div>
                    About the Role
                </h2>
                <div class="text-[#6B7280] leading-relaxed space-y-4 text-base">
                    @foreach(explode("\n\n", $job['about']) as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>
            </div>

            {{-- Requirements --}}
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-[#111827] mb-6 flex items-center gap-3">
                    <div class="w-8 h-8 bg-[#2563EB]/10 rounded-lg flex items-center justify-center text-[#2563EB] flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    </div>
                    Requirements
                </h2>
                <ul class="space-y-4 list-none p-0 m-0">
                    @foreach($job['requirements'] as $req)
                    <li class="flex items-start">
                        <span class="text-[#2563EB] mt-1 mr-3 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        </span>
                        <span class="text-[#6B7280] leading-relaxed">{{ $req }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <hr class="border-[#E5E7EB] my-10">

            {{-- How to Apply --}}
            <div>
                <h2 class="text-xl font-bold text-[#111827] mb-4">How to Apply</h2>
                <p class="text-[#6B7280] mb-2 leading-relaxed">
                    Interested candidates are encouraged to send their resume and cover letter to our careers email.
                </p>
                <p class="text-[#111827] font-medium mb-6">
                    Subject as: <span class="text-[#2563EB]">{{ $job['title'] }} - &lt;First Name&gt; &lt;Last Name&gt;</span>
                </p>
                
                <a href="mailto:careers@flxwaretech.com?subject={{ urlencode($job['title'] . ' - <First Name> <Last Name>') }}" class="inline-flex items-center gap-2 bg-[#2563EB] hover:bg-[#3B82F6] text-white px-6 py-3 rounded-lg font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                    careers@flxwaretech.com
                </a>
            </div>

        </div>

    </div>
</section>

@endsection
