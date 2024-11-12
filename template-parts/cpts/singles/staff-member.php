<?php

/**
 * The template for displaying a single Staff Member.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

?>

<div class="staff-single flex-column" <?php echo TemplateController::animate("fade-up"); ?>>
    <a href="<?php the_permalink(); ?>"><img src="<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : get_template_directory_uri() . '/assets/img/person.jpg'; ?>"
        class="staff-image teaser-img" alt="staff-image" /></a>
    <div class="teaser-content-wrapper flex-column">

        <?php if (get_the_title()) : ?>
        <h4 class="staff-name teaser-title">
            <?php the_title(); ?>
        </h4>
        <?php endif; ?>

        <?php if (get_field('position')) : ?>
        <p class="staff-position teaser-title">
            <?php echo get_field('position'); ?>
        </p>
        <?php endif; ?>
        <div class="teaser-content">
            <div class="contact-person-email">
                <?php if(get_field("email")) : ?>
                <a href="mailto: <?php echo get_field("email"); ?>" class="">
                    <i class="fa fa-envelope"></i>
                </a>
                <?php endif; ?>
                <?php if (get_field("phone")) : ?>
                <a href="<?php echo phone_link(get_field("phone")); ?>" class="">
                    <i class="fa fa-phone"></i>
                </a>
                <?php endif; ?>
            </div>

        </div>
        <div class="links-container">
                <a href="<?php the_permalink(); ?>">
                Meet <?php the_title(); ?></a>
        </div>
    </div>
</div>
