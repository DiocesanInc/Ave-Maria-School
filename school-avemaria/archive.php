<?php

/**
 * The template for displaying archive pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

get_header();
?>

<?php get_template_part('template-parts/headers/page-header'); ?>

<div class="content-area" id="primary">
    <main class="site-main archive" id="main">

        <?php if (have_posts()) :
            get_template_part('template-parts/cpts/archive');
        else :
                //TODO make content-none (probably a template not a template-part)
                get_template_part('template-parts/content', 'none');

        endif;
            wp_reset_postdata(); ?>
    </main>
</div>

<?php
get_footer();
