<?php
/**
 * Team Member Widget for Elementor
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Serenity_Team_Member_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'serenity_team_member';
    }

    public function get_title() {
        return __('Team Member', 'serenity-clinic');
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_categories() {
        return ['serenity-clinic'];
    }

    public function get_keywords() {
        return ['team', 'member', 'doctor', 'staff', 'professional'];
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
            'member_image',
            [
                'label' => __('Member Photo', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'member_name',
            [
                'label' => __('Name', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Dra. Marina Silva', 'serenity-clinic'),
                'placeholder' => __('Enter member name', 'serenity-clinic'),
            ]
        );

        $this->add_control(
            'member_role',
            [
                'label' => __('Role/Position', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Diretora Clínica', 'serenity-clinic'),
                'placeholder' => __('Enter role', 'serenity-clinic'),
            ]
        );

        $this->add_control(
            'member_specialty',
            [
                'label' => __('Specialty', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Dermatologia Estética', 'serenity-clinic'),
                'placeholder' => __('Enter specialty', 'serenity-clinic'),
            ]
        );

        $this->add_control(
            'member_experience',
            [
                'label' => __('Experience', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('15 anos', 'serenity-clinic'),
                'placeholder' => __('e.g., 10 anos', 'serenity-clinic'),
            ]
        );

        $this->add_control(
            'member_bio',
            [
                'label' => __('Biography', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Especialista em dermatologia estética com formação internacional. Pioneira em técnicas avançadas de rejuvenescimento.', 'serenity-clinic'),
                'placeholder' => __('Enter member biography', 'serenity-clinic'),
            ]
        );

        $this->add_control(
            'member_certifications',
            [
                'label' => __('Certifications', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __("CRM 12345-SP\nEspecialista SBD\nFellowship Harvard", 'serenity-clinic'),
                'placeholder' => __('Enter certifications (one per line)', 'serenity-clinic'),
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
                    '{{WRAPPER}} .serenity-team-member' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .member-name' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'role_color',
            [
                'label' => __('Role Color', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#eab308',
                'selectors' => [
                    '{{WRAPPER}} .member-role' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        $certifications = !empty($settings['member_certifications']) ? explode("\n", $settings['member_certifications']) : [];
        
        ?>
        <div class="serenity-team-member serenity-elementor-widget">
            <?php if (!empty($settings['member_image']['url'])) : ?>
                <div class="member-image">
                    <img src="<?php echo esc_url($settings['member_image']['url']); ?>" alt="<?php echo esc_attr($settings['member_name']); ?>">
                    <?php if (!empty($settings['member_experience'])) : ?>
                        <div class="experience-badge">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                            <span><?php echo esc_html($settings['member_experience']); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <div class="member-content">
                <?php if (!empty($settings['member_name'])) : ?>
                    <h3 class="member-name"><?php echo esc_html($settings['member_name']); ?></h3>
                <?php endif; ?>
                
                <?php if (!empty($settings['member_role'])) : ?>
                    <p class="member-role"><?php echo esc_html($settings['member_role']); ?></p>
                <?php endif; ?>
                
                <?php if (!empty($settings['member_specialty'])) : ?>
                    <p class="member-specialty"><?php echo esc_html($settings['member_specialty']); ?></p>
                <?php endif; ?>
                
                <?php if (!empty($settings['member_bio'])) : ?>
                    <div class="member-bio">
                        <p><?php echo esc_html($settings['member_bio']); ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($certifications)) : ?>
                    <div class="member-certifications">
                        <h4><?php echo __('Certificações', 'serenity-clinic'); ?></h4>
                        <ul>
                            <?php foreach (array_slice($certifications, 0, 3) as $certification) : ?>
                                <?php if (trim($certification)) : ?>
                                    <li>
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                        </svg>
                                        <?php echo esc_html(trim($certification)); ?>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($settings['member_specialty'])) : ?>
                    <div class="specialty-badge">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                        <span><?php echo __('Especialista em', 'serenity-clinic'); ?> <?php echo esc_html($settings['member_specialty']); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}