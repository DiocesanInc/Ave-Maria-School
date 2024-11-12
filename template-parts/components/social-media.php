<?php

/**
 * Template part for displaying social media.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */
?>

<div class="social-media-container">
    <?php if (have_rows("social_media", "options")) : ?>
    <?php while (have_rows("social_media", "options")) : the_row();
      $link = get_sub_field("link");
      echo acf_link(get_sub_field("link"), "social-media-link has-white-color has-secondary-color-hover", get_sub_field("icon"));
    endwhile; ?>
    <?php endif; ?>

    <?php get_template_part("template-parts/components/myParish"); ?>
    <?php get_template_part("template-parts/components/evangelus"); ?>
</div>