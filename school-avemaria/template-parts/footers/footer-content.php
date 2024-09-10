<?php

/**
 * Partial for logo and info in the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

?>

<?php if (get_field("footer_logo", "options")) : ?>
<div class="footer-logo">
    <a href="<?= home_url(); ?>" class="footer-logo-link" title="<?php bloginfo("name"); ?>">
        <img src="<?= get_field("footer_logo", "options") ? get_field("footer_logo", "options") : get_field("header_logo", "options"); ?>"
            class="footer-logo-image" alt="<?php bloginfo("name"); ?>" />
    </a>
</div>
<?php endif; ?>
<?php if (get_field("footer_text", "options")) :?>
<div class="footer-content">
    <?php echo get_field("footer_text", "options");?>
</div>
<?php endif;