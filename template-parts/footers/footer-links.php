<?php

/**
 * Partial for quick links in the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

 use Celine\Theme\Controllers\TemplateController;
?>
<?php $fontColor = TemplateController::getFontColor("footer"); ?>

<h6 class="footer-heading font-header <?php echo $fontColor;?>">Quick Links</h6>
<?php if (have_rows('quick_links', 'options')) : ?>
  <div class="footer-links-container">
    <?php while (have_rows('quick_links', 'options')) : the_row();
      $link = get_sub_field('link'); ?>
      <span class="footer-link-holder has-white-color-before">
        <?= acf_link(get_sub_field('link'), 'footer-link'); ?>
      </span>
    <?php endwhile; ?>
  </div>
<?php endif;
