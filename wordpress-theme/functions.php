<?php
/**
 * Serenity Clinic functions and definitions
 *
 * @package Serenity_Clinic
 */

if (!defined('ABSPATH')) {
    exit;
}

// Theme setup
function serenity_clinic_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'serenity-clinic'),
        'footer' => __('Menu Rodapé', 'serenity-clinic'),
    ));
    
    // Add image sizes
    add_image_size('serenity-hero', 1920, 1080, true);
    add_image_size('serenity-service', 600, 400, true);
    add_image_size('serenity-team', 400, 400, true);
    add_image_size('serenity-gallery', 800, 600, true);
}
add_action('after_setup_theme', 'serenity_clinic_setup');

// Enqueue scripts and styles
function serenity_clinic_scripts() {
    // Google Fonts
    wp_enqueue_style('serenity-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap');
    
    // Theme stylesheet
    wp_enqueue_style('serenity-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Custom CSS
    wp_enqueue_style('serenity-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.0.0');
    
    // JavaScript
    wp_enqueue_script('serenity-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('serenity-main', 'serenity_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('serenity_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'serenity_clinic_scripts');

// Register widget areas
function serenity_clinic_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar Principal', 'serenity-clinic'),
        'id'            => 'sidebar-1',
        'description'   => __('Adicione widgets aqui.', 'serenity-clinic'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Rodapé 1', 'serenity-clinic'),
        'id'            => 'footer-1',
        'description'   => __('Primeira coluna do rodapé.', 'serenity-clinic'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Rodapé 2', 'serenity-clinic'),
        'id'            => 'footer-2',
        'description'   => __('Segunda coluna do rodapé.', 'serenity-clinic'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Rodapé 3', 'serenity-clinic'),
        'id'            => 'footer-3',
        'description'   => __('Terceira coluna do rodapé.', 'serenity-clinic'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'serenity_clinic_widgets_init');

// Custom post types
function serenity_clinic_post_types() {
    // Services post type
    register_post_type('services', array(
        'labels' => array(
            'name' => 'Serviços',
            'singular_name' => 'Serviço',
            'add_new' => 'Adicionar Novo',
            'add_new_item' => 'Adicionar Novo Serviço',
            'edit_item' => 'Editar Serviço',
            'new_item' => 'Novo Serviço',
            'view_item' => 'Ver Serviço',
            'search_items' => 'Buscar Serviços',
            'not_found' => 'Nenhum serviço encontrado',
            'not_found_in_trash' => 'Nenhum serviço encontrado na lixeira',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-admin-tools',
        'rewrite' => array('slug' => 'servicos'),
    ));
    
    // Team post type
    register_post_type('team', array(
        'labels' => array(
            'name' => 'Equipe',
            'singular_name' => 'Membro da Equipe',
            'add_new' => 'Adicionar Novo',
            'add_new_item' => 'Adicionar Novo Membro',
            'edit_item' => 'Editar Membro',
            'new_item' => 'Novo Membro',
            'view_item' => 'Ver Membro',
            'search_items' => 'Buscar Membros',
            'not_found' => 'Nenhum membro encontrado',
            'not_found_in_trash' => 'Nenhum membro encontrado na lixeira',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-groups',
        'rewrite' => array('slug' => 'equipe'),
    ));
    
    // Testimonials post type
    register_post_type('testimonials', array(
        'labels' => array(
            'name' => 'Depoimentos',
            'singular_name' => 'Depoimento',
            'add_new' => 'Adicionar Novo',
            'add_new_item' => 'Adicionar Novo Depoimento',
            'edit_item' => 'Editar Depoimento',
            'new_item' => 'Novo Depoimento',
            'view_item' => 'Ver Depoimento',
            'search_items' => 'Buscar Depoimentos',
            'not_found' => 'Nenhum depoimento encontrado',
            'not_found_in_trash' => 'Nenhum depoimento encontrado na lixeira',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-format-quote',
        'rewrite' => array('slug' => 'depoimentos'),
    ));
}
add_action('init', 'serenity_clinic_post_types');

// Custom taxonomies
function serenity_clinic_taxonomies() {
    // Service categories
    register_taxonomy('service_category', 'services', array(
        'labels' => array(
            'name' => 'Categorias de Serviços',
            'singular_name' => 'Categoria de Serviço',
            'search_items' => 'Buscar Categorias',
            'all_items' => 'Todas as Categorias',
            'edit_item' => 'Editar Categoria',
            'update_item' => 'Atualizar Categoria',
            'add_new_item' => 'Adicionar Nova Categoria',
            'new_item_name' => 'Nome da Nova Categoria',
            'menu_name' => 'Categorias',
        ),
        'hierarchical' => true,
        'public' => true,
        'rewrite' => array('slug' => 'categoria-servico'),
    ));
}
add_action('init', 'serenity_clinic_taxonomies');

// Custom meta boxes
function serenity_clinic_meta_boxes() {
    // Service meta box
    add_meta_box(
        'service_details',
        'Detalhes do Serviço',
        'serenity_service_meta_callback',
        'services',
        'normal',
        'high'
    );
    
    // Team meta box
    add_meta_box(
        'team_details',
        'Detalhes do Profissional',
        'serenity_team_meta_callback',
        'team',
        'normal',
        'high'
    );
    
    // Testimonial meta box
    add_meta_box(
        'testimonial_details',
        'Detalhes do Depoimento',
        'serenity_testimonial_meta_callback',
        'testimonials',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'serenity_clinic_meta_boxes');

// Service meta callback
function serenity_service_meta_callback($post) {
    wp_nonce_field('serenity_service_meta', 'serenity_service_nonce');
    
    $duration = get_post_meta($post->ID, '_service_duration', true);
    $price = get_post_meta($post->ID, '_service_price', true);
    $benefits = get_post_meta($post->ID, '_service_benefits', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="service_duration">Duração:</label></th>';
    echo '<td><input type="text" id="service_duration" name="service_duration" value="' . esc_attr($duration) . '" placeholder="Ex: 60 min" /></td></tr>';
    echo '<tr><th><label for="service_price">Preço:</label></th>';
    echo '<td><input type="text" id="service_price" name="service_price" value="' . esc_attr($price) . '" placeholder="Ex: A partir de R$ 180" /></td></tr>';
    echo '<tr><th><label for="service_benefits">Benefícios:</label></th>';
    echo '<td><textarea id="service_benefits" name="service_benefits" rows="3" placeholder="Um benefício por linha">' . esc_textarea($benefits) . '</textarea></td></tr>';
    echo '</table>';
}

// Team meta callback
function serenity_team_meta_callback($post) {
    wp_nonce_field('serenity_team_meta', 'serenity_team_nonce');
    
    $role = get_post_meta($post->ID, '_team_role', true);
    $specialty = get_post_meta($post->ID, '_team_specialty', true);
    $experience = get_post_meta($post->ID, '_team_experience', true);
    $certifications = get_post_meta($post->ID, '_team_certifications', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="team_role">Cargo:</label></th>';
    echo '<td><input type="text" id="team_role" name="team_role" value="' . esc_attr($role) . '" placeholder="Ex: Diretora Clínica" /></td></tr>';
    echo '<tr><th><label for="team_specialty">Especialidade:</label></th>';
    echo '<td><input type="text" id="team_specialty" name="team_specialty" value="' . esc_attr($specialty) . '" placeholder="Ex: Dermatologia Estética" /></td></tr>';
    echo '<tr><th><label for="team_experience">Experiência:</label></th>';
    echo '<td><input type="text" id="team_experience" name="team_experience" value="' . esc_attr($experience) . '" placeholder="Ex: 15 anos" /></td></tr>';
    echo '<tr><th><label for="team_certifications">Certificações:</label></th>';
    echo '<td><textarea id="team_certifications" name="team_certifications" rows="3" placeholder="Uma certificação por linha">' . esc_textarea($certifications) . '</textarea></td></tr>';
    echo '</table>';
}

// Testimonial meta callback
function serenity_testimonial_meta_callback($post) {
    wp_nonce_field('serenity_testimonial_meta', 'serenity_testimonial_nonce');
    
    $client_age = get_post_meta($post->ID, '_testimonial_age', true);
    $treatment = get_post_meta($post->ID, '_testimonial_treatment', true);
    $rating = get_post_meta($post->ID, '_testimonial_rating', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="testimonial_age">Idade do Cliente:</label></th>';
    echo '<td><input type="text" id="testimonial_age" name="testimonial_age" value="' . esc_attr($client_age) . '" placeholder="Ex: 35 anos" /></td></tr>';
    echo '<tr><th><label for="testimonial_treatment">Tratamento Realizado:</label></th>';
    echo '<td><input type="text" id="testimonial_treatment" name="testimonial_treatment" value="' . esc_attr($treatment) . '" placeholder="Ex: Limpeza de Pele" /></td></tr>';
    echo '<tr><th><label for="testimonial_rating">Avaliação (1-5):</label></th>';
    echo '<td><select id="testimonial_rating" name="testimonial_rating">';
    for ($i = 1; $i <= 5; $i++) {
        echo '<option value="' . $i . '"' . selected($rating, $i, false) . '>' . $i . ' estrela' . ($i > 1 ? 's' : '') . '</option>';
    }
    echo '</select></td></tr>';
    echo '</table>';
}

// Save meta data
function serenity_clinic_save_meta($post_id) {
    // Service meta
    if (isset($_POST['serenity_service_nonce']) && wp_verify_nonce($_POST['serenity_service_nonce'], 'serenity_service_meta')) {
        if (isset($_POST['service_duration'])) {
            update_post_meta($post_id, '_service_duration', sanitize_text_field($_POST['service_duration']));
        }
        if (isset($_POST['service_price'])) {
            update_post_meta($post_id, '_service_price', sanitize_text_field($_POST['service_price']));
        }
        if (isset($_POST['service_benefits'])) {
            update_post_meta($post_id, '_service_benefits', sanitize_textarea_field($_POST['service_benefits']));
        }
    }
    
    // Team meta
    if (isset($_POST['serenity_team_nonce']) && wp_verify_nonce($_POST['serenity_team_nonce'], 'serenity_team_meta')) {
        if (isset($_POST['team_role'])) {
            update_post_meta($post_id, '_team_role', sanitize_text_field($_POST['team_role']));
        }
        if (isset($_POST['team_specialty'])) {
            update_post_meta($post_id, '_team_specialty', sanitize_text_field($_POST['team_specialty']));
        }
        if (isset($_POST['team_experience'])) {
            update_post_meta($post_id, '_team_experience', sanitize_text_field($_POST['team_experience']));
        }
        if (isset($_POST['team_certifications'])) {
            update_post_meta($post_id, '_team_certifications', sanitize_textarea_field($_POST['team_certifications']));
        }
    }
    
    // Testimonial meta
    if (isset($_POST['serenity_testimonial_nonce']) && wp_verify_nonce($_POST['serenity_testimonial_nonce'], 'serenity_testimonial_meta')) {
        if (isset($_POST['testimonial_age'])) {
            update_post_meta($post_id, '_testimonial_age', sanitize_text_field($_POST['testimonial_age']));
        }
        if (isset($_POST['testimonial_treatment'])) {
            update_post_meta($post_id, '_testimonial_treatment', sanitize_text_field($_POST['testimonial_treatment']));
        }
        if (isset($_POST['testimonial_rating'])) {
            update_post_meta($post_id, '_testimonial_rating', intval($_POST['testimonial_rating']));
        }
    }
}
add_action('save_post', 'serenity_clinic_save_meta');

// AJAX handler for booking form
function serenity_handle_booking() {
    check_ajax_referer('serenity_nonce', 'nonce');
    
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $service = sanitize_text_field($_POST['service']);
    $date = sanitize_text_field($_POST['date']);
    $time = sanitize_text_field($_POST['time']);
    $message = sanitize_textarea_field($_POST['message']);
    
    // Save booking to database or send email
    $booking_data = array(
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'service' => $service,
        'date' => $date,
        'time' => $time,
        'message' => $message,
        'status' => 'pending',
        'created_at' => current_time('mysql')
    );
    
    // You can save to custom table or send email here
    
    wp_send_json_success(array('message' => 'Agendamento realizado com sucesso!'));
}
add_action('wp_ajax_serenity_booking', 'serenity_handle_booking');
add_action('wp_ajax_nopriv_serenity_booking', 'serenity_handle_booking');

// Customizer settings
function serenity_clinic_customize_register($wp_customize) {
    // Hero section
    $wp_customize->add_section('serenity_hero', array(
        'title' => __('Seção Hero', 'serenity-clinic'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Desperte sua Beleza Natural',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => __('Título Principal', 'serenity-clinic'),
        'section' => 'serenity_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Experimente tratamentos exclusivos em um ambiente de serenidade e sofisticação.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Subtítulo', 'serenity-clinic'),
        'section' => 'serenity_hero',
        'type' => 'textarea',
    ));
    
    // Contact info
    $wp_customize->add_section('serenity_contact', array(
        'title' => __('Informações de Contato', 'serenity-clinic'),
        'priority' => 35,
    ));
    
    $wp_customize->add_setting('contact_phone', array(
        'default' => '(11) 9999-9999',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label' => __('Telefone', 'serenity-clinic'),
        'section' => 'serenity_contact',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_email', array(
        'default' => 'contato@serenityclinic.com.br',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label' => __('E-mail', 'serenity-clinic'),
        'section' => 'serenity_contact',
        'type' => 'email',
    ));
    
    $wp_customize->add_setting('contact_address', array(
        'default' => 'Rua das Flores, 123 - Jardins, São Paulo - SP',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('contact_address', array(
        'label' => __('Endereço', 'serenity-clinic'),
        'section' => 'serenity_contact',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'serenity_clinic_customize_register');