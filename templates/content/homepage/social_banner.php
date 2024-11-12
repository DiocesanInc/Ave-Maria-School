<?php

/**
 * Partial for the Social Banner section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

?>

<?php $fontColor = TemplateController::getFontColor("bottom_banner"); ?>
<?php $bgColor = TemplateController::getBackgroundColor("bottom_banner"); ?>

<?php if(get_field('jump_off_point_social')):
  get_template_part('template-parts/components/featured','socialcontent');
 else: ?>
<div class="social-banner banner-container teaser-box">
    <div class="banner-image-wrapper" <?php echo TemplateController::animate("fade-up",50); ?>>
      <?= do_shortcode(get_field('instagram_id'));?>
    </div>

    <div class="teaser-content-wrapper <?php echo "$bgColor $fontColor"?>" <?php echo TemplateController::animate("fade-left",50); ?>>
        <div class="teaser-content-wrapper-inner">
            <?php if (get_field('social_title')) : ?>
            <h2 class="teaser-title <?php echo "$fontColor"?>">
                <?php echo get_field('social_title'); ?>
            </h2>
            <?php endif; ?>

            <h6 class="teaser-content <?php echo "$fontColor"?>">
              Follow Us
            </h6>

            <?php if (have_rows("social_links")) : ?>
            <div class="links-container">
                <?php while (have_rows('social_links')) : the_row();
                    echo acf_link(get_sub_field("link"), 'social-link',get_sub_field('icon'));
                endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif;?>
