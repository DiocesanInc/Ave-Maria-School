<?php

/**
 * Partial for the top bar of the site"s header/navbar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */
?>

<div class="top-bar">
    <div class="top-bar-container limit-width-laptop">
        <!-- <?php get_template_part("template-parts/components/social-media"); ?>
        <?php get_template_part("template-parts/components/giving-button"); //TODO implement giving button, make these sections optional
        ?> -->
        <?php
        wp_nav_menu( array(
            'theme_location' => 'menu-2',
            'menu_id'        => 'secondary-menu',
            'fallback_cb'    => false,
        ) );
        ?>

    </div>
</div>
