<?php

/**
 * Partial for the hero section: Video
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Celine
 */

use Celine\Theme\Controllers\TemplateController;

?>

<?php if (have_rows('slider_video')) : ?>
<div class="hero has-video has-quaternary-background-color-after">

    <?php while (have_rows('slider_video')) : the_row();

        echo TemplateController::getHeroVideo();

    endwhile; ?>

</div>

<?php else : ?>
<p>There was an error playing this video.</p>

<?php endif;