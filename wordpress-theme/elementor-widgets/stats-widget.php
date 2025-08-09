<?php
/**
 * Stats Widget for Elementor
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Serenity_Stats_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'serenity_stats';
    }

    public function get_title() {
        return __('Stats Counter', 'serenity-clinic');
    }

    public function get_icon() {
        return 'eicon-counter';
    }

    public function get_categories() {
        return ['serenity-clinic'];
    }

    public function get_keywords() {
        return ['stats', 'counter', 'number', 'achievement'];
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
            'stat_icon',
            [
                'label' => __('Icon', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-users',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_control(
            'stat_number',
            [
                'label' => __('Number', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('5000+', 'serenity-clinic'),
                'placeholder' => __('e.g., 1000+', 'serenity-clinic'),
            ]
        );

        $this->add_control(
            'stat_label',
            [
                'label' => __('Label', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Clientes Satisfeitos', 'serenity-clinic'),
                'placeholder' => __('Enter stat label', 'serenity-clinic'),
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
            'icon_color',
            [
                'label' => __('Icon Color', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .stat-icon' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_background',
            [
                'label' => __('Icon Background', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#eab308',
                'selectors' => [
                    '{{WRAPPER}} .stat-icon' => 'background: linear-gradient(135deg, {{VALUE}}, #ca8a04)',
                ],
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label' => __('Number Color', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#334133',
                'selectors' => [
                    '{{WRAPPER}} .stat-number' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'label_color',
            [
                'label' => __('Label Color', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#5f7a5f',
                'selectors' => [
                    '{{WRAPPER}} .stat-label' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        ?>
        <div class="serenity-stats serenity-elementor-widget">
            <?php if (!empty($settings['stat_icon']['value'])) : ?>
                <div class="stat-icon">
                    <?php \Elementor\Icons_Manager::render_icon($settings['stat_icon'], ['aria-hidden' => 'true']); ?>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($settings['stat_number'])) : ?>
                <div class="stat-number"><?php echo esc_html($settings['stat_number']); ?></div>
            <?php endif; ?>
            
            <?php if (!empty($settings['stat_label'])) : ?>
                <div class="stat-label"><?php echo esc_html($settings['stat_label']); ?></div>
            <?php endif; ?>
        </div>
        <?php
    }
}