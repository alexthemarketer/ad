<?php
/**
 * Demo Data Importer for Serenity Clinic Theme
 * 
 * This file helps import the demo data from demo-data.json
 * 
 * @package Serenity_Clinic
 */

if (!defined('ABSPATH')) {
    exit;
}

class Serenity_Demo_Importer {
    
    private $demo_data;
    
    public function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('wp_ajax_serenity_import_demo', array($this, 'import_demo_data'));
    }
    
    public function add_admin_menu() {
        add_theme_page(
            'Importar Dados Demo',
            'Dados Demo',
            'manage_options',
            'serenity-demo-import',
            array($this, 'admin_page')
        );
    }
    
    public function admin_page() {
        ?>
        <div class="wrap">
            <h1>Importar Dados Demo - Serenity Clinic</h1>
            <div class="notice notice-info">
                <p><strong>Atenção:</strong> Esta ação irá criar conteúdo de exemplo. Recomendamos fazer backup antes de prosseguir.</p>
            </div>
            
            <div class="card">
                <h2>O que será importado:</h2>
                <ul>
                    <li>✅ 9 Serviços de exemplo</li>
                    <li>✅ 4 Membros da equipe</li>
                    <li>✅ 6 Depoimentos de clientes</li>
                    <li>✅ Páginas principais</li>
                    <li>✅ Categorias de serviços</li>
                    <li>✅ Configurações do tema</li>
                </ul>
            </div>
            
            <p>
                <button id="import-demo-btn" class="button button-primary button-large">
                    Importar Dados Demo
                </button>
                <span id="import-status" style="margin-left: 10px;"></span>
            </p>
            
            <div id="import-log" style="display: none; margin-top: 20px;">
                <h3>Log de Importação:</h3>
                <div id="log-content" style="background: #f1f1f1; padding: 10px; height: 300px; overflow-y: scroll; font-family: monospace; font-size: 12px;"></div>
            </div>
        </div>
        
        <script>
        jQuery(document).ready(function($) {
            $('#import-demo-btn').click(function() {
                var btn = $(this);
                var status = $('#import-status');
                var log = $('#import-log');
                var logContent = $('#log-content');
                
                btn.prop('disabled', true).text('Importando...');
                status.html('<span style="color: orange;">Importando dados...</span>');
                log.show();
                logContent.html('Iniciando importação...\n');
                
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'serenity_import_demo',
                        nonce: '<?php echo wp_create_nonce('serenity_import_demo'); ?>'
                    },
                    success: function(response) {
                        if (response.success) {
                            status.html('<span style="color: green;">✅ Importação concluída com sucesso!</span>');
                            logContent.append('Importação concluída!\n');
                            logContent.append('Você pode agora personalizar o conteúdo conforme necessário.\n');
                        } else {
                            status.html('<span style="color: red;">❌ Erro na importação: ' + response.data + '</span>');
                            logContent.append('ERRO: ' + response.data + '\n');
                        }
                    },
                    error: function() {
                        status.html('<span style="color: red;">❌ Erro de conexão</span>');
                        logContent.append('ERRO: Falha na conexão AJAX\n');
                    },
                    complete: function() {
                        btn.prop('disabled', false).text('Importar Dados Demo');
                    }
                });
            });
        });
        </script>
        <?php
    }
    
    public function import_demo_data() {
        check_ajax_referer('serenity_import_demo', 'nonce');
        
        if (!current_user_can('manage_options')) {
            wp_send_json_error('Permissão negada');
        }
        
        try {
            $demo_file = get_template_directory() . '/demo-data.json';
            
            if (!file_exists($demo_file)) {
                wp_send_json_error('Arquivo demo-data.json não encontrado');
            }
            
            $json_data = file_get_contents($demo_file);
            $this->demo_data = json_decode($json_data, true);
            
            if (!$this->demo_data) {
                wp_send_json_error('Erro ao decodificar JSON');
            }
            
            // Import data
            $this->import_service_categories();
            $this->import_services();
            $this->import_team();
            $this->import_testimonials();
            $this->import_pages();
            $this->import_theme_settings();
            
            wp_send_json_success('Dados importados com sucesso!');
            
        } catch (Exception $e) {
            wp_send_json_error('Erro: ' . $e->getMessage());
        }
    }
    
    private function import_service_categories() {
        if (!isset($this->demo_data['service_categories'])) return;
        
        foreach ($this->demo_data['service_categories'] as $category) {
            if (!term_exists($category['slug'], 'service_category')) {
                wp_insert_term(
                    $category['name'],
                    'service_category',
                    array(
                        'slug' => $category['slug'],
                        'description' => $category['description']
                    )
                );
            }
        }
    }
    
    private function import_services() {
        if (!isset($this->demo_data['services'])) return;
        
        foreach ($this->demo_data['services'] as $service) {
            // Check if post already exists
            $existing = get_page_by_path($service['slug'], OBJECT, 'services');
            if ($existing) continue;
            
            $post_id = wp_insert_post(array(
                'post_title' => $service['title'],
                'post_name' => $service['slug'],
                'post_content' => $service['content'],
                'post_excerpt' => $service['excerpt'],
                'post_type' => 'services',
                'post_status' => $service['status'],
                'meta_input' => array(
                    '_service_duration' => $service['meta']['duration'],
                    '_service_price' => $service['meta']['price'],
                    '_service_benefits' => $service['meta']['benefits']
                )
            ));
            
            if ($post_id && !is_wp_error($post_id)) {
                // Set category
                wp_set_object_terms($post_id, $service['category'], 'service_category');
                
                // Set featured image (you might want to download and attach the image)
                update_post_meta($post_id, '_thumbnail_url', $service['featured_image']);
            }
        }
    }
    
    private function import_team() {
        if (!isset($this->demo_data['team'])) return;
        
        foreach ($this->demo_data['team'] as $member) {
            $existing = get_page_by_path($member['slug'], OBJECT, 'team');
            if ($existing) continue;
            
            $post_id = wp_insert_post(array(
                'post_title' => $member['title'],
                'post_name' => $member['slug'],
                'post_content' => $member['content'],
                'post_type' => 'team',
                'post_status' => $member['status'],
                'meta_input' => array(
                    '_team_role' => $member['meta']['role'],
                    '_team_specialty' => $member['meta']['specialty'],
                    '_team_experience' => $member['meta']['experience'],
                    '_team_certifications' => $member['meta']['certifications']
                )
            ));
            
            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, '_thumbnail_url', $member['featured_image']);
            }
        }
    }
    
    private function import_testimonials() {
        if (!isset($this->demo_data['testimonials'])) return;
        
        foreach ($this->demo_data['testimonials'] as $testimonial) {
            $existing = get_page_by_path($testimonial['slug'], OBJECT, 'testimonials');
            if ($existing) continue;
            
            $post_id = wp_insert_post(array(
                'post_title' => $testimonial['title'],
                'post_name' => $testimonial['slug'],
                'post_content' => $testimonial['content'],
                'post_type' => 'testimonials',
                'post_status' => $testimonial['status'],
                'meta_input' => array(
                    '_testimonial_age' => $testimonial['meta']['age'],
                    '_testimonial_treatment' => $testimonial['meta']['treatment'],
                    '_testimonial_rating' => $testimonial['meta']['rating']
                )
            ));
            
            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, '_thumbnail_url', $testimonial['featured_image']);
            }
        }
    }
    
    private function import_pages() {
        if (!isset($this->demo_data['pages'])) return;
        
        foreach ($this->demo_data['pages'] as $page) {
            $existing = get_page_by_path($page['slug']);
            if ($existing) continue;
            
            $post_data = array(
                'post_title' => $page['title'],
                'post_name' => $page['slug'],
                'post_type' => 'page',
                'post_status' => $page['status']
            );
            
            if (isset($page['content'])) {
                $post_data['post_content'] = $page['content'];
            }
            
            $post_id = wp_insert_post($post_data);
            
            if ($post_id && !is_wp_error($post_id)) {
                // Set as front page if specified
                if (isset($page['is_front_page']) && $page['is_front_page']) {
                    update_option('show_on_front', 'page');
                    update_option('page_on_front', $post_id);
                }
            }
        }
    }
    
    private function import_theme_settings() {
        if (!isset($this->demo_data['customizer_settings'])) return;
        
        foreach ($this->demo_data['customizer_settings'] as $setting => $value) {
            set_theme_mod($setting, $value);
        }
        
        // Update site info
        if (isset($this->demo_data['site_info'])) {
            $site_info = $this->demo_data['site_info'];
            update_option('blogname', $site_info['name']);
            update_option('blogdescription', $site_info['description']);
            update_option('admin_email', $site_info['admin_email']);
        }
    }
}

// Initialize the importer
new Serenity_Demo_Importer();