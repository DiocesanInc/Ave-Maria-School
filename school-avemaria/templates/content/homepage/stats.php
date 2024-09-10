<?php

/**
 * Partial for the Stats section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

?>

<?php if(get_field('jump_off_point_stats')):
  get_template_part('template-parts/components/featured','statscontent');
 else: ?>
<div class="stats-container banner-container teaser-box limit-width">
    <div class="statsIcons" <?php echo TemplateController::animate("fade-up",50); ?>>
      <?php if(have_rows('stats')):
        $i = 0;
        $counter = 0;
        while(have_rows('stats')): the_row();?>
        <div class="stat" <?php echo TemplateController::animate("fade-up", $counter > 2 ? 75 : 50, $i); ?>>
          <?php the_sub_field('image');?>
          <h5 class="stat-text"><?php the_sub_field('stat');?></h5>
        </div>
        <?php $i = $i + 300;
        $counter++;?>
      <?php endwhile; else: endif;?>
    </div>
    <div class="statsInfo" <?php echo TemplateController::animate("fade-up",50); ?>>
      <h2><?php echo get_field('stats_title');?></h2>
      <p><?php echo get_field('stats_description');?></p>
      <?php $link = get_field('stats_link');?>
      <?php echo acf_link($link);?>
    </div>
</div>
<?php endif;?>
