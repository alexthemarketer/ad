<?php
/**
 * The template for displaying single services
 *
 * @package Serenity_Clinic
 */

get_header(); ?>

<main id="primary" class="site-main single-service">
    <?php while (have_posts()) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('service-single'); ?>>
            
            <!-- Hero Section -->
            <section class="service-hero">
                <div class="container">
                    <div class="service-hero-content">
                        <div class="service-meta">
                            <?php
                            $categories = get_the_terms(get_the_ID(), 'service_category');
                            if ($categories && !is_wp_error($categories)) :
                                foreach ($categories as $category) :
                            ?>
                                <span class="service-category"><?php echo esc_html($category->name); ?></span>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                        
                        <h1 class="service-title"><?php the_title(); ?></h1>
                        
                        <div class="service-summary">
                            <?php
                            $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                            $price = get_post_meta(get_the_ID(), '_service_price', true);
                            ?>
                            
                            <?php if ($duration) : ?>
                                <div class="service-duration">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M16.2,16.2L11,13V7H12.5V12.2L17,14.7L16.2,16.2Z"/>
                                    </svg>
                                    <span><?php echo esc_html($duration); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($price) : ?>
                                <div class="service-price">
                                    <?php echo esc_html($price); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="service-actions">
                            <a href="#booking" class="btn btn-primary btn-large">
                                Agendar Tratamento
                            </a>
                            <a href="<?php echo esc_url(get_theme_mod('contact_phone', '(11) 9999-9999')); ?>" class="btn btn-secondary btn-large">
                                Falar no WhatsApp
                            </a>
                        </div>
                    </div>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="service-hero-image">
                            <?php the_post_thumbnail('serenity-hero'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
            
            <!-- Service Content -->
            <section class="service-content-section">
                <div class="container">
                    <div class="service-content-grid">
                        
                        <!-- Main Content -->
                        <div class="service-main-content">
                            <div class="service-description">
                                <h2>Sobre o Tratamento</h2>
                                <?php the_content(); ?>
                            </div>
                            
                            <?php
                            $benefits = get_post_meta(get_the_ID(), '_service_benefits', true);
                            if ($benefits) :
                                $benefits_array = explode("\n", $benefits);
                            ?>
                                <div class="service-benefits">
                                    <h3>Principais Benefícios</h3>
                                    <ul class="benefits-list">
                                        <?php foreach ($benefits_array as $benefit) : ?>
                                            <?php if (trim($benefit)) : ?>
                                                <li>
                                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                                    </svg>
                                                    <?php echo esc_html(trim($benefit)); ?>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Process Steps -->
                            <div class="service-process">
                                <h3>Como Funciona</h3>
                                <div class="process-steps">
                                    <div class="process-step">
                                        <div class="step-number">1</div>
                                        <div class="step-content">
                                            <h4>Consulta Inicial</h4>
                                            <p>Avaliação personalizada das suas necessidades e expectativas.</p>
                                        </div>
                                    </div>
                                    <div class="process-step">
                                        <div class="step-number">2</div>
                                        <div class="step-content">
                                            <h4>Preparação</h4>
                                            <p>Preparação da pele e aplicação de produtos específicos.</p>
                                        </div>
                                    </div>
                                    <div class="process-step">
                                        <div class="step-number">3</div>
                                        <div class="step-content">
                                            <h4>Tratamento</h4>
                                            <p>Execução do procedimento com técnicas avançadas.</p>
                                        </div>
                                    </div>
                                    <div class="process-step">
                                        <div class="step-number">4</div>
                                        <div class="step-content">
                                            <h4>Cuidados Pós-Tratamento</h4>
                                            <p>Orientações e produtos para potencializar os resultados.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Sidebar -->
                        <div class="service-sidebar">
                            
                            <!-- Service Info Card -->
                            <div class="service-info-card">
                                <h3>Informações do Tratamento</h3>
                                
                                <div class="info-items">
                                    <?php if ($duration) : ?>
                                        <div class="info-item">
                                            <div class="info-icon">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M16.2,16.2L11,13V7H12.5V12.2L17,14.7L16.2,16.2Z"/>
                                                </svg>
                                            </div>
                                            <div class="info-content">
                                                <strong>Duração</strong>
                                                <span><?php echo esc_html($duration); ?></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if ($price) : ?>
                                        <div class="info-item">
                                            <div class="info-icon">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M7,15H9C9,16.08 10.37,17 12,17C13.63,17 15,16.08 15,15C15,13.9 13.96,13.5 11.76,12.97C9.64,12.44 7,11.78 7,9C7,7.21 8.47,5.69 10.5,5.18V3H13.5V5.18C15.53,5.69 17,7.21 17,9H15C15,7.92 13.63,7 12,7C10.37,7 9,7.92 9,9C9,10.1 10.04,10.5 12.24,11.03C14.36,11.56 17,12.22 17,15C17,16.79 15.53,18.31 13.5,18.82V21H10.5V18.82C8.47,18.31 7,16.79 7,15Z"/>
                                                </svg>
                                            </div>
                                            <div class="info-content">
                                                <strong>Investimento</strong>
                                                <span><?php echo esc_html($price); ?></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z"/>
                                            </svg>
                                        </div>
                                        <div class="info-content">
                                            <strong>Local</strong>
                                            <span>Serenity Clinic</span>
                                        </div>
                                    </div>
                                    
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                            </svg>
                                        </div>
                                        <div class="info-content">
                                            <strong>Qualidade</strong>
                                            <span>Premium</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="service-cta">
                                    <a href="#booking" class="btn btn-primary btn-full">
                                        Agendar Agora
                                    </a>
                                    <p class="cta-note">Agendamento rápido e fácil</p>
                                </div>
                            </div>
                            
                            <!-- Related Services -->
                            <?php
                            $related_services = new WP_Query(array(
                                'post_type' => 'services',
                                'posts_per_page' => 3,
                                'post__not_in' => array(get_the_ID()),
                                'orderby' => 'rand'
                            ));
                            
                            if ($related_services->have_posts()) :
                            ?>
                                <div class="related-services">
                                    <h3>Outros Tratamentos</h3>
                                    <div class="related-services-list">
                                        <?php while ($related_services->have_posts()) : $related_services->the_post(); ?>
                                            <div class="related-service-item">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <div class="related-service-image">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php the_post_thumbnail('thumbnail'); ?>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="related-service-content">
                                                    <h4>
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h4>
                                                    <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                                    <?php
                                                    $related_price = get_post_meta(get_the_ID(), '_service_price', true);
                                                    if ($related_price) :
                                                    ?>
                                                        <div class="related-service-price">
                                                            <?php echo esc_html($related_price); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </div>
                                    
                                    <div class="related-services-cta">
                                        <a href="<?php echo get_post_type_archive_link('services'); ?>" class="btn btn-outline">
                                            Ver Todos os Serviços
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Contact Card -->
                            <div class="contact-card">
                                <h3>Dúvidas sobre o Tratamento?</h3>
                                <p>Nossa equipe está pronta para esclarecer todas as suas dúvidas e ajudar você a escolher o melhor tratamento.</p>
                                
                                <div class="contact-options">
                                    <a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '(11) 9999-9999')); ?>" class="contact-option">
                                        <div class="contact-icon">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z"/>
                                            </svg>
                                        </div>
                                        <div class="contact-content">
                                            <strong>Ligar Agora</strong>
                                            <span><?php echo esc_html(get_theme_mod('contact_phone', '(11) 9999-9999')); ?></span>
                                        </div>
                                    </a>
                                    
                                    <a href="#" class="contact-option whatsapp">
                                        <div class="contact-icon">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                            </svg>
                                        </div>
                                        <div class="contact-content">
                                            <strong>WhatsApp</strong>
                                            <span>Resposta rápida</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- FAQ Section -->
            <section class="service-faq">
                <div class="container">
                    <h2>Perguntas Frequentes</h2>
                    <div class="faq-grid">
                        <div class="faq-item">
                            <h3>Quantas sessões são necessárias?</h3>
                            <p>O número de sessões varia de acordo com o tipo de pele e objetivos. Durante a consulta inicial, nossa especialista fará uma avaliação personalizada.</p>
                        </div>
                        <div class="faq-item">
                            <h3>Há alguma contraindicação?</h3>
                            <p>Alguns tratamentos podem ter contraindicações específicas. É importante informar sobre condições de saúde, medicamentos e tratamentos anteriores.</p>
                        </div>
                        <div class="faq-item">
                            <h3>Quando verei os resultados?</h3>
                            <p>Os resultados podem ser percebidos já na primeira sessão, mas o efeito completo geralmente aparece após algumas semanas, dependendo do tratamento.</p>
                        </div>
                        <div class="faq-item">
                            <h3>Preciso de cuidados especiais após o tratamento?</h3>
                            <p>Sim, fornecemos orientações detalhadas sobre cuidados pós-tratamento para potencializar os resultados e garantir sua segurança.</p>
                        </div>
                    </div>
                </div>
            </section>
            
        </article>
        
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>