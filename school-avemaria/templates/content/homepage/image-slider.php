<?php

/**
 * Partial for the Homepage template's Image Slider.
 *
 * @package Celine
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

use Celine\Theme\Controllers\TemplateController;

if (have_rows("image_slider_slides")) : ?>

<div class="image-slider-container same-height limit-width"
    data-pagination-style="<?php echo get_field("image_slider_style"); ?>" <?php echo TemplateController::isAnimated(); ?>>
    <?php while (have_rows("image_slider_slides")) : the_row(); ?>
    <div class="image-slider-slide teaser-box">
        <div class="flex-vertical-center">
            <div class="teaser-content-wrapper">
                <?php if (get_sub_field("text")) :
                    echo "<h1 class='teaser-content is-quote has-primary-color-after has-primary-color-before'>";
                        the_sub_field('text');
                    echo "</h1>";
                endif;

                if (get_sub_field("link")) : ?>
                <div class="links-container">
                    <?php echo acf_link(get_sub_field("link"), "the-button"); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if (get_sub_field("image")) : ?>
        <img class="teaser-img" src="<?php echo get_sub_field("image")["url"]; ?>"
            <?php echo TemplateController::animate("fade-up");?> />
        <?php endif; ?>

    </div>
    <?php endwhile; ?>
</div>
<?php endif; ?>