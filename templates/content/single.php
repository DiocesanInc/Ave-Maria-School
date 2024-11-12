<?php

/**
 * Template part for displaying single pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Celine
 */

use Celine\Theme\Controllers\MinistriesController;
use Celine\Theme\Controllers\TemplateController;

$group = get_the_terms(get_post(), "ministry-group");
$group = $group[0];
?>

<article class="entry-content limit-width">
    <div class="the-content" <?php echo TemplateController::animate("fade"); ?>>
        <?php the_content(); ?>
        <?php if ($group) : ?>
        <div class="back-button-container align-center" <?php echo TemplateController::animate("fade-up"); ?>>
            <a href="<?php echo MinistriesController::ministryIsSlider() ? "/ministries" : get_term_link($group); ?>"
                class="the-button"
                title="back">
                Go Back
            </a>
        </div>
        <?php endif; ?>

    </div>
</article>