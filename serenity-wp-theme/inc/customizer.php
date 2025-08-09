<?php
/**
 * Customizer settings for Serenity Clinic Pro
 *
 * @package Serenity_Clinic_Pro
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add customizer settings
 */
function serenity_pro_customize_register($wp_customize) {
    
    // ========================================
    // CORES SECTION
    // ========================================
    $wp_customize->add_section('serenity_colors', array(
        'title' => __('Cores do Site', 'serenity-clinic-pro'),
        'priority' => 30,
        'description' => __('Personalize todas as cores do seu site. As alterações são aplicadas automaticamente.', 'serenity-clinic-pro'),
    ));
    
    // Primary Color
    $wp_customize->add_setting('primary_color', array(
        'default' => '#eab308',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Cor Primária', 'serenity-clinic-pro'),
        'description' => __('Cor principal do site (botões, links, destaques)', 'serenity-clinic-pro'),
        'section' => 'serenity_colors',
        'settings' => 'primary_color',
    )));
    
    // Secondary Color
    $wp_customize->add_setting('secondary_color', array(
        'default' => '#5f7a5f',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label' => __('Cor Secundária', 'serenity-clinic-pro'),
        'description' => __('Cor secundária (elementos de apoio)', 'serenity-clinic-pro'),
        'section' => 'serenity_colors',
        'settings' => 'secondary_color',
    )));
    
    // Accent Color
    $wp_customize->add_setting('accent_color', array(
        'default' => '#334133',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label' => __('Cor de Destaque', 'serenity-clinic-pro'),
        'description' => __('Cor para títulos e elementos importantes', 'serenity-clinic-pro'),
        'section' => 'serenity_colors',
        'settings' => 'accent_color',
    )));
    
    // Background Color
    $wp_customize->add_setting('background_color', array(
        'default' => '#fefdfb',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background_color', array(
        'label' => __('Cor de Fundo', 'serenity-clinic-pro'),
        'description' => __('Cor de fundo principal do site', 'serenity-clinic-pro'),
        'section' => 'serenity_colors',
        'settings' => 'background_color',
    )));
    
    // Text Color
    $wp_customize->add_setting('text_color', array(
        'default' => '#3d4f3d',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(
        'label' => __('Cor do Texto', 'serenity-clinic-pro'),
        'description' => __('Cor principal do texto', 'serenity-clinic-pro'),
        'section' => 'serenity_colors',
        'settings' => 'text_color',
    )));
    
    // Light Color
    $wp_customize->add_setting('light_color', array(
        'default' => '#f6f7f6',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'light_color', array(
        'label' => __('Cor Clara', 'serenity-clinic-pro'),
        'description' => __('Cor para fundos claros e seções alternadas', 'serenity-clinic-pro'),
        'section' => 'serenity_colors',
        'settings' => 'light_color',
    )));
    
    // Dark Color
    $wp_customize->add_setting('dark_color', array(
        'default' => '#2b362b',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dark_color', array(
        'label' => __('Cor Escura', 'serenity-clinic-pro'),
        'description' => __('Cor para rodapé e elementos escuros', 'serenity-clinic-pro'),
        'section' => 'serenity_colors',
        'settings' => 'dark_color',
    )));
    
    // ========================================
    // IMAGENS SECTION
    // ========================================
    $wp_customize->add_section('serenity_images', array(
        'title' => __('Imagens do Site', 'serenity-clinic-pro'),
        'priority' => 35,
        'description' => __('Configure todas as imagens do seu site. Use imagens de alta qualidade para melhor resultado.', 'serenity-clinic-pro'),
    ));
    
    // Site Logo
    $wp_customize->add_setting('site_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'site_logo', array(
        'label' => __('Logo do Site', 'serenity-clinic-pro'),
        'description' => __('Logo principal que aparece no cabeçalho', 'serenity-clinic-pro'),
        'section' => 'serenity_images',
        'settings' => 'site_logo',
    )));
    
    // Hero Background
    $wp_customize->add_setting('hero_bg', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg', array(
        'label' => __('Imagem de Fundo do Hero', 'serenity-clinic-pro'),
        'description' => __('Imagem de fundo da seção principal (recomendado: 1920x1080px)', 'serenity-clinic-pro'),
        'section' => 'serenity_images',
        'settings' => 'hero_bg',
    )));
    
    // Hero Main Image
    $wp_customize->add_setting('hero_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label' => __('Imagem Principal do Hero', 'serenity-clinic-pro'),
        'description' => __('Imagem principal que aparece na seção hero', 'serenity-clinic-pro'),
        'section' => 'serenity_images',
        'settings' => 'hero_image',
    )));
    
    // Feature Images (6 images)
    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("feature_{$i}_img", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'refresh',
        ));
        
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "feature_{$i}_img", array(
            'label' => sprintf(__('Imagem do Diferencial %d', 'serenity-clinic-pro'), $i),
            'description' => sprintf(__('Imagem/ícone para o diferencial %d (recomendado: 400x300px)', 'serenity-clinic-pro'), $i),
            'section' => 'serenity_images',
            'settings' => "feature_{$i}_img",
        )));
    }
    
    // CTA Background
    $wp_customize->add_setting('cta_bg', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cta_bg', array(
        'label' => __('Imagem de Fundo do CTA', 'serenity-clinic-pro'),
        'description' => __('Imagem de fundo da seção de chamada para ação', 'serenity-clinic-pro'),
        'section' => 'serenity_images',
        'settings' => 'cta_bg',
    )));
    
    // ========================================
    // CONTEÚDO SECTION
    // ========================================
    $wp_customize->add_section('serenity_content', array(
        'title' => __('Conteúdo do Site', 'serenity-clinic-pro'),
        'priority' => 40,
        'description' => __('Configure os textos principais do seu site.', 'serenity-clinic-pro'),
    ));
    
    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Desperte sua Beleza Natural',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => __('Título do Hero', 'serenity-clinic-pro'),
        'description' => __('Título principal da página inicial', 'serenity-clinic-pro'),
        'section' => 'serenity_content',
        'type' => 'text',
    ));
    
    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Experimente tratamentos exclusivos em um ambiente de serenidade e sofisticação.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Subtítulo do Hero', 'serenity-clinic-pro'),
        'description' => __('Texto descritivo abaixo do título principal', 'serenity-clinic-pro'),
        'section' => 'serenity_content',
        'type' => 'textarea',
    ));
    
    // Hero Button Text
    $wp_customize->add_setting('hero_button_text', array(
        'default' => 'Agendar Consulta',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('hero_button_text', array(
        'label' => __('Texto do Botão Hero', 'serenity-clinic-pro'),
        'section' => 'serenity_content',
        'type' => 'text',
    ));
    
    // Hero Button Link
    $wp_customize->add_setting('hero_button_link', array(
        'default' => '#contact',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('hero_button_link', array(
        'label' => __('Link do Botão Hero', 'serenity-clinic-pro'),
        'description' => __('URL ou âncora para onde o botão deve levar', 'serenity-clinic-pro'),
        'section' => 'serenity_content',
        'type' => 'url',
    ));
    
    // Features Section Title
    $wp_customize->add_setting('features_title', array(
        'default' => 'Nossos Diferenciais',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('features_title', array(
        'label' => __('Título da Seção Diferenciais', 'serenity-clinic-pro'),
        'section' => 'serenity_content',
        'type' => 'text',
    ));
    
    // Feature Items (6 features)
    for ($i = 1; $i <= 6; $i++) {
        // Feature Title
        $wp_customize->add_setting("feature_{$i}_title", array(
            'default' => "Diferencial {$i}",
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'refresh',
        ));
        
        $wp_customize->add_control("feature_{$i}_title", array(
            'label' => sprintf(__('Título do Diferencial %d', 'serenity-clinic-pro'), $i),
            'section' => 'serenity_content',
            'type' => 'text',
        ));
        
        // Feature Description
        $wp_customize->add_setting("feature_{$i}_desc", array(
            'default' => "Descrição do diferencial {$i}",
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport' => 'refresh',
        ));
        
        $wp_customize->add_control("feature_{$i}_desc", array(
            'label' => sprintf(__('Descrição do Diferencial %d', 'serenity-clinic-pro'), $i),
            'section' => 'serenity_content',
            'type' => 'textarea',
        ));
    }
    
    // CTA Title
    $wp_customize->add_setting('cta_title', array(
        'default' => 'Pronta para se sentir ainda mais bela?',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('cta_title', array(
        'label' => __('Título do CTA', 'serenity-clinic-pro'),
        'section' => 'serenity_content',
        'type' => 'text',
    ));
    
    // CTA Description
    $wp_customize->add_setting('cta_description', array(
        'default' => 'Agende sua consulta e descubra como podemos realçar sua beleza natural.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('cta_description', array(
        'label' => __('Descrição do CTA', 'serenity-clinic-pro'),
        'section' => 'serenity_content',
        'type' => 'textarea',
    ));
    
    // CTA Button Text
    $wp_customize->add_setting('cta_button_text', array(
        'default' => 'Agendar Agora',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('cta_button_text', array(
        'label' => __('Texto do Botão CTA', 'serenity-clinic-pro'),
        'section' => 'serenity_content',
        'type' => 'text',
    ));
    
    // CTA Button Link
    $wp_customize->add_setting('cta_button_link', array(
        'default' => '#contact',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('cta_button_link', array(
        'label' => __('Link do Botão CTA', 'serenity-clinic-pro'),
        'section' => 'serenity_content',
        'type' => 'url',
    ));
    
    // ========================================
    // CONTATO SECTION
    // ========================================
    $wp_customize->add_section('serenity_contact', array(
        'title' => __('Informações de Contato', 'serenity-clinic-pro'),
        'priority' => 45,
        'description' => __('Configure as informações de contato que aparecem no site.', 'serenity-clinic-pro'),
    ));
    
    // Phone
    $wp_customize->add_setting('contact_phone', array(
        'default' => '(11) 99999-9999',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label' => __('Telefone', 'serenity-clinic-pro'),
        'section' => 'serenity_contact',
        'type' => 'text',
    ));
    
    // WhatsApp
    $wp_customize->add_setting('contact_whatsapp', array(
        'default' => '5511999999999',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('contact_whatsapp', array(
        'label' => __('WhatsApp', 'serenity-clinic-pro'),
        'description' => __('Número com código do país (ex: 5511999999999)', 'serenity-clinic-pro'),
        'section' => 'serenity_contact',
        'type' => 'text',
    ));
    
    // Email
    $wp_customize->add_setting('contact_email', array(
        'default' => 'contato@serenityclinic.com.br',
        'sanitize_callback' => 'sanitize_email',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label' => __('E-mail', 'serenity-clinic-pro'),
        'section' => 'serenity_contact',
        'type' => 'email',
    ));
    
    // Address
    $wp_customize->add_setting('contact_address', array(
        'default' => 'Rua das Flores, 123 - Jardins, São Paulo - SP',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('contact_address', array(
        'label' => __('Endereço', 'serenity-clinic-pro'),
        'section' => 'serenity_contact',
        'type' => 'textarea',
    ));
    
    // Business Hours
    $wp_customize->add_setting('business_hours', array(
        'default' => 'Seg-Sex: 9h às 18h | Sáb: 9h às 15h',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('business_hours', array(
        'label' => __('Horário de Funcionamento', 'serenity-clinic-pro'),
        'section' => 'serenity_contact',
        'type' => 'text',
    ));
    
    // ========================================
    // REDES SOCIAIS SECTION
    // ========================================
    $wp_customize->add_section('serenity_social', array(
        'title' => __('Redes Sociais', 'serenity-clinic-pro'),
        'priority' => 50,
        'description' => __('Configure os links das suas redes sociais.', 'serenity-clinic-pro'),
    ));
    
    $social_networks = array(
        'instagram' => 'Instagram',
        'facebook' => 'Facebook',
        'youtube' => 'YouTube',
        'linkedin' => 'LinkedIn',
        'twitter' => 'Twitter',
    );
    
    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting("social_{$network}", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'refresh',
        ));
        
        $wp_customize->add_control("social_{$network}", array(
            'label' => $label,
            'section' => 'serenity_social',
            'type' => 'url',
        ));
    }
    
    // ========================================
    // CONFIGURAÇÕES AVANÇADAS SECTION
    // ========================================
    $wp_customize->add_section('serenity_advanced', array(
        'title' => __('Configurações Avançadas', 'serenity-clinic-pro'),
        'priority' => 55,
        'description' => __('Configurações avançadas do tema.', 'serenity-clinic-pro'),
    ));
    
    // Enable/Disable Animations
    $wp_customize->add_setting('enable_animations', array(
        'default' => true,
        'sanitize_callback' => 'serenity_sanitize_checkbox',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('enable_animations', array(
        'label' => __('Habilitar Animações', 'serenity-clinic-pro'),
        'description' => __('Ativar/desativar animações e transições', 'serenity-clinic-pro'),
        'section' => 'serenity_advanced',
        'type' => 'checkbox',
    ));
    
    // Custom CSS
    $wp_customize->add_setting('custom_css', array(
        'default' => '',
        'sanitize_callback' => 'wp_strip_all_tags',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('custom_css', array(
        'label' => __('CSS Personalizado', 'serenity-clinic-pro'),
        'description' => __('Adicione CSS personalizado aqui', 'serenity-clinic-pro'),
        'section' => 'serenity_advanced',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'serenity_pro_customize_register');

/**
 * Sanitize checkbox
 */
function serenity_sanitize_checkbox($checked) {
    return ((isset($checked) && true == $checked) ? true : false);
}

/**
 * Output custom CSS from customizer
 */
function serenity_pro_customizer_css() {
    $custom_css = get_theme_mod('custom_css', '');
    
    if (!empty($custom_css)) {
        echo '<style id="serenity-customizer-css">';
        echo wp_strip_all_tags($custom_css);
        echo '</style>';
    }
}
add_action('wp_head', 'serenity_pro_customizer_css', 10);

/**
 * Customizer live preview
 */
function serenity_pro_customize_preview_js() {
    wp_enqueue_script(
        'serenity-customizer-preview',
        get_template_directory_uri() . '/assets/js/customizer-preview.js',
        array('customize-preview'),
        SERENITY_VERSION,
        true
    );
}
add_action('customize_preview_init', 'serenity_pro_customize_preview_js');