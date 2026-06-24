@extends('layouts.app')

@section('content')
<section class="py-32 bg-navy-deep min-h-screen flex items-center justify-center text-center">
    <div class="container max-w-3xl mx-auto px-6 scroll-animate">
        <div class="w-16 h-16 bg-accent/10 rounded-2xl flex items-center justify-center text-accent mx-auto mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg>
        </div>
        <h1 class="text-3xl lg:text-4xl md:text-5xl font-bold text-white mb-6">Flxware Blog</h1>
        <p class="text-gray-400 text-lg leading-relaxed mb-10">
            We are currently writing amazing content. Please check back later!
        </p>
        <a href="/" class="inline-flex items-center gap-2 bg-white text-navy-deep px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-colors">
            &larr; Back to Home
        </a>
    </div>
</section>
@endsection
