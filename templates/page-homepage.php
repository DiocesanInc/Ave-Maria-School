<?php

/**
 * Template Name: Homepage
 *
 * The template for displaying the Homepage Template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

get_header();
?>

<div class="content-area" id="primary">
    <main class="site-main page-template-homepage" id="main">
        <?php get_template_part("templates/content/homepage/hero");

        if (have_rows("section_order", "options")) :

            //iterate through the sections set in the template settings
            while (have_rows("section_order", "options")) : the_row();

                //get section name
                $section = get_sub_field("section");
                //load template
                get_template_part("templates/content/homepage/$section");


            endwhile;

        else : ?>

            <?php get_template_part("templates/content/homepage/banner"); ?>
            <?php get_template_part("templates/content/homepage/stats"); ?>
            <?php get_template_part("templates/content/homepage/social_banner"); ?>
            <?php get_template_part("templates/content/homepage/lower_banner"); ?>
            <?php get_template_part("templates/content/homepage/calendar"); ?>

        <?php endif; ?>
    </main>
</div>

<?php get_footer();
