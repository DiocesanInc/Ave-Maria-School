<?php

/**
 * Partial for the Homepage template's News section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\NewsController;
use Celine\Theme\Controllers\TemplateController;

?>

<div class="news-container limit-width" <?php echo TemplateController::isAnimated();?>>
    <?php if (get_field("news_title")) : ?>
    <h2 class="news-title" <?php echo TemplateController::animate("fade");?>>
        <?php echo get_field('news_title'); ?>
    </h2>
    <?php endif; ?>

    <?php $news = NewsController::getNews(); ?>

    <div class="news-slider same-height has-margin">
        <?php foreach ($news as $post) :
            setup_postdata($post)?>
        <div class="news-item-wrapper teaser-box" <?php echo TemplateController::animate("zoom-in"); ?>>
            <img class="teaser-img"
                src="<?php echo get_the_post_thumbnail_url($singleNews->ID) ? get_the_post_thumbnail_url($singleNews->ID) : get_field("default_featured_image", "options") ?>" />
            <div class="teaser-content-wrapper">
                <h4 class="teaser-title">
                    <?php the_title(); ?>
                </h4>
                <div class="teaser-content">
                    <?php echo TemplateController::excerpt(25); ?>
                </div>
                <div class="links-container">
                    <?php echo acf_link(get_the_permalink($singleNews->ID), "the-button", "Read more"); ?>
                </div>
            </div>

        </div>
        <?php endforeach; ?>
    </div>
</div>