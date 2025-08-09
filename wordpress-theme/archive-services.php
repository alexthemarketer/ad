<?php
/**
 * The template for displaying services archive
 *
 * @package Serenity_Clinic
 */

get_header(); ?>

<main id="primary" class="site-main services-archive">
    
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="page-header-content">
                <h1 class="page-title">Nossos Serviços</h1>
                <p class="page-description">
                    Descubra nossa completa gama de tratamentos estéticos personalizados, 
                    desenvolvidos para realçar sua beleza natural e proporcionar bem-estar único.
                </p>
            </div>
        </div>
    </section>
    
    <!-- Services Filter -->
    <section class="services-filter">
        <div class="container">
            <div class="filter-tabs">
                <button class="filter-btn active" data-category="all">
                    Todos os Serviços
                </button>
                <?php
                $categories = get_terms(array(
                    'taxonomy' => 'service_category',
                    'hide_empty' => true,
                ));
                
                if ($categories && !is_wp_error($categories)) :
                    foreach ($categories as $category) :
                ?>
                    <button class="filter-btn" data-category="<?php echo esc_attr($category->slug); ?>">
                        <?php echo esc_html($category->name); ?>
                    </button>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>
    
    <!-- Services Grid -->
    <section class="services-grid-section">
        <div class="container">
            <?php if (have_posts()) : ?>
                <div class="services-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                        $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                        $price = get_post_meta(get_the_ID(), '_service_price', true);
                        $benefits = get_post_meta(get_the_ID(), '_service_benefits', true);
                        $benefits_array = $benefits ? explode("\n", $benefits) : array();
                        
                        $categories = get_the_terms(get_the_ID(), 'service_category');
                        $category_classes = '';
                        if ($categories && !is_wp_error($categories)) {
                            foreach ($categories as $category) {
                                $category_classes .= ' category-' . $category->slug;
                            }
                        }
                        ?>
                        
                        <article class="service-card<?php echo esc_attr($category_classes); ?>" data-categories="<?php echo esc_attr($category_classes); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="service-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('serenity-service'); ?>
                                    </a>
                                    <div class="service-overlay">
                                        <a href="<?php the_permalink(); ?>" class="service-link">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                                            </svg>
                                        </a>
                                    </div>
                                    
                                    <?php if ($categories && !is_wp_error($categories)) : ?>
                                        <div class="service-category-badge">
                                            <?php echo esc_html($categories[0]->name); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="service-content">
                                <h2 class="service-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                
                                <div class="service-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <?php if (!empty($benefits_array)) : ?>
                                    <div class="service-benefits">
                                        <div class="benefits-tags">
                                            <?php foreach (array_slice($benefits_array, 0, 3) as $benefit) : ?>
                                                <?php if (trim($benefit)) : ?>
                                                    <span class="benefit-tag">
                                                        <?php echo esc_html(trim($benefit)); ?>
                                                    </span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="service-meta">
                                    <div class="service-details">
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
                                </div>
                                
                                <div class="service-actions">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-outline">
                                        Saiba Mais
                                    </a>
                                    <a href="#booking" class="btn btn-primary">
                                        Agendar
                                    </a>
                                </div>
                            </div>
                        </article>
                        
                    <?php endwhile; ?>
                </div>
                
                <!-- Pagination -->
                <?php
                $pagination = paginate_links(array(
                    'type' => 'array',
                    'prev_text' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>',
                    'next_text' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>',
                ));
                
                if ($pagination) :
                ?>
                    <nav class="services-pagination">
                        <ul class="pagination">
                            <?php foreach ($pagination as $page) : ?>
                                <li><?php echo $page; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                <?php endif; ?>
                
            <?php else : ?>
                
                <!-- No Services Found -->
                <div class="no-services">
                    <div class="no-services-content">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                        <h2>Nenhum serviço encontrado</h2>
                        <p>Não encontramos serviços para os critérios selecionados. Tente ajustar os filtros ou entre em contato conosco.</p>
                        <a href="<?php echo home_url(); ?>" class="btn btn-primary">
                            Voltar ao Início
                        </a>
                    </div>
                </div>
                
            <?php endif; ?>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="services-cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Não encontrou o que procura?</h2>
                <p>
                    Nossa equipe está pronta para criar um plano de tratamento personalizado 
                    especialmente para você. Entre em contato e descubra como podemos ajudar.
                </p>
                <div class="cta-actions">
                    <a href="#contact" class="btn btn-primary btn-large">
                        Falar com Especialista
                    </a>
                    <a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '(11) 9999-9999')); ?>" class="btn btn-secondary btn-large">
                        Ligar Agora
                    </a>
                </div>
            </div>
        </div>
    </section>
    
</main>

<script>
// Services Filter JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const serviceCards = document.querySelectorAll('.service-card');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Update active button
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Filter services
            serviceCards.forEach(card => {
                if (category === 'all') {
                    card.style.display = 'block';
                } else {
                    const cardCategories = card.getAttribute('data-categories');
                    if (cardCategories && cardCategories.includes('category-' + category)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                }
            });
        });
    });
});
</script>

<?php get_footer(); ?>