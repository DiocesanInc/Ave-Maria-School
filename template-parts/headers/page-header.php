<?php

/**
 * Partial for the site's inner page headers.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

?>

<?php $info = TemplateController::getPageHeader(); ?>

<h1 class="page-header-title">
    <?php
        if (get_post_type() === 'staff') :?>
        Staff</h1>
    <?php else :
    echo $info["title"]; ?></h1>
    <div class="page-header" style="background-image: url(<?php echo $info['bkgd']; ?>);"></div>
    <?php endif;?>
</div> <!-- .site-content -->
