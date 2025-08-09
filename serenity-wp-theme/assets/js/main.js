/**
 * Serenity Clinic Pro - Main JavaScript
 */

(function() {
    'use strict';

    // DOM Ready
    document.addEventListener('DOMContentLoaded', function() {
        initializeTheme();
    });

    // Window Load
    window.addEventListener('load', function() {
        handleWindowLoad();
    });

    // Window Resize
    window.addEventListener('resize', function() {
        handleWindowResize();
    });

    // Window Scroll
    window.addEventListener('scroll', function() {
        handleWindowScroll();
    });

    /**
     * Initialize Theme
     */
    function initializeTheme() {
        initMobileMenu();
        initSmoothScrolling();
        initAnimations();
        initForms();
        initLazyLoading();
        initAccessibility();
    }

    /**
     * Handle Window Load
     */
    function handleWindowLoad() {
        // Hide loading spinner if exists
        const loader = document.querySelector('.loading-spinner');
        if (loader) {
            loader.style.opacity = '0';
            setTimeout(() => loader.remove(), 300);
        }
        
        // Trigger scroll animations
        triggerScrollAnimations();
    }

    /**
     * Handle Window Resize
     */
    function handleWindowResize() {
        // Close mobile menu on resize to desktop
        if (window.innerWidth > 768) {
            const nav = document.querySelector('.main-navigation');
            const toggle = document.querySelector('.menu-toggle');
            
            if (nav) nav.classList.remove('is-open');
            if (toggle) toggle.classList.remove('is-active');
            document.body.classList.remove('menu-open');
        }
    }

    /**
     * Handle Window Scroll
     */
    function handleWindowScroll() {
        handleHeaderScroll();
        triggerScrollAnimations();
        updateActiveNavItem();
    }

    /**
     * Initialize Mobile Menu
     */
    function initMobileMenu() {
        const menuToggle = document.querySelector('.menu-toggle');
        const navigation = document.querySelector('.main-navigation');
        
        if (!menuToggle || !navigation) return;
        
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            
            this.classList.toggle('is-active');
            navigation.classList.toggle('is-open');
            document.body.classList.toggle('menu-open');
            
            // Update aria-expanded
            const isExpanded = this.classList.contains('is-active');
            this.setAttribute('aria-expanded', isExpanded);
        });

        // Close menu when clicking on a link
        const navLinks = document.querySelectorAll('.nav-menu a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                menuToggle.classList.remove('is-active');
                navigation.classList.remove('is-open');
                document.body.classList.remove('menu-open');
                menuToggle.setAttribute('aria-expanded', 'false');
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.main-navigation') && !e.target.closest('.menu-toggle')) {
                menuToggle.classList.remove('is-active');
                navigation.classList.remove('is-open');
                document.body.classList.remove('menu-open');
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        });
        
        // Close menu with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && navigation.classList.contains('is-open')) {
                menuToggle.classList.remove('is-active');
                navigation.classList.remove('is-open');
                document.body.classList.remove('menu-open');
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    /**
     * Initialize Smooth Scrolling
     */
    function initSmoothScrolling() {
        const links = document.querySelectorAll('a[href^="#"]');
        
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') return;
                
                const target = document.querySelector(href);
                if (!target) return;
                
                e.preventDefault();
                
                const headerHeight = document.querySelector('.site-header')?.offsetHeight || 0;
                const targetOffset = target.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetOffset,
                    behavior: 'smooth'
                });
            });
        });
    }

    /**
     * Handle Header Scroll
     */
    function handleHeaderScroll() {
        const header = document.querySelector('.site-header');
        if (!header) return;
        
        const scrollTop = window.pageYOffset;
        
        if (scrollTop > 50) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    }

    /**
     * Update Active Navigation Item
     */
    function updateActiveNavItem() {
        const scrollTop = window.pageYOffset;
        const headerHeight = document.querySelector('.site-header')?.offsetHeight || 0;
        
        const navLinks = document.querySelectorAll('.nav-menu a[href^="#"]');
        
        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            const target = document.querySelector(href);
            
            if (target) {
                const targetTop = target.offsetTop - headerHeight - 100;
                const targetBottom = targetTop + target.offsetHeight;
                
                if (scrollTop >= targetTop && scrollTop < targetBottom) {
                    navLinks.forEach(l => l.classList.remove('active'));
                    link.classList.add('active');
                }
            }
        });
    }

    /**
     * Initialize Animations
     */
    function initAnimations() {
        // Add intersection observer for scroll animations
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                        
                        // Add staggered animation for grid items
                        if (entry.target.classList.contains('feature-item')) {
                            const delay = Array.from(entry.target.parentNode.children).indexOf(entry.target) * 100;
                            entry.target.style.animationDelay = delay + 'ms';
                        }
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            
            // Observe elements
            const animatedElements = document.querySelectorAll('.feature-item, .post-card, .hero-text, .section-header');
            animatedElements.forEach(el => observer.observe(el));
        }
    }

    /**
     * Trigger Scroll Animations
     */
    function triggerScrollAnimations() {
        const windowTop = window.pageYOffset;
        const windowBottom = windowTop + window.innerHeight;
        
        const elements = document.querySelectorAll('.animate-on-scroll');
        elements.forEach(element => {
            const elementTop = element.offsetTop;
            const elementBottom = elementTop + element.offsetHeight;
            
            if (elementBottom >= windowTop && elementTop <= windowBottom) {
                element.classList.add('animated');
            }
        });
    }

    /**
     * Initialize Forms
     */
    function initForms() {
        // Newsletter form
        const newsletterForms = document.querySelectorAll('.newsletter-form');
        newsletterForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const email = this.querySelector('input[type="email"]').value;
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                
                if (!isValidEmail(email)) {
                    showMessage('Por favor, insira um e-mail válido.', 'error');
                    return;
                }
                
                // Show loading state
                submitBtn.textContent = 'Inscrevendo...';
                submitBtn.disabled = true;
                
                // Simulate newsletter subscription
                setTimeout(() => {
                    showMessage('Inscrição realizada com sucesso!', 'success');
                    this.reset();
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            });
        });
        
        // Contact forms
        const contactForms = document.querySelectorAll('.contact-form');
        contactForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                
                // Show loading state
                submitBtn.textContent = 'Enviando...';
                submitBtn.disabled = true;
                
                // Simulate form submission
                setTimeout(() => {
                    showMessage('Mensagem enviada com sucesso! Entraremos em contato em breve.', 'success');
                    this.reset();
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            });
        });
    }

    /**
     * Initialize Lazy Loading
     */
    function initLazyLoading() {
        if ('IntersectionObserver' in window) {
            const lazyImages = document.querySelectorAll('img[data-src]');
            
            const imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        img.classList.add('loaded');
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            lazyImages.forEach(img => imageObserver.observe(img));
        }
    }

    /**
     * Initialize Accessibility
     */
    function initAccessibility() {
        // Skip link functionality
        const skipLink = document.querySelector('.skip-link');
        if (skipLink) {
            skipLink.addEventListener('click', function(e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.focus();
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        }
        
        // Keyboard navigation for buttons
        const buttons = document.querySelectorAll('.btn');
        buttons.forEach(button => {
            button.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    this.click();
                }
            });
        });
    }

    /**
     * Utility Functions
     */
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    function showMessage(message, type = 'info') {
        // Remove existing messages
        const existingMessages = document.querySelectorAll('.theme-message');
        existingMessages.forEach(msg => msg.remove());
        
        // Create message element
        const messageEl = document.createElement('div');
        messageEl.className = `theme-message theme-message-${type}`;
        messageEl.innerHTML = `
            <div class="message-content">
                <span class="message-text">${message}</span>
                <button class="message-close" aria-label="Fechar mensagem">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                    </svg>
                </button>
            </div>
        `;
        
        // Add styles
        messageEl.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
            background: ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#3b82f6'};
            color: white;
            padding: 16px 20px;
            border-radius: 8px;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            max-width: 400px;
            animation: slideInRight 0.3s ease-out;
        `;
        
        // Add to page
        document.body.appendChild(messageEl);
        
        // Close button functionality
        const closeBtn = messageEl.querySelector('.message-close');
        closeBtn.addEventListener('click', () => {
            messageEl.style.animation = 'slideOutRight 0.3s ease-in';
            setTimeout(() => messageEl.remove(), 300);
        });
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            if (messageEl.parentNode) {
                messageEl.style.animation = 'slideOutRight 0.3s ease-in';
                setTimeout(() => messageEl.remove(), 300);
            }
        }, 5000);
    }
    
    // Add CSS animations for messages
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
        
        .message-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }
        
        .message-close {
            background: none;
            border: none;
            color: inherit;
            cursor: pointer;
            padding: 4px;
            border-radius: 4px;
            transition: background-color 0.2s;
        }
        
        .message-close:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
    `;
    document.head.appendChild(style);

    /**
     * Performance optimizations
     */
    
    // Debounce function for scroll events
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // Use debounced scroll handler
    window.addEventListener('scroll', debounce(handleWindowScroll, 10));
    
    // Preload critical resources
    function preloadCriticalResources() {
        const criticalImages = document.querySelectorAll('img[data-critical]');
        criticalImages.forEach(img => {
            const link = document.createElement('link');
            link.rel = 'preload';
            link.as = 'image';
            link.href = img.src || img.dataset.src;
            document.head.appendChild(link);
        });
    }
    
    // Initialize on DOM ready
    preloadCriticalResources();

})();

