<?php

/**
 * Partial for the Homepage template's Featured Buttons.
 *
 * @package Celine
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

if (have_rows('featured_buttons')) : ?>
<div class="featured-buttons container has-box-shadow has-rounded-corners limit-width"
    data-btns="<?php echo count(get_field('featured_buttons')); ?>">
    <div class="featured-buttons-wrapper">
        <?php while (have_rows('featured_buttons')) : the_row();
            get_template_part("template-parts/components/featured", "button");
        endwhile; ?>
    </div>
</div>
<?php endif;