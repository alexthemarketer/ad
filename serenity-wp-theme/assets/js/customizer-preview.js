/**
 * Customizer Live Preview JavaScript
 */

(function($) {
    'use strict';

    // Color controls
    const colorControls = [
        'primary_color',
        'secondary_color', 
        'accent_color',
        'background_color',
        'text_color',
        'light_color',
        'dark_color'
    ];

    colorControls.forEach(function(control) {
        wp.customize(control, function(value) {
            value.bind(function(newval) {
                const cssVar = '--color-' + control.replace('_color', '');
                document.documentElement.style.setProperty(cssVar, newval);
            });
        });
    });

    // Text controls
    wp.customize('hero_title', function(value) {
        value.bind(function(newval) {
            $('.hero-title').html(newval);
        });
    });

    wp.customize('hero_subtitle', function(value) {
        value.bind(function(newval) {
            $('.hero-subtitle').html(newval);
        });
    });

    wp.customize('hero_button_text', function(value) {
        value.bind(function(newval) {
            $('.hero-actions .btn-primary').contents().first().replaceWith(newval);
        });
    });

    wp.customize('features_title', function(value) {
        value.bind(function(newval) {
            $('.features-section .section-title').html(newval);
        });
    });

    wp.customize('cta_title', function(value) {
        value.bind(function(newval) {
            $('.cta-title').html(newval);
        });
    });

    wp.customize('cta_description', function(value) {
        value.bind(function(newval) {
            $('.cta-description').html(newval);
        });
    });

    wp.customize('cta_button_text', function(value) {
        value.bind(function(newval) {
            $('.cta-actions .btn-primary').contents().first().replaceWith(newval);
        });
    });

    // Feature controls
    for (let i = 1; i <= 6; i++) {
        wp.customize(`feature_${i}_title`, function(value) {
            value.bind(function(newval) {
                $(`.feature-item:nth-child(${i}) .feature-title`).html(newval);
            });
        });

        wp.customize(`feature_${i}_desc`, function(value) {
            value.bind(function(newval) {
                $(`.feature-item:nth-child(${i}) .feature-description`).html(newval);
            });
        });
    }

    // Contact info
    wp.customize('contact_phone', function(value) {
        value.bind(function(newval) {
            $('.phone-link span').html(newval);
            $('.phone-link').attr('href', 'tel:' + newval.replace(/[^0-9]/g, ''));
        });
    });

    wp.customize('contact_email', function(value) {
        value.bind(function(newval) {
            $('.contact-info .contact-item:has(svg[viewBox*="20,8"]) span').html(newval);
        });
    });

    wp.customize('contact_address', function(value) {
        value.bind(function(newval) {
            $('.contact-info .contact-item:has(svg[viewBox*="12,11.5"]) span').html(newval);
        });
    });

    wp.customize('business_hours', function(value) {
        value.bind(function(newval) {
            $('.contact-info .contact-item:has(svg[viewBox*="12,2"]) span').html(newval);
        });
    });

    // Image controls
    wp.customize('hero_bg', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.hero-bg-image').attr('src', newval);
            }
        });
    });

    wp.customize('hero_image', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.hero-main-image').attr('src', newval);
            }
        });
    });

    wp.customize('cta_bg', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.cta-bg-image').attr('src', newval);
            }
        });
    });

    // Feature images
    for (let i = 1; i <= 6; i++) {
        wp.customize(`feature_${i}_img`, function(value) {
            value.bind(function(newval) {
                if (newval) {
                    $(`.feature-item:nth-child(${i}) .feature-image`).attr('src', newval);
                }
            });
        });
    }

    // Site logo
    wp.customize('site_logo', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.site-branding .custom-logo').attr('src', newval);
            }
        });
    });

})(jQuery);