/**
 * jQuery-dependent functionality (if jQuery is available)
 */
if (typeof jQuery !== 'undefined') {
    jQuery(document).ready(function($) {
        
        // Enhanced form handling with jQuery
        $('.contact-form, .booking-form').on('submit', function(e) {
            e.preventDefault();
            
            const form = $(this);
            const submitBtn = form.find('button[type="submit"]');
            const originalText = submitBtn.text();
            
            // Validate form
            if (!validateForm(form)) {
                return;
            }
            
            // Show loading state
            submitBtn.text('Enviando...').prop('disabled', true);
            
            // Simulate AJAX submission
            setTimeout(function() {
                // Show success message
                form.before('<div class="form-success">Mensagem enviada com sucesso!</div>');
                form[0].reset();
                submitBtn.text(originalText).prop('disabled', false);
                
                // Hide success message after 5 seconds
                setTimeout(function() {
                    $('.form-success').fadeOut();
                }, 5000);
            }, 2000);
        });
        
        function validateForm(form) {
            let isValid = true;
            
            // Remove previous errors
            form.find('.field-error').removeClass('field-error');
            form.find('.error-message').remove();
            
            // Check required fields
            form.find('[required]').each(function() {
                const field = $(this);
                const value = field.val().trim();
                
                if (!value) {
                    field.addClass('field-error');
                    field.after('<span class="error-message">Este campo é obrigatório.</span>');
                    isValid = false;
                }
            });
            
            // Email validation
            const emailField = form.find('input[type="email"]');
            if (emailField.length && emailField.val()) {
                const email = emailField.val().trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                if (!emailRegex.test(email)) {
                    emailField.addClass('field-error');
                    emailField.after('<span class="error-message">Por favor, insira um e-mail válido.</span>');
                    isValid = false;
                }
            }
            
            return isValid;
        }
        
        // Add error styles
        $('<style>')
            .prop('type', 'text/css')
            .html(`
                .field-error {
                    border-color: #ef4444 !important;
                    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
                }
                .error-message {
                    color: #ef4444;
                    font-size: 0.875rem;
                    margin-top: 4px;
                    display: block;
                }
                .form-success {
                    background: #10b981;
                    color: white;
                    padding: 16px;
                    border-radius: 8px;
                    margin-bottom: 20px;
                    text-align: center;
                }
            `)
            .appendTo('head');
    });
}