/**
 * 7Figure Affiliate Theme JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Mobile Menu Toggle
    const mobileToggle = document.querySelector('.mobile-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (mobileToggle && navMenu) {
        mobileToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            this.setAttribute('aria-expanded', navMenu.classList.contains('active'));
            
            // Change menu icon
            const menuIcon = this.querySelector('.menu-icon');
            if (menuIcon) {
                menuIcon.textContent = navMenu.classList.contains('active') ? '✕' : '☰';
            }
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!mobileToggle.contains(e.target) && !navMenu.contains(e.target)) {
                navMenu.classList.remove('active');
                mobileToggle.setAttribute('aria-expanded', 'false');
                const menuIcon = mobileToggle.querySelector('.menu-icon');
                if (menuIcon) {
                    menuIcon.textContent = '☰';
                }
            }
        });
        
        // Close mobile menu when clicking on menu links
        const menuLinks = navMenu.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', function() {
                navMenu.classList.remove('active');
                mobileToggle.setAttribute('aria-expanded', 'false');
                const menuIcon = mobileToggle.querySelector('.menu-icon');
                if (menuIcon) {
                    menuIcon.textContent = '☰';
                }
            });
        });
    }
    
    // Newsletter Form Submissions
    const newsletterForms = document.querySelectorAll('.newsletter-form, .lead-magnet-form');
    
    newsletterForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const email = formData.get('email');
            const name = formData.get('name') || '';
            
            // Basic email validation
            if (!email || !isValidEmail(email)) {
                showMessage('Please enter a valid email address.', 'error');
                return;
            }
            
            // Show loading state
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.textContent = 'Please wait...';
            submitButton.disabled = true;
            
            // Simulate form submission (replace with actual AJAX call to your email service)
            setTimeout(() => {
                showMessage('Thank you! Check your email for your free 7-Figure Blueprint.', 'success');
                this.reset();
                
                // Reset button
                submitButton.textContent = originalText;
                submitButton.disabled = false;
                
                // Track conversion (you can add your analytics code here)
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'newsletter_signup', {
                        'event_category': 'engagement',
                        'event_label': 'Newsletter Signup'
                    });
                }
            }, 1500);
        });
    });
    
    // Smooth Scrolling for Anchor Links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                
                const headerHeight = document.querySelector('.header')?.offsetHeight || 0;
                const targetPosition = target.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Sticky Header on Scroll
    const header = document.querySelector('.header');
    if (header) {
        let lastScrollTop = 0;
        
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
            
            lastScrollTop = scrollTop;
        });
    }
    
    // Product Card Hover Effects
    const productCards = document.querySelectorAll('.product-card');
    
    productCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
            this.style.boxShadow = '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)';
        });
    });
    
    // FAQ Accordion Functionality (for single product pages)
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const toggle = this.querySelector('.faq-toggle');
            const isOpen = answer.style.maxHeight && answer.style.maxHeight !== '0px';
            
            // Close all other FAQs
            faqQuestions.forEach(otherQuestion => {
                if (otherQuestion !== this) {
                    const otherAnswer = otherQuestion.nextElementSibling;
                    const otherToggle = otherQuestion.querySelector('.faq-toggle');
                    otherAnswer.style.maxHeight = '0px';
                    if (otherToggle) otherToggle.textContent = '+';
                }
            });
            
            // Toggle current FAQ
            if (isOpen) {
                answer.style.maxHeight = '0px';
                if (toggle) toggle.textContent = '+';
            } else {
                answer.style.maxHeight = answer.scrollHeight + 'px';
                if (toggle) toggle.textContent = '-';
            }
        });
    });
    
    // Lazy Loading for Images
    const lazyImages = document.querySelectorAll('img[data-src]');
    
    if (lazyImages.length > 0) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        lazyImages.forEach(img => imageObserver.observe(img));
    }
    
    // Scroll to Top Button
    const scrollToTopButton = createScrollToTopButton();
    if (scrollToTopButton) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollToTopButton.classList.add('show');
            } else {
                scrollToTopButton.classList.remove('show');
            }
        });
    }
    
    // Animation on Scroll (simple version)
    const animateElements = document.querySelectorAll('.animate-on-scroll');
    
    if (animateElements.length > 0) {
        const animationObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        }, {
            threshold: 0.1
        });
        
        animateElements.forEach(el => animationObserver.observe(el));
    }
});

// Utility Functions

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showMessage(message, type = 'success') {
    // Remove existing message
    const existingMessage = document.querySelector('.flash-message');
    if (existingMessage) {
        existingMessage.remove();
    }
    
    // Create new message
    const messageEl = document.createElement('div');
    messageEl.className = `flash-message flash-message-${type}`;
    messageEl.innerHTML = `
        <div class="flash-message-content">
            ${message}
            <button class="flash-message-close">&times;</button>
        </div>
    `;
    
    // Add styles
    messageEl.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 10000;
        max-width: 400px;
        padding: 1rem 1.5rem;
        background: ${type === 'success' ? '#10b981' : '#ef4444'};
        color: white;
        border-radius: 8px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        transform: translateX(100%);
        transition: transform 0.3s ease;
    `;
    
    document.body.appendChild(messageEl);
    
    // Animate in
    setTimeout(() => {
        messageEl.style.transform = 'translateX(0)';
    }, 100);
    
    // Add close functionality
    const closeButton = messageEl.querySelector('.flash-message-close');
    closeButton.addEventListener('click', () => {
        messageEl.style.transform = 'translateX(100%)';
        setTimeout(() => messageEl.remove(), 300);
    });
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (messageEl.parentNode) {
            messageEl.style.transform = 'translateX(100%)';
            setTimeout(() => messageEl.remove(), 300);
        }
    }, 5000);
}

function createScrollToTopButton() {
    const button = document.createElement('button');
    button.innerHTML = '↑';
    button.className = 'scroll-to-top';
    button.setAttribute('aria-label', 'Scroll to top');
    
    button.style.cssText = `
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: var(--accent-orange, #ed8936);
        color: white;
        border: none;
        border-radius: 50%;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(237, 137, 54, 0.3);
    `;
    
    button.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Add show class styles
    const style = document.createElement('style');
    style.textContent = `
        .scroll-to-top.show {
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateY(0) !important;
        }
        .scroll-to-top:hover {
            background: var(--primary-blue, #1a365d) !important;
            transform: translateY(-2px) !important;
        }
    `;
    document.head.appendChild(style);
    
    document.body.appendChild(button);
    return button;
}

// Expose utilities to global scope for use in other scripts
window.SevenFigure = {
    isValidEmail,
    showMessage
};
