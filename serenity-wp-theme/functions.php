<?php
/**
 * Serenity Clinic Pro functions and definitions
 *
 * @package Serenity_Clinic_Pro
 */

if (!defined('ABSPATH')) {
    exit;
}

// Theme version
define('SERENITY_VERSION', '2.0.0');

/**
 * Theme setup
 */
function serenity_pro_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // Block editor support
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    
    // Add editor stylesheet
    add_editor_style('assets/css/editor.css');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'serenity-clinic-pro'),
        'footer' => __('Menu Rodapé', 'serenity-clinic-pro'),
        'social' => __('Links Sociais', 'serenity-clinic-pro'),
    ));
    
    // Add image sizes
    add_image_size('serenity-hero', 1920, 1080, true);
    add_image_size('serenity-feature', 400, 300, true);
    add_image_size('serenity-card', 600, 400, true);
    add_image_size('serenity-thumbnail', 300, 200, true);
}
add_action('after_setup_theme', 'serenity_pro_setup');

/**
 * Enqueue scripts and styles
 */
function serenity_pro_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'serenity-fonts', 
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap',
        array(),
        SERENITY_VERSION
    );
    
    // Main stylesheet
    wp_enqueue_style(
        'serenity-style', 
        get_template_directory_uri() . '/assets/css/main.css',
        array('serenity-fonts'),
        SERENITY_VERSION
    );
    
    // Main JavaScript
    wp_enqueue_script(
        'serenity-main', 
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        SERENITY_VERSION,
        true
    );
    
    // Localize script
    wp_localize_script('serenity-main', 'serenity_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('serenity_nonce'),
    ));
    
    // Comments script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'serenity_pro_scripts');

/**
 * Output custom CSS variables in head
 */
function serenity_pro_custom_css() {
    $css_vars = serenity_get_css_variables();
    
    if (!empty($css_vars)) {
        echo '<style id="serenity-custom-css">';
        echo ':root {';
        foreach ($css_vars as $var => $value) {
            echo esc_html($var) . ': ' . esc_html($value) . ';';
        }
        echo '}';
        echo '</style>';
    }
}
add_action('wp_head', 'serenity_pro_custom_css', 5);

/**
 * Get CSS variables from theme options
 */
function serenity_get_css_variables() {
    return array(
        '--color-primary' => get_theme_mod('primary_color', '#eab308'),
        '--color-secondary' => get_theme_mod('secondary_color', '#5f7a5f'),
        '--color-accent' => get_theme_mod('accent_color', '#334133'),
        '--color-background' => get_theme_mod('background_color', '#fefdfb'),
        '--color-text' => get_theme_mod('text_color', '#3d4f3d'),
        '--color-light' => get_theme_mod('light_color', '#f6f7f6'),
        '--color-white' => get_theme_mod('white_color', '#ffffff'),
        '--color-dark' => get_theme_mod('dark_color', '#2b362b'),
    );
}

/**
 * Utility function to get theme color
 */
function get_theme_color($var) {
    $colors = serenity_get_css_variables();
    return isset($colors['--color-' . $var]) ? $colors['--color-' . $var] : '';
}

/**
 * Register widget areas
 */
