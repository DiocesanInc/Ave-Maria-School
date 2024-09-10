<?php
/**
 * Template part for displaying contact methods in page-contact.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Diocesan_My_Religion
 */
?>

<?php if(get_field('phone', 'options') || get_field('fax', 'options') || get_field('email', 'options')) : ?>
  <div class="contact-methods">
    <h3 class="contact-title">Contact Us</h3>
    <?php if(get_field('phone', 'options')) : ?>
      <div class="contact-method">
        <h5 class="contact-phone contact-label">Phone:</h5>
        <span class="contact-detail">
          <a href="<?= phone_link(get_field('phone', 'options')); ?>" target="_blank" title="Call Us!"><?= get_field('phone', 'options'); ?></a>
        </span>
      </div>
    <?php endif; ?>

    <?php if(get_field('fax', 'options')) : ?>
      <div class="contact-method">
        <h5 class="contact-fax contact-label">Fax:</h5>
        <span class="contact-detail"><?= get_field('fax', 'options'); ?></span>
      </div>
    <?php endif; ?>

    <?php if(get_field('email', 'options')) : ?>
      <div class="contact-method">
        <h5 class="contact-email contact-label">Email:</h5>
        <span class="contact-detail">
          <a href="mailto:<?= get_field('email', 'options'); ?>" target="_blank" title="Email Us!"><?= get_field('email', 'options'); ?></a>
        </span>
      </div>
    <?php endif; ?>
  </div>
<?php endif;
