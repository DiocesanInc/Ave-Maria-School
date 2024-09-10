<?php

/**
 * Partial for site-info in the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

$bgColor = TemplateController::getBackgroundColor("site_info");
$fontColor = TemplateController::getFontColor("site_info");
$heartColor = TemplateController::getFontColor("heart");
?>



<div class="site-info-container <?php echo "$bgColor $fontColor"?>">
    <div class="site-info">
        &copy; <?= date("Y"); ?> <a href="<?= esc_url(home_url("/")); ?>"
            class="has-white-background-color-after"
            rel="home"><?php bloginfo("name"); ?></a>
        <span class="sep"> | </span>
        <?php bloginfo("description"); ?>
    </div>
    <div class="diocesan">
        Made with <span class="hearts <?php echo $heartColor; ?>">&hearts;</span> by <a href="https://diocesan.com/"
            class="has-white-background-color-after" target="_blank"
            title="Diocesan">Diocesan</a>
    </div>
</div>