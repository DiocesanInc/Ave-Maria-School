<?php

/**
 * Partial for social media links in the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

 use Celine\Theme\Controllers\TemplateController;
?>
<?php $fontColor = TemplateController::getFontColor("footer"); ?>

<?php if (have_rows("social_media_links", "options")) : ?>
<h6 class="footer-heading <?php echo $fontColor;?>">
    <?php echo getField("social_media_header", "options", true, "Social");?>
</h6>
<div class="social-media-link-container">
    <?php while(have_rows("social_media_links", "options")) : the_row(); ?>
    <div class="social-media-link-wrapper">
        <a href="<?php echo get_sub_field("social_media_link")["url"] ?? '';?>"
            target="<?php echo get_sub_field("social_media_link")["target"] ?? '';?>">
            <?php the_sub_field("social_media_icon");?>
        </a>
    </div>
    <?php endwhile;?>
</div>
<?php endif;
