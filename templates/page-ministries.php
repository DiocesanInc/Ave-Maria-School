<?php

/**
 * Template Name: Ministries
 *
 * The template for displaying the Ministry Groups Template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\MinistriesController;
use Celine\Theme\Controllers\TemplateController;

get_header();
?>

<?php get_template_part('template-parts/headers/page-header'); ?>

<div class="content-area" id="primary">
    <main class="site-main" id="main">
        <?php if (have_posts()) : ?>
        <div class="ministries-container limit-width">

            <div class="content-wrapper" <?php echo TemplateController::animate("fade") ?>>
                <?php the_content(); ?>
            </div>
            <?php MinistriesController::getMinistryArchive(); ?>
        </div>
        <?php else :
            //TODO make content-none (probably a template not a template-part)
            get_template_part('template-parts/content', 'none');
        endif;
        wp_reset_postdata(); ?>
    </main>
</div>

<?php get_footer();