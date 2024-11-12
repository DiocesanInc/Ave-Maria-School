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
<?php if (have_rows("landing_slides")) : ?>
  <?php $slideArray = array();?>
    <?php while (have_rows("landing_slides")) : the_row();

        if (get_sub_field('slide_text')) :
          $text = get_sub_field('slide_text');
          array_push($slideArray, $text);
          // echo $text;
          ?>
        <?php endif; ?>

<?php endwhile; ?>

<div class="slideLinks">
<?php foreach($slideArray as $slide):
    echo '<a class="slideLink">' . $slide . '</a>';
  endforeach;
?>

<?php //var_dump($slideArray);?>
</div>
<?php endif;?>
