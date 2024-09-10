<?php

/**
 * Template part for displaying the content in ministry-groups.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\MinistriesController;
use Celine\Theme\Controllers\TemplateController;

?>

<div class="ministry-funnel entry-content max-width">
    <?php $groups = MinistriesController::getMinistryGroups();
    foreach($groups as $group) : ?>
    <div class="ministry-group-wrapper">
        <a href="<?php echo get_term_link($group)?>" class="ministry-group-link"
            style="background-image: url(<?php echo get_field('ministry_group_image', $group)['url']; ?>); "
            <?php echo TemplateController::animate("fade"); ?>>
            <h2 class="has-white-color">
                <?php echo $group->name; ?>
            </h2>
        </a>
    </div>
    <?php endforeach; ?>
</div>
