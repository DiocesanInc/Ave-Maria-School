<?php

/**
 * Template Name: Mass Times
 *
 * The template for displaying the Mass Times Template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

get_header();
?>

<?php get_template_part('template-parts/headers/page-header'); ?>

<div class="content-area" id="primary">
    <main class="site-main mass-times" id="main">
        <?php get_template_part('templates/content/mass-times'); ?>
    </main>
</div>

<?php get_footer();