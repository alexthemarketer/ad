<?php
/**
 * The front page template file
 *
 * @package Serenity_Clinic
 */

get_header(); ?>

<main id="primary" class="site-main front-page">
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-background">
            <?php 
            $hero_image = get_theme_mod('hero_background_image');
            if ($hero_image) : ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="Hero Background" class="hero-bg-image">
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-bg.jpg" alt="Luxury spa interior" class="hero-bg-image">
            <?php endif; ?>
            <div class="hero-overlay"></div>
        </div>
        
        <div class="hero-content">
            <div class="container">
                <div class="hero-text">
                    <div class="hero-badge">
                        <span>Estética de Alto Padrão</span>
                    </div>
                    
                    <h1 class="hero-title">
                        <?php echo esc_html(get_theme_mod('hero_title', 'Desperte sua Beleza Natural')); ?>
                    </h1>
                    
                    <p class="hero-subtitle">
                        <?php echo esc_html(get_theme_mod('hero_subtitle', 'Experimente tratamentos exclusivos em um ambiente de serenidade e sofisticação. Sua jornada de bem-estar começa aqui.')); ?>
                    </p>
                    
                    <div class="hero-actions">
                        <a href="#booking" class="btn btn-primary btn-large">
                            Agendar Consulta
                        </a>
                        <a href="#services" class="btn btn-secondary btn-large">
                            Nossos Serviços
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="scroll-indicator">
            <div class="scroll-mouse">
                <div class="scroll-wheel"></div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="about-grid">
                <div class="about-content">
                    <div class="section-header">
                        <span class="section-subtitle">Sobre a Serenity</span>
                        <h2 class="section-title">
                            Excelência em
                            <span class="text-accent">Cuidados Estéticos</span>
                        </h2>
                    </div>
                    
                    <div class="about-text">
                        <p>Há mais de 15 anos, a Serenity Clinic tem sido referência em tratamentos estéticos de alto padrão, combinando técnicas avançadas com um ambiente de serenidade e sofisticação única.</p>
                        
                        <p>Nossa filosofia é baseada na crença de que cada pessoa possui uma beleza natural única. Trabalhamos para realçar essa beleza através de tratamentos personalizados, sempre respeitando a individualidade e os desejos de cada cliente.</p>
                        
                        <p>Com uma equipe de profissionais altamente qualificados e equipamentos de última geração, oferecemos uma experiência completa de bem-estar e renovação em um ambiente acolhedor e luxuoso.</p>
                    </div>
                    
                    <div class="about-values">
                        <div class="value-item">
                            <h4>Nossa Missão</h4>
                            <p>Proporcionar experiências transformadoras através de cuidados estéticos personalizados.</p>
                        </div>
                        <div class="value-item">
                            <h4>Nossos Valores</h4>
                            <p>Excelência, ética, inovação e respeito à individualidade de cada cliente.</p>
                        </div>
                    </div>
                </div>
                
                <div class="about-images">
                    <div class="image-grid">
                        <div class="image-column">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-1.jpg" alt="Recepção da clínica" class="about-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-2.jpg" alt="Sala de tratamento" class="about-image">
                        </div>
                        <div class="image-column offset">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-3.jpg" alt="Ambiente relaxante" class="about-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-4.jpg" alt="Detalhes da decoração" class="about-image">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Stats -->
            <div class="stats-section">
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zM4 18v-4h2v-2.5c0-1.1.9-2 2-2h2V8c0-1.1.9-2 2-2h2c1.1 0 2 .9 2 2v1.5h2c1.1 0 2 .9 2 2V14h2v4H4z"/>
                            </svg>
                        </div>
                        <div class="stat-number">5000+</div>
                        <div class="stat-label">Clientes Satisfeitos</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <div class="stat-number">15+</div>
                        <div class="stat-label">Anos de Experiência</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                        </div>
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Taxa de Satisfação</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Tratamentos Exclusivos</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle">Nossos Serviços</span>
                <h2 class="section-title">
                    Tratamentos
                    <span class="text-accent">Exclusivos</span>
                </h2>
                <p class="section-description">
                    Descubra nossa seleção de tratamentos personalizados, desenvolvidos para realçar sua beleza natural e proporcionar momentos únicos de bem-estar.
                </p>
            </div>
            
            <div class="service-categories">
                <button class="category-btn active" data-category="all">Todos</button>
                <button class="category-btn" data-category="facial">Tratamentos Faciais</button>
                <button class="category-btn" data-category="corporal">Tratamentos Corporais</button>
                <button class="category-btn" data-category="estetica">Procedimentos Estéticos</button>
                <button class="category-btn" data-category="relaxamento">Relaxamento</button>
            </div>
            
            <div class="services-grid">
                <?php
                $services = new WP_Query(array(
                    'post_type' => 'services',
                    'posts_per_page' => 6,
                    'post_status' => 'publish'
                ));
                
                if ($services->have_posts()) :
                    while ($services->have_posts()) : $services->the_post();
                        $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                        $price = get_post_meta(get_the_ID(), '_service_price', true);
                        $benefits = get_post_meta(get_the_ID(), '_service_benefits', true);
                        $benefits_array = $benefits ? explode("\n", $benefits) : array();
                ?>
                <div class="service-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="service-image">
                            <?php the_post_thumbnail('serenity-service'); ?>
                            <div class="service-badge">
                                <span>Premium</span>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="service-image">
                            <img src="https://images.pexels.com/photos/3985163/pexels-photo-3985163.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&fit=crop" alt="<?php the_title(); ?>" />
                            <div class="service-badge">
                                <span>Premium</span>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="service-content">
                        <h3 class="service-title"><?php the_title(); ?></h3>
                        <p class="service-description"><?php echo has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20); ?></p>
                        
                        <?php if (!empty($benefits_array)) : ?>
                            <div class="service-benefits">
                                <h4>Benefícios:</h4>
                                <div class="benefits-tags">
                                    <?php foreach (array_slice($benefits_array, 0, 3) as $benefit) : ?>
                                        <span class="benefit-tag"><?php echo esc_html(trim($benefit)); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <div class="service-meta">
                            <?php if ($duration) : ?>
                                <div class="service-duration">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
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
                        
                        <a href="#booking" class="btn btn-outline service-btn">
                            Agendar Tratamento
                        </a>
                    </div>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Show default services if none exist
                    $default_services = array(
                        array(
                            'title' => 'Limpeza de Pele Profunda',
                            'description' => 'Tratamento completo para remoção de impurezas e renovação celular.',
                            'duration' => '90 min',
                            'price' => 'A partir de R$ 180',
                            'benefits' => array('Remove impurezas', 'Renova a pele', 'Hidratação profunda')
                        ),
                        array(
                            'title' => 'Peeling Químico',
                            'description' => 'Renovação celular através de ácidos específicos para cada tipo de pele.',
                            'duration' => '60 min',
                            'price' => 'A partir de R$ 250',
                            'benefits' => array('Renovação celular', 'Reduz manchas', 'Melhora textura')
                        ),
                        array(
                            'title' => 'Hidratação Facial Premium',
                            'description' => 'Tratamento intensivo com ativos de alta performance.',
                            'duration' => '75 min',
                            'price' => 'A partir de R$ 220',
                            'benefits' => array('Hidratação intensa', 'Anti-idade', 'Luminosidade')
                        )
                    );
                    
                    foreach ($default_services as $service) :
                ?>
                    <div class="service-card">
                        <div class="service-image">
                            <img src="https://images.pexels.com/photos/3985163/pexels-photo-3985163.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&fit=crop" alt="<?php echo esc_attr($service['title']); ?>" />
                            <div class="service-badge">
                                <span>Premium</span>
                            </div>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title"><?php echo esc_html($service['title']); ?></h3>
                            <p class="service-description"><?php echo esc_html($service['description']); ?></p>
                            <div class="service-benefits">
                                <h4>Benefícios:</h4>
                                <div class="benefits-tags">
                                    <?php foreach ($service['benefits'] as $benefit) : ?>
                                        <span class="benefit-tag"><?php echo esc_html($benefit); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="service-meta">
                                <div class="service-duration">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M16.2,16.2L11,13V7H12.5V12.2L17,14.7L16.2,16.2Z"/>
                                    </svg>
                                    <span><?php echo esc_html($service['duration']); ?></span>
                                </div>
                                <div class="service-price">
                                    <?php echo esc_html($service['price']); ?>
                                </div>
                            </div>
                            <a href="#booking" class="btn btn-outline service-btn">
                                Agendar Tratamento
                            </a>
                        </div>
                    </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
            
            <div class="services-cta">
                <h3>Não encontrou o que procura?</h3>
                <p>Entre em contato conosco para uma consulta personalizada e descubra o tratamento ideal para você.</p>
                <a href="#contact" class="btn btn-primary">Falar com Especialista</a>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle">Nossa Galeria</span>
                <h2 class="section-title">
                    Conheça nosso
                    <span class="text-accent">Espaço</span>
                </h2>
                <p class="section-description">
                    Um ambiente cuidadosamente projetado para proporcionar serenidade, conforto e uma experiência única de bem-estar em cada visita.
                </p>
            </div>
            
            <div class="gallery-grid">
                <div class="gallery-item large">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-1.jpg" alt="Recepção elegante da clínica">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <span class="gallery-category">Ambiente</span>
                            <p class="gallery-title">Recepção elegante da clínica</p>
                        </div>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-2.jpg" alt="Sala de tratamento facial">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <span class="gallery-category">Tratamentos</span>
                            <p class="gallery-title">Sala de tratamento facial</p>
                        </div>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-3.jpg" alt="Ambiente de relaxamento">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <span class="gallery-category">Ambiente</span>
                            <p class="gallery-title">Ambiente de relaxamento</p>
                        </div>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-4.jpg" alt="Detalhes da decoração">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <span class="gallery-category">Detalhes</span>
                            <p class="gallery-title">Detalhes da decoração</p>
                        </div>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-5.jpg" alt="Sala de massagem">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <span class="gallery-category">Tratamentos</span>
                            <p class="gallery-title">Sala de massagem</p>
                        </div>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-6.jpg" alt="Área de descanso">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <span class="gallery-category">Ambiente</span>
                            <p class="gallery-title">Área de descanso</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="gallery-cta">
                <h3>Venha nos conhecer pessoalmente</h3>
                <p>Agende uma visita e conheça nosso espaço exclusivo projetado para o seu bem-estar.</p>
                <a href="#contact" class="btn btn-primary">Agendar Visita</a>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="team-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle">Nossa Equipe</span>
                <h2 class="section-title">
                    Profissionais
                    <span class="text-accent">Especializados</span>
                </h2>
                <p class="section-description">
                    Nossa equipe é formada por profissionais altamente qualificados, comprometidos em oferecer os melhores cuidados estéticos com excelência e dedicação.
                </p>
            </div>
            
            <div class="team-grid">
                <?php
                $team = new WP_Query(array(
                    'post_type' => 'team',
                    'posts_per_page' => 4,
                    'post_status' => 'publish'
                ));
                
                if ($team->have_posts()) :
                    while ($team->have_posts()) : $team->the_post();
                        $role = get_post_meta(get_the_ID(), '_team_role', true);
                        $specialty = get_post_meta(get_the_ID(), '_team_specialty', true);
                        $experience = get_post_meta(get_the_ID(), '_team_experience', true);
                        $certifications = get_post_meta(get_the_ID(), '_team_certifications', true);
                        $certifications_array = $certifications ? explode("\n", $certifications) : array();
                ?>
                <div class="team-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="team-image">
                            <?php the_post_thumbnail('serenity-team'); ?>
                            <?php if ($experience) : ?>
                                <div class="experience-badge">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                    <span><?php echo esc_html($experience); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="team-content">
                        <h3 class="team-name"><?php the_title(); ?></h3>
                        <?php if ($role) : ?>
                            <p class="team-role"><?php echo esc_html($role); ?></p>
                        <?php endif; ?>
                        <?php if ($specialty) : ?>
                            <p class="team-specialty"><?php echo esc_html($specialty); ?></p>
                        <?php endif; ?>
                        
                        <div class="team-bio">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <?php if (!empty($certifications_array)) : ?>
                            <div class="team-certifications">
                                <h4>Certificações</h4>
                                <ul>
                                    <?php foreach (array_slice($certifications_array, 0, 3) as $certification) : ?>
                                        <li>
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                            </svg>
                                            <?php echo esc_html(trim($certification)); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($specialty) : ?>
                            <div class="specialty-badge">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                </svg>
                                <span>Especialista em <?php echo esc_html($specialty); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle">Depoimentos</span>
                <h2 class="section-title">
                    O que nossos
                    <span class="text-accent">Clientes dizem</span>
                </h2>
                <p class="section-description">
                    A satisfação dos nossos clientes é nossa maior conquista. Veja o que eles têm a dizer sobre sua experiência na Serenity Clinic.
                </p>
            </div>
            
            <div class="testimonials-grid">
                <?php
                $testimonials = new WP_Query(array(
                    'post_type' => 'testimonials',
                    'posts_per_page' => 6,
                    'post_status' => 'publish'
                ));
                
                if ($testimonials->have_posts()) :
                    while ($testimonials->have_posts()) : $testimonials->the_post();
                        $client_age = get_post_meta(get_the_ID(), '_testimonial_age', true);
                        $treatment = get_post_meta(get_the_ID(), '_testimonial_treatment', true);
                        $rating = get_post_meta(get_the_ID(), '_testimonial_rating', true);
                ?>
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="quote-icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14,17H17L19,13V7H13V13H16M6,17H9L11,13V7H5V13H8L6,17Z"/>
                            </svg>
                        </div>
                        <?php if ($rating) : ?>
                            <div class="testimonial-rating">
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="<?php echo $i <= $rating ? 'currentColor' : 'none'; ?>" stroke="currentColor">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="testimonial-content">
                        <p>"<?php the_content(); ?>"</p>
                    </div>
                    
                    <div class="testimonial-footer">
                        <div class="client-info">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="client-avatar">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="client-details">
                                <h4 class="client-name"><?php the_title(); ?></h4>
                                <?php if ($client_age) : ?>
                                    <p class="client-age"><?php echo esc_html($client_age); ?></p>
                                <?php endif; ?>
                                <?php if ($treatment) : ?>
                                    <p class="client-treatment"><?php echo esc_html($treatment); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Booking Section -->
    <section id="booking" class="booking-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle">Agendamento</span>
                <h2 class="section-title">
                    Agende sua
                    <span class="text-accent">Consulta</span>
                </h2>
                <p class="section-description">
                    Preencha o formulário abaixo e nossa equipe entrará em contato para confirmar seu agendamento e esclarecer qualquer dúvida.
                </p>
            </div>
            
            <div class="booking-grid">
                <div class="booking-form-container">
                    <form id="booking-form" class="booking-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="booking_name">Nome Completo *</label>
                                <input type="text" id="booking_name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="booking_phone">Telefone *</label>
                                <input type="tel" id="booking_phone" name="phone" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="booking_email">E-mail *</label>
                            <input type="email" id="booking_email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="booking_service">Serviço Desejado *</label>
                            <select id="booking_service" name="service" required>
                                <option value="">Selecione um serviço</option>
                                <option value="limpeza-pele">Limpeza de Pele Profunda</option>
                                <option value="peeling-quimico">Peeling Químico</option>
                                <option value="hidratacao-facial">Hidratação Facial Premium</option>
                                <option value="drenagem-linfatica">Drenagem Linfática</option>
                                <option value="modelagem-corporal">Modelagem Corporal</option>
                                <option value="microagulhamento">Microagulhamento</option>
                                <option value="radiofrequencia">Radiofrequência</option>
                                <option value="massagem-relaxante">Massagem Relaxante</option>
                                <option value="aromaterapia">Aromaterapia</option>
                                <option value="consulta-personalizada">Consulta Personalizada</option>
                            </select>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="booking_date">Data Preferida *</label>
                                <input type="date" id="booking_date" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="booking_time">Horário Preferido *</label>
                                <select id="booking_time" name="time" required>
                                    <option value="">Selecione um horário</option>
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
                            <label for="booking_message">Observações</label>
                            <textarea id="booking_message" name="message" rows="4" placeholder="Conte-nos sobre suas expectativas, histórico de tratamentos ou qualquer informação relevante..."></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-large btn-full">
                            Solicitar Agendamento
                        </button>
                        
                        <p class="form-note">* Campos obrigatórios. Ao enviar este formulário, você concorda com nossa política de privacidade.</p>
                    </form>
                </div>
                
                <div class="booking-info">
                    <div class="info-card">
                        <h3>Informações de Contato</h3>
                        <div class="contact-items">
                            <div class="contact-item">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z"/>
                                </svg>
                                <div>
                                    <p><strong><?php echo esc_html(get_theme_mod('contact_phone', '(11) 9999-9999')); ?></strong></p>
                                    <p>WhatsApp disponível</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z"/>
                                </svg>
                                <div>
                                    <p><strong><?php echo esc_html(get_theme_mod('contact_email', 'contato@serenityclinic.com.br')); ?></strong></p>
                                    <p>Resposta em até 24h</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M16.2,16.2L11,13V7H12.5V12.2L17,14.7L16.2,16.2Z"/>
                                </svg>
                                <div>
                                    <p><strong>Seg - Sex: 9h às 18h</strong></p>
                                    <p>Sáb: 9h às 15h</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="info-card">
                        <h3>Como Funciona</h3>
                        <div class="process-steps">
                            <div class="process-step">
                                <div class="step-number">1</div>
                                <div class="step-content">
                                    <h4>Preencha o Formulário</h4>
                                    <p>Informe seus dados e preferências</p>
                                </div>
                            </div>
                            <div class="process-step">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <h4>Confirmação</h4>
                                    <p>Nossa equipe entrará em contato</p>
                                </div>
                            </div>
                            <div class="process-step">
                                <div class="step-number">3</div>
                                <div class="step-content">
                                    <h4>Sua Consulta</h4>
                                    <p>Desfrute da experiência Serenity</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="info-card special-offer">
                        <h3>Oferta Especial</h3>
                        <p><strong>20% de desconto</strong> na primeira consulta para novos clientes. Válido até o final do mês!</p>
                        <p class="offer-note">*Desconto aplicável apenas em tratamentos selecionados. Consulte condições.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle">Contato</span>
                <h2 class="section-title">
                    Entre em
                    <span class="text-accent">Contato</span>
                </h2>
                <p class="section-description">
                    Estamos aqui para esclarecer suas dúvidas e ajudá-la a escolher o melhor tratamento. Entre em contato através dos canais abaixo.
                </p>
            </div>
            
            <div class="contact-grid">
                <div class="contact-info">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z"/>
                            </svg>
                        </div>
                        <div class="contact-content">
                            <h3>Localização</h3>
                            <p><?php echo esc_html(get_theme_mod('contact_address', 'Rua das Flores, 123 - Jardins, São Paulo - SP, 01234-567')); ?></p>
                            <p>Próximo ao Shopping Iguatemi</p>
                            <a href="#" class="contact-link">Ver no Google Maps →</a>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z"/>
                            </svg>
                        </div>
                        <div class="contact-content">
                            <h3>Telefone</h3>
                            <p><?php echo esc_html(get_theme_mod('contact_phone', '(11) 9999-9999')); ?></p>
                            <p>Atendimento de segunda a sexta, das 9h às 18h<br>Sábados das 9h às 15h</p>
                            <div class="contact-actions">
                                <a href="#" class="btn btn-small btn-success">WhatsApp</a>
                                <a href="#" class="btn btn-small btn-outline">Ligar Agora</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z"/>
                            </svg>
                        </div>
                        <div class="contact-content">
                            <h3>E-mail</h3>
                            <p><?php echo esc_html(get_theme_mod('contact_email', 'contato@serenityclinic.com.br')); ?></p>
                            <p>Resposta garantida em até 24 horas<br>Para dúvidas, agendamentos e informações</p>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M16.2,16.2L11,13V7H12.5V12.2L17,14.7L16.2,16.2Z"/>
                            </svg>
                        </div>
                        <div class="contact-content">
                            <h3>Horário de Funcionamento</h3>
                            <div class="business-hours">
                                <div class="hours-item">
                                    <span>Segunda - Sexta:</span>
                                    <span>9h às 18h</span>
                                </div>
                                <div class="hours-item">
                                    <span>Sábado:</span>
                                    <span>9h às 15h</span>
                                </div>
                                <div class="hours-item">
                                    <span>Domingo:</span>
                                    <span>Fechado</span>
                                </div>
                            </div>
                            <p class="hours-note">*Atendimento mediante agendamento prévio</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-extras">
                    <div class="map-container">
                        <div class="map-placeholder">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z"/>
                            </svg>
                            <p>Mapa Interativo</p>
                            <p>Rua das Flores, 123 - Jardins</p>
                        </div>
                        <div class="map-info">
                            <h3>Como Chegar</h3>
                            <p>Localizada no coração dos Jardins, nossa clínica oferece fácil acesso por transporte público e estacionamento conveniado. A 2 minutos da estação Trianon-MASP.</p>
                            <a href="#" class="btn btn-primary">Abrir no Google Maps</a>
                        </div>
                    </div>
                    
                    <div class="social-media-card">
                        <h3>Siga-nos nas Redes Sociais</h3>
                        <div class="social-grid">
                            <a href="#" class="social-card instagram">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                                <div>
                                    <p><strong>Instagram</strong></p>
                                    <p>@serenityclinic</p>
                                </div>
                            </a>
                            <a href="#" class="social-card facebook">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                                <div>
                                    <p><strong>Facebook</strong></p>
                                    <p>Serenity Clinic</p>
                                </div>
                            </a>
                        </div>
                        <p>Acompanhe nossas novidades, dicas de beleza e transformações incríveis dos nossos clientes.</p>
                    </div>
                    
                    <div class="faq-card">
                        <h3>Perguntas Frequentes</h3>
                        <div class="faq-items">
                            <div class="faq-item">
                                <h4>Preciso agendar com antecedência?</h4>
                                <p>Sim, recomendamos agendamento com 48h de antecedência.</p>
                            </div>
                            <div class="faq-item">
                                <h4>Vocês atendem convênios?</h4>
                                <p>Atendemos alguns convênios. Consulte nossa recepção.</p>
                            </div>
                            <div class="faq-item">
                                <h4>Posso remarcar minha consulta?</h4>
                                <p>Sim, com até 24h de antecedência sem custos.</p>
                            </div>
                        </div>
                        <a href="#" class="faq-link">Ver todas as perguntas →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>