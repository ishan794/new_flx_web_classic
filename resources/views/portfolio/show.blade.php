@extends('layouts.app')
@section('title', 'Case Study | Flxware Technologies')

@section('content')
<section class="section">
    <div class="container">
        <a href="{{ route('portfolio') }}" class="btn-outline fade-in" style="margin-bottom: 2rem;">&larr; Back to Portfolio</a>

        @php
            // Mock data for the case studies
            $caseStudies = [
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
            <div class="glass-card text-center fade-in">
                <h2>Project Not Found</h2>
                <p>The case study you're looking for doesn't exist.</p>
            </div>
        @else
            <div class="glass-card fade-in">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 1rem;">
                    <div>
                        <h1>{{ $caseStudy['title'] }}</h1>
                        <div style="margin: 1rem 0 2rem;">
                            <span class="badge">{{ $caseStudy['type'] }}</span>
                            <span class="badge">{{ $caseStudy['client'] }}</span>
                        </div>
                    </div>
                </div>

                <div style="width: 100%; height: 400px; background: var(--bg-secondary); border-radius: 1rem; border: 1px solid var(--glass-border); display: flex; align-items: center; justify-content: center; margin-bottom: 3rem; color: var(--text-secondary);">
                    [ Placeholder: High-Quality Product Screenshot ]
                </div>

                <div class="grid-2">
                    <div>
                        <h3 style="color: var(--accent); margin-bottom: 1rem;">The Problem</h3>
                        <p>{{ $caseStudy['problem'] }}</p>
                        
                        <h3 style="color: var(--accent); margin-top: 2rem; margin-bottom: 1rem;">The Solution</h3>
                        <p>{{ $caseStudy['solution'] }}</p>
                    </div>
                    
                    <div>
                        <div class="glass-card" style="background: rgba(59, 130, 246, 0.05);">
                            <h3 style="margin-bottom: 1.5rem;">Measurable Results</h3>
                            <ul style="list-style: none; padding: 0;">
                                @foreach($caseStudy['results'] as $result)
                                    <li style="margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        {{ $result }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div style="margin-top: 4rem; text-align: center; border-top: 1px solid var(--glass-border); padding-top: 3rem;">
                    <h2>Ready for similar results?</h2>
                    <a href="{{ route('contact') }}" class="btn-primary" style="margin-top: 1rem;">Start Your Project</a>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
