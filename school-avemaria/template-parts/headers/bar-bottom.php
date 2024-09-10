<?php

/**
 * Partial for the top bar of the site's header/navbar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */
?>
<div class="bottom-bar limit-width">
    <div class="header-nav">
        <div class="site-branding">
            <a href="<?= home_url(); ?>" class="header-logo-link" title="<?= bloginfo(); ?>" rel="home">
                <img src="<?php echo get_field("header_logo", "options"); ?>" alt="<?= bloginfo(); ?>" class="header_logo top" />
                <img src="<?php echo get_field("header_logo_sticky", "options"); ?>" alt="<?= bloginfo(); ?>"
                    class="header_logo sticky" />
            </a>
        </div>
        <nav class="main-navigation" data-home="<?= site_url(); ?>" id="site-navigation">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    'fallback_cb'    => false,
                )
            ); ?>
        </nav>
    </div>
</div>
<div class="search-form-overlay">
    <div class="search-form-wrapper">
        <div class="close-search-form-button">
            Close Search
        </div>
        <?php get_search_form(); ?>
    </div>
</div>
