// 7Figure Affiliate Theme JavaScript

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        initializeTheme();
    });

    function initializeTheme() {
        initMobileMenu();
        initNewsletterForm();
        initSmoothScroll();
        initProductCarousel();
        initScrollAnimations();
    }

    // Mobile Menu Toggle
    function initMobileMenu() {
        // Add mobile menu toggle button if it doesn't exist
        if (!$('.mobile-menu-toggle').length) {
            $('.header-content').append('<button class="mobile-menu-toggle" aria-label="Toggle mobile menu"><span></span><span></span><span></span></button>');
        }

        $('.mobile-menu-toggle').on('click', function() {
            $(this).toggleClass('active');
            $('.main-navigation').toggleClass('mobile-active');
        });

        // Close mobile menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation, .mobile-menu-toggle').length) {
                $('.mobile-menu-toggle').removeClass('active');
                $('.main-navigation').removeClass('mobile-active');
            }
        });
    }

    // Newsletter Form Handling
    function initNewsletterForm() {
        $('.newsletter-form').on('submit', function(e) {
            e.preventDefault();
            
            var $form = $(this);
            var $email = $form.find('input[type="email"]');
            var $button = $form.find('button[type="submit"]');
            var email = $email.val();

            // Basic email validation
            if (!isValidEmail(email)) {
                showMessage('Please enter a valid email address.', 'error');
                return;
            }

            // Disable form during submission
            $button.prop('disabled', true).text('Subscribing...');

            // Simulate AJAX request (replace with actual endpoint)
            setTimeout(function() {
                showMessage('Thank you for subscribing! Check your email for exclusive content.', 'success');
                $form[0].reset();
                $button.prop('disabled', false).text('Get My Free Secrets');
            }, 1500);
        });
    }

    // Smooth Scrolling for Anchor Links
    function initSmoothScroll() {
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            
            if (target.length) {
                e.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 80
                }, 1000, 'easeInOutExpo');
            }
        });
    }

    // Product Carousel (if needed)
    function initProductCarousel() {
        if ($('.products-grid').length) {
            // Add hover effects for product cards
            $('.product-card').hover(
                function() {
                    $(this).addClass('hovered');
                },
                function() {
                    $(this).removeClass('hovered');
                }
            );
        }
    }

    // Scroll Animations
    function initScrollAnimations() {
        // Animate elements on scroll
        $(window).on('scroll', function() {
            var scrollTop = $(window).scrollTop();
            var windowHeight = $(window).height();

            // Add header background on scroll
            if (scrollTop > 50) {
                $('.site-header').addClass('scrolled');
            } else {
                $('.site-header').removeClass('scrolled');
            }

            // Animate elements when they come into view
            $('.stat-item, .product-card, .blog-post, .testimonial-card').each(function() {
                var $element = $(this);
                var elementTop = $element.offset().top;

                if (!$element.hasClass('animated') && (elementTop < scrollTop + windowHeight - 100)) {
                    $element.addClass('animated fadeInUp');
                }
            });
        });

        // Trigger scroll event on load
        $(window).trigger('scroll');
    }

    // Utility Functions
    function isValidEmail(email) {
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function showMessage(message, type) {
        // Remove existing messages
        $('.notification-message').remove();

        // Create new message
        var messageHtml = '<div class="notification-message notification-' + type + '">' + message + '</div>';
        $('body').append(messageHtml);

        var $message = $('.notification-message');
        
        // Show message with animation
        setTimeout(function() {
            $message.addClass('show');
        }, 100);

        // Hide message after 5 seconds
        setTimeout(function() {
            $message.removeClass('show');
            setTimeout(
