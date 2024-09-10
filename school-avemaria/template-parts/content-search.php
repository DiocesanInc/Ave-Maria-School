<?php

/**
 * The template for displaying search results.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package transfiguration
 */

use Celine\Theme\Controllers\TemplateController;

?>

<div class="search-result teaser-box flex-column" <?php echo TemplateController::animate("fade-up"); ?>>
    <img src="<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : get_field('default_featured_image','options'); ?>"
        class="teaser-img" alt="<?php the_title(); ?>" />
    <div class="teaser-content-wrapper flex-column">

        <?php if (get_the_title()) : ?>
        <h3 class="teaser-title">
            <?php the_title(); ?>
        </h3>
        <?php endif; ?>
        <div class="teaser-content">
            <?php echo TemplateController::excerpt(); ?>
        </div>
        <div class="links-container">
            <a href="<?php the_permalink(); ?>"
                class="the-button"
                title="<?php get_the_title() ? the_title() : "Learn More"; ?>">
                Learn More
            </a>
        </div>
    </div>


</div>
