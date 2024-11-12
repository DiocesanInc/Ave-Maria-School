<?php

/**
 * Template part for displaying the content in page-tabs.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

 
$headingFontColor = get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["heading_font_color"] : "white";
$headingBackgroundColor = get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["heading_background_color"] : "var(--clr-primary)";

$contentFontColor = get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["content_font_color"] : "black";
$contentBackgroundColor = get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["content_background_color"] : "white";

?>

<div class="entry-content limit-width">
  <?= if_the_content(); ?>

    <?php while(have_posts()) : the_post(); ?>
      <div class="the-content"><?php the_content(); ?></div>
    <?php endwhile; ?>

    <?php $children = get_children(array(
      'post_type'      => 'page',
      'post_status'    => 'publish',
      'post_parent'    => get_the_id(),
      'posts_per_page' => -1,
      'orderby'          => array(
        'menu_order' => 'ASC',
        'title'      => 'ASC',
        'date'       => 'ASC'
      )
    )); ?>

    <?php if($children) : ?>
      <div class="tabs-container" data-active="">
        <div class="tabs-bar closed" style="background: <?php echo $headingBackgroundColor;?>;">
          <h5 class="tabs-desktop" style="color: <?php echo $headingFontColor;?>;">View More <i class="fa fa-caret-down" aria-hidden="true"></i></h5>
          <h5 class="tabs-mobile" style="color: <?php echo $headingFontColor;?>;">View More <i class="fa fa-caret-down" aria-hidden="true"></i></h5>
          <div class="tabs-tabs">
            <?php foreach($children as $post) : setup_postdata( $post ) ?>
              <button type="button" style="--tab-bg-color: <?php echo $headingFontColor;?>; color: <?php echo $headingFontColor;?>;" class="nav-tab has-underline-hover font-main" data-controls="tab-<?php the_ID(); ?>" id="nav-<?php the_ID(); ?>"><?php the_title(); ?></button>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="tabs-content" style="background: <?php echo $contentBackgroundColor;?>;">
          <?php foreach($children as $post) : setup_postdata( $post ) ?>
            <div class="tab-content" id="tab-<?php the_ID(); ?>" style="--tab-content-color: <?php echo $contentFontColor;?>; color: <?php echo $contentFontColor;?>;"><?php the_content(); ?></div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
  <!-- Tabs -->
</div>
