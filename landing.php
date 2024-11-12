<?php
/**
 * Template Name: Landing
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sacredheartjoliet
 */

 use Celine\Theme\Controllers\TemplateController;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://gmpg.org/xfn/11" rel="profile">
    <meta property="og:locale" content="en_US" />
    <meta property="og:site_name" content="<?php bloginfo("name"); ?> <?php bloginfo("description"); ?>" />
    <meta property="og:url" content="<?= esc_url(get_permalink()); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= wp_strip_all_tags(get_the_title()); ?>" />
    <meta property="og:description" content="<?= wp_strip_all_tags(get_the_excerpt()); ?>" />
    <meta property="og:image:secure_url" content="<?= get_the_post_thumbnail_url(); ?>" />
    <meta property="og:image" content="<?= str_replace("https://", "http://", get_the_post_thumbnail_url()); ?>" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="site" id="page">
<div class="site-content" id="content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
      <div class="landingWrapper">
				<?php if(have_rows('landing_slides')):
							while (have_rows('landing_slides')): the_row();?>
          <div class="landingHalf landingLeft">
              <div class="landingInfo fadeIn">
                  <?php if(get_sub_field('slide_logo')):?>
                    <img class="landingPaulLogo landingLogo" src="<?php the_sub_field('slide_logo');?>"/>
                  <?php endif;?>
    							<?php if(get_sub_field('slide_button')):
    										$button = get_sub_field('slide_button');?>
    							<div class="landingButton fadeIn">
    									<div class="landingHalfButton"><a href="<?php echo $button['url'];?>" target="<?php echo $button['target'];?>"><?php echo $button['title'];?></a></div>
    							</div>
              </div>
							<?php else: endif;?>
							<div class="landingHalfImage" style="background-image:url(<?php the_sub_field('slide_background');?>)"></div>
          </div>
				<?php endwhile; else: endif; ?>
			</div>
      <?php get_template_part("template-parts/components/landing", "links");?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
</div>
  <?php wp_footer(); ?>
</body>
</html>
