<?php
/**
 * The template for displaying taxonomies
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package transfiguration
 */

use Celine\Theme\Controllers\TemplateController;

get_header();

$headingFontColor = get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["heading_font_color"] : "white";
$headingBackgroundColor = get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["heading_background_color"] : "var(--clr-primary)";

?>

<?php get_template_part('template-parts/headers/page-header'); ?>

<div class="content-area" id="primary">
    <main class="site-main" id="main">
        <?php if(have_posts()) : ?>
        <div class="entry-content limit-width">
            <?php if(get_post_type() === 'ministry' && term_description()) : ?>
            <div class="<?php echo get_post_type(); ?>-description taxonomy-description">
                <?php echo term_description(); ?>
            </div>
            <?php endif;
              ?>
            <div class="<?php echo get_post_type(); ?>-container taxonomy-container">
                <?php $q = new WP_Query(
                    array(
                        'post_type'      => get_post_type(),
                        'post_status'    => 'publish',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => $wp_query->get_queried_object()->taxonomy,
                                    'field' => 'ID',
                                    'terms' => $wp_query->get_queried_object()->term_id,
                                ),
                            ),
                        'posts_per_page' => -1,
                        'orderby'        => array(
                            'menu_order' => 'ASC',
                            'name'       => 'ASC',
                        ),
                    )
                );
                if (is_archive()) {
                    if (is_tax()) {
                      echo '<div class="form">'.do_shortcode(get_sub_field('ministry_group_form',$wp_query->get_queried_object()->term_id)).'</div>';
                    }
                }?>

                <div class="tabs-container" data-active="">
                  <div class="tabs-bar closed" style="background: <?php echo $headingBackgroundColor;?>;">
                    <h5 class="tabs-desktop" style="color: <?php echo $headingFontColor;?>;">View More <i class="fa fa-caret-down" aria-hidden="true"></i></h5>
                    <h5 class="tabs-mobile" style="color: <?php echo $headingFontColor;?>;">View More <i class="fa fa-caret-down" aria-hidden="true"></i></h5>
                    <div class="tabs-tabs">
                      <?php
                      while($q->have_posts()) : $q->the_post();?>
                        <button type="button" style="--tab-bg-color: <?php echo $headingFontColor;?>; color: <?php echo $headingFontColor;?>;" class="nav-tab has-underline-hover font-main" data-controls="tab-<?php the_ID(); ?>" id="nav-<?php the_ID(); ?>"><?php the_title(); ?></button>
                      <?php endwhile; wp_reset_postdata();?>
                    </div>
                  </div>

                  <div class="tabs-content">
                    <?php while($q->have_posts()) : $q->the_post();?>
                      <div class="tab-content" id="tab-<?php the_ID(); ?>">

                          <?php get_template_part('template-parts/cpts/singles/single', 'ministry');?>

                      </div>
                    <?php endwhile; wp_reset_postdata();?>
                  </div>
                </div>
            </div>
            <div class="back-button-container align-center" <?php echo TemplateController::animate("fade-up"); ?>>
                <p>Go back to all ministries</p>
                <a href="/church/ministries"
                    class="the-button"
                    title="ministries">Go Back</a>
            </div>
        </div>
        <?php else :
            get_template_part('template-parts/content', 'none');
        endif; ?>
    </main>
</div>


<?php
get_footer();
