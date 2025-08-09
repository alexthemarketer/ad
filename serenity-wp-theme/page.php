<?php
/**
 * The template for displaying all pages
 *
 * @package Serenity_Clinic_Pro
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
                <header class="entry-header">
                    <?php if (!is_front_page()) : ?>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    <?php endif; ?>
                </header>

                <?php if (has_post_thumbnail() && !is_front_page()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('serenity-hero'); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Páginas:', 'serenity-clinic-pro'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <?php if (get_edit_post_link()) : ?>
                    <footer class="entry-footer">
                        <?php
                        edit_post_link(
                            sprintf(
                                wp_kses(
                                    __('Editar <span class="screen-reader-text">%s</span>', 'serenity-clinic-pro'),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                wp_kses_post(get_the_title())
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                        ?>
                    </footer>
                <?php endif; ?>
            </article>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
        <?php endwhile; ?>
    </div>
</main>

<?php
get_sidebar();
get_footer();