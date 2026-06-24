@extends('layouts.app')
@section('title', 'About Us | Flxware Technologies')

@section('content')
<!-- Load Bootstrap 5 & Font Awesome specifically for this section so it doesn't break other pages -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* =========================================
       About Flxware Section Styles
       ========================================= */
    .about-flxware-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #eef2f5 100%);
        padding: 80px 0;
        font-family: 'Outfit', 'Poppins', sans-serif;
        color: #2b3445;
    }

    .about-flxware-section .section-title {
        font-weight: 700;
        color: #0b1528;
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .about-flxware-section .section-subtitle {
        color: #3b82f6;
        font-weight: 600;
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
    }

    .about-flxware-section .lead-text {
        font-size: 1.15rem;
        color: #64748b;
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* Mission Box */
    .mission-box {
        background: #ffffff;
        border-left: 5px solid #3b82f6;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        height: 100%;
        transition: all 0.3s ease;
    }

    .mission-box:hover {
        box-shadow: 0 15px 35px rgba(59, 130, 246, 0.1);
        transform: translateY(-5px);
    }

    /* Feature Cards */
    .flx-feature-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 40px 20px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.03);
        border: 1px solid rgba(0,0,0,0.03);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        height: 100%;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .flx-feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(59,130,246,0.05) 0%, rgba(139,92,246,0.05) 100%);
        z-index: -1;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .flx-feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(59, 130, 246, 0.12);
        border-color: rgba(59, 130, 246, 0.2);
    }

    .flx-feature-card:hover::before {
        opacity: 1;
    }

    .flx-icon-wrapper {
        width: 80px;
        height: 80px;
        margin: 0 auto 25px;
        background: rgba(59, 130, 246, 0.1);
        color: #3b82f6;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        transition: all 0.3s ease;
    }

    .flx-feature-card:hover .flx-icon-wrapper {
        background: #3b82f6;
        color: #ffffff;
        transform: scale(1.1);
    }

    .flx-feature-card h5 {
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 0;
        color: #0b1528;
    }

    /* Statistics Counters */
    .stat-wrapper {
        padding: 40px 0 0 0;
        border-top: 1px solid rgba(0,0,0,0.08);
        margin-top: 30px;
    }

    .stat-item {
        text-align: center;
        padding: 20px;
    }

    .stat-number {
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 10px;
        line-height: 1;
    }

    .stat-text {
        font-size: 1rem;
        font-weight: 500;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin: 0;
    }
</style>

<section class="about-flxware-section" id="about">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">
        
        <!-- Header Section -->
        <div class="row mb-5 text-center">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title">About Flxware Technologies</h2>
                <h4 class="section-subtitle">Building Software That Businesses Can Trust</h4>
                <p class="lead-text">
                    We're a dynamic team of software developers, designers, and innovators passionate about creating technology solutions that make a real difference in the world.
                </p>
            </div>
        </div>

        <!-- Story & Mission Row -->
        <div class="row mb-5 align-items-stretch g-4">
            <div class="col-lg-6">
                <div class="pe-lg-4">
                    <h3 class="mb-4 fw-bold" style="color: #0b1528;">Our Story</h3>
                    <p style="color: #475569; line-height: 1.8; font-size: 1.05rem;">
                        Founded in 2020, Flxware Technologies started with a simple idea: software development shouldn't require a Fortune 500 budget to be done properly. We work with startups and growing businesses who need software that's built right the first time — not just shipped fast and patched later.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mission-box">
                    <h3 class="mb-3 fw-bold" style="color: #3b82f6;">
                        <i class="fas fa-rocket me-2"></i> Our Mission
                    </h3>
                    <p class="mb-0" style="color: #475569; line-height: 1.7; font-size: 1.05rem;">
                        Our mission is to empower businesses through innovative software solutions that drive growth, improve efficiency, and create exceptional user experiences. We're committed to delivering high-quality, scalable solutions that stand the test of time.
                    </p>
                </div>
            </div>
        </div>

        <!-- Feature Cards -->
        <div class="row g-4 mb-5">
            <!-- Card 1 -->
            <div class="col-xl-3 col-md-6">
                <div class="flx-feature-card">
                    <div class="flx-icon-wrapper">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h5>Custom Software Development</h5>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-xl-3 col-md-6">
                <div class="flx-feature-card">
                    <div class="flx-icon-wrapper">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <h5>Scalable Architecture</h5>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-xl-3 col-md-6">
                <div class="flx-feature-card">
                    <div class="flx-icon-wrapper">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <h5>Expert Development Team</h5>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col-xl-3 col-md-6">
                <div class="flx-feature-card">
                    <div class="flx-icon-wrapper">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h5>Long-Term Partnership</h5>
                </div>
            </div>
        </div>

        <!-- Statistics Counters -->
        <div class="stat-wrapper">
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number"><span class="flx-counter" data-target="20">0</span>+</div>
                        <p class="stat-text">Projects Delivered</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number"><span class="flx-counter" data-target="6">0</span>+</div>
                        <p class="stat-text">Years in Operation</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number"><span class="flx-counter" data-target="92">0</span>%</div>
                        <p class="stat-text">Client Retention Rate</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number"><span class="flx-counter" data-target="24">0</span>/7</div>
                        <p class="stat-text">Technical Support</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Vanilla JavaScript for Counters -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll('.flx-counter');
        const speed = 200;

        const startCounting = (counter) => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const inc = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + inc);
                    setTimeout(updateCount, 20);
                } else {
                    counter.innerText = target;
                }
            };
            updateCount();
        };

        const observerOptions = {
            root: null,
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    startCounting(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        counters.forEach(counter => {
            observer.observe(counter);
        });
    });
</script>
@endsection
