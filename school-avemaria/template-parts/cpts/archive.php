<?php

/**
 * The template for CPT Archives.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\ArchiveController;
$postType = get_post_type();
?>

<div class="<?php echo ArchiveController::getArchiveContainerClasses(); ?>">
    <?php if (get_post_type() === 'staff') :
        get_template_part("template-parts/cpts/archives/$postType", "archive");
      else:
        get_template_part("template-parts/cpts/archives/content");
    endif;
    wp_reset_postdata(); ?>
</div>
