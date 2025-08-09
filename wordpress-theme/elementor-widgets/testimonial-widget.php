<?php
/**
 * Testimonial Widget for Elementor
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Serenity_Testimonial_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'serenity_testimonial';
    }

    public function get_title() {
        return __('Testimonial', 'serenity-clinic');
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return ['serenity-clinic'];
    }

    public function get_keywords() {
        return ['testimonial', 'review', 'client', 'feedback'];
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
            'client_image',
            [
                'label' => __('Client Photo', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'client_name',
            [
                'label' => __('Client Name', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Maria Fernanda', 'serenity-clinic'),
                'placeholder' => __('Enter client name', 'serenity-clinic'),
            ]
        );

        $this->add_control(
            'client_age',
            [
                'label' => __('Client Age', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('35 anos', 'serenity-clinic'),
                'placeholder' => __('e.g., 30 anos', 'serenity-clinic'),
            ]
        );

        $this->add_control(
            'treatment',
            [
                'label' => __('Treatment', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Tratamento Facial Completo', 'serenity-clinic'),
                'placeholder' => __('Enter treatment name', 'serenity-clinic'),
            ]
        );

        $this->add_control(
            'rating',
            [
                'label' => __('Rating', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '5',
                'options' => [
                    '1' => __('1 Star', 'serenity-clinic'),
                    '2' => __('2 Stars', 'serenity-clinic'),
                    '3' => __('3 Stars', 'serenity-clinic'),
                    '4' => __('4 Stars', 'serenity-clinic'),
                    '5' => __('5 Stars', 'serenity-clinic'),
                ],
            ]
        );

        $this->add_control(
            'testimonial_text',
            [
                'label' => __('Testimonial Text', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('A experiência na Serenity foi transformadora. O ambiente é incrivelmente acolhedor e os profissionais são extremamente qualificados. Minha pele nunca esteve tão radiante!', 'serenity-clinic'),
                'placeholder' => __('Enter testimonial text', 'serenity-clinic'),
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
                    '{{WRAPPER}} .serenity-testimonial' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __('Text Color', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#5f7a5f',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => __('Name Color', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#334133',
                'selectors' => [
                    '{{WRAPPER}} .client-name' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'rating_color',
            [
                'label' => __('Rating Color', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#eab308',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-rating' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        ?>
        <div class="serenity-testimonial serenity-elementor-widget">
            <div class="testimonial-header">
                <div class="quote-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M14,17H17L19,13V7H13V13H16M6,17H9L11,13V7H5V13H8L6,17Z"/>
                    </svg>
                </div>
                <?php if (!empty($settings['rating'])) : ?>
                    <div class="testimonial-rating">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="<?php echo $i <= $settings['rating'] ? 'currentColor' : 'none'; ?>" stroke="currentColor">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="testimonial-content">
                <?php if (!empty($settings['testimonial_text'])) : ?>
                    <p class="testimonial-text">"<?php echo esc_html($settings['testimonial_text']); ?>"</p>
                <?php endif; ?>
            </div>
            
            <div class="testimonial-footer">
                <div class="client-info">
                    <?php if (!empty($settings['client_image']['url'])) : ?>
                        <div class="client-avatar">
                            <img src="<?php echo esc_url($settings['client_image']['url']); ?>" alt="<?php echo esc_attr($settings['client_name']); ?>">
                        </div>
                    <?php endif; ?>
                    <div class="client-details">
                        <?php if (!empty($settings['client_name'])) : ?>
                            <h4 class="client-name"><?php echo esc_html($settings['client_name']); ?></h4>
                        <?php endif; ?>
                        <?php if (!empty($settings['client_age'])) : ?>
                            <p class="client-age"><?php echo esc_html($settings['client_age']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['treatment'])) : ?>
                            <p class="client-treatment"><?php echo esc_html($settings['treatment']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}