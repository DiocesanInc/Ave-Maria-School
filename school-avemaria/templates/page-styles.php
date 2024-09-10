<?php

/**
 * Template Name: Styles
 *
 * The template for displaying styles page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

get_header();
?>

<?php get_template_part('template-parts/headers/page-header'); ?>

<div class="content-area styles-preview" id="primary">
    <main class="site-main" id="main">
        <div class="entry-content limit-width">
            <?php the_content(); ?>
        </div>

    </main>
</div>

<?php get_footer();