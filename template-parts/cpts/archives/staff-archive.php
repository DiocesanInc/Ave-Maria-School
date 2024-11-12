<?php

/**
 * The template for Staff Archives.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\ArchiveController;

$staffMembers = ArchiveController::getStaffMembers();

 $taxonomy_objects = get_object_taxonomies(get_post_type(), 'objects');
 $staff = array();

 foreach ($taxonomy_objects as $taxonomy_slug) {
     $terms = get_terms($taxonomy_slug->name, 'hide_empty=0');
     if (!empty($terms)) {
         foreach ($terms as $term) {
             $staff[$term->slug] = array(
                 'title'   => $term->name,
                 'members' => array(),
                 'group_order' => get_field('group_order',$term),
             );
         }
     }
 }

 while ($staffMembers->have_posts()) : $staffMembers->the_post();
     $slug = get_the_terms(get_the_ID(), get_post_type() . '-group')[0]->slug;
     $staff[$slug]['members'][] = get_the_ID();
 endwhile;

 array_sort_by_column($staff,'group_order');

if ($staffMembers->have_posts()) : ?>
<?php foreach ($staff as $slug => $content) : ?>
<!-- <div class="grid-container"> -->
    <div class="<?= get_post_type(); ?>-category" id="<?= $slug; ?>-staff">
     <h1 class="<?= get_post_type(); ?>-category-title"><?= $content['title']; ?></h1>
     <div class="<?= get_post_type(); ?>-category-members flex">
      <?php //while ($staff->have_posts()) : $staff->the_post();
        foreach ($content['members'] as $post) : setup_postdata($post);
          get_template_part('template-parts/cpts/singles/staff-member');
        endforeach;
      //endwhile;?>
     </div>
    </div>
<!-- </div> -->
<?php endforeach;?>
<div class="lightbox-overlay"></div>
<div id="staff-lightbox" class="lightbox">
    <div class="lightbox-close"></div>
    <div class="lightbox-image"></div>
    <div class="lightbox-content">
        <h4 class="lightbox-title"></h4>
        <div class="lightbox-excerpt"></div>
    </div>
</div>
<?php endif;