function serenity_pro_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar Principal', 'serenity-clinic-pro'),
        'id'            => 'sidebar-1',
        'description'   => __('Adicione widgets aqui.', 'serenity-clinic-pro'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Rodapé 1', 'serenity-clinic-pro'),
        'id'            => 'footer-1',
        'description'   => __('Primeira coluna do rodapé.', 'serenity-clinic-pro'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('Rodapé 2', 'serenity-clinic-pro'),
        'id'            => 'footer-2',
        'description'   => __('Segunda coluna do rodapé.', 'serenity-clinic-pro'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('Rodapé 3', 'serenity-clinic-pro'),
        'id'            => 'footer-3',
        'description'   => __('Terceira coluna do rodapé.', 'serenity-clinic-pro'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'serenity_pro_widgets_init');

/**
 * Include customizer file
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Register block patterns
 */
function serenity_pro_register_block_patterns() {
    // Register pattern category
    register_block_pattern_category(
        'serenity-clinic',
        array('label' => __('Serenity Clinic', 'serenity-clinic-pro'))
    );
    
    // Hero pattern
    register_block_pattern(
        'serenity-clinic/hero',
        array(
            'title'       => __('Hero Section', 'serenity-clinic-pro'),
            'description' => __('Hero section with background image and call-to-action', 'serenity-clinic-pro'),
            'content'     => '<!-- wp:cover {"url":"' . get_theme_mod('hero_bg', get_template_directory_uri() . '/assets/img/hero-placeholder.jpg') . '","dimRatio":30,"overlayColor":"background","minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","className":"hero-section"} -->
<div class="wp-block-cover hero-section" style="min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-background-background-color has-background-dim-30 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="' . get_theme_mod('hero_bg', get_template_directory_uri() . '/assets/img/hero-placeholder.jpg') . '" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1,"fontSize":"xxx-large"} -->
<h1 class="wp-block-heading has-text-align-center has-xxx-large-font-size">Desperte sua <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-primary-color">Beleza Natural</mark></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size">Experimente tratamentos exclusivos em um ambiente de serenidade e sofisticação.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","textColor":"white","style":{"border":{"radius":"50px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button" style="border-radius:50px">Agendar Consulta</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->',
            'categories'  => array('serenity-clinic'),
        )
    );
    
    // Features pattern
    register_block_pattern(
        'serenity-clinic/features',
        array(
            'title'       => __('Features Section', 'serenity-clinic-pro'),
            'description' => __('Features section with 3 columns', 'serenity-clinic-pro'),
            'content'     => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"light","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:heading {"textAlign":"center","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size">Nossos <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-primary-color">Diferenciais</mark></h2>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"align":"center","width":"80px","height":"80px","sizeSlug":"thumbnail","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image aligncenter size-thumbnail is-resized" style="border-radius:50%"><img src="' . get_template_directory_uri() . '/assets/img/feature-1-placeholder.jpg" alt="" style="border-radius:50%" width="80" height="80"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="wp-block-heading has-text-align-center">Profissionais Qualificados</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Equipe especializada com anos de experiência em estética.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"align":"center","width":"80px","height":"80px","sizeSlug":"thumbnail","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image aligncenter size-thumbnail is-resized" style="border-radius:50%"><img src="' . get_template_directory_uri() . '/assets/img/feature-2-placeholder.jpg" alt="" style="border-radius:50%" width="80" height="80"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="wp-block-heading has-text-align-center">Tecnologia Avançada</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Equipamentos de última geração para resultados excepcionais.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"align":"center","width":"80px","height":"80px","sizeSlug":"thumbnail","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image aligncenter size-thumbnail is-resized" style="border-radius:50%"><img src="' . get_template_directory_uri() . '/assets/img/feature-3-placeholder.jpg" alt="" style="border-radius:50%" width="80" height="80"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="wp-block-heading has-text-align-center">Ambiente Acolhedor</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Espaço projetado para seu conforto e bem-estar.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
            'categories'  => array('serenity-clinic'),
        )
    );
}
add_action('init', 'serenity_pro_register_block_patterns');

/**
 * Add body classes
 */
function serenity_pro_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'home-page';
    }
    
    if (is_page()) {
        $classes[] = 'page-' . get_post_field('post_name');
    }
    
    return $classes;
}
add_filter('body_class', 'serenity_pro_body_classes');

/**
 * Custom excerpt length
 */
function serenity_pro_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'serenity_pro_excerpt_length');

/**
 * Custom excerpt more
 */
function serenity_pro_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'serenity_pro_excerpt_more');

/**
 * Add theme support for block editor color palette
 */
function serenity_pro_editor_color_palette() {
    add_theme_support('editor-color-palette', array(
        array(
            'name' => __('Primary', 'serenity-clinic-pro'),
            'slug' => 'primary',
            'color' => get_theme_mod('primary_color', '#eab308'),
        ),
        array(
            'name' => __('Secondary', 'serenity-clinic-pro'),
            'slug' => 'secondary',
            'color' => get_theme_mod('secondary_color', '#5f7a5f'),
        ),
        array(
            'name' => __('Accent', 'serenity-clinic-pro'),
            'slug' => 'accent',
            'color' => get_theme_mod('accent_color', '#334133'),
        ),
        array(
            'name' => __('Background', 'serenity-clinic-pro'),
            'slug' => 'background',
            'color' => get_theme_mod('background_color', '#fefdfb'),
        ),
        array(
            'name' => __('Text', 'serenity-clinic-pro'),
            'slug' => 'text',
            'color' => get_theme_mod('text_color', '#3d4f3d'),
        ),
        array(
            'name' => __('Light', 'serenity-clinic-pro'),
            'slug' => 'light',
            'color' => get_theme_mod('light_color', '#f6f7f6'),
        ),
        array(
            'name' => __('White', 'serenity-clinic-pro'),
            'slug' => 'white',
            'color' => '#ffffff',
        ),
        array(
            'name' => __('Dark', 'serenity-clinic-pro'),
            'slug' => 'dark',
            'color' => get_theme_mod('dark_color', '#2b362b'),
        ),
    ));
}
add_action('after_setup_theme', 'serenity_pro_editor_color_palette');

