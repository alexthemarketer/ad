<?php
/**
 * Template part for displaying the hero section
 *
 * @package Serenity_Clinic_Pro
 */

$hero_bg = serenity_get_theme_image('hero_bg', 'hero');
$hero_image = serenity_get_theme_image('hero_image', 'hero');
$hero_title = get_theme_mod('hero_title', 'Desperte sua Beleza Natural');
$hero_subtitle = get_theme_mod('hero_subtitle', 'Experimente tratamentos exclusivos em um ambiente de serenidade e sofisticação.');
$hero_button_text = get_theme_mod('hero_button_text', 'Agendar Consulta');
$hero_button_link = get_theme_mod('hero_button_link', '#contact');
?>

<section id="hero" class="hero-section">
    <div class="hero-background">
        <img src="<?php echo esc_url($hero_bg); ?>" alt="<?php esc_attr_e('Serenity Clinic', 'serenity-clinic-pro'); ?>" class="hero-bg-image">
        <div class="hero-overlay"></div>
    </div>
    
    <div class="hero-content">
        <div class="container">
            <div class="hero-grid">
                <div class="hero-text">
                    <div class="hero-badge">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.46,13.97L5.82,21L12,17.27Z"/>
                        </svg>
                        <span><?php esc_html_e('Estética de Alto Padrão', 'serenity-clinic-pro'); ?></span>
                    </div>
                    
                    <h1 class="hero-title">
                        <?php 
                        // Split title to highlight last words
                        $title_parts = explode(' ', $hero_title);
                        $last_words = array_slice($title_parts, -2);
                        $first_words = array_slice($title_parts, 0, -2);
                        
                        echo esc_html(implode(' ', $first_words));
                        if (!empty($last_words)) {
                            echo ' <span class="text-accent">' . esc_html(implode(' ', $last_words)) . '</span>';
                        }
                        ?>
                    </h1>
                    
                    <p class="hero-subtitle"><?php echo esc_html($hero_subtitle); ?></p>
                    
                    <div class="hero-actions">
                        <a href="<?php echo esc_url($hero_button_link); ?>" class="btn btn-primary btn-large">
                            <?php echo esc_html($hero_button_text); ?>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"/>
                            </svg>
                        </a>
                        <a href="#features" class="btn btn-secondary btn-large">
                            <?php esc_html_e('Saiba Mais', 'serenity-clinic-pro'); ?>
                        </a>
                    </div>
                </div>
                
                <?php if ($hero_image && $hero_image !== $hero_bg) : ?>
                    <div class="hero-image">
                        <img src="<?php echo esc_url($hero_image); ?>" alt="<?php esc_attr_e('Serenity Clinic', 'serenity-clinic-pro'); ?>" class="hero-main-image">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div class="scroll-indicator">
        <div class="scroll-mouse">
            <div class="scroll-wheel"></div>
        </div>
    </div>
</section>