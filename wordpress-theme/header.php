<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Pular para o conteúdo', 'serenity-clinic'); ?></a>

    <header id="masthead" class="site-header">
        <div class="header-container">
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <div class="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <div class="site-identity">
                        <div class="logo-icon">
                            <span>S</span>
                        </div>
                        <div class="site-info">
                            <h1 class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <?php echo get_bloginfo('name') ? get_bloginfo('name') : 'Serenity'; ?>
                                </a>
                            </h1>
                            <p class="site-description"><?php echo get_bloginfo('description') ? get_bloginfo('description') : 'Aesthetic Clinic'; ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="menu-icon"></span>
                    <span class="menu-icon"></span>
                    <span class="menu-icon"></span>
                </button>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'menu_class'     => 'nav-menu',
                ));
                ?>
            </nav>

            <div class="header-actions">
                <div class="contact-info">
                    <span class="phone-number">
                        <?php echo esc_html(get_theme_mod('contact_phone', '(11) 9999-9999')); ?>
                    </span>
                </div>
                <a href="#booking" class="btn btn-primary">
                    <?php esc_html_e('Agendar', 'serenity-clinic'); ?>
                </a>
            </div>
        </div>
    </header>

    <div id="content" class="site-content">