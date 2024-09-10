<?php

/**
 * Partial for the hero section: Info
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

?>

<?php if (get_sub_field('title') || get_sub_field('text')) : ?>
<div class="hero-info has-white-color">
    <?php if (get_sub_field('title')) : ?>
    <h1 class="hero-title has-white-color"><?php the_sub_field('title') ?></h1>
    <?php endif; ?>
<!-- 
//    <?php # if (get_sub_field('text')) :
//      $text = get_sub_field('text');
//      array_push($slideArr, $text);
 //     echo $text;
//      var_dump($slideArr);
//      ?>
//    <?php # endif; ?> -->
</div>
<?php endif;
