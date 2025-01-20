<?php

/**
 * Template part for displaying single pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Celine
 */


use Celine\Theme\Controllers\TemplateController;

?>

<article class="entry-content limit-width">
    <div class="the-content" <?php echo TemplateController::animate("fade"); ?>>
        <?php the_content(); ?>

    </div>
</article>