<?php

/**
 * Partial for the Homepage template's second row of Featured Buttons (Featured Content)
 *
 * @package Celine
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

use Celine\Theme\Controllers\TemplateController;

if (have_rows("featured_content_items")) : ?>
<div class="featured-content-container limit-width" <?php echo TemplateController::isAnimated();?>>
    <?php if (get_field("featured_content_title")) : ?>
    <h2 class="featured-content-title align-center" <?php echo TemplateController::animate("fade",50);?>>
        <?php echo get_field("featured_content_title"); ?>
    </h2>
    <?php endif; ?>

    <div
        class="<?php echo get_field("featured_content_is_slider") ? "featured-content-slider " : "featured-content " ?>has-margin same-height">
        <?php while (have_rows("featured_content_items")) : the_row(); ?>
        <div class="featured-content-item-wrapper teaser-box" <?php echo TemplateController::animate("zoom-in",50);?>>
            <?php if (get_sub_field("image")) : ?>
            <img class="teaser-img" src="<?php echo get_sub_field("image")["url"]; ?>" />
            <?php endif; ?>

            <div class="teaser-content-wrapper">
                <?php if (get_sub_field("title")) : ?>
                <h3 class="teaser-title">
                    <?php the_sub_field("title"); ?>
                </h3>
                <?php endif; ?>

                <?php if (get_sub_field("text")) : ?>
                <div class="teaser-content">
                    <?php the_sub_field("text"); ?>
                </div>
                <?php endif; ?>

                <?php if (get_sub_field("link")) : ?>
                <div class="links-container">
                    <?php echo acf_link(get_sub_field("link"), "the-button"); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php endif;
