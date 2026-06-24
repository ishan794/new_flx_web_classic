// Preloader fade out (handles both cached and fresh loads)
function hidePreloader() {
    const preloader = document.getElementById('preloader');
    if (preloader) {
        preloader.classList.add('hidden');
        setTimeout(() => {
            preloader.style.display = 'none';
        }, 500);
    }
}

if (document.readyState === 'complete') {
    hidePreloader();
} else {
    window.addEventListener('load', hidePreloader);
}

document.addEventListener('DOMContentLoaded', () => {
    // Mobile Navigation Toggle
    const mobileToggle = document.getElementById('mobile-toggle');
    const navLinks = document.getElementById('nav-links');

    if (mobileToggle) {
        mobileToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            mobileToggle.classList.toggle('active'); // Could add animation for hamburger icon
        });
    }

    // Scroll Animations (Intersection Observer)
    const faders = document.querySelectorAll('.fade-in');
    
    const appearOptions = {
        threshold: 0.15,
        rootMargin: "0px 0px -50px 0px"
    };

    const appearOnScroll = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (!entry.isIntersecting) {
                return;
            } else {
                entry.target.classList.add('appear');
                observer.unobserve(entry.target);
            }
        });
    }, appearOptions);

    faders.forEach(fader => {
        appearOnScroll.observe(fader);
    });

    // Smooth Scrolling for Nav Links
    const scrollLinks = document.querySelectorAll('.nav-scroll-link');
    
    scrollLinks.forEach(link => {
        link.addEventListener('click', e => {
            // Only intercept if we are on the home page or navigating to an anchor on the same page
            const href = link.getAttribute('href');
            if (href.startsWith('#') || (window.location.pathname === '/' && href.includes('#'))) {
                e.preventDefault();
                const targetId = href.substring(href.indexOf('#') + 1);
                const targetSection = document.getElementById(targetId);
                
                if (targetSection) {
                    // Close mobile menu if open
                    if (navLinks.classList.contains('active')) {
                        navLinks.classList.remove('active');
                        mobileToggle.classList.remove('active');
                    }

                    // Calculate offset for fixed navbar
                    const navElement = document.querySelector('.navbar-wrapper');
                    const navHeight = navElement ? navElement.offsetHeight : 80;
                    const targetPosition = targetSection.getBoundingClientRect().top + window.scrollY - navHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                } else if (window.location.pathname !== '/') {
                    window.location.href = href;
                }
            }
        });
    });

    // Active Link Highlighting on Scroll
    const sections = document.querySelectorAll('main#home, section[id]');
    
    window.addEventListener('scroll', () => {
        let current = '';
        const scrollY = window.pageYOffset;
        const navElement = document.querySelector('.navbar-wrapper');
        const navHeight = navElement ? navElement.offsetHeight : 80;

        sections.forEach(section => {
            const sectionTop = section.offsetTop - navHeight - 100;
            const sectionHeight = section.offsetHeight;
            
            if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                current = section.getAttribute('id');
            }
        });

        scrollLinks.forEach(link => {
            link.classList.remove('active');
            const href = link.getAttribute('href');
            if (href.includes('#' + current) || (current === 'home' && href.endsWith('#home'))) {
                link.classList.add('active');
            }
        });
    });

    // Website Preview Hover Logic
    const previewBtns = document.querySelectorAll('.hover-preview-btn');
    const previewModal = document.getElementById('website-preview-modal');
    const previewIframe = document.getElementById('preview-iframe');
    const previewLoading = document.getElementById('preview-loading');
    const previewUrlText = document.getElementById('preview-url-text');
    let openTimeout;
    let closeTimeout;

    const hideModal = () => {
        previewModal.classList.remove('active');
        document.body.classList.remove('preview-active');
        setTimeout(() => {
            if (!previewModal.classList.contains('active')) {
                previewIframe.src = '';
                previewUrlText.textContent = 'Loading...';
            }
        }, 300);
    };

    if (previewModal && previewIframe) {
        previewBtns.forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                const url = btn.getAttribute('data-preview-url');
                if (!url) return;

                clearTimeout(closeTimeout);
                
                openTimeout = setTimeout(() => {
                    previewUrlText.textContent = url;
                    previewIframe.src = url;
                    previewLoading.style.display = 'flex';
                    previewModal.classList.add('active');
                    document.body.classList.add('preview-active');
                    
                    previewIframe.onload = () => {
                        previewLoading.style.display = 'none';
                    };
                }, 400); // Shorter delay when hovering button specifically
            });

            btn.addEventListener('mouseleave', () => {
                clearTimeout(openTimeout);
                // Give user time to move mouse into the modal
                closeTimeout = setTimeout(() => {
                    hideModal();
                }, 400);
            });
        });

        // Keep modal open if mouse moves into it
        previewModal.addEventListener('mouseenter', () => {
            clearTimeout(closeTimeout);
        });

        // Close modal when mouse leaves it
        previewModal.addEventListener('mouseleave', () => {
            closeTimeout = setTimeout(() => {
                hideModal();
            }, 300);
        });
    }
    // MacBook Scroll Animation
    const mbkLid  = document.getElementById('mbk-lid');
    const mbkCont = document.getElementById('mbk-container');

    if (mbkLid && mbkCont) {
        // Clamp helper
        const clamp = (val, min, max) => Math.min(Math.max(val, min), max);

        // State
        let currentAngle = -75;
        let targetAngle  = -75;
        let rafId        = null;

        const applyAngle = (angle) => {
            mbkLid.style.transform = `rotateX(${angle}deg)`;
            // Subtle neon glow on screen as it opens
            const t = (angle + 75) / 75; // 0 when closed, 1 when open
            const glow = `rgba(59,130,246,${0.1 + t * 0.4})`;
            mbkLid.style.boxShadow = `0 -4px 30px ${glow}`;
        };

        const animate = () => {
            const diff = targetAngle - currentAngle;
            if (Math.abs(diff) < 0.2) {
                currentAngle = targetAngle;
                applyAngle(currentAngle);
                rafId = null;
                return;
            }
            currentAngle += diff * 0.08; // Ease factor
            applyAngle(currentAngle);
            rafId = requestAnimationFrame(animate);
        };

        const setTarget = (angle) => {
            targetAngle = clamp(angle, -75, 0);
            if (!rafId) rafId = requestAnimationFrame(animate);
        };

        // Scroll-driven: map hero scroll progress to lid angle
        const onScroll = () => {
            const heroEl = document.querySelector('.hero');
            if (!heroEl) return;
            const heroRect = heroEl.getBoundingClientRect();
            const heroH    = heroEl.offsetHeight;
            // scrolled distance into the hero (0 at top, 1 at bottom)
            const progress = clamp(-heroRect.top / heroH, 0, 1);
            // Map 0→1 scroll progress to -75→0 angle
            setTarget(-75 + progress * 75);
        };

        window.addEventListener('scroll', onScroll, { passive: true });

        // Auto-open on page load with a smooth timed animation
        let autoAngle = -75;
        const autoOpen = () => {
            autoAngle = Math.min(autoAngle + 1.5, 0);
            applyAngle(autoAngle);
            currentAngle = autoAngle;
            targetAngle  = autoAngle;
            if (autoAngle < 0) requestAnimationFrame(autoOpen);
        };
        setTimeout(() => requestAnimationFrame(autoOpen), 800);
    }
});
