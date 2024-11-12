<?php

/**
 * Partial for the Calendar section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

?>

<div class="banner-container teaser-box limit-width calendar-container" <?php echo TemplateController::animate("fade-up",50); ?>>
  <h3 class="align-center"><?php echo get_field('calendar_title');?></h3>
  <?= acf_link(get_field('calendar_link'));?>
  <?= do_shortcode(get_field('calendar_shortcode'));?>
  <img src="<?php echo get_field('calendar_background_image');?>">
</div>
