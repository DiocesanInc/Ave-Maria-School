<?php

/**
 * Single Mass Time section for the Mass Times component.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

$label = $args['label'];
$detail = $args['detail'];
?>

<div class="mass-time">
    <h3 class="mass-time-day"><?php the_sub_field('day'); ?></h3>
    <div class="mass-time-time">
        <?php the_sub_field('times'); ?>
    </div>
</div>