/**
 * Placeholder image function
 */
function serenity_get_placeholder_image($type = 'default', $size = 'full') {
    $placeholders = array(
        'hero' => get_template_directory_uri() . '/assets/img/hero-placeholder.jpg',
        'feature' => get_template_directory_uri() . '/assets/img/feature-placeholder.jpg',
        'cta' => get_template_directory_uri() . '/assets/img/cta-placeholder.jpg',
        'default' => get_template_directory_uri() . '/assets/img/placeholder.jpg',
    );
    
    return isset($placeholders[$type]) ? $placeholders[$type] : $placeholders['default'];
}

/**
 * Get theme image with fallback
 */
function serenity_get_theme_image($option_name, $fallback_type = 'default') {
    $image_url = get_theme_mod($option_name);
    
    if (!$image_url) {
        $image_url = serenity_get_placeholder_image($fallback_type);
    }
    
    return $image_url;
}

/**
 * Custom logo fallback
 */
function serenity_pro_custom_logo() {
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        $logo_url = get_theme_mod('site_logo');
        if ($logo_url) {
            echo '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '" class="custom-logo">';
        } else {
            echo '<div class="site-branding-text">';
            echo '<h1 class="site-title"><a href="' . esc_url(home_url('/')) . '">' . esc_html(get_bloginfo('name')) . '</a></h1>';
            if (get_bloginfo('description')) {
                echo '<p class="site-description">' . esc_html(get_bloginfo('description')) . '</p>';
            }
            echo '</div>';
        }
    }
}

/**
 * Enqueue block editor assets
 */
function serenity_pro_block_editor_assets() {
    wp_enqueue_style(
        'serenity-editor-styles',
        get_template_directory_uri() . '/assets/css/editor.css',
        array(),
        SERENITY_VERSION
    );
}
add_action('enqueue_block_editor_assets', 'serenity_pro_block_editor_assets');

/**
 * Add theme support for responsive embeds
 */
add_theme_support('responsive-embeds');

/**
 * Remove unnecessary WordPress features
 */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

/**
 * Optimize WordPress
 */
function serenity_pro_optimize() {
    // Remove emoji scripts
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    
    // Remove jQuery migrate
    function serenity_remove_jquery_migrate($scripts) {
        if (!is_admin() && isset($scripts->registered['jquery'])) {
            $script = $scripts->registered['jquery'];
            if ($script->deps) {
                $script->deps = array_diff($script->deps, array('jquery-migrate'));
            }
        }
    }
    add_action('wp_default_scripts', 'serenity_remove_jquery_migrate');
}
add_action('init', 'serenity_pro_optimize');

/**
 * Security enhancements
 */
function serenity_pro_security() {
    // Hide WordPress version
    function serenity_remove_version() {
        return '';
    }
    add_filter('the_generator', 'serenity_remove_version');
    
    // Remove version from scripts and styles
    function serenity_remove_version_scripts_styles($src) {
        if (strpos($src, 'ver=')) {
            $src = remove_query_arg('ver', $src);
        }
        return $src;
    }
    add_filter('style_loader_src', 'serenity_remove_version_scripts_styles', 9999);
    add_filter('script_loader_src', 'serenity_remove_version_scripts_styles', 9999);
}
add_action('init', 'serenity_pro_security');

/**
 * Performance optimizations
 */
function serenity_pro_performance() {
    // Defer JavaScript loading
    function serenity_defer_scripts($tag, $handle, $src) {
        $defer_scripts = array('serenity-main');
        
        if (in_array($handle, $defer_scripts)) {
            return str_replace('<script ', '<script defer ', $tag);
        }
        
        return $tag;
    }
    add_filter('script_loader_tag', 'serenity_defer_scripts', 10, 3);
    
    // Preload critical resources
    function serenity_preload_resources() {
        echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/css/main.css" as="style">';
        echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
        echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    }
    add_action('wp_head', 'serenity_preload_resources', 1);
}
add_action('init', 'serenity_pro_performance');