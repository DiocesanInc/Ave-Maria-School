<?php

/**
 * Template part for displaying the content in page-contact.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */
?>

<div class="entry-content limit-width">
    <?php while (have_posts()) : the_post(); ?>
    <div class="the-content"><?php the_content(); ?></div>
    <?php endwhile; ?>

    		<div class="contact-container">
    			<?php get_template_part( 'templates/content/contact/office-hours' ); ?>
    			<?php get_template_part( 'templates/content/contact/contact-methods' ); ?>
    		</div>
    <?= get_field('iframe', 'options'); ?>
</div>
