<?php

/**
 * Partial for contact information in the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

 use Celine\Theme\Controllers\TemplateController;
?>
<?php $fontColor = TemplateController::getFontColor("footer"); ?>

<h6 class="footer-heading font-header <?php echo $fontColor;?>">
    <?php echo getField("footer_contact_header", "options", true, "Contact Us");?>
</h6>
<div class="footer-contact-info-wrapper">
    <?php if (getField("use_google_maps", "options")) : ?>
      <?php $link = get_field('address_link', 'options'); ?>
      <?php if($link):?>
        <span class="footer-link-holder">
            <a class="footer-link" href="<?= $link['url'];?>" target="<?= $link['target'];?>"><?= $link['title'];?></a>
        </span>
      <?php endif;?>
    <?php else: ?>

    <?php if (get_field('address', 'options')) : ?>
    <?php echo get_field("address", "options");?>
    <?php endif; ?>

    <?php endif;?>

    <?php if (get_field('phone', 'options')) : ?>
    <span class="footer-link-holder">
        <a href="<?= phone_link(get_field('phone', 'options')); ?>"
            class="footer-link" title="Call Us">Phone:
            <?= get_field('phone', 'options'); ?></a>
    </span>
    <?php endif; ?>

    <?php if (get_field('fax', 'options')) : ?>
    <span class="footer-link-holder">
        <a href="<?= phone_link(get_field('fax', 'options')); ?>"
            class="footer-link" title="Fax">Fax:
            <?= get_field('fax', 'options'); ?></a>
    </span>
    <?php endif; ?>
    <?php if (get_field('email', 'options')) : ?>
    <span class="footer-link-holder">
        <a href="mailto:<?= get_field('email', 'options'); ?>"
            class="footer-link" title="Fax">Email:
            <?= get_field('email', 'options'); ?></a>
    </span>
    <?php endif; ?>
</div>
<?php get_template_part('template-parts/components/translate');
