<section id="contact" class="py-16 lg:py-24 bg-navy-dark">
    <div class="container max-w-7xl mx-auto px-6">
        
        <div class="text-center mb-16 scroll-animate">
            <span class="text-accent text-sm tracking-widest uppercase font-semibold block mb-4">GET IN TOUCH</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">Ready to Start Your Project?</h2>
            <p class="text-gray-400 max-w-2xl mx-auto text-base leading-relaxed">
                Ready to start your next project? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            
            <!-- Left: Contact Form -->
            <div class="bg-navy-mid border border-white/10 rounded-2xl p-8 scroll-animate">
                <h3 class="text-white font-semibold text-xl">Send us a Message</h3>
                <p class="text-gray-400 text-sm mt-1 mb-6">Fill out the form below and we'll get back to you within 24 hours.</p>

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                    @csrf

                    @if(session('success'))
                        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 px-4 py-3 rounded-lg flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span class="text-sm font-medium">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-red-500/10 border border-red-500/20 text-red-500 px-4 py-3 rounded-lg">
                            <ul class="list-disc list-inside text-sm font-medium">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <input type="text" name="name" placeholder="John Doe" value="{{ old('name') }}" required
                            class="w-full bg-navy-deep border border-white/10 rounded-xl px-5 py-3 text-white placeholder-gray-500 focus:border-accent focus:outline-none focus:ring-1 focus:ring-accent transition">
                    </div>
                    
                    <div>
                        <input type="email" name="email" placeholder="john@example.com" value="{{ old('email') }}" required
                            class="w-full bg-navy-deep border border-white/10 rounded-xl px-5 py-3 text-white placeholder-gray-500 focus:border-accent focus:outline-none focus:ring-1 focus:ring-accent transition">
                    </div>

                    <div>
                        <input type="text" name="subject" placeholder="Project inquiry / General question" value="{{ old('subject') }}" required
                            class="w-full bg-navy-deep border border-white/10 rounded-xl px-5 py-3 text-white placeholder-gray-500 focus:border-accent focus:outline-none focus:ring-1 focus:ring-accent transition">
                    </div>

                    <div>
                        <textarea name="message" rows="5" placeholder="Tell us about your project, timeline, budget, and any specific requirements..." required
                            class="w-full bg-navy-deep border border-white/10 rounded-xl px-5 py-3 text-white placeholder-gray-500 focus:border-accent focus:outline-none focus:ring-1 focus:ring-accent transition">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="w-full bg-accent hover:bg-accent-light text-white font-medium py-3 rounded-xl transition duration-200">
                        Send Message &rarr;
                    </button>
                </form>
            </div>

            <!-- Right: Contact Info & FAQ -->
            <div class="scroll-animate" style="transition-delay: 100ms;">
                <h3 class="text-white font-semibold text-xl">Contact Information</h3>
                <p class="text-gray-400 text-sm mt-1">Get in touch through any of these channels</p>

                <div class="mt-8 space-y-6">
                    <!-- Email -->
                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center text-accent flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        </div>
                        <div>
                            <div class="text-white font-medium">Email Us</div>
                            <div class="text-accent">hello@flxwaretech.com</div>
                            <div class="text-gray-400 text-sm">Send us an email anytime</div>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center text-accent flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div>
                            <div class="text-white font-medium">Call Us</div>
                            <div class="text-white">+971 50 739 0610</div>
                            <div class="text-gray-400 text-sm">Mon-Fri from 9am to 6pm</div>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center text-accent flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div>
                            <div class="text-white font-medium">Locations</div>
                            <div class="text-white">USA, Sri Lanka</div>
                            <div class="text-gray-400 text-sm">Global presence with local expertise</div>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center text-accent flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <div class="w-full">
                            <div class="text-white font-medium mb-2">Office Hours</div>
                            <div class="grid grid-cols-2 text-sm">
                                <div class="text-gray-400 border-b border-white/5 py-1">Monday - Friday</div>
                                <div class="text-white border-b border-white/5 py-1">9:00 AM - 6:00 PM PST</div>
                                <div class="text-gray-400 border-b border-white/5 py-1">Saturday</div>
                                <div class="text-white border-b border-white/5 py-1">10:00 AM - 4:00 PM PST</div>
                                <div class="text-gray-400 py-1">Sunday</div>
                                <div class="text-white py-1">Closed</div>
                            </div>
                            <div class="text-accent text-sm mt-2">Emergency support available 24/7 for existing clients</div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Accordion -->
                <div class="mt-12" x-data="{ active: null }">
                    <h3 class="text-white font-semibold text-lg mb-4">Frequently Asked Questions</h3>
                    
                    <div class="border-b border-white/10">
                        <button @click="active = active === 1 ? null : 1" class="w-full text-left py-4 flex justify-between items-center text-white font-medium cursor-pointer">
                            What's your typical project timeline?
                            <svg :class="{'rotate-180': active === 1}" class="transition-transform duration-200 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                        </button>
                        <div x-show="active === 1" x-collapse>
                            <div class="text-gray-400 text-sm pb-4">
                                Project timelines vary based on complexity, but most projects range from 2-6 months. We provide detailed timelines during our initial consultation.
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-white/10">
                        <button @click="active = active === 2 ? null : 2" class="w-full text-left py-4 flex justify-between items-center text-white font-medium cursor-pointer">
                            Do you provide ongoing support?
                            <svg :class="{'rotate-180': active === 2}" class="transition-transform duration-200 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                        </button>
                        <div x-show="active === 2" x-collapse>
                            <div class="text-gray-400 text-sm pb-4">
                                Yes, we offer comprehensive maintenance and support packages to ensure your application continues to perform optimally after launch.
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-white/10">
                        <button @click="active = active === 3 ? null : 3" class="w-full text-left py-4 flex justify-between items-center text-white font-medium cursor-pointer">
                            What technologies do you specialize in?
                            <svg :class="{'rotate-180': active === 3}" class="transition-transform duration-200 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                        </button>
                        <div x-show="active === 3" x-collapse>
                            <div class="text-gray-400 text-sm pb-4">
                                We specialize in React, React Native, Node.js, Python, and cloud platforms like AWS. We choose technologies based on your specific needs.
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-white/10">
                        <button @click="active = active === 4 ? null : 4" class="w-full text-left py-4 flex justify-between items-center text-white font-medium cursor-pointer">
                            How do you handle project communication?
                            <svg :class="{'rotate-180': active === 4}" class="transition-transform duration-200 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                        </button>
                        <div x-show="active === 4" x-collapse>
                            <div class="text-gray-400 text-sm pb-4">
                                We provide regular updates through your preferred communication channels, including weekly progress reports and milestone reviews.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>

        <!-- CTA Banner -->
        <div class="mt-16 w-full bg-gradient-to-r from-accent to-blue-700 rounded-2xl p-10 text-center scroll-animate" style="transition-delay: 200ms;">
            <h2 class="text-white text-3xl font-bold">Ready to Start Your Project?</h2>
            <p class="text-white/80 mt-2 max-w-2xl mx-auto">
                Let's discuss how we can help bring your software vision to life. Contact us today for a free consultation.
            </p>
            <a href="#contact" class="inline-block bg-white text-accent font-semibold px-8 py-3 rounded-lg hover:bg-gray-100 transition-colors mt-6 shadow-md">
                Get Free Consultation &rarr;
            </a>
        </div>

    </div>
</section>
