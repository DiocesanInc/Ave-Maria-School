<?php

/**
 * Partial for contents of the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

?>

<div class="footer-container limit-width">
    <?php
    $rows = [
        "contact",
        "social-media",
        "links",
    ];
    foreach ($rows as $row) : ?>
    <div class="footer-<?php echo $row; ?> footer-row" >
        <?php get_template_part("template-parts/footers/footer", $row); ?>
    </div>
    <?php endforeach; ?>
</div>

<?php get_template_part("template-parts/footers/footer", "site-info");
