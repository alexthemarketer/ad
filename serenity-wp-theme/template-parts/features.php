<?php
/**
 * Template part for displaying the features section
 *
 * @package Serenity_Clinic_Pro
 */

$features_title = get_theme_mod('features_title', 'Nossos Diferenciais');
?>

<section id="features" class="features-section">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle"><?php esc_html_e('Por que escolher', 'serenity-clinic-pro'); ?></span>
            <h2 class="section-title">
                <?php 
                // Split title to highlight last word
                $title_parts = explode(' ', $features_title);
                $last_word = array_pop($title_parts);
                $first_words = implode(' ', $title_parts);
                
                echo esc_html($first_words);
                if ($last_word) {
                    echo ' <span class="text-accent">' . esc_html($last_word) . '</span>';
                }
                ?>
            </h2>
            <p class="section-description">
                <?php esc_html_e('Conheça os diferenciais que fazem da Serenity Clinic a escolha ideal para seus cuidados estéticos.', 'serenity-clinic-pro'); ?>
            </p>
        </div>
        
        <div class="features-grid">
            <?php for ($i = 1; $i <= 6; $i++) : ?>
                <?php 
                $feature_title = get_theme_mod("feature_{$i}_title", "Diferencial {$i}");
                $feature_desc = get_theme_mod("feature_{$i}_desc", "Descrição do diferencial {$i}");
                $feature_img = serenity_get_theme_image("feature_{$i}_img", 'feature');
                ?>
                
                <div class="feature-item" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($i * 100); ?>">
                    <div class="feature-icon">
                        <img src="<?php echo esc_url($feature_img); ?>" alt="<?php echo esc_attr($feature_title); ?>" class="feature-image">
                    </div>
                    <div class="feature-content">
                        <h3 class="feature-title"><?php echo esc_html($feature_title); ?></h3>
                        <p class="feature-description"><?php echo esc_html($feature_desc); ?></p>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>