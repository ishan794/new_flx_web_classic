@extends('layouts.app')
@section('title', 'Blog | Flxware Technologies')

@section('content')
<section class="section">
    <div class="container">
        <div class="section-header fade-in">
            <h1>Flxware <span class="text-gradient">Insights</span></h1>
            <p>Thoughts, tutorials, and insights on software development, cloud architecture, and startup engineering.</p>
        </div>

        <div class="grid-2">
            <!-- Blog Post 1 -->
            <div class="glass-card fade-in">
                <div style="margin-bottom: 1rem;">
                    <span class="badge">Mobile</span>
                    <span style="color: var(--text-secondary); font-size: 0.875rem;">March 15, 2026</span>
                </div>
                <h3><a href="{{ route('blog.show', 'flutter-vs-react-native-2026') }}" style="transition: var(--transition);">Flutter vs React Native: A 2026 Comparison</a></h3>
                <p style="margin-top: 1rem;">A deep dive into the performance, developer experience, and ecosystem maturity of the two leading cross-platform frameworks.</p>
                <a href="{{ route('blog.show', 'flutter-vs-react-native-2026') }}" class="text-gradient" style="font-weight: 500; margin-top: 1rem; display: inline-block;">Read Article &rarr;</a>
            </div>

            <!-- Blog Post 2 -->
            <div class="glass-card fade-in">
                <div style="margin-bottom: 1rem;">
                    <span class="badge">Business</span>
                    <span style="color: var(--text-secondary); font-size: 0.875rem;">March 02, 2026</span>
                </div>
                <h3><a href="{{ route('blog.show', 'mvp-cost-guide') }}" style="transition: var(--transition);">How Much Should an MVP Actually Cost?</a></h3>
                <p style="margin-top: 1rem;">Breaking down the true costs of building a Minimum Viable Product, from ideation and design to development and launch.</p>
                <a href="{{ route('blog.show', 'mvp-cost-guide') }}" class="text-gradient" style="font-weight: 500; margin-top: 1rem; display: inline-block;">Read Article &rarr;</a>
            </div>
            
            <!-- Blog Post 3 -->
            <div class="glass-card fade-in">
                <div style="margin-bottom: 1rem;">
                    <span class="badge">Architecture</span>
                    <span style="color: var(--text-secondary); font-size: 0.875rem;">February 18, 2026</span>
                </div>
                <h3><a href="{{ route('blog.show', 'serverless-architecture-benefits') }}" style="transition: var(--transition);">When to Choose Serverless Architecture</a></h3>
                <p style="margin-top: 1rem;">Exploring the benefits and drawbacks of serverless architecture for modern web applications using AWS Lambda and API Gateway.</p>
                <a href="{{ route('blog.show', 'serverless-architecture-benefits') }}" class="text-gradient" style="font-weight: 500; margin-top: 1rem; display: inline-block;">Read Article &rarr;</a>
            </div>

            <!-- Blog Post 4 -->
            <div class="glass-card fade-in">
                <div style="margin-bottom: 1rem;">
                    <span class="badge">Web Dev</span>
                    <span style="color: var(--text-secondary); font-size: 0.875rem;">February 05, 2026</span>
                </div>
                <h3><a href="{{ route('blog.show', 'nextjs-vs-laravel') }}" style="transition: var(--transition);">Next.js vs Laravel: Choosing the Right Full-Stack Framework</a></h3>
                <p style="margin-top: 1rem;">An objective comparison of the React-based Next.js framework and the PHP-based Laravel ecosystem for building scalable web apps.</p>
                <a href="{{ route('blog.show', 'nextjs-vs-laravel') }}" class="text-gradient" style="font-weight: 500; margin-top: 1rem; display: inline-block;">Read Article &rarr;</a>
            </div>
        </div>
    </div>
</section>
@endsection
