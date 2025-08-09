/**
 * Serenity Clinic Main JavaScript
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        initializeTheme();
    });

    // Window Load
    $(window).on('load', function() {
        handleWindowLoad();
    });

    // Window Resize
    $(window).on('resize', function() {
        handleWindowResize();
    });

    // Window Scroll
    $(window).on('scroll', function() {
        handleWindowScroll();
    });

    /**
     * Initialize Theme
     */
    function initializeTheme() {
        initMobileMenu();
        initSmoothScrolling();
        initServiceCategories();
        initBookingForm();
        initGallery();
        initAnimations();
        initContactForm();
        initNewsletterForm();
    }

    /**
     * Handle Window Load
     */
    function handleWindowLoad() {
        // Hide loading spinner if exists
        $('.loading-spinner').fadeOut();
        
        // Trigger scroll animations
        triggerScrollAnimations();
    }

    /**
     * Handle Window Resize
     */
    function handleWindowResize() {
        // Close mobile menu on resize
        if ($(window).width() > 768) {
            $('.main-navigation').removeClass('is-open');
            $('.menu-toggle').removeClass('is-active');
            $('body').removeClass('menu-open');
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
        $('.menu-toggle').on('click', function(e) {
            e.preventDefault();
            
            $(this).toggleClass('is-active');
            $('.main-navigation').toggleClass('is-open');
            $('body').toggleClass('menu-open');
        });

        // Close menu when clicking on a link
        $('.main-navigation a').on('click', function() {
            $('.menu-toggle').removeClass('is-active');
            $('.main-navigation').removeClass('is-open');
            $('body').removeClass('menu-open');
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation, .menu-toggle').length) {
                $('.menu-toggle').removeClass('is-active');
                $('.main-navigation').removeClass('is-open');
                $('body').removeClass('menu-open');
            }
        });
    }

    /**
     * Initialize Smooth Scrolling
     */
    function initSmoothScrolling() {
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            
            const target = $(this.getAttribute('href'));
            if (target.length) {
                const headerHeight = $('.site-header').outerHeight();
                const targetOffset = target.offset().top - headerHeight - 20;
                
                $('html, body').animate({
                    scrollTop: targetOffset
                }, 800, 'easeInOutCubic');
            }
        });
    }

    /**
     * Handle Header Scroll
     */
    function handleHeaderScroll() {
        const header = $('.site-header');
        const scrollTop = $(window).scrollTop();
        
        if (scrollTop > 50) {
            header.addClass('is-scrolled');
        } else {
            header.removeClass('is-scrolled');
        }
    }

    /**
     * Update Active Navigation Item
     */
    function updateActiveNavItem() {
        const scrollTop = $(window).scrollTop();
        const headerHeight = $('.site-header').outerHeight();
        
        $('.nav-menu a[href^="#"]').each(function() {
            const target = $(this.getAttribute('href'));
            if (target.length) {
                const targetTop = target.offset().top - headerHeight - 100;
                const targetBottom = targetTop + target.outerHeight();
                
                if (scrollTop >= targetTop && scrollTop < targetBottom) {
                    $('.nav-menu a').removeClass('active');
                    $(this).addClass('active');
                }
            }
        });
    }

    /**
     * Initialize Service Categories
     */
    function initServiceCategories() {
        $('.category-btn').on('click', function(e) {
            e.preventDefault();
            
            const category = $(this).data('category');
            
            // Update active button
            $('.category-btn').removeClass('active');
            $(this).addClass('active');
            
            // Filter services
            if (category === 'all') {
                $('.service-card').fadeIn();
            } else {
                $('.service-card').hide();
                $(`.service-card[data-category="${category}"]`).fadeIn();
            }
        });
    }

    /**
     * Initialize Booking Form
     */
    function initBookingForm() {
        $('#booking-form').on('submit', function(e) {
            e.preventDefault();
            
            const form = $(this);
            const submitBtn = form.find('button[type="submit"]');
            const originalText = submitBtn.text();
            
            // Validate form
            if (!validateBookingForm(form)) {
                return;
            }
            
            // Show loading state
            submitBtn.text('Enviando...').prop('disabled', true);
            
            // Prepare form data
            const formData = {
                action: 'serenity_booking',
                nonce: serenity_ajax.nonce,
                name: form.find('[name="name"]').val(),
                email: form.find('[name="email"]').val(),
                phone: form.find('[name="phone"]').val(),
                service: form.find('[name="service"]').val(),
                date: form.find('[name="date"]').val(),
                time: form.find('[name="time"]').val(),
                message: form.find('[name="message"]').val()
            };
            
            // Submit form via AJAX
            $.ajax({
                url: serenity_ajax.ajax_url,
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        showBookingSuccess();
                        form[0].reset();
                    } else {
                        showBookingError(response.data.message || 'Erro ao enviar formulário.');
                    }
                },
                error: function() {
                    showBookingError('Erro de conexão. Tente novamente.');
                },
                complete: function() {
                    submitBtn.text(originalText).prop('disabled', false);
                }
            });
        });
        
        // Set minimum date to tomorrow
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        const minDate = tomorrow.toISOString().split('T')[0];
        $('#booking_date').attr('min', minDate);
    }

    /**
     * Validate Booking Form
     */
    function validateBookingForm(form) {
        let isValid = true;
        
        // Remove previous error states
        form.find('.form-group').removeClass('has-error');
        form.find('.error-message').remove();
        
        // Required fields
        const requiredFields = ['name', 'email', 'phone', 'service', 'date', 'time'];
        
        requiredFields.forEach(function(field) {
            const input = form.find(`[name="${field}"]`);
            const value = input.val().trim();
            
            if (!value) {
                showFieldError(input, 'Este campo é obrigatório.');
                isValid = false;
            }
        });
        
        // Email validation
        const email = form.find('[name="email"]').val().trim();
        if (email && !isValidEmail(email)) {
            showFieldError(form.find('[name="email"]'), 'Por favor, insira um e-mail válido.');
            isValid = false;
        }
        
        // Phone validation
        const phone = form.find('[name="phone"]').val().trim();
        if (phone && !isValidPhone(phone)) {
            showFieldError(form.find('[name="phone"]'), 'Por favor, insira um telefone válido.');
            isValid = false;
        }
        
        // Date validation
        const selectedDate = new Date(form.find('[name="date"]').val());
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        
        if (selectedDate <= today) {
            showFieldError(form.find('[name="date"]'), 'Por favor, selecione uma data futura.');
            isValid = false;
        }
        
        return isValid;
    }

    /**
     * Show Field Error
     */
    function showFieldError(input, message) {
        const formGroup = input.closest('.form-group');
        formGroup.addClass('has-error');
        
        const errorElement = $(`<div class="error-message">${message}</div>`);
        formGroup.append(errorElement);
    }

    /**
     * Show Booking Success
     */
    function showBookingSuccess() {
        const successHtml = `
            <div class="booking-success">
                <div class="success-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <h3>Agendamento Realizado!</h3>
                <p>Recebemos sua solicitação de agendamento. Nossa equipe entrará em contato em breve para confirmar sua consulta.</p>
                <div class="next-steps">
                    <p><strong>Próximos passos:</strong></p>
                    <ul>
                        <li>Confirmação por WhatsApp ou telefone</li>
                        <li>Envio de informações preparatórias</li>
                        <li>Lembrete 24h antes da consulta</li>
                    </ul>
                </div>
            </div>
        `;
        
        $('.booking-form-container').html(successHtml);
        
        // Auto-hide after 5 seconds
        setTimeout(function() {
            location.reload();
        }, 5000);
    }

    /**
     * Show Booking Error
     */
    function showBookingError(message) {
        const errorHtml = `
            <div class="booking-error">
                <div class="error-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                </div>
                <p>${message}</p>
            </div>
        `;
        
        // Remove existing error messages
        $('.booking-error').remove();
        
        // Add error message
        $('#booking-form').prepend(errorHtml);
        
        // Auto-hide after 5 seconds
        setTimeout(function() {
            $('.booking-error').fadeOut();
        }, 5000);
    }

    /**
     * Initialize Gallery
     */
    function initGallery() {
        $('.gallery-item').on('click', function() {
            const imageSrc = $(this).find('img').attr('src');
            const imageAlt = $(this).find('img').attr('alt');
            const category = $(this).find('.gallery-category').text();
            
            openLightbox(imageSrc, imageAlt, category);
        });
    }

    /**
     * Open Lightbox
     */
    function openLightbox(imageSrc, imageAlt, category) {
        const lightboxHtml = `
            <div class="lightbox-overlay">
                <div class="lightbox-container">
                    <button class="lightbox-close">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                        </svg>
                    </button>
                    <img src="${imageSrc}" alt="${imageAlt}" class="lightbox-image">
                    <div class="lightbox-info">
                        <span class="lightbox-category">${category}</span>
                        <p class="lightbox-title">${imageAlt}</p>
                    </div>
                </div>
            </div>
        `;
        
        $('body').append(lightboxHtml);
        $('.lightbox-overlay').fadeIn();
        
        // Close lightbox
        $('.lightbox-close, .lightbox-overlay').on('click', function(e) {
            if (e.target === this) {
                $('.lightbox-overlay').fadeOut(function() {
                    $(this).remove();
                });
            }
        });
        
        // Close with ESC key
        $(document).on('keyup.lightbox', function(e) {
            if (e.keyCode === 27) {
                $('.lightbox-overlay').fadeOut(function() {
                    $(this).remove();
                });
                $(document).off('keyup.lightbox');
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
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            
            // Observe elements
            $('.service-card, .team-card, .testimonial-card, .stat-item, .gallery-item').each(function() {
                observer.observe(this);
            });
        }
    }

    /**
     * Trigger Scroll Animations
     */
    function triggerScrollAnimations() {
        const windowTop = $(window).scrollTop();
        const windowBottom = windowTop + $(window).height();
        
        $('.animate-on-scroll').each(function() {
            const elementTop = $(this).offset().top;
            const elementBottom = elementTop + $(this).outerHeight();
            
            if (elementBottom >= windowTop && elementTop <= windowBottom) {
                $(this).addClass('animated');
            }
        });
    }

    /**
     * Initialize Contact Form
     */
    function initContactForm() {
        $('#contact-form').on('submit', function(e) {
            e.preventDefault();
            
            const form = $(this);
            const submitBtn = form.find('button[type="submit"]');
            const originalText = submitBtn.text();
            
            // Show loading state
            submitBtn.text('Enviando...').prop('disabled', true);
            
            // Simulate form submission (replace with actual AJAX call)
            setTimeout(function() {
                alert('Mensagem enviada com sucesso! Entraremos em contato em breve.');
                form[0].reset();
                submitBtn.text(originalText).prop('disabled', false);
            }, 2000);
        });
    }

    /**
     * Initialize Newsletter Form
     */
    function initNewsletterForm() {
        $('.newsletter-form').on('submit', function(e) {
            e.preventDefault();
            
            const form = $(this);
            const email = form.find('input[type="email"]').val();
            const submitBtn = form.find('button[type="submit"]');
            const originalText = submitBtn.text();
            
            if (!isValidEmail(email)) {
                alert('Por favor, insira um e-mail válido.');
                return;
            }
            
            // Show loading state
            submitBtn.text('Inscrevendo...').prop('disabled', true);
            
            // Simulate newsletter subscription (replace with actual AJAX call)
            setTimeout(function() {
                alert('Inscrição realizada com sucesso!');
                form[0].reset();
                submitBtn.text(originalText).prop('disabled', false);
            }, 2000);
        });
    }

    /**
     * Utility Functions
     */
    
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    function isValidPhone(phone) {
        const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
        const cleanPhone = phone.replace(/[\s\-\(\)]/g, '');
        return phoneRegex.test(cleanPhone) && cleanPhone.length >= 10;
    }
    
    function formatPhone(phone) {
        const cleanPhone = phone.replace(/\D/g, '');
        if (cleanPhone.length === 11) {
            return cleanPhone.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
        } else if (cleanPhone.length === 10) {
            return cleanPhone.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
        }
        return phone;
    }
    
    // Phone input formatting
    $('input[type="tel"]').on('input', function() {
        const formatted = formatPhone($(this).val());
        $(this).val(formatted);
    });
    
    // Add easing function for smooth scrolling
    $.easing.easeInOutCubic = function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t + 2) + b;
    };

})(jQuery);

// Vanilla JavaScript for critical functionality
document.addEventListener('DOMContentLoaded', function() {
    
    // Add loading class to body
    document.body.classList.add('loading');
    
    // Remove loading class when page is fully loaded
    window.addEventListener('load', function() {
        document.body.classList.remove('loading');
    });
    
    // Add smooth scrolling behavior
    document.documentElement.style.scrollBehavior = 'smooth';
    
    // Handle form submissions for non-jQuery environments
    const forms = document.querySelectorAll('form');
    forms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn && !submitBtn.disabled) {
                submitBtn.textContent = 'Enviando...';
                submitBtn.disabled = true;
                
                // Re-enable after 5 seconds as fallback
                setTimeout(function() {
                    submitBtn.disabled = false;
                    submitBtn.textContent = submitBtn.getAttribute('data-original-text') || 'Enviar';
                }, 5000);
            }
        });
    });
    
    // Add intersection observer for performance
    if ('IntersectionObserver' in window) {
        const lazyImages = document.querySelectorAll('img[data-src]');
        const imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        lazyImages.forEach(function(img) {
            imageObserver.observe(img);
        });
    }
});