<?php

/**
 * The template for displaying Category Archives.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

get_header();
?>


<?php get_template_part('template-parts/headers/page-header'); ?>

<div class="content-area" id="primary">
    <main class="site-main" id="main">
        <div class="entry-content limit-width">
            <div class="result-container">
                <?php echo do_shortcode('[ajax_load_more css_classes="alm-reveal" order="ASC" orderby="menu_order" sticky_posts="true" post_type="post" posts_per_page="12" category="' . get_queried_object()->slug . '" loading_style="infinite ring"]'); ?>
            </div>
        </div>
    </main>
</div>

<?php get_footer();
