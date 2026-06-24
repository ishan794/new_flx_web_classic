@extends('layouts.app')
@section('title', 'Blog Post | Flxware Technologies')

@section('content')
<section class="section">
    <div class="container" style="max-width: 800px;">
        <a href="{{ route('blog') }}" class="btn-outline fade-in" style="margin-bottom: 2rem;">&larr; Back to Blog</a>

        @php
            // Mock data for blog posts
            $posts = [
                'flutter-vs-react-native-2026' => [
                    'title' => 'Flutter vs React Native: A 2026 Comparison',
                    'category' => 'Mobile',
                    'date' => 'March 15, 2026',
                    'content' => 'In 2026, the landscape of cross-platform mobile development is largely dominated by Flutter and React Native. This article breaks down the pros and cons of each framework based on our agency\'s experience building production apps. <br><br>While React Native boasts a massive ecosystem and is easier for web developers to pick up, Flutter\'s Skia (and now Impeller) rendering engine provides unmatched performance and consistency across platforms. We explore state management, UI components, and the long-term maintainability of both options.'
                ],
                'mvp-cost-guide' => [
                    'title' => 'How Much Should an MVP Actually Cost?',
                    'category' => 'Business',
                    'date' => 'March 02, 2026',
                    'content' => 'One of the most common questions we get is: "How much does it cost to build an app?" The answer is always "it depends," but this guide breaks down the actual factors that influence cost. <br><br>We discuss the difference between a clickable prototype, a low-code MVP, and a custom-built scalable V1. You will learn how to prioritize features to keep your initial budget lean while ensuring you build something that actually solves your users\' core problems.'
                ],
                'serverless-architecture-benefits' => [
                    'title' => 'When to Choose Serverless Architecture',
                    'category' => 'Architecture',
                    'date' => 'February 18, 2026',
                    'content' => 'Serverless architectures (like AWS Lambda) have changed the way we build backends. But are they always the right choice? <br><br>In this post, we explore the benefits of infinite scaling and pay-for-what-you-use pricing against the drawbacks of cold starts and vendor lock-in. We also provide a decision matrix to help you decide if your next project should be serverless or containerized.'
                ],
                'nextjs-vs-laravel' => [
                    'title' => 'Next.js vs Laravel: Choosing the Right Full-Stack Framework',
                    'category' => 'Web Dev',
                    'date' => 'February 05, 2026',
                    'content' => 'Next.js and Laravel are both incredible frameworks, but they cater to different philosophies. <br><br>This article compares the monolithic, "batteries-included" approach of Laravel with the component-driven, heavily un-opinionated React ecosystem of Next.js. We discuss deployment strategies, developer velocity, and which framework makes more sense depending on your team\'s background.'
                ]
            ];
            
            $post = $posts[$slug] ?? null;
        @endphp

        @if(!$post)
            <div class="glass-card text-center fade-in">
                <h2>Article Not Found</h2>
                <p>The blog post you're looking for doesn't exist.</p>
            </div>
        @else
            <div class="fade-in">
                <div style="margin-bottom: 1rem;">
                    <span class="badge">{{ $post['category'] }}</span>
                    <span style="color: var(--text-secondary);">{{ $post['date'] }}</span>
                </div>
                <h1 style="font-size: 3rem; margin-bottom: 2rem;">{{ $post['title'] }}</h1>
                
                <div style="width: 100%; height: 350px; background: var(--bg-secondary); border-radius: 1rem; border: 1px solid var(--glass-border); display: flex; align-items: center; justify-content: center; margin-bottom: 3rem; color: var(--text-secondary);">
                    [ Article Feature Image ]
                </div>

                <div class="glass-card" style="font-size: 1.125rem; line-height: 1.8;">
                    {!! $post['content'] !!}
                </div>
                
                <div style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid var(--glass-border); display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 60px; height: 60px; border-radius: 50%; background: var(--accent-gradient); display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.5rem;">Flx</div>
                    <div>
                        <h4 style="margin: 0;">Flxware Engineering Team</h4>
                        <p style="margin: 0; font-size: 0.875rem; color: var(--text-secondary);">We build software that scales.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
