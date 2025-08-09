<?php
/**
 * Service Card Widget for Elementor
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Serenity_Service_Card_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'serenity_service_card';
    }

    public function get_title() {
        return __('Service Card', 'serenity-clinic');
    }

    public function get_icon() {
        return 'eicon-info-box';
    }

    public function get_categories() {
        return ['serenity-clinic'];
    }

    public function get_keywords() {
        return ['service', 'card', 'clinic', 'treatment'];
    }

    protected function register_controls() {
        
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'serenity-clinic'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'service_image',
            [
                'label' => __('Service Image', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'service_title',
            [
                'label' => __('Service Title', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Limpeza de Pele Profunda', 'serenity-clinic'),
                'placeholder' => __('Enter service title', 'serenity-clinic'),
            ]
        );

        $this->add_control(
            'service_description',
            [
                'label' => __('Description', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Tratamento completo para remoção de impurezas e renovação celular.', 'serenity-clinic'),
                'placeholder' => __('Enter service description', 'serenity-clinic'),
            ]
        );

        $this->add_control(
            'service_duration',
            [
                'label' => __('Duration', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('90 min', 'serenity-clinic'),
                'placeholder' => __('e.g., 60 min', 'serenity-clinic'),
            ]
        );

        $this->add_control(
            'service_price',
            [
                'label' => __('Price', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('A partir de R$ 180', 'serenity-clinic'),
                'placeholder' => __('e.g., A partir de R$ 150', 'serenity-clinic'),
            ]
        );

        $this->add_control(
            'service_benefits',
            [
                'label' => __('Benefits', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __("Remove impurezas\nRenova a pele\nHidratação profunda", 'serenity-clinic'),
                'placeholder' => __('Enter benefits (one per line)', 'serenity-clinic'),
            ]
        );

        $this->add_control(
            'service_link',
            [
                'label' => __('Service Link', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'serenity-clinic'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'serenity-clinic'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_background',
            [
                'label' => __('Card Background', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .serenity-service-card' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#334133',
                'selectors' => [
                    '{{WRAPPER}} .service-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Description Color', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#5f7a5f',
                'selectors' => [
                    '{{WRAPPER}} .service-description' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'price_color',
            [
                'label' => __('Price Color', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#eab308',
                'selectors' => [
                    '{{WRAPPER}} .service-price' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        $benefits = !empty($settings['service_benefits']) ? explode("\n", $settings['service_benefits']) : [];
        
        ?>
        <div class="serenity-service-card serenity-elementor-widget">
            <?php if (!empty($settings['service_image']['url'])) : ?>
                <div class="service-image">
                    <img src="<?php echo esc_url($settings['service_image']['url']); ?>" alt="<?php echo esc_attr($settings['service_title']); ?>">
                </div>
            <?php endif; ?>
            
            <div class="service-content">
                <?php if (!empty($settings['service_title'])) : ?>
                    <h3 class="service-title"><?php echo esc_html($settings['service_title']); ?></h3>
                <?php endif; ?>
                
                <?php if (!empty($settings['service_description'])) : ?>
                    <p class="service-description"><?php echo esc_html($settings['service_description']); ?></p>
                <?php endif; ?>
                
                <?php if (!empty($benefits)) : ?>
                    <div class="service-benefits">
                        <div class="benefits-tags">
                            <?php foreach (array_slice($benefits, 0, 3) as $benefit) : ?>
                                <?php if (trim($benefit)) : ?>
                                    <span class="benefit-tag"><?php echo esc_html(trim($benefit)); ?></span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <div class="service-meta">
                    <?php if (!empty($settings['service_duration'])) : ?>
                        <div class="service-duration">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M16.2,16.2L11,13V7H12.5V12.2L17,14.7L16.2,16.2Z"/>
                            </svg>
                            <span><?php echo esc_html($settings['service_duration']); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($settings['service_price'])) : ?>
                        <div class="service-price">
                            <?php echo esc_html($settings['service_price']); ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <?php if (!empty($settings['service_link']['url'])) : ?>
                    <a href="<?php echo esc_url($settings['service_link']['url']); ?>" class="btn btn-outline service-btn">
                        <?php echo __('Saiba Mais', 'serenity-clinic'); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}