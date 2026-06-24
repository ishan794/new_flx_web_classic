@extends('layouts.app')
@section('title', 'Contact Us | Flxware Technologies')

@section('content')
<section class="section">
    <div class="container">
        <div class="section-header fade-in">
            <h1>Get In <span class="text-gradient">Touch</span></h1>
            <p>Ready to start your next project? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
        </div>

        <div class="grid-2">
            <!-- Contact Form -->
            <div class="glass-card fade-in">
                <h2>Send us a Message</h2>
                <p>Fill out the form below and we'll get back to you within 24 hours.</p>

                <form action="#" method="POST" style="margin-top: 2rem;">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="John Doe" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="john@example.com" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subject *</label>
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Project inquiry / General question" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" class="form-control" placeholder="Tell us about your project, timeline, budget, and any specific requirements..." required></textarea>
                    </div>

                    <button type="submit" class="btn-primary" style="width: 100%;">Send Message</button>
                </form>
                <div style="margin-top: 2rem; text-align: center; border-top: 1px solid var(--glass-border); padding-top: 1.5rem;">
                    <p style="margin-bottom: 1rem;">Or schedule a call directly with our team:</p>
                    <a href="https://calendly.com/" target="_blank" class="btn-outline" style="width: 100%; display: block; text-align: center;">Book a Call via Calendly</a>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="fade-in">
                <div class="glass-card" style="margin-bottom: 2rem;">
                    <h2>Contact Information</h2>
                    <p>Get in touch through any of these channels</p>
                    
                    <div style="margin-top: 2rem;">
                        <h4 style="margin-bottom: 0.5rem; color: var(--accent);">Email Us</h4>
                        <p>hello@flxwaretech.com</p>
                        <p style="font-size: 0.875rem;">Send us an email anytime</p>
                    </div>
                    
                    <div style="margin-top: 1.5rem;">
                        <h4 style="margin-bottom: 0.5rem; color: var(--accent);">Call Us</h4>
                        <p>+971 50 739 0610</p>
                        <p style="font-size: 0.875rem;">Mon-Fri from 9am to 6pm</p>
                    </div>
                    
                    <div style="margin-top: 1.5rem;">
                        <h4 style="margin-bottom: 0.5rem; color: var(--accent);">Locations</h4>
                        <p>USA, UAE, Sri Lanka</p>
                        <p style="font-size: 0.875rem;">Global presence with local expertise</p>
                    </div>
                </div>

                <div class="glass-card">
                    <h2>Office Hours</h2>
                    <div style="display: flex; justify-content: space-between; margin-top: 1.5rem; border-bottom: 1px solid var(--glass-border); padding-bottom: 0.5rem;">
                        <span>Monday - Friday</span>
                        <span>9:00 AM - 6:00 PM PST</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-top: 0.5rem; border-bottom: 1px solid var(--glass-border); padding-bottom: 0.5rem;">
                        <span>Saturday</span>
                        <span>10:00 AM - 4:00 PM PST</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-top: 0.5rem; border-bottom: 1px solid var(--glass-border); padding-bottom: 0.5rem;">
                        <span>Sunday</span>
                        <span>Closed</span>
                    </div>
                    <p style="font-size: 0.875rem; margin-top: 1rem; color: var(--accent);">Emergency support available 24/7 for existing clients</p>
                </div>
            </div>
        </div>

        <div class="section-header fade-in" style="margin-top: 6rem;">
            <h2>Frequently Asked Questions</h2>
            <p>Quick answers to common questions about our services and process.</p>
        </div>

        <div class="grid-2 fade-in">
            <div class="glass-card">
                <h4>What's your typical project timeline?</h4>
                <p>Project timelines vary based on complexity, but most projects range from 2-6 months. We provide detailed timelines during our initial consultation.</p>
            </div>
            <div class="glass-card">
                <h4>Do you provide ongoing support?</h4>
                <p>Yes, we offer comprehensive maintenance and support packages to ensure your application continues to perform optimally after launch.</p>
            </div>
            <div class="glass-card">
                <h4>What technologies do you specialize in?</h4>
                <p>We specialize in React, React Native, Node.js, Python, and cloud platforms like AWS. We choose technologies based on your specific needs.</p>
            </div>
            <div class="glass-card">
                <h4>How do you handle project communication?</h4>
                <p>We provide regular updates through your preferred communication channels, including weekly progress reports and milestone reviews.</p>
            </div>
        </div>
        
        <div class="glass-card fade-in" style="margin-top: 4rem; text-align: center; background: var(--accent-gradient);">
            <h2 style="color: white;">Ready to Start Your Project?</h2>
            <p style="color: rgba(255, 255, 255, 0.9);">Let's discuss how we can help bring your software vision to life. Contact us today for a free consultation.</p>
            <a href="#name" class="btn-outline" style="margin-top: 1rem; color: white; border-color: white;">Get Free Consultation</a>
        </div>
    </div>
</section>
@endsection
