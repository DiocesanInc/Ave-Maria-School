<?php

/**
 * Partial for the Lower Banner section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

?>

<div class="lower-banner banner-container teaser-box limit-width">
    <div class="banner-image-wrapper" <?php echo TemplateController::animate("fade-up",50); ?>>
      <img src="<?php echo get_field('lower_banner_image');?>">
    </div>

    <div class="teaser-content-wrapper" <?php echo TemplateController::animate("fade-left",50); ?>>
      <h2><?php echo get_field('lower_banner_title');?></h2>
      <p><?php echo get_field('lower_banner_description');?></p>
      <?php echo acf_link(get_field('lower_banner_button'),'the-button');?>
    </div>
</div>
