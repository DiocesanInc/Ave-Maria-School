<?php
/**
 * Template part for displaying office hours in page-contact.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Diocesan_My_Religion
 */
?>

<?php if(have_rows('office_hours', 'options')) : ?>
  <div class="contact-hours">
    <h3 class="contact-title">Office Hours</h3>
    <?php while(have_rows('office_hours', 'options')) : the_row(); ?>
      <div class="contact-hour">
        <?php if(get_sub_field('label')) : ?>
          <h5 class="contact-label"><?= get_sub_field('label'); ?>:</h5>
        <?php endif; ?>
        <span class="contact-detail"><?= get_sub_field('detail'); ?></span>
      </div>
    <?php endwhile ?>
  </div>
<?php endif;
