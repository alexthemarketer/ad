<?php
/**
 * Booking Form Widget for Elementor
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Serenity_Booking_Form_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'serenity_booking_form';
    }

    public function get_title() {
        return __('Booking Form', 'serenity-clinic');
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    public function get_categories() {
        return ['serenity-clinic'];
    }

    public function get_keywords() {
        return ['booking', 'form', 'appointment', 'schedule'];
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
            'form_title',
            [
                'label' => __('Form Title', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Agende sua Consulta', 'serenity-clinic'),
                'placeholder' => __('Enter form title', 'serenity-clinic'),
            ]
        );

        $this->add_control(
            'form_description',
            [
                'label' => __('Form Description', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Preencha o formulário abaixo e nossa equipe entrará em contato para confirmar seu agendamento.', 'serenity-clinic'),
                'placeholder' => __('Enter form description', 'serenity-clinic'),
            ]
        );

        $this->add_control(
            'services_list',
            [
                'label' => __('Services List', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __("Limpeza de Pele Profunda\nPeeling Químico\nHidratação Facial Premium\nDrenagem Linfática\nModelagem Corporal\nMicroagulhamento\nRadiofrequência\nMassagem Relaxante\nAromaterapia\nConsulta Personalizada", 'serenity-clinic'),
                'placeholder' => __('Enter services (one per line)', 'serenity-clinic'),
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
            'form_background',
            [
                'label' => __('Form Background', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .serenity-booking-form' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .form-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __('Button Color', 'serenity-clinic'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#eab308',
                'selectors' => [
                    '{{WRAPPER}} .submit-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        $services = !empty($settings['services_list']) ? explode("\n", $settings['services_list']) : [];
        
        ?>
        <div class="serenity-booking-form serenity-elementor-widget">
            <?php if (!empty($settings['form_title'])) : ?>
                <h3 class="form-title"><?php echo esc_html($settings['form_title']); ?></h3>
            <?php endif; ?>
            
            <?php if (!empty($settings['form_description'])) : ?>
                <p class="form-description"><?php echo esc_html($settings['form_description']); ?></p>
            <?php endif; ?>
            
            <form class="booking-form" method="post" action="">
                <?php wp_nonce_field('serenity_booking_nonce', 'booking_nonce'); ?>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="booking_name"><?php echo __('Nome Completo *', 'serenity-clinic'); ?></label>
                        <input type="text" id="booking_name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="booking_phone"><?php echo __('Telefone *', 'serenity-clinic'); ?></label>
                        <input type="tel" id="booking_phone" name="phone" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="booking_email"><?php echo __('E-mail *', 'serenity-clinic'); ?></label>
                    <input type="email" id="booking_email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="booking_service"><?php echo __('Serviço Desejado *', 'serenity-clinic'); ?></label>
                    <select id="booking_service" name="service" required>
                        <option value=""><?php echo __('Selecione um serviço', 'serenity-clinic'); ?></option>
                        <?php foreach ($services as $service) : ?>
                            <?php if (trim($service)) : ?>
                                <option value="<?php echo esc_attr(trim($service)); ?>"><?php echo esc_html(trim($service)); ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="booking_date"><?php echo __('Data Preferida *', 'serenity-clinic'); ?></label>
                        <input type="date" id="booking_date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="booking_time"><?php echo __('Horário Preferido *', 'serenity-clinic'); ?></label>
                        <select id="booking_time" name="time" required>
                            <option value=""><?php echo __('Selecione um horário', 'serenity-clinic'); ?></option>
                            <option value="09:00">09:00</option>
                            <option value="09:30">09:30</option>
                            <option value="10:00">10:00</option>
                            <option value="10:30">10:30</option>
                            <option value="11:00">11:00</option>
                            <option value="11:30">11:30</option>
                            <option value="14:00">14:00</option>
                            <option value="14:30">14:30</option>
                            <option value="15:00">15:00</option>
                            <option value="15:30">15:30</option>
                            <option value="16:00">16:00</option>
                            <option value="16:30">16:30</option>
                            <option value="17:00">17:00</option>
                            <option value="17:30">17:30</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="booking_message"><?php echo __('Observações', 'serenity-clinic'); ?></label>
                    <textarea id="booking_message" name="message" rows="4" placeholder="<?php echo esc_attr(__('Conte-nos sobre suas expectativas, histórico de tratamentos ou qualquer informação relevante...', 'serenity-clinic')); ?>"></textarea>
                </div>
                
                <button type="submit" class="submit-btn">
                    <?php echo __('Solicitar Agendamento', 'serenity-clinic'); ?>
                </button>
                
                <p class="form-note">
                    <?php echo __('* Campos obrigatórios. Ao enviar este formulário, você concorda com nossa política de privacidade.', 'serenity-clinic'); ?>
                </p>
            </form>
        </div>
        
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set minimum date to tomorrow
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            const minDate = tomorrow.toISOString().split('T')[0];
            document.getElementById('booking_date').setAttribute('min', minDate);
        });
        </script>
        <?php
    }
}