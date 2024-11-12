<?php

/**
 * The template for displaying single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package transfiguration
 */

get_header();
?>

    <?php while (have_posts()) : the_post();
        if (get_post_type() === 'staff') :
        elseif (get_post_type() === 'ministry'):?>

          <h1 class="page-header-title">
              <?php echo get_the_category()[0]->cat_name ? get_the_category()[0]->cat_name : get_the_title(); ?></h1>
          <div class="page-header" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
          </div>

          <?php
              wp_reset_postdata();
        else :
          get_template_part('template-parts/headers/page-header');
        endif;
    endwhile; ?>

<div class="content-area" id="primary">
    <main class="site-main entry-content limit-width" id="main">
        <div class="single-container">
            <?php while (have_posts()) : the_post();
                if (get_post_type() === 'staff') :
                    get_template_part('template-parts/cpts/singles/' . get_post_type());
                elseif (get_post_type() === "ministry") :
                    get_template_part('template-parts/cpts/singles/single', "ministry");
                else :
                    get_template_part('templates/content/single');
                endif;
            endwhile; ?>
        </div>
    </main>
</div>

<?php
get_footer();
