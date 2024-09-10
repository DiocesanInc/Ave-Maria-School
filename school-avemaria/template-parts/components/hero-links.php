<?php

/**
 * Partial for the hero section: Links
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

// use Celine\Theme\Controllers\TemplateController;

?>
<?php if (have_rows("slider_image")) : ?>
  <?php $titleArray = array();$textArray = array();?>
    <?php while (have_rows("slider_image")) : the_row();

        if (get_sub_field('title')) :
          $text = get_sub_field('title');
          array_push($titleArray, $text);  ?>
        <?php endif;
        if (get_sub_field('text')) :
          $text = get_sub_field('text');
          array_push($textArray, $text);  ?>
        <?php endif; ?>

<?php endwhile; ?>

<div class="slideLinks desktop">
  <?php foreach($textArray as $slide):
      echo '<a class="slideLink">' . $slide . '</a>';
    endforeach;
  ?>
</div>
<div class="slideLinksContainer mobile">
  <div class="slideLinks slideTextMobile">
    <?php foreach($textArray as $slide):
        echo '<a class="slideLink"> </a>';
      endforeach;
    ?>
  </div>
  <div class="slideTitleMobile">
    <?php foreach($titleArray as $slide):
        echo '<h1 class="slideLink slideTitle">' . $slide . '</h1>';
      endforeach;
    ?>
  </div>
</div>
<?php endif;?>
