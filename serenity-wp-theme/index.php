<?php
/**
 * The main template file
 *
 * @package Serenity_Clinic_Pro
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="posts-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('serenity-card'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                
                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                            <?php echo esc_html(get_the_date()); ?>
                                        </time>
                                    </span>
                                    <span class="byline">
                                        <?php esc_html_e('por', 'serenity-clinic-pro'); ?> 
                                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                            <?php echo esc_html(get_the_author()); ?>
                                        </a>
                                    </span>
                                </div>
                            </header>

                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>

                            <footer class="entry-footer">
                                <a href="<?php the_permalink(); ?>" class="read-more btn btn-outline">
                                    <?php esc_html_e('Leia mais', 'serenity-clinic-pro'); ?>
                                </a>
                            </footer>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            the_posts_pagination(array(
                'prev_text' => __('Anterior', 'serenity-clinic-pro'),
                'next_text' => __('Próximo', 'serenity-clinic-pro'),
            ));
            ?>
        <?php else : ?>
            <section class="no-results">
                <header class="page-header">
                    <h1 class="page-title">
                        <?php esc_html_e('Nenhum conteúdo encontrado', 'serenity-clinic-pro'); ?>
                    </h1>
                </header>
                <div class="page-content">
                    <p><?php esc_html_e('Desculpe, mas nada foi encontrado. Tente uma pesquisa diferente.', 'serenity-clinic-pro'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
</main>

<?php
get_sidebar();
get_footer();