<?php
/**
 * Template part for displaying the site header
 *
 * @package Serenity_Clinic_Pro
 */
?>

<header id="masthead" class="site-header">
    <div class="header-container">
        <div class="site-branding">
            <?php serenity_pro_custom_logo(); ?>
        </div>

        <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e('Menu Principal', 'serenity-clinic-pro'); ?>">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="menu-icon"></span>
                <span class="menu-icon"></span>
                <span class="menu-icon"></span>
                <span class="screen-reader-text"><?php esc_html_e('Menu', 'serenity-clinic-pro'); ?></span>
            </button>
            
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'menu_class'     => 'nav-menu',
                'fallback_cb'    => 'serenity_pro_fallback_menu',
            ));
            ?>
        </nav>

        <div class="header-actions">
            <?php 
            $phone = get_theme_mod('contact_phone');
            if ($phone) : 
            ?>
                <div class="header-contact">
                    <a href="tel:<?php echo esc_attr(str_replace(array('(', ')', ' ', '-'), '', $phone)); ?>" class="phone-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z"/>
                        </svg>
                        <span><?php echo esc_html($phone); ?></span>
                    </a>
                </div>
            <?php endif; ?>
            
            <a href="<?php echo esc_url(get_theme_mod('hero_button_link', '#contact')); ?>" class="btn btn-primary header-cta">
                <?php echo esc_html(get_theme_mod('hero_button_text', 'Agendar')); ?>
            </a>
        </div>
    </div>
</header>

<?php
/**
 * Fallback menu if no menu is assigned
 */
function serenity_pro_fallback_menu() {
    echo '<ul class="nav-menu fallback-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Início', 'serenity-clinic-pro') . '</a></li>';
    
    $pages = get_pages(array('sort_column' => 'menu_order'));
    foreach ($pages as $page) {
        if ($page->ID != get_option('page_on_front')) {
            echo '<li><a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html($page->post_title) . '</a></li>';
        }
    }
    echo '</ul>';
}