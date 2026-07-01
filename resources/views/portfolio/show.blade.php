@extends('layouts.app')
@section('title', 'Case Study | Flxware Technologies')

@section('content')
<section class="py-16 lg:py-24 bg-navy-dark min-h-screen">
    <div class="container max-w-7xl mx-auto px-6">
        <div class="mb-12 scroll-animate">
            <a href="{{ route('home') }}#portfolio" class="inline-flex items-center text-sm font-semibold text-gray-400 hover:text-accent transition-colors">
                <span class="mr-2">&larr;</span> Back to Portfolio
            </a>
        </div>

        @php
            // Mock data for the case studies
            $caseStudies = [
                'passvault' => [
                    'title' => 'PassVault',
                    'client' => 'Internal Product',
                    'type' => 'Mobile App',
                    'problem' => 'Users struggle to maintain secure and unique passwords across multiple services, often resorting to weak, easily guessable passwords or reusing the same password, which compromises their digital security.',
                    'solution' => 'We developed PassVault, a highly secure mobile application that generates unbreakable passwords, stores them in an encrypted vault accessible via biometric login, and syncs seamlessly across all user devices.',
                    'results' => [
                        'End-to-end encryption for maximum security',
                        'Real-time cloud sync across platforms',
                        'Intuitive and modern user interface'
                    ],
                    'images' => [
                        'generate.png',
                        'sync.png',
                        'access.png',
                        'reset.png',
                        'create.png'
                    ]
                ],
                'expense-tracker' => [
                    'title' => 'Expense Tracker App',
                    'client' => 'Personal Finance Startup',
                    'type' => 'Mobile App',
                    'problem' => 'The client wanted to create a simple, intuitive application for tracking daily expenses and managing personal budgets, but existing solutions were too complex and intimidating for average users.',
                    'solution' => 'We designed and developed a clean, minimalist Flutter application with Firebase backend, focusing on a frictionless user experience with quick entry forms and clear visual charts.',
                    'results' => [
                        '10,000+ Downloads in the first month',
                        '4.8 Star rating on App Store',
                        '30% higher user retention than industry average'
                    ]
                ],
                'exercise-tracker' => [
                    'title' => 'Exercise Tracker',
                    'client' => 'FitLife Health',
                    'type' => 'Mobile App',
                    'problem' => 'Users struggled to maintain consistency with their workouts because they lacked a personalized way to track progress and receive customized routines based on their fitness levels.',
                    'solution' => 'Built a React Native application that leverages custom algorithms to recommend workouts, coupled with a robust logging system to visualize progress over time.',
                    'results' => [
                        '5,000+ Active daily users',
                        'Featured in Health & Fitness category',
                        'Increased average workout consistency by 25%'
                    ]
                ],
                'wayz' => [
                    'title' => 'Wayz - Vehicle Rental',
                    'client' => 'Wayz Tourism',
                    'type' => 'Web & Mobile Platform',
                    'problem' => 'Tourists needed a reliable, localized vehicle rental solution that also provided integrated navigation and tourist guides to enhance their travel experience.',
                    'solution' => 'Developed a comprehensive cross-platform ecosystem using Flutter and Node.js. The solution included seamless payment processing, GPS tracking, and a curated tourist guide module.',
                    'results' => [
                        '$500k+ Revenue processed in Q1',
                        'Expanded to 3 major tourist cities',
                        'Reduced booking friction by 40%'
                    ]
                ]
            ];
            
            $caseStudy = $caseStudies[$slug] ?? null;
        @endphp

        @if(!$caseStudy)
            <div class="bg-navy-mid border border-white/10 rounded-2xl p-12 text-center scroll-animate">
                <h2 class="text-3xl font-bold text-white mb-4">Project Not Found</h2>
                <p class="text-gray-400">The case study you're looking for doesn't exist.</p>
            </div>
        @else
            <div class="bg-navy-mid border border-white/10 rounded-2xl p-8 lg:p-12 scroll-animate">
                <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-6 mb-12">
                    <div>
                        <span class="text-accent text-sm tracking-widest uppercase font-semibold block mb-3">CASE STUDY</span>
                        <h1 class="text-4xl lg:text-5xl font-bold text-white mb-6">{{ $caseStudy['title'] }}</h1>
                        <div class="flex flex-wrap gap-3">
                            <span class="bg-accent/10 text-accent px-4 py-1.5 rounded-full text-sm font-medium border border-accent/20">{{ $caseStudy['type'] }}</span>
                            <span class="bg-white/5 text-gray-300 px-4 py-1.5 rounded-full text-sm font-medium border border-white/10">{{ $caseStudy['client'] }}</span>
                        </div>
                    </div>
                </div>

                @if(isset($caseStudy['images']) && count($caseStudy['images']) > 0)
                    <div class="mb-16 overflow-hidden scroll-animate relative" style="mask-image: linear-gradient(to right, transparent, black 5%, black 95%, transparent); -webkit-mask-image: linear-gradient(to right, transparent, black 5%, black 95%, transparent);">
                        <div class="flex gap-6 py-4 w-max animate-marquee hover:[animation-play-state:paused]">
                            <!-- Original set -->
                            @foreach($caseStudy['images'] as $image)
                                <div class="flex-none w-[260px] md:w-[280px] rounded-2xl overflow-hidden border border-gray-800 bg-navy-dark shadow-lg">
                                    <img src="{{ asset('images/passvault/' . $image) }}" alt="{{ $caseStudy['title'] }} Screenshot" class="w-full h-auto block object-cover" onerror="this.src='https://placehold.co/280x600/1a1a2e/4a4e69?text=Pending'">
                                </div>
                            @endforeach
                            <!-- Duplicated set for seamless infinite scroll -->
                            @foreach($caseStudy['images'] as $image)
                                <div class="flex-none w-[260px] md:w-[280px] rounded-2xl overflow-hidden border border-gray-800 bg-navy-dark shadow-lg" aria-hidden="true">
                                    <img src="{{ asset('images/passvault/' . $image) }}" alt="{{ $caseStudy['title'] }} Screenshot" class="w-full h-auto block object-cover" onerror="this.src='https://placehold.co/280x600/1a1a2e/4a4e69?text=Pending'">
                                </div>
                            @endforeach
                        </div>
                        
                        <style>
                            @keyframes marquee {
                                0% {
                                    transform: translateX(0);
                                }
                                100% {
                                    /* Translate by exactly half the container width minus half the gap (gap-6 is 1.5rem) */
                                    transform: translateX(calc(-50% - 0.75rem));
                                }
                            }
                            .animate-marquee {
                                animation: marquee 25s linear infinite;
                            }
                        </style>
                    </div>
                @else
                    <div class="w-full h-96 bg-navy-deep rounded-2xl border border-white/10 flex items-center justify-center mb-16 text-gray-500 scroll-animate">
                        [ Placeholder: High-Quality Product Screenshot ]
                    </div>
                @endif

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mt-12">
                    <div class="lg:col-span-2 space-y-12">
                        <div class="scroll-animate">
                            <h3 class="text-2xl font-semibold text-white mb-4">The Problem</h3>
                            <p class="text-gray-400 leading-relaxed text-lg">{{ $caseStudy['problem'] }}</p>
                        </div>
                        
                        <div class="scroll-animate">
                            <h3 class="text-2xl font-semibold text-white mb-4">The Solution</h3>
                            <p class="text-gray-400 leading-relaxed text-lg">{{ $caseStudy['solution'] }}</p>
                        </div>
                    </div>
                    
                    <div class="scroll-animate">
                        <div class="bg-navy-dark border border-gray-800 rounded-xl p-8 h-full">
                            <h3 class="text-xl font-semibold text-white mb-6">Measurable Results</h3>
                            <ul class="space-y-4">
                                @foreach($caseStudy['results'] as $result)
                                    <li class="flex items-start gap-3">
                                        <span class="text-accent mt-1">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                        <span class="text-gray-300">{{ $result }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="mt-20 text-center border-t border-gray-800 pt-16 scroll-animate">
                    <h2 class="text-3xl font-semibold text-white mb-6">Ready for similar results?</h2>
                    <a href="{{ route('home') }}#contact" class="inline-block bg-accent hover:bg-blue-600 text-white font-medium py-3 px-8 rounded-lg transition-colors">
                        Start Your Project
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
