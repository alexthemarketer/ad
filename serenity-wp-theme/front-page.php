<?php
/**
 * The front page template file
 *
 * @package Serenity_Clinic_Pro
 */

get_header(); ?>

<main id="primary" class="site-main front-page">
    
    <?php 
    // Hero Section
    get_template_part('template-parts/hero'); 
    
    // Features Section
    get_template_part('template-parts/features'); 
    
    // CTA Section
    get_template_part('template-parts/cta'); 
    ?>
    
    <?php if (have_posts()) : ?>
        <section class="front-page-content">
            <div class="container">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    <?php endif; ?>

</main>

<?php get_footer(); ?>