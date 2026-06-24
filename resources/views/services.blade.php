@extends('layouts.app')
@section('title', 'Services | Flxware Technologies')

@section('content')
<section class="section">
    <div class="container">
        <div class="section-header fade-in">
            <h1>Our Services</h1>
            <p>We offer comprehensive software development services to help your business thrive in the digital age.</p>
        </div>
        
        <div class="grid-2">
            <div class="glass-card fade-in">
                <h3>Web Application Development</h3>
                <p>Custom web applications built with modern frameworks like React, Vue, and Angular. Responsive, fast, and user-friendly interfaces that work seamlessly across all devices.</p>
                <div style="margin-top: 1rem;">
                    <span class="badge">Responsive Design</span>
                    <span class="badge">Modern Frameworks</span>
                    <span class="badge">API Integration</span>
                    <span class="badge">Performance Optimization</span>
                </div>
            </div>

            <div class="glass-card fade-in">
                <h3>Mobile App Development</h3>
                <p>Native iOS and Android applications, as well as cross-platform solutions using React Native and Flutter. Delivering exceptional mobile experiences.</p>
                <div style="margin-top: 1rem;">
                    <span class="badge">Native Development</span>
                    <span class="badge">Cross-Platform</span>
                    <span class="badge">App Store Deployment</span>
                    <span class="badge">Push Notifications</span>
                </div>
            </div>

            <div class="glass-card fade-in">
                <h3>Enterprise Solutions</h3>
                <p>Scalable enterprise software solutions including CRM systems, inventory management, and business process automation tools.</p>
                <div style="margin-top: 1rem;">
                    <span class="badge">Scalable Architecture</span>
                    <span class="badge">Business Process Automation</span>
                    <span class="badge">Data Analytics</span>
                    <span class="badge">Custom Integrations</span>
                </div>
            </div>

            <div class="glass-card fade-in">
                <h3>Cloud Integration</h3>
                <p>Seamless cloud migration and integration services using AWS, Google Cloud, and Azure. Ensuring your applications are scalable and reliable.</p>
                <div style="margin-top: 1rem;">
                    <span class="badge">Cloud Migration</span>
                    <span class="badge">Serverless Architecture</span>
                    <span class="badge">Microservices</span>
                    <span class="badge">DevOps Integration</span>
                </div>
            </div>

            <div class="glass-card fade-in">
                <h3>API Development</h3>
                <p>RESTful and GraphQL API development for seamless data exchange between applications. Secure, documented, and efficient APIs.</p>
                <div style="margin-top: 1rem;">
                    <span class="badge">RESTful APIs</span>
                    <span class="badge">GraphQL</span>
                    <span class="badge">Documentation</span>
                    <span class="badge">Security Implementation</span>
                </div>
            </div>

            <div class="glass-card fade-in">
                <h3>Maintenance & Support</h3>
                <p>Ongoing maintenance, updates, and technical support to ensure your applications continue to perform optimally and stay secure.</p>
                <div style="margin-top: 1rem;">
                    <span class="badge">24/7 Support</span>
                    <span class="badge">Regular Updates</span>
                    <span class="badge">Security Patches</span>
                    <span class="badge">Performance Monitoring</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" style="background: var(--bg-secondary);">
    <div class="container">
        <div class="section-header fade-in">
            <h2>Our Development Process</h2>
            <p>We follow a proven methodology to ensure your project is delivered on time, within budget, and exceeds expectations.</p>
        </div>
        <div class="grid-2">
            <div class="glass-card fade-in">
                <h3>01. Discovery</h3>
                <p>We analyze your requirements and define project scope</p>
            </div>
            <div class="glass-card fade-in">
                <h3>02. Design</h3>
                <p>Creating wireframes, prototypes, and technical architecture</p>
            </div>
            <div class="glass-card fade-in">
                <h3>03. Development</h3>
                <p>Agile development with regular updates and feedback</p>
            </div>
            <div class="glass-card fade-in">
                <h3>04. Deployment</h3>
                <p>Testing, optimization, and successful launch</p>
            </div>
        </div>
    </div>
</section>
@endsection
