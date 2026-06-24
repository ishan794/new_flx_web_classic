@extends('layouts.app')
@section('title', 'Portfolio | Flxware Technologies')

@section('content')
<section class="section">
    <div class="container">
        <div class="section-header fade-in">
            <h1>Our Portfolio</h1>
            <p>Explore our recent projects and see how we've helped businesses transform their ideas into successful digital solutions.</p>
        </div>

        <div class="grid-2" style="margin-bottom: 2rem;">
            <!-- Project 1 -->
            <div class="glass-card fade-in">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <span class="badge">Mobile App</span>
                    <span style="color: var(--text-secondary);">2024</span>
                </div>
                <h2>Expense Tracker</h2>
                <p>A comprehensive personal finance management app that helps users track expenses, set budgets, and achieve financial goals.</p>
                
                <h4 style="margin-top: 1.5rem;">Key Features:</h4>
                <ul style="margin-bottom: 1.5rem; list-style-type: disc; margin-left: 1.5rem; color: var(--text-secondary);">
                    <li>Expense Categorization</li>
                    <li>Budget Planning</li>
                    <li>Financial Reports</li>
                    <li>Goal Tracking</li>
                </ul>

                <h4 style="margin-top: 1.5rem;">Technologies:</h4>
                <div style="margin-bottom: 1.5rem;">
                    <span class="badge">Flutter</span>
                    <span class="badge">Node.js</span>
                    <span class="badge">Firebase</span>
                </div>
                
                <a href="{{ route('portfolio.show', 'expense-tracker') }}" class="btn-outline">View Project Details</a>
            </div>

            <!-- Project 2 -->
            <div class="glass-card fade-in">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <span class="badge">Mobile App</span>
                    <span style="color: var(--text-secondary);">2024</span>
                </div>
                <h2>Exercise Tracker</h2>
                <p>A fitness tracking application that monitors workouts, tracks progress, and provides personalized fitness recommendations.</p>
                
                <h4 style="margin-top: 1.5rem;">Key Features:</h4>
                <ul style="margin-bottom: 1.5rem; list-style-type: disc; margin-left: 1.5rem; color: var(--text-secondary);">
                    <li>Workout Logging</li>
                    <li>Progress Analytics</li>
                    <li>Custom Routines</li>
                    <li>Personalized Recommendations</li>
                </ul>

                <h4 style="margin-top: 1.5rem;">Technologies:</h4>
                <div style="margin-bottom: 1.5rem;">
                    <span class="badge">React Native</span>
                    <span class="badge">Firebase</span>
                    <span class="badge">Dart</span>
                    <span class="badge">Cloud Functions</span>
                </div>
                
                <a href="{{ route('portfolio.show', 'exercise-tracker') }}" class="btn-outline">View Project Details</a>
            </div>
            
            <!-- Project 3 -->
            <div class="glass-card fade-in" style="grid-column: 1 / -1;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <span class="badge">Web & Mobile Platform</span>
                    <span style="color: var(--text-secondary);">2025</span>
                </div>
                <h2>Wayz</h2>
                <p>A vehicle rental platform designed specifically for tourists, offering seamless booking and local transportation solutions.</p>
                
                <div class="grid-2" style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
                    <div>
                        <h4>Key Features:</h4>
                        <ul style="list-style-type: disc; margin-left: 1.5rem; color: var(--text-secondary);">
                            <li>Vehicle Booking</li>
                            <li>Tourist Guide Integration</li>
                            <li>Payment Processing</li>
                            <li>GPS Navigation</li>
                        </ul>
                    </div>
                    <div>
                        <h4>Technologies:</h4>
                        <div>
                            <span class="badge">Flutter</span>
                            <span class="badge">Dart</span>
                            <span class="badge">Firebase</span>
                            <span class="badge">NodeJS</span>
                            <span class="badge">AWS</span>
                        </div>
                    </div>
                </div>
                
                <a href="{{ route('portfolio.show', 'wayz') }}" class="btn-outline">View Project Details</a>
            </div>
        </div>

        <div class="section-header fade-in" style="margin-top: 6rem;">
            <h2>Technologies We Use</h2>
            <p>We leverage cutting-edge technologies and frameworks to build robust, scalable solutions.</p>
        </div>
        
        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 2rem;" class="fade-in">
            <div class="glass-card" style="text-align: center; min-width: 150px;">React</div>
            <div class="glass-card" style="text-align: center; min-width: 150px;">Node.js</div>
            <div class="glass-card" style="text-align: center; min-width: 150px;">MongoDB</div>
            <div class="glass-card" style="text-align: center; min-width: 150px;">AWS</div>
            <div class="glass-card" style="text-align: center; min-width: 150px;">Flutter</div>
            <div class="glass-card" style="text-align: center; min-width: 150px;">TypeScript</div>
        </div>
    </div>
</section>
@endsection
