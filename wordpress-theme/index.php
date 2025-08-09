<?php
/**
 * The main template file
 *
 * @package Serenity_Clinic
 */

get_header(); ?>

<main id="primary" class="site-main">
    <?php if (have_posts()) : ?>
        <div class="posts-container">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
                    <header class="entry-header">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        
                        <div class="entry-meta">
                            <span class="posted-on">
                                <?php echo get_the_date(); ?>
                            </span>
                            <span class="byline">
                                por <?php the_author(); ?>
                            </span>
                        </div>
                    </header>

                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>

                    <footer class="entry-footer">
                        <a href="<?php the_permalink(); ?>" class="read-more">
                            Leia mais
                        </a>
                    </footer>
                </article>
            <?php endwhile; ?>
        </div>

        <?php the_posts_navigation(); ?>
    <?php else : ?>
        <section class="no-results">
            <header class="page-header">
                <h1 class="page-title">Nenhum conteúdo encontrado</h1>
            </header>
            <div class="page-content">
                <p>Desculpe, mas nada foi encontrado para sua pesquisa. Tente novamente com palavras-chave diferentes.</p>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php
get_sidebar();
get_footer();