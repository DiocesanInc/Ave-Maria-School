<?php

/**
 * Partial for the Mass Times component.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

?>

<?php if (have_rows('schedule', 'options')) : ?>
<div class="mass-times grid col-2">
    <?php while (have_rows('schedule', 'options')) : the_row(); ?>
    <div class="mass-times-section">
        <h1 class="mass-times-title has-primary-color">
            <?php the_sub_field('title'); ?>
        </h1>
        <?php while (have_rows('times')) : the_row();
                    get_template_part('template-parts/components/mass-time');
                endwhile; ?>
    </div>
    <?php endwhile; ?>
</div>

<?php else : ?>
<div class="no-mass-times">
    <h3 class="<?php is_page_template('templates/homepage.php') ? 'has-tertiary-color' : 'has-primary-color'; ?>">Sorry,
        but there are not any masses scheduled at this time.</h3>
</div>
<?php endif;