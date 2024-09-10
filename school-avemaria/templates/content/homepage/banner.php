<?php

/**
 * Partial for the Homepage Banner section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

?>

<?php $fontColor = TemplateController::getFontColor("top_banner"); ?>
<?php $bgColor = TemplateController::getBackgroundColor("top_banner"); ?>

<div class="top-banner banner-container teaser-box" data-isAnimated=true>
    <div class="banner-image-wrapper" <?php echo TemplateController::animate("fade-up",50); ?>>
        <img class="teaser-img" src="<?php echo get_field("banner_image")["url"]; ?>" />
    </div>

    <div class="teaser-content-wrapper <?php echo "$bgColor $fontColor"?>" <?php echo TemplateController::animate("fade-left",50); ?>>
        <div class="teaser-content-wrapper-inner">
            <?php if (get_field('banner_title')) : ?>
            <h3 class="teaser-title <?php echo "$fontColor"?>">
                <?php echo get_field('banner_title'); ?>
            </h3>
            <?php endif; ?>

            <?php if (get_field('banner_content')) : ?>
            <h2 class="teaser-content <?php echo "$fontColor"?>">
                <?php echo get_field("banner_content"); ?>
            </h2>
            <?php endif; ?>

            <?php if (have_rows("banner_links")) : ?>
            <div class="links-container">
                <?php while (have_rows('banner_links')) : the_row();
                    echo acf_link(get_sub_field("banner_link"), 'the-button');
                endